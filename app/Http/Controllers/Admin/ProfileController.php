<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('admin.profile.index');
    }

    /**
     * @param UpdateProfileRequest $request
     * @return RedirectResponse
     */
    public function change_data(UpdateProfileRequest $request): RedirectResponse
    {
        auth()->user()->update($request->validated());
        session()->flash('success', 'Profile Data Updated Successfully');
        return redirect()->back();
    }

    /**
     * @param UpdateUserPasswordRequest $request
     * @return RedirectResponse
     */
    public function change_password(UpdateUserPasswordRequest $request): RedirectResponse
    {
        auth()->user()->update([
            'password' => bcrypt($request->validated()['password'])
        ]);
        session()->flash('success', 'Password Updated Successfully');
        return redirect()->route('admin.users.index');
    }
}
