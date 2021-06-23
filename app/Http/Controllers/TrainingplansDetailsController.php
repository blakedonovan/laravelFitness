<?php

namespace App\Http\Controllers;

use App\Models\TrainingplansDetails;
use Illuminate\Http\Request;

class TrainingplansDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function index() {
      
        return response()->json(TrainingplansDetails::all());

    }

    public function removeUnit($IndividualTrainingId) {
       
        
       
        
        $tUnit = TrainingplansDetails::find($IndividualTrainingId);
        $tUnit->delete();
          
          
      }
   
      public function addUnitToPlan(Request $request) {
     
    $trainingUnit = new TrainingplansDetails();

       $trainingUnit->training_plans_individual_id= $request->training_plans_individual_id;
       $trainingUnit->trainingplan_unit_id = $request->trainingplan_unit_id;
       $trainingUnit->reps= $request->reps;
       $trainingUnit->weight= $request->weight;
       $trainingUnit->save();
      
        
       
          
          
      }

      public function updateUnit(Request $request, $id)
      { 

       
        $trainingUnit = TrainingplansDetails::find($id);;
   
         $trainingUnit->reps= $request->reps;
         $trainingUnit->weight= $request->weight;
         $trainingUnit->save();

         return response()->json($trainingUnit);

      }
}
