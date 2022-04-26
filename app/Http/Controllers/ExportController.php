<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;


class ExportController extends Controller
{
     public function usersCsv(){

         return Excel::download(new UsersExport, 'users.xlsx');

     }
}
