<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbl_pasien WHERE id_pasien=$id"));
?>

<h2>Edit Pasien</h2>

<form method="POST">
    Nama: <input type="text" name="nama" value="<?= $data['nama_pasien'] ?>"><br><br>

    Jenis Kelamin:
    <select name="jk">
        <option value="L" <?= $data['jenis_kelamin_pasien']=='L'?'selected':'' ?>>Laki-laki</option>
        <option value="P" <?= $data['jenis_kelamin_pasien']=='P'?'selected':'' ?>>Perempuan</option>
    </select><br><br>

    Tanggal Lahir:
    <input type="date" name="tgl" value="<?= $data['tgl_lahir_pasien'] ?>"><br><br>

    Alamat:
    <textarea name="alamat"><?= $data['alamat_pasien'] ?></textarea><br><br>

    <button type="submit" name="update">Update</button>
</form>

<?php
if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE tbl_pasien SET
        nama_pasien='$_POST[nama]',
        jenis_kelamin_pasien='$_POST[jk]',
        tgl_lahir_pasien='$_POST[tgl]',
        alamat_pasien='$_POST[alamat]'
        WHERE id_pasien=$id
    ");

    header("Location: index.php");
}
?>