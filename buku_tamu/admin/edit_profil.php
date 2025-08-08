<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['nama'])) {
  header("Location: login.php");
  exit();
}

// Simpan data lama
$nama_lama     = $_SESSION['nama'];
$email_lama    = $_SESSION['email'];
$username_lama = $_SESSION['username'];
$level_lama    = $_SESSION['level'];

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $_SESSION['nama']     = $_POST['nama'];
  $_SESSION['email']    = $_POST['email'];
  $_SESSION['username'] = $_POST['username'];
  $_SESSION['level']    = $_POST['level'];

  // Redirect ke halaman profil setelah disimpan
  header("Location: profil.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Profil</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f0f0f0;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 60px auto;
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: #2c4a66;
      margin-bottom: 30px;
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
      color: #333;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }

    button {
      margin-top: 25px;
      width: 100%;
      padding: 12px;
      background: #2c4a66;
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
    }

    button:hover {
      background: #3e5f7d;
    }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 15px;
      color: #2c4a66;
      text-decoration: none;
    }

    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Edit Profil</h2>
  <form method="POST" action="">
    <label for="nama">Nama</label>
    <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($nama_lama) ?>" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($email_lama) ?>" required>

    <label for="username">Username</label>
    <input type="text" id="username" name="username" value="<?= htmlspecialchars($username_lama) ?>" required>

    <label for="level">Status</label>
    <select name="level" id="level" required>
      <option value="Admin" <?= $level_lama == 'Admin' ? 'selected' : '' ?>>Admin</option>
      <option value="Petugas" <?= $level_lama == 'Petugas' ? 'selected' : '' ?>>Petugas</option>
    </select>

    <button type="submit"><i class="fas fa-save"></i> Simpan Perubahan</button>
  </form>

  <a href="profil.php" class="back-link">← Kembali ke Profil</a>
</div>

</body>
</html>
