<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

use App\Models\Information;
use App\Mail\ContatoEmail;

class ContatoController extends Controller
{
    public function index()
    {
        $infos = Information::where('id', '=', '1')->get();
        return view('site.contato.index', compact('infos'));
    }

    public function send(Request $request)
    {
        Mail::to('easycodecachoeiro@gmail.com')->send(new ContatoEmail($request));
        return redirect()->route('contato');
    }
}
