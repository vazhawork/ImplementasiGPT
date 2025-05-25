<?php include 'db.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $result = $conn->query("SELECT * FROM mahasiswa WHERE id=$id");
  $data = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $npm = $_POST['npm'];
  $nama = htmlspecialchars($_POST['nama']);

  $stmt = $conn->prepare("UPDATE mahasiswa SET npm=?, nama=? WHERE id=?");
  $stmt->bind_param("isi", $npm, $nama, $id);
  $stmt->execute();
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h3>Edit Mahasiswa</h3>
    <form method="POST">
      <input type="hidden" name="id" value="<?= $data['id']; ?>">
      <div class="mb-3">
        <label class="form-label">NPM</label>
        <input type="number" name="npm" class="form-control" value="<?= $data['npm']; ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= $data['nama']; ?>" required>
      </div>
      <button type="submit" name="update" class="btn btn-primary">Update</button>
      <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</body>
</html>
