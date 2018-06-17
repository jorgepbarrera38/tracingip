<?php

namespace App\Http\Controllers;

use App\User;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('users.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50|unique:users',
            'username' => 'required|string|max:30|unique:users',
            'password' => 'required|string|max:30',
        ], [], [
            'name' => 'Nombres',
            'username' => 'Nombre de usuario',
            'password' => 'Contraseña',
        ]);
        
        $user = (new User)->fill($data);
        $user->password = bcrypt($data['password']);
        $user->save();
        $user->permissions()->sync($request->input('permissions'));

        return redirect()->route('users.index')->with('info', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $permissions = Permission::all();
        return view('users.edit', compact('user', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50|unique:users,name,'.$user->id,
            'username' => 'required|string|max:30|unique:users,username,'.$user->id,
            'password' => 'max:30',
        ], [], [
            'name' => 'Nombres',
            'username' => 'Nombre de usuario',
            'password' => 'Contraseña',
        ]);
        $user->name = $data['name'];
        $user->username = $data['username'];
        if($data['password']){
            $user->password = bcrypt($data['password']);
        }
        $user->save();
        $user->permissions()->sync($request->input('permissions'));
        return redirect()->route('users.index')->with('info', 'Usuario actualizado correctamente');
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
