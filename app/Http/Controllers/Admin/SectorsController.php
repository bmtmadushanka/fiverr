<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Sector;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Rap2hpoutre\FastExcel\FastExcel;

class SectorsController extends Controller
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
            $educations = Sector::orderby('name','ASC')->select('id','name')->get();
        }else{

            $educations = Sector::where('name','like','%'.$request->search.'%')->orderby('name','ASC')->select('id','name')->get();
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
            $exist = Sector::where('name',$request->name)->exists();

            if (!$exist){
                $education = Sector::create(['name' => $request->name]);
                if ($education) {
                    return response()->json(['success'=>true , 'msg'=> 'Sector added successfully'],200);
                }
            }else{
                return response()->json(['success'=>false , 'msg'=> 'Sector already exist'],400);
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
        Sector::destroy($id);
        return response()->json(['msg'=>'Sector Deleted successfully']);
    }

    public function import(Request $request)
    {
       try{
           DB::beginTransaction();
            $formatted_arr = array();
           if ($request->hasFile('import_file')) {
               $file = $request->file('import_file');
               $eds = (new FastExcel())->import($file);

               foreach ($eds as $line) {
                   if (!array_key_exists($line['SECTOR'], $formatted_arr)) {
                       $formatted_arr[$line['SECTOR']] = [new Department(['name'=>$line['DEPARTMENT']])];
                   } else {
                       array_push($formatted_arr[$line['SECTOR']], new Department(['name'=>$line['DEPARTMENT']]));
                   }
               }

               foreach ($formatted_arr as $sector=>$departments){
                   $ex_sector = Sector::firstOrCreate(['name'=>$sector]);
                    $ex_sector->departments()->saveMany($departments);
               }

           }
            DB::commit();
           return response()->json(['msg'=>'Sectors Created successfully']);
       }catch (\Exception $e){
           DB::rollBack();
           return response()->json(['msg'=>'Something went wrong | '.$e->getMessage()],500);
       }

    }

    public function from_department(Request $request)
    {

        $result =Department::where('sector_id', $request->from_sector)
         ->select(['id','name'])->get();

        return response()->json($result);

    }

    public function departmentsBySectorId($id)
    {

        $result =Department::where('sector_id', $id)
            ->select(['id','name'])->get();

        return response()->json($result);
    }
}
