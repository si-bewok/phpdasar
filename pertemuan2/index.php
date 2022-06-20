<?php
// Sintaks Dasar PHP
/* A. Standar Output  : untuk menampilkan sesuatu ke layar
        1. echo,print : mencetak isi variabel/tulisan 
        2. print_r    : mencetak isi array/string (untuk debug)
        3. var_dump   : melihat isi dari variabel, menampilkan tipe data&ukurannya (untuk debug)
*/
// contoh penggunaan : 
    echo "Si-Bewok";
    print " Ganteng";
    print_r(" Banget");
    var_dump(" Sumpah");
// untuk string, boleh pake "" atau '', tapi lebih baik pake ""
    echo ' Suka Merokok';    
// untuk integer dan boolean, tidak perlu tanda kutip 
    echo 12; 
    echo true; // hasil output adalah angka "1"
    print false; // hasil output "kosong" bukan angka "0"

/* 
    B. Penulisan Sintaks PHP
        1. PHP di dalam HTML 
        2. HTML di dalam PHP (tidak disarankan)
*/
// contoh PHP di dalam HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Belajar PHP</title>
</head>
<body>
    <h1>Halo, Selamat Datang <?php echo "Si-Bewok";?></h1>
    <p>Si-Bewok merupakan nama panggung di dunia maya bagi Zhafari</p>
</body>
</html>

<?php 
// contoh HTML di dalam PHP
    echo "<h1>Sampai Jumpa, Si-Bewok!</h1>";

/* 
    C. Variabel dan Tipe Data
*/
    /* Variabel : digunakan untuk menampung sebuah nilai
    syarat : 
        - tidak boleh diawali dgn ANGKA, tapi boleh mengandung angka
        - tidak boleh pake spasi, silahkan gunakan '_'

    */ 

// contoh penggunaan variabel
$nama = "Si-Bewok";
$umur = 22;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Selamat Datang, <?php echo $nama;?> </h1>
    <h1>Selamat Berulang Tahun yang Ke-<?php echo $umur?></h1>
</body>
</html>

<?php 
// C. Operator 
//     1. Aritmatika : + , - , * , / , % (modulus/sisa bagi)
//     2. Concat/Penggabung String : tanda titik "."
//     3. Assignment/Penugasan : = , += , -=, *= , /= , %= , .=
//     Untuk Pengkodisian :
//     4. Perbandingan (tidak mengecek tipe data) : > , < , >= , <= , == , tidak sama dengan "!="
//     5. Identitas (dapat mengecek tipe data) : ===, !==
//     6. Logika : dan "&&" , atau "||", bukan "!"
// Contoh Aritmatika :
        $x = 2;
        $y = 3;
        echo $x * $y;
        echo ($x * $y)/$x;
        echo 1+9;
        echo 10/2;
        echo 5*2;
        echo 10%5;

// Contoh Concat :
    echo $nama . " " . $umur;

// Contoh Assignment :
    $x += 1;
    $y -= 1;
    echo $x . " " . $y;

// Contoh Perbandingan : 
    var_dump(1 > 5);
    var_dump(1 < 5);
    var_dump(1 == 5);
    var_dump(1 == "1");
    var_dump(1 != 1);

// Contoh Identitas : 
    var_dump(1 === "1");

// Contoh Logila : 
    var_dump($x < $y && $x == $y);
    var_dump($x < $y || $x == $y);
?>