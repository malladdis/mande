<?php

namespace App\Api\V1\Controllers;

use App\ProjectCategory;
use Dingo\Api\Http\Request;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=ProjectCategory::with('project')->get();
        if(count($categories)>0){
            return response()->json(['status'=>true,'message'=>$categories],200);
        }else{
            return response()->json(['status'=>false,'message'=>'Project category is not created yet ):'],404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $project=new ProjectCategory();
        $project->name=$request->name;
        $project->description=$request->description;
        if($project->save()){
            return response()->json(['status'=>true,'message'=>'Project category created successfully'],201);
        }else{
            return response()->json(['status'=>false,'message'=>'Project category is not created'],209);
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
     * @param  \App\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories=ProjectCategory::find($id);
        if($categories){
            $categories= ProjectCategory::where('id',$id)->with('project')->get();
            return response()->json(['status'=>true,'message'=>$categories],200);
        }else{
            return response()->json(['status'=>false,'message'=>'The data you are looking for is not found'],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectCategory $projectCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $categories=ProjectCategory::find($id);
        if($categories){
            $categories->name=$request->name;
            $categories->description=$request->description;
            if($categories->save()){
                $categories= ProjectCategory::where('id',$id)->with('project')->get();
                return response()->json(['status'=>true,'message'=>$categories],200);
            }
        }else{
           return response()->json(['status'=>false,'message'=>'The data is not found ):'],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories=ProjectCategory::find($id);
        if($categories){
            ProjectCategory::destroy($id);
            return response()->json(['status'=>true,'message'=>'Deleted Successfully'],200);
        }else{
            return response()->json(['status'=>false,'message'=>'The data you are looking for is not found ):'],404);
        }
    }
}
