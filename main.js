function updateform(id){
    var td = document.getElementById(id).parentElement.parentElement.children;
    var tr = document.getElementById(id).parentElement.parentElement;
    var form_span = document.getElementById("updateform_span");
    // alert(td[0].innerHTML);
    // alert(td[1].innerHTML);
    
    // console.log(tr.innerHTML);
    var form = "<form action='update.php' method='post' id='updateform'></form>";
    var forminput =//第一個td傳送需修改列id//第二個td是給使用者看當前的排序，並非實際todo_id
        "<td style='display:none;'><input type='text' name='updateid' id='' size='10' value='"+td[0].innerHTML+"' form='updateform'></td>"+
        "<td><input type='text' name='feildid' id='updateinput' maxlength='3' size='2' readonly='readonly' value='"+td[1].innerHTML+"'></td>"+
        "<td style='width:85%;'><input type='text' name='upcontent' id='updateinput' size='10' value='"+td[2].innerHTML+"' form='updateform'></td>"+
        "<td><a href='#' onclick='updatetodo()'>確認</a> <a href='#' onclick='"+"javascript:window.location.href="+"\"main.php\""+"'>返回</a></td>";
    form_span.innerHTML = form;

    tr.innerHTML = forminput;
}
function addtodo(){
    var new_content = prompt("請輸入待辦事項");
    if(new_content==null)exit();//取消
    if(new_content.length==0){alert("不可以空字串!");exit();}
    // alert("111");
    document.getElementById("addcol").innerHTML =
    '<form action="add.php" method="post" name="addform"style="display:none;">'+
    '事項:<input type="text" name="newTodo" value="'+new_content+'">'+
        // '<input type="submit" value="新增">'+
    '</form>';
    document.addform.submit();
    // // alert("123");
}
function updatetodo(){
    //按下確認鍵執行此函式
    // alert("更新");
    document.getElementById("updateform").submit();
}
function completepage(){
    window.location.href="main.php?page=done";
}
function backpage(){
    window.location.href="main.php";
}