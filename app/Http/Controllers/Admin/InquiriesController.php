<?php

namespace App\Http\Controllers\Admin;

use App\Exports\InquiriesExport;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Inquiry;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class InquiriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $countries = Country::all();
        $inquiries = Inquiry::with('country')->when($request->has('service'), function ($q) use ($request) {
            $q->where('service', $request->get('service'));
        })->when($request->has('country'), function ($q) use ($request) {
            $q->whereHas('country', function ($query) use ($request) {
                $query->where('id', $request->get('country'));
            });
        })->orderBy('created_at', 'DESC')->get();

        return view('admin.inquiries.index', compact('inquiries', 'countries'));
    }

    /**
     * Export a listing of the resource.
     *
     * @return BinaryFileResponse
     */
    public function export(): BinaryFileResponse
    {
        $filename = now()->format('d-m-Y') . '_inquiries.xlsx';
        return Excel::download(new InquiriesExport(), $filename);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Inquiry $inquiry
     * @return RedirectResponse
     */
    public function destroy(Inquiry $inquiry): RedirectResponse
    {
        try {
            $inquiry->delete();
            session()->flash('success', 'Inquiry Deleted Successfully');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', 'Something went wrong');
        }
        return redirect()->route('admin.inquiries.index');
    }
}
