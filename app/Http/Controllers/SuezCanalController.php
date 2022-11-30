<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Page;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class SuezCanalController extends Controller
{

    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $page = Page::where('slug', 'suez-canal')->firstOrFail();
        $banner = Banner::where('page_id', $page->id)->firstOrFail();
        return view('suez_canal.index', compact('banner'));
    }

    /**
     * @return Factory|View|Application
     */
    public function about(): Factory|View|Application
    {
        $page = Page::where('slug', 'about-suez-canal')->firstOrFail();
        $banner = Banner::where('page_id', $page->id)->firstOrFail();
        return view('suez_canal.about', compact('banner'));
    }

    /**
     * @return Factory|View|Application
     */
    public function convoy(): Factory|View|Application
    {
        $page = Page::where('slug', 'suez-canal-convoy')->firstOrFail();
        $banner = Banner::where('page_id', $page->id)->firstOrFail();
        return view('suez_canal.convoy', compact('banner'));

    }

    /**
     * @return Factory|View|Application
     */
    public function calculator(): Factory|View|Application
    {
        return view('suez_canal.calculator');

    }
}
