<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateScopeOfActivityRequest;
use App\Http\Requests\UpdateScopeOfActivityRequest;
use App\Models\Banner;
use App\Models\Page;
use App\Models\ScopeOfActivity;
use App\Services\ImageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ScopeOfActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $scopes = ScopeOfActivity::all();
        return view('admin.scope_of_activities.index', compact('scopes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.scope_of_activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateScopeOfActivityRequest $request
     * @return RedirectResponse
     */
    public function store(CreateScopeOfActivityRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $data = $request->validated();
            $page = Page::create([
                'name' => $request->get('name'),
                'slug' => Str::slug($request->get('name')),
                'url' => url('scope-of-activities/' . Str::slug($request->get('name')))
            ]);
            $image_path = ImageService::saveBannerImage($request->file('scope_of_activity_banner_image'));
            Banner::create([
                'title' => $request->get('name'),
                'page_id' => $page->id,
                'image_path' => $image_path,
            ]);
            $data['icon_path'] = ImageService::saveScopeOfActivityIcon($data['icon']);
            $data['page_id'] = $page->id;
            ScopeOfActivity::create($data);
        });
        session()->flash('success', 'Scope Of Activity Added Successfully');
        return redirect()->route('admin.scope-of-activities.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ScopeOfActivity $scopeOfActivity
     * @return Application|Factory|View
     */
    public function edit(ScopeOfActivity $scopeOfActivity): View|Factory|Application
    {
        return view('admin.scope_of_activities.edit', compact('scopeOfActivity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateScopeOfActivityRequest $request
     * @param ScopeOfActivity $scopeOfActivity
     * @return RedirectResponse
     */
    public function update(UpdateScopeOfActivityRequest $request, ScopeOfActivity $scopeOfActivity): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('icon')) {
            $data['icon_path'] = ImageService::updateScopeOfActivityImage($request->file('icon'), $scopeOfActivity->icon_path);
        }
        if ($request->hasFile('scope_of_activity_banner_image')) {
            $image_path = ImageService::updateBannerImage($request->file('scope_of_activity_banner_image'), $scopeOfActivity->page->banner->image_path);
            $scopeOfActivity->page->banner->update([
                'image_path' => $image_path
            ]);
        }
        $scopeOfActivity->update($data);
        session()->flash('success', 'Scope Of Activity Update Successfully');
        return redirect()->route('admin.scope-of-activities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ScopeOfActivity $scopeOfActivity
     * @return RedirectResponse
     */
    public function destroy(ScopeOfActivity $scopeOfActivity): RedirectResponse
    {
        try {
            if (!is_null($scopeOfActivity->icon_path)) {
                ImageService::delete($scopeOfActivity->icon_path);
            }
            $scopeOfActivity->delete();
            session()->flash('success', 'Scope Of Activity Deleted Successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', 'Something went wrong');
        }
        return redirect()->route('admin.scope-of-activities.index');
    }
}
