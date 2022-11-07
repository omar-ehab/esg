<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Banner;
use App\Models\Page;
use App\Models\Service;
use App\Services\ImageService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $services = Service::with('children')->where('parent_id', null)->get();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $parents = Service::where('parent_id', null)->orderBy('name')->get();
        return view('admin.services.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateServiceRequest $request
     * @return RedirectResponse
     */
    public function store(CreateServiceRequest $request): RedirectResponse
    {
        try {
            DB::transaction(function () use ($request) {
                $page = Page::create([
                    'name' => $request->get('service_banner_title'),
                    'slug' => Str::slug($request->get('service_banner_title')),
                    'url' => url('services/' . Str::slug($request->get('service_banner_title')))
                ]);
                $image_path = ImageService::saveBannerImage($request->file('service_banner_image'));
                Banner::create([
                    'title' => $request->get('service_banner_title'),
                    'page_id' => $page->id,
                    'image_path' => $image_path,
                ]);
                $parent_service_id = $request->get('parent_service') != '0' ? $request->get('parent_service') : null;
                $description = $request->get('description');
                if (is_null($parent_service_id) && is_null($request->get('description'))) {
                    throw ValidationException::withMessages([
                        'description' => 'description is required when service is a main service',
                    ]);
                }
                $card_image_path = null;
                if ($request->hasFile('card_image_path')) {
                    $card_image_path = ImageService::saveServiceImage($request->file('card_image_path'));
                }
                Service::create([
                    'parent_id' => $request->get('parent_service') != '0' ? $request->get('parent_service') : null,
                    'page_id' => $page->id,
                    'name' => $request->get('name'),
                    'description' => $description,
                    'card_image_path' => $card_image_path,
                ]);
            });
            session()->flash('success', 'Service Created Successfully');
            return redirect()->route('admin.services.index');
        } catch (Exception $e) {
            if (get_class($e) === ValidationException::class) {
                throw $e;
            }
            Log::error($e);
            session()->flash('error', 'Something went wrong!');
            return redirect()->route('admin.services.create');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Service $service
     * @return Application|Factory|View
     */
    public function edit(Service $service): View|Factory|Application
    {
        $parents = Service::where('parent_id', null)->orderBy('name')->get();
        return view('admin.services.edit', compact('service', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateServiceRequest $request
     * @param Service $service
     * @return RedirectResponse
     */
    public function update(UpdateServiceRequest $request, Service $service): RedirectResponse
    {
        try {
            DB::transaction(function () use ($request, $service) {
                if ($request->hasFile('service_banner_image')) {
                    $image_path = ImageService::updateBannerImage($request->file('service_banner_image'), $service->page->banner->image_path);
                    $service->page->banner->update([
                        'image_path' => $image_path
                    ]);
                }
                $card_image_path = $service->card_image_path;
                if ($request->hasFile('card_image_path')) {
                    $card_image_path = ImageService::updateServiceImage($request->file('card_image_path'), $service->card_image_path);
                }
                $parent_service_id = $request->get('parent_service') != '0' ? $request->get('parent_service') : null;
                $service->update([
                    'parent_id' => $parent_service_id,
                    'name' => $request->get('name'),
                    'description' => $request->get('description'),
                    'card_image_path' => $card_image_path,
                ]);
            });
            session()->flash('success', 'Service Updated Successfully');
            return redirect()->route('admin.services.index');
        } catch (Exception $e) {
            Log::error($e);
            session()->flash('error', 'Something went wrong!');
            return redirect()->route('admin.services.edit', $service->slug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Service $service
     * @return RedirectResponse
     */
    public function destroy(Service $service): RedirectResponse
    {
        try {
            DB::transaction(function () use ($service) {
                $page = Page::find($service->page->id);
                ImageService::delete($service->page->banner->image_path);
                $service->delete();
                $page->delete();
            });
            session()->flash('success', 'Service Deleted Successfully');
        } catch (Exception $e) {
            Log::error($e);
            session()->flash('error', 'Something went wrong!');
        }
        return redirect()->route('admin.services.index');
    }
}
