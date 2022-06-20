<?php 
    // built in function php = https://www.php.net/manual/en/funcref.php
    
    // date("parameter"); = untuk menampilkan tanggal dengan format tertentu
    // echo date("l, d F Y");

    // time(); = untuk menampilkan detik dalam UNIX Timestamp (detik yang berlalu sejak 1 Januari 1970)
    // echo time();

    // Menggabungkan 2 fungsi date dan time
    // Contoh kasus : ingin mengetahui 3 hari kedepan itu hari apa?
    // echo date("l", time()+60*60*24*3); 
    // Contoh kasus : ingin mengetahui 3 hari kebelakang/lalu itu hari apa?
    // echo date("l", time()-60*60*24*3);

    // (jam,detik,menit,bulan,tanggal,tahun)
    // mktime(0,0,0,0,0,0); = membuat detik sendiri dari patokan UNIX Timestamp
    // Contoh kasus : Mengetahui "hari" dari tanggal lahir kita
    // echo date("l", mktime(0,0,0,7,16,1999));
    
?>