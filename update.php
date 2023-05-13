<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cập nhật thông tin tài khoản</title>
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

    // Thực hiện thao tác sửa tài khoản
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = $_POST["username"];
      $pass = $_POST["pass"];
      $sdt = $_POST["sdt"];
      $email = $_POST["email"];

      $sql = "UPDATE TAIKHOAN SET PASS='$pass', PASS_CONFIRM='$pass', SDT='$sdt', EMAIL='$email' WHERE USERNAME_TK='$username'";
      if ($conn->query($sql) === TRUE) {
        echo "Cập nhật thông tin tài khoản thành công.";
        echo "<br>";
        echo "<a href='admin.php'>Quay lại trang admin</a>";
      } else {
        echo "Cập nhật thông tin tài khoản thất bại: " . $conn->error;
        echo "<br>";
        echo "<a href='admin.php'>Quay lại trang admin</a>";
      }
      
    }

    // Đóng kết nối đến cơ sở dữ liệu
    $conn->close();
    ?>
</body>
</html>
