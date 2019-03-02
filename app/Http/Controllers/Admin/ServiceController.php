<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Service;
use App\Http\Requests\ServiceFormRequest;
use Session;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$service = Service::all()->paginate(5);
        $service = DB::table('services')->paginate(4);
        return view('admin.service.index', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.novo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceFormRequest $request)
    {
        if ($request->file('image') == null) {
            $path = 'images/services/default.jpg';
        } else {
            $path = $request->file('image')->store('images/services', 'public');
        }

        $service = new Service();

        $service->image = $path;
        $service->title = $request->input('title');
        $service->text  = $request->input('text');

        $service->save();

        Session::put('success', 'Serviço cadastrado com sucesso.');

        return redirect()->route('admin.service');
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
        $service = Service::find($id);
        return view('admin.service.editar', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceFormRequest $request, $id)
    {
        $service = Service::find($id);
        
        $service->title = $request->input('title');
        $service->text  = $request->input('text');
        $files          = $request->file('image');

        if (!empty($files)) {
            if (!($service->image == 'images/services/default.jpg')) {
                $image          = $request->file('image');
                $path           = $request->file('image')->store('images/services', 'public');
                $oldFilename    = $service->image;
                $service->image = $path;
                Storage::disk('public')->delete($oldFilename);
            }else{
                $image          = $request->file('image');
                $path           = $request->file('image')->store('images/services', 'public');
                $oldFilename    = $service->image;
                $service->image = $path;
            }
        }

        $service->save();

        Session::put('success', 'Serviço alterado com sucesso.');

        return redirect()->route('admin.service');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);

        if ($service->image != 'images/services/default.jpg') {
            $image = $service->image;
            Storage::disk('public')->delete($image);
            $service->delete();
        }else{
            $service->delete();
        }

        Session::put('success', 'Este serviço foi deletado com sucesso.');

        return redirect()->route('admin.service');
    }
}
