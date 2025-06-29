<?php
session_start();
include "../db_conn.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'guru') {
    header("Location: ../login.php");
    exit();
}

$id_guru = $_SESSION['id'];
$tanggal_hari_ini = date("Y-m-d");

$kelas_result = mysqli_query($conn, "SELECT DISTINCT kelas FROM users WHERE role='siswa' AND kelas IS NOT NULL");
$kelas_aktif = $_GET['kelas'] ?? null;

if ($kelas_aktif) {
    $cek_kelas = mysqli_query($conn, "SELECT 1 FROM users WHERE kelas='$kelas_aktif' LIMIT 1");
    if (mysqli_num_rows($cek_kelas) == 0) {
        echo "<script>alert('Kelas tidak ditemukan.'); window.location='dashboard_absensi.php';</script>";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_absen'])) {
    $kelas = $_POST['kelas'];
    $absensi = $_POST['absensi'];
    $tanggal_waktu = date("Y-m-d H:i:s");

    $cek = mysqli_query($conn, "
        SELECT COUNT(*) as total FROM absensi a
        JOIN users u ON a.id_siswa = u.id
        WHERE DATE(a.tanggal) = CURDATE() AND u.kelas = '$kelas'
    ");
    $cek_data = mysqli_fetch_assoc($cek);
    if ($cek_data['total'] > 0) {
        echo "<script>alert('Absensi hari ini untuk kelas ini sudah ada.'); window.location='dashboard_absensi.php?kelas=$kelas';</script>";
        exit;
    }

    $siswa_ids = [];
    $result_ids = mysqli_query($conn, "SELECT id FROM users WHERE kelas='$kelas' AND role='siswa'");
    while ($row = mysqli_fetch_assoc($result_ids)) {
        $siswa_ids[] = $row['id'];
    }

    foreach ($absensi as $id_siswa => $data) {
        if (!in_array($id_siswa, $siswa_ids)) {
            echo "<script>alert('Siswa tidak valid.'); history.back();</script>";
            exit;
        }

        $status = $data['status'];
        $keterangan = mysqli_real_escape_string($conn, $data['keterangan']);

        mysqli_query($conn, "
            INSERT INTO absensi (tanggal, id_siswa, status, keterangan, id_guru)
            VALUES ('$tanggal_waktu', '$id_siswa', '$status', '$keterangan', '$id_guru')
        ");
    }

    echo "<script>alert('Absensi berhasil disimpan!'); window.location='dashboard_absensi.php?kelas=$kelas';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Absensi</title>
    <link rel="stylesheet" href="../style/absen.css">
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
    <h2>Dashboard Absensi Guru</h2>
    <p>Tanggal: <?= $tanggal_hari_ini ?></p>

    <div>
        <?php while($row = mysqli_fetch_assoc($kelas_result)): ?>
            <a href="?kelas=<?= urlencode($row['kelas']) ?>">
                <button class="<?= ($kelas_aktif == $row['kelas']) ? 'active' : '' ?>">
                    <?= $row['kelas'] ?>
                </button>
            </a>
        <?php endwhile; ?>
    </div>

    <?php if ($kelas_aktif): ?>
        <hr>
        <h3>Form Absensi: <?= htmlspecialchars($kelas_aktif) ?></h3>
        <form method="post">
            <input type="hidden" name="kelas" value="<?= htmlspecialchars($kelas_aktif) ?>">
            <table>
                <tr>
                    <th>Nama Siswa</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                </tr>
                <?php
                $siswa_result = mysqli_query($conn, "SELECT * FROM users WHERE kelas='$kelas_aktif' AND role='siswa'");
                while($siswa = mysqli_fetch_assoc($siswa_result)):
                ?>
                    <tr>
                        <td><?= htmlspecialchars($siswa['nama']) ?></td>
                        <td>
                            <label><input type="radio" name="absensi[<?= $siswa['id'] ?>][status]" value="hadir" checked> Hadir</label>
                            <label><input type="radio" name="absensi[<?= $siswa['id'] ?>][status]" value="tidak hadir"> Tidak Hadir</label>
                        </td>
                        <td><input type="text" name="absensi[<?= $siswa['id'] ?>][keterangan]" placeholder="Opsional..."></td>
                    </tr>
                <?php endwhile; ?>
            </table>
            <br>
             <button class="c-button c-button--gooey" type="submit" name="submit_absen"> Simpan masuk
  <div class="c-button__blobs">
  <div></div>
  <div></div>
  <div></div>
  </div>
</button>
<svg xmlns="http:/
        </form>
    <?php endif; ?>
</body>
</html>