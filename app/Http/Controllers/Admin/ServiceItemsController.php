<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateServiceItemRequest;
use App\Http\Requests\UpdateServiceItemRequest;
use App\Models\Service;
use App\Models\ServiceItem;
use App\services\ImageService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ServiceItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Service $service
     * @return Application|Factory|View
     */
    public function index(Service $service): Application|Factory|View
    {
        $service->load('items');
        return view('admin.services_items.index', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Service $service
     * @return Application|Factory|View
     */
    public function create(Service $service): Application|Factory|View
    {
        return view('admin.services_items.create', compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateServiceItemRequest $request
     * @param Service $service
     * @return RedirectResponse
     */
    public function store(CreateServiceItemRequest $request, Service $service): RedirectResponse
    {
        $image_path = null;
        if ($request->hasFile('image_path')) {
            $image_path = ImageService::saveServiceItemImage($request->file('image_path'));
        }
        ServiceItem::create([
            'service_id' => $service->id,
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'image_path' => $image_path,
        ]);
        session()->flash('success', 'Service Item Created Successfully');
        return redirect()->route('admin.items.index', $service->slug);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Service $service
     * @param ServiceItem $item
     * @return Application|Factory|View
     */
    public function edit(Service $service, ServiceItem $item): View|Factory|Application
    {
        return view('admin.services_items.edit', compact('service', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateServiceItemRequest $request
     * @param Service $service
     * @param ServiceItem $item
     * @return RedirectResponse
     */
    public function update(UpdateServiceItemRequest $request, Service $service, ServiceItem $item): RedirectResponse
    {
        $image_path = $item->image_path;
        if ($request->hasFile('image_path')) {
            $image_path = ImageService::updateServiceItemImage($request->file('image_path'), $item->image_path);
        }
        $item->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'image_path' => $image_path,
        ]);
        session()->flash('success', 'Service Item Updated Successfully');
        return redirect()->route('admin.items.index', $service->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Service $service
     * @param ServiceItem $item
     * @return RedirectResponse
     */
    public function destroy(Service $service, ServiceItem $item): RedirectResponse
    {
        try {
            DB::transaction(function () use ($item) {
                ImageService::delete($item->image_path);
                $item->delete();
            });
            session()->flash('success', 'Service Item Updated Successfully');
        } catch (Exception $e) {
            Log::error($e);
            session()->flash('error', 'Something went wrong!');
        }
        return redirect()->route('admin.items.index', $service->slug);
    }
}
