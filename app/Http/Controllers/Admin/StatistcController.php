<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Statistic;

class StatistcController extends Controller
{
    public function index()
    {
        $stats = Statistic::all();
        return view('admin.statistic.index', compact('stats'));
    }

    public function create()
    {
        return view('admin.statistic.index');
    }

    public function store(Request $request)
    {
        $stats = new Statistic();

        $stats->user_id = 1;
        $stats->patient = $request->input('patient');
        $stats->diets   = $request->input('diets');
        $stats->recipe  = $request->input('recipe');

        $stats->save();
    }
}
