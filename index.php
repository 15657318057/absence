<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>考勤后台管理</title>
<script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="./layui/css/layui.css">
<link rel="stylesheet" href="./css/global.css">
<link rel="stylesheet" href="css/style.css"/>
<script type="text/javascript" src="js/jquery-3.3.1.js"></script> 
<script type="text/javascript" src="js/navMenu.js" ></script>
<script type="text/javascript"> 
</script> 
</head>
<body>
	<div class="head">
    <div style="float: left;width: 200px;height: 30px;background: #7898da;color: #fff;font-size: 18px;text-align: center;padding-top: 10px;">Attence</div>
          <span><a class="logout" href="login.html">退出</a></span>
	</div>
  <div class="navMenuBox">
  <ul class="navMenu">
    <li><a href="personinfo.html" target="right"><img src="picture/person.png" width="16" height="16">&nbsp;&nbsp;我的账户</a></li>
    <li><a href="#" class="arrow"><img src="picture/late.png" width="20" height="20">&nbsp;&nbsp;考勤管理</a>
    <ul class="subMenu">
    <li><a href="AbsenceList.php" target="right">详细信息</a></li>
    <li><a href="welcome.php" target="right">结果统计</a></li>
    </ul>
    </li>
    <li><a href="studentList.php" target="right"><img src="picture/student.png" width="20" height="20">&nbsp;&nbsp;学生管理</a></li>
    <li><a href="classroomList.html" target="right"><img src="picture/house.png" width="18" height="18">&nbsp;&nbsp;教室管理</a></li>    
</ul>
</div>
	<div class="content">
		<div>
			 <iframe src="" frameborder="0" id="myframe" width="1130" name="right" height="800" scrolling= "auto" ></iframe>
		</div>
	<div style="margin-left:600px;">Copy&copy;2019</div>
	</div>	
<div id="cover"></div> 
<div id="coverShow1">
<div class="layui-tab layui-tab-brief main-tab-container">
    <ul class="layui-tab-title main-tab-title">
     <div class="main-tab-item">修改信息</div>
    </ul>
    <div class="layui-tab-content">
       <form class="layui-form" action="StudentEdit.php" method="post">
        <div class="layui-tab-item layui-show">
          <div class="layui-form-item">
            <label class="layui-form-label">ID</label>
            <div class="layui-input-inline input-custom-width">
              <input type="text" id="id"  name="id" lay-verify="required" autocomplete="off" class="layui-input" readonly="readonly">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">学号</label>
            <div class="layui-input-inline input-custom-width">
              <input type="text" id="sno"  name="sno" lay-verify="required" autocomplete="off" class="layui-input" readonly="readonly">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">姓名</label>
            <div class="layui-input-inline input-custom-width">
              <input type="text" id="name"  name="name" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">手机号</label>
            <div class="layui-input-inline input-custom-width">
              <input type="text" id="phone" name="phone" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">班级</label>
            <div class="layui-input-inline input-custom-width">
              <input type="text" id="class"  name="class" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">学院</label>
            <div class="layui-input-inline input-custom-width">
              <input type="text" id="academy"  name="academy" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">Mac地址</label>
            <div class="layui-input-inline input-custom-width">
              <input type="text" id="mac_address" name="mac_address" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
          </div>
       <div class="layui-form-item">
            <div class="layui-input-block">
              <input class="layui-btn" type="submit" value="确认修改" lay-filter="feedback_edit">
            </div>
          </div>
        </div>   
      </form>
    </div>
