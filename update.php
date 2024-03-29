<?php
    include("db_connect.php");
    $database = "todolist";
    mysqli_select_db($conn,$database) or die("資料庫選擇失敗");

    $id = $_POST['updateid'];
    $content = $_POST['upcontent'];
    $id = mysqli_real_escape_string($conn,$id);
    $content = mysqli_real_escape_string($conn,$content);

    $sql_str = "UPDATE `todo` SET `content` = '$content' WHERE `todo_id` = '$id'";
    
    $res = mysqli_query($conn,$sql_str) or die("sql語法錯誤");
    echo("<script>alert('修改成功');</script>");
    // echo($id);
    // print_r($res);
    header("Refresh:0;url=main.php");
    // echo($id);
?>