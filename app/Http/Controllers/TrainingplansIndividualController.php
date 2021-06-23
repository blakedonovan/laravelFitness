<?php

namespace App\Http\Controllers;

use App\Models\TrainingplansIndividual;
use Illuminate\Http\Request;

class TrainingplansIndividualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function removePlan($TrainingplansIndividualId) {
       
        TrainingplansIndividual::findOrFail($TrainingplansIndividualId)->delete();
        

      

            return response()->json('erfolgreich gelöscht');

        

        
        
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
     * @param  \App\Models\TrainingplansIndividual  $trainingplansIndividual
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingplansIndividual $trainingplansIndividual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrainingplansIndividual  $trainingplansIndividual
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainingplansIndividual $trainingplansIndividual)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrainingplansIndividual  $trainingplansIndividual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainingplansIndividual $trainingplansIndividual)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrainingplansIndividual  $trainingplansIndividual
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainingplansIndividual $trainingplansIndividual)
    {
        //
    }
}
