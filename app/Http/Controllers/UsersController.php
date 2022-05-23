<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\UserPermission;
use Hash;
class UsersController extends Controller
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
     * Show the user dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
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
        $roles = Role::All();
        return view('users.create',compact('roles'));
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
        if($request->hasfile('user_image'))
         {
            
            $name = time().rand(1,100).'.'.$request->user_image->extension();
            $request->user_image->move(public_path('user_image'), $name);  
            $files = $name;  
            
         }else{
            $files = '';
         }
         $lastId = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'status' => 1,
            'role' => $input['role'],
            'user_image' => $files,
        ]);

       foreach ($request['permission_id'] as $key => $value) {
            $per = new UserPermission();
            $per->permission_id = $value;
            $per->user_id = $lastId->id;
            $per->save();
        }
       alert()->success('Successfull!','Your user is created.');
       return redirect()->route('users');
    }


    /**
     * Load page with add/edit user data
     *
     * @param  mixed $userID
     * @return View
     */
    public function edit($user_id)
    {

        $user = User::find($user_id);
        $selected_user_permission = UserPermission::where('user_id', $user_id)->pluck('permission_id')->toArray();
        $roles = Role::All();

        return view('users.edit',compact('user','selected_user_permission','roles'));

    }


    public function update(Request $request, $user_id)
    {

        $users = User::find($user_id);

        if($request->hasfile('user_image'))
         {
            
            $name = time().rand(1,100).'.'.$request->user_image->extension();
            $request->user_image->move(public_path('user_image'), $name);  
            $files = $name;  
            
         }else{
            $files = $users->user_image;
         }

         $users->name = $request->name;
         $users->email = $request->email;
         $users->role = $request->role;
         $users->user_image = $files;
         if($request->password){
            $users->password = $request->password;
         }
         $users->save();

               

        UserPermission::where('user_id', $user_id)->delete();
        foreach ($request['permission_id'] as $key => $value) {

            $per = new UserPermission();
            $per->permission_id = $value;
            $per->user_id = $user_id;
            $per->save();
        }

        alert()->success('Successfull!','Your user is edited.');
        return redirect()->route('users');

    }

    public function delete(Request $request , $user_id)
    {
        UserPermission::where('user_id', $user_id)->delete();
        User::where('id',$user_id)->delete();
        alert()->success('Successfull!','your user deleted.');
        return redirect()->route('users');
    }
}
