<?php
session_start();
include "../db_conn.php"; 

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if (isset($_POST['nama'],  $_POST['password'], $_POST['role'], $_POST['kelas'])) {
    $nama = test_input($_POST['nama']);
    $password = test_input($_POST['password']);
    $role = test_input($_POST['role']);
    
    if (empty($nama) ||  empty($password) || empty($role)) {
        $_SESSION['error'] = "Semua field wajib diisi.";
        header("Location: ../daftar.php");
        exit;
    }

    if ($role === 'siswa') {
        if (empty($_POST['kelas'])) {
            $_SESSION['error'] ="nama kelas wajib di isi";
            header("Location: ../daftar.php");
                    } 
        $kelas = test_input($_POST['kelas']);
    } else {
        $kelas = null;
    }

    $check = mysqli_query($conn, "SELECT * FROM users WHERE nama='$nama'");
    if (mysqli_num_rows($check) > 0) {
        $_SESSION['error'] = "Nama sudah terdaftar.";
        header("Location: ../daftar.php");
        exit;
    }
    
    $hashedPassword = md5($password); 
    $kelasValue = $kelas ? "'$kelas'" : "NULL";
    $insert = mysqli_query($conn, "INSERT INTO users (nama, password, role, kelas) VALUES ('$nama', '$hashedPassword', '$role', $kelasValue)");

    if ($insert) {
        $_SESSION['success'] = "Pendaftaran berhasil. Silakan login.";
        header("Location: ../login.php");
        exit;
    } else {
        $_SESSION['error'] = "Gagal menyimpan data.";
        header("Location: ../login.php");
        exit;
    }
} else {
    header("Location: ../daftar.php");
    exit;
}