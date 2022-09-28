<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use App\Services\ImageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateNewsRequest $request
     * @return RedirectResponse
     */
    public function store(CreateNewsRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['image_path'] = ImageService::saveNewsImage($data['image']);
        News::create($data);
        session()->flash('success', 'News Created Successfully!');
        return redirect()->route('admin.news.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return Application|Factory|View
     */
    public function edit(News $news): View|Factory|Application
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateNewsRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(UpdateNewsRequest $request, News $news): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image_path'] = ImageService::updateNewsImage($request->file('image'), $news->image_path);
        }
        $news->update($data);
        session()->flash('success', 'News Updated Successfully!');
        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return RedirectResponse
     */
    public function destroy(News $news): RedirectResponse
    {
        try {
            if (!is_null($news->image_path)) {
                ImageService::delete($news->image_path);
            }
            $news->delete();
            session()->flash('success', 'News Deleted Successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', 'Something went wrong');
        }
        return redirect()->route('admin.news.index');
    }
}
