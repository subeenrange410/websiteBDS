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

    $id_phanhoi = $_GET['id_phanhoi'];

    // Kiểm tra xem ID có tồn tại trong cơ sở dữ liệu không
    $sql_check = "SELECT * FROM PHANHOI WHERE id_phanhoi = $id_phanhoi";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        // Thực hiện truy vấn xóa bản ghi từ bảng PHANHOI
        $sql_delete = "DELETE FROM PHANHOI WHERE id_phanhoi = $id_phanhoi";
        if ($conn->query($sql_delete) === TRUE) {
            echo "Xóa phản hồi thành công";
            echo "<br>";
            echo "<a href='admin.php'>Quay lại trang admin</a>";
        } else {
            echo "Lỗi xóa phản hồi: " . $conn->error;
            echo "<br>";
            echo "<a href='admin.php'>Quay lại trang admin</a>";
        }
    } else {
    echo "Phản hồi không tồn tại trong cơ sở dữ liệu";
    }

    // Đóng kết nối đến cơ sở dữ liệu
    $conn->close();
?>