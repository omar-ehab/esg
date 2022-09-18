<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\models\Banner;
use App\Models\ContactUsMessage;
use App\Models\Country;
use App\Models\Page;
use App\Models\Subscriber;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Route;
use Spatie\Valuestore\Valuestore;
use URL;

class ContactController extends Controller
{

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $page = Page::where('slug', 'contact-us')->first();
        $banner = Banner::where('page_id', $page->id)->first();
        $countries = Country::orderBy('name', 'ASC')->get();

        $pathToFile = storage_path('app/settings.json');
        $store = Valuestore::make($pathToFile);
        $social_media = $store->get('social_media', []);
        $contact_information = $store->get('contact_information', []);

        $facebook = $social_media['facebook'] ?? '';
        $linkedin = $social_media['linkedin'] ?? '';


        $address = $contact_information['address'] ?? '';
        $email = $contact_information['email'] ?? '';
        $phone = $contact_information['phone'] ?? '';

        return view('contact_us.index', [
            'banner' => $banner,
            'countries' => $countries,
            'facebook' => $facebook,
            'linkedin' => $linkedin,
            'address' => $address,
            'email' => $email,
            'phone' => $phone
        ]);
    }

    /**
     * @param ContactUsRequest $request
     * @return RedirectResponse
     */
    public function save(ContactUsRequest $request): RedirectResponse
    {
        $data = $request->validated();
        ContactUsMessage::create($data);
        if (!Subscriber::where('email', $data['email'])->exists()) {
            Subscriber::create([
                'email' => $data['email']
            ]);
        }

        //send email to admin
        //send email to client

        session()->flash('message', 'Thanks For Contact Us We will Contact You Soon');
        return redirect()->back();
    }


    public function newsLetter(Request $request)
    {
        $date = date("Y/m/d");
        $email = $request->get('news_letter_email');
        $rules = array(
            'news_letter_email' => 'email | unique:egmar_news_letter,news_letter_email'
        );
        $input = array('news_letter_email' => $email);
        $messageNewaLetter = array(
            'news_letter_email.email' => 'not valid email',
            'news_letter_email.unique' => 'not valid email',
        );
        $validate2 = Validator::make($input, $rules, $messageNewaLetter);

        if ($validate2->passes()) {
            $newsLetter = new NewsLetter();
            $newsLetter->news_letter_email = $email;
            $newsLetter->news_letter_date = $date;
            $newsLetter->save();
        }

        Session::flash('messageNewsLetter', 'Thanks for Subscribing!');

        $url = URL::previous() . '#footer';
        return Redirect::to($url);
    }
}
