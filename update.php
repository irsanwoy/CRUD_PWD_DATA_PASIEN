<?php
require_once "pasien.php";
$pasien = new pasien();
$table = "data_pasien";
$id_pasien = $_GET['id_pasien'];
$where = ['id_pasien' => $id_pasien];
$row = $pasien->tampilData($table, $where);
?>

<!DOCTYPE html>
<html>

<head>
    <title>UPDATE PASIEN</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1> Update Data Pasien </h1>
    <form method="POST" action="">
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" value="<?= isset($row[0]['nama']) ? $row[0]['nama'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <select name="jenis_kelamin">
                        <option value="<?= $row[0]['jenis_kelamin']; ?>"><?= $row[0]['jenis_kelamin']; ?></option>
                        <option value="laki-laki">laki-laki</option>
                        <option value="perempuan">perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><input type="date" name="tanggal_lahir"
                        value="<?= isset($row[0]['tanggal_lahir']) ? $row[0]['tanggal_lahir'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" name="alamat" value="<?= isset($row[0]['alamat']) ? $row[0]['alamat'] : ''; ?>">
                </td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td>:</td>
                <td><input type="text" name="nomor_telepon"
                        value="<?= isset($row[0]['nomor_telepon']) ? $row[0]['nomor_telepon'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>Riwayat Penyakit</td>
                <td>:</td>
                <td><input type="text" name="riwayat_penyakit"
                        value="<?= isset($row[0]['riwayat_penyakit']) ? $row[0]['riwayat_penyakit'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>Status Aktif</td>
                <td>:</td>
                <td>
                    <select name="status_aktif">
                        <option value="<?= $row[0]['status_aktif']; ?>"><?= $row[0]['status_aktif']; ?></option>
                        <option value="aktif">aktif</option>
                        <option value="non-aktif">non-aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" name="back" value="BACK">
                    <input type="submit" name="submit" value="SUBMIT">
                </td>
            </tr>
        </table>

    </form>
</body>

</html>
<?php
if (isset($_POST['back'])) {
    header("location:datapasien.php");
}
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $riwayat_penyakit = $_POST['riwayat_penyakit'];
    $status_aktif = $_POST['status_aktif'];
    $data = array(
        'nama' => $nama,
        'jenis_kelamin' => $jenis_kelamin,
        'tanggal_lahir' => $tanggal_lahir,
        'alamat' => $alamat,
        'nomor_telepon' => $nomor_telepon,
        'riwayat_penyakit' => $riwayat_penyakit,
        'status_aktif' => $status_aktif
    );
    $pasien->editData($table, $data, $where);
    header("location:datapasien.php");
}
?>