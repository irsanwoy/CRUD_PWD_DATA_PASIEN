<?php
require_once "pasien.php";
$mhs = new Pasien();
$table = "data_pasien";





?>
<!DOCTYPE html>
<html>

<head>
    <title>CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Tabel Pasien</h1>
    <button><a href="tambahpasien.php">Tambah Data Pasien</a></button>
    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Riwayat Penyakit</th>
                <th>Status Aktif</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
$row = $mhs->tampilData($table);
foreach ($row as $data) {
?>
            <tr>
                <td><?=$data['nama'];?></td>
                <td><?=$data['jenis_kelamin'];?></td>
                <td><?=$data['alamat'];?></td>
                <td><?=$data['nomor_telepon'];?></td>
                <td><?=$data['riwayat_penyakit'];?></td>
                <td><?=$data['status_aktif'];?></td>
                <td>
                    <a href="update.php?id_pasien=<?=$data['id_pasien'];?>">EDIT</a>  || <a href="hapus.php?id_pasien=<?=$data['id_pasien'];?>">HAPUS</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>

