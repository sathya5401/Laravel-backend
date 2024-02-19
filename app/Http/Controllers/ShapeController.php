<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shape;

class ShapeController extends Controller
{   

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Shape::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'shape_name' => 'required|string',
            'colour' => 'required|string',
      ]);
      
      
        $shape = Shape::create($validatedData);
      
      
        return response()->json($shape, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve the shape from the database using the provided $id
        $shape = Shape::find($id);


        // Check if the shape was found
        if ($shape) {
        // Return the shape with a 200 HTTP status 
            return response()->json($shape, 200);
        } else {
        // return not found message
        return response()->json(['message' => 'Details not found'], 404);
        }
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate the input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'shape_name' => 'required|string',
            'colour' => 'required|string',
      ]);

      // Find shape details
        $shape = Shape::find($id);
      //Check if the shape exist or not 
        if ($shape) {
            // update the shape details if it exist
            $shape->update($validatedData);

            //return the shape with 200 http status
            return response()->json($shape, 200);
        }
        else {
            //return not found message
            return response()->json(['message' => 'Details not found'], 404);
        }


    }

    public function destroy(string $id)
    {
        $shape = Shape::find($id);

        if ($shape) {
            // delete the shape
            $shape->delete();

        // Return a 204 No Content HTTP status 
        return response()->json(null, 204);
        }
        else {
            //return not found message
            return response()->json(['message' => 'Details not found'], 404);
        }

    }
}
