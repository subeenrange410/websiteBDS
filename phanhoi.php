<?php
session_start();
$phone1 = $_SESSION['SDT'];
$gmail1 = $_SESSION['EMAIL'];
//echo '<script>alert("' . $_SESSION['USENAME_TK'] . '");</script>';

if(isset($_POST['submit'])){
    $phone = $_SESSION['SDT'];
    $gmail = $_SESSION['EMAIL'];
    $feedback = $_POST['feedback'];
    $makh = (int)$_SESSION['USERNAME_TK'];
    
    $host = 'localhost';
    $dbName = 'batdong_san';
    $username = 'root';
    $password = '';
    
    $conn = mysqli_connect($host, $username, $password, $dbName);
    
    if (!$conn) {
      die("Kết nối thất bại: " . mysqli_connect_error());
    }

    // Insert data into phanhoi table
    $sql = "INSERT INTO phanhoi (SDT, EMAIL, feedback, USERNAME_TK) VALUES ('$phone', '$gmail', '$feedback', $makh)";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Phản hồi của bạn đã được ghi nhận.');</script>";
        echo "<script>window.location.href='h.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phản hồi</title>
    <style>
      .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }

      form {
        width: 400px;
        background-color: #f8f8f8;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px #ccc;
      }

      label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
      }

      input,
      textarea {
        width: 100%;
        padding: 5px;
        margin-bottom: 20px;
        border: none;
        border-radius: 5px;
        box-shadow: 0px 0px 5px #ccc;
      }

        button[type="submit"]{
            background-color: #3a152d;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px 5px;
            cursor: pointer;
            border-radius: 50px;
            transition: all 0.3s ease-in-out;
        }

        button[type="submit"]:hover {
            background-color:darkmagenta;
            padding: 15px 25px;
            font-size: 18px;
            border-radius: 100px;
        }




    </style>
</head>
<body>
    <div class="form-container">
        <form method="POST">
        <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $gmail1; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone1; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="feedback">Nội dung góp ý:</label>
                <textarea class="form-control" id="feedback" name="feedback"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Gửi phản hồi</button>
            </div>
        </form>
    </div>
</body>
</html>
