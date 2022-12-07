<?php
session_start();
$conn = mysqli_connect('localhost', 'nhatthien', '12345', 'btl');
$error = '';
$errorClass = 'd-none';

//check connection 
if (!$conn) {
    echo 'Connection failed: ' . mysqli_connect_error();
}

if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    header('Location: index.php');
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT id ,firstName, lastName, phone, address,email, password, is_admin FROM accounts WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (empty($users)) {
        $error = "Can not find email";
        $errorClass = '';
    } else {
        foreach ($users as $user) {
            if ($user['password'] == $password) {
                if ($user['is_admin'] == true) {
                    $_SESSION['email']  = $user['email'];
                    $_SESSION['name']  = $user['firstName'] . ' ' . $user['lastName'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['phone'] = $user['phone'];
                    $_SESSION['address'] = $user['address'];
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['is_admin'] = $user['is_admin'];
                    header('Location: admin/index.php');
                } else {
                    $_SESSION['name']  = $user['firstName'] . ' ' . $user['lastName'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['phone'] = $user['phone'];
                    $_SESSION['address'] = $user['address'];
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['is_admin'] = $user['is_admin'];
                    // echo $user['id'];
                    header('Location: index.php');
                }
            }
        }
        $error = 'Your password is incorrect';
        $errorClass = '';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            background-image: linear-gradient(to right, rgb(154, 201, 154), rgb(125, 125, 51));
        }
    </style>
    <title>Document</title>
</head>

<body>
    <form class="container" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" style="max-width: 500px;">
        <div class="card mt-5 shadow p-3 mb-5 bg-white rounded">
            <div class="card-header h5 text-primary">
                Đăng nhập
            </div>
            <div class="card-body">
                <div id="errorMessage" class="alert alert-warning <?php echo $errorClass ?>"><?php echo $error ?></div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <input class="btn btn-primary" type="submit" name="submit" value="Sign In">
            </div>
        </div>
    </form>
</body>

</html>