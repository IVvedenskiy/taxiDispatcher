<?php

namespace App\Http\Controllers;

use App\TaxiDriver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;

class PDFController extends Controller
{
    public function getPdfPage()
    {
        $data = TaxiDriver::all();
        $pdf = (new \Barryvdh\DomPDF\PDF)->loadView('pdf', $data)->setPaper('a4');
        $pdf->save(storage_path().'taxi_drivers.pdf');
        return $pdf->download('pdf');
    }
}
