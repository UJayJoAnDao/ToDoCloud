<?php
    include("db_connect.php");
    $database = "todolist";
    mysqli_select_db($conn,$database);

    $com_todoid = $_GET["id"];
    $sql_str = "UPDATE `todo` SET `complete`= 1 where `todo_id`= '$com_todoid'";
    $res = mysqli_query($conn,$sql_str) or die("完成發生失敗");
    echo("<script>alert('已完成');</script>");
    header("Refresh:0;url=main.php");
?>