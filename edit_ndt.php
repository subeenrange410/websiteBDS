<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa nhà đầu tư</title>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý chỉnh sửa nhà đầu tư</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        
        h2 {
            color: #008080;
            font-size: 32px;
            margin-top: 30px;
            margin-bottom: 50px;
            text-align: center;
        }
        
        form {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 50%;
            margin: 50px auto;
        }
        
        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        
        input[type=submit] {
            background-color: #008080;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        
        input[type=submit]:hover {
            background-color: #005959;
        }
        
        a {
            color: #008080;
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

    // Lấy giá trị của trường khóa chính
    $id = $_GET["ID_NDT"];

    // Lấy dữ liệu của nhà đầu tư từ cơ sở dữ liệu
    $sql = "SELECT * FROM NHADAUTU WHERE ID_NDT=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // Hiển thị form chỉnh sửa thông tin nhà đầu tư
    $row = $result->fetch_assoc();
    ?>
    <h2>Chỉnh sửa thông tin nhà đầu tư</h2>
    <form method="POST" action="update_ndt.php">
        <input type="text" name="ID_NDT" value="<?php echo $id; ?>">
        <label for="hovaten">Họ và tên:</label>
        <input type="text" name="hovaten" id="hovaten" value="<?php echo $row['HOVATEN']; ?>">
        <br>
        <label for="masothue">Mã số thuế:</label>
        <input type="text" name="masothue" id="masothue" value="<?php echo $row['MASOTHUE']; ?>">
        <br>
        <label for="cccd">CCCD:</label>
        <input type="text" name="cccd" id="cccd" value="<?php echo $row['CCCD']; ?>">
        <br>
        <input type="submit" value="Cập nhật">
        <a href="admin.php">Quay lại trang admin</a>
    </form>
    <?php
    } else {
    echo "Không tìm thấy nhà đầu tư có ID là $id";
    }

    // Đóng kết nối đến cơ sở dữ liệu
    $conn->close();
    ?>

</body>
</html>