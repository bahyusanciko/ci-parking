<?php
require_once(APPPATH.'vendor/mike42/escpos-php/autoload.php');
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

        $connector = new WindowsPrintConnector("POS58");
        // $logo = EscposImage::load("./assets/img/logo.png", false);
        $printer = new Printer($connector);
        $printer -> initialize();      
        /* Name of shop */
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        // $printer -> bitImage($logo);
        $printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
        $printer -> text("ParkirinAja\n");
        $printer -> selectPrintMode();
        $printer -> setJustification(Printer::JUSTIFY_LEFT);
        $printer -> text($tipe['kd_kendaraan'].' / '.strtoupper($tipe['nama_kendaraan'])."\n");
        $printer -> text('Penjaga : '.$cetak['create_keluar']."\n");
        $printer -> text('Masuk : '.$cetak['tgl_jam_masuk']."\n");
        $printer -> text('Keluar : '.$cetak['tgl_jam_keluar']."\n");
        $printer -> setJustification(Printer::JUSTIFY_LEFT);
        $printer -> text("Lama Parkir : ".$cetak['lama_parkir_keluar']."\n");
        $printer -> feed();
        $printer -> text("Sewa Kasir   : Rp ".$cetak['total_keluar']);
        $printer -> feed(3);
        $printer -> selectPrintMode();
        $printer -> text("TERIMA KASIH ATAS KUNJUNGAN ANDA");
        $printer -> text("--------------------------------\n");
        /* Cut the receipt and open the cash drawer */
        $printer -> cut();
        $printer -> pulse();
        $printer -> close();