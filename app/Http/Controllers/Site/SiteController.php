<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\Testimony;
use App\Models\Slider;
use App\Models\Page;
use App\Models\Information;
use App\Models\Blog;

class SiteController extends Controller
{
    public function index()
    {
        $testimonies = Testimony::where('status', '=', '1')->orderBy('id', 'desc')->paginate(6);
        $slider      = Slider::where('status', '=', '1')->get();
        $pages       = Page::where('tags', '=', 'Home')->get();
        $infos       = Information::where('id', '=', '1')->get();

        $blog = DB::table('blogs')
                ->where('status', '=', '1')
                ->orderBy('id', 'desc')
                ->join('users', 'blogs.user_id', '=', 'users.id')
                ->select('blogs.*', 'users.name')
                ->paginate(6);

        return view('site.home.index', compact(['testimonies', 'slider', 'pages', 'infos', 'blog']));
    }
}
