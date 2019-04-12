<?php
require_once(APPPATH.'vendor/mike42/escpos-php/autoload.php');
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$connector = new WindowsPrintConnector("POS58");
$printer = new Printer($connector);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> text("Tiket Parkir\n");
$testStr =($cetak['kd_masuk']);
$printer -> feed();
$hri = array (
    Printer::BARCODE_TEXT_BELOW => $cetak['tgl_masuk'],
    );
foreach ($hri as $position => $caption) {
    $printer->text($caption . "\n");
    $printer->setBarcodeTextPosition($position);
    $printer->barcode($testStr, Printer::BARCODE_CODE93);
    $printer->feed();
}
$printer -> selectPrintMode();
$printer -> text("SIMPANLAH TIKET DENGAN AMAN ");
$printer -> text("KERUSAKAN DAN KEHILANGAN BARANG BUKAN TANGGUNG JAWAB PENGELOLA");
$printer -> text("KEHILANGAN TIKET PARKIR DI KENAKAN DENDA Rp.10.000,-");
$printer -> feed();
$printer -> text("----------------------------------------\n");
$printer->cut();
$printer->close();
?>
