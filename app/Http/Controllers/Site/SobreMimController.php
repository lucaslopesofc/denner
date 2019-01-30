<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Statistic;

class SobreMimController extends Controller
{
    public function index()
    {
        $stats = Statistic::orderBy('id', 'desc')->first();
        return view('site.dennergrillo.index', compact('stats'));
    }
}
