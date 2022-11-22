<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Locations;
use App\Models\MainServices;
use App\Models\Meta;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class LocationController extends Controller
{

    /**
     * @return Factory|View|Application
     */
    public function __invoke(): Factory|View|Application
    {
        $locations = Locations::all();
        $banner = Banner::where('banner_page', 'locations')->get()->first();
        $image = MainServices::where('main_service_name', 'location')->get()->first();
        $meta = Meta::find(4);

        return view('locations.index', [
            'banner' => $banner,
            'locations' => $locations,
            'image' => $image,
            'meta' => $meta
        ]);
    }

}
