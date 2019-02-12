<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Statistic;
use App\Models\Page;
use App\Models\Information;

class SobreMimController extends Controller
{
    public function index()
    {
        $stats = Statistic::orderBy('id', 'desc')->first();
        $pages = Page::where('tags', '=', 'Sobre Mim 1')->get();
        $pages2 = Page::where('tags', '=', 'Sobre Mim 2')->get();
        $infos       = Information::where('id', '=', '1')->get();
        return view('site.dennergrillo.index', compact('stats', 'pages', 'pages2', 'infos'));
    }
}
