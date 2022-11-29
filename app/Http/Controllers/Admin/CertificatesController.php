<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Models\Certificate;
use App\services\ImageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class CertificatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $certificates = Certificate::all();
        return view('admin.certificates.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.certificates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCertificateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateCertificateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['image_path'] = ImageService::saveCertificateImage($data['image']);
        Certificate::create($data);
        session()->flash('success', 'Certificated Created Successfully!');
        return redirect()->route('admin.certificates.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Certificate $certificate
     * @return Application|Factory|View
     */
    public function edit(Certificate $certificate): View|Factory|Application
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCertificateRequest $request
     * @param Certificate $certificate
     * @return RedirectResponse
     */
    public function update(UpdateCertificateRequest $request, Certificate $certificate): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image_path'] = ImageService::updateCertificateImage($request->file('image'), $certificate->image_path);
        }
        $certificate->update($data);
        session()->flash('success', 'Certificated Updated Successfully!');
        return redirect()->route('admin.certificates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Certificate $certificate
     * @return RedirectResponse
     */
    public function destroy(Certificate $certificate): RedirectResponse
    {
        try {
            if (!is_null($certificate->image_path)) {
                ImageService::delete($certificate->image_path);
            }
            $certificate->delete();
            session()->flash('success', 'Certificate Deleted Successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', 'Something went wrong');
        }
        return redirect()->route('admin.certificates.index');
    }
}
