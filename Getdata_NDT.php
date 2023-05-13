<?php
$host = 'localhost';
$dbName = 'batdong_san';
$username = 'root';
$password = '';

// Kết nối đến cơ sở dữ liệu MySQL
$conn = mysqli_connect($host, $username, $password, $dbName);

// Kiểm tra kết nối
if (!$conn) {
  die("Kết nối thất bại: " . mysqli_connect_error());
}

// Truy vấn dữ liệu từ bảng properties_ndt trong cơ sở dữ liệu
$sql = "SELECT * FROM nhadautu ;";
$result = mysqli_query($conn, $sql);

// Kiểm tra số lượng bản ghi trả về
if (mysqli_num_rows($result) > 0) {
    $properties_ndt = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $properties_ndt[] = $row;
    }
    
    // Trả về mảng chứa các đối tượng Property dưới dạng JSON
    echo json_encode($properties_ndt);
} else {
    echo "Không có dữ liệu bất động sản";
}

// Đóng kết nối cơ sở dữ liệu
mysqli_close($conn);
?>
