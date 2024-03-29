<?php
    session_start();
    $ncontent = $_POST['newTodo'];
    $account = $_SESSION['id'];
    include("db_connect.php");
    $database = "todolist";
    mysqli_query($conn,"SET NAMES UTF8");
    $db_select = mysqli_select_db($conn,$database) or die("資料庫選擇失敗");

    //為了讓新增的資料(order_id)會auto_increment------------
    $sql_str_order = "SELECT `order_id` FROM `todo` WHERE `account_id`='$account' ORDER BY `order_id` desc";
    $temp_res = mysqli_query($conn,$sql_str_order) or die("降序指令錯誤");
    $temp_res = mysqli_fetch_assoc($temp_res);
    // print_r($temp_res);
    $last_order = $temp_res["order_id"]+ 1;
    // echo("$last_order");

    // insert value的變數必須用單引號刮起來-----------------
    $sql_str = "INSERT INTO `todo`( `content`, `account_id`,`order_id`) VALUES ( '$ncontent', '$account','$last_order')";
    $res = mysqli_query( $conn, $sql_str) or die("sql語法錯誤");
    // echo($account);
    // echo($ncontent);
    echo("<script>alert('新增成功');</script>");
    header("Refresh:0;url=main.php");
?>