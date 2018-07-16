<?php

namespace App\Api\V1\Controllers;

use App\OutputCategory;
use Dingo\Api\Http\Request;

class OutputCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $output=OutputCategory::with('outputCategory')->get();
        if(count($output)>0){
            return response()->json(['success'=>true,'message'=>$output],200);
        }else{
            return response()->json(['success'=>false,'message'=>'Output category is not created yet ):'],404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $outputCategory=new OutputCategory();
        $outputCategory->name=$request->name;
        $outputCategory->description=$request->description;
        if($outputCategory->save()){
            return response()->json(['success'=>true,'message'=>'created Successfully'],200);
        }else{
            return response()->json(['success'=>false,'message'=>'Not created Successfully'],209);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OutputCategory  $outputCategory
     * @return \Illuminate\Http\Response
     */
    public function show(OutputCategory $outputCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OutputCategory  $outputCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(OutputCategory $outputCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OutputCategory  $outputCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OutputCategory $outputCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OutputCategory  $outputCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(OutputCategory $outputCategory)
    {
        //
    }
}
