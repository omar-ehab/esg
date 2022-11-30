<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\MaritimeLaw;
use App\Models\Page;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class MaritimeLawsController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $page = Page::where('slug', 'maritime-law')->firstOrFail();
        $banner = Banner::where('page_id', $page->id)->firstOrFail();
        $laws = MaritimeLaw::all();
        return view('maritime_laws.index', compact('laws', 'banner'));
    }
}
