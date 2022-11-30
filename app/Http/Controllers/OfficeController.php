<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Office;
use App\Models\Page;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Spatie\Valuestore\Valuestore;

class OfficeController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $page = Page::where('slug', 'our-offices')->firstOrFail();
        $banner = Banner::where('page_id', $page->id)->firstOrFail();
        $pathToFile = storage_path('app/settings.json');
        $store = Valuestore::make($pathToFile);
        $offices_store = $store->get('offices', []);
        $map_image = $offices_store['image'] ?? '';
        $offices = Office::all();
        return view('offices.index', compact('offices', 'map_image', 'banner'));
    }
}
