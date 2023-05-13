<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <style>
        body{
          background-image: url("./images/login_bds.jpg");
          background-repeat: no-repeat;
          background-size: cover;
        }  
        body {
          font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body>
    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>
      
        <button type="submit" name="login" class="login">Đăng nhập</button>

        <button type="submit" name="admin" class="login_ad">Admin</button>
        <a href="Regist.php" class="login_dk">Đăng kí</a>
        <div class="cnphu">
          <button type="button" name="change_password" class="change_password" onclick="goToChangePassword()">Đổi mật khẩu</button>
          <button type="button" name="forgot_password" class="forgot_password" onclick="goToForgotPassword()">Quên mật khẩu</button>

        </div>

      </form>
      <script>
          function goToChangePassword() {
              window.location.href = "ChangePassword.php";
          }

          function goToForgotPassword() {
            window.location.href = "ForgotPassword.php";
          }
      </script>
      
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

$conn = mysqli_connect($host, $username, $password, $dbName);

if (!$conn) {
  die("Kết nối thất bại: " . mysqli_connect_error());
}

if(isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password=hashPassword($password);
  $sql = "SELECT * FROM taikhoan WHERE email='$email' AND pass='$password'";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);

  if($count > 0) {
    $row = mysqli_fetch_assoc($result);
    if($row['role'] == 'admin') {
      header("Location: admin.php");
      exit();
    } else {
      $_SESSION['USERNAME_TK'] = $row['USERNAME_TK'];
      $_SESSION['SDT'] = $row['SDT'];
      $_SESSION['EMAIL'] = $row['EMAIL'];
      
      header("Location: h.php");      
      exit();
    }
  } else {
    echo '<script>alert("Thông tin đăng nhập không hợp lệ");</script>';
  }
} elseif(isset($_POST['admin'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password=hashPassword($password);
  $sql = "SELECT * FROM admin WHERE email_admin='$email' AND pass_admin='$password'";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);

  if($count > 0) {
    header("Location: admin.php");
    exit();
  } else {
    echo '<script>alert("Thông tin đăng nhập không hợp lệ");</script>';
  }
}




?>
