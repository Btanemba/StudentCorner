<?php

namespace App\Http\Controllers;

use App\Models\BookingTable;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    function BookingIndex(){
        return view('index');
    }
    
    public function DataInsert(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'ambassador' => 'required|string|max:255',
        ]);

        // Insert the data into the database with separate first/last names
        $isInsertSuccess = BookingTable::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'country' => $validatedData['country'],
            'city' => $validatedData['city'],
            'ambassador' => $validatedData['ambassador'],
        ]);

        // Check if the insertion was successful and provide feedback
        if ($isInsertSuccess) {
            return redirect()->back()->with('success', 'Appointment booked successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to book appointment. Please try again.');
        }
    }
}