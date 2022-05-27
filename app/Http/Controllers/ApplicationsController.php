<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Applications;
use App\Models\Education;
use App\Models\Note;
use App\Models\Sector;
use App\Models\ApplicationHistory;
use Auth;
use App\Classes\permission;

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
        if (permission::permitted('request')=='fail'){ return redirect()->route('denied'); }

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
        if (permission::permitted('request-add')=='fail'){ return redirect()->route('denied'); }

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
        if (permission::permitted('request-add')=='fail'){ return redirect()->route('denied'); }

        $input = $request->all();
        $files = [];
        if($request->hasfile('attachment'))
         {
            foreach($request->file('attachment') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('attachment'), $name);
                array_push($files,$name);
            }
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
         'attachment' => serialize($files),
         'to_sector' => $input['to_sector'],
         'to_department' => $input['to_department'],
         'general_notes' => $input['general_notes'],
         'special_notes' => $input['special_notes'],

       ]);
       alert()->success('Successful!','Your Application is created.');
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

        if (permission::permitted('request-edit')=='fail'){ return redirect()->route('denied'); }

        $app = Applications::find($id);
        $educations = Education::All();
        $notes = Note::All();
        $sectors = Sector::All();

        if(isset($app->attachment)){
            $files = unserialize($app->attachment);

        }else{
            $files = Null;

        }
        $from_departments = Department::where('sector_id',$app->from_sector)->get();
        $to_departments = Department::where('sector_id',$app->to_sector)->get();

        return view('application.edit',compact('from_departments','to_departments','educations','notes','sectors','app','files'));

    }


   /* public function update(Request $request, $id)
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

    }*/

    public function update($id,Request $request)
    {

        if (permission::permitted('request-edit')=='fail'){ return redirect()->route('denied'); }

        $application = Applications::findorFail($id);
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

            $application->attachment = serialize($files);
        }

            //$application->sr_number = $input['sr_number'];
            if($application->applicant_name != $input['applicant_name']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'applicant_name';
                $history->old = $application->applicant_name;
                $history->new = $input['applicant_name'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->applicant_name = $input['applicant_name'];

            if($application->applicant_civil_id != $input['applicant_civil_id']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'applicant_civil_id';
                $history->old = $application->applicant_civil_id;
                $history->new = $input['applicant_civil_id'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->applicant_civil_id = $input['applicant_civil_id'];

            if($application->action_taken != $input['action_taken']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'action_taken';
                $history->old = $application->action_taken;
                $history->new = $input['action_taken'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->action_taken = $input['action_taken'];

            if($application->action_status != $input['action_status']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'action_status';
                $history->old = $application->action_status;
                $history->new = $input['action_status'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->action_status = $input['action_status'];

            if($application->action_date != $input['action_date']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'action_date';
                $history->old = $application->action_date;
                $history->new = $input['action_date'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->action_date = $input['action_date'];

            if($application->applicant_degree != $input['applicant_degree']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'applicant_degree';
                $history->old = $application->applicant_degree;
                $history->new = $input['applicant_degree'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->applicant_degree = $input['applicant_degree'];

            if($application->applicant_academic != $input['applicant_academic']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'applicant_academic';
                $history->old = $application->applicant_academic;
                $history->new = $input['applicant_academic'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->applicant_academic = $input['applicant_academic'];

            if($application->applicant_job_title != $input['applicant_job_title']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'applicant_job_title';
                $history->old = $application->applicant_job_title;
                $history->new = $input['applicant_job_title'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->applicant_job_title = $input['applicant_job_title'];

            if($application->csc_organization != $input['csc_organization']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'csc_organization';
                $history->old = $application->csc_organization;
                $history->new = $input['csc_organization'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->csc_organization = $input['csc_organization'];

            if($application->applicant_name != $input['outgoing_letter_number']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'outgoing_letter_number';
                $history->old = $application->outgoing_letter_number;
                $history->new = $input['outgoing_letter_number'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->outgoing_letter_number = $input['outgoing_letter_number'];

            if($application->source_name != $input['source_name']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'source_name';
                $history->old = $application->source_name;
                $history->new = $input['source_name'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->source_name = $input['source_name'];

            if($application->source_description != $input['source_description']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'source_description';
                $history->old = $application->source_description;
                $history->new = $input['source_description'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->source_description = $input['source_description'];

            if($application->source_secreatary_name != $input['source_secreatary_name']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'source_secreatary_name';
                $history->old = $application->source_secreatary_name;
                $history->new = $input['source_secreatary_name'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->source_secreatary_name = $input['source_secreatary_name'];

            if($application->secreatary_mobile != $input['secreatary_mobile']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'secreatary_mobile';
                $history->old = $application->secreatary_mobile;
                $history->new = $input['secreatary_mobile'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->secreatary_mobile = $input['secreatary_mobile'];

            if($application->eligible_requests != $input['eligible_requests']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'eligible_requests';
                $history->old = $application->eligible_requests;
                $history->new = $input['eligible_requests'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->eligible_requests = $input['eligible_requests'];

            if($application->current_request != $input['current_request']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'current_request';
                $history->old = $application->current_request;
                $history->new = $input['current_request'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->current_request = $input['current_request'];

            if($application->remaining_request != $input['remaining_request']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'remaining_request';
                $history->old = $application->remaining_request;
                $history->new = $input['remaining_request'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->remaining_request = $input['remaining_request'];

            if($application->additional_request != $input['additional_request']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'additional_request';
                $history->old = $application->additional_request;
                $history->new = $input['additional_request'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->additional_request = $input['additional_request'];

            if($application->total_request != $input['total_request']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'total_request';
                $history->old = $application->total_request;
                $history->new = $input['total_request'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->total_request = $input['total_request'];

            if($application->subject != $input['subject']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'subject';
                $history->old = $application->subject;
                $history->new = $input['subject'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->subject = $input['subject'];

            if($application->from_sector != $input['from_sector']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'from_sector';
                $history->old = $application->from_sector;
                $history->new = $input['from_sector'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->from_sector = $input['from_sector'];

            if($application->from_department != $input['from_department']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'from_department';
                $history->old = $application->from_department;
                $history->new = $input['from_department'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->from_department = $input['from_department'];

            if($application->to_sector != $input['to_sector']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'to_sector';
                $history->old = $application->to_sector;
                $history->new = $input['to_sector'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->to_sector = $input['to_sector'];

            if($application->to_department != $input['to_department']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'to_department';
                $history->old = $application->to_department;
                $history->new = $input['to_department'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->to_department = $input['to_department'];

            if($application->general_notes != $input['general_notes']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'general_notes';
                $history->old = $application->general_notes;
                $history->new = $input['general_notes'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->general_notes = $input['general_notes'];

            if($application->special_notes != $input['special_notes']){
                $history = New ApplicationHistory;
                $history->application_id = $id;
                $history->column = 'special_notes';
                $history->old = $application->special_notes;
                $history->new = $input['special_notes'];
                $history->edited_by = Auth::id();
                $history->save();
            }

            $application->special_notes = $input['special_notes'];

            $application->save();


        alert()->success('Successful!','Your Application is updated.');
        return redirect()->route('applications');
    }

    public function delete(Request $request , $id)
    {
        Applications::where('id', $id)->delete();
        return response()->json(['msg'=>'Application Deleted successfully']);
    }

     /**
     * Load page with add/edit user data
     *
     * @param  mixed $userID
     * @return View
     */
    public function history($id)
    {
        if (permission::permitted('request-history')=='fail'){ return redirect()->route('denied'); }

        $history = ApplicationHistory::where('application_id',$id)->get();

        return view('application.history',compact('history'));

    }
}
