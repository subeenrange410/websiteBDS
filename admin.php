<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ admin</title>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <style>
        body {
            background-image: url("./images/admin.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        h1 {
            font-size: 32px; /* cỡ chữ */
            font-weight: bold; /* độ đậm */
            text-align: center; /* căn giữa nội dung */
            text-transform: uppercase; /* chuyển đổi thành chữ hoa */
            color:aliceblue; /* màu chữ */
            margin-top: 20px; /* khoảng cách với phần tử trên nó */
            margin-bottom: 20px; /* khoảng cách với phần tử dưới nó */
        }

    </style>
</head>
<body>
    <div><h1>ADMIN</h1></div>
    <a href="login.php">Quay lại trang đăng nhập</a>
    <button id="btn-tk" onclick="showTaiKhoan()" style="display: block;">Quản lý Tài Khoản</button>

    <div id="tableTaiKhoan" style="display:none;">
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

            // Truy vấn dữ liệu từ bảng TAIKHOAN
            $sql = "SELECT * FROM TAIKHOAN";
            $result = $conn->query($sql);

            // Hiển thị bảng dữ liệu trên trang admin.php
            echo "<table>";
            echo "<tr><th>Username</th><th>Password</th><th>SĐT</th><th>Email</th><th>Action</th></tr>";
            while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["USERNAME_TK"] . "</td>";
            echo "<td>" . $row["PASS"] . "</td>";
            echo "<td>" . $row["SDT"] . "</td>";
            echo "<td>" . $row["EMAIL"] . "</td>";
            echo "<td><a href='edit.php?username=" . $row["USERNAME_TK"] . "' class='edit-link'>Edit</a> | <a href='delete.php?username=" . $row["USERNAME_TK"] . "' onclick=\"return confirm('Bạn có chắc chắn muốn xóa tài khoản này không?')\" class='delete-link'>Delete</a></td>";

            echo "</tr>";
            }
            echo "</table>";

            // Đóng kết nối đến cơ sở dữ liệu
            $conn->close();
        ?>  
    </div>

    <button id="btn-bds" onclick="showBDS()" style="display: block;">Quản lý Bất động sản</button>

    <div id="tableBDS" style="display:none;">
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

            // Truy vấn dữ liệu từ bảng BATDONGSAN
            $sql = "SELECT * FROM BATDONGSAN";
            $result = $conn->query($sql);

            // Hiển thị bảng dữ liệu trên trang admin.php
            echo "<table>";
            echo "<tr><th>ID</th><th>Title</th><th>City</th><th>District</th><th>Ward</th><th>Price</th><th>Image</th><th>Type</th><th>Note</th><th>ID_NDT</th><th>Action</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["title"] . "</td>";
                echo "<td>" . $row["city"] . "</td>";
                echo "<td>" . $row["district"] . "</td>";
                echo "<td>" . $row["ward"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                echo "<td>" . $row["image"] . "</td>";
                echo "<td>" . $row["type"] . "</td>";
                echo "<td>" . $row["note"] . "</td>";
                echo "<td>" . $row["ID_NDT"] . "</td>";
                echo "<td><a href='edit_bds.php?id=" . $row["id"] . "' class='edit-link'>Edit</a> | <a href='delete_bds.php?id=" . $row["id"] . "' onclick=\"return confirm('Bạn có chắc chắn muốn xóa bất động sản này không?')\" class='delete-link'>Delete</a></td>";

                echo "</tr>";
            }
            echo "</table>";

            // Đóng kết nối đến cơ sở dữ liệu
            $conn->close();
        ?>

    </div>

    <button id="btn-ndt" onclick="showNDT()" style="display: block;">Quản lý Nhà đầu tư</button>

    <div id="tableNDT" style="display:none;">
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

            // Truy vấn dữ liệu từ bảng NHADAUTU
            $sql = "SELECT * FROM NHADAUTU";
            $result = $conn->query($sql);

            // Hiển thị bảng dữ liệu trên trang admin.php
            echo "<table>";
            echo "<tr><th>ID_NDT</th><th>Họ và tên</th><th>Mã số thuế</th><th>CCCD</th><th>SDT</th><th>id_dangtin</th><th>Action</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID_NDT"] . "</td>";
                echo "<td>" . $row["HOVATEN"] . "</td>";
                echo "<td>" . $row["MASOTHUE"] . "</td>";
                echo "<td>" . $row["CCCD"] . "</td>";
                echo "<td>" . $row["SDT"] . "</td>";
                echo "<td>" . $row["id_dangtin"] . "</td>";
                echo "<td><a href='edit_ndt.php?ID_NDT=" . $row["ID_NDT"] . "' class='edit-link'>Edit</a> | <a href='delete_ndt.php?ID_NDT=" . $row["ID_NDT"] . "' onclick=\"return confirm('Bạn có chắc chắn muốn xóa Nhà đầu tư này không?')\" class='delete-link'>Delete</a></td>";

                echo "</tr>";
            }
            echo "</table>";

            // Đóng kết nối đến cơ sở dữ liệu
            $conn->close();
        ?>

    </div>


    <button id="btn-dangtin" onclick="showDangTin()" style="display: block;">Quản lý Đăng tin</button>

    <div id="tableDangTin" style="display:none;">
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

            // Truy vấn dữ liệu từ bảng DANGTIN
            $sql = "SELECT * FROM DANGTIN";
            $result = $conn->query($sql);

            // Hiển thị bảng dữ liệu trên trang admin.php
            echo "<table>";
            echo "<tr><th>ID_dangtin</th><th>Title</th><th>City</th><th>District</th><th>Ward</th><th>Price</th><th>Image</th><th>Type</th><th>Note</th><th>HOVATEN</th><th>MASOTHUE</th><th>CCCD</th><th>SDT</th><th>Status</th><th>Action</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_dangtin"] . "</td>";
                echo "<td>" . $row["title_dangtin"] . "</td>";
                echo "<td>" . $row["city_dangtin"] . "</td>";
                echo "<td>" . $row["district_dangtin"] . "</td>";
                echo "<td>" . $row["ward_dangtin"] . "</td>";
                echo "<td>" . $row["price_dangtin"] . "</td>";
                echo "<td>" . $row["image_dangtin"] . "</td>";
                echo "<td>" . $row["type_dangtin"] . "</td>";
                echo "<td>" . $row["note_dangtin"] . "</td>";
                echo "<td>" . $row["HOVATEN_dangtin"] . "</td>";
                echo "<td>" . $row["MASOTHUE_dangtin"] . "</td>";
                echo "<td>" . $row["CCCD_dangtin"] . "</td>";
                echo "<td>" . $row["SDT"] . "</td>";
                echo "<td>" . $row["dangtin_yes_no"] . "</td>";
                echo "<td><a href='edit_dangtin.php?id_dangtin=" . $row["id_dangtin"] . "' class='edit-link'>Edit</a> | <a href='delete_dangtin.php?id_dangtin=" . $row["id_dangtin"] . "' onclick=\"return confirm('Bạn có chắc chắn muốn xóa đăng tin này không?')\" class='delete-link'>Delete</a> | <a href='duyetbaidang.php?id_dangtin=" . $row["id_dangtin"] . "' onclick=\"return confirm('Bạn có chắc chắn muốn duyệt bài đăng này không?')\" class='duyet-link'>Duyệt bài đăng</a></td>";

    
                echo "</tr>";
            }
            echo "</table>";

            // Đóng kết nối đến cơ sở dữ liệu
            $conn->close();
        ?>

    </div>

    <button id="btn-ph" onclick="showPH()" style="display: block;">Quản lý phản hồi</button>

    <div id="tablePH" style="display:none;">
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

            // Truy vấn dữ liệu từ bảng PHANHOI
            $sql = "SELECT * FROM phanhoi";
            $result = $conn->query($sql);

            // Hiển thị bảng dữ liệu trên trang admin.php
            echo "<table>";
            echo "<tr><th>ID phản hồi</th><th>SDT</th><th>EMAIL</th><th>Feedback</th><th>Feedback_admin</th><th>Username TK</th><th>Action</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_phanhoi"] . "</td>";
                echo "<td>" . $row["SDT"] . "</td>";
                echo "<td>" . $row["EMAIL"] . "</td>";
                echo "<td>" . $row["feedback"] . "</td>";
                echo "<td>" . $row["feedback_admin"] . "</td>";
                echo "<td>" . $row["USERNAME_TK"] . "</td>";
                echo "<td><a href='edit_phanhoi.php?id_phanhoi=" . $row["id_phanhoi"] . "' class='edit-link'>Edit</a> | <a href='delete_phanhoi.php?id_phanhoi=" . $row["id_phanhoi"] . "' onclick=\"return confirm('Bạn có chắc chắn muốn xóa phản hồi này không?')\" class='delete-link'>Delete</a></td>";

                echo "</tr>";
            }
            echo "</table>";

            // Đóng kết nối đến cơ sở dữ liệu
            $conn->close();
        ?>

    </div>

<script>
function showTaiKhoan() {
    var tableTK = document.getElementById("tableTaiKhoan");
    var btnTK = document.getElementById("btn-tk");

    if (tableTK.style.display === "none") {
        tableTK.style.display = "block";
        btnTK.innerHTML = "Ẩn quản lý tài khoản";
    } else {
        tableTK.style.display = "none";
        btnTK.innerHTML = "Hiển thị quản lý tài khoản";
    }
}

function showBDS() {
        var tableBDS = document.getElementById("tableBDS");
        var btnBDS = document.getElementById("btn-bds");

        if (tableBDS.style.display === "none") {
            tableBDS.style.display = "block";
            btnBDS.innerHTML = "Ẩn quản lý bất động sản";
        } else {
            tableBDS.style.display = "none";
            btnBDS.innerHTML = "Hiển thị quản lý bất động sản";
        }
    }

    function showDangTin() {
        var tableDangTin = document.getElementById("tableDangTin");  
        var btndangtin = document.getElementById("btn-dangtin");

        if (tableDangTin.style.display === "none") {
            tableDangTin.style.display = "block";
            btndangtin.innerHTML = "Ẩn quản lý duyệt đăng tin";
        } else {
            tableDangTin.style.display = "none";
            btndangtin.innerHTML = "Hiển thị quản lý duyệt đăng tin";
        }
    }  

    function showNDT() {
        var tableNDT = document.getElementById("tableNDT");
        var btnNDT = document.getElementById("btn-ndt");

        if (tableNDT.style.display === "none") {
            tableNDT.style.display = "block";
            btnNDT.innerHTML = "Ẩn quản lý nhà đầu tư";
        } else {
            tableNDT.style.display = "none";
            btnNDT.innerHTML = "Hiển thị quản lý nhà đầu tư";
        }
    }


    function showPH() {
        var tablePH = document.getElementById("tablePH");
        var btnPH = document.getElementById("btn-ph");

        if (tablePH.style.display === "none") {
            tablePH.style.display = "block";
            btnPH.innerHTML = "Ẩn quản lý phản hồi";
        } else {
            tablePH.style.display = "none";
            btnPH.innerHTML = "Hiển thị quản lý phản hồi";
        }
    }

</script>


</body>
</html>

