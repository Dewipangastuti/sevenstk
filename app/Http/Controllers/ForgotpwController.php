<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ForgotpwController extends Controller
{
    public function forgotpw()
    {
        
        return view("LayoutLogin/forgotpw");
    }
}

?>