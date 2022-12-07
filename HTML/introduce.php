<!DOCTYPE html>
<html lang="en">

<head>
    <title>Giới thiệu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="..\CSS\introduce.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
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
    <div class="main_body">
        <div class="banner_1">
            <img class="img_bnn1" src="https://thuthuatnhanh.com/wp-content/uploads/2022/06/background-banner-cuc-dep.jpg" alt="">
        </div>
        <div class="local">
            <div class="div_contain">
                <img class="img_div" src="https://kynghexanh.com/wp-content/uploads/2022/03/su-menh-ky-nghe-xanh.jpg" alt="">
                <h4>Tầm nhìn của chúng tôi</h4>
                <p>Đưa website trở thành một kênh mua sắm online uy tín, chất lượng với những sản phẩm cập nhật mới nhất của các mode thời trang trên thị trường</p>
            </div>
            <div class="div_contain">
                <img class="img_div" src="https://ketoanducminh.edu.vn/uploads/News/pic/h%C3%A0nh_%C4%91%E1%BB%99ng.jpg" alt="">
                <h4>Chúng tôi thực sự làm gì?</h4>
                <p>Chúng tôi hiện tại vẫn đang cố gắng hoàn thiện tốt nhất trải nghiệm người dùng với website, cũng nhưng tính ổn định của website. Ngoài ra sản phẩm được bán trên web sẽ được chúng tôi cố gắng cập nhật thường xuyên.</p>
            </div>
            <div class="div_contain">
                <img class="img_div" src="https://1boss.vn/uploads/details/2022/04/images/tam-nhin-su-menh-muc-tieu-cua-doanh-nghiep-4.jpg" alt="">
                <h4>Lịch sử phát triển</h4>
                <p>Được lên ý tưởng từ đầu tháng 10, website được phát triển qua 2 tháng với 2 phần nội dung quan trọng là Front-end và Backend được xây dựng bởi 4 thành viên của nhóm BTL.</p>
            </div>
        </div>
        <hr size="3px">
        <div class="super_team">
            <h2>Đội ngũ của chúng tôi</h2>
            <div class="team_info">
                <div class="member">
                    <img src="https://scontent.fsgn5-13.fna.fbcdn.net/v/t39.30808-6/318127248_680007020187067_1227580993922125182_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=KYlekzU0wcYAX8cYxmK&tn=r-pmSfXqeNpsLh83&_nc_ht=scontent.fsgn5-13.fna&oh=00_AfA24xNjTODgdgPQMkXj0eXPwqKNqLjlFNNA_IcYDF_sgw&oe=6390FC1C" alt="">
                    <h4>Nguyễn Trọng Vinh</h4>
                    <p>Thành viên phát triển FE web</p>
                </div>
                <div class="member">
                    <img src="https://bom.so/c7vRNN" alt="">
                    <h4>Ngô Nhật Thiên</h4>
                    <p>Thành viên phát triển BE web</p>
                </div>
                <div class="member">
                    <img src="https://f8-zpcloud.zdn.vn/949171481642285573/404946901547cc199556.jpg?fbclid=IwAR2B7Ll1w2eVbVDqrK7QpGTZyQ9d7tHC_EUOb8u78vsbZj-tDQVbpPYlehY" alt="">
                    <h4>Phạm Đình Văn</h4>
                    <p>Thành viên phát triển Content, Idea web </p>
                </div>
                <div class="member">
                    <img src="https://scontent.fsgn5-12.fna.fbcdn.net/v/t39.30808-6/301224141_1783499561986987_1374075145988007315_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=qPPYQF7noYoAX8NLQEH&_nc_ht=scontent.fsgn5-12.fna&oh=00_AfDkiUbgp261eOkoN4pQP7mC122hdQhwLvxrlkQXJQYU8g&oe=63915779" alt="">
                    <h4>Trần Tiến Đạt</h4>
                    <p>Thành viên phát triển Content, Idea web</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="serviceWeb">
            <h2>DỊCH VỤ CỦA CHÚNG TÔI</h2>
            <div class="listService">
                <div class="serv">
                    <img src="https://mauweb.monamedia.net/movic/wp-content/uploads/2020/04/taxi-1.svg" alt="">
                    <h4>Giao hàng toàn quốc</h4>
                </div>
                <div class="serv">
                    <img src="https://mauweb.monamedia.net/movic/wp-content/uploads/2020/04/supermarket.svg" alt="">
                    <h4>Thanh toán nhanh chóng</h4>
                </div>
                <div class="serv">
                    <img src="https://mauweb.monamedia.net/movic/wp-content/uploads/2020/04/smile.svg" alt="">
                    <h4>Hỗ trợ 24/7</h4>
                </div>
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


    <script src="main.js"></script>
</body>

</html>