<?php

require 'koneksi.php';

$sql = "SELECT * FROM bayi";
$babies = $koneksi->execute_query($sql)->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h1>Data Bayi</h1>
    <a href="index.php">Kembali</a>
    <a href="bayi-tambah.php">Tambah Bayi</a>
    <link rel="stylesheet" href="style.css">

    <table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nama Ibu</th>
            <th>Nama Ayah</th>
            <th>Tanggal Lahir</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0; foreach ($babies as $baby) : ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $baby['nama'] ?></td>
            <td><?= $baby['nama_ibu'] ?></td>
            <td><?= $baby['nama_ayah'] ?></td>
            <td><?= $baby['tanggal_lahir'] ?></td>
            <td>
                <a href="bayi-detil.php?id=<?= $baby['id_bayi'] ?>">Detil</a>
                <a href="bayi-edit.php?id=<?= $baby['id_bayi'] ?>">Edit</a>
                <a href="bayi-hapus.php?id=<?= $baby['id_bayi'] ?>">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
</body>
</html>