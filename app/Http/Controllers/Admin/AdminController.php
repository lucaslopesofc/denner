<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\Statistic;
use App\Models\Testimony;
use App\Models\Comment;

class AdminController extends Controller
{
    public function index()
    {
        $stats       = Statistic::orderBy('id', 'desc')->first();
        $testimonies = Testimony::where('status', '=', '0')->orderBy('created_at', 'desc')->paginate(6);
        $comment = DB::table('comments')
            ->join('blogs', 'blogs.id', '=', 'comments.blog_id')
            ->select('comments.*', 'blogs.title')
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('admin.home.index', compact('stats', 'testimonies', 'comment'));
    }
}
