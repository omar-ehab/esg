<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\News;
use App\Models\Page;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $page = Page::where('slug', 'news')->firstOrFail();
        $banner = Banner::where('page_id', $page->id)->first();
        $news = News::select(['title', 'slug', 'image_path', 'short_description', 'created_at'])
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('news.index', compact('news', 'banner'));
    }

    /**
     * @param News $news
     * @return Factory|View|Application
     */
    public function show(News $news): Factory|View|Application
    {
        return view('news.show', compact('news'));
    }
}
