<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    return Recipe::all();
    }

    public function show($RecipeId) {

       
       return 
       Recipe::select('recipe_name','recipe_image_url','recipe_id')
       ->where('category_id','=',$RecipeId)
       ->get();

        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->Recipe->create([
            'Zutat' => $request->input('Zutat'),
            'Fett' => $request->input('Fett'),
            'Kohlenhydrate' => $request->input('Kohlenhydrate'),
            'Protein' => $request->input('Protein'),
            'kcal' => $request->input('kcal'),
            'ean' => $request->input('ean'),
        ]); 
        
        return response()->json(Recipe::all());
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
