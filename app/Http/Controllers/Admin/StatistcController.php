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
        $userLogged = auth()->user()->id;

        $stats = new Statistic();

        if(!isset($stats)) {
            $stats->user_id = $userLogged;
            $stats->patient = $request->input('patient');
            $stats->diets   = $request->input('diets');
            $stats->recipe  = $request->input('recipe');
        }else{
            $stats->delete();
            $stats->user_id = $userLogged;
            $stats->patient = $request->input('patient');
            $stats->diets   = $request->input('diets');
            $stats->recipe  = $request->input('recipe');
        }

        //$stats->user_id = $userLogged;
        //$stats->patient = $request->input('patient');
        //$stats->diets   = $request->input('diets');
        //$stats->recipe  = $request->input('recipe');

        $stats->save();
    }
}
