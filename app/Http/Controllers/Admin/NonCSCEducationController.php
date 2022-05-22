<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NonCSCEducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;

class NonCSCEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $term = $request->term;
        if (empty($term)) {
            $educations = NonCSCEducation::orderby('name', 'ASC')->select('id', 'name')->get();
        } else {

            $educations = NonCSCEducation::where('name', 'like', '%' . $request->search . '%')->orderby('name', 'ASC')->select('id', 'name')->get();
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $exist = NonCSCEducation::where('name', $request->name)->exists();

            if (!$exist) {
                $education = NonCSCEducation::create(['name' => $request->name]);
                if ($education) {
                    return response()->json(['success' => true, 'msg' => 'NonCSCEducation added successfully'], 200);
                }
            } else {
                return response()->json(['success' => false, 'msg' => 'Education already exist'], 400);
            }

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => 'Something went wrong'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NonCSCEducation::destroy($id);
        return response()->json(['msg' => 'Education Deleted successfully']);
    }

    public function import(Request $request)
    {
        try {
            DB::beginTransaction();
            $exist_edus = NonCSCEducation::all()->pluck('name')->toArray();
            $new_records= [];
            if ($request->hasFile('import_file')) {
                $file = $request->file('import_file');
                $col = (new FastExcel())->import($file);
                foreach ($col as $line){
                    if (!in_array($line['Education'], $exist_edus) && !empty($line['Education'])) {
                        array_push($new_records,['name'=>$line['Education']]);
                        array_push($exist_edus, $line['Education']); // to avoid same excel duplicates
                    }
                }

                NonCSCEducation::insert($new_records);
            }
            DB::commit();
            return response()->json(['msg' => 'Educations Created successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['msg' => 'Something went wrong | ' . $e->getMessage()], 500);
        }

    }
}
