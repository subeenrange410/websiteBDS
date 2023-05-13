<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cập nhật thông tin bất động sản</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      text-align: center;
      margin: 0;
      padding: 0;
    }

    h1 {
      margin-top: 50px;
      font-size: 36px;
      color: #333;
    }

    p {
      font-size: 18px;
      color: #666;
      margin-top: 20px;
    }

    a {
      color: #0066cc;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

  </style>   
</head>
<body>
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

        // Thực hiện thao tác sửa bất động sản
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = (int)$_POST["id"];
            $title = $_POST["title"];
            $city = $_POST["city"];
            $district = $_POST["district"];
            $ward = $_POST["ward"];
            $price = $_POST["price"];
            $image = $_POST["image"];
            $type = $_POST["type"];
            $note = $_POST["note"];
            $id_ndt = (int)$_POST["id_ndt"];
            // echo $id_ndt;
            // var_dump($id_ndt);
            
            
            // Kiểm tra xem ID_NDT có tồn tại trong bảng nhadautu không
            $check_ndt = "SELECT ID_NDT FROM nhadautu WHERE ID_NDT = $id_ndt";
            $result_ndt = $conn->query($check_ndt);
            if (!$result_ndt || $result_ndt->num_rows == 0) {
                echo "Cập nhật thông tin bất động sản thất bại: ID_NDT không tồn tại trong bảng nhadautu.";
                echo "<br>";
                echo "<a href='admin.php'>Quay lại trang admin</a>";
                exit();
            }

            $sql = "UPDATE batdongsan SET title='$title', city='$city', district='$district', ward='$ward', price='$price', `image`='$image', `type`='$type', note='$note', ID_NDT=$id_ndt WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "Cập nhật thông tin bất động sản thành công.";
                echo "<br>";
                echo "<a href='admin.php'>Quay lại trang admin</a>";
            } else {
                echo "Cập nhật thông tin bất động sản thất bại: " . $conn->error;
                echo "<br>";
                echo "<a href='admin.php'>Quay lại trang admin</a>";
            }
        }

        // Đóng kết nối đến cơ sở dữ liệu
        $conn->close();
        ?>
</body>
</html>