<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <style>
        body{
            background-image: url("./images/doimatkhau.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        } 
        form {
        width: 400px;
        margin: 0 auto;
        border: solid 1px #ccc;
        border-radius: 10px;
        background-color: #f2f2f2;
        padding: 20px;
        color: #333;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
        }

        label {
        display: block;
        margin-top: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
        width: 90%;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        }

        input[type="submit"] {
            background-color: #5e5e5e;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            margin-top: 10px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.2);
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
        }

        input[type="submit"]:hover {
            background-color: #4c4c4c;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.4);
            text-shadow: none;
        }


    </style>
</head>
<body>
        <form method="post" action="ChangePassword.php">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="oldPassword">Mật khẩu cũ:</label>
        <input type="password" id="oldPassword" name="oldPassword" required><br><br>
        
        <label for="newPassword">Mật khẩu mới:</label>
        <input type="password" id="newPassword" name="newPassword" required><br><br>
        
        <label for="confirmPassword">Xác nhận mật khẩu mới:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required><br><br>
        
        <input type="submit" name="submit" value="Đổi mật khẩu">
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
                $oldPassword = $_POST['oldPassword'];
                $oldPassword=hashPassword($oldPassword);
                $newPassword = $_POST['newPassword'];
                $newPassword=hashPassword($newPassword);
                $confirmPassword = $_POST['confirmPassword'];
                $confirmPassword=hashPassword($confirmPassword);
                $sql = "SELECT * FROM taikhoan WHERE EMAIL='$email'";
                $result = $conn->query($sql);
                if ($result->num_rows == 0) {
                    echo "<script>alert('Email không tồn tại trong cơ sở dữ liệu');</script>";
                } else {
                    $sql = "SELECT * FROM taikhoan WHERE EMAIL='$email' AND PASS='$oldPassword'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        if ($newPassword == $oldPassword) {
                            echo "<script>alert('Mật khẩu mới trùng với mật khẩu cũ');</script>";
                        } elseif ($newPassword == $confirmPassword) {
                            $updateSql = "UPDATE taikhoan SET PASS='$newPassword', PASS_CONFIRM='$confirmPassword' WHERE EMAIL='$email'";
                            if ($conn->query($updateSql) === TRUE) {
                                echo "<script>alert('Cập nhật mật khẩu thành công');</script>";
                                echo "<script>window.location.href='login.php';</script>";
                                exit();
                            } else {
                                echo "<script>alert('Lỗi khi cập nhật mật khẩu: " . $conn->error . "');</script>";
                            }                            
                        } else {
                            echo "<script>alert('Mật khẩu mới và xác nhận mật khẩu không khớp');</script>";
                        }                        
                    } else {
                        echo "<script>alert('Mật khẩu cũ không đúng');</script>";
                    }
                }
                $conn->close();
            }
            ?>
</body>
</html>