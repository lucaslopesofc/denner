<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PageFormRequest;
use Session;

use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
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
        $pages = Page::find($id);

        return view('admin.pages.editar', compact('pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageFormRequest $request, $id)
    {
        $pages = Page::find($id);
        
        $pages->title    = $request->input('title');
        $pages->subtitle = $request->input('subtitle');
        $pages->text1    = $request->input('text1');
        $pages->text2    = $request->input('text2');
        $pages->tags     = $request->input('tags');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $request->file('image')->store('images/pages', 'public');
            $oldFilename = $pages->image;
            $pages->image = $path;
            Storage::disk('public')->delete($oldFilename);
        }

        var_dump($pages);

        $pages->save();

        //Session::put('success', 'Slider alterado com sucesso.');

        return redirect()->route('admin.config.pages');
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
