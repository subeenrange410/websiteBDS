<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin bất động sản</title>
    <style>
        body {
            background-color: #fff;
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #333;
            background-image: url("./images/edit_bds.jpg");
            
        }

        h1 {
            color: #008CBA;
            font-size: 32px;
            margin-top: 30px;
            margin-bottom: 50px;
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 3px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #008CBA;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
        }

    </style>

</head>
<body>
    <h1>Sửa thông tin bất động sản</h1>
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

        // Lấy dữ liệu bất động sản từ bảng BATDONGSAN theo id
        $id = $_GET['id'];
        $sql = "SELECT * FROM BATDONGSAN WHERE ID='$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
    <form method="post" action="update_bds.php">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" value="<?php echo $row['id']; ?>" readonly><br><br>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $row['title']; ?>"><br><br>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="<?php echo $row['city']; ?>"><br><br>
        <label for="district">District:</label>
        <input type="text" id="district" name="district" value="<?php echo $row['district']; ?>"><br><br>
        <label for="ward">Ward:</label>
        <input type="text" id="ward" name="ward" value="<?php echo $row['ward']; ?>"><br><br>
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" value="<?php echo $row['price']; ?>"><br><br>
        <label for="image">Image:</label>
        <input type="text" id="image" name="image" value="<?php echo $row['image']; ?>"><br><br>
        <label for="type">Type:</label>
        <input type="text" id="type" name="type" value="<?php echo $row['type']; ?>"><br><br>
        <label for="note">Note:</label>
        <input type="text" id="note" name="note" value="<?php echo $row['note']; ?>"><br><br>
        <label for="id_ndt">ID NDT:</label>
        <input type="text" id="id_ndt" name="id_ndt" value="<?php echo $row['ID_NDT']; ?>"><br><br>
        <input type="submit" value="Cập nhật">
        <a href="admin.php">Quay lại trang admin</a>
    </form>
    <?php
        } else {
                echo "Không tìm thấy bất động sản có ID là $id";
        }
        // Đóng kết nối đến cơ sở dữ liệu
        $conn->close();
    ?>
</body>
</html>