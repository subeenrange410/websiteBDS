<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật thông tin duyệt bài đăng</title>
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

        $id_dangtin = $_POST['id_dangtin'];
        $title_dangtin = $_POST['title_dangtin'];
        $city_dangtin = $_POST['city_dangtin'];
        $district_dangtin = $_POST['district_dangtin'];
        $ward_dangtin = $_POST['ward_dangtin'];
        $price_dangtin = $_POST['price_dangtin'];
        $image_dangtin = $_POST['image_dangtin'];
        $type_dangtin = $_POST['type_dangtin'];
        $note_dangtin = $_POST['note_dangtin'];
        $HOVATEN_dangtin = $_POST['HOVATEN_dangtin'];
        $MASOTHUE_dangtin = $_POST['MASOTHUE_dangtin'];
        $CCCD_dangtin = $_POST['CCCD_dangtin'];

        // Cập nhật thông tin đăng tin vào cơ sở dữ liệu
        $sql = "UPDATE dangtin SET title_dangtin='$title_dangtin', city_dangtin='$city_dangtin', district_dangtin='$district_dangtin', ward_dangtin='$ward_dangtin', price_dangtin='$price_dangtin', image_dangtin='$image_dangtin', type_dangtin='$type_dangtin', note_dangtin='$note_dangtin', HOVATEN_dangtin='$HOVATEN_dangtin', MASOTHUE_dangtin='$MASOTHUE_dangtin', CCCD_dangtin='$CCCD_dangtin' WHERE id_dangtin='$id_dangtin'";

        if ($conn->query($sql) === TRUE) {
            echo "Cập nhật thông tin đăng tin thành công!";
            echo "<br>";
                echo "<a href='admin.php'>Quay lại trang admin</a>";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
            echo "<br>";
                echo "<a href='admin.php'>Quay lại trang admin</a>";
        }

        $conn->close();
    ?>

</body>
</html>