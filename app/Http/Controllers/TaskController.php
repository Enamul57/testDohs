<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Models\Admin;
use App\Models\TaskModel;
use Mail;
use app\Mail\sendMail;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function checkClient(Request $request){

           $index = DB::table('admins')->where('username','!=',$request->username)->get();
        return response()->json($index);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = new TaskModel;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->deadline = $request->deadline;
        $data->client_name = $request->client_name;
        $data->save();
        $index = DB::table('admins')->where('username',$request->client_name)->first();

        Mail::to($index->email)->send(new sendMail());
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
