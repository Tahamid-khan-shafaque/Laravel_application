<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class DataController extends Controller
{
    public function insertData(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
           
            'department' => 'required',
            'description' => 'required',
        ]);

        // Insert the data into the database
        Data::create($validatedData);

        return redirect()->back()->with('success', 'Data inserted successfully!');
    }

    public function showData()
    {
        // Retrieve the data from the database
        $data = Data::all();

        return view('show', compact('data'));
    }
}
