<?php
$conn = mysqli_connect('localhost', 'nhatthien', '12345', 'btl');
$error = '';
$errorClass = 'd-none';
if (!$conn) {
  echo 'Connection failed: ' . mysqli_connect_error();
}
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $reply = $_POST['reply'];
  if ($name == NULL || $email == NULL || $reply == NULL || $phone == NULL) {
    echo 'Please fill in all the information below !!!';
    $errorClass = '';
  } else {
    $sql = "INSERT INTO replies ( name, email, phone, reply) VALUES('$name', '$email', '$phone', '$reply')";
    if (mysqli_query($conn, $sql)) {
      //success
      header('Location: index.php');
    } else {
      //error
      echo "query error: " . mysqli_error($conn);
    }
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liên hệ</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="..\CSS\contact.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.2/css/all.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
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

  <!-- CONTENT in below -->
  <div class="banner_introduce">
    <div class="div_contact">
      <img class="img_contact" src="https://kthreedesign.com.np/wp-content/uploads/2016/08/banner04.jpg" alt="">
    </div>
    <span>CONTACT ME</span>
  </div>
  <div class="main_body">
    <div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1588.9439306368802!2d106.80493025599253!3d10.880560072718076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d8a5568c997f%3A0xdeac05f17a166e0c!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBraG9hIC0gxJBIUUcgVFAuSENN!5e0!3m2!1svi!2s!4v1670032942706!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <br>
    <hr align="center" , width="100%" ; style="margin-top:50px">
    <div class="contact_me">
      <div class="mess">
        <section class="contact" id="contact-section">
          <h2 class="heading">LIÊN HỆ VỚI CHÚNG TÔI</h2>
          <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <input name="name" style="display: none" type="text">
            <div class="contact-form"><input name="name" placeholder=" Name*" id="name" required type="text"></div>
            <div class="contact-form">
              <input type="tel" name="phone" id="topic" placeholder="Số điện thoại" required>
            </div>
            <div class="contact-form">
              <input type="email" name="email" required placeholder="Email*">
            </div>
            <textarea class="message" name="reply" placeholder="Lời nhắn..." required></textarea>
            <input class="btn contact-btn" type="submit" name="submit" value="Gửi">
          </form>
        </section>
      </div>
    </div>
  </div>


  <!-- Footer -->

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

</body>

</html>