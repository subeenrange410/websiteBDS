<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí tài khoản</title>
    <link rel="stylesheet" type="text/css" href="css/dangky.css">
    <style>
          body{
            background-image: url("./images/register.jpg");
            background-repeat: no-repeat;
            background-size: cover;
          } 
    </style>
</head>
<body>
    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      
        <label for="phone">Số điện thoại:</label>
        <input type="tel" id="phone" name="phone">
      
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>
      
        <label for="confirm_password">Nhập lại mật khẩu:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
      
        <button type="submit" name="register" class="register">Đăng kí</button>
        <a href="login.php" class="login_dn">Quay lại trang đăng nhập</a>


      </form>
      
</body>
</html>
<?php

function hashPassword($password) {
  return sha1($password);
}



$host = 'localhost';
$dbName = 'batdong_san';
$username = 'root';
$password = '';

// Kết nối đến cơ sở dữ liệu MySQL
$conn = mysqli_connect($host, $username, $password, $dbName);

// Kiểm tra kết nối
if (!$conn) {
  die("Kết nối thất bại: " . mysqli_connect_error());
}

// Kiểm tra nút đăng kí đã được nhấn
if(isset($_POST['register'])){

  // Lấy thông tin từ biểu mẫu đăng kí
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  
  // Kiểm tra xem email đã được sử dụng chưa
  $query = "SELECT * FROM taikhoan WHERE EMAIL='$email'";
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) > 0){
    echo "Email này đã được sử dụng, vui lòng chọn email khác.";
    exit();
  }

  // Kiểm tra xem số điện thoại đã được sử dụng chưa
  $query = "SELECT * FROM taikhoan WHERE SDT='$phone'";
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) > 0){
    echo "Số điện thoại này đã được sử dụng, vui lòng chọn số điện thoại khác.";
    exit();
  }

  // Kiểm tra xem mật khẩu đã được nhập đúng hay không
  if($password !== $confirm_password){
    echo "Mật khẩu không khớp, vui lòng nhập lại.";
    exit();
  }

  $password=hashPassword($password);

  // Thêm tài khoản mới vào cơ sở dữ liệu
  $query = "INSERT INTO taikhoan (pass, pass_confirm, SDT, EMAIL) VALUES ('$password','$password', '$phone', '$email')";
  $result = mysqli_query($conn, $query);

  if($result){
    echo "<script>alert('Đăng kí tài khoản thành công');</script>";
    echo "<script>window.location.href='login.php';</script>";

  } else{
    echo "Đăng kí tài khoản không thành công, vui lòng thử lại sau.";
  }
}

?>
