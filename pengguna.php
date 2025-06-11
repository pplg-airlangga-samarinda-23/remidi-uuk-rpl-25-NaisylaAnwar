<?php

require 'koneksi.php';

$sql = "SELECT * FROM pengguna";
$rows = $koneksi->execute_query($sql)->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h1>Data Pengguna</h1>

    <a href="index.php">Kembali</a>
    <a href="pengguna-tambah.php">Tambah Pengguna</a>

    <table>
        <thead>
            <th>No</th>
            <th>Nama Pengguna</th>
            <th>Username</th>
            <th>Role</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php $no=0; foreach ($rows as $row) : ?>
                <tr>
                    <td><?=++$no?></td>
                    <td><?=$row['nama']?></td>
                    <td><?=$row['role']?></td>
                    <td>
                        <a href="pengguna-hapus.php?id=<?=$row['id_pengguna']?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>