<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuezCanalCostRequest;
use App\Models\SuezCanalCost;
use App\Models\SuezCanalShipType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SuezCanalCostsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $shipTypes = SuezCanalShipType::with('costs')->orderBy('created_at')->get();
        return view('admin.suez_canal_costs.index', compact('shipTypes'));
    }

    public function edit(SuezCanalCost $cost): Factory|View|Application
    {
        return view('admin.suez_canal_costs.edit', compact('cost'));
    }

    public function update(SuezCanalCostRequest $request, SuezCanalCost $cost): RedirectResponse
    {
        $cost->update($request->validated());
        return redirect()->route('admin.suez_canal_costs.index');
    }
}
