<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tambah Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h3 class="mb-4">Form Tambah Mahasiswa</h3>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $npm = $_POST['npm'];
        $nama = htmlspecialchars($_POST['nama']);

        $stmt = $conn->prepare("INSERT INTO mahasiswa (npm, nama) VALUES (?, ?)");
        $stmt->bind_param("is", $npm, $nama);
        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Mahasiswa berhasil ditambahkan.</div>";
            echo "<meta http-equiv='refresh' content='1;url=index.php'>";
        } else {
            echo "<div class='alert alert-danger'>Gagal menambahkan mahasiswa.</div>";
        }
    }
    ?>

    <form method="POST" class="row g-3">
      <div class="col-md-6">
        <label class="form-label">NPM</label>
        <input type="number" name="npm" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="col-12 d-flex justify-content-between">
        <a href="index.php" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</body>
</html>
