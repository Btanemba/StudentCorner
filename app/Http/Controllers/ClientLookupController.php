<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientLookupController extends Controller
{
    public function index()
    {
        return view('client.lookup');
    }

    public function search(Request $request)
    {
        $request->validate([
            'client_ref' => 'required|string',
        ]);

        $client = Client::where('client_ref', $request->client_ref)
                        ->with(['applications.university'])
                        ->first();

        if (!$client) {
            return back()->withErrors(['client_ref' => 'No client found with this reference.']);
        }

        return view('client.results', compact('client'));
    }
}
