<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>สถิติแผ่นดินไหว(ประเทศไทย)</title>
<meta http-equiv="Content-Language" content="th"> 
<meta http-equiv="content-Type" content="text/html; charset=window-874"> 
<meta http-equiv="content-Type" content="text/html; charset=UTF-8"> 
<link rel="stylesheet" href="themes/Bootstrap.css">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.0/jquery.mobile.structure-1.4.0.min.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.js"></script>
<style type="text/css">
html { height: 100% }
body { 
	height:100%;
	margin:0;padding:0;
	font-family:tahoma, "Microsoft Sans Serif", sans-serif, Verdana;
	font-size:12px;
}
/* css กำหนดความกว้าง ความสูงของแผนที่ */
#map_canvas { 
	width:1350px;
	height:550px;
	margin:auto;
	margin-top:0px;
}
</style>


</head>

<body>
  <div data-role="header" data-position="inline">
				<h1>Earthquake Checker</h1>
				<div data-role="navbar">
	<ul>
	<li><a href="index.html" data-icon="star">ข่าว & แผนที่</a></li>
	<li><a class="ui-btn-active" data-icon="info">สถิติแผ่นดินไหว(ประเทศไทย)</a></li>
	<li><a href="index2.html" data-icon="search">วิธีปฏิบัติตัวขณะเกิดแผ่นดินไหว</a></li>
	<li><a href="index3.html" data-icon="gear">ตั้งค่า</a></li>
	</ul>
</div>
</div>
  <div id="map_canvas">
 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
<script type="text/javascript">
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
function initialize() { // ฟังก์ชันแสดงแผนที่
	GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
	// กำหนดจุดเริ่มต้นของแผนที่
	var my_Latlng  = new GGM.LatLng(13.761728449950002,100.6527900695800);
	// กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
	var my_DivObj=$("#map_canvas")[0]; 
	// กำหนด Option ของแผนที่
	var myOptions = {
		zoom: 5, // กำหนดขนาดการ zoom
		center: my_Latlng , // กำหนดจุดกึ่งกลาง
		mapTypeId:GGM.MapTypeId.ROADMAP, // กำหนดรูปแบบแผนที่
		mapTypeControlOptions:{ // การจัดรูปแบบส่วนควบคุมประเภทแผนที่
			position:GGM.ControlPosition.TOP, // จัดตำแหน่ง
			style:GGM.MapTypeControlStyle.DROPDOWN_MENU // จัดรูปแบบ style 
		}
	};
	map = new GGM.Map(my_DivObj,myOptions);// สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map
	
	$.ajax({
		url:"local.xml", // ใช้ ajax ใน jQuery เรียกใช้ไฟล์ xml
		dataType: "xml",
		success:function(xml){
			$(xml).find('marker').each(function(){ // วนลูปดึงค่าข้อมูลมาสร้าง marker
					var markerID=$(this).attr("id");// นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน	
					var markerName=$(this).find("name").text(); // นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน	
					var markerLat=$(this).find("latitude").text(); // นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน	
					var markerLng=$(this).find("longitude").text();	// นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน			
					var markerLatLng=new GGM.LatLng(markerLat,markerLng);
					var my_Marker = new GGM.Marker({ // สร้างตัว marker
						position:markerLatLng,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง
						map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map
						title:markerName+"     ละติจูด "+markerLat+"    ลองติจูด "+markerLng // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ
					});
					
				//	console.log($(this).find("id").text());
			});
		}	
	});		

}
$(function(){
	// โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว
	// ค่าตัวแปร ที่ส่งไปในไฟล์ google map api
	// v=3.2&sensor=false&language=th&callback=initialize
	//	v เวอร์ชัน่ 3.2
	//	sensor กำหนดให้สามารถแสดงตำแหน่งทำเปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false
	//	language ภาษา th ,en เป็นต้น
	//	callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize
	$("<script/>", {
	  "type": "text/javascript",
	  src: "http://maps.google.com/maps/api/js?v=3.2&sensor=false&language=th&callback=initialize"
	}).appendTo("body");	
});
</script>
</div>
<div data-role="footer" data-position="fixed">
    <h1>University of thai chamber of commerce</h1>
  </div>
</body>
</html>
