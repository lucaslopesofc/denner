<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Statistic;

class AdminController extends Controller
{
    public function index()
    {
        $stats = Statistic::orderBy('id', 'desc')->first();
        return view('admin.home.index', compact('stats'));
    }
}
