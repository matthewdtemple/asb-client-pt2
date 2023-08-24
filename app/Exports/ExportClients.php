<?php

namespace App\Exports;

use App\Models\client;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportClients implements FromCollection
{


    public function collection()
    {
        return client::where('createdby', auth()->user()->id)->get();
    }
}
