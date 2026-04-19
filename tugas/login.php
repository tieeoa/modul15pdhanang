<?php
session_start();

// Jika sudah login, langsung ke pendaftaran
if (isset($_SESSION['namauser'])) {
    header("Location: pendaftaran.php");
    exit;
}

$loginError = false;

if (isset($_POST['btnLogin'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user == "aku" && $pass == "123456") {
        $_SESSION['namauser'] = $user;
        header("Location: pendaftaran.php"); //pindah ke halaman pendaftaran
        exit;
    } else {
        $loginError = true;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Pendaftaran Ekskul</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.1);
            width: 360px;
        }
        h2 {
            color: #8A2BE2;
            text-align: center;
            border-bottom: 2px solid #e0d0f7;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            color: #555;
            margin-bottom: 4px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 14px;
        }
        .btn-login {
            width: 100%;
            padding: 9px;
            background: #8A2BE2;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
        }
        .btn-login:hover { background: #6a1ab2; }
        .error-msg {
            background: #ffe0e0;
            color: #c0392b;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 13px;
            margin-bottom: 14px;
        }
        .info-akun {
            margin-top: 14px;
            font-size: 12px;
            color: #999;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>&#128100; Halaman Login</h2>

        <?php if ($loginError): ?>
            <div class="error-msg">&#10060; Username atau Password salah!</div>
        <?php endif; ?>

        <form method="post">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan username" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>

            <input type="submit" name="btnLogin" class="btn-login" value="LOGIN">
        </form>
    </div>
</body>
</html>