<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //
    public function index()
    {
        abort_if(Gate::denies('user_index'), 403);
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), 403);
        $roles = Role::all()->pluck('name', 'id');
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
         $request->validate([
             'name' => 'required|regex:([zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
             'email' => 'required|email|unique:users',
            'password' => 'required'
         ],
         [
            'name.required' => 'El campo es obligatorio.',
            'name.regex' => 'El formato del texto debe ser"letras"',
            'email.required' => 'El campo es obligatorio',
            'name.unique' => 'el correo ya existe',
            'password.required' => 'El campo es obligatorio',

         ]);
        $user = User::create($request->only('name', 'email')
            + [
                'password' => bcrypt($request->input('password')),
            ]);

        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario creado correctamente');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), 403);
        // $user = User::findOrFail($id);
        // dd($user);
        $user->load('roles');
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), 403);
        $roles = Role::all()->pluck('name', 'id');
        $user->load('roles');
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|regex:([zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
            'email' => 'required|email|unique:users',

        ],
        [
           'name.required' => 'El campo es obligatorio.',
           'name.regex' => 'El formato del texto debe ser"letras"',
           'email.required' => 'El campo es obligatorio',
           'email.unique' => 'el correo ya existe',


        ]);
        // $user=User::findOrFail($id);
        $data = $request->only('name', 'email');
        $password=$request->input('password');
        if($password)
            $data['password'] = bcrypt($password);
        // if(trim($request->password)=='')
        // {
        //     $data=$request->except('password');
        // }
        // else{
        //     $data=$request->all();
        //     $data['password']=bcrypt($request->password);
        // }

        $user->update($data);

        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_destroy'), 403);

        if (auth()->user()->id == $user->id) {
            return redirect()->route('users.index');
        }

        $user->delete();
        return back()->with('succes', 'Usuario eliminado correctamente');
    }
}
