<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin tài khoản</title>
    <style>
        body {
            background-image: url("./images/edit_tk.jpg");
            background-position: center;

        }
        h1 {
            text-align: center;
            color: white;
            width: 550px;
            background-color: #4CAF50;
            margin: 0 auto;
            border-radius: 40px;
        }


        form {
            width: 500px;
            margin: 0 auto;
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,.3);
        }

        label {
            display: inline-block;
            width: 100px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 300px;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <h1>Sửa thông tin tài khoản</h1>
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

        // Lấy dữ liệu tài khoản từ bảng TAIKHOAN theo username
        $username = $_GET['username'];
        $sql = "SELECT * FROM TAIKHOAN WHERE USERNAME_TK='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
    <form method="post" action="update.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $row['USERNAME_TK']; ?>" readonly><br><br>
        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass" value="<?php echo $row['PASS']; ?>"><br><br>
        <label for="sdt">SĐT:</label>
        <input type="text" id="sdt" name="sdt" value="<?php echo $row['SDT']; ?>"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['EMAIL']; ?>"><br><br>
        <input type="submit" value="Cập nhật">
        <a href="admin.php">Quay lại trang admin</a>
    </form>
    <?php
        } else {
            echo "Không tìm thấy tài khoản có username là $username";
        }

        // Đóng kết nối đến cơ sở dữ liệu
        $conn->close();
    ?>
</body>
</html>
