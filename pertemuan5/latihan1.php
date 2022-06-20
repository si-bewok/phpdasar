<?php 
    // Array = variabel yang dapat menampung banyak nilai
    // Ada 2 cara untuk membuat Array : Cara Lama & Cara Baru

    // Cara Lama (php 5 kebawah)
    $hari = array("Senin", "Selasa", "Rabu");
    // Cara Baru
    $bulan = ["Januari", "Februari", "Maret"];
    // Array dapat menyimpan tipe data yang berbeda-beda
    $data1 = ["Jeruk", 12, false];

    // Menampilkan Array
    print_r($hari);
    echo "<br>";
    var_dump($bulan); 
    echo "<br>";

    // Menampilkan 1 elemen dalam Array
    echo $hari[0];
    echo "<br>";
    echo $bulan[1];
    echo "<br>";

    // Menambahkan elemen ke Array (di urutan terakhir)
    var_dump($hari);
    $hari[] = "Kamis";
    $hari[] = "Jum'at";
    echo "<br>";
    var_dump($hari);
?>         