<?php
session_start();
//check connection 
$id = $_SESSION['id'];
$conn = mysqli_connect('localhost', 'nhatthien', '12345', 'btl');

//check connection 
if (!$conn) {
    echo 'Connection failed: ' . mysqli_connect_error();
}

$sql = "SELECT * FROM accounts WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_POST['submit'])) {
    if ($user[0]['password'] == $_POST['oldPassword']) {
        $newPassword = $_POST['newPassword'];
        $sql = "UPDATE accounts set password = '$newPassword' WHERE id = '$id'";
        if (mysqli_query($conn, $sql)) {
            //success
            echo '<script>';
            echo 'alert("Bạn đã thay đổi mật khẩu thành công")';
            echo '</script>';
            header('Location: ../index.php');
        } else {
            //error
            echo "query error: " . mysqli_error($conn);
        }
    } else {
        echo 'Bạn đã nhập sai mật khẩu, vui lòng thử lại';
    }
}
mysqli_free_result($result);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <form class="container" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <div class="card">
            <div class="card-header h5">
                Change Password!!
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nhập mật khẩu cũ</label>
                    <input type="password" class="form-control" name="oldPassword">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nhập mật khẩu mới</label>
                    <input type="password" class="form-control" name="newPassword">
                </div>
                <input class="btn btn-primary" type="submit" name="submit" value="submit">
            </div>
        </div>
    </form>
</body>

</html>