<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SliderFormRequest;
use Session;

use App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::orderBy('id')->paginate(4);
        return view('admin.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.novo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderFormRequest $request)
    {
        $path = $request->file('image')->store('images/slider', 'public');

        $slider = new Slider();

        $slider->image   = $path;
        $slider->link    = $request->input('link');
        $slider->status  = $request->input('status');

        $slider->save();

        Session::put('success', 'Slider cadastrado com sucesso.');

        return redirect()->route('admin.slider');
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
        $slider = Slider::find($id);

        if(isset($slider)) {
            return view('admin.slider.editar', compact('slider'));
        }

        return view('admin.slider');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderFormRequest $request, $id)
    {
        $slider = Slider::find($id);

        $slider->link   = $request->input('link');
        $slider->status = $request->input('status');

        if ($request->hasFile('image')) {
            $image         = $request->file('image');
            $path          = $request->file('image')->store('images/slider', 'public');
            $oldFilename   = $slider->image;
            $slider->image = $path;
            Storage::disk('public')->delete($oldFilename);
        }

        $slider->save();

        Session::put('success', 'Slider alterado com sucesso.');

        return redirect()->route('admin.slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);

        $image = $slider->image;
        Storage::disk('public')->delete($image);
        $slider->delete();

        Session::put('success', 'Slider deletado com sucesso.');

        return redirect()->route('admin.slider');
    }
}
