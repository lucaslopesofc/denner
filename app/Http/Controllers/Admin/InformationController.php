<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InformationFormRequest;
use Illuminate\Support\Facades\Storage;
use Session;

use App\Models\Information;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos = Information::where('id', '=', '1')->get();
        return view('admin.info.index', compact('infos'));
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
    public function update(InformationFormRequest $request, $id)
    {
        $infos = Information::find($id);

        $infos->desc         = $request->input('desc');
        $infos->facebook     = $request->input('facebook');
        $infos->instagram    = $request->input('instagram');
        $infos->street       = $request->input('street');
        $infos->neighborhood = $request->input('neighborhood');
        $infos->number       = $request->input('number');
        $infos->email        = $request->input('email');
        $infos->telephone    = $request->input('telephone');
        $infos->cellphone    = $request->input('cellphone');
        $infos->city         = $request->input('city');

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $path = $request->file('logo')->store('images', 'public');
            $oldFilename = $infos->logo;
            $infos->logo = $path;
            Storage::disk('public')->delete($oldFilename);
        }

        $infos->save();

        Session::put('success', 'Informações alteradas com sucesso.');

        return redirect()->route('admin.config.info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
