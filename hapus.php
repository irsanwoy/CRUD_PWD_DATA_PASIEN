<?php
require_once "pasien.php";

// Memeriksa apakah parameter id_pasien telah disediakan dalam URL
if(isset($_GET['id_pasien'])) {
    // Mendapatkan id_pasien dari URL
    $id_pasien = $_GET['id_pasien'];

    // Membuat objek Pasien
    $pasien = new Pasien();

    // Menjalankan fungsi hapusData untuk menghapus data pasien
    $pasien->hapusData("data_pasien", array("id_pasien" => $id_pasien));

    // Mengarahkan kembali ke halaman data pasien setelah penghapusan berhasil
    header("Location: datapasien.php");
    exit();
} else {
    // Jika parameter id_pasien tidak ditemukan dalam URL, arahkan kembali ke halaman data pasien
    header("Location: datapasien.php");
    exit();
}
?>
