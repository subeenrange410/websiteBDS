<?php
$host = 'localhost';
$dbName = 'batdong_san';
$username = 'root';
$password = '';

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli($host, $username, $password, $dbName);
if ($conn->connect_error) {
  die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Lấy giá trị của trường khóa chính
$id = $_GET["id"];

// Thực hiện câu lệnh SQL để xóa bản ghi
$sql = "DELETE FROM BATDONGSAN WHERE ID=$id";
if ($conn->query($sql) === TRUE) {
  echo "Xóa bất động sản thành công.";
  echo "<br>";
  echo "<a href='admin.php'>Quay lại trang admin</a>";
} else {
  echo "Xóa bất động sản thất bại: " . $conn->error;
  echo "<br>";
  echo "<a href='admin.php'>Quay lại trang admin</a>";
}

// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>
