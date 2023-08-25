<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;
use Illuminate\Support\Facades\Log;


class ClientController extends Controller
{

    public function dashboard()
    {
        $clients = ['clients' => client::where('createdby', auth()->user()->id)->get()];

        return view('dashboard', $clients);
    }
}
