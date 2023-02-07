<?php

namespace App\Http\Controllers;

use App\Models\ScopeOfActivity;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ScopeOfActivitiesController extends Controller
{
    /**
     * @param ScopeOfActivity $scopeOfActivity
     * @return Factory|View|Application
     */
    public function show(ScopeOfActivity $scopeOfActivity): Factory|View|Application
    {
        $scopeOfActivity->load('page');
        $scopeOfActivities = ScopeOfActivity::all();
        return view('scope_of_activities.show', compact('scopeOfActivity', 'scopeOfActivities'));

    }
}
