<?php

namespace App\Http\Controllers;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Image;
use Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){
        $users = User::select('id', 'name', 'lastname', 'username', 'email', 'rol', 'updated_at')
        ->orderBy('lastname', 'Asc')
        ->paginate(10);
        return view ('users.viewUsers')->with('users', $users);
    }


    public function create(){
        $roles = Role::select('name')->orderBy('name', 'Asc')
        ->get();
        return view('users.addUser')->with('roles', $roles);
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
        Alert::success('Registro Exitoso', 'Mostrando Registros');
        return redirect()->route('users.index');
    }

    public function updpassword(Request $request, User $user){
        $validated = $request->validate([
            'password' => 'required|confirmed',
        ]);
        $user->password = $request->password;
        $user->save();
        Alert::success('Password Reseteado', 'Mostrando Registros');
        return redirect()->route('users.index');
    }

    public function search(Request $request){
        //dd($request->search_student); die();
        $users = User::select('id', 'name', 'lastname', 'username', 'email', 'rol')
        ->where('name','LIKE','%'.$request->search.'%')
        ->orWhere('lastname','LIKE','%'.$request->search.'%')
        ->orWhere('username','LIKE','%'.$request->search.'%')
        ->orWhere('email','LIKE','%'.$request->search.'%')
        ->orWhere('rol','LIKE','%'.$request->search.'%')
        ->orderBy('lastname', 'Asc')->paginate(10);

        if (count($users) != 0) {
            return view ('users.viewUsers')->with('users', $users);
        }

        Alert::error('Sin Coincidencias', 'La Consulta no genera datos');
        return redirect()->route('users.index');

    }

}
