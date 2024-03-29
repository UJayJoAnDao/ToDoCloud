<?php
    $user = $_POST['username'];
    $passwd = $_POST['passwd'];
    include("db_connect.php");
    //echo($user.$passwd);
    $database = "todolist";
    $db_select = mysqli_select_db($conn,$database) or die("資料庫選擇失敗");
    $sql_str = "SELECT * FROM `account` WHERE `name` = '$user' and `password` = '$passwd'";
    $res = mysqli_query($conn,$sql_str) or die("SQL語法錯誤");
    session_start();
    if($array = mysqli_fetch_assoc($res)){
        // echo("登入成功<br>");

        $_SESSION["id"] = $array["account_id"];
        $_SESSION["user"] = $array["name"];
        $_SESSION["time"] = time()+60;
        
        // setcookie("id",$array["account_id"]);
        setcookie("passed","TRUE");
        $msg ="<script>alert('登入成功!!');</script>";
        echo($msg);
        header("Refresh:0;url=main.php");
    }else{//查無資料(輸入錯誤或無此帳號)
        $msg ="<script>alert('輸入錯誤帳號密碼或是無此帳號!!');</script>";
        // echo("輸入錯誤帳號密碼或是無此帳號!!");
        echo($msg);
        header("Refresh:0;url=index.php");
        
    }
?>