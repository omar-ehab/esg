<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePortDetailsRequest;
use App\Http\Requests\UpdatePortDetailsRequest;
use App\Models\Port;
use App\Models\PortDetails;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class PortDetailsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Port $port
     * @return Application|Factory|View
     */
    public function create(Port $port): Application|Factory|View
    {
        return view('admin.port_details.create', compact('port'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePortDetailsRequest $request
     * @param Port $port
     * @return RedirectResponse
     */
    public function store(CreatePortDetailsRequest $request, Port $port): RedirectResponse
    {
        $data = $request->validated();
        $data['port_id'] = $port->id;
        $data['name'] = $data['title'];
        PortDetails::create($data);
        session()->flash('success', 'Port Details Created Successfully');
        return redirect()->route('admin.ports.show', $port->slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Port $port
     * @param PortDetails $portDetails
     * @return Application|Factory|View
     */
    public function edit(Port $port, PortDetails $portDetails): View|Factory|Application
    {
        return view('admin.port_details.edit', compact('port', 'portDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePortDetailsRequest $request
     * @param Port $port
     * @param PortDetails $portDetails
     * @return RedirectResponse
     */
    public function update(UpdatePortDetailsRequest $request, Port $port, PortDetails $portDetails): RedirectResponse
    {
        $data = $request->validated();
        $data['name'] = $data['title'];
        $portDetails->update($data);
        session()->flash('success', 'Port Details Created Successfully');
        return redirect()->route('admin.ports.show', $port->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Port $port
     * @param PortDetails $portDetails
     * @return RedirectResponse
     */
    public function destroy(Port $port, PortDetails $portDetails): RedirectResponse
    {
        try {
            $portDetails->delete();
            session()->flash('success', 'Port Details Deleted Successfully');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', 'Something went wrong');
        }
        return redirect()->route('admin.ports.show', $port->slug);
    }
}
