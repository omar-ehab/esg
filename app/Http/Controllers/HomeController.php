<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Country;
use App\Models\News;
use App\Models\Page;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function __invoke(): Factory|View|Application
    {
        $page = Page::where('slug', 'home')->firstOrFail();
        $banners = Banner::where('page_id', $page->id)->get();
        $countries = Country::all();
        $inquiryServices = [];
        $news = News::latest('created_at')->first();
        return view('index', compact('banners', 'countries', 'inquiryServices', 'news'));
    }
}
