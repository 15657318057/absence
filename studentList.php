<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <title>学生管理</title>
    <link rel="stylesheet" href="./css/global.css">
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script> 
    <style>
    body{
      font-size: 16px;
      margin-top:-18px;
      font-family: "Microsoft YaHei","Consolas";
    }
    table{
      border-collapse: collapse;
    }
    input[type=button]{
    width: 108px;
    height: 32px;
    background:#7e9fe5; 
    color: #fff;
    border-radius: 6px;
    border:1px solid #fff;
    font-size: 16px;
    padding-left: 20px;  
    margin-top: 5px;  
    }
     input[type=number]{
    width: 40px;
    }
     #yes{
    width: 60px;
    height: 26px;
    background:#d7e0dc; 
    color: #000;
    border-radius: 6px;
    border:1px solid #fff;
    font-size: 14px; 
    padding-left: 2px;
    }
    #yes:hover{
      color:#fff;
      background: #666e6a;
    }
    #currentPage,#totalPage{
      margin-left: 12px;
    }
    #latterPage,#formerPage{
    width:70px;
    height:30px;
    cursor:pointer;
    background: #fff;
    border:2px solid #83baf3;
    padding-left:2px; 
    border-radius: 0;
    color: #000;
    }
    #latterPage:hover,#formerPage:hover{
      color: #fff;
      background: #83baf3;
    }
    .icon{
      margin-left: -102px;
      margin-top: -8px;
    }
    p{
      display: inline-block;
    } 
    </style>
</head>
<body>
<div class="layui-tab layui-tab-brief main-tab-container">
    <ul class="layui-tab-title main-tab-title">
      <div class="main-tab-item">学生列表</div>
      <li><input type="button" style="margin-left: -20px;" value="添加学生" onclick="addStudent()"><img class="icon" src="picture/add.png" width="17" height="17">
      <input type="button" value="批量删除" style="margin-left: 100px;" onclick="deleteStudents()"><img class="icon" src="picture/moredelete.png" width="20" height="20"></li>
    </ul>
    <div class="layui-tab-content">
      <div class="layui-tab-item layui-show">
      <form class="layui-form">
            <table class="list-table">
              <thead>
                <tr>
                  <th><input type="checkbox"></th>
                  <th style="display: none;">帐号</th>
                  <th>学号</th>
                  <th>姓名</th>
                  <th>手机号</th>
                  <th>班级</th>
                  <th>学院</th>
                  <th>Mac地址</th>
                  <th>操作</th> 
                </tr>
              </thead>
              <tbody id="list">              
              </tbody>
            </table>
             <div>
              <p><input type="radio" id="chooseAll"/>全选&nbsp;<input type="radio" id="cancel"/>取消&nbsp;&nbsp;共<span id="recordcount"></span>条记录&nbsp;&nbsp;设置每页&nbsp;<input type="number" id="pagesize">&nbsp;条数据&nbsp;&nbsp;跳转至第&nbsp;<input type="number" id="page">&nbsp;页&nbsp;&nbsp;<input type="button" id="yes" value="确定"></p>
              <p style="display: inline-block;float: right;margin-right: 100px">
              <input id="formerPage" type="button" value="上一页"/>
              <span id="currentPage"></span>&nbsp;&nbsp;/<span id="totalPage"></span>&nbsp;&nbsp;
              <input id="latterPage" type="button" value="下一页"/>
              </p>
            </div>
      </form>
      </div>
    </div>
</div>

<?php 
header("content-type:text/html;charset=utf-8");
$conn=mysql_connect("localhost","root","123456");
mysql_select_db("checkattendance");
mysql_query("set names utf8");
if(!$conn){
  die("mysql_connect_failed".mysql_connect_error());
}
$row=mysql_fetch_row(mysql_query("select count(1) from student"));
$recordcount=$row[0]; 
?>

