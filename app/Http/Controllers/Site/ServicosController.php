<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Information;
use App\Models\Service;

class ServicosController extends Controller
{
    public function index()
    {
        $service = Service::all();
        $infos   = Information::where('id', '=', '1')->get();
        return view('site.servicos.index', compact('service', 'infos'));
    }
}
