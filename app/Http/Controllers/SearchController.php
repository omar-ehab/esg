<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\News;
use App\Models\Page;
use App\Models\ScopeOfActivity;
use App\Models\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SearchController extends Controller
{

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function index(Request $request): Factory|View|Application
    {
        $page = Page::where('slug', 'search')->first();
        $banner = Banner::where('page_id', $page->id)->first();
        $count = 0;
        $query = $request->get('searchKeyword');


        $about = About::where('title', 'LIKE', "%$query%")->orWhere('description', 'LIKE', "%$query%")->get();
        $services = Service::where('name', 'LIKE', "%$query%")->orWhere('description', 'LIKE', "%$query%")->get();
        $scopeOfActivities = ScopeOfActivity::where('name', 'LIKE', "%$query%")->orWhere('description', 'LIKE', "%$query%")->get();
        $news = News::where('title', 'LIKE', "%$query%")->orWhere('short_description', 'LIKE', "%$query%")->get();

        $count += ($about->count() + $services->count() + $news->count() + $scopeOfActivities->count());


        return view('search.result', [
            'about' => $about,
            'banner' => $banner,
            'news' => $news,
            'services' => $services,
            'scopeOfActivities' => $scopeOfActivities,
            'count' => $count
        ]);
    }

}
