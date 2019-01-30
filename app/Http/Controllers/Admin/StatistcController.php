<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StatisticFormRequest;

use App\Models\Statistic;

class StatistcController extends Controller
{
    public function index()
    {
        $stats = Statistic::orderBy('id', 'desc')->first();
        return view('admin.statistic.index', compact('stats'));
    }

    public function create()
    {
        return view('admin.statistic.index');
    }

    public function store(StatisticFormRequest $request)
    {
        $userLogged = auth()->user()->id;

        $stats = new Statistic();

        $stats->user_id = $userLogged;
        $stats->patient = $request->input('patient');
        $stats->diets   = $request->input('diets');
        $stats->recipe  = $request->input('recipe');

        $stats->save();

        return redirect()->route('admin.statistic');
    }
}
