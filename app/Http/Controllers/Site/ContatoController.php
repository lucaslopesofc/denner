<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Session;
use App\Http\Requests\ContactFormRequest;

use App\Models\Information;
use App\Mail\ContatoEmail;

class ContatoController extends Controller
{
    public function index()
    {
        $infos = Information::where('id', '=', '1')->get();
        return view('site.contato.index', compact('infos'));
    }

    public function send(ContactFormRequest $request)
    {
        Mail::to('easycodecachoeiro@gmail.com')->send(new ContatoEmail($request));

        Session::put('success', 'Email enviado com sucesse. Por favor aguarde a resposta.');

        return redirect()->route('contato');
    }
}
