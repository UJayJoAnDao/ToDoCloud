function signup_form(){
    var form_input =
        "帳號: <input type='text' name = 'username''><br>"+
        "密碼: <input type='text' name = 'passwd'><br>"+
        "<input type = 'button' value = '註冊' onclick='signup()'></input>";
    document.myform.innerHTML = form_input;
    document.myform.setAttribute('action','addmember.php');
}
function signup(){
    document.myform.submit();
}
function checkdata(){
    if(document.myform.username.value.length ==0){
        alert("記得輸入帳號!!");
        header("Refresh:1;url=index.php");
        // exit();
    }else{
        myform.submit();
    }
}