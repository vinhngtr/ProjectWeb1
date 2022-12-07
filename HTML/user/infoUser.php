<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="..\..\CSS\infoUser.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600&display=swap" rel="stylesheet">
    <title>Thông tin tài khoản</title>
</head>
<body>
    <div class="container">
        <h2 class="header">
            Thông tin tài khoản
        </h2>
        <div class="mainBody">
            <div class="nameUser">
                <h4>Họ & tên người dùng: </h4>
                <span><?php echo $_SESSION['name']?></span>
            </div>
            <hr>
            <div class="numberPhone">
                <h4>Số điện thoại: </h4>
                <span><?php echo $_SESSION['phone']?></span>
            </div>
            <hr>
            <div class="email">
                <h4>Email: </h4>
                <span><?php echo $_SESSION['email']?></span>
            </div>
            <hr>
            <div class="address">
                <h4>Địa chỉ: </h4>
                <span><?php echo $_SESSION['address']?></span>
            </div>
            <hr>
            <div class="uppdateInfor">
                <a href="editInformation.php">Cập nhật thông tin</a>
            </div>
        </div>
    </div>
    
</body>
</html>