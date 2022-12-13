<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuezCanalTierRequest;
use App\Models\SuezCanalTiers;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class TiersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $tiers = SuezCanalTiers::all();
        return view('admin.tiers.index', compact('tiers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('admin.tiers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SuezCanalTierRequest $request
     * @return RedirectResponse
     */
    public function store(SuezCanalTierRequest $request): RedirectResponse
    {
        SuezCanalTiers::create($request->validated());
        session()->flash('success', 'Tier Created Successfully');
        return redirect()->route('admin.tiers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SuezCanalTiers $tier
     * @return Application|Factory|View
     */
    public function edit(SuezCanalTiers $tier): View|Factory|Application
    {
        return view('admin.tiers.edit', compact('tier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SuezCanalTierRequest $request
     * @param SuezCanalTiers $tier
     * @return RedirectResponse
     */
    public function update(SuezCanalTierRequest $request, SuezCanalTiers $tier): RedirectResponse
    {
        $tier->update($request->validated());
        session()->flash('success', 'Tier Updated Successfully');
        return redirect()->route('admin.tiers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SuezCanalTiers $tier
     * @return RedirectResponse
     */
    public function destroy(SuezCanalTiers $tier): RedirectResponse
    {
        try {
            $tier->delete();
            session()->flash('success', 'Tier Deleted Successfully');
        } catch (Exception $e) {
            Log::error($e);
            session()->flash('error', 'Something went wrong!');
        }
        return redirect()->route('admin.tiers.index');
    }
}
