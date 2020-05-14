<?php

namespace App\Http\Controllers;

use App\TaxiDriver;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class ReportController extends Controller
{
    public function createReport()
    {
        $drivers = TaxiDriver::all();

        $phpWord = new PhpWord();
        $phpWord->setDefaultFontName('Times New Roman');
        $phpWord->setDefaultFontSize(14);

        $userName = Auth::user()->name;

        $properties = $phpWord->getDocInfo();
        $properties->setCreator($userName);
        $properties->setLastModifiedBy($userName);
        $properties->setCreated(mktime(time()));
        $properties->setModified(mktime(time()));
        $properties->setSubject('Report');


        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');
        $cellColSpan2 = array('gridSpan' => 2, 'valign' => 'center');
        $cellColSpan3 = array('gridSpan' => 3, 'valign' => 'center');

        $cellVCentered = array('valign' => 'center');

        $section = $phpWord->addSection(array(
//            'marginLeft' => 1133.7,
            'marginRight' => 566.9,
            'marginTop' => 850.4,
            'marginBottom' => 850.4,
            'pageNumberingStart' => 1
        ));
        $phpWord->addTableStyle('Colspan Rowspan', array('borderSize' => 6, 'borderColor' => '000000', 'marginLeft' => 2267.7));
        $table = $section->addTable('Colspan Rowspan');
        $header1 = "Ідентифікаційний номер фізичної особи-підприємця – платника податків";
        $table->addRow(272, array('spaceAfter' => 0));
        $table->addCell(6463)->addText($header1, array('size' => 10), array('align' => 'center', 'valign' => 'center'));
        $table->addCell(272)->addText('', array(), array('align' => 'center'));
        $table->addCell(272)->addText('', array(), array('align' => 'center'));
        $table->addCell(272)->addText('', array(), array('align' => 'center'));
        $table->addCell(272)->addText('', array(), array('align' => 'center'));
        $table->addCell(272)->addText('', array(), array('align' => 'center'));
        $table->addCell(272)->addText('', array(), array('align' => 'center'));
        $table->addCell(272)->addText('', array(), array('align' => 'center'));
        $table->addCell(272)->addText('', array(), array('align' => 'center'));
        $table->addCell(272)->addText('', array(), array('align' => 'center'));
        $table->addCell(272)->addText('', array(), array('align' => 'center'));


        $header2 = "Державне статистичне спостереження";
        $section->addTextBreak(1);
        $section->addText($header2,
            array('size' => 10, 'bold' => true),
            array('align' => 'center'));
        $section->addTextBreak(1);


        $table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'marginLeft' => 2267.7, 'marginTop' => 0));
        $header3 = "Конфіденційність статистичної інформації забезпечується<w:br/>статтею 21 Закону України \"Про державну статистику\"";
        $table->addRow(272, array('spaceAfter' => 0));
        $table->addCell(7018.6)->addText($header3, array('size' => 9, 'bold' => true), array('align' => 'center'));
        $section->addTextBreak(1);

        $table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'marginTop' => 0));
        $header4 = "Порушення порядку подання або використання даних державних статистичних спостережень тягне за собою<w:br/>відповідальність, яка встановлена статтею 186³ Кодексу України про адміністративні правопорушення";
        $table->addRow(272, array('spaceAfter' => 0));
        $table->addCell(9569.7)->addText($header4, array('size' => 9, 'bold' => true), array('align' => 'center'));
        $section->addTextBreak(1);


        $header5 = "Обстеження фізичної особи-підприємця, що<w:br/>здійснює пасажирські автоперевезення на маршруті  ";
        $section->addText($header5,
            array('size' => 13, 'bold' => true),
            array('align' => 'center'));

        $section->addText("за ІІ тиждень ___________________ 20___ року",
            array('size' => 11),
            array('align' => 'center'));
        $section->addText("(травня, листопада)",
            array('size' => 10, 'italic' => true),
            array('align' => 'center'));
        $section->addTextBreak(1);


        $table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'marginTop' => 0));
        $table->addRow(272, array('spaceAfter' => 0));
        $table->addCell(4070.5)->addText("Подають:", array('size' => 10), array('align' => 'center'));
        $table->addCell(4070.5)->addText("Термін подання", array('size' => 10), array('align' => 'center'));
        $table->addRow(1468.3, array('spaceAfter' => 0));
        $table->addCell(2704)->addText("фізичні особи-підприємці <w:br/><w:br/><w:br/><w:br/><w:br/>– територіальному органу Держстату", array('size' => 10), array('align' => 'left'));
        $table->addCell(2704)->addText("<w:br/>не пізніше 25 травня<w:br/><w:br/>не пізніше 25 листопада<w:br/><w:br/>", array('size' => 10), array('align' => 'center'));
        $table->addCell(1133.7, array('borderSize' => 6, 'borderColor' => 'ffffff', 'marginTop' => 0))->addText("", array('size' => 10), array('align' => 'center'));
        $table->addCell(1133.7, array('borderSize' => 6, 'borderColor' => 'ffffff', 'marginTop' => 0))->addText("№ 51-пас<w:br/>(2 рази на рік)<w:br/>ЗАТВЕРДЖЕНО<w:br/>наказ Держстату<w:br/>від 14.06.2019 № 216", array('size' => 10), array('align' => 'center'));
        $section->addTextBreak(1);

        $table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'marginTop' => 0));
        $table->addRow(3101.1, array('spaceAfter' => 0));
        $cell = $table->addCell(10028.9);
        $cell->addText(" Респондент:", array('size' => 10, 'bold' => true), array('align' => 'left'));
        $cell->addText(" Ім’я (ПІБ):  ___________________________________________________________________________________", array('size' => 10), array('align' => 'left'));
        $cell->addText(" Місце проживання: ____________________________________________________________________________", array('size' => 10), array('align' => 'left'));
        $cell->addText("(поштовий індекс, область /АР Крим, район, населений пункт, вулиця /провулок, площа тощо, ", array('size' => 8, 'italic' => true), array('align' => 'center'));
        $cell->addText(" _____________________________________________________________________________________________ ", array('size' => 8), array('align' => 'left'));
        $cell->addText("№ будинку /корпусу, № квартири)", array('size' => 8, 'italic' => true), array('align' => 'center'));
        $cell->addText(" Адреса здійснення діяльності, щодо якої подається анкета: __________________________________________", array('size' => 10), array('align' => 'left'));
        $cell->addText("                                                                                                                                                 (поштовий індекс, область /АР Крим,  район,", array('size' => 8, 'italic' => true), array('align' => 'left'));
        $cell->addText(" _____________________________________________________________________________________________ ", array('size' => 10), array('align' => 'left'));
        $cell->addText("населений пункт, вулиця /провулок, площа  тощо, № будинку /корпусу, № квартири /офісу)", array('size' => 8, 'italic' => true), array('align' => 'center'));
        $section->addPageBreak();


        $section = $phpWord->addSection(array(
            'orientation' => 'landscape',
            'marginLeft' => 850.4, //Левое поле равно 15 мм
            'marginRight' => 850.4,
            'marginTop' => 850.4,
            'marginBottom' => 850.4,
            'pageNumberingStart' => 1
        ));
        $table = $section->addTable(array('borderSize' => 6, 'borderColor' => 'ffffff', 'marginTop' => 0, 'align' => 'right'));
        $table->addRow(218, array('spaceAfter' => 0));
        $table->addCell(13577)->addText("Порядковий номер транспортного засобу, що експлуатує фізична особа-підприємець<w:br/>(у разі наявності інформації по 1 та більше транспортним засобам)", array('size' => 10), array('align' => 'right'));
        $table->addCell(436, array('borderSize' => 6, 'borderColor' => '000000', 'marginTop' => 0))->addText("", array('size' => 10), array('align' => 'center'));
        $table->addCell(436, array('borderSize' => 6, 'borderColor' => '000000', 'marginTop' => 0))->addText("", array('size' => 10), array('align' => 'center'));
        $table->addCell(436, array('borderSize' => 6, 'borderColor' => '000000', 'marginTop' => 0))->addText("", array('size' => 10), array('align' => 'center'));
        $table->addCell(436, array('borderSize' => 6, 'borderColor' => '000000', 'marginTop' => 0))->addText("", array('size' => 10), array('align' => 'center'));
        $section->addTextBreak(1);


        $table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'marginTop' => 0));
        $table->addRow(null, array('spaceAfter' => 0));
        $cell = $table->addCell(13606);
        $cell->addText("Зазначте вид сполучення: &#9745; &#9745; міське в обласному (республіканському) центрі", array('size' => 14), array('align' => 'left'));
        $cell->addText("                                                 &#9745; міське в інших містах обласного підпорядкування та містах районного<w:br/>підпорядкування", array('size' => 14), array('align' => 'left'));
        $cell->addText("                                                &#9745; приміське ", array('size' => 14), array('align' => 'left'));
        $cell->addText("                                                 міжміське  ", array('size' => 14), array('align' => 'left'));

        $section->addTextBreak(1);
        $table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'marginTop' => 0, 'align' => 'left'));
        $table->addRow(969, array('spaceAfter' => 0));
        $table->addCell(3350)->addText("", array('size' => 14), array('align' => 'center'));
        $table->addCell(901)->addText("Код<w:br/>рядка", array('size' => 14), array('align' => 'center'));
        $table->addCell(1570)->addText("Понеділок", array('size' => 14), array('align' => 'center'));
        $table->addCell(1570)->addText("Вівторок", array('size' => 14), array('align' => 'center'));
        $table->addCell(1570)->addText("Середа", array('size' => 14), array('align' => 'center'));
        $table->addCell(1570)->addText("Четвер", array('size' => 14), array('align' => 'center'));
        $table->addCell(1570)->addText("П’ятниця", array('size' => 14), array('align' => 'center'));
        $table->addCell(1570)->addText("Субота", array('size' => 14), array('align' => 'center'));
        $table->addCell(1570)->addText("Неділя", array('size' => 14), array('align' => 'center'));
        $table->addRow(969, array('spaceAfter' => 0));
        $table->addCell(3350)->addText("Кількість перевезених<w:br/>пасажирів, осіб", array('size' => 14), array('align' => 'center'));
        $table->addCell(901)->addText("1", array('size' => 14), array('align' => 'center'));
        $table->addCell(1570)->addText("", array('size' => 14), array('align' => 'center'));
        $table->addCell(1570)->addText("", array('size' => 14), array('align' => 'center'));
        $table->addCell(1570)->addText("", array('size' => 14), array('align' => 'center'));
        $table->addCell(1570)->addText("", array('size' => 14), array('align' => 'center'));
        $table->addCell(1570)->addText("", array('size' => 14), array('align' => 'center'));
        $table->addCell(1570)->addText("", array('size' => 14), array('align' => 'center'));
        $table->addCell(1570)->addText("", array('size' => 14), array('align' => 'center'));

        $section->addText("Довідково:<w:br/>Кількість місць для сидіння пасажирів, одиниць (03) ________",
            array('size' => 10),
            array('align' => 'left'));
        $section->addTextBreak(4);

        $section->addText("Місце підпису фізичної особи-підприємця,                                                   (ПІБ)<w:br/>щодо діяльності якої подається анкета",
            array('size' => 10),
            array('align' => 'left'));

        foreach ($drivers as $driver) {
            $text = $section->addText($driver->lastName);
            $text = $section->addText($driver->callSign);
            $text = $section->addText($driver->phoneNumber);
        }

        $file = 'Report' . $this->getDriverById(2)->lastName . '.docx';

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        $xmlWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $xmlWriter->save("php://output");
    }

    public function getDriverById($id)
    {
        $drivers = TaxiDriver::all();
        foreach ($drivers as $driver) {
            if ($id == $driver->id) {
                return $driver;
            }
        }
        return 0;
    }
}
