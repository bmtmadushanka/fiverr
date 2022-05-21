<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applications;

class ApplicationController extends Controller
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
        return view('application.create',compact('sr_number'));
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
}
