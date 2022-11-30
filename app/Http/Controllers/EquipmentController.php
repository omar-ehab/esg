<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Equipment;
use App\Models\Page;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class EquipmentController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $page = Page::where('slug', 'equipment')->firstOrFail();
        $banner = Banner::where('page_id', $page->id)->firstOrFail();
        $equipment = Equipment::all();
        return view('equipment.index', compact('equipment', 'banner'));
    }
}
