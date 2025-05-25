
<?php
include 'db.php';

if (isset($_POST['id']) && isset($_POST['status'])) {
  $id = (int)$_POST['id'];
  $status = $_POST['status'];
  $stmt = $conn->prepare("UPDATE mahasiswa SET status=? WHERE id=?");
  $stmt->bind_param("si", $status, $id);
  $stmt->execute();
  $stmt->close();
}

header("Location: index.php");
exit;