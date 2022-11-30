<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use App\Models\Equipment;
use App\Models\EquipmentDetail;
use App\Services\ImageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $equipment = Equipment::all();
        return view('admin.equipment.index', compact('equipment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.equipment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateEquipmentRequest $request
     * @return RedirectResponse
     */
    public function store(CreateEquipmentRequest $request): RedirectResponse
    {
        $equipment_details = $request->except(['_token', '_method', 'name', 'image']);
        DB::transaction(function () use ($request, $equipment_details) {
            $image_path = ImageService::saveEquipmentImage($request->file('image'));
            $equipment = Equipment::create([
                'name' => $request->get('name'),
                'image_path' => $image_path
            ]);

            for ($i = 1; $i <= (count($equipment_details) / 3); $i++) {
                if (!is_null($equipment_details[$i . '_key'])) {
                    EquipmentDetail::create([
                        'equipment_id' => $equipment->id,
                        'key' => $equipment_details[$i . '_key'],
                        'first_value' => $equipment_details[$i . '_first_value'],
                        'second_value' => $equipment_details[$i . '_second_value'],
                    ]);
                }
            }
        });
        session()->flash('success', 'Equipment Created Successfully!');
        return redirect()->route('admin.equipment.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Equipment $equipment
     * @return Application|Factory|View
     */
    public function edit(Equipment $equipment): View|Factory|Application
    {
        $equipment->load('details');
        return view('admin.equipment.edit', compact('equipment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEquipmentRequest $request
     * @param Equipment $equipment
     * @return RedirectResponse
     */
    public function update(UpdateEquipmentRequest $request, Equipment $equipment): RedirectResponse
    {
        $image_path = $equipment->image_path;
        if ($request->hasFile('image')) {
            $image_path = ImageService::updateEquipmentImage($request->file('image'), $equipment->image_path);
        }
        $equipment->update([
            'name' => $request->get('name'),
            'image_path' => $image_path
        ]);
        session()->flash('success', 'Equipment Created Successfully!');
        return redirect()->route('admin.equipment.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEquipmentRequest $request
     * @param Equipment $equipment
     * @param EquipmentDetail $equipmentDetail
     * @return RedirectResponse
     */
    public function update_equipment_details(Request $request, Equipment $equipment, EquipmentDetail $equipmentDetail): RedirectResponse
    {
        $equipmentDetail->update([
            'key' => $request->get('key'),
            'first_value' => $request->get('first_value'),
            'second_value' => $request->get('second_value'),
        ]);
        session()->flash('success', 'Equipment Details Updated Successfully!');
        return redirect()->route('admin.equipment.edit', $equipment->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEquipmentRequest $request
     * @param Equipment $equipment
     * @param EquipmentDetail $equipmentDetail
     * @return RedirectResponse
     */
    public function destroy_equipment_details(Request $request, Equipment $equipment, EquipmentDetail $equipmentDetail): RedirectResponse
    {
        $equipmentDetail->delete();
        session()->flash('success', 'Equipment Details Deleted Successfully!');
        return redirect()->route('admin.equipment.edit', $equipment->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Equipment $equipment
     * @return RedirectResponse
     */
    public function destroy(Equipment $equipment): RedirectResponse
    {
        try {
            ImageService::delete($equipment->image_path);
            $equipment->delete();
            session()->flash('success', 'Equipment Deleted Successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', 'Something went wrong');
        }
        return redirect()->route('admin.equipment.index');
    }
}
