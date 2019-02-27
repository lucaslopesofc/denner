<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProfileFormRequest;
use App\User;
use Auth;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.user.index', compact('user'));
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
    public function update(ProfileFormRequest $request, $id)
    {
        $user = User::find($id);

        $user->name  = $request->input('name');
        $user->login = $request->input('login');
        $user->email = $request->input('email');

        if(!empty($request->input('password'))) {
            if(password_verify($request->input('password'), Auth::user()->password)) {
                $user = Auth::user();
                $user->password = bcrypt($request->input('newPassword'));
            }else{
                Session::put('error', 'Senha atual incorreta. Por favor digite a sua senha antiga corretamente.');
                return redirect()->route('admin.config.user');
            }
        }

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $path = $request->file('photo')->store('images/perfil', 'public');
            $oldFilename = $user->photo;
            $user->photo = $path;
            Storage::disk('public')->delete($oldFilename);
        }

        $user->save();

        Session::put('success', 'Informações do usuário alteradas com sucesso.');

        return redirect()->route('admin.config.user');
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
