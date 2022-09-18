<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CareersExport;
use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Job;
use App\services\CvService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CareersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $jobs = Job::all();
        $careers = Career::orderBy('created_at', 'DESC');
        if ($request->has('job') && $request->get('job') != 'all') {
            $careers = $careers->whereHas('job', function ($q) use ($request) {
                $q->where('id', $request->get('job'));
            });
        }
        $careers = $careers->get();
        return view('admin.careers.index', compact('careers', 'jobs'));
    }

    /**
     * @return BinaryFileResponse
     */
    public function export(): BinaryFileResponse
    {
        $filename = now()->format('d-m-Y') . '_careers.xlsx';
        return Excel::download(new CareersExport(), $filename);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Career $career
     * @return RedirectResponse
     */
    public function destroy(Career $career): RedirectResponse
    {
        try {
            CvService::delete($career->cv_path);
            $career->delete();
            session()->flash('success', 'Career Deleted Successfully');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', 'Something went wrong');
        }
        return redirect()->route('admin.careers.index');
    }
}
