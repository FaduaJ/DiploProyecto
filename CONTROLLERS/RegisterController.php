<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Image;
use Alert;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function create(){
        $roles = Role::select('name')->orderBy('name', 'Asc')
        ->get();
        return view('auth.register')->with('roles', $roles);
    }
    
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'rol' => 'required',
        ]);
        //dd($request->all()); die();
        $user = new User;
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->rol = $request->rol;
        $user->save();
        //PUT ROLE 
        $user->assignRole($request->rol);
        Alert::success('Registro Exitoso', 'Inicie Sesion');
        return redirect()->route('login.index');
    }

    public function edit(){
        $id = auth()->user()->id;
        $usuario = User::find($id);
        return view('auth.useredit', compact('usuario'));
    }

    public function editpassword(){
        $id = auth()->user()->id;
        $usuario = User::find($id);
        return view('auth.password', compact('usuario'));
    }

    public function updatepassword(Request $request){
        $validated = $request->validate([
            'password' => 'required|confirmed',
        ]);
        $id = auth()->user()->id;
        $usuario = User::find($id);
        $usuario->password = $request->password;
        $usuario->save();
        Alert::success('Password Actualizado', 'Gracias');
        return redirect()->route('portal.index');
        //return redirect()->route('login.destroy');
    }

    public function update(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'img' => 'image|mimes:jpg,png,jpeg|max:5120',
        ]);
        $id = auth()->user()->id;
        $usuario = User::find($id);
        if ($request->hasFile('img')) {
            if ($usuario->image != null) {
                Storage::disk('images')->delete($usuario->image);
                $usuario->image = null;
            }
            $user_img = $request->file('img')->store('users','images');
            $resized = Image::make(Storage::disk('images')->get($user_img))->resize(750, 600)->stream();
            $path = Storage::disk('images')->put($user_img, $resized);
            $usuario->image = $user_img;
        }
        
        $usuario->name = $request->name;
        $usuario->lastname = $request->lastname;
        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->save();
        //alert()->success('Perfil Actualizado','Gracias')->autoclose(2000);
        Alert::success('Perfil Actualizado', 'Gracias');
        return redirect()->route('portal.index');
    }

}
