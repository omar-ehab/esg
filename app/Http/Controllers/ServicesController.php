<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ServicesController extends Controller
{
    /**
     * @param Service $service
     * @return Factory|View|Application
     */
    public function show(Service $service): Factory|View|Application
    {
        $service->load('children', 'page', 'items');
        if (is_null($service->parent_id)) {
            return view('services.parent', compact('service'));
        }
        return view('services.child', compact('service'));
    }
}
