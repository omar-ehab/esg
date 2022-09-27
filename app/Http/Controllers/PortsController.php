<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Page;
use App\Models\Port;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PortsController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function __invoke(): Factory|View|Application
    {
        $page = Page::where('slug', 'ports')->firstOrFail();
        $banner = Banner::where('page_id', $page->id)->first();
        $ports = Port::with('details')->get();

        return view('port.index', compact('banner', 'ports'));
    }
}
