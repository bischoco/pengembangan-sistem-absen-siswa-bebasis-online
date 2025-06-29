<?php
session_start();
include "../db_conn.php";

if (!isset($_SESSION['role'])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Siswa</title>
    <link rel="stylesheet" href="../style/daftar.css">
</head>
<body>
<div class="back" onclick="window.location = 'home.php'">
  <button class="c-button c-button--gooey"> Kembali
      <div class="c-button__blobs">
          <div></div>
          <div></div>
          <div></div>
        </button>
        </div>
    <h1>Daftar Siswa</h1>

    <?php
    $kelas_query = mysqli_query($conn, "SELECT DISTINCT kelas FROM users WHERE role='siswa' AND kelas IS NOT NULL ORDER BY kelas");

    while ($kelas = mysqli_fetch_assoc($kelas_query)) {
        $nama_kelas = $kelas['kelas'];
        echo "<h2>Kelas: $nama_kelas</h2>";

        $siswa_query = mysqli_query($conn, "SELECT * FROM users WHERE role='siswa' AND kelas='$nama_kelas' ORDER BY nama");
        $jumlah_siswa = mysqli_num_rows($siswa_query);
    ?>

        <p>Total Siswa: <strong><?= $jumlah_siswa ?></strong></p>

        <table>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
            </tr>
            <?php $no = 1; while ($siswa = mysqli_fetch_assoc($siswa_query)) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($siswa['nama']) ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
</body>
</html>