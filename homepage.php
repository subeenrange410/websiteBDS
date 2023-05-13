<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/stylemenu.css">
    <link rel="stylesheet" type="text/css" href="css/buttonSearch.css">
    <link rel="stylesheet" type="text/css" href="css/Khungsearch.css">
    <link rel="stylesheet" type="text/css" href="css/styletonghop.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/hinhnen.css">
    

</head>
<body>
    
    <header>
        <div class="logo">
            <img src="images/logo_homepage.jpg" class="img-menu">
        </div>
        <div class="RealEstate">
            <h4>Real Estate</h4>
        </div>
        <ul class="list-menu">
            <li>
                <a href="homepage.php">Trang chủ</a>
            </li>
            <li>
                <a href="about.php">Giới thiệu</a>
            </li>
            <li>
                <a href="login.php">Đăng tin</a>
            </li>
            <li>
                <a href="login.php">Đăng Nhập</a>
            </li>
            <li>
                <a href="Regist.php">Đăng ký</a>
            </li>
        </ul>
        <div class="burger">
            <div class="div1"></div>
            <div class="div2"></div>
            <div class="div3"></div>
        </div>
    </header>

    
  <fieldset>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="city">Tỉnh thành:</label>
            <select class="form-control" id="city">
              <option value="" selected>Chọn tỉnh thành</option>
              <!--Thêm các tùy chọn cho tỉnh thành ở đây-->
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="district">Quận huyện:</label>
            <select class="form-control" id="district">
              <option value="" selected>Chọn quận huyện</option>
              <!--Thêm các tùy chọn cho quận huyện ở đây-->
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="ward">Phường xã:</label>
            <select class="form-control" id="ward">
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
        <label>
        <button id="searchButton">Tìm kiếm</button>
        </label>
      </div>
    </div>

</fieldset>

<h2 id="result"></h2>

<div id="propertyContainer"></div>
<script type="text/javascript" src="js/scriptSearch.js"></script>
<script type="text/javascript" src="js/scriptmenu.js"></script>
<br>
<br>

<div class="background-image">
  <img src="./images/anhnen1.jpg" alt="ảnh 1" class="active">
  <img src="./images/anhnen2.jpg" alt="ảnh 2">
  <img src="./images/anhnen22.jpg" alt="ảnh 22">
  <img src="./images/anhnen3.jpg" alt="ảnh 3">
  <img src="./images/anhnen4.jpg" alt="ảnh 4">
</div>

<script>
  var slideIndex = 0;
  slideShow();

  function slideShow() {
    var i;
    var slides = document.getElementsByClassName("background-image")[0].getElementsByTagName("img");
    for (i = 0; i < slides.length; i++) {
      slides[i].className = "inactive";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
      slideIndex = 1;
    }
    slides[slideIndex-1].className = "active";
    setTimeout(slideShow, 3000); // Change image every 3 seconds
  }
</script>




