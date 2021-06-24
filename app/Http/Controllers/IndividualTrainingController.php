<?php

namespace App\Http\Controllers;

use App\Models\IndividualTraining;
use Illuminate\Http\Request;

class IndividualTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function fetchTrainingUnitCat() {
        
        $trainingCategories = 
     
        response()
        ->json(app('db')
        ->select("SELECT
        training_categories.id,
        training_categories.type
    FROM
        `training_categories`
        ORDER BY training_categories.type ASC
        "));

        if (empty($trainingCategories)) {
               
            return "Keine Trainingskategorien angelegt";
        }
       
        return $trainingCategories;
    }

    public function fetchTrainingCatSelection($trainingCatID){

        $trainingSelection =
        response()
        ->json(app('db')
        ->select("SELECT `id`,`name` ,description,description_pic
        
        FROM `training_units` 
        WHERE category_id =$trainingCatID
         ORDER BY training_units.name ASC
         "));
    
    if (empty($trainingSelection)) {
               
        return "Keine Trainingseinheiten vorhanden";
    }
   
    return $trainingSelection;
}


public function addPlan(Request $request) {
      

    $user = $request->input('user');
    $tplanName = $request->input('name');

    app('db')->insert("INSERT INTO `trainingplans_individuals` (`id`, `user_id`, `name`, `create_date`) 
                            VALUES (NULL, '$user', '$tplanName', current_timestamp());");



    return response()->json("Trainingplan created");
}

public function getTraineeLists($traineeID) {

      
        
    $IndividualTrainingList =  response()
    ->json(app('db')
    ->select("SELECT
                trainingplans_individuals.name,
                trainingplans_individuals.user_id,
                trainingplans_individuals.id
                FROM
                `trainingplans_individuals`
                
                WHERE trainingplans_individuals.user_id = $traineeID"));
    
    
    
    return $IndividualTrainingList;
}

public function trainingUnitsbyListID($IndividualTrainingId) {
        //Storage::put("file.txt","test");
    $IndividualTraining = 
 
    response()
    ->json(app('db')
    ->select("SELECT
    
    training_units.name,
    trainingplans_details.reps,
    trainingplans_details.id,
    trainingplans_details.weight,
    training_units.description
FROM
    `trainingplans_details`
INNER JOIN training_units ON training_units.id=trainingplans_details.trainingplan_unit_id

WHERE
    training_plans_individual_id =$IndividualTrainingId"));

    if (empty($IndividualTraining)) {
           
        return "Keine Trainingseinheiten angelegt";
    }
   
    return $IndividualTraining;
}

public function update(Request $request, $IndividualTrainingId) {
       
     
    // Find the IndividualTraining you want to update
    $IndividualTraining = $this->IndividualTraining->find($IndividualTrainingId);

    // Return error if not found
    if (empty($IndividualTraining)) {
        return "No data found.";
    }

    // Update the IndividualTraining
    $IndividualTraining->update([
        'name' => $request->input('name')
    ]);

    return $IndividualTraining;
}


public function removeUnit($IndividualTrainingId) {
   
    
  app('db')->delete("DELETE FROM `trainingplans_details` WHERE `trainingplans_details`.`id` =  =$IndividualTrainingId;");
  
   
  
   if (empty($IndividualTraining)) {
        return "No data found.";

    }else{

        return response()->json(IndividualTraining::all());

    }

    
    
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
     * @param  \App\Models\IndividualTraining  $individualTraining
     * @return \Illuminate\Http\Response
     */
    public function show(IndividualTraining $individualTraining)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IndividualTraining  $individualTraining
     * @return \Illuminate\Http\Response
     */
    public function edit(IndividualTraining $individualTraining)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IndividualTraining  $individualTraining
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IndividualTraining  $individualTraining
     * @return \Illuminate\Http\Response
     */
    public function destroy(IndividualTraining $individualTraining)
    {
        //
    }
}
