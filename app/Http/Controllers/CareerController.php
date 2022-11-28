<?php

namespace App\Http\Controllers;

use App\Http\Requests\CareerRequest;
use App\Models\Banner;
use App\Models\Career;
use App\Models\Job;
use App\Models\Page;
use App\Services\CvService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

class CareerController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $page = Page::where('slug', 'career')->firstOrFail();
        $banner = Banner::where('page_id', $page->id)->first();
        $jobs = Job::all();

        return view('jobForm.index', [
            'banner' => $banner,
            'jobs' => $jobs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param CareerRequest $request
     * @return RedirectResponse
     */
    public function save(CareerRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['cv_path'] = CvService::saveCv($data['cv']);
        $job = Job::find($data['job_id']);
        try {
            Career::create($data);
        } catch (\Exception $e) {
            CvService::delete($data['cv_path']);
        }

        $message = "Thanks For Apply For " . $job->name . ", We will Contact You Soon";
        session()->flash('message', $message);
        return redirect()->back();
    }
}