<br>
<h1 style="color:RED;">TIN TỨC HÔM NAY</h1>
  <div>
    <div class="bao">
        <a href="https://vnexpress.net/kinh-doanh/bat-dong-san" target="_blank">
            <img src="./images/bao1.jpg" alt="thị trường bất động sản Việt Nam" width="400">
        </a>
        <h2>Thị trường bất động sản Việt Nam ổn<br>
         định trong quý 1/2023</h2>
        <p>Theo báo cáo của <strong>Tổng cục Thống kê</strong>, trong quý 1/2023, thị<br>
         trường bất động sản Việt Nam có sự ổn định và tăng trưởng<br>
          nhẹ. Trong đó, các thành phố lớn như <strong>Hà Nội</strong> và <strong>TP.HCM</strong> tiếp<br>
           tục là điểm nóng của thị trường với sự tăng giá đáng kể ở các<br>
            khu vực trung tâm.</p>
    </div>
    <div class="bao">
        <a href="https://vnexpress.net/kinh-doanh/bat-dong-san" target="_blank">
            <img src="./images/bao2.jpg" alt="nhà đất mới xây dựng" width="400">
        </a>
        <h2>Số lượng nhà đất mới xây dựng tại <br>
        các đô thị lớn tăng cao</h2>
        <p>Theo báo cáo của <strong>Bộ Xây dựng</strong>, trong năm 2023, số lượng <br>nhà đất mới xây dựng tại các đô thị lớn như Hà Nội,<br>
         TP.HCM, Đà Nẵng... tăng cao. Điều này cho thấy nhu cầu về <br>
         nhà ở ngày càng tăng cao, đặc biệt là tại các đô thị lớn.</p>
    </div>
    <div class="bao">
        <a href="https://vnexpress.net/kinh-doanh/bat-dong-san" target="_blank">
            <img src="./images/bao3.jpg" alt="giá nhà ở tăng mạnh" width="400">
        </a>
        <h2>Giá nhà ở các thành phố lớn tăng mạnh</h2>
        <p>Theo báo cáo của <strong>Savills Việt Nam</strong>, giá nhà ở các thành phố <br>
        lớn như Hà Nội và TP.HCM tiếp tục tăng mạnh trong quý <br>
        1/2023. Nguyên nhân được cho là do nhu cầu về<br>
         nhà ở tăng cao, cộng thêm với việc dịch bệnh COVID-19 được<br>
          kiểm soát tốt. Các chuyên gia đưa ra dự báo giá nhà ở sẽ tiếp tục
          <br> tăng trong thời gian tới.</p>
    </div>
    <div class="bao">
        <a href="https://vnexpress.net/kinh-doanh/bat-dong-san" target="_blank">
            <img src="./images/bao4.jpg" alt="thị trường bất động sản Việt Nam" width="400">
        </a>
        <h2>Novaland dự kiến vay tối đa 350 tỷ<br> đồng từ chủ đầu tư dự án Aqua Riversi<br> City
         định trong quý 1/2023</h2>
        <p><strong>HĐQT Novaland</strong> vừa thông qua việc vay vốn từ Công ty <br>
        TNHH Đầu tư Bất động sản Long Hưng Phát. 
        Đây là một công ty <br>
        con của Novaland và thông qua khoản vay này, Novaland sẽ có<br>
         thêm nguồn vốn để triển khai các dự án bất động sản của mình.</p>
    </div>
    <div class="bao">
        <a href="https://vnexpress.net/kinh-doanh/bat-dong-san" target="_blank">
            <img src="./images/bao5.jpg" alt="nhà đất mới xây dựng" width="400">
        </a>
        <h2>Khang Điền giải thể 2 công ty bất động<br>
        sản</h2>
        <p>Cụ thể, <strong>CTCP</strong> Đầu tư và Kinh doanh Nhà <strong>Khang Điền</strong> đã thông<br> 
         qua chủ trương về việc Công ty <strong>TNHH</strong> Phát triển bất động sản<br> 
          Nam Phú (công ty do <strong>Khang Điền</strong> sở hữu 99% vốn điều lệ) <br> 
          giải thể Công ty Cổ phần phát triển bất động sản <br> 
          Nguyên Thư do Công ty <strong>TNHH</strong> phát triển bất động sản <br>  <strong>Nam Phú</strong>
           sở hữu 99,9% vốn điều lệ.</p>
    </div>
    <div class="bao">
        <a href="https://vnexpress.net/kinh-doanh/bat-dong-san" target="_blank">
            <img src="./images/bao6.jpg" alt="giá nhà ở tăng mạnh" width="400">
        </a>
        <h2>Thanh Hoá: Sắp đấu giá khu đất xây <br>
        dựng Dự án Trung tâm thương mại<br>
         AEON MALL</h2>
        <p>UBND tỉnh Thanh hoá đã có văn bản thúc <br>
        tiến độ đầu tư dự án Trung tâm Thương mại Aeon <br>
        Mall tại phường Quảng Thành, thành phố Thanh Hóa.<br>
        Đây là dự án trọng điểm có ý nghĩa quan trọng,<br>
        góp phần vào sự phát triển kinh tế - xã hội của tỉnh <br>
        Thanh Hóa. Dự kiến cuối năm nay, dự án sẽ được khởi công<br>
         xây dựng.</p>
    </div>
  </div>

<footer>
  <div class="footer-container">
    <div class="footer-address">
      <h4>Địa chỉ</h4>
      <p>22 Đ. Nguyễn Đình Chiểu, Vĩnh Phước, Nha Trang, Vĩnh Phước 650000, Việt Nam</p>
      <p>Lô 29 Trần Phú, Lộc Thọ, Nha Trang, Khánh Hòa 650000, Việt Nam</p>
      <p>126 Nhị Hà, Phước Hoà, Nha Trang, Khánh Hòa, Việt Nam</p>
      <p>W4PW+9CJ, Phú Hài, Thành phố Phan Thiết, Bình Thuận, Việt Nam</p>
      <p>Đường Hùng Vương, Phú Thuỷ, Thành phố Phan Thiết, Bình Thuận, Việt Nam</p>
    </div>
    <div class="footer-contact">
      <h4>Liên hệ</h4>
      <p>Điện thoại: (0258) 3 818 886 - Mobile: 0902 169 295</p>
      <p>Điện thoại: (0218) 3 123 123 - Mobile: 0332 123 11</p>
      <p>Điện thoại: (0123) 3 111 886 - Mobile: 0902 169 123</p>
    </div>
  </div>
  <br>
  <div>----------------------------------------------------------------------------------------------------------------</div>
  <br>
  <div>
    Giấy ĐKKD số 0104630479 do Sở KHĐT TP Hà Nội cấp lần đầu ngày 02/06/2010
    Giấy phép ICP số 2399/GP-STTTT do Sở TTTT Hà Nội cấp ngày 4/9/2014
    Giấy phép GH ICP số 3832/GP-TTĐT do Sở TTTT Hà Nội cấp ngày 8/8/2019
    Giấy phép SĐ, BS GP ICP số 3833/GP-TTĐT do Sở TTTT Hà Nội cấp ngày 8/8/2019
    Giấy xác nhận số 1728/GXN-TTĐT do Sở TTTT Hà Nội cấp ngày 23/6/2020
    Giấy phép GH ICP số 2886/GP-TTĐT do Sở TTTT Hà Nội cấp ngày 09/08/2021Chịu trách nhiệm nội dung GP ICP: Bà Đặng Thị Hường
    </div>
</footer>


</body>
</html>