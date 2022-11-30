<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMaritimeLawsRequest;
use App\Models\MaritimeLaw;
use App\Services\MaritimeLawService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class MaritimeLawsController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $laws = MaritimeLaw::all();
        return view('admin.maritime_laws.index', compact('laws'));

    }

    /**
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('admin.maritime_laws.create');
    }

    /**
     * @param CreateMaritimeLawsRequest $request
     * @return RedirectResponse
     */
    public function store(CreateMaritimeLawsRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['pdf_path'] = MaritimeLawService::savePdf($request->file('pdf_file'));
        MaritimeLaw::create($data);
        session()->flash('success', 'Maritime Law Created Successfully!');
        return redirect()->route('admin.maritime_laws.index');
    }

    /**
     * @param MaritimeLaw $maritimeLaw
     * @return RedirectResponse
     */
    public function destroy(MaritimeLaw $maritimeLaw): RedirectResponse
    {
        try {
            MaritimeLawService::delete($maritimeLaw->pdf_path);
            $maritimeLaw->delete();
            session()->flash('success', 'Maritime Law Deleted Successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', 'Something went wrong');
        }
        return redirect()->route('admin.maritime_laws.index');
    }
}
