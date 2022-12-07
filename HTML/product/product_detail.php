<?php
session_start();


// connect to DB
$conn = mysqli_connect('localhost', 'nhatthien', '12345', 'btl');

//check connection 
if (!$conn) {
    echo 'Connection failed: ' . mysqli_connect_error();
}
$getId = $_GET['id'];

// Give a comment
if (isset($_POST['add_cmt'])) {
    if (!isset($_SESSION['id'])) {
        echo "Error";
    } else {
        $user_id = $_SESSION['id'];
        $comment = $_POST['comment'];
        $sql_2 = "INSERT INTO comments ( `user_id`, `pro_id`, `cmt_content`) VALUES ( '$user_id', '$getId' ,'$comment')";
        $result = mysqli_query($conn, $sql_2);
    }
}

// Get product
$sql = "SELECT * FROM products WHERE pro_id = '$getId'";
// Get comments
$sql_1 = "SELECT * FROM comments WHERE pro_id = '$getId'";

//make query and get results
$result = mysqli_query($conn, $sql);
$result_1 = mysqli_query($conn, $sql_1);

//fetch the results row as an array
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
$comments = mysqli_fetch_all($result_1, MYSQLI_ASSOC);
$price_sell = $products[0]['price_sell'];
$pro_name = $products[0]['pro_name'];
$sell_percent = $products[0]['sell_percent'];
$image = $products[0]['image'];
$kind = $products[0]['categoryKind'];
// where is add_to_card
if (isset($_POST['add_to_cart'])) {
    echo "<script>alert('Complete!');</script>";
    if (isset($_SESSION['cart'])) {
        $_session_array_id = array_column($_SESSION['cart'], "id");

        if (!in_array($_GET['id'], $_session_array_id)) {
            $session_array = array(
                'id' => $_GET['id'],
                'name' => $pro_name,
                'price' => $price_sell,
                'sale' => $sell_percent,
                'kind' => $kind,
                'size' => $_POST['size'],
                'color' => $_POST['color'],
                'quantify' => $_POST['quantify'],
                'image' => $image,
            );
            $_SESSION['cart'][] = $session_array;
        }
    } else {
        $session_array = array(
            'id' => $_GET['id'],
            'name' => $pro_name,
            'price' => $price_sell,
            'sale' => $sell_percent,
            'kind' => $kind,
            'size' => $_POST['size'],
            'color' => $_POST['color'],
            'quantify' => $_POST['quantify'],
            'image' => $image,
        );
        $_SESSION['cart'][] = $session_array;
    }
}
//free results from memory
mysqli_free_result($result);
mysqli_free_result($result_1);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\..\CSS\product_detail.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <title>Chi tiết Product</title>
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
                        <a class="text_logo" href="../index.php">Fashionista</a>
                        <br>
                        <a class="text_logo1" href="../index.php">Online Shopping</a>
                    </div>
                    <ul class="links">
                        <li><a href="../index.php">Trang chủ</a></li>
                        <li><a href="../introduce.php">Giới thiệu</a></li>
                        <li>
                            <a href="list.php" class="desktop-link">Cửa hàng</a>
                            <input type="checkbox" id="show-features">
                            <label for="show-features">Cửa hàng</label>
                            <ul>
                                <li>
                                    <a href="../product/quan-ao_male.php" class="desktop-link">Quần & áo Nam</a>
                                </li>
                                <li>
                                    <a href="../product/quan-ao_female.php" class="desktop-link">Quần & áo Nữ</a>
                                </li>
                                <li><a href="../product/giay-dep_male.php">Giày & dép Nam</a></li>
                                <li><a href="../product/giay-dep_female.php">Giày & dép Nữ</a></li>
                                <li><a href="../product/mu-non_male.php">Mũ & nón Nam</a></li>
                                <li><a href="../product/mu-non_female.php">Mũ & nón Nữ</a></li>
                                <li><a href="../product/balo_male.php">Balô Nam</a></li>
                                <li><a href="../product/balo_female.php">Balô Nữ</a></li>
                            </ul>
                        </li>
                        <!-- Tài khoản -->
                        <?php if (!isset($_SESSION['id']) || empty($_SESSION['id'])) { ?>
                            <li><a href="../signIn.php">Đăng nhập</a></li>
                            <li><a href="../signUp.php">Đăng kí</a></li>
                        <?php } else { ?>
                            <li>
                                <a href="" class="desktop-link">Tài khoản</a>
                                <input type="checkbox" id="show-services">
                                <label for="show-services">Tài khoản</label>
                                <ul>
                                    <li><a href="../shopping_carts.php">Kiểm tra đơn hàng</a></li>
                                    <li><a href="../user/infoUser.php">Quản lý tài khoản</a></li>
                                    <li><a href="../logOut.php">Đăng xuất</a></li>
                                </ul>
                            </li>
                        <?php } ?>

                        <li><a href="../contact.php">Liên hệ </a></li>
                    </ul>
                </div>
                <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
                <form action="../searchProduct.php" class="search-box" method="GET">
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
                    header('Location: ../searchProduct.php');
                }
                ?>

            </nav>
        </div>

    </div>
    <div class="pd-wrap">
        <!-- Edit Comment Modal -->
        <div class="modal fade" id="commentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Comment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="updateComment">
                        <div class="modal-body">

                            <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                            <input type="hidden" name="comment_id" id="comment_id">

                            <div class="mb-3">
                                <label for="">Nội dung</label>
                                <input type="text" name="cmt_content" id="cmt_content" class="form-control" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="main-img">
                        <img class="img-fluid" src="<?php echo $products[0]['image']; ?>" alt="ProductS">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-dtl">
                        <div class="product-info">
                            <div class="product-name"><?php echo $products[0]['pro_name']; ?></div>
                            <div class="product-price-discount"><span><?php echo $products[0]['price_sell']; ?> đ</span><span class="line-through"><?php echo round($products[0]['price_sell'] / ((100 - $products[0]['sell_percent']) / 100)) ?> đ</span></div>
                        </div>
                        <p>
                            <?php echo $products[0]['pro_description']; ?>
                        </p>
                        <div class="product-count">
                            <form action="product_detail.php?id=<?= $products[0]['pro_id'] ?>" method="POST" class="">
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for="size">Size</label>
                                        <select id="size" name="size" class="form-control" required>
                                            <option name="size" value="S">S</option>
                                            <option name="size" value="M">M</option>
                                            <option name="size" value="L">L</option>
                                            <option name="size" value="XL">XL</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="color">Màu sắc</label>
                                        <select id="color" name="color" class="form-control" required>
                                            <option name="color" value="Xanh">Xanh</option>
                                            <option name="color" value="Trắng">Trắng</option>
                                            <option name="color" value="Đen">Đen</option>
                                        </select>
                                    </div>
                                </div>
                                <label for="size">Số lượng</label>
                                <div class="block quantity">
                                    <input type="number" class="form-control" id="cart_quantity" value="1" min="1" max="10" placeholder="Enter email" name="quantify" required>
                                </div>

                                <div class="buyProduct">
                                    <?php if (isset($_SESSION['is_admin']) && ($_SESSION['is_admin'] == 0)) { ?>
                                        <input type="submit" name="add_to_cart" class="round-black-btn" value="Mua ngay">
                                    <?php } else { ?>
                                        <a href="../signIn.php" class="round-black-btn">Mua ngay</a>
                                    <?php } ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-info-tabs">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews (<?php $size = count($comments);
                                                                                                                                                                echo $size; ?>)</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                        <?php echo $products[0]['pro_description']; ?>
                    </div>
                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                        <div class="review-heading">REVIEWS</div>
                        <?php foreach ($comments as $comment) { ?>
                            <?php $user_id = $comment['user_id'];
                            $sql_2 = "SELECT * FROM accounts WHERE id = '$user_id'";
                            $result_2 = mysqli_query($conn, $sql_2);
                            $accounts = mysqli_fetch_all($result_2, MYSQLI_ASSOC);
                            ?>
                            <?php if ((isset($_SESSION['id']) && ($_SESSION['id'] == $user_id))) { ?>
                                <div class="mb-20" id="this">
                                <?php } else { ?>
                                    <div class="mb-20">
                                    <?php } ?>
                                    <div class="name_user h5">
                                        <span class="h5"> <?php echo $accounts[0]['firstName'] . ' ' . $accounts[0]['lastName'] ?></span>
                                        <?php if ((isset($_SESSION['id']) && $_SESSION['id'] == $user_id)) { ?>
                                            <button type="button" value="<?= $comment['cmt_id']; ?>" class="editCommentBtn btn btn-success btn-sm">Edit</button>
                                            <button type="button" value="<?= $comment['cmt_id']; ?>" class="deleteCommentBtn btn btn-danger btn-sm">Delete</button>
                                        <?php } else if ((isset($_SESSION['is_admin']) && ($_SESSION['is_admin'] == 1))) { ?>
                                            <button type="button" value="<?= $comment['cmt_id']; ?>" class="deleteCommentBtn btn btn-danger btn-sm">Delete</button>
                                        <?php } ?>
                                    </div>
                                    <span class="mail_user"><?php echo $accounts[0]['email'] ?></span>
                                    <?php if (isset($_SESSION['id']) && ($_SESSION['id'] == $user_id)) { ?>
                                        <span class="content_cmt" id="content_cmt" style="color: black; font-style:italic; font-size:18px"><?php echo $comment['cmt_content'] ?></span>
                                    <?php } else { ?>
                                        <span class="content_cmt" style="color: black; font-style:italic; font-size:18px"><?php echo $comment['cmt_content'] ?></span>
                                    <?php } ?>
                                    </div>
                                <?php } ?>
                                <!-- Form -->
                                <?php if (isset($_SESSION['is_admin'])) { ?>
                                    <form class="review-form" method="post" action="">
                                        <div class="form-group">
                                            <label>Your message</label>
                                            <textarea class="form-control" rows="10" name="comment"></textarea>
                                        </div>
                                        <input type="submit" name="add_cmt" class="round-black-btn" value="Thêm bình luận">
                                    </form>
                                <?php } ?>
                                </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"> </script>
        <script>
            $(document).on('click', '.editCommentBtn', function() {

                var comment_id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "code.php?comment_id=" + comment_id,
                    success: function(response) {
                        var res = jQuery.parseJSON(response);
                        if (res.status == 404) {
                            alert(res.message);
                        } else if (res.status == 200) {

                            $('#comment_id').val(res.data.cmt_id);
                            $('#cmt_content').val(res.data.cmt_content);

                            $('#commentEditModal').modal('show');
                        }

                    }
                });

            });

            $(document).on('submit', '#updateComment', function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                formData.append("update_comment", true);

                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        var res = jQuery.parseJSON(response);
                        if (res.status == 422) {
                            $('#errorMessageUpdate').removeClass('d-none');
                            $('#errorMessageUpdate').text(res.message);

                        } else if (res.status == 200) {

                            $('#errorMessageUpdate').addClass('d-none');

                            $('#commentEditModal').modal('hide');
                            $('#updateComment')[0].reset();
                            $('#content_cmt').load(location.href + " #content_cmt");
                        } else if (res.status == 500) {
                            alert(res.message);
                        }
                    }
                });
            });
            // Chưa sửa 
            $(document).on('click', '.deleteCommentBtn', function(e) {
                e.preventDefault();

                if (confirm('Are you sure you want to delete this data?')) {
                    var comment_id = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "code.php",
                        data: {
                            'delete_comment': true,
                            'comment_id': comment_id
                        },
                        success: function(response) {

                            var res = jQuery.parseJSON(response);
                            if (res.status == 500) {
                                alert(res.message);
                            } else {
                                $('#this').load(location.href + " #this");
                            }
                        }
                    });
                }
            });
        </script>
</body>

</html>