<?php
    $localhost = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'curd_api';

    $conn = mysqli_connect($localhost, $username, $password, $database);
    if(!$conn){
        die(mysqli_error($conn));
    }
?>