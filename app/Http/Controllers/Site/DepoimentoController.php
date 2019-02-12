<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonyFormRequest;
use Session;

use App\Models\Testimony;
use App\Models\Information;

class DepoimentoController extends Controller
{
    public function index()
    {
        $testimonies = Testimony::where('status', '=', '1')->orderBy('id', 'desc')->paginate(6);
        $infos = Information::where('id', '=', '1')->get();
        return view('site.depoimento.index', compact('testimonies', 'infos'));
    }

    public function create()
    {
        return view('site.depoimento.index');
    }

    public function store(TestimonyFormRequest $request)
    {
        if ($request->file('photo') == null) {
            $path = 'images/testemunhas/perfil.jpg';
        } else {
            $path = $request->file('photo')->store('images/testemunhas', 'public');
        }

        $tes = new Testimony();

        $tes->user_id = 1;
        $tes->name    = $request->input('name');
        $tes->city    = $request->input('city');
        $tes->comment = $request->input('comment');
        $tes->photo   = $path;

        $tes->save();

        Session::put('success', 'Depoimento enviado com sucesso. Por favor aguarde aprovação.');

        return redirect()->route('depoimento');
    }
}
