<?php
//check connection 
$conn = mysqli_connect('localhost', 'trongvinh', 'vinhtrong782002', 'shopFashion');
//check connection 
if (!$conn) {
    echo 'Connection failed: ' . mysqli_connect_error();
}
