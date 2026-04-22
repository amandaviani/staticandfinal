<?php

class Pengunjung {

    public static $jumlah = 0;

    public function __construct() {
        self::$jumlah++;
    }

    public static function reset() {
        self::$jumlah = 0;
    }
    }


$p1 = new Pengunjung(1);
$p2 = new Pengunjung(2);
$p3 = new Pengunjung(3);
$p4 = new Pengunjung(4);
$p5 = new Pengunjung(5);

echo "Jumlah Pengunjung: " . Pengunjung::$jumlah;

Pengunjung::reset();

echo "<br>Jumlah setelah reset: " . Pengunjung::$jumlah;

?>