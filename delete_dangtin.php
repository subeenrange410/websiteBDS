<?php
$host = 'localhost';
$dbName = 'batdong_san';
$username = 'root';
$password = '';

// Connect to the database
$conn = new mysqli($host, $username, $password, $dbName);
if ($conn->connect_error) {
  die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Get the primary key value from the URL parameter
$id = $_GET['id_dangtin'];

// Perform SQL query to delete the record
$sql = "DELETE FROM DANGTIN WHERE id_dangtin = $id";
if ($conn->query($sql) === TRUE) {
    echo "Xóa duyệt đăng tin thành công.";
    echo "<br>";
    echo "<a href='admin.php'>Quay lại trang admin</a>";
  } else {
    echo "Xóa duyệt đăng tin thất bại: " . $conn->error;
    echo "<br>";
  echo "<a href='admin.php'>Quay lại trang admin</a>";
  }
  
  // Đóng kết nối đến cơ sở dữ liệu
  $conn->close();
  ?>