</div>
</div>
<div id="coverShow2">
 <div class="layui-tab layui-tab-brief main-tab-container">
    <ul class="layui-tab-title main-tab-title">
     <div class="main-tab-item">添加学生</div>
    </ul>
    <div class="layui-tab-content">
       <form class="layui-form" action="StudentAdd.php" method="post">
        <div class="layui-tab-item layui-show">
          <div class="layui-form-item">
            <label class="layui-form-label">学号</label>
            <div class="layui-input-inline input-custom-width">
              <input type="text" id="sno"  name="sno" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">姓名</label>
            <div class="layui-input-inline input-custom-width">
              <input type="text" id="name"  name="name" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">手机号</label>
            <div class="layui-input-inline input-custom-width">
              <input type="text" id="phone" name="phone" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">班级</label>
            <div class="layui-input-inline input-custom-width">
              <input type="text" id="class"  name="class" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">学院</label>
            <div class="layui-input-inline input-custom-width">
              <input type="text" id="academy"  name="academy" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">Mac地址</label>
            <div class="layui-input-inline input-custom-width">
              <input type="text" id="mac_address" name="mac_address" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
          </div>
       <div class="layui-form-item">
            <div class="layui-input-block">
              <input class="layui-btn" type="submit" value="添加" lay-filter="feedback_edit">
            </div>
          </div>
        </div>   
      </form>
    </div>
</div>
</div> 
<div id="coverShow3">
   <div class="layui-tab layui-tab-brief main-tab-container">
    <ul class="layui-tab-title main-tab-title">
     <div class="main-tab-item">添加教室</div>
    </ul>
    <div class="layui-tab-content">
       <form class="layui-form" action="ClassroomAdd.php" method="post">
        <div class="layui-tab-item layui-show">
          <div class="layui-form-item">
            <label class="layui-form-label">教室位置</label>
            <div class="layui-input-inline input-custom-width">
              <input type="text" id="sno"  name="roomname" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
          </div>          
       <div class="layui-form-item">
            <div class="layui-input-block">
              <input class="layui-btn" type="submit" value="添加" lay-filter="feedback_edit">
            </div>
          </div>
        </div>   
      </form>
    </div>
</div>
</div>
</body>
<?php
  $frame = $_GET['frame'];
  if ($frame=='1') {
    echo"<script>document.getElementById('myframe').src='welcome.php'; </script>";
  }elseif ($frame=='2') {
    echo"<script>document.getElementById('myframe').src='personinfo.html';</script>";
  }elseif ($frame=='3') {
    echo"<script>document.getElementById('myframe').src='studentList.php';</script>";
  }elseif ($frame=='4') {
    echo"<script>document.getElementById('myframe').src='classroomList.html';</script>";
  }
  ?>
<script type="text/javascript"> 
function coverit(sid) 
{ 
var cover = document.getElementById("cover"); 
var covershow = document.getElementById("coverShow1"); 
cover.style.display = 'block'; 
covershow.style.display = 'block';
 $.ajax({
            type:"get",
            url:"SelectStudent.php",            
            dataType:"json",  
            data:{ "id": sid},       
            success:function (data) {
            document.getElementById("id").value=data[0].id;
            document.getElementById("sno").value=data[0].sno;
            document.getElementById("name").value=data[0].name;
            document.getElementById("phone").value=data[0].phone;
            document.getElementById("class").value=data[0].class;
            document.getElementById("academy").value=data[0].academy;
            document.getElementById("mac_address").value=data[0].mac_address;
            },
        }) 
setTimeout("showTime1()",15000);
}
function addStudent(){
  var cover = document.getElementById("cover"); 
  var covershow = document.getElementById("coverShow2"); 
  cover.style.display = 'block'; 
  covershow.style.display = 'block';
  setTimeout("showTime2()",60000);
} 
function addClassroom(){
   var cover = document.getElementById("cover"); 
  var covershow = document.getElementById("coverShow3"); 
  cover.style.display = 'block'; 
  covershow.style.display = 'block';
  setTimeout("showTime3()",15000); 
}
function showTime1(){ 
var cover = document.getElementById("cover"); 
var covershow = document.getElementById("coverShow1"); 
cover.style.display = ''; 
covershow.style.display = ''; 
} 
function showTime2(){ 
var cover = document.getElementById("cover"); 
var covershow = document.getElementById("coverShow2"); 
cover.style.display = ''; 
covershow.style.display = ''; 
} 
function showTime3(){ 
var cover = document.getElementById("cover"); 
var covershow = document.getElementById("coverShow3"); 
cover.style.display = ''; 
covershow.style.display = ''; 
} 
</script>
</html>