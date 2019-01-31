<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonyFormRequest;

use App\Models\Testimony;

class DepoimentoController extends Controller
{
    public function index()
    {
        $testimonies = Testimony::orderBy('id', 'desc')->paginate(6);
        return view('site.depoimento.index', compact('testimonies'));
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

        return redirect()->route('depoimento');
    }
}
