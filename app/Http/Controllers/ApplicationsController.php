<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applications;
use App\Models\Education;
use App\Models\Note;
use App\Models\Sector;

class ApplicationsController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $applications = Applications::all();
        return view('application.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Applications = Applications::latest('id')->first();
        
        if($Applications){
            $sr_number= $Applications->sr_number + 1;
        }else{
            $sr_number= 1;
        }

        $educations = Education::All();
        $notes = Note::All();
        $sectors = Sector::All();

        return view('application.create',compact('sr_number','educations','notes','sectors'));
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
            $files = [];
         }
        Applications::create([
         'sr_number' => $input['sr_number'],
         'applicant_name' => $input['applicant_name'],
         'applicant_civil_id' => $input['applicant_civil_id'],
         'action_taken' => $input['action_taken'],
         'action_status' => $input['action_status'],
         'action_date' => $input['action_date'],
         'applicant_degree' => $input['applicant_degree'],
         'applicant_academic' => $input['applicant_academic'],
         'applicant_job_title' => $input['applicant_job_title'],
         'csc_organization' => $input['csc_organization'],
         'outgoing_letter_number' => $input['outgoing_letter_number'],
         'source_name' => $input['source_name'],
         'source_description' => $input['source_description'],
         'source_secreatary_name' => $input['source_secreatary_name'],
         'secreatary_mobile' => $input['secreatary_mobile'],
         'eligible_requests' => $input['eligible_requests'],
         'current_request' => $input['current_request'],
         'remaining_request' => $input['remaining_request'],
         'additional_request' => $input['additional_request'],
         'total_request' => $input['total_request'],
         'subject' => $input['subject'],
         'from_sector' => $input['from_sector'],
         'from_department' => $input['from_department'],
         'attachment' => implode($files),
         'to_sector' => $input['to_sector'],
         'to_department' => $input['to_department'],
         'general_notes' => $input['general_notes'],
         'special_notes' => $input['special_notes'],

       ]);
       alert()->success('Successfull!','Your Application is created.');
       return redirect()->route('applications');
    }

    /**
     * Load page with add/edit user data
     *
     * @param  mixed $userID
     * @return View
     */
    public function edit($id)
    {

        $app = Applications::find($id);
        $educations = Education::All();
        $notes = Note::All();
        $sectors = Sector::All();

        return view('application.edit',compact('educations','notes','sectors','app'));

    }


    public function update(Request $request, $id)
    {

        $users = User::find($id);

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

               

        UserPermission::where('id', $id)->delete();
        foreach ($request['permission_id'] as $key => $value) {

            $per = new UserPermission();
            $per->permission_id = $value;
            $per->id = $id;
            $per->save();
        }

        alert()->success('Successfull!','Your user is edited.');
        return redirect()->route('users');

    }

    public function delete(Request $request , $id)
    {
        UserPermission::where('id', $id)->delete();
        User::where('id',$id)->delete();
        alert()->success('Successfull!','your user deleted.');
        return redirect()->route('users');
    }

     /**
     * Load page with add/edit user data
     *
     * @param  mixed $userID
     * @return View
     */
    public function history($id)
    {

        $user = User::find($id);
        $selected_user_permission = UserPermission::where('id', $id)->pluck('permission_id')->toArray();
        $roles = Role::All();

        return view('users.history',compact('user','selected_user_permission','roles'));

    }
}
