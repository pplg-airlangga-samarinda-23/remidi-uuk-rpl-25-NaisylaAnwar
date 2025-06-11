<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $nama_ibu = $_POST['nama_ibu'];
    $nama_ayah = $_POST['nama_ayah'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $id_bayi = $_GET['id'];

    var_dump($_POST); // Debugging, bisa dihapus kalau sudah tidak dibutuhkan

    $sql = 'UPDATE bayi SET nama=?, nama_ibu=?, nama_ayah=?, tanggal_lahir=? WHERE id_bayi=?';
    $row = $koneksi->execute_query($sql, [$nama, $nama_ibu, $nama_ayah, $tanggal_lahir, $id_bayi]);

    if ($row) {
        header("Location: bayi.php");
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id_bayi = $_GET['id'];
    $sql = "SELECT * FROM bayi WHERE id_bayi=?";
    $baby = $koneksi->execute_query($sql, [$id_bayi])->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Bayi</title>
</head>
<body>
    <h1>Edit Bayi</h1>

    <a href="bayi.php">Kembali</a>

    <form action="" method="post">
        <div class="form-item">
            <label for="nama">Nama Ibu</label>
            <input type="text" name="nama_ibu" id="nama_ibu" value="<?=$baby['nama']?>">
        </div>
        <div class="form-item">
            <label for="nama_ayah">Nama Ayah</label>
            <input type="text" name="nama_ayah" id="nama_ayah" value="<?= $baby['nama_ayah'] ?>">
        </div>

        <div class="form-item">
            <label for="tanggal_lahir">Tanggal</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?= $baby['tanggal_lahir'] ?>">
        </div>

        <button type="submit">Edit</button>
    </form>
</body>
</html>
</form>
</body>
</html>