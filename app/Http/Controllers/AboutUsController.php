<?php

namespace App\Http\Controllers;

use App\models\About;
use App\Models\Banner;
use App\Models\Certificate;
use App\Models\Page;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;


class AboutUsController extends Controller
{
    public function __invoke(): Factory|View|Application
    {
        $page = Page::where('slug', 'about-us')->firstOrFail();
        $abouts = About::orderBy('id', 'asc')->get();
        $certificates = Certificate::all();
        $banner = Banner::where('page_id', $page->id)->first();

        return view('about.index', compact('banner', 'abouts', 'certificates'));
    }
}
