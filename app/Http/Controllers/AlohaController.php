<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AlohaController extends Controller
{
    public function getPdf()
    {
        $view =  view('pdf.example')->render();
        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }
}
