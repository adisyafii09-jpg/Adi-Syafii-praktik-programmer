<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'koneksi.php';
?>

<h2>Data Pasien</h2>

<a href="tambah.php">+ Tambah Data</a><br><br>

<table border="1" cellpadding="10">
<tr>
    <th>Nama</th>
    <th>JK</th>
    <th>Tanggal Lahir</th>
    <th>Umur</th>
    <th>Aksi</th>
</tr>

<?php
$query = mysqli_query($conn, "
SELECT *, 
TIMESTAMPDIFF(YEAR, tgl_lahir_pasien, CURDATE()) AS umur
FROM tbl_pasien
ORDER BY umur DESC
");

while ($d = mysqli_fetch_assoc($query)) {
?>
<tr>
    <td><?= $d['nama_pasien'] ?></td>
    <td><?= $d['jenis_kelamin_pasien'] ?></td>
    <td><?= $d['tgl_lahir_pasien'] ?></td>
    <td><?= $d['umur'] ?> tahun</td>
    <td>
        <a href="edit.php?id=<?= $d['id_pasien'] ?>">Edit</a> |
        <a href="hapus.php?id=<?= $d['id_pasien'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>