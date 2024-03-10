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
        try {
            $request->validate([
                'title'=>'required',
                'description'=>'required',
                'ingredients'=>'required',
                'instructions'=>'required',
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            $recipeData = $request->all();
            
            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $imageName);
                $recipeData['photo'] = $imageName;
            }
    
            Recipe::create($recipeData);
            
            return redirect()->route('recipes.index')->with('success', 'Recipe added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add recipe: '.$e->getMessage());
        }
    }
    
    //Edit the recipe

    public function edit(Recipe $recipe)
    {
        return view('recipes.edit',compact('recipe'));
    }

    //Update the recipe

    public function update(Request $request, Recipe $recipe)
    {
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'ingredients' => 'required',
                'instructions' => 'required',
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
            ]);
    
            $recipeData = $request->all();
    
            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $imageName);
                $recipeData['photo'] = $imageName;
            }
    
            $recipe->update($recipeData);
    
            return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update recipe: '.$e->getMessage());
        }
    }
    
    
    

    //delete the recipe

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('recipes.index');
    }
}
