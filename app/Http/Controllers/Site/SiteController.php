<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Testimony;
use App\Models\Statistic;

class SiteController extends Controller
{
    public function index()
    {
        $testimonies = Testimony::orderBy('id', 'desc')->get();
        return view('site.home.index', compact(['testimonies']));
    }
}
