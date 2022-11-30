<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Country;
use App\Models\News;
use App\Models\Page;
use App\Models\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Spatie\Valuestore\Valuestore;

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
        $services = Service::where('parent_id', null)->get();
        $pathToFile = storage_path('app/settings.json');
        $store = Valuestore::make($pathToFile);
        $agent = $store->get('agent', []);
        $home_popup = $store->get('home_popup', []);

        $agent_is_active = $agent['is_active'] ?? '';
        $agent_image = $agent['agent_image'] ?? '';
        $description = $agent['description'] ?? '';
        $youtube_embed = $agent['youtube_embed'] ?? '';

        $popup_is_active = $home_popup['is_active'] ?? '';
        $popup_image = $home_popup['image'] ?? '';
        $popup_title = $home_popup['title'] ?? '';
        $popup_description = $home_popup['description'] ?? '';

        return view('index', compact('banners',
            'countries',
            'inquiryServices',
            'news',
            'services',
            'agent_is_active',
            'agent_image',
            'description',
            'youtube_embed',
            'popup_is_active',
            'popup_image',
            'popup_title',
            'popup_description'
        ));
    }
}
