<?php include 'koneksi.php'; ?>

<h2>Tambah Pasien</h2>

<form method="POST">
    Nama: <input type="text" name="nama"><br><br>

    Jenis Kelamin:
    <select name="jk">
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select><br><br>

    Tanggal Lahir:
    <input type="date" name="tgl"><br><br>

    Alamat:
    <textarea name="alamat"></textarea><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO tbl_pasien 
    (nama_pasien, jenis_kelamin_pasien, tgl_lahir_pasien, alamat_pasien)
    VALUES 
    ('$_POST[nama]', '$_POST[jk]', '$_POST[tgl]', '$_POST[alamat]')");

    header("Location: index.php");
}
?>