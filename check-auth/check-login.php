<?php
session_start();
include "../db_conn.php";

$nama = "";
$password = "";
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
if(isset($_POST['nama']) && isset($_POST['password']) && isset($_POST['role']) && isset($_POST['kelas'])) {
  $nama = test_input($_POST['nama']);
  $password = test_input( $_POST['password']);
  $role = test_input( $_POST['role']);
  $kelas = test_input( $_POST['kelas']);

  if ($role === 'siswa') {
        if (empty($_POST['kelas'])) {
          header("Location: ../login.php");
            $_SESSION['error'] ="nama kelas wajib di isi";
                    } 
        $kelas = test_input($_POST['kelas']);
    } else {
        $kelas = null;
    }

  if(empty($nama)){
    $_SESSION["error"] = "nama wajib di isi";
    header('Location: ../login.php');
    exit;
  } else if(empty($password)) {
   $_SESSION["error"] = "password wajib di isi";
    header('Location: ../login.php');
    exit;
  } else {
    $password = md5($password);
   if ($kelas === null || $kelas === "null" || $kelas === "") {
    $sql = "SELECT * FROM users WHERE nama='$nama' AND password='$password' AND role='$role' AND kelas IS NULL";
} else {
    $sql = "SELECT * FROM users WHERE nama='$nama' AND password='$password' AND role='$role' AND kelas='$kelas'";
}
    $result = mysqli_query($conn, $sql);

     
    if(mysqli_num_rows($result) ===  1) {
      $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['kelas'] = $row['kelas'];

        header('Location: ../pages/home.php');
        exit;
      } else {
        $_SESSION["error"] = "nama atau password salah";
        header("Location: ../login.php");
      }
    }
  } else {
    header("Location: ../login.php");
}