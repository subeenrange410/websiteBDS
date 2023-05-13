<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhập phản hồi</title>
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

    // Get the values from the form
    $id_phanhoi = $_POST['id_phanhoi'];
    $feedback_admin = $_POST['feedback_admin'];

    // Update the record in the PHANHOI table
    $sql = "UPDATE PHANHOI SET feedback_admin='$feedback_admin' WHERE id_phanhoi=$id_phanhoi";

    if ($conn->query($sql) === TRUE) {
        echo "Cập nhật thông tin phản hồi thânh công";
        echo "<br>";
        echo "<a href='admin.php'>Quay lại trang admin</a>";
    } else {
        echo "Cập nhật thông tin thất bại " . $conn->error;
        echo "<br>";
        echo "<a href='admin.php'>Quay lại trang admin</a>";
    }

    $conn->close();
?>

    
</body>
</html>