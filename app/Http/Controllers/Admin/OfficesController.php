<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfficeRequest;
use App\Models\Office;
use App\Services\ImageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Valuestore\Valuestore;

class OfficesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $pathToFile = storage_path('app/settings.json');
        $store = Valuestore::make($pathToFile);
        $offices_store = $store->get('offices', []);
        $map_image = $offices_store['image'] ?? '';
        $offices = Office::all();
        return view('admin.offices.index', compact('offices', 'map_image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('admin.offices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OfficeRequest $request
     * @return RedirectResponse
     */
    public function store(OfficeRequest $request): RedirectResponse
    {
        Office::create($request->validated());
        session()->flash('success', 'Office Created Successfully!');
        return redirect()->route('admin.our-offices.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Office $our_office
     * @return Application|Factory|View
     */
    public function edit(Office $our_office): View|Factory|Application
    {
        return view('admin.offices.edit', compact('our_office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OfficeRequest $request
     * @param Office $our_office
     * @return RedirectResponse
     */
    public function update(OfficeRequest $request, Office $our_office)
    {
        $our_office->update($request->validated());
        session()->flash('success', 'Office Updated Successfully!');
        return redirect()->route('admin.our-offices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Office $our_office
     * @return RedirectResponse
     */
    public function destroy(Office $our_office): RedirectResponse
    {
        $our_office->delete();
        session()->flash('success', 'Office Deleted Successfully!');
        return redirect()->route('admin.our-offices.index');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update_offices_map(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120'
        ]);
        $pathToFile = storage_path('app/settings.json');
        $store = Valuestore::make($pathToFile);
        $offices = $store->get('offices', []);
        $data = $offices;
        if ($request->hasFile('image')) {
            $image = $agent['image'] ?? '';
            if (strlen($image) > 0) {
                ImageService::delete($image);
            }
            $data['image'] = ImageService::saveOfficesImage($request->file('image'));
        }
        $store->put('offices', $data);

        session()->flash('success', 'Office Map Changed Successfully!');
        return redirect()->route('admin.our-offices.index');
    }
}
