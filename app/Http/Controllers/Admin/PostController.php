<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BlogFormRequest;
use App\Http\Requests\EditBlogFormRequest;
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
                ->orderBy('id', '=', 'desc')
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
            $path = 'images/blog/default.jpg';
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
        $blog->slug        = $request->input('slug');

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
        $blog       = Blog::find($id);
        $categories = Category::all();

        return view('admin.post.editar', compact('blog', 'categories'));
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
        $blog = Blog::find($id);

        if ($request->input('slug') == $blog->slug) {
            $rules = [
                'category' => 'required|integer',
                'title'    => 'required|max:100',
                'text'     => 'required',
                'image'    => 'mimes:jpeg,png,jpg|max:2048',
                'status'   => 'required'
            ];

            $messages = [
                'category.required' => 'Selecione uma categoria.',
                'category.integer'  => 'Nenhuma categoria selecionada, por favor escolha para prosseguir.',
                'title.required'    => 'O título é obrigatório.',
                'title.max'         => 'O título deve ter no máximo 100 caracteres.',
                'text.required'     => 'O texto da postagem é obrigatório.',
                'image.mimes'       => 'Formato de imagem inválida. Por favor selecione uma com apenas formatos JPEG/PNG/JPG.',
                'image.max'         => 'Imagem deve ter tamanho máximo de 2MB.',
                'status.required'   => 'O status é obrigatório.'
            ];
            $request->validate($rules, $messages);
        } else {
            $rules = [
                'category' => 'required|integer',
                'title'    => 'required|max:100',
                'slug'     => 'required|alpha_dash|min:5|max:191|unique:blogs,slug',
                'text'     => 'required',
                'image'    => 'mimes:jpeg,png,jpg|max:2048',
                'status'   => 'required'
            ];

            $messages = [
                'category.required' => 'Selecione uma categoria.',
                'category.integer'  => 'Nenhuma categoria selecionada, por favor escolha para prosseguir.',
                'title.required'    => 'O título é obrigatório.',
                'title.max'         => 'O título deve ter no máximo 100 caracteres.',
                'slug.required'     => 'O campo URL é obrigatório',
                'slug.alpha_dash'   => 'A URL não pode conter espaços e nem caracteres epeciais.',
                'slug.min'          => 'A URL deve ter no mínimo 5 caracateres.',
                'slug.max'          => 'A URL deve ter no máximo 191 caracteres.',
                'slug.unique'       => 'URL já existe, por favor digite outra.',
                'text.required'     => 'O texto da postagem é obrigatório.',
                'image.mimes'       => 'Formato de imagem inválida. Por favor selecione uma com apenas formatos JPEG/PNG/JPG.',
                'image.max'         => 'Imagem deve ter tamanho máximo de 2MB.',
                'status.required'   => 'O status é obrigatório.'
            ];
            $request->validate($rules, $messages);
        }

        $files             = $request->file('image');
        $blog->user_id     = Auth::user()->id;
        $blog->title       = $request->input('title');
        $blog->text        = $request->input('text');
        $blog->status      = $request->input('status');
        $blog->category_id = $request->input('category');
        $blog->slug        = $request->input('slug');

        if (!empty($files)) {
            if (!($blog->image == 'images/blog/default.jpg')) {
                $image         = $request->file('image');
                $path          = $request->file('image')->store('images/blog', 'public');
                $oldFilename   = $blog->image;
                $blog->image   = $path;
                Storage::disk('public')->delete($oldFilename);
            }else{
                $image         = $request->file('image');
                $path          = $request->file('image')->store('images/blog', 'public');
                $oldFilename   = $blog->image;
                $blog->image   = $path;
            }
        }

        $blog->save();

        Session::put('success', 'Postagem alterada com sucesso.');

        return redirect()->route('admin.post');
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

        if ($blog->image != 'images/blog/default.jpg') {
            $image = $blog->image;
            Storage::disk('public')->delete($image);
            $blog->delete();
        }else{
            $blog->delete();
        }

        Session::put('success', 'Postagem foi deletada com sucesso.');

        return redirect()->route('admin.post');
    }

    public function searchPost(Request $request)
    {
        $blog = Blog::where('title', 'like', '%'.$request->input('search').'%')
                    ->orderBy('title', 'desc')
                    ->join('categories', 'blogs.category_id', '=', 'categories.id')
                    ->select('blogs.*', 'categories.name')
                    ->paginate(5);

        return view('admin.post.index', compact('blog'));
    }

}