<?php
// connect to DB
session_start();


$conn = mysqli_connect('localhost', 'nhatthien', '12345', 'btl');

//check connection 
if (!$conn) {
    echo 'Connection failed: ' . mysqli_connect_error();
}
$error = '';
$errorClass = 'd-none';

$firstName = $lastName = $email = $password = $gender = $password = $phone = $birthday = "";

if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    $query = "SELECT * FROM accounts WHERE id='$user_id'";
    $query_run = mysqli_query($conn, $query);
    $users = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
    $view_firstName = $users[0]['firstName'];
    $view_lastName = $users[0]['lastName'];
    $view_email = $users[0]['email'];
    $view_phone = $users[0]['phone'];
    $view_password = $users[0]['password'];
    $view_birthday = $users[0]['birthday'];
}
if (isset($_POST['submit'])) {
    //First Name

    if (empty($_POST["firstName"])) {
        $error = "First name is required";
        $errorClass = '';
    } else if (empty($_POST["lastName"])) {
        $error = "Last name is required";
        $errorClass = '';
    } else if (empty($_POST["email"])) {
        $error = "Email is required";
        $errorClass = '';
    } else if (empty($_POST["birthday"])) {
        $error = "Birthday is required";
        $errorClass = '';
    } else if (empty($_POST["password"])) {
        $error = "Password is required";
        $errorClass = '';
    } else if (empty($_POST["phone"])) {
        $error = "Phone is required";
        $errorClass = '';
    } else {
        //create sql
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
        $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $sql = "UPDATE accounts SET firstName='$firstName', lastName='$lastName', email='$email',
         birthday = '$birthday', password = '$password', phone = '$phone'
                WHERE id='$user_id'";
        $result = mysqli_query($conn, $sql);
        //save database and check
        if (mysqli_query($conn, $sql)) {
            //success
            echo "<script>alert('Complete!');</script>";
            // sleep(1000);
            header('Location: logout.php');
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit Information</title>
</head>

<body>
    <div class="navbar-brand h3 d-flex justify-content-center text-primary">Cập nhật thông tin cá nhân</div>
    <div class="container bg-light p-3 position-relative" style="max-width: 500px">
        <form method="post" action="editInformation.php">
            <div id="errorMessage" class="alert alert-warning <?php echo $errorClass ?>"><?php echo $error ?></div>
            <!-- Name -->
            <div class="mb-3">
                <label class="form-label">Họ</label>
                <input type="text" class="form-control" name="firstName" value="<?php echo $view_firstName ?>" placeholder="First Name">
            </div>
            <div class="mb-3">
                <label class="form-label">Tên</label>
                <input type="text" class="form-control" name="lastName" value="<?php echo $view_lastName ?>" placeholder="Last Name">
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label class="form-label" for="email">Email address</label>
                <input type="email" class="form-control" name="email" value="<?php echo $view_email ?>" placeholder="Email" aria-describedby="emailHelp">
            </div>
            <!-- Birthday -->
            <div class="mb-3">
                <label for="birthday">Sinh nhật:</label>
                <input type="date" name="birthday" id="birthday" value="<?php echo $view_birthday ?>" class="form-control" />
            </div>
            <!-- Password & Phone number -->
            <div class="mb-3">
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" id="password" class="form-control" value="<?php echo $view_password?>" />
            </div>
            <div class="mb-5">
                <label for="phone">Số điện thoại</label>
                <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone number" value="<?php echo $view_phone ?>" />
            </div>
            <!-- button -->
            <input class="btn btn-primary position-absolute bottom-0 start-50 translate-middle" type="submit" name="submit" value="Lưu thay đổi">
        </form>

    </div>
</body>

</html>