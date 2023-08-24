<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportClients;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{


    public function exportCSVFile() 
    {
        return Excel::download(new ExportClients, 'users.csv', \Maatwebsite\Excel\Excel::CSV);
    }    
}
