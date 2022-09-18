<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $jobs = Job::orderBy('name', 'ASC')->get();
        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateJobRequest $request
     * @return RedirectResponse
     */
    public function store(CreateJobRequest $request)
    {
        Job::create($request->validated());
        session()->flash('success', 'Job Created Successfully');
        return redirect()->route('admin.jobs.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Job $job
     * @return Application|Factory|View
     */
    public function edit(Job $job): View|Factory|Application
    {
        return view('admin.jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateJobRequest $request
     * @param Job $job
     * @return RedirectResponse
     */
    public function update(UpdateJobRequest $request, Job $job): RedirectResponse
    {
        $job->update($request->validated());
        session()->flash('success', 'Job Updated Successfully');
        return redirect()->route('admin.jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Job $job
     * @return RedirectResponse
     */
    public function destroy(Job $job): RedirectResponse
    {
        $job->delete();
        session()->flash('success', 'Job Deleted Successfully');
        return redirect()->route('admin.jobs.index');
    }
}
