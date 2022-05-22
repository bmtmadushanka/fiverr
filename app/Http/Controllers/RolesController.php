<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\RolePermission;
class RolesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the role dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('role.create');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $files = [];
        if($request->hasfile('attachment'))
         {
            foreach($request->file('attachment') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('attachment'), $name);  
                $files[] = $name;  
            }
         }else{
            $files = '';
         }
         $lastId = Role::create([
            'role' => $input['role'],
        ]);
       foreach ($request['permission_id'] as $key => $value) {

            $per = new RolePermission();
            $per->permission_id = $value;
            $per->role_id = $lastId->id;
            $per->save();
        }
       alert()->success('Successfull!','Your role is created.');
       return redirect()->route('roles');
    }


    /**
     * Load page with add/edit user data
     *
     * @param  mixed $roleID
     * @return View
     */
    public function edit($role_id)
    {

        $roles = Role::find($role_id);
        $selected_role_permission = RolePermission::where('role_id', $role_id)->pluck('permission_id')->toArray();
       
        return view('role.edit',compact('roles','selected_role_permission'));

    }


    public function update(Request $request, $role_id)
    {

        $roles = Role::find($role_id);
        $roles->role = $request->role;
        $roles->save();

        RolePermission::where('role_id', $role_id)->delete();
        foreach ($request['permission_id'] as $key => $value) {

            $per = new RolePermission();
            $per->permission_id = $value;
            $per->role_id = $role_id;
            $per->save();
        }

        alert()->success('Successfull!','Your role is edited.');
        return redirect()->route('roles');

    }

    public function delete(Request $request , $role_id)
    {
        RolePermission::where('role_id', $role_id)->delete();
        Role::where('id',$role_id)->delete();
        alert()->success('Successfull!','your role deleted.');
        return redirect()->route('roles');
    }

    public function permission(Request $reques)
    {
        $data['selected_permissions'] = RolePermission::where('role_id', $reques->role_id)->pluck('permission_id')->toArray();

        echo json_encode($data);       
    }
}
