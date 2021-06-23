<?php

namespace App\Http\Controllers;

use App\Models\cookbook_users;
use Illuminate\Http\Request;

class CookbookUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return cookbook_users::all();
    }

    public function show($userProfileId)
    {

        return cookbook_users::where('cb_userid', $userProfileId)->get();

       
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
     * @param  \App\Models\cookbook_users  $cookbook_users
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cookbook_users  $cookbook_users
     * @return \Illuminate\Http\Response
     */
    public function edit(cookbook_users $cookbook_users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cookbook_users  $cookbook_users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cookbook_users $cookbook_users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cookbook_users  $cookbook_users
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
       return cookbook_users::select('trainingplans_individuals.name',
        'trainingplans_individuals.user_id',
        'trainingplans_individuals.id')->
        join('trainingplans_individuals', 'trainingplans_individuals.user_id', '=', 'cb_userid')->get();
    }
}
