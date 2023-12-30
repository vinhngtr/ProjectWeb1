<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Product Manager</title>
</head>

<body>
    <?php if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) { ?>
        <div class="alert alert-danger text-center" role="alert">
            You don't have permission
        </div>
        <a href="../index.php" class="btn btn-primary">Return to homepage</a>
    <?php } else { ?>
        <nav class="navbar navbar-light" style="background-color: #cbe7fb;">
            <span class="navbar-brand mb-0 h1 ms-3">Hello <?php echo $_SESSION['name']; ?> </span>
            <a href="logout.php" class="nav-link link-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                </svg>
            </a>
        </nav>
        <!--  -->
        <div class="d-flex">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 260px; background-color: #e3f2fd;">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link link-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house me-2" viewBox="0 0 16 16">
                                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="account.php" class="nav-link link-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person me-2" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                            </svg>
                            Quản lý accounts
                        </a>
                    </li>
                    <li>
                        <a href="product.php" class="nav-link active" aria-current="page">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
                                <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z" />
                                <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z" />
                            </svg>
                            Quản lý sản phẩm
                        </a>
                    </li>
                    <li>
                        <a href="order.php" class="nav-link link-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                            </svg>
                            Quản lý đơn hàng
                        </a>
                    </li>
                    <li>
                        <a href="comment.php" class="nav-link link-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                                <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z" />
                            </svg>
                            Quản lý bình luận
                        </a>
                    </li>
                    <li>
                        <a href="reply.php" class="nav-link link-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-square-text" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                            </svg>
                            Quản lý phản hồi
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="http://cdn.onlinewebfonts.com/svg/img_325798.png" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>Admin</strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        <li><a class="dropdown-item" href="editInformation.php">Sửa thông tin</a></li>
                        <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                    </ul>
                </div>
            </div>
            <!-- Add Modal -->
            <div class="modal fade" id="productAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="saveProduct">
                            <div class="modal-body">
                                <div id="errorMessage" class="alert alert-warning d-none"></div>
                                <!-- Name -->
                                <div class="mb-3">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="pro_name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Loại sản phẩm</label>
                                    <!-- <input type="text" class="form-control" name="categoryKind"> -->
                                    <select id="kind" name="categoryKind" class="form-control" required>
                                        <option name="categoryKind" value="quan">Quần</option>
                                        <option name="categoryKind" value="ao">Áo</option>
                                        <option name="categoryKind" value="giay">Giày</option>
                                        <option name="categoryKind" value="dep">Dép</option>
                                        <option name="categoryKind" value="mu">Mũ</option>
                                        <option name="categoryKind" value="non">Nón</option>
                                        <option name="categoryKind" value="balo">Balô</option>
                                    </select>
                                </div>
                                <!-- Gender -->
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Gender: </legend>
                                    <div class="col-sm-10" id="gender">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" />
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="female" value="female" />
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                    </div>
                                </fieldset>
                                <!-- Price Buy -->
                                <div class="mb-3">
                                    <label class="form-label">Giá nhập</label>
                                    <input type="number" class="form-control" name="price_buy" aria-describedby="emailHelp">
                                </div>
                                <!-- Price Sell -->
                                <div class="mb-3">
                                    <label class="form-label">Giá bán</label>
                                    <input type="number" class="form-control" name="price_sell">
                                </div>
                                <!-- Price Sell -->
                                <div class="mb-3">
                                    <label class="form-label">Giảm giá</label>
                                    <input type="number" class="form-control" name="sell_percent">
                                </div>
                                <!-- Description -->
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a description" name="pro_description"></textarea>
                                    <label for="floatingTextarea">Description</label>
                                </div>
                                <!-- Hình ảnh -->
                                <div class="mb-3">
                                    <label class="form-label">Link hình ảnh</label>
                                    <input type="url" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Edit Product Modal -->
            <div class="modal fade" id="productEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="updateProduct">
                            <div class="modal-body">

                                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                                <input type="hidden" name="product_id" id="product_id">

                                <!-- Name -->
                                <div class="mb-3">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="pro_name" id="pro_name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Loại sản phẩm</label>
                                    <input type="text" class="form-control" name="categoryKind" id="categoryKind">
                                </div>
                                <!-- Gender -->
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Gender: </legend>
                                    <div class="col-sm-10" id="gender">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" />
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="female" value="female" />
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                    </div>
                                </fieldset>
                                <!-- Price Buy -->
                                <div class="mb-3">
                                    <label class="form-label">Giá nhập</label>
                                    <input type="number" class="form-control" name="price_buy" id="price_buy" aria-describedby="emailHelp">
                                </div>
                                <!-- Price Sell -->
                                <div class="mb-3">
                                    <label class="form-label">Giá bán</label>
                                    <input type="number" class="form-control" name="price_sell" id="price_sell">
                                </div>
                                <!-- Price Sell -->
                                <div class="mb-3">
                                    <label class="form-label">Giảm giá</label>
                                    <input type="number" class="form-control" name="sell_percent" id="sell_percent">
                                </div>
                                <!-- Description -->
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a description" name="pro_description" id="pro_description"></textarea>
                                    <label for="floatingTextarea">Description</label>
                                </div>
                                <!-- Hình ảnh -->
                                <div class="mb-3">
                                    <label class="form-label">Link hình ảnh</label>
                                    <input type="url" class="form-control" name="image" id="image">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- View Product Modal -->
            <div class="modal fade" id="productViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">View Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="">Product Id</label>
                                <p id="view_proID" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">Tên sản phẩm</label>
                                <p id="view_name" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">Cho giới tính</label>
                                <p id="view_gender" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">Giá sản phẩm</label>
                                <p id="view_price" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">Giá nhập</label>
                                <p id="view_priceBuy" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">Giảm giá</label>
                                <p id="view_sale" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">Được tạo lúc</label>
                                <p id="view_createdAt" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <a href="" id="view_image">Link hình ảnh</a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header mt-3">
                                <div class="h4 text-primary">Manage Product!!!</div>
                                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#productAddModal">
                                    Add Product
                                </button>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th style="width: 50% !important">Tên sản phẩm</th>
                                            <th>Cho giới tính</th>
                                            <th>Giá nhập</th>
                                            <th>Giá bán</th>
                                            <th>Giảm giá</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require 'dbcon.php';

                                        $sql = "SELECT * FROM products";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $product) {
                                        ?>
                                                <tr>
                                                    <td><?= $product['pro_id'] ?></td>
                                                    <td><?= $product['pro_name'] ?></td>
                                                    <td><?= $product['forGender'] ?></td>
                                                    <td><?= $product['price_buy'] ?></td>
                                                    <td><?= $product['price_sell'] ?></td>
                                                    <td><?= $product['sell_percent'] ?></td>
                                                    <td>
                                                        <button type="button" value="<?= $product['pro_id']; ?>" class="viewProductBtn btn btn-info btn-sm">View</button>
                                                        <button type="button" value="<?= $product['pro_id']; ?>" class="editProductBtn btn btn-success btn-sm">Edit</button>
                                                        <button type="button" value="<?= $product['pro_id']; ?>" class="deleteProductBtn btn btn-danger btn-sm">Delete</button>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"> </script>
        <script>
            $(document).on('submit', '#saveProduct', function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                formData.append("save_product", true);
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        var res = jQuery.parseJSON(response);
                        if (res.status == 422) {
                            $('#errorMessage').removeClass('d-none');
                            $('#errorMessage').text(res.message);
                        } else if (res.status == 200) {
                            $('#errorMessage').addClass('d-none');
                            $('#productAddModal').modal('hide');
                            $('#saveProduct')[0].reset();
                            $('#myTable').load(location.href + " #myTable");
                        }
                    }
                })
            });
            $(document).on('click', '.editProductBtn', function() {

                var product_id = $(this).val();

                $.ajax({
                    type: "GET",
                    url: "code.php?product_id=" + product_id,
                    success: function(response) {

                        var res = jQuery.parseJSON(response);
                        if (res.status == 404) {

                            alert(res.message);
                        } else if (res.status == 200) {
                            console.log(res.data);
                            $('#product_id').val(res.data.pro_id);
                            $('#pro_name').val(res.data.pro_name);
                            $('#categoryKind').val(res.data.categoryKind);
                            $('#forGender').val(res.data.gender);
                            $('#price_buy').val(res.data.price_buy);
                            $('#price_sell').val(res.data.price_sell);
                            $('#sell_percent').val(res.data.sell_percent);
                            $('#pro_description').val(res.data.pro_description);
                            $('#image').val(res.data.image);
                            $('#productEditModal').modal('show');
                        }

                    }
                });

            });

            $(document).on('submit', '#updateProduct', function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                formData.append("update_product", true);

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

                            $('#productEditModal').modal('hide');
                            $('#updateProduct')[0].reset();

                            $('#myTable').load(location.href + " #myTable");

                        } else if (res.status == 500) {
                            alert(res.message);
                        }
                    }
                });
            });
            $(document).on('click', '.viewProductBtn', function() {

                var product_id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "code.php?product_id=" + product_id,
                    success: function(response) {
                        var res = jQuery.parseJSON(response);
                        if (res.status == 404) {
                            alert(res.message);
                        } else if (res.status == 200) {
                            $('#view_proID').text(res.data.pro_id);
                            $('#view_name').text(res.data.pro_name);
                            $('#view_gender').text(res.data.forGender);
                            $('#view_price').text(res.data.price_sell);
                            $('#view_priceBuy').text(res.data.price_buy);
                            $('#view_quantify').text(res.data.pro_quantify);
                            $('#view_sale').text(res.data.sell_percent + '%');
                            $('#view_createdAt').text(res.data.created_at);
                            $('#view_image').prop("href", res.data.image);
                            $('#productViewModal').modal('show');
                        }
                    }
                });
            });
            $(document).on('click', '.deleteProductBtn', function(e) {
                e.preventDefault();

                if (confirm('Are you sure you want to delete this data?')) {
                    var product_id = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "code.php",
                        data: {
                            'delete_product': true,
                            'product_id': product_id
                        },
                        success: function(response) {

                            var res = jQuery.parseJSON(response);
                            if (res.status == 500) {

                                alert(res.message);
                            } else {
                                $('#myTable').load(location.href + " #myTable");
                            }
                        }
                    });
                }
            });
        </script>
    <?php } ?>

</body>

</html>