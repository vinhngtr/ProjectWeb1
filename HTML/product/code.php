<?php

$conn = mysqli_connect('localhost', 'nhatthien', '12345', 'btl');

//check connection 
if (!$conn) {
    echo 'Connection failed: ' . mysqli_connect_error();
}

if (isset($_POST['update_comment'])) {
    $content = $_POST['cmt_content'];
    $cmt_id = mysqli_real_escape_string($conn, $_POST['comment_id']);
    // $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    // $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    // $gender =  isset($_POST['gender']) ? $_POST['gender'] : null;
    // $is_admin =  isset($_POST['is_admin']) ? $_POST['is_admin'] : null;
    // $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
    // $address = mysqli_real_escape_string($conn, $_POST['address']);
    // $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    // $email = mysqli_real_escape_string($conn, $_POST['email']);

    if ($content == NULL || $cmt_id == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE comments SET cmt_content ='$content'
                WHERE cmt_id='$cmt_id'";
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
if (isset($_GET['comment_id'])) {
    $comment_id = mysqli_real_escape_string($conn, $_GET['comment_id']);

    $query = "SELECT * FROM comments WHERE cmt_id='$comment_id'";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $comment = mysqli_fetch_array($query_run);
        $res = [
            'status' => 200,
            'message' => 'Comment Fetch Successfully by id',
            'data' => $comment
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Comment Id Not Found'
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

