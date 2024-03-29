<?php
    $user = $_POST['username'];
    $passwd = $_POST['passwd'];
    echo $user." ".$passwd;
    include("db_connect.php");
    $database = "todolist";
    mysqli_query($conn,"SET NAMES UTF8");
    $db_select = mysqli_select_db($conn,$database) or die("資料庫選擇失敗");

    $sql_str = "SELECT * FROM `account` where `name`= '$user'";
    $res = mysqli_query($conn,$sql_str);
    // print_r($res);
    while($array = mysqli_fetch_assoc($res)){
        $msg = "<script>alert('已經有此帳號!!');</script>";
        echo $msg;
        header("Refresh:0;url='index.php'");
        exit();
    }
    $sql_str = "INSERT INTO `account`(`name`,`password`) VALUES ('$user','$passwd')";
    $res = mysqli_query($conn,$sql_str)or die("註冊失敗");
    $msg = "<script>alert('註冊成功!!');</script>";
    echo $msg;
    header("Refresh:0;url='index.php'");
?>