<?php
    include("db_connect.php");
    $database = "todolist";
    mysqli_select_db($conn,$database);
    $del_todoid = $_GET["id"];
    $mysql_str = "DELETE FROM `todo` WHERE `todo_id`=$del_todoid ";
    $res = mysqli_query($conn,$mysql_str)or die("刪除失敗");
    echo("<script>alert('刪除成功');</script>");
    header("Refresh:0;url=main.php");
?>