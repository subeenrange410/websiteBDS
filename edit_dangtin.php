<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa duyệt bài đăng</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        form {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px auto;
            max-width: 500px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
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

// Lấy dữ liệu bất động sản từ bảng BATDONGSAN theo id
$id = $_GET['id_dangtin'];
$sql = "SELECT * FROM dangtin WHERE id_dangtin='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
<form method="post" action="update_dangtin.php">
    <label for="id_dangtin">ID:</label>
    <input type="text" id="id_dangtin" name="id_dangtin" value="<?php echo $row['id_dangtin']; ?>" readonly><br><br>
    <label for="title_dangtin">Title:</label>
    <input type="text" id="title_dangtin" name="title_dangtin" value="<?php echo $row['title_dangtin']; ?>"><br><br>
    <label for="city_dangtin">City:</label>
    <input type="text" id="city_dangtin" name="city_dangtin" value="<?php echo $row['city_dangtin']; ?>"><br><br>
    <label for="district_dangtin">District:</label>
    <input type="text" id="district_dangtin" name="district_dangtin" value="<?php echo $row['district_dangtin']; ?>"><br><br>
    <label for="ward_dangtin">Ward:</label>
    <input type="text" id="ward_dangtin" name="ward_dangtin" value="<?php echo $row['ward_dangtin']; ?>"><br><br>
    <label for="price_dangtin">Price:</label>
    <input type="text" id="price_dangtin" name="price_dangtin" value="<?php echo $row['price_dangtin']; ?>"><br><br>
    <label for="image_dangtin">Image:</label>
    <input type="text" id="image_dangtin" name="image_dangtin" value="<?php echo $row['image_dangtin']; ?>"><br><br>
    <label for="type_dangtin">Type:</label>
    <input type="text" id="type_dangtin" name="type_dangtin" value="<?php echo $row['type_dangtin']; ?>"><br><br>
    <label for="note_dangtin">Note:</label>
    <input type="text" id="note_dangtin" name="note_dangtin" value="<?php echo $row['note_dangtin']; ?>"><br><br>

    <label for="MASOTHUE_dangtin">Họ và tên:</label>
    <input type="text" id="HOVATEN_dangtin" name="HOVATEN_dangtin" value="<?php echo $row['HOVATEN_dangtin']; ?>"><br><br>
    <label for="HOVATEN_dangtin">Mã số thuế:</label>
    <input type="text" id="MASOTHUE_dangtin" name="MASOTHUE_dangtin" value="<?php echo $row['MASOTHUE_dangtin']; ?>"><br><br>
    <label for="CCCD_dangtin">CCCD:</label>
    <input type="text" id="CCCD_dangtin" name="CCCD_dangtin" value="<?php echo $row['CCCD_dangtin'];?>"><br><br>
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