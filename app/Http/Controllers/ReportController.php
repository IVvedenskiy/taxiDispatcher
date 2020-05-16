<?php

namespace App\Http\Controllers;

use App\Car;
use App\Order;
use App\TaxiDriver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class ReportController extends Controller
{
    public function showReportForm()
    {
        $drivers = TaxiDriver::all();
        return view('create-forms.report', ['drivers' => $drivers]);
    }

    public function showReportFormAdmin()
    {
        $drivers = TaxiDriver::all();
        return view('admin.admin-report', ['drivers' => $drivers]);
    }

    public function createReport(Request $request)
    {
        $validation = $request->validate([
            'inn' => ['required', 'string', 'max:10', 'min:10']
        ]);

        $months = [
            'січня',
            'лютого',
            'березня',
            'квітня',
            'травня',
            'червня',
            'липня',
            'серпня',
            'вересня',
            'жовтня',
            'листопаду',
            'грудня'
        ];

        $cars = Car::all();
        $orders = Order::all()->where('completed', 1)->where('driver_id', $request->input('driver_id'));

        $now = date("Y-m-d H:i:s");
        $month = date('n', strtotime($now));
        $year = date('Y', strtotime($now));

        $inn = str_split($request->input('inn'));

        $address = $request->input('address');
        $houseNumber = $request->input('houseNumber');
        $legalAddress = "ул. Грушевского, 1д, г. Киев, 01001, Украина";

        $driver = $this->getDriverById($request->input('driver_id'));

        $seatNumber = '';
        foreach ($cars as $car) {
            if ($car->id == $driver->car_id) {
                $seatNumber = $car->seatsNumber;
            }
        }

        $monday = 0;
        $tuesday = 0;
        $wednesday = 0;
        $thursday = 0;
        $friday = 0;
        $saturday = 0;
        $sunday = 0;

        foreach ($orders as $order) {
            switch (date('N', strtotime($order->created_at))) {
                case(1):
                    $monday++;
                    break;
                case(2):
                    $tuesday++;
                    break;
                case(3):
                    $wednesday++;
                    break;
                case(4):
                    $thursday++;
                    break;
                case(5):
                    $friday++;
                    break;
                case(6):
                    $saturday++;
                    break;
                case(7):
                    $sunday++;
                    break;
            }
        }


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

        $section = $phpWord->addSection(array(
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
        $table->addCell(272)->addText($inn[0], array(), array('align' => 'center'));
        $table->addCell(272)->addText($inn[1], array(), array('align' => 'center'));
        $table->addCell(272)->addText($inn[2], array(), array('align' => 'center'));
        $table->addCell(272)->addText($inn[3], array(), array('align' => 'center'));
        $table->addCell(272)->addText($inn[4], array(), array('align' => 'center'));
        $table->addCell(272)->addText($inn[5], array(), array('align' => 'center'));
        $table->addCell(272)->addText($inn[6], array(), array('align' => 'center'));
        $table->addCell(272)->addText($inn[7], array(), array('align' => 'center'));
        $table->addCell(272)->addText($inn[8], array(), array('align' => 'center'));
        $table->addCell(272)->addText($inn[9], array(), array('align' => 'center'));


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

        $section->addText("за ІІ тиждень " . $months[$month - 1] . " " . $year . " року",
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
        $cell->addText(" Ім’я (ПІБ):  " . $driver->lastName . " " . $driver->firstName, array('size' => 10), array('align' => 'left'));
        $cell->addText(" Місце проживання: " . $address, array('size' => 10), array('align' => 'left'));
        $cell->addText("(поштовий індекс, область /АР Крим, район, населений пункт, вулиця /провулок, площа тощо, ", array('size' => 8, 'italic' => true), array('align' => 'center'));
        $cell->addText(" ___________________________" . $houseNumber . "__________________________________________________", array('size' => 8), array('align' => 'left'));
        $cell->addText("№ будинку /корпусу, № квартири)", array('size' => 8, 'italic' => true), array('align' => 'center'));
        $cell->addText(" Адреса здійснення діяльності, щодо якої подається анкета: __________________________________________", array('size' => 10), array('align' => 'left'));
        $cell->addText("                                                                                                                                                 (поштовий індекс, область /АР Крим,  район,", array('size' => 8, 'italic' => true), array('align' => 'left'));
        $cell->addText(" _____________________" . $legalAddress . "___________________ ", array('size' => 10), array('align' => 'left'));
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
        $table->addCell(436, array('borderSize' => 6, 'borderColor' => '000000', 'marginTop' => 0))->addText("0", array('size' => 10), array('align' => 'center'));
        $table->addCell(436, array('borderSize' => 6, 'borderColor' => '000000', 'marginTop' => 0))->addText("0", array('size' => 10), array('align' => 'center'));
        $table->addCell(436, array('borderSize' => 6, 'borderColor' => '000000', 'marginTop' => 0))->addText("0", array('size' => 10), array('align' => 'center'));
        $table->addCell(436, array('borderSize' => 6, 'borderColor' => '000000', 'marginTop' => 0))->addText("1", array('size' => 10), array('align' => 'center'));
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
        $table->addCell(1570)->addText($monday, array('size' => 14), array('align' => 'center'));
        $table->addCell(1570)->addText($tuesday, array('size' => 14), array('align' => 'center'));
        $table->addCell(1570)->addText($wednesday, array('size' => 14), array('align' => 'center'));
        $table->addCell(1570)->addText($thursday, array('size' => 14), array('align' => 'center'));
        $table->addCell(1570)->addText($friday, array('size' => 14), array('align' => 'center'));
        $table->addCell(1570)->addText($saturday, array('size' => 14), array('align' => 'center'));
        $table->addCell(1570)->addText($sunday, array('size' => 14), array('align' => 'center'));

        $section->addText("Довідково:<w:br/>Кількість місць для сидіння пасажирів, одиниць (03) " . $seatNumber,
            array('size' => 10),
            array('align' => 'left'));
        $section->addTextBreak(4);

        $section->addText("Місце підпису фізичної особи-підприємця, " . $driver->lastName . " " . $driver->firstName . " (ПІБ)<w:br/>щодо діяльності якої подається анкета",
            array('size' => 10),
            array('align' => 'left'));

        $file = 'Report' . $driver->lastName . '.docx';

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
