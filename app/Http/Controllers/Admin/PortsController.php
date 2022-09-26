<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePortRequest;
use App\Http\Requests\UpdatePortRequest;
use App\Models\Port;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class PortsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $ports = Port::orderBy('slug', 'ASC')->get();
        return view('admin.ports.index', compact('ports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.ports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePortRequest $request
     * @return RedirectResponse
     */
    public function store(CreatePortRequest $request): RedirectResponse
    {
        Port::create($request->validated());
        session()->flash('success', 'Port Created Successfully');
        return redirect()->route('admin.ports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Port $port
     * @return Application|Factory|View
     */
    public function show(Port $port): View|Factory|Application
    {
        $port->load('details');
        return view('admin.ports.show', compact('port'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Port $port
     * @return Application|Factory|View
     */
    public function edit(Port $port): View|Factory|Application
    {
        return view('admin.ports.edit', compact('port'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePortRequest $request
     * @param Port $port
     * @return RedirectResponse
     */
    public function update(UpdatePortRequest $request, Port $port): RedirectResponse
    {
        $port->update($request->validated());
        session()->flash('success', 'Port Updated Successfully');
        return redirect()->route('admin.ports.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Port $port
     * @return RedirectResponse
     */
    public function destroy(Port $port): RedirectResponse
    {
        try {
            $port->delete();
            session()->flash('success', 'Port Deleted Successfully');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', 'Something went wrong');
        }
        return redirect()->route('admin.ports.index');
    }
}
