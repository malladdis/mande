<?php

namespace App\Api\V1\Controllers;

use App\ProgramCategory;
use Dingo\Api\Contract\Http\Validator;
use Dingo\Api\Http\FormRequest;
use Dingo\Api\Http\Request;
use Illuminate\Support\Facades\DB;


class ProgramCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $categoreis=ProgramCategory::with('programs')->get();
       if(count($categoreis)>=1){
           return response()->json($categoreis,200);
       }else{
           return response()->json(['status'=>false,'message'=>'Program Category is not created yet ):'],404);
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $rules= [
            'name'=>['required']
        ];
        $payload=app('request')->only('name');
        $validator=app('validator')->make($payload,$rules);
        if($validator->fails()){
            return response()->json(['status'=>false,'message'=>$validator->errors()->first()],422);
        }

        $categories= new ProgramCategory();
        $categories->name=$request->name;
        $categories->description=$request->description;
        if($categories->save()){
            return response()->json(['status'=>true,'message'=>'program category created successfully'],201);
        }else{
            return response()->json(['status'=>false,'message'=>'program category created successfully'],201);
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
     * @param  \App\ProgramCategory  $programCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $categories=ProgramCategory::where('id',$request->id)->with('programs')->get();
        if(count($categories)>=1){
            return response()->json($categories,200);
        }else{
            return response()->json(['status'=>false,'message'=>'The data is not found'],404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProgramCategory  $programCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramCategory $programCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProgramCategory  $programCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $categories=ProgramCategory::find($id);
        if($categories){

         $categories->name= $request->name;
         $categories->description=$request->description;
         $categories->save();
         return response()->json($categories,200);

        }else{
            return response()->json(['status'=>false,'message'=>'The data is not found by '.$id.' this id'],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProgramCategory  $programCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories=ProgramCategory::find($id);
        if($categories){
         ProgramCategory::destroy($id);
         return response()->json(['status'=>true,'message'=>'Deleted successfully'],200);
        }else{
            return response()->json(['status'=>false,'message'=>'The data is not found by  this id'],404);
        }

    }
}
