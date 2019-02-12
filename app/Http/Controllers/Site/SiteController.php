<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Testimony;
use App\Models\Slider;
use App\Models\Page;
use App\Models\Information;

class SiteController extends Controller
{
    public function index()
    {
        $testimonies = Testimony::where('status', '=', '1')->orderBy('id', 'desc')->paginate(6);
        $slider      = Slider::where('status', '=', '1')->get();
        $pages       = Page::where('tags', '=', 'Home')->get();
        $infos       = Information::where('id', '=', '1')->get();
        return view('site.home.index', compact(['testimonies', 'slider', 'pages', 'infos']));
    }
}
