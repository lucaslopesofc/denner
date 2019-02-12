<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Information;

class ServicosController extends Controller
{
    public function index()
    {
        $infos = Information::where('id', '=', '1')->get();
        return view('site.servicos.index', compact('infos'));
    }
}
