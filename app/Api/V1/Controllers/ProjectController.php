<?php

namespace App\Api\V1\Controllers;

use App\Project;
use Dingo\Api\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project=Project::with('program')->get();
        if(count($project)>0){
            return response()->json($project,200);
        }else{
            return response()->json(['status'=>false,'message'=>'Project is not created yet ):'],400);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rules=[
            'name'=>['required'],
            'description'=>['required'],
            'project_category_id'=>['required']
        ];

        $payload=app('request')->only(['name','description','project_category_id']);
        $validator=app('validator')->make($payload,$rules);
        if($validator->fails()){
            return response()->json(['status'=>false,'message'=>$validator->errors()->first()]);
        }else{
            $project=new Project();
            $project->name=$request->name;
            $project->program_id=$request->program_id;
            $project->description=$request->description;
            $project->project_category_id=$request->project_category_id;
            if($project->save()){
                return response()->json(['status'=>true,'message'=>'Project created Successfully'],201);
            }else{
                return response()->json(['status'=>false,'message'=>'data is not created'],409);
            }
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
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        if($project){
            $project=Project::where('id',$id)->with('outcome')->get();
            return response()->json($project,200);
        }else{
            return response()->json(['status'=>false,'message'=>'The data is not found'],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
