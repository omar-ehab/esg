<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PilotageDueRequest;
use App\Models\SuezCanalPilotageDues;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class PilotageDuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $pilotage_dues = SuezCanalPilotageDues::all();
        return view('admin.pilotage_dues.index', compact('pilotage_dues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.pilotage_dues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PilotageDueRequest $request
     * @return RedirectResponse
     */
    public function store(PilotageDueRequest $request): RedirectResponse
    {
        SuezCanalPilotageDues::create($request->validated());
        session()->flash('success', 'Pilotage Due Created Successfully!');
        return redirect()->route('admin.pilotage_dues.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param SuezCanalPilotageDues $pilotage_due
     * @return Application|Factory|View
     */
    public function edit(SuezCanalPilotageDues $pilotage_due): View|Factory|Application
    {
        return view('admin.pilotage_dues.edit', compact('pilotage_due'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PilotageDueRequest $request
     * @param SuezCanalPilotageDues $pilotage_due
     * @return RedirectResponse
     */
    public function update(PilotageDueRequest $request, SuezCanalPilotageDues $pilotage_due): RedirectResponse
    {
        $pilotage_due->update($request->validated());
        session()->flash('success', 'Pilotage Due Updated Successfully!');
        return redirect()->route('admin.pilotage_dues.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SuezCanalPilotageDues $pilotage_due
     * @return RedirectResponse
     */
    public function destroy(SuezCanalPilotageDues $pilotage_due): RedirectResponse
    {
        try {
            $pilotage_due->delete();
            session()->flash('success', 'Pilotage Due Deleted Successfully');
        } catch (Exception $e) {
            Log::error($e);
            session()->flash('error', 'Something went wrong!');
        }
        return redirect()->route('admin.pilotage_dues.index');
    }
}
