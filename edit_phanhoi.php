<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa phản hồi</title>
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

    // Lấy giá trị của trường khóa chính trên URL
    $id_phanhoi = $_GET['id_phanhoi'];

    // Truy vấn dữ liệu của bản ghi phanhoi với id_phanhoi tương ứng
    $sql = "SELECT * FROM phanhoi WHERE id_phanhoi = '$id_phanhoi'";
    $result = $conn->query($sql);

    // Kiểm tra xem bản ghi có tồn tại hay không
    if ($result->num_rows == 0) {
        echo "Không tìm thấy bản ghi phanhoi với ID = " . $id_phanhoi;
        exit();
    }

    // Lấy dữ liệu của bản ghi phanhoi
    $row = $result->fetch_assoc();
    ?>
    <h2>Chỉnh sửa thông tin phản hồi</h2>
    <form action="update_phanhoi.php" method="post">
        <input type="hidden" name="id_phanhoi" value="<?php echo $row['id_phanhoi']; ?>">
        <label for="SDT">Số điện thoại:</label>
        <input type="text" name="SDT" id="SDT" value="<?php echo $row['SDT']; ?>"><br>
        <label for="EMAIL">Email:</label>
        <input type="text" name="EMAIL" id="EMAIL" value="<?php echo $row['EMAIL']; ?>"><br>
        <label for="feedback">Feedback:</label>
        <input type="text" name="feedback" id="feedback" value="<?php echo $row['feedback']; ?>"><br>
        <label for="feedback_admin">Feedback admin:</label>
        <input type="text" name="feedback_admin" id="feedback_admin" value="<?php echo $row['feedback_admin']; ?>"><br>
        <label for="USENAME_KH">Mã khách hàng:</label>
        <input type="text" name="USERNAME_TK" id="USERNAME_TK" value="<?php echo $row['USERNAME_TK']; ?>"><br>
        <input type="submit" value="Cập nhật">
    </form>


</body>
</html>