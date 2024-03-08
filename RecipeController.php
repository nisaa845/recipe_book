<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    
    public function index()
    {
        $recipes=Recipe::all();
        return view('recipes.index',compact('recipes'));
    }

    public function show(Recipe $recipe){
        return view('recipes.show',compact('recipe'));
    }


    public function create()
    {
        return view('recipes.create');
    }

    //store or add the recipe

    public function store(Request $request)
    {
     $request->validate([
        'title'=>'required',
        'description'=>'required',
        'ingredients'=>'required',
        'instructions'=>'required',
     ]) ;
     
     Recipe::create($request->all());
     return redirect()->route('recipes.index');
    }

    //Edit the recipe

    public function edit(Recipe $recipe)
    {
        return view('recipes.edit',compact('recipe'));
    }

    //Update the recipe

    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
        ]);
    
        $recipe->update($request->all());
    
        return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully');
    }
    

    //delete the recipe

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('recipes.index');
    }
}
