<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SubscribersExport;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SubscribersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View|Factory|Application
     */
    public function index(): View|Factory|Application
    {
        $subscribers = Subscriber::orderBy('created_at', 'DESC')->paginate(25);
        return view('admin.subscribers.index', compact('subscribers'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return BinaryFileResponse
     */
    public function export(): BinaryFileResponse
    {
        $filename = now()->format('d-m-Y') . '_subscribers.xlsx';
        return Excel::download(new SubscribersExport(), $filename);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Subscriber $subscriber
     * @return RedirectResponse
     */
    public function destroy(Subscriber $subscriber): RedirectResponse
    {
        try {
            $subscriber->delete();
            session()->flash('success', 'Subscriber Deleted Successfully');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', 'Something went wrong');
        }
        return redirect()->route('admin.subscribers.index');
    }
}
