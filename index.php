<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Absensi Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h2 class="mb-4">Absensi Mahasiswa</h2>
    <a href="add.php" class="btn btn-success mb-3">+ Tambah Mahasiswa</a>
    <table class="table table-bordered">
      <thead class="table-secondary">
        <tr>
          <th>No</th>
          <th>NPM</th>
          <th>Nama</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = $conn->query("SELECT * FROM mahasiswa");
        $no = 1;
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
            <td>{$no}</td>
            <td>{$row['npm']}</td>
            <td>{$row['nama']}</td>
            <td>
              <form method='POST' action='update_status.php' class='d-inline'>
                <input type='hidden' name='id' value='{$row['id']}'>
                <select name='status' onchange='this.form.submit()' class='form-select form-select-sm'>
                  <option value='Hadir' ".($row['status']=='Hadir'?'selected':'').">Hadir</option>
                  <option value='Izin' ".($row['status']=='Izin'?'selected':'').">Izin</option>
                  <option value='Alpha' ".($row['status']=='Alpha'?'selected':'').">Alpha</option>
                </select>
              </form>
            </td>
            <td>
              <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
              <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin hapus?')\">Delete</a>
            </td>
          </tr>";
          $no++;
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
