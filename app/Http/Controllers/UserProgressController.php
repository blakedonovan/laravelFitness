<?php

namespace App\Http\Controllers;

use App\Models\UserProgress;
use Illuminate\Http\Request;

class UserProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showUserProgress($UserProgressId) {
    
    return   UserProgress::select('user_progress.weight as Gewicht','user_progress.progress_enter_date as Datum')
       ->where('user_progress.user_id',$UserProgressId)->get();
        
        $UserProgressData = 
        response()
        ->json(app('db')
        ->select("SELECT user_progress.weight as Gewicht, 
                 user_progress.progress_enter_date as Datum
        
         FROM user_progress WHERE user_progress.user_id  = $UserProgressId"));
     
        if (empty($UserProgressData)) {
               return "No data found.";
        }
       
        return $UserProgressData;
    
    }


    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserProgress  $userProgress
     * @return \Illuminate\Http\Response
     */
    public function show(UserProgress $userProgress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserProgress  $userProgress
     * @return \Illuminate\Http\Response
     */
    public function edit(UserProgress $userProgress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserProgress  $userProgress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserProgress $userProgress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProgress  $userProgress
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProgress $userProgress)
    {
        //
    }
}
