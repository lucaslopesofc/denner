<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Information;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    public function index()
    {
        $infos = Information::where('id', '=', '1')->get();
        return view('site.blog.index', compact('infos'));
    }

    public function edit($id)
    {
        $infos = Information::where('id', '=', '1')->get();
        $blog  = Blog::find($id);
        return view('site.blog.detalhe', compact('infos', 'blog'));
    }
}
