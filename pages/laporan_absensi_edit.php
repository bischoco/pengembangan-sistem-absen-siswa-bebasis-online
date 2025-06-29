<?php
session_start();
include "../db_conn.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'guru') {
    header("Location: ../login.php");
    exit();
}

$kelas_result = mysqli_query($conn, "SELECT DISTINCT kelas FROM users WHERE role='siswa' AND kelas IS NOT NULL");

$kelas_aktif = $_GET['kelas'] ?? null;
$tanggal = $_GET['tanggal'] ?? date("Y-m-d");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_absen'])) {
    foreach ($_POST['absensi'] as $id_absen => $data) {
        $status = $data['status'];
        $keterangan = mysqli_real_escape_string($conn, $data['keterangan']);
        mysqli_query($conn, "UPDATE absensi SET status='$status', keterangan='$keterangan' WHERE id='$id_absen'");
    }
    echo "<script>alert('Data absensi berhasil diperbarui!'); window.location='laporan_absensi.php?kelas=$kelas_aktif&tanggal=$tanggal';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Absensi (Editable)</title>
    <link rel="stylesheet" href="../style/absen.css">
</head>
<body>

    <h2>Laporan Absensi (Edit Mode)</h2>

    <form method="get">
        <label>Kelas:</label>
        <select name="kelas" required>
            <option value="">-- Pilih Kelas --</option>
            <?php while($kls = mysqli_fetch_assoc($kelas_result)): ?>
                <option value="<?= $kls['kelas'] ?>" <?= ($kelas_aktif == $kls['kelas']) ? 'selected' : '' ?>>
                    <?= $kls['kelas'] ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label>Tanggal:</label>
        <input type="date" name="tanggal" value="<?= $tanggal ?>" required>
        <button type="submit">Tampilkan</button>
    </form>

    <?php if ($kelas_aktif): ?>
        <h3>Absensi Kelas <?= htmlspecialchars($kelas_aktif) ?> - <?= $tanggal ?></h3>

        <?php
        $query = "
            SELECT a.*, u.nama 
            FROM absensi a
            JOIN users u ON a.id_siswa = u.id
            WHERE u.kelas = '$kelas_aktif' AND a.tanggal = '$tanggal'
            ORDER BY a.waktu ASC
        ";
        $hasil = mysqli_query($conn, $query);
        ?>

        <?php if (mysqli_num_rows($hasil) > 0): ?>
            <form method="post">
                <input type="hidden" name="update_absen" value="1">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Waktu</th>
                    </tr>
                    <?php $no = 1; while($row = mysqli_fetch_assoc($hasil)): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['nama']) ?></td>
                            <td>
                                <select name="absensi[<?= $row['id'] ?>][status]">
                                    <option value="hadir" <?= ($row['status'] == 'hadir') ? 'selected' : '' ?>>Hadir</option>
                                    <option value="tidak hadir" <?= ($row['status'] == 'tidak hadir') ? 'selected' : '' ?>>Tidak Hadir</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="absensi[<?= $row['id'] ?>][keterangan]" value="<?= htmlspecialchars($row['keterangan']) ?>">
                            </td>
                            <td><?= $row['waktu'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
                <br>
                <button type="submit">Simpan Perubahan</button>
            </form>
        <?php else: ?>
            <p><em>Tidak ada data absensi.</em></p>
        <?php endif; ?>
    <?php endif; ?>

</body>
</html>