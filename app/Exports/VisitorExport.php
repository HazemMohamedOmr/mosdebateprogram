<?php

namespace App\Exports;

use App\Models\Invitations;
use Maatwebsite\Excel\Concerns\FromCollection;

class VisitorExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Invitations::all();
    }
}