<script type="text/javascript"> 
 var recordcount = "<?php echo $recordcount;?>";
 var pagesize = 8;
 var pagecount=0;
 var page = 1;

 if(recordcount==0){    
    pagecount=0;
  }
  else if(recordcount<pagesize ||recordcount==pagesize){
        pagecount=1;
    }
  else if(recordcount%pagesize==0){
        pagecount=recordcount/pagesize;
    }
  else{
      pagecount=parseInt(recordcount/pagesize)+1;
  } 
    
  document.getElementById("currentPage").innerHTML=page;
  document.getElementById("totalPage").innerHTML=pagecount;
  document.getElementById("recordcount").innerHTML=recordcount;
  refesh();

  function refesh(){
  $.ajax({
    type:"get",
    url:"Student.php",
    data:{"page":page,"pagesize":pagesize},   
    dataType:"json",
    success:function (data) {
    $("#list").empty();
    $(data).each(
      function (i, values) {
      $("#list").html($("#list").html()
          +"<tr><td><input type='checkbox' name='tag'></td>"
          +"<td style='display: none;'>"+values.id+"</td>"
          +"<td>"+values.sno+"</td>"
          +"<td>"+values.name+"</td>"
          +"<td>"+values.phone+"</td>"
          +"<td>"+values.class+"</td>"
          +"<td>"+values.academy+"</td>"
          +"<td>"+values.mac_address+"</td>"
          +"<td><button style='border:0' onclick='callParent("+values.id+")'><img alt='修改' src='picture/edit.png' width=25 height=25 /></button>&nbsp;&nbsp;<button style='border:0' onclick='deleteStudent("+values.id+")'><img alt='删除' src='picture/delete.png' width=30 height=30/></button></td></tr>"
      );
    }
  );
},
})
}

$("#chooseAll").click(function() {
   $("[name='tag']").each(function(){
    $(this).attr("checked",'true');  
 });  
});

$("#cancel").click(function() {
   $("[name='tag']").each(function(){
    $(this).removeAttr("checked");    
 });  
});

 $("#formerPage").click(function(){
    if (page>1) {
    page = page-'0'-1;  
    document.getElementById("currentPage").innerHTML=page; 
    refesh();
   }
 });

  $("#yes").click(function(){
    pagesize = document.getElementById("pagesize").value;
    page = document.getElementById("page").value;
    if(pagesize-'0'<0||pagesize-'0'==0) {
      alert("记录数应为正值，请检查！");
      page=1;
      pagesize=10;
    }else if(pagesize-'0'>recordcount){
      pagesize=recordcount;
      page=1;      
    }
    if(recordcount%pagesize==0){
        pagecount=recordcount/pagesize;
    }
    else{
        pagecount=parseInt(recordcount/pagesize)+1;
    } 
    document.getElementById("currentPage").innerHTML=page; 
    document.getElementById("totalPage").innerHTML=pagecount;
    refesh();
  });
 
  $("#latterPage").click(function(){    
    if (page<pagecount) {
    page = page-'0'+1;
    document.getElementById("currentPage").innerHTML=page;
    refesh();
    }    
  });

function callParent(sid){
  parent.coverit(sid);
} 
function deleteStudent(sid){
 $.ajax({
            type:"post",
            url:"StudentDelete.php",            
            dataType:"json",  
            data:{ "id": sid}
        }) 
}
function addStudent(){
  parent.addStudent();
}

function deleteStudents(){
    var checkedNum = $("input[name='tag']:checked").length;
    if(checkedNum==0){
        alert("请至少选择一项!");
        return false;
    }    
     if(confirm("确定删除所选项目吗?")){
            var checkedList = new Array();
            $("input[name='tag']:checked").each(function(){
                checkedList.push($(this).parent().next().html());                
            });
            var delitems = checkedList.toString();
            }
      $.ajax({
            type:"post",
            url:"DeleteStudents.php",   
            data:{"delitems": delitems},
            dataType:"html",
            success:function(data){
              alert("删除成功！");
              location.reload();
            },
            error:function(data){
              alert("删除失败！");
            }
        }) 
    }
</script>
</body>
</html>