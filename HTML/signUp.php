<?php
// connect to DB
$conn = mysqli_connect('localhost', 'nhatthien', '12345', 'btl');

//check connection 
if (!$conn) {
    echo 'Connection failed: ' . mysqli_connect_error();
}
$error = '';
$errorClass = 'd-none';
// define variables and set to empty values
// $firstNameErr = $lastNameErr = $emailErr = $passwordErr = $genderErr  = "";

$firstName = $lastName = $email = $password = $gender = $address = $phone = $birthday = "";


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
    } else if (empty($_POST["password"])) {
        $error = "Password is required";
        $errorClass = '';
    } else if (empty($_POST["gender"])) {
        $error = "Gender is required";
        $errorClass = '';
    } else if (empty($_POST["birthday"])) {
        $error = "Birthday is required";
        $errorClass = '';
    } else if (empty($_POST["address"])) {
        $error = "Address is required";
        $errorClass = '';
    } else if (empty($_POST["phone"])) {
        $error = "Phone is required";
        $errorClass = '';
    } else {
        //create sql
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
        $gender =  $_POST['gender'];
        $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $sql = "INSERT INTO accounts ( firstName, lastName, email, password, gender, birthday, address, phone) VALUES('$firstName', '$lastName', '$email', '$password', '$gender', '$birthday', '$address', '$phone')";
        //save database and check
        if (mysqli_query($conn, $sql)) {
            //success
            echo "<script>alert('Complete!');</script>";
            header('Location: index.php');
        } else {
            //error
            echo "query error: " . mysqli_error($conn);
        }
    }
}
//Reset
function resetForm()
{
    $firstName = $lastName = $email = $password = $gender = $address = $phone = $birthday = "";
}
if (isset($_POST['reset'])) {
    resetForm();
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
    <title>Sign Up</title>
</head>

<body>
    <div class="navbar-brand h3 d-flex justify-content-center mt-3">Đăng ký</div>
    <div class="container bg-light p-3 mt-3" style="max-width: 500px">
        <form method="post" action="signUp.php">
            <div id="errorMessage" class="alert alert-warning <?php echo $errorClass ?>"><?php echo $error ?></div>
            <!-- Name -->
            <div class="mb-3">
                <label class="form-label">Họ</label>
                <input type="text" class="form-control" name="firstName" placeholder="First Name">
            </div>
            <div class="mb-3">
                <label class="form-label">Tên</label>
                <input type="text" class="form-control" name="lastName" placeholder="Last Name">
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Email" aria-describedby="emailHelp">
            </div>
            <!-- Password -->
            <div class="mb-3">
                <label class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" placeholder="Password" name="password">
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
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="other" value="other" />
                        <label class="form-check-label" for="other">Other</label>
                    </div>
                </div>
            </fieldset>
            <!-- Birthday -->
            <div class="mb-3">
                <label for="">Sinh nhật:</label>
                <input type="date" name="birthday" id="birthday" class="form-control" />
            </div>
            <!-- Address & Phone number -->
            <div class="mb-3">
                <label for="">Địa chỉ</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Address" />
            </div>
            <div class="mb-3">
                <label for="">Số điện thoại</label>
                <input type="number" name="phone" id="phone" class="form-control" placeholder="Phone number" />
            </div>
            <!-- button -->
            <div class="row mt-5">
                <div class="d-grid gap-2 col-6 mx-auto">
                    <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <input class="btn btn-primary" type="submit" name="reset" value="Reset">
                </div>
            </div>
        </form>
    </div>
</body>

</html>