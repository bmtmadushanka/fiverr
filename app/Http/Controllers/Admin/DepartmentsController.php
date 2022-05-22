<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Rap2hpoutre\FastExcel\FastExcel;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {

        $term = $request->term;
        $sector_id = $request->sector_id;
        if (empty($sector_id)){
            $departments = Department::orderby('name','ASC')->select('id','name')->get();
        }else{
            $departments = Department::where('sector_id',$sector_id)->orderby('name','ASC')->select('id','name')->get();
        }
       // dd($educations);
        return response()->json($departments);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $exist = Department::where(['name'=>$request->name,'sector_id'=>$request->sector_id])->exists();

            if (!$exist){
                $department = Department::create(['sector_id'=>$request->sector_id,'name' => $request->name]);
                if ($department) {
                    return response()->json(['success'=>true , 'msg'=> 'Department added successfully'],200);
                }
            }else{
                return response()->json(['success'=>false , 'msg'=> 'Department already exist for selected Sector'],400);
            }

        }catch (\Exception $e){
            return response()->json(['success'=>false , 'msg'=> 'Something went wrong'],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::destroy($id);
        return response()->json(['msg'=>'Department Deleted successfully']);
    }

}
