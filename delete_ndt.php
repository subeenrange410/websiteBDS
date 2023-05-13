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
$id_ndt = (int)$_GET["ID_NDT"];

// Xóa các bất động sản liên quan đến nhà đầu tư
$sql_bds = "DELETE FROM BATDONGSAN WHERE ID_NDT=$id_ndt";
if ($conn->query($sql_bds) === TRUE) {
  // Lấy id_dangtin từ bảng NHADAUTU
  $sql_get_dangtin = "SELECT id_dangtin FROM NHADAUTU WHERE ID_NDT=$id_ndt";
  $result = $conn->query($sql_get_dangtin);
  if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_dangtin = $row["id_dangtin"];
            // Cập nhật trạng thái thành công
            $sql_update = "UPDATE dangtin SET dangtin_yes_no='no' WHERE id_dangtin=$id_dangtin";
            if (mysqli_query($conn, $sql_update)) {

            } else {
              echo "Lỗi: " . mysqli_error($conn);
            }
  } else {
            echo "Không tìm thấy id_dangtin trong bảng NHADAUTU";
  }
  // Xóa nhà đầu tư
  $sql_ndt = "DELETE FROM NHADAUTU WHERE ID_NDT=$id_ndt";
  if ($conn->query($sql_ndt) === TRUE) {
    echo "Xóa nhà đầu tư thành công";
        // Cập nhật trạng thái thành công
    echo "<br>";
  echo "<a href='admin.php'>Quay lại trang admin</a>";
  } else {
    echo "Xóa nhà đầu tư thất bại: " . $conn->error;
    echo "<br>";
  echo "<a href='admin.php'>Quay lại trang admin</a>";
  }
} else {
  echo "Xóa các bất động sản liên quan thất bại: " . $conn->error;
}

// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>
