<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;

class ClientController extends Controller
{

    public function saveClient(Request $request)
    {
        $client = new client();
        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->email = $request->email;
        $client->gender = $request->gender;
        $client->createdby = auth()->user()->id;
        $client->save();
        return view('dashboard'. ['clients' => client::all()]);
    }
}
