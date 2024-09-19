<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use PDF;
use Alert;
class GuardController extends Controller
{
    //ALL FUNCTION OF ROLE

    public function addrole(){
        return view('guard.role.addRole');
    }

    public function storerole(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:roles',
            'guard_name' => 'required',
        ]);
        //dd($request->all()); die();
        Role::create(['name' => $request->name]);
        Alert::success('Registro Exitoso', 'Mostrando Registros');
        return back();
    }

    //EDIT ROLE OF USER

    public function updtmodelhasrole($user_id, $role_id){
        DB::table('model_has_roles')->where('model_id', $user_id)
        ->update(['role_id' => $role_id]);
    }

    public function edituserrole($user_id){
        $user = User::FindOrFail($user_id);
        $roles = Role::select('id', 'name')->where('name', '!=', $user->rol)
        ->orderBy('name', 'Asc')
        ->get();
        //dd($role); die();
        return view('guard.role.editUserRoles', compact('user', 'roles'));
    }

    public function updateuserrole(Request $request, $user_id){
        $user = User::FindOrFail($user_id);
        //dd($role, $users); die();
        $validated = $request->validate([
            'user_rol' => 'required',
        ]);
        $role = Role::FindOrFail($request->user_rol);
        $this->updtmodelhasrole($user_id, $role->id);
        $user->rol = $role->name;
        $user->save();
        //UPDATE TABLE MODEL HAS ROLES
        Alert::success('Datos Actualizados', 'Mostrando Registros');
        return redirect()->route('userrole.index');
    }

    //EDIT ROLE
    public function editrole($role_id){
        $role = Role::FindOrFail($role_id);
        //dd($role); die();
        return view('guard.role.editRoles')->with('role', $role);
    }

    public function updtroleuser($new_name, $actual_name){
        //UPDATE USER ROL IN MODEL USER
        $users = User::select('id', 'rol')->where('rol', $actual_name)->get();
        foreach ($users as $user) {
            $specific_user = User::find($user->id);
            $specific_user->rol = $new_name;
            $specific_user->save();
        }
    }

    public function updaterole(Request $request, $role_id){
        $role = Role::FindOrFail($role_id);
        $actual_name = $role->name;
        //dd($role, $users); die();
        $validated = $request->validate([
            'name' => 'required',
        ]);
        $role->name = $request->name;
        $role->save();
        //UPDT USER
        $this->updtroleuser($request->name, $actual_name);
        Alert::success('Datos Actualizados', 'Mostrando Registros');
        //alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('role.index');
    }

    public function viewroles(){
        //$roles = DB::table('roles')->orderBy('name', 'Asc')
        $roles = Role::select('id', 'name', 'guard_name', 'created_at')
        ->orderBy('name', 'Asc')
        ->paginate(10);
        //dd($roles); die();
        return view ('guard.role.viewRoles')->with('roles', $roles);
    }

    public function viewuserroles(){
        //$roles = DB::table('roles')->orderBy('name', 'Asc')
        $users = User::select('id', 'name', 'lastname', 'username', 'email', 'rol')
        ->orderBy('lastname', 'Asc')
        ->paginate(10);
        //dd($roles); die();
        return view ('guard.role.viewUsersRoles')->with('users', $users);
    }

    public function allpdf(){
        $roles = Role::select('name', 'guard_name', 'created_at')
        ->orderBy('name', 'Asc')
        ->get();
        $fecha = now();
        $cantidad = count($roles);   
        $pdf = PDF::loadView('guard.role.staticpdf', compact('roles','fecha','cantidad'));
        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('system_roles.pdf');
    }

    public function alluserrolepdf(){
        $users = User::select('name', 'lastname', 'username', 'email', 'rol')
        ->orderBy('rol', 'Asc')
        ->get();
        $fecha = now();
        $cantidad = count($users);   
        $pdf = PDF::loadView('guard.role.user-roles-staticpdf', compact('users','fecha','cantidad'));
        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('users_roles.pdf');
    }

    //ALL FUNCTION OF PERMISSION
    public function addpermission(){
        $routes = collect(\Route::getRoutes())->map(function ($route) {  
            return [
                'route_name' => $route->getName(),
            ];
        });
        return view('guard.permission.addPermission')->with('routes', $routes);
    }

    public function adduserpermission(){
        $permissions = Permission::select('id', 'name')
        ->orderBy('name', 'Asc')
        ->get();
        $roles = Role::select('id', 'name')->orderBy('name', 'Asc')->get();
        return view('guard.permission.addUserPermission', compact('permissions', 'roles'));
    }

    public function storepermission(Request $request){
        $validated = $request->validate([
            'routes' => 'required',
            'guard_name' => 'required',
        ]);
        //dd($request->all()); die();
        foreach ($request->routes as $key => $value) {
            //dd($value); die();
            if (DB::table('permissions')->where('name', $value)->doesntExist()) {
                Permission::create(['name' => $value]);
            }
        }
        Alert::success('Datos Registrados', 'Mostrando Registros');
        return redirect()->route('permission.index');
    }

    public function storeuserpermission(Request $request){
        $validated = $request->validate([
            'permissions' => 'required',
            'role_id' => 'required',
        ]);
        //dd($request->all()); die();
        $role = Role::find($request->role_id);
        foreach ($request->permissions as $permission ) {
            if (!($role->hasPermissionTo($permission))) {
                $role->givePermissionTo($permission);
            }
        }
        Alert::success('Datos Registrados', 'Mostrando Registros');
        return redirect()->route('userpermission.index');
    }

    public function viewpermissions(){
        $permissions = Permission::select('id', 'name', 'guard_name', 'created_at')
        ->orderBy('name', 'Asc')
        ->paginate(10);
        return view('guard.permission.viewPermissions')->with('permissions', $permissions);
    }

    public function viewuserpermissions(){
        $roles = Role::select('id', 'name')
        ->orderBy('name', 'Asc')
        ->paginate(10);
        //dd($assignments, $roles); die();
        return view('guard.permission.viewUserPermissions')->with('roles', $roles);
    }

    public function viewuserpermissionslist($role_id){
        $role = Role::select('id', 'name')->where('id', $role_id)->first();
        //$role->permissions->pluck('name');
        $assignments = DB::table('role_has_permissions')
        ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
        ->where('role_id', $role_id)
        ->orderBy('permissions.name', 'Asc')
        ->paginate(10);
        return view('guard.permission.viewUserPermissionslist', compact('assignments', 'role'));
    }

    public function destroyuserpermission($permission_name, $role_id){
        //dd($permission_name, $role_id); die();
        $role = Role::find($role_id);
        $role->revokePermissionTo($permission_name);
        Alert::success('Permiso Revocado', 'Mostrando Registros');
        return back();
    }

    public function allpermissionpdf(){
        $permissions = Permission::select('name', 'guard_name', 'created_at')
        ->orderBy('name', 'Asc')
        ->get();
        $fecha = now();
        $cantidad = count($permissions);   
        $pdf = PDF::loadView('guard.permission.staticpdf', compact('permissions','fecha','cantidad'));
        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('system_permissions.pdf');
    }
}
