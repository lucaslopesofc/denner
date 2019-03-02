<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Session;

use App\Models\Testimony;

class PendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonies = Testimony::where('status', '=', '0')->orderBy('created_at', 'desc')->paginate(8);
        return view('admin.testimony.pending', compact('testimonies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $testimonies = Testimony::find($id);

        $testimonies->status = '1';

        $testimonies->save();

        Session::put('success', 'Este depoimento foi aceito com sucesso.');

        return redirect()->route('admin.testimony.pending');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonies = Testimony::find($id);

        if ($testimonies->photo != 'images/testemunhas/perfil.jpg') {
            $photo = $testimonies->photo;
            Storage::disk('public')->delete($photo);
            $testimonies->delete();
        }else{
            $testimonies->delete();
        }

        Session::put('success', 'Este depoimento foi deletado com sucesso.');

        return redirect()->route('admin.testimony.pending');
    }
}
