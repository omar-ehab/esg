<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAboutRequest;
use App\Models\About;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $abouts = About::all();
        return view('admin.abouts.index', compact('abouts'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param About $about
     * @return Application|Factory|View
     */
    public function edit(About $about): View|Factory|Application
    {
        return view('admin.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAboutRequest $request
     * @param About $about
     * @return RedirectResponse
     */
    public function update(UpdateAboutRequest $request, About $about): RedirectResponse
    {
        $about->update($request->validated());
        session()->flash('success', 'About Updated Successfully');
        return redirect()->route('admin.about.index');
    }
}
