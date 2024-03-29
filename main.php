<!DOCTYPE html>
<?php
    include("db_connect.php");
    $database = "todolist";
    $db_select = mysqli_select_db($conn,$database) or die("資料庫選擇失敗");

    // $file_name = $_SERVER["PHP_SELF"];
    session_start();
    if(isset($_COOKIE["passed"])and $_COOKIE["passed"]==true){
        // $_SESSION["time"]=time()+10;
    }else{
        echo("別作弊!!");
        header("Refresh:3;url=index.php");
        exit();
    }
    if(isset($_GET["logout"]) and $_GET["logout"]==true){
        unset($_SESSION["user"]);
        unset($_SESSION["id"]);
        unset($_SESSION["time"]);
        unset($_COOKIE["passed"]);
        // echo("main.php");
    }
?>
<?php
    function dele($thisID){
        
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>雲端待辦紀錄</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php
        
        if($_SESSION["time"]<=time()){
            unset($_COOKIE["passed"]);
            session_unset();
            header("Location:index.php");
        }else{
            
            $_SESSION["time"] = time()+60;
            // echo("加秒".$_SESSION["time"]);
        }
        if(isset($_SESSION["id"])){
            $id = (int)$_SESSION['id'];
            if(isset($_GET['page'])){
                $page = $_GET['page'];
                if($page=="done"){
                    $sql_str = "SELECT * FROM `todo` WHERE `account_id` = $id and `complete`= 1 ORDER BY `order_id`";
                }
            }else{
                $page ="none";
                $sql_str = "SELECT * FROM `todo` WHERE `account_id` = $id and `complete`= 0 ORDER BY `order_id`";
            }
            $res = mysqli_query($conn,$sql_str) or die("SQL語法錯誤");
        
    ?>
    <!-- <input type="button" value="新增" onclick="addtodo()"> -->
    
    <?php
        if($page!="done"){
    ?>
    <a href="#" class="addbutton" onclick="addtodo()">+</a>
    <a href="#" class="combutton" onclick="completepage()">✔</a>
    <?php
        }else{
    ?>
    <a href="#" class="backbutton" onclick="backpage()">X</a>
    <?php
        }
    ?>

    <div class="container"><h1>雲端待辦紀錄系統</h1><span class="acc"><?= $_SESSION["user"]?>，您好! <a href="main.php?logout=true">登出</a></span></div>
    
    
    <span id="updateform_span"></span>
    <table>
        <tr class="th">
            <th style='display: none;'>清單編號</th>
            <th>編號</th>
            <th style="width: 85%;">事項</th>
            <th style="width: 12.5%;">功能</th>
        </tr>
        <?php
            $i = 1;
            while($todolist = mysqli_fetch_assoc($res)){
                if($i%2==0){
                    echo "<tr>";
                }else{
                    echo "<tr class='lighted'>";
                }
                echo "<td style='display: none;'>".$todolist["todo_id"]."</td>";
                echo "<td>".$i."</td>";
                echo "<td class='content'>".$todolist["content"]."</td>";
                echo "";
                if($page!="done"){
        ?>
            <td><a href="#" id="<?=$todolist["todo_id"]?>" onclick="updateform(this.id)">修改</a>
                <a href="complete.php?id=<?=$todolist["todo_id"]?>" id="<?=$todolist["todo_id"]?>">完成</a>
                <a href="delete.php?id=<?=$todolist["todo_id"]?>" id="<?=$todolist["todo_id"]?>">刪除</a>
            </td>
        </tr>
        
        <?php
                }
                $i+=1;
            }
        ?>
      
    </table>
        <?php
            }
        ?>
    <span id="addcol"></span>
    <script src="main.js"></script>
</body>
</html>