<?php

require 'dbcon.php';
//User

if (isset($_POST['save_user'])) {
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $gender =  isset($_POST['gender']) ? $_POST['gender'] : null;
    $is_admin =  isset($_POST['is_admin']) ? $_POST['is_admin'] : null;
    $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (
        $firstName == NULL || $lastName == NULL || $email == NULL || $password == NULL || $gender == NULL
        || $phone == NULL || $address == NULL || $is_admin == NULL
    ) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
    $sql = "INSERT INTO accounts ( firstName, lastName, email, password, gender, is_admin, phone, address, birthday) VALUES('$firstName', '$lastName', '$email', '$password', '$gender', '$is_admin', '$phone', '$address', '$birthday')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $res = [
            'status' => 200,
            'message' => 'User Updated Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'User Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}
if (isset($_POST['update_user'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $gender =  isset($_POST['gender']) ? $_POST['gender'] : null;
    $is_admin =  isset($_POST['is_admin']) ? $_POST['is_admin'] : null;
    $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if ($firstName == NULL || $lastName == NULL || $email == NULL || $gender == NULL || $address == NULL || $phone == NULL || $birthday == NULL || $is_admin == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE accounts SET firstName='$firstName', lastName='$lastName', email='$email',
                gender='$gender', birthday = '$birthday', address = '$address', phone = '$phone',
                is_admin = '$is_admin'
                WHERE id='$user_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'User Updated Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'User Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}
if (isset($_GET['user_id'])) {
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

    $query = "SELECT * FROM accounts WHERE id='$user_id'";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $user = mysqli_fetch_array($query_run);
        $res = [
            'status' => 200,
            'message' => 'User Fetch Successfully by id',
            'data' => $user
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'User Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}
if (isset($_POST['delete_user'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

    $query = "DELETE FROM accounts WHERE id='$user_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'User Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'User Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

//Product
if (isset($_POST['save_product'])) {
    $pro_name = mysqli_real_escape_string($conn, $_POST['pro_name']);
    $categoryKind = mysqli_real_escape_string($conn, $_POST['categoryKind']);
    $gender =  isset($_POST['gender']) ? $_POST['gender'] : null;
    $price_buy = mysqli_real_escape_string($conn, $_POST['price_buy']);
    $price_sell = mysqli_real_escape_string($conn, $_POST['price_sell']);
    $sell_percent = mysqli_real_escape_string($conn, $_POST['sell_percent']);
    $sell_percent = mysqli_real_escape_string($conn, $_POST['sell_percent']);
    $pro_description = mysqli_real_escape_string($conn, $_POST['pro_description']);
    $image = $_POST['image'];
    if ($pro_name == NULL || $categoryKind == NULL || $gender == NULL || $price_buy == NULL || $price_sell == NULL || $sell_percent == NULL || $pro_description == NULL || $image == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
    $sql = "INSERT INTO products ( pro_name, categoryKind,forGender, price_buy, price_sell, sell_percent,pro_description, image) VALUES ( '$pro_name', '$categoryKind','$gender', '$price_buy', '$price_sell', '$sell_percent','$pro_description', '$image')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $res = [
            'status' => 200,
            'message' => 'Product Updated Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Product Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['delete_product'])) {
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);

    $query = "DELETE FROM products WHERE pro_id='$product_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Product Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Product Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['update_product'])) {
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);

    $pro_name = mysqli_real_escape_string($conn, $_POST['pro_name']);
    $categoryKind = mysqli_real_escape_string($conn, $_POST['categoryKind']);
    $gender =  isset($_POST['gender']) ? $_POST['gender'] : null;
    $price_buy = mysqli_real_escape_string($conn, $_POST['price_buy']);
    $price_sell = mysqli_real_escape_string($conn, $_POST['price_sell']);
    $sell_percent = mysqli_real_escape_string($conn, $_POST['sell_percent']);
    $sell_percent = mysqli_real_escape_string($conn, $_POST['sell_percent']);
    $pro_description = mysqli_real_escape_string($conn, $_POST['pro_description']);
    $image = $_POST['image'];

    if ($pro_name == NULL || $categoryKind == NULL || $gender == NULL || $price_buy == NULL || $price_sell == NULL || $sell_percent == NULL || $pro_description == NULL || $image == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE products SET pro_name='$pro_name', categoryKind='$categoryKind',forGender = '$gender', 
    price_buy = '$price_buy', price_sell = '$price_sell', sell_percent = '$sell_percent', 
    pro_description = '$pro_description', image = '$image'
                WHERE pro_id='$product_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Product Updated Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Product Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}
if (isset($_GET['product_id'])) {
    $product_id = mysqli_real_escape_string($conn, $_GET['product_id']);

    $query = "SELECT * FROM products WHERE pro_id='$product_id'";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $product = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Product Fetch Successfully by id',
            'data' => $product
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Product Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

// Order
if (isset($_POST['delete_order'])) {
    $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);

    $query = "DELETE FROM orders WHERE order_id='$order_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Order Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Order Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_GET['order_id'])) {
    $order_id = mysqli_real_escape_string($conn, $_GET['order_id']);

    $query = "SELECT * FROM orders WHERE order_id='$order_id'";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $order = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Order Fetch Successfully by id',
            'data' => $order
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Order Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

// Comments
if (isset($_POST['delete_comment'])) {
    $comment_id = mysqli_real_escape_string($conn, $_POST['comment_id']);

    $query = "DELETE FROM comments WHERE cmt_id='$comment_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Comment Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Comment Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

// Reply
if (isset($_POST['delete_reply'])) {
    $reply_id = mysqli_real_escape_string($conn, $_POST['id']);

    $query = "DELETE FROM replies WHERE id='$reply_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Reply Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Reply Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

