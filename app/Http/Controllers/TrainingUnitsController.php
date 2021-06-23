<?php

namespace App\Http\Controllers;

use App\Models\TrainingUnits;
use Illuminate\Http\Request;

class TrainingUnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TrainingUnits::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addUnit(Request $request)
    {
        $trainingUnit = new TrainingUnits();
 
  


        $trainingUnit->name= $request->name;
        $trainingUnit->description= $request->description;
        $trainingUnit->description_pic= $request->mediaFilename;
        $trainingUnit->category_id= $request->unitCat;
        $trainingUnit->save();
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
     * @param  \App\Models\TrainingUnits  $trainingUnits
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingUnits $trainingUnits)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrainingUnits  $trainingUnits
     * @return \Illuminate\Http\Response
     */
    public function updateUnit(Request $request,$id)
    {
        $trainingUnit = TrainingUnits::find($id);
   
       
        $trainingUnit->name= $request->name;
        $trainingUnit->description= $request->description;
        $trainingUnit->description_pic= $request->mediaFilename;
        $trainingUnit->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrainingUnits  $trainingUnits
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainingUnits $trainingUnits)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrainingUnits  $trainingUnits
     * @return \Illuminate\Http\Response
     */
    public function removeUnit($id)
    {
        $tUnit = TrainingUnits::find($id);
        $tUnit->delete();
    }

public function uploadFile(Request $request){

      
    $images = (object) ['image' => ""];


        $original_filename = $request->file('mediaUpload')->getClientOriginalName();
        $original_filename_arr = explode('.', $original_filename);
        $file_ext = end($original_filename_arr);
        $destination_path = './app/TrainingUnits';
        $image = 'trainingUnits' . time() . '.' . $file_ext;

        if ($request->file('mediaUpload')->move($destination_path, $image)) {
            $images->image = '/app/TrainingUnits' . $image;
    return response()->json($image);
    }
}
}