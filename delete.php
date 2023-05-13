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
$username = $_GET["username"];

// Thực hiện câu lệnh SQL để xóa bản ghi
$sql = "DELETE FROM TAIKHOAN WHERE USERNAME_TK='$username'";
if ($conn->query($sql) === TRUE) {
  echo "Xóa tài khoản thành công.";
  echo "<br>";
  echo "<a href='admin.php'>Quay lại trang admin</a>";
} else {
  echo "Xóa tài khoản thất bại: " . $conn->error;
  echo "<br>";
  echo "<a href='admin.php'>Quay lại trang admin</a>";
}

// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>
