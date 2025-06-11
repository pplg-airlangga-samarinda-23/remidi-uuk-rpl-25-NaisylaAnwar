<?php

require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = 'SELECT id_pengguna, nama, password, role FROM pengguuna WHERE username = ?';
    $row = $koneksi->execute_query($sql, [$username])->fetch_assoc();

    if ($role === 'admin' && $username === 'admin' && $password === 'adminbost') {
        $_SESSION['role'] = 'admin';
        header("Location: kader.php");
        exit;
    } elseif ($role === 'kader' && $username === 'kader' && $password === 'kaderaja') {
        $_SESSION['role'] = 'kader';
        header("Location: data-bayi.php");
        exit;
    } else {
        $login_error = "Login gagal! Username, password, atau role salah.";
    }
}

    if (password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['id_pengguna'] = $row['id_pengguna'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['role'];
        header("location:index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        /* Warna dasar dan font */
    body {
        margin: 0;
        font-family: 'Segoe UI', sans-serif;
        background-color: #84d6dd; /* biru muda */
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 100vh;
    }

    h1 {
        background-color: #cce0b3; /* hijau muda */
        width: 100%;
        text-align: center;
        padding: 20px 0;
        font-size: 36px;
        font-weight: bold;
        margin: 0;
    }

    form {
        background-color: #fef1c7; /* krem */
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        margin-top: 60px;
         width: 320px;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    input[type="text"],
    input[type="password"],
    select {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
    }

    label {
        text-align: center;
        font-size: 16px;
        font-weight: 500;
    }

    button {
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 10px;
        font-size: 16px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #f0f0f0;
    }

    </style>
<body>
    <h1>Login Posyandu</h1>

    <form action="" method="post">
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-item">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</head>
</body>
</html>