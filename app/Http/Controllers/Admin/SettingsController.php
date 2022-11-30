<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCompanyProfileRequest;
use App\Http\Requests\UpdateContactInformationRequest;
use App\Http\Requests\UpdateSocialMediaRequest;
use App\services\CompanyProfileService;
use App\services\ImageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        $agent = $store->get('agent', []);
        $home_popup = $store->get('home_popup', []);

        $facebook = $social_media['facebook'] ?? '';
        $linkedin = $social_media['linkedin'] ?? '';
        $instagram = $social_media['instagram'] ?? '';
        $youtube = $social_media['youtube'] ?? '';

        $address = $contact_information['address'] ?? '';
        $email = $contact_information['email'] ?? '';
        $phone = $contact_information['phone'] ?? '';

        $profile_link = $files['profile_link'] ?? '';

        $agent_image = $agent['agent_image'] ?? '';
        $description = $agent['description'] ?? '';
        $youtube_embed = $agent['youtube_embed'] ?? '';

        $popup_is_active = $home_popup['is_active'] ?? '';
        $popup_image = $home_popup['image'] ?? '';
        $popup_title = $home_popup['title'] ?? '';
        $popup_description = $home_popup['description'] ?? '';

        return view('admin.settings.index',
            compact('facebook',
                'linkedin',
                'instagram',
                'youtube',
                'address',
                'email',
                'phone',
                'profile_link',
                'agent_image',
                'description',
                'youtube_embed',
                'popup_is_active',
                'popup_image',
                'popup_title',
                'popup_description'
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
        $profile = $store->get('profile', []);
        $profile_link = $profile['profile_link'] ?? '';
        if (strlen($profile_link) > 0) {
            CompanyProfileService::delete($profile_link);
        }
        $data = $request->validated();
        $data['profile_link'] = CompanyProfileService::saveProfile($data['file']);
        $store->put('profile', $data);

        session()->flash('success', 'Company Profile Updated Successfully');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function exclusive_agent(Request $request): RedirectResponse
    {
        $pathToFile = storage_path('app/settings.json');
        $store = Valuestore::make($pathToFile);
        $agent = $store->get('agent', []);
        $data = $agent;
        if ($request->hasFile('agent_image')) {
            $agent_image = $agent['agent_image'] ?? '';
            if (strlen($agent_image) > 0) {
                ImageService::delete($agent_image);
            }
            $data['agent_image'] = ImageService::saveAgentImage($request->file('agent_image'));
        }
        if ($request->has('description')) {
            $data['description'] = $request->get('description');
        }

        if ($request->has('youtube_embed')) {
            $data['youtube_embed'] = $request->get('youtube_embed');
        }
        $store->put('agent', $data);

        session()->flash('success', 'Exclusive Agent Data Updated Successfully');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function home_popup(Request $request): RedirectResponse
    {
        $pathToFile = storage_path('app/settings.json');
        $store = Valuestore::make($pathToFile);
        $home_popup = $store->get('home_popup', []);
        $data = $home_popup;
        if ($request->hasFile('image')) {
            $image = $agent['image'] ?? '';
            if (strlen($image) > 0) {
                ImageService::delete($image);
            }
            $data['image'] = ImageService::savePopupImage($request->file('image'));
        }
        if ($request->has('title')) {
            $data['title'] = $request->get('title');
        }

        if ($request->has('description')) {
            $data['description'] = $request->get('description');
        }
        $store->put('home_popup', $data);

        session()->flash('success', 'Popup Data Updated Successfully');
        return redirect()->back();
    }

    /**
     * @param string $status
     * @return RedirectResponse
     */
    public function update_home_popup(string $status): RedirectResponse
    {
        $pathToFile = storage_path('app/settings.json');
        $store = Valuestore::make($pathToFile);
        $home_popup = $store->get('home_popup', []);
        $data = $home_popup;
        if ($status == 'show') {
            $data['is_active'] = true;
        } elseif ($status == 'hide') {
            $data['is_active'] = false;
        }
        $store->put('home_popup', $data);

        session()->flash('success', 'Popup Status Changed Successfully');
        return redirect()->back();
    }
}
