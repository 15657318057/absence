<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="js/echarts.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.js" ></script>
	<title>welcome</title>
	<style>
		body{
			font-family: "Microsoft YaHei","Consolas";
			font-size: 16px;
		}
		.barCharts,.lineCharts{
			width: 400px;
			height: 360px;
			border:2px solid #e8ecf4;
			float:left;
			border-top: 6px solid #7d9dde;			
		}
		.lineCharts{
			margin-left: 20px;
		}
		.personQuery{
			width: 840px;
			height: 160px;
			border:2px solid #e8ecf4;
			border-radius: 6px;
		}
		div{
			margin:2px;
			padding-left: 6px;
			padding-right: 6px;
		}
		input[type=button]{
	    width:70px;
	    height:30px;
	    cursor:pointer;
	    font-size: 16px;
	    background: #fff;
	    border:2px solid #83baf3;
	    padding-left:2px; 
	    border-radius: 0;
	    color: #000;
    	}
	   input[type=button]:hover{
	      color: #fff;
	      background: #83baf3;
	    }
		#barCharts,#lineCharts{
		width: 400px;
		height:300px;	
		}
		h3{
			font-weight: normal;
		}
		input[type=number]{
			width: 160px;		
		}
	</style>
</head>
<body>
	<div class="personQuery">
		<div>
		<h3>考勤查询</h3>
		<p>
			<label>学号：</label>
			<input type="number" id="sno">
			&nbsp;&nbsp;<input type="button" value="搜索" onclick="queryAbsence()">
		</p>	
		</div>		
		&nbsp;&nbsp;<span id="result"></span>
	</div>
	<div class="barCharts">
		<p>
			<label>请选择查询：</label>
			<select id="item">
				<option></option>
				<option value="class">班级</option>
				<option value="academy">学院</option>				
			</select>
			&nbsp;<input type="button" value="确定" onclick="changeBar()">
		</p>
		<div id="barCharts"></div>
	</div>
	<div class="lineCharts">
		<p style="float:right;margin-right: 100px;">
		<label>选择按</label>
		<input type="radio" name="time" value="day">天
		<input type="radio" name="time" value="week">周
		<input type="radio" name="time" value="month">月			
		</p>
		<p>
			<input type="button" value="查询" onclick="changeLine()" >
		</p>
		<div id="lineCharts"></div>		
	</div>
	<div>
		
	</div>

</body>
<script type="text/javascript">
var names1 = [], nums1 = [];
var mychart1 = echarts.init(document.getElementById("barCharts")); 

var item="academy";
function changeBar(){
	item=$("#item  option:selected").val();
	getBar(item);
}
function getBar(item){	
names1 = [],nums1=[]; 
$.ajax({     
type: "post",  
async : false,
url: "AbsenceCharts.php", 
// scriptCharset: 'utf-8',
data: {"item":item},   
dataType: "json",  
success: function(result){ 
if(result){   
for(var i = 0 ; i < result.length; i++){  
names1.push(result[i].name);  
nums1.push(result[i].num);
}               
}           
},          
error: function(errmsg) {  
alert("Ajax获取服务器数据出错了！"+ errmsg);  
}     
});
var option1 = {
            title: {
                text: '班级-学院缺勤条形图',
                left:'center',
                textStyle:{
                	color:"#000",
                	fontWeight :'normal',
                	fontSize :'16',
                	fontFamily :'Microsoft YaHei'
                }
            },
            tooltip: {show : true},
            legend: {
                data:['迟到次数']
            },
            xAxis: [{
                data: names1
            }],
            yAxis: [{type:'value'}],
            series: [{
                name: '人数',
                type: 'bar',
                data: nums1,
                itemStyle: {
                normal: {
                    color: '#4dec9d',
                    shadowBlur: 200,
                    shadowColor: 'rgba(0, 0, 0, 0.2)'
                }
            }
            }]
        }; 
mychart1.setOption(option1);   
}
getBar(item);

var time="week";
var names2 = [],nums2 = [];
var mychart2 = echarts.init(document.getElementById("lineCharts"));
function changeLine(){
	time=$('input:radio[name=time]:checked').val();
	getLine(time);
}
function getLine(time){
names2 = [],nums2=[]; 
$.ajax({     
type: "post",  
async : false,
url: "TimeAbsence.php", 
scriptCharset: 'utf-8',
data: {"time":time},   
dataType: "json",  
success: function(result){ 
if(result){   
for(var i = 0 ; i < result.length; i++){  
names2.push(result[i].name);  
nums2.push(result[i].num);
}               
}           
},          
error: function(errmsg) {  
alert("Ajax获取服务器数据出错了！"+ errmsg);  
}     
});
var option2 = {
            title: {
                text: '日-周-月缺勤折线图',
                left:'center',
                textStyle:{
                	color:'#000',
                	fontWeight:'normal',
                	fontSize:'16',
                	fontFamily:'Microsoft YaHei'
                }
            },
            tooltip: {show : true},
            legend: {
                data:['迟到次数']
            },
            xAxis: [{
                data: names2
            }],
            yAxis: [{type:'value'}],
            series: [{
                name: '人数',
                type: 'line',
                data: nums2,
                symbolSize:8,
                itemStyle: {
                normal: {
                    color: '#4d63ec',
                    shadowBlur: 200,
                    shadowColor: 'rgba(0, 0, 0, 0.2)'
                }
            }
            }]
        }; 
mychart2.setOption(option2); 
}
getLine(time);
function queryAbsence(){
var sno= $("#sno").val();
$.ajax({     
type: "post",  
async : false,
url: "PersonAbsence.php", 
scriptCharset: 'utf-8',
data: {"sno":sno},   
dataType: "json",  
success: function(result){
if(result[0].num=='0'){   
    $("#result").html("报告：缺勤 0 次 nice!")          
}else{
	$("#result").html("报告：这家伙缺勤 "+result[0].num+" 次。");
}           
},
error:function(){
	alert("fail");
}
});	
}
</script>
</html>