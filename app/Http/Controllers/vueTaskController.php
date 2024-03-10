<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vueTaskModel;
use App\Http\Requests\vueTaskRequest;
use App\Http\Resources\vueTaskResource;

class vueTaskController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = new vueTaskModel;
        $task_arr = vueTaskModel::orderBy('id', 'desc')->get();

        return response()->json(
            vueTaskResource::collection($task_arr)
        )->setStatusCode(200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('HSD');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(vueTaskRequest $request)
    {
        $task = new vueTaskModel;
        $data = $request->input();

        $task->title       = $data['title'];
        $task->description = $data['description'];
        $task->status      = $data['status'];
        $task->deadline    = $data['deadline'];

        $task->save();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vueTaskModel  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = new vueTaskModel;

        $task_arr = $task->where('id', $id)->first();
        if(!$task_arr)
            return response()->json(['message'=>'no record found'], 404);
        else
            return response()->json($task_arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vueTaskModel  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vueTaskModel  $task
     * @return \Illuminate\Http\Response
     */
    public function update(vueTaskRequest $request, $id)
    {
        $task = new vueTaskModel;

        $data = $request->validated();

        $task->where('id', $id)->update([
            'title'      => $data['title'],
            'description'=> $data['description'],
            'status'     => $data['status'],
            'deadline'   => $data['deadline']
        ]);

        //fetching recently updated task
        $task_arr = $task->where('id', $id)->get();

        return response()->json([
            'errorcode' => 200,
            'id'        => $id,
            'update'    => vueTaskResource::collection($task_arr)
        ])->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vueTaskModel  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = vueTaskModel::findorFail($id);
        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);
    }
}


