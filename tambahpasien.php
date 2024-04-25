<?php
require_once "pasien.php";
$pasien = new Pasien();
$table = "data_pasien";
?>
<link rel="stylesheet" href="style.css">
<form method="POST" action="">
        <fieldset style="width:15%;">
            <legend>Data Mahasiswa</legend>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        <select name="jenis_kelamin">
                            <option value="laki-laki">laki-laki</option>
                            <option value="perempuan">perempuan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td>
                        <input type="date" name="tanggal_lahir">
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="alamat">
                    </td>
                </tr>
                <tr>
                    <td>Nomor Telepon</td>
                    <td>:</td>
                    <td><input type="number" name="nomor_telepon"></td>
                </tr>
                <tr>
                    <td>Riwayat Penyakit</td>
                    <td>:</td>
                    <td><input type="text" name="riwayat_penyakit"></td>
                </tr>
                <tr>
                    <td>Status Aktif</td>
                    <td>:</td>
                    <td>
                        <select name="status_aktif">
                            <option value="aktif">aktif</option>
                            <option value="non-aktif">non-aktif</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="reset" name="reset" value="RESET">
                        <input type="submit" name="submit" value="SUBMIT">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
    <br /><br />
    <?php
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
            $pasien->tambahData($table, $data);
            header("location:datapasien.php");
        }
    ?>