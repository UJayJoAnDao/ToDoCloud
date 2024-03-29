<!DOCTYPE html>
<?php
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container"><h1>雲端待辦紀錄系統</h1></div>
    <form method="post" action="checkpwd.php" name="myform" class="myform">
            帳號: <input type="text" name = "username"><br>
            密碼: <input type="password" name = "passwd"><br>
            <input type = "button" value = "登入" onclick="checkdata()">
            <input type = "reset" value = "重新填寫">
            <input type="button" value="我要註冊" onclick="signup_form()">
    </form>
    <script src="index.js"></script>
</body>
</html>