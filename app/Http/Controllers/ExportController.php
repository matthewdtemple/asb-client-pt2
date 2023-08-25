<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportClients;
use Maatwebsite\Excel\Facades\Excel;    
use App\Models\client;

class ExportController extends Controller
{


    public function exportCSVFile() 
    {
        $clientsFound = new ExportClients;

        foreach($clientsFound as $client){
        $flagged = $client->userid ? "Yes" : "No";
        }
        

        return Excel::download(new ExportClients, 'users.csv', \Maatwebsite\Excel\Excel::CSV);
    }    
}
