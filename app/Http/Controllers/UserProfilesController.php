<?php

namespace App\Http\Controllers;

use App\Models\UserProfiles;
use App\Models\cookbook_users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
        ->json(app('db')
        ->select("SELECT 
        cookbook_users.cb_userid,
         cookbook_users.user_name,
          cookbook_users.email,
           cookbook_users.size,
            cookbook_users.birthday FROM cookbook_users "));
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
     * @param  \App\Models\UserProfiles  $userProfiles
     * @return \Illuminate\Http\Response
     */
    public function show(UserProfiles $userProfileId)
    {

       return cookbook_users::select('SELECT 
        cookbook_users.cb_userid,
         cookbook_users.user_name,
          cookbook_users.email,
           cookbook_users.size,
            cookbook_users.birthday FROM cookbook_users WHERE cb_userid' , [$userProfileId]);

      
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserProfiles  $userProfiles
     * @return \Illuminate\Http\Response
     */
    public function edit(UserProfiles $userProfiles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserProfiles  $userProfiles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserProfiles $userProfiles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProfiles  $userProfiles
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProfiles $userProfiles)
    {
        //
    }
}
