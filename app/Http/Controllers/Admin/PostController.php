<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BlogFormRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Blog;
use App\Models\Category;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = DB::table('blogs')
                    ->join('categories', 'blogs.category_id', '=', 'categories.id')
                    ->select('blogs.*', 'categories.name')
                    ->paginate(5);

        return view('admin.post.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        return view('admin.post.novo', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogFormRequest $request)
    {
        if ($request->file('image') == null) {
            $path = 'images/blog/imagem.jpg';
        } else {
            $path = $request->file('image')->store('images/blog', 'public');
        }

        $blog = new Blog();
        
        $blog->user_id     = Auth::user()->id;
        $blog->image       = $path;
        $blog->title       = $request->input('title');
        $blog->text        = $request->input('text');
        $blog->status      = $request->input('status');
        $blog->category_id = $request->input('category');
        $blog->slug        = $this->criar_slug($request->input('title'));

        $blog->save();

        Session::put('success', 'Postagem cadastrada com sucesso.');

        return redirect()->route('admin.post');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);

        if ($blog->photo != 'images/blog/imagem.jpg') {
            $photo = $blog->photo;
            Storage::disk('public')->delete($photo);
            $blog->delete();
        }else{
            $blog->delete();
        }

        Session::put('success', 'Postagem foi deletada com sucesso.');

        return redirect()->route('admin.post');
    }

    function criar_slug($title)
    {
        $search     = ['ã','â','ê','é','í','õ','ô','ú',' '];
        $substituir = ['a','a','e','e','i','o','o','u','-'];
        return str_replace($search, $substituir,strtolower($title));
    }
}
