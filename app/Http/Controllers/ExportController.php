<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportClients;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{


    public function exportCSVFile() 
    {
        return (new ExportClients)->collection('users.csv', \Maatwebsite\Excel\Excel::CSV);
    }    
}
