<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
    <style>
        body{
           background-color:cadetblue
        } 
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
            color: white;
        }
        label {
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="email"], input[type="tel"], input[type="password"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 300px;
            margin-bottom: 20px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #f44336;
        }
    </style>
</head>
<body>
<form method="post" action="ForgotPassword.php">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <label for="phone">Số điện thoại:</label>
    <input type="tel" id="phone" name="phone" required><br><br>

    <input type="submit" name="submit" value="Kiểm tra">
    <a href="login.php" class="login_dn">Quay lại trang đăng nhập</a>
    </form>
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

    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $sdt = $_POST['phone'];

        $sql = "SELECT * FROM taikhoan WHERE EMAIL='$email' AND SDT='$sdt'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
            echo "<script>alert('Email hoặc số điện thoại không tồn tại trong cơ sở dữ liệu');</script>";
        } else {
            echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";    
            echo "<label for='newPassword'>Mật khẩu mới:</label>";
            echo "<input type='password' id='newPassword' name='newPassword' required><br><br>";

            echo "<label for='confirmPassword'>Xác nhận mật khẩu mới:</label>";
            echo "<input type='password' id='confirmPassword' name='confirmPassword' required><br><br>";

            echo "<input type='hidden' id='email' name='email' value='" . $email . "'>";
            echo "<input type='submit' name='submit2' value='Lưu'>";
            echo "</form>";
        }
    }

    if(isset($_POST['submit2'])) {
        $email = $_POST['email'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];
        $newPassword=hashPassword($newPassword);
        $confirmPassword=hashPassword($confirmPassword);
        if ($newPassword != $confirmPassword) {
            echo "<script>alert('Mật khẩu mới và xác nhận mật khẩu không khớp');</script>";
        } else {
            $updateSql = "UPDATE taikhoan SET PASS='$newPassword', PASS_CONFIRM='$confirmPassword' WHERE EMAIL='$email'";
            if ($conn->query($updateSql) === TRUE) {
                echo "<script>alert('Cập nhật mật khẩu thành công');</script>";
                echo "<script>window.location.href='login.php';</script>";
                exit();
            } else {
                echo "<script>alert('Lỗi khi cập nhật mật khẩu: " . $conn->error . "');</script>";
            }
        }
    }

    $conn->close();
?>

</body>
</html>