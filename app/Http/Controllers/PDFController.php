<?php

namespace App\Http\Controllers;

use App\TaxiDriver;
use PhpOffice\PhpWord\Exception\Exception;


class PDFController extends Controller
{
    public function getPdfPage()
    {
        $data = TaxiDriver::all();

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        foreach ($data as $s){
            $text = $section->addText($s->lastName);
            $text = $section->addText($s->callSign);
            $text = $section->addText($s->phoneNumber);
        }
//        $text = $section->addText($request->get('number'),array('name'=>'Arial','size' => 20,'bold' => true));
//        $section->addImage("./images/Krunal.jpg");
        try {
            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        } catch (Exception $e) {
            echo $e;
        }
        $objWriter->save('Appdividend.docx');
        return response()->download(public_path('Appdividend.docx'));
    }
}
