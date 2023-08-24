<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;
use Illuminate\Support\Facades\Log;


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

        $clients = ['clients' => client::where('createdby', auth()->user()->id)->get()];

        return view('dashboard', $clients);
    }

    public function deleteClient(Request $request)
    {
        $client = client::find($request->id);
        $client->delete();

        $clients = ['clients' => client::where('createdby', auth()->user()->id)->get()];

        return view('dashboard', $clients);
    }
}
