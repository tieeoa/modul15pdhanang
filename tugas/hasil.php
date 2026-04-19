<?php
include "cek.php";

// Simpan data POST ke session supaya tidak hilang saat refresh
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnKirim'])) {
    $_SESSION['data_pendaftaran'] = $_POST;
}

// Ambil data dari session
$d = isset($_SESSION['data_pendaftaran']) ? $_SESSION['data_pendaftaran'] : [];

// Kalau data kosong (akses langsung tanpa isi form), kembali ke pendaftaran
if (empty($d)) {
    header("Location: pendaftaran.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Pendaftaran</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: sans-serif; background: #f0f2f5; padding: 20px; line-height: 1.6; }

        .hasil-box {
            background: #f3eafd;
            border-left: 6px solid #8A2BE2;
            padding: 20px 25px;
            border-radius: 0 10px 10px 0;
            max-width: 560px;
            margin: 0 auto;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
        h2 {
            color: #8A2BE2;
            border-bottom: 2px solid #d0b0f5;
            padding-bottom: 10px;
            margin-bottom: 16px;
        }
        p { margin-bottom: 8px; font-size: 14px; }
        strong { color: #6a1ab2; }

        .btn-kembali {
            display: inline-block;
            margin-top: 16px;
            margin-right: 8px;
            padding: 7px 20px;
            background: #8A2BE2;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-size: 13px;
        }
        .btn-kembali:hover { background: #6a1ab2; }
        .btn-logout {
            display: inline-block;
            margin-top: 16px;
            padding: 7px 20px;
            background: #eee;
            color: #555;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-decoration: none;
            font-size: 13px;
        }
        .btn-logout:hover { background: #ddd; }
        .session-info {
            margin-top: 14px;
            font-size: 11px;
            color: #aaa;
        }
    </style>
</head>
<body>

    <div class="hasil-box">
        <h2>&#9989; Hasil Pendaftaran</h2>

        <p><strong>NIS           :</strong> <?php echo htmlspecialchars($d['nis'] ?? '-'); ?></p>
        <p><strong>Nama          :</strong> <?php echo htmlspecialchars($d['nama'] ?? '-'); ?></p>
        <p><strong>Kelas         :</strong> <?php echo htmlspecialchars($d['kelas'] ?? '-'); ?></p>
        <p><strong>Tgl Lahir     :</strong>
            <?php echo htmlspecialchars(($d['tgl'] ?? '') . '-' . ($d['bln'] ?? '') . '-' . ($d['thn'] ?? '')); ?>
        </p>
        <p><strong>Alamat        :</strong> <?php echo nl2br(htmlspecialchars($d['alamat'] ?? '-')); ?></p>
        <p><strong>Kota          :</strong> <?php echo htmlspecialchars($d['kota'] ?? '-'); ?></p>
        <p><strong>Jenis Kelamin :</strong> <?php echo htmlspecialchars($d['jk'] ?? '-'); ?></p>
        <p><strong>Hobby         :</strong>
            <?php
            if (!empty($d['hobby'])) {
                echo htmlspecialchars(implode(", ", $d['hobby']));
            } else { echo "-"; }
            ?>
        </p>
        <p><strong>Pilihan Ekskul:</strong><br>
            <?php
            if (!empty($d['ekskul'])) {
                foreach ($d['ekskul'] as $e) {
                    echo "&nbsp;&nbsp;- " . htmlspecialchars($e) . "<br>";
                }
            } else { echo "-"; }
            ?>
        </p>

        <div class="session-info">
            Didaftarkan oleh: <strong><?php echo htmlspecialchars($_SESSION['namauser']); ?></strong>
            &nbsp;|&nbsp; Session ID: <code><?php echo session_id(); ?></code>
        </div>

        <a href="pendaftaran.php" class="btn-kembali">&#8592; Daftar Lagi</a>
        <a href="logout.php" class="btn-logout">&#128275; Logout</a>
    </div>

</body>
</html>