<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShoulAutoSize;

class UsersExport implements FromCollection,ShoulAutoSize

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();

    }
}
