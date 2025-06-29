<?php
session_start();
include "../db_conn.php";

$id_siswa = $_SESSION['id'];
$nama_siswa = $_SESSION['nama'];
$tanggal = $_GET['tanggal'] ?? date("Y-m-d");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Home Siswa</title>
  <link rel="stylesheet" href="../style/home.css">
  <style>
    table { border-collapse: collapse; width: 100%; margin-top: 20px; }
    th, td { padding: 10px; border: 1px solid #ccc; }
  </style>
</head>
<body>

  <h1>Halo, <?= htmlspecialchars($_SESSION["nama"]) ?></h1>
  <h3><?= htmlspecialchars($_SESSION["role"]) ?></h3>

  <?php if ($_SESSION["role"] === "guru") { ?>
    <section>
      <div class="card">
         <h1>Dashboard Absen</h1>
         <p>Dashboard absensi siswa khusus guru</p>
         <a href="dashboard_absensi.php">
           <button class="c-button c-button--gooey">Masuk
              <div class="c-button__blobs"><div></div><div></div><div></div></div>
           </button>
         </a>
      </div>
      <div class="card">
         <h1>Laporan Absensi</h1>
         <p>Dashboard laporan data absensi siswa</p>
         <a href="laporan_absensi.php">
           <button class="c-button c-button--gooey">Masuk
              <div class="c-button__blobs"><div></div><div></div><div></div></div>
           </button>
         </a>
      </div>
      <div class="card">
         <h1>Daftar Siswa</h1>
         <p>Daftar data siswa</p>
         <a href="daftar_siswa.php">
           <button class="c-button c-button--gooey">Masuk
              <div class="c-button__blobs"><div></div><div></div><div></div></div>
           </button>
         </a>
      </div>
    </section>
  <?php } ?>

  <?php if ($_SESSION["role"] === "siswa") { ?>
    <h2>Riwayat Absensi - <?= htmlspecialchars($nama_siswa) ?></h2>

    <form method="get">
        <label>Pilih Tanggal:</label>
        <input type="date" name="tanggal" value="<?= $tanggal ?>">
        <button type="submit">Tampilkan</button>
    </form>

    <h3>Absensi Tanggal: <?= $tanggal ?></h3>

<?php
$query = "SELECT * FROM absensi WHERE id_siswa = '$id_siswa'";
$result = mysqli_query($conn, $query);

$total_hadir = 0;
$total_tidak = 0;

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['status'] == 'hadir') {
        $total_hadir++;
    } else if ($row['status'] == 'tidak hadir') {
        $total_tidak++;
    }
}
?>

<p><strong>Total Hadir:</strong> <?= $total_hadir ?> kali</p>
<p><strong>Total Tidak Hadir:</strong> <?= $total_tidak ?> kali</p>

<?php
$result_hari_ini = mysqli_query($conn, "SELECT * FROM absensi WHERE id_siswa = '$id_siswa' AND tanggal = '$tanggal'");
?>

<?php if (mysqli_num_rows($result_hari_ini) > 0): ?>
    <table>
        <tr>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Waktu Absensi</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result_hari_ini)): ?>
            <tr>
                <td><?= ucfirst($row['status']) ?></td>
                <td><?= htmlspecialchars($row['keterangan']) ?></td>
                <td><?= $row['waktu'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p><em>Belum ada data absensi untuk tanggal ini.</em></p>
<?php endif; ?>
  <?php } ?>

</body>
</html>