<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gửi yêu cầu đăng tin</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
    }
    h1 {
        color: #333;
        text-align: center;
        margin-top: 50px;
    }
    .success {
        color: green;
        font-weight: bold;
        text-align: center;
    }
    .error {
        color: red;
        font-weight: bold;
        text-align: center;
    }
    a {
        color: #0066cc;
        text-decoration: none; /* loại bỏ gạch chân */
    }

    a:hover {
        color: red;
        text-decoration: underline; /* gạch chân khi hover */
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

    // Lấy thông tin từ form và chèn vào bảng dangtin
    $title_dangtin = $_POST['title'];
    $city_dangtin = $_POST['city_dangtin'];
    $district_dangtin = $_POST['district_dangtin'];
    $ward_dangtin = $_POST['ward_dangtin'];
    $price_dangtin = $_POST['price'];
    $image_dangtin = $_POST['image'];
    $type_dangtin = $_POST['house-type'];
    $note_dangtin = $_POST['note'];
    $HOVATEN_dangtin = $_POST['fullname'];
    $MASOTHUE_dangtin = $_POST['taxID'];
    $CCCD_dangtin = $_POST['cccd'];
    $SDT = $_POST['phone'];
    $dangtin_yes_no = "no";

    $sql = "INSERT INTO dangtin (title_dangtin, city_dangtin, district_dangtin, ward_dangtin, price_dangtin, image_dangtin, type_dangtin, note_dangtin, HOVATEN_dangtin, MASOTHUE_dangtin, CCCD_dangtin, SDT, dangtin_yes_no) 
    VALUES ('$title_dangtin', '$city_dangtin', '$district_dangtin', '$ward_dangtin', '$price_dangtin','$image_dangtin','$type_dangtin', '$note_dangtin', '$HOVATEN_dangtin', '$MASOTHUE_dangtin', '$CCCD_dangtin', '$SDT', '$dangtin_yes_no')";

if ($conn->query($sql) === TRUE) {
    echo '<div class="success">Gửi yêu cầu đăng tin thành công</div>';
    echo "<br>";
    echo "<a href='h.php'>Quay lại trang chủ</a>";
} else {
    echo '<div class="error">Thêm dữ liệu thất bại: ' . $conn->error . '</div>';
}


$conn->close();
?>
    
</body>
</html>

