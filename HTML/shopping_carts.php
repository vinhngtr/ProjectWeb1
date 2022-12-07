<?php
session_start();
$conn = mysqli_connect('localhost', 'nhatthien', '12345', 'btl');

//check connection 
if (!$conn) {
    echo 'Connection failed: ' . mysqli_connect_error();
}
if (isset($_POST['submit'])) {
    foreach ($_SESSION['cart'] as $cart) {
        $pro_id =  $cart['id'];
        $pro_name = $cart['name'];
        $pro_price = $cart['price'];
        $pro_quantify = $cart['quantify'];
        $pro_sale = $cart['sale'];
        $pro_size = $cart['size'];
        $pro_color = $cart['color'];
        $account_id = $_SESSION['id'];
        $sql = "INSERT INTO orders (pro_id, pro_name,user_id, pro_price, pro_quantify, pro_sale, pro_size, pro_color) VALUES('$pro_id', '$pro_name','$account_id', '$pro_price', '$pro_quantify', '$pro_sale', '$pro_size', '$pro_color')";
        $result = mysqli_query($conn, $sql);
        unset($_SESSION['cart']);
    }
}
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $index => $cart) {
            if ($cart['id'] == $_GET['id']) {
                unset($_SESSION['cart'][$index]);
                header('Location: shopping_carts.php');
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .card-registration .select-arrow {
            top: 13px;
        }

        .bg-grey {
            background-color: #eae8e8;
        }

        .card-registration-2 .bg-grey {
            border-top-right-radius: 16px;
            border-bottom-right-radius: 16px;
        }

        .card-registration-2 .bg-grey {
            border-bottom-left-radius: 16px;
            border-bottom-right-radius: 16px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<?php if (!isset($_SESSION['is_admin']) || !($_SESSION['is_admin'] == 0)) { ?>

    <body>
        <div class="alert alert-danger text-center" role="alert">
            You don't have permission !!!
        </div>
        <a href="./index.php">Return to homepage</a>
    </body>
<?php } else { ?>

    <body style="background-color: #d2c9ff;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <?php if (!empty($_SESSION['cart'])) { ?>
                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                                <h6 class="mb-0 text-muted"><?php echo count($_SESSION['cart']) ?> sản phẩm</h6>
                                            </div>
                                            <hr class="my-4">
                                            <!-- Item -->
                                            <?php $total = 0; ?>
                                            <?php foreach ($_SESSION['cart'] as $index => $cart) { ?>
                                                <?php $total  += $cart['price'] * $cart['quantify']; ?>
                                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <img src="<?php echo $cart['image'] ?>" class="img-fluid rounded-3" alt="">
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                        <h6 class="text-black mb-0"><?php echo $cart['name'] ?></h6>
                                                    </div>
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <h6 class="text-muted"><?php echo $cart['size'] ?></h6>
                                                        <h6 class="text-muted"><?php echo $cart['color'] ?></h6>
                                                    </div>
                                                    <div class="col-md-2 col-lg-2 col-xl-1 d-flex">
                                                        <p id="" class="form-control form-control-sm mt-3"><?php echo $cart['quantify'] ?></p>
                                                    </div>
                                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                        <h6 class="mb-0"><?php echo $cart['price'] ?> đ</h6>
                                                    </div>
                                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                        <a href="shopping_carts.php?action=remove&id= <?php echo $cart['id'] ?>" class="text-danger">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <hr class="my-4">
                                        <?php } else { ?>
                                            <div class="h3">Bạn không có đơn hàng nào</div>
                                        <?php } ?>

                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="index.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <?php if (!empty($_SESSION['cart'])) { ?>
                                    <div class="col-lg-4 bg-grey">
                                        <div class="p-5">
                                            <h3 class="fw-bold mb-5 mt-2 pt-1">Tóm tắt</h3>
                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-4">
                                                <h5 class="text-uppercase">Tổng thanh toán</h5>
                                                <h5><?php echo $total ?> đ</h5>
                                            </div>

                                            <h5 class="text-uppercase mb-3">Shipping</h5>

                                            <div class="d-flex justify-content-between mb-4">
                                                <select class="select">
                                                    <option value="1">Thanh toán khi giao hàng</option>
                                                </select>
                                                <span class="fw-bold">
                                                    15.000 đ
                                                </span>
                                            </div>

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-4">
                                                <h5 class="text-uppercase">Tổng thanh toán</h5>
                                                <h5><?php echo ($total + 15000) ?> đ </h5>
                                            </div>
                                            <form method='post'>
                                                <input type='submit' name='submit' class='"btn btn-dark btn-block btn-lg' value='Đặt hàng'>
                                            </form>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
<?php } ?>
</html>