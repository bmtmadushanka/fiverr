<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Rap2hpoutre\FastExcel\FastExcel;

class EducationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        $term = $request->term;
        if (empty($term)){
            $educations = Education::orderby('name','ASC')->select('id','name')->get();
        }else{
            $educations = Education::where('name','like','%'.$request->search.'%')->orderby('name','ASC')->select('id','name')->get();
        }
       // dd($educations);
        return response()->json($educations);

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

            $education = Education::create(['name' => $request->name]);
            if ($education) {
                return response()->json(['success'=>true , 'msg'=> 'Education added successfully'],200);
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
        Education::destroy($id);
        return response()->json(['msg'=>'Education Deleted successfully']);
    }

    public function import(Request $request)
    {
       //dd($request);
        if ($request->hasFile('import_file')) {
            $file = $request->file('import_file');
            $eds = (new FastExcel())->import($file,function ($line){
                Education::create(['name'=> $line['CSC Education']]);
            });
        }

        return response()->json(['msg'=>'Educations Created successfully']);
    }
}
