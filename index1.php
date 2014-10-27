<html>
<head>
<title>สถิติแผ่นดินไหว(ประเทศไทย)</title>
<meta http-equiv="Content-Language" content="th"> 
<meta http-equiv="content-Type" content="text/html; charset=window-874"> 
<meta http-equiv="content-Type" content="text/html; charset=UTF-8"> 
<link rel="stylesheet" href="themes/Bootstrap.css">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.0/jquery.mobile.structure-1.4.0.min.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.js"></script>  
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
 <div data-role="content" data-theme="a">
<?php
$objConnect = mysql_connect("localhost","root","secret") or die("Error Connect to Database");
$objDB = mysql_select_db("repost_db");
mysql_query("SET character_set_results=utf8");
$strSQL = "SELECT * FROM earthquake";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>

<table width="600" border="1" align="center">
  <tr>
    <th width="91"> <div align="center">วันที่</div></th>
    <th width="98"> <div align="center">ริกเตอร์ </div></th>
    <th width="198"> <div align="center">จุดเกิด </div></th>
    <th width="97"> <div align="center">หมายเหตุ </div></th>
   
  </tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?php echo $objResult["date"];?></div></td>
    <td><div align="center"><?php echo $objResult["magnitude"];?></div></td>
    <td><div align="center"><?php echo $objResult["position"];?></div></td>
    <td><div align="center"><?php echo $objResult["reference"];?></div></td>
   
  </tr>
<?php
}
?>
</table>
<?php
mysql_close($objConnect);
?>
</div>
<div data-role="footer" data-position="fixed">
    <h1>University of thai chamber of commerce</h1>
  </div>
</body>
</html>