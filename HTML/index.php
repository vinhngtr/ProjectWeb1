<?php
session_start();
$conn = mysqli_connect('localhost', 'nhatthien', '12345', 'btl');

//check connection 
if (!$conn) {
  echo 'Connection failed: ' . mysqli_connect_error();
}

$sql = 'SELECT * FROM products';
$result = mysqli_query($conn, $sql);

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fashionista</title>
  <link rel="stylesheet" href="..\CSS\index.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">


</head>

<body>


  <div class="header">
    <!-- Sile ADS - List catogery product -->
    <div class="header2">
      <nav>
        <input type="checkbox" id="show-search">
        <input type="checkbox" id="show-menu">
        <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
        <div class="content1">
          <div class="logo">
            <a class="text_logo" href="index.php">Fashionista</a>
            <br>
            <a class="text_logo1" href="index.php">Online Shopping</a>
          </div>
          <ul class="links">
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="introduce.php">Giới thiệu</a></li>
            <li>
              <a href="product/list.php" class="desktop-link">Cửa hàng</a>
              <input type="checkbox" id="show-features">
              <label for="show-features">Cửa hàng</label>
              <ul>
                <li>
                  <a href="./product/quan-ao_male.php" class="desktop-link">Quần & áo Nam</a>
                </li>
                <li>
                  <a href="./product/quan-ao_female.php" class="desktop-link">Quần & áo Nữ</a>
                </li>
                <li><a href="./product/giay-dep_male.php">Giày & dép Nam</a></li>
                <li><a href="./product/giay-dep_female.php">Giày & dép Nữ</a></li>
                <li><a href="./product/mu-non_male.php">Mũ & nón Nam</a></li>
                <li><a href="./product/mu-non_female.php">Mũ & nón Nữ</a></li>
                <li><a href="./product/balo_male.php">Balô Nam</a></li>
                <li><a href="./product/balo_female.php">Balô Nữ</a></li>
              </ul>
            </li>
            <!-- Tài khoản -->
            <?php if (!isset($_SESSION['id']) || empty($_SESSION['id'])) { ?>
              <li><a href="signIn.php">Đăng nhập</a></li>
              <li><a href="signUp.php">Đăng kí</a></li>
            <?php } else { ?>
              <li>
                <a href="#" class="desktop-link">Tài khoản</a>
                <input type="checkbox" id="show-services">
                <label for="show-services">Tài khoản</label>
                <ul>
                  <li><a href="shopping_carts.php">Kiểm tra đơn hàng</a></li>
                  <li><a href="user/infoUser.php">Quản lý tài khoản</a></li>
                  <li><a href="logOut.php">Đăng xuất</a></li>
                </ul>
              </li>
            <?php } ?>

            <li><a href="contact.php">Liên hệ </a></li>
          </ul>
        </div>
        <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
        <form action="" class="search-box" method="GET">
          <input type="text" placeholder="Tìm kiếm sản phẩm..." name="search" required>
          <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
        </form>
        <!-- Search php code-->
        <?php
        if (isset($_GET['search']) && $_GET['search'] != '') {
          $search = trim($_GET['search']);
          $sql = "SELECT * FROM products WHERE ";
          $keywords = explode(' ', $search);
          foreach ($keywords as $word) {
            $sql .= " pro_name LIKE '" . $word . "%' OR ";
          }
          $sql = substr($sql, 0, strlen($sql) - 3);
          $query = mysqli_query($conn, $sql);
          if (mysqli_num_rows($query) > 0) {
            $searches = mysqli_fetch_all($query, MYSQLI_ASSOC);
          }
          $_SESSION['search'] = $searches;
          header('Location: searchProduct.php');
        }
        ?>

      </nav>
    </div>

  </div>


  <div class="ads_category">
    <div class="container_ads">
      <div class="button_let">
        <span class="btn"></span>
        <span class="btn"></span>
        <span class="btn"></span>
        <span class="btn"></span>
        <span class="btn"></span>
      </div>
      <div class="testimonial">
        <div class="slide_row" id="slide">
          <div class="divAds">
            <img class="img_ads" src="https://sneakernews.com/wp-content/uploads/2019/09/ebay-september-2019-jordan-banner-1.jpg" alt="">
          </div>

          <div class="divAds">
            <img class="img_ads" src="https://preview.thenewsmarket.com/Previews/ADID/VideoAssets/1920x1080/ADID_51830_601152.jpg" alt="">
          </div>

          <div class="divAds">
            <img class="img_ads" src="https://bunluxury.com/upload/image/tintuc/1561701915257.jpeg" alt="">
          </div>

          <div class="divAds">
            <img class="img_ads" src="https://i.pinimg.com/originals/fa/45/96/fa4596ad9a9d39901eeb455ed4f74e44.jpg" alt="">
          </div>

          <div class="divAds">
            <img class="img_ads" src="http://file.hstatic.net/200000477321/collection/1920x680_banner_adidas_115172ff8b3342f8902610aa83af8b90.png" alt="">
          </div>
        </div>
      </div>
    </div>

  </div>


  <!-- BODY_CONTENT -->
  <div class="bodyContent">
    <div class="show_category">
      <div class="header_show">
        <h2 class="text_show">
          Danh mục sản phẩm
          <hr class="line_body" width="100%" color="blue" size="5px">
        </h2>
      </div>
      <div class="show_product">
        <div class="indicator">
          <span class="press"></span>
          <span class="press"></span>
          <span class="press"></span>
          <span class="press"></span>
        </div>
        <div class="notSpill">
          <div class="show_row" id="one_col">
            <div class="show_col">
              <div class="cate_img">
                <a href="#"><img class="img_show" src="https://giaycaosmartmen.com/wp-content/uploads/2020/12/cach-chup-giay-dep-5.jpg" alt=""></a>
              </div>
              <div class="cate_text">
                <a href="#">Giày & dép</a>
              </div>
            </div>

            <div class="show_col">
              <div class="cate_img">
                <a href="#">
                  <img class="img_show" src="https://bizweb.dktcdn.net/100/329/281/products/10354059929-1510934832-copy.jpg?v=1569992795683" alt="">
                </a>
              </div>
              <div class="cate_text">
                <a href="#">Mũ & nón</a>
              </div>
            </div>

            <div class="show_col">
              <div class="cate_img">
                <a href="#">
                  <img class="img_show" src="https://media.canifa.com/Simiconnector/simicategory_filename_tablet1629470033.webp" alt="">
                </a>
              </div>
              <div class="cate_text">
                <a href="#">Quần & áo</a>
              </div>
            </div>

            <div class="show_col">
              <div class="cate_img">
                <a href="#">
                  <img class="img_show" src="https://product.hstatic.net/1000343530/product/img_3180_3296eef344b2433394a2f196b5063ade_large.jpg" alt="">
                </a>
              </div>
              <div class="cate_text">
                <a href="#">Balô</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <hr size="1px" color="black" class="hr_1">

  <!-- Footer index -->
  <div class="trademark_fash">
    <h2 class="header_trade">Top famous brand</h2>
    <div class="container_trade">
      <div class="wrapper">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <div class="carousel">
          <img src="https://aitvietnam.com/wp-content/uploads/2022/01/logo-cac-thuong-hieu-thoi-trang-noi-tieng-8.jpg" alt="img" draggable="false">
          <img src="https://aitvietnam.com/wp-content/uploads/2022/01/logo-cac-thuong-hieu-thoi-trang-noi-tieng-1.png" alt="img" draggable="false">
          <img src="https://ttagencyads.com/wp-content/uploads/2021/04/10-mau-logo-thuong-hieu-2.png" alt="img" draggable="false">
          <img src="https://iweb.tatthanh.com.vn/pic/3/blog/logo-shop-thoi-trang.jpg" alt="img" draggable="false">
          <img src="https://ttagencyads.com/wp-content/uploads/2021/04/10-mau-logo-thuong-hieu-4.jpg" alt="img" draggable="false">
          <img src="https://censor.vn/wp-content/uploads/2022/03/logo-cac-hang-giay-noi-tieng-9.png" alt="img" draggable="false">
        </div>
        <i id="right" class="fa-solid fa-angle-right"></i>
      </div>
    </div>
  </div>


  <footer>
    <div class="main-content">
      <div class="left box">
        <h2>About us</h2>
        <div class="content">
          <p>Fashionista - là một trang web mua sắm thời trang online, nơi thỏa mãn đam mê mua sắm bất tận của bạn...!!!</p>
        </div>
      </div>
      <div class="center box">
        <h2>Address</h2>
        <div class="content">
          <div class="place">
            <span class="fas fa-map-marker-alt"></span>
            <span class="text">268, Lý Thường Kiệt, Quận 10, Tp.HCM</span>
          </div>
          <div class="phone">
            <span class="fas fa-phone-alt"></span>
            <span class="text">+0969379924</span>
          </div>
          <div class="email">
            <span class="fas fa-envelope"></span>
            <span class="text">vinhtrong782002@gmail.com</span>
          </div>
        </div>
      </div>
      <div class="right box">
        <h2>Contact us</h2>
        <div class="social">
          <a href="https://www.facebook.com/vinh.nguyentrong.1291"><span class="fab fa-facebook-f"></span></a>
          <a href="#"><span class="fab fa-twitter"></span></a>
          <a href="#"><span class="fab fa-instagram"></span></a>
          <a href="https://www.youtube.com/channel/UCP_rD_OjsAr3-0qFZVxiDVg"><span class="fab fa-youtube"></span></a>
        </div>
      </div>
  </footer>
  <div class="bottom">
    <center>
      <span class="credit">Created By <a href="#">TeamWeb_KTMT_HCMUT</a> | </span>
      <span class="far fa-copyright"></span><span> 2022 All rights reserved.</span>
    </center>
  </div>
  <a href="#" class="to-top">
    <i class="fas fa-chevron-up"></i>
  </a>

  <script src="..\JS\main.js"></script>
  <script src="https://kit.fontawesome.com/a54d2cbf95.js"></script>
</body>

</html>