<?php

$db = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query)
{
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $db;

    // fungsi htmlspecialchars() => agar sintaks html tidak di eksekusi (security)
    $nama_brg = htmlspecialchars($data["nama_brg"]);
    $jenis_brg = htmlspecialchars($data["jenis_brg"]);
    $jml_brg = htmlspecialchars($data["jml_brg"]);

    // upload foto
    $foto_brg = upload();
    if (!$foto_brg) {
        return false;
    }

    $query = "INSERT INTO stok_barang VALUES
                ('', '$nama_brg', '$jenis_brg', '$jml_brg', '$foto_brg')
            ";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function upload()
{

    // langkah 1 : ambil data yg dibutuhkan dari variabel $_FILES
    $filename = $_FILES['foto_brg']['name'];
    $filesize = $_FILES['foto_brg']['size'];
    $fileerror = $_FILES['foto_brg']['error'];
    $filetmp  = $_FILES['foto_brg']['tmp_name'];

    // langkah 2 : cek apakah foto harus diupload
    if ($fileerror === 4) {
        echo "
                <script>
                    alert('Silahkan Upload Foto Barang!');
                </script>
            ";
        return false;
    }

    // langkah 3 : cek apakah foto adalah gambar atau bukan (security)
    // 1. ambil nama ekstensi tipe data dari nama file
    $filevalid = ['jpg', 'jpeg', 'png'];
    $filetype  = explode('.', $filename); // untuk memecah string menjadi elemen array
    $filetype  = strtolower(end($filetype));
    // end = mengambil elemen array paling akhir
    // strtolower = mengubah format string menjadi huruf kecil saja

    // 2. jalankan pengkondisian
    // in_array = fungsi untuk mencari sesuatu dalam array, menghasilkan nilai true/false
    if (!in_array($filetype, $filevalid)) {
        echo "
                <script>
                    alert('Foto Barang Salah! Tolong Upload Foto Dengan Format jpg, jpeg, atau png!');
                </script>
            ";
        return false;
    }

    // langkah 4 : cek jika ukuran maksimal file (byte)
    if ($filesize > 1000000) {
        echo "
                <script>
                    alert('Foto Barang Maksimal Sebesar 1Mb!');
                </script>
            ";
        return false;
    }

    // langkah 5 : memindahkan file yang sudah lolos pengecekan
    // sebelumnya, kita harus generate nama foto yang baru agar tidak terjadi kesalahan dalam database
    $new_filename = uniqid();
    $new_filename .= ".";
    $new_filename .= $filetype;

    move_uploaded_file($filetmp, 'img/' . $new_filename);

    // agar yang disimpan dalam database hanya stringnya saja
    // sehingga file foto disimpan ke dalam direktori (database tidak besar)
    return $new_filename;
}

function hapus($id)
{
    global $db;

    $query = "DELETE FROM stok_barang WHERE id_brg = $id";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function ubah($data)
{
    global $db;

    $id = $data["id_brg"];
    $nama_brg = htmlspecialchars($data["nama_brg"]);
    $jenis_brg = htmlspecialchars($data["jenis_brg"]);
    $jml_brg = htmlspecialchars($data["jml_brg"]);
    $foto_brg_lama = htmlspecialchars($data["foto_brg_lama"]);

    // cek apakah user input gambar baru/tidak
    if ($_FILES['foto_brg']['error'] === 4) {
        $foto_brg = $foto_brg_lama;
    } else {
        $foto_brg = upload();
    }

    $query = "UPDATE stok_barang SET
                nama_brg = '$nama_brg', 
                jenis_brg = '$jenis_brg', 
                jml_brg = '$jml_brg', 
                foto_brg = '$foto_brg'
            WHERE id_brg = $id
            ";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function cari($keyword)
{
    $query = "SELECT * FROM stok_barang WHERE 
                nama_brg LIKE '%$keyword%' OR
                jenis_brg LIKE '%$keyword%' OR
                jml_brg LIKE '%$keyword%'
                "; // perintah LIKE + % => mencari sesuatu dengan fleksibel atau yang mirip

    return query($query);
}

function registrasi($data)
{
    global $db;

    $username = stripslashes($data["username"]); // menghilangkan backslash
    $password = mysqli_real_escape_string($db, $data["password"]); // memungkinkan karakter "!"
    $password2 = mysqli_real_escape_string($db, $data["password2"]);
    $nama_user = htmlspecialchars($data["nama_user"]);
    $nohp_user = htmlspecialchars($data["nohp_user"]);
    $email_user = htmlspecialchars($data["email_user"]);
    $tipe_user = htmlspecialchars($data["tipe_user"]);

    // cek username sudah ada / belum
    $result = mysqli_query($db, "SELECT username FROM user 
                                WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('Username Sudah Terdaftar!');
            </script>
        ";
        return false;
    }

    // cek konfirmasi password2 = password
    if ($password2 !== $password) {
        echo "
            <script>
                alert('Konfirmasi Password Tidak Sesuai!');
            </script>
        ";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // input password ke db
    $query = "INSERT INTO user VALUES
                ('', '$email_user', '$username', '$password', 
                '$nama_user', '$nohp_user', '$tipe_user')
            ";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
