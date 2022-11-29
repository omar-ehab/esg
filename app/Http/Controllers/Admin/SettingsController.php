<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCompanyProfileRequest;
use App\Http\Requests\UpdateContactInformationRequest;
use App\Http\Requests\UpdateSocialMediaRequest;
use App\services\CompanyProfileService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\Valuestore\Valuestore;

class SettingsController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $pathToFile = storage_path('app/settings.json');
        $store = Valuestore::make($pathToFile);
        $social_media = $store->get('social_media', []);
        $contact_information = $store->get('contact_information', []);
        $files = $store->get('files', []);

        $facebook = $social_media['facebook'] ?? '';
        $linkedin = $social_media['linkedin'] ?? '';
        $instagram = $social_media['instagram'] ?? '';
        $youtube = $social_media['youtube'] ?? '';


        $address = $contact_information['address'] ?? '';
        $email = $contact_information['email'] ?? '';
        $phone = $contact_information['phone'] ?? '';

        $profile_link = $files['profile_link'] ?? '';

        return view('admin.settings.index',
            compact('facebook',
                'linkedin',
                'instagram',
                'youtube',
                'address',
                'email',
                'phone',
                'profile_link'
            ));
    }

    /**
     * @param UpdateSocialMediaRequest $request
     * @return RedirectResponse
     */
    public function social_media(UpdateSocialMediaRequest $request): RedirectResponse
    {
        $pathToFile = storage_path('app/settings.json');
        $store = Valuestore::make($pathToFile);
        $data = [
            'facebook' => $request->get('facebook') ?? '',
            'linkedin' => $request->get('linkedin') ?? '',
            'instagram' => $request->get('instagram') ?? '',
            'youtube' => $request->get('youtube') ?? ''
        ];
        $store->put('social_media', $data);
        session()->flash('success', 'Social Media Links Updated Successfully');
        return redirect()->back();
    }

    /**
     * @param UpdateContactInformationRequest $request
     * @return RedirectResponse
     */
    public function contact_information(UpdateContactInformationRequest $request): RedirectResponse
    {
        $pathToFile = storage_path('app/settings.json');
        $store = Valuestore::make($pathToFile);
        $data = [
            'address' => $request->get('address'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone')
        ];
        $store->put('contact_information', $data);
        session()->flash('success', 'Contact Information Updated Successfully');
        return redirect()->back();
    }

    /**
     * @param UpdateCompanyProfileRequest $request
     * @return RedirectResponse
     */
    public function company_profile(UpdateCompanyProfileRequest $request): RedirectResponse
    {
        $pathToFile = storage_path('app/settings.json');
        $store = Valuestore::make($pathToFile);
        $files = $store->get('files', []);
        $profile_link = $files['profile_link'] ?? '';
        if (strlen($profile_link) > 0) {
            CompanyProfileService::delete($profile_link);
        }
        $data = $request->validated();
        $data['profile_link'] = CompanyProfileService::saveProfile($data['file']);
        $store->put('files', $data);

        session()->flash('success', 'Company Profile Updated Successfully');
        return redirect()->back();
    }
}
