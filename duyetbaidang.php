<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng bài</title>
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

// Lấy giá trị từ URL parameter
$id_dangtin = $_GET["id_dangtin"];

// Lấy thông tin đăng tin từ cơ sở dữ liệu
$sql = "SELECT * FROM dangtin WHERE id_dangtin = '$id_dangtin'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Insert thông tin nhà đầu tư vào bảng nhadautu
$HOVATEN = $row["HOVATEN_dangtin"];
$MASOTHUE = $row["MASOTHUE_dangtin"];
$CCCD = $row["CCCD_dangtin"];
$SDT = $row["SDT"];

$sql_insert = "INSERT INTO nhadautu (HOVATEN, MASOTHUE, CCCD, SDT, id_dangtin) VALUES ('$HOVATEN', '$MASOTHUE', '$CCCD', '$SDT', '$id_dangtin')";
if (mysqli_query($conn, $sql_insert)) {
    $id_nhadautu = mysqli_insert_id($conn);
} else {
    echo "Lỗi: " . mysqli_error($conn);
}

// Insert dữ liệu từ bài đăng vào bảng batdongsan
$sql = "INSERT INTO batdongsan (title, city, district, ward, price, `image`, `type`, note, ID_NDT)
        VALUES ('".$row["title_dangtin"]."', '".$row["city_dangtin"]."', '".$row["district_dangtin"]."', '".$row["ward_dangtin"]."', '".$row["price_dangtin"]."', '".$row["image_dangtin"]."', '".$row["type_dangtin"]."', '".$row["note_dangtin"]."', '".$id_nhadautu."')";

if (mysqli_query($conn, $sql)) {
    echo "Đăng bài thành công";
    // Cập nhật trạng thái thành công
    $sql_update = "UPDATE dangtin SET dangtin_yes_no='yes' WHERE id_dangtin='$id_dangtin'";
    if (mysqli_query($conn, $sql_update)) {
        echo "<br>";

    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
    echo "<br>";
  echo "<a href='admin.php'>Quay lại trang admin</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Đóng kết nối
mysqli_close($conn);
?>

</body>
</html>