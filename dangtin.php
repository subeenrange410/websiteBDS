<?php
session_start();
$phone = $_SESSION['SDT'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Đăng tin</title>
    <link rel="stylesheet" type="text/css" href="css/stylemenu.css">
    <link rel="stylesheet" type="text/css" href="css/buttonSearch.css">
    <link rel="stylesheet" type="text/css" href="css/Khungsearch.css">
    <link rel="stylesheet" type="text/css" href="css/styletonghop.css">
    <link rel="stylesheet" type="text/css" href="css/dangtin.css">
</head>
<body>
    <form action="insertdangtin.php" method="POST">
        <fieldset>
            <div class="row">
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="city">Tỉnh thành:</label>
                        <select class="form-control" id="city" name = "city_dangtin">
                            <option value="" selected>Chọn tỉnh thành</option>
                            <!--Thêm các tùy chọn cho tỉnh thành ở đây-->
                        </select>
                    </div>
                </div>
    
                <div class="col-md-4">
                        <div class="form-group">
                            <label for="district">Quận huyện:</label>
                            <select class="form-control" id="district" name = "district_dangtin">
                                <option value="" selected>Chọn quận huyện</option>
                                <!--Thêm các tùy chọn cho quận huyện ở đây-->
                            </select>
                        </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ward">Phường xã:</label>
                        <select class="form-control" id="ward" name = "ward_dangtin">
                            <option value="" selected>Chọn phường xã</option>
                            <!--Thêm các tùy chọn cho phường xã ở đây-->
                        </select>
                    </div>
                </div>
    
            </div>
    
            <div class="form-group">
                <label for="house-type">Loại nhà:</label>
                <div id="house-type">
                    <label class="property-type blue" for="forRent">
                        <input type="radio" name="house-type" id="forRent" value="thue" checked>
                        Nhà đất cho thuê
                    </label>
                    <label class="property-type red" for="forSale">
                        <input type="radio" name="house-type" id="forSale" value="ban">
                        Nhà đất bán
                    </label>
            </div>
        </div>
        
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="price">Giá:</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="image">Link ảnh:</label>
                <input type="text" class="form-control" id="image" name="image">
            </div>
            <div class="form-group">
                <label for="note">Ghi chú:</label>
                <textarea class="form-control" id="note" name="note"></textarea>
            </div>
        </fieldset>
        <div style="text-align: center"><h1>Nhà bán hoặc cho thuê:</h1></div>
        <div class="container">
            <div class="form-group">
              <label for="fullname">Họ và tên:</label>
              <input type="text" class="form-control" id="fullname" name="fullname">
            </div>
            <div class="form-group">
              <label for="taxID">Mã số thuế:</label>
              <input type="text" class="form-control" id="taxID" name="taxID">
            </div>
            <div class="form-group">
              <label for="cccd">CCCD:</label>
              <input type="text" class="form-control" id="cccd" name="cccd">
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" readonly>
            </div>


        </div>
        
        <button type="submit" class="btn_dangtin">Gửi yêu cầu đăng tin</button>
        <a href='h.php' >Quay lại trang admin</a>
    </form>

    <script type="text/javascript" src="js/scriptSearch.js"></script>
</body>
</html>