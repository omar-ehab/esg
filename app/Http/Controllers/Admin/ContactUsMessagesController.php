<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ContactUsMessagesExport;
use App\Http\Controllers\Controller;
use App\Models\ContactUsMessage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ContactUsMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $messages = ContactUsMessage::with('country')
            ->orderBy('created_at', 'DESC')
            ->paginate(25);
        return view('admin.contact_us_messages.index', compact('messages'));
    }

    /**
     * @return BinaryFileResponse
     */
    public function export(): BinaryFileResponse
    {
        $filename = now()->format('d-m-Y') . '_contact_us_messages.xlsx';
        return Excel::download(new ContactUsMessagesExport(), $filename);
    }
}
