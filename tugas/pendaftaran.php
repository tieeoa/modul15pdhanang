<?php
include "cek.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Ekskul</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: sans-serif; background: #f0f2f5; padding: 20px; line-height: 1.6; }

        .navbar {
            background: #8A2BE2;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 8px;
            max-width: 560px;
            margin: 0 auto 20px auto;
        }
        .navbar span { font-size: 14px; }
        .navbar a {
            color: white;
            text-decoration: none;
            background: rgba(255,255,255,0.2);
            padding: 4px 14px;
            border-radius: 5px;
            font-size: 13px;
        }
        .navbar a:hover { background: rgba(255,255,255,0.35); }

        .container {
            border: 1px solid #ccc;
            padding: 25px 30px;
            width: 560px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
        h2 {
            color: #8A2BE2;
            border-bottom: 2px solid #e0d0f7;
            padding-bottom: 10px;
            margin-bottom: 18px;
            text-align: center;
        }
        table { width: 100%; border-collapse: collapse; }
        td { padding: 6px 4px; font-size: 14px; vertical-align: middle; }
        td:first-child { width: 130px; color: #555; font-weight: bold; }
        input[type="text"], textarea, select {
            padding: 5px 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 13px;
        }
        textarea { width: 100%; }
        .required { color: red; font-size: 12px; }
        .btn-kirim {
            padding: 8px 24px;
            background: #8A2BE2;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }
        .btn-kirim:hover { background: #6a1ab2; }
        .btn-reset {
            padding: 8px 24px;
            background: #eee;
            color: #555;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <span>&#127979; Login sebagai: <strong><?php echo htmlspecialchars($_SESSION['namauser']); ?></strong></span>
        <a href="logout.php">&#128275; Logout</a>
    </div>

    <div class="container">
        <h2>Pendaftaran Ekstrakurikuler</h2>
        <form method="post" action="hasil.php">
            <table border="0" cellpadding="5">
                <tr>
                    <td>NIS</td>
                    <td>: <input type="text" name="nis" required> <span class="required">*</span></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>: <input type="text" name="nama" size="35"></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:
                        <select name="kelas">
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tgl Lahir</td>
                    <td>:
                        <input type="text" size="2" name="tgl" placeholder="DD"> /
                        <input type="text" size="3" name="bln" placeholder="MM"> /
                        <input type="text" size="4" name="thn" placeholder="YYYY">
                    </td>
                </tr>
                <tr>
                    <td valign="top">Alamat</td>
                    <td>: <textarea name="alamat" cols="28" rows="3"></textarea></td>
                </tr>
                <tr>
                    <td>Kota</td>
                    <td>: <input type="text" name="kota"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:
                        <input type="radio" name="jk" value="Laki-Laki"> Laki-Laki &nbsp;
                        <input type="radio" name="jk" value="Perempuan"> Perempuan
                    </td>
                </tr>
                <tr>
                    <td valign="top">Hobby</td>
                    <td valign="top">:
                        <input type="checkbox" name="hobby[]" value="Membaca"> Membaca<br>
                        &nbsp;&nbsp;<input type="checkbox" name="hobby[]" value="Olahraga"> Olahraga<br>
                        &nbsp;&nbsp;<input type="checkbox" name="hobby[]" value="Menyanyi"> Menyanyi<br>
                        &nbsp;&nbsp;<input type="checkbox" name="hobby[]" value="Menari"> Menari<br>
                        &nbsp;&nbsp;<input type="checkbox" name="hobby[]" value="Traveling"> Traveling
                    </td>
                </tr>
                <tr>
                    <td valign="top">Pilihan Ekskul</td>
                    <td valign="top">:
                        <select name="ekskul[]" size="7" multiple>
                            <option value="Pramuka">Pramuka</option>
                            <option value="Basket">Basket</option>
                            <option value="Volly">Volly</option>
                            <option value="Band">Band</option>
                            <option value="Seni Tari">Seni Tari</option>
                            <option value="Robotic">Robotic</option>
                            <option value="Bulu Tangkis">Bulu Tangkis</option>
                        </select>
                        <br><small style="color:#999;">Ctrl+klik untuk pilih lebih dari satu</small>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-top:14px;">
                        <input type="submit" name="btnKirim" class="btn-kirim" value="Kirim">
                        &nbsp;
                        <input type="reset" class="btn-reset" value="Reset">
                    </td>
                </tr>
            </table>
            <p class="required" style="margin-top:8px;">* Harus diisi</p>
        </form>
    </div>

</body>
</html>