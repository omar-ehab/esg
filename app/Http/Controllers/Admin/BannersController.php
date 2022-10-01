<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use App\Models\Page;
use App\services\ImageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $banners = Banner::with('page')->get();
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $pages = Page::orderBy('name', 'ASC')->get();
        return view('admin.banners.create', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateBannerRequest $request
     * @return RedirectResponse
     */
    public function store(CreateBannerRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['image_path'] = ImageService::saveBannerImage($request->file('image'));
        Banner::create($data);
        session()->flash('success', 'Banner Image Uploaded Successfully');
        return redirect()->route('admin.banners.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $banner
     * @return Application|Factory|View
     */
    public function show(int $banner): View|Factory|Application
    {
        $banner = Banner::with('page')->where('id', $banner)->first();
        return view('admin.banners.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Banner $banner
     * @return Application|Factory|View
     */
    public function edit(Banner $banner): View|Factory|Application
    {
        $pages = Page::all();
        return view('admin.banners.edit', compact('banner', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBannerRequest $request
     * @param Banner $banner
     * @return RedirectResponse
     */
    public function update(UpdateBannerRequest $request, Banner $banner): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image_path'] = ImageService::updateBannerImage($request->file('image'), $banner->image_path);
        }
        $banner->update($data);
        session()->flash('success', 'Banner Updated Successfully');
        return redirect()->route('admin.banners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Banner $banner
     * @return RedirectResponse
     */
    public function destroy(Banner $banner): RedirectResponse
    {
        try {
            if (!is_null($banner->image_path)) {
                ImageService::delete($banner->image_path);
            }
            $banner->delete();
            session()->flash('success', 'Banner Deleted Successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', 'Something went wrong');
        }
        return redirect()->route('admin.banners.index');
    }
}
