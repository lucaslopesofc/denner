<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\Information;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    public function index()
    {
        $blog = DB::table('blogs')
                ->orderBy('id', 'desc')
                ->where('status', '=', '1')
                ->join('users', 'blogs.user_id', '=', 'users.id')
                ->select('blogs.*', 'users.name')
                ->paginate(5);

        $category = Category::all();
        $infos    = Information::where('id', '=', '1')->get();
        $latest   = DB::table('blogs')->latest()->paginate(4);

        return view('site.blog.index', compact('infos','blog', 'category', 'latest'));
    }

    public function show($slug)
    {
        $blog = DB::table('blogs')
                ->where('slug', '=', $slug)
                ->join('categories', 'blogs.category_id', '=', 'categories.id')
                ->join('users', 'blogs.user_id', '=', 'users.id')
                ->select('blogs.*', 'categories.name as catName', 'users.name as userName')
                ->get();

        $infos    = Information::where('id', '=', '1')->get();
        $latest   = DB::table('blogs')->latest()->paginate(4);
        $category = Category::all();

        return view('site.blog.detalhe', compact('infos', 'blog', 'latest', 'category'));
    }
}
