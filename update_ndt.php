<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhập nhà đầu tư</title>
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

        // Connect to database
        $conn = new mysqli($host, $username, $password, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Update NDT information
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = (int)$_POST["ID_NDT"];
            $name = $_POST["hovaten"];
            $mst = $_POST["masothue"];
            $cccd = $_POST["cccd"];
            
            $sql = "UPDATE nhadautu SET HOVATEN='$name', MASOTHUE='$mst', CCCD='$cccd' WHERE ID_NDT=$id";
            if ($conn->query($sql) === TRUE) {
                echo "Cập nhật thông tin nhà đầu tư thành công.";
                echo "<br>";
                echo "<a href='admin.php'>Quay lại trang admin</a>";
            } else {
                echo "Cập nhật thông tin nhà đầu tư thất bại: " . $conn->error;
                echo "<br>";
                echo "<a href='admin.php'>Quay lại trang admin</a>";
            }
        }

        // Close database connection
        $conn->close();
    ?>

</body>
</html>