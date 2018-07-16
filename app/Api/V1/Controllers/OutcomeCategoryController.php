<?php

namespace App\Api\V1\Controllers;

use App\OutcomeCategory;
use Dingo\Api\Http\Request;

class OutcomeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=OutcomeCategory::with('outcome')->get();
        if(count($categories)>0){
            return response()->json(['success'=>true,'message'=>$categories],200);
        }else{
            return response()->json(['success'=>false,'message'=>'Category is not created yet ):'],404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $outcomeCategory= new OutcomeCategory();
        $outcomeCategory->name=$request->name;
        $outcomeCategory->description=$request->description;
        if($outcomeCategory->save()){
            return response()->json(['success'=>true,'message'=>'Created Successfully'],201);
        }else{
            return response()->json(['success'=>false,'message'=>'Not Created'],209);
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
     * @param  \App\OutcomeCategory  $outcomeCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $outcomeCategory=OutcomeCategory::find($id);
        if($outcomeCategory){
            $outcomeCategory=OutcomeCategory::where('id',$id)->with('outcome');
            return response()->json(['success'=>true,'message'=>$outcomeCategory],200);
        }else{
            return response()->json(['success'=>false,'message'=>'Data is not found in this id'],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OutcomeCategory  $outcomeCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(OutcomeCategory $outcomeCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OutcomeCategory  $outcomeCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OutcomeCategory $outcomeCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OutcomeCategory  $outcomeCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outcomeCategory=OutcomeCategory::find($id);
        if($outcomeCategory){
            OutcomeCategory::destroy($id);
            return response()->json(['success'=>true,'message'=>$outcomeCategory],200);
        }else{
            return response()->json(['success'=>false,'message'=>'Data is not found in this id'],404);
        }
    }
}
