<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\Information;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;

class BlogController extends Controller
{
    public function index()
    {

        $blog = DB::table('blogs')
                ->orderBy('id', 'desc')
                ->where('status', '=', '1')
                ->join('users', 'blogs.user_id', '=', 'users.id')
                ->join('categories', 'blogs.category_id', '=', 'categories.id')
                ->select('blogs.*', 'users.name', 'categories.name as catName')
                ->paginate(5);

        $infos    = Information::where('id', '=', '1')->get();
        $latest   = DB::table('blogs')->latest()->paginate(4);;

        return view('site.blog.index')
        ->with('blog', $blog)
        ->with('infos', $infos)
        ->with('latest', $latest);
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', '=', $slug)
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
            ->join('users', 'blogs.user_id', '=', 'users.id')
            ->select('blogs.*', 'categories.name as catName', 'users.name as userName')
            ->first();

        $infos    = Information::where('id', '=', '1')->get();
        $latest   = DB::table('blogs')->latest()->paginate(4);

        return view('site.blog.detalhe')
        ->with('blog', $blog)
        ->with('infos', $infos)
        ->with('latest', $latest)
        ->with('comment',Comment::where('blog_id','=',$blog->id)->get());
    }
}
