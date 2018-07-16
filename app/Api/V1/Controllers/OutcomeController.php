<?php

namespace App\Api\V1\Controllers;

use App\Outcome;
use Dingo\Api\Http\Request;

class OutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outcome=Outcome::with('project')->with('outcomeList')->get();
        if(count($outcome)>0){
            return response()->json(['success'=>true,'message'=>$outcome],200);
        }else{
            return response()->json(['success'=>false,'message'=>'Data is not Found'],404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $outcome= new Outcome();
        $outcome->project_id=$request->project_id;
        $outcome->outcome_category_id=$request->outcome_category_id;
        $outcome->name=$request->name;
        $outcome->description=$request->description;
        if($outcome->save()){
            return response()->json(['success'=>true,'message'=>$outcome],200);
        }else{
            return response()->json(['success'=>false,'message'=>'Outcome is not created'],209);
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
     * @param  \App\Outcome  $outcome
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $outcome=Outcome::find($id);
        if($outcome){
            $outcome=Outcome::where('id',$id)->with('project')->get();
            return response()->json(['success'=>true,'message'=>$outcome]);
        }else{
            return response()->json(['success'=>false,'message'=>'Data is not found in this id'],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Outcome  $outcome
     * @return \Illuminate\Http\Response
     */
    public function edit(Outcome $outcome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outcome  $outcome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outcome $outcome)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Outcome  $outcome
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outcome $outcome)
    {
        //
    }
}
