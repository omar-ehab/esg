<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsLetterSubscribe;
use App\Models\Subscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class NewsLetterController extends Controller
{
    /**
     * @param NewsLetterSubscribe $request
     * @return RedirectResponse
     */
    public function __invoke(NewsLetterSubscribe $request): RedirectResponse
    {
        if (!Subscriber::where('email', $request->get('subscriber-email'))->first()) {
            Subscriber::create([
                'email' => $request->get('subscriber-email')
            ]);
        }
        Session::flash('messageNewsLetter', 'Thanks for Subscribing!');
        $url = URL::previous() . '#footer';
        return redirect()->to($url);
    }
}
