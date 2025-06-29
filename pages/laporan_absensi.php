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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Absensi</title>
    <link rel="stylesheet" href="../style/absen.css">
</head>
<body>
    <h2>Laporan Absensi</h2>

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
        $laporan_query = "
            SELECT a.*, u.nama 
            FROM absensi a
            JOIN users u ON a.id_siswa = u.id
            WHERE u.kelas = '$kelas_aktif' AND DATE(a.tanggal) = '$tanggal'
            ORDER BY u.nama ASC
        ";
        $laporan_result = mysqli_query($conn, $laporan_query);

        $total_hadir = 0;
        $total_tidak = 0;
        $data_siswa = [];

        while ($row = mysqli_fetch_assoc($laporan_result)) {
            $data_siswa[] = $row;
            if ($row['status'] == 'hadir') $total_hadir++;
            if ($row['status'] == 'tidak hadir') $total_tidak++;
        }
        ?>

        <h4>Rekap Kehadiran</h4>
        <p><strong>Total Hadir:</strong> <?= $total_hadir ?></p>
        <p><strong>Total Tidak Hadir:</strong> <?= $total_tidak ?></p>

        <?php if (count($data_siswa) > 0): ?>
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Jam</th>
                </tr>
                <?php $no = 1; foreach ($data_siswa as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= ucfirst($row['status']) ?></td>
                        <td><?= htmlspecialchars($row['keterangan']) ?></td>
                        <td><?= date("Y:m:d", strtotime($row['tanggal'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p><em>Tidak ada data absensi.</em></p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>