<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
<meta http-equiv="Content-Language" content="th"> 
<meta http-equiv="content-Type" content="text/html; charset=window-874"> 
<meta http-equiv="content-Type" content="text/html; charset=UTF-8"> 
</head>
<body>
<?php
$objConnect = mysql_connect("localhost","root","secret") or die("Error Connect to Database");
$objDB = mysql_select_db("repost_db");
$strSQL = "SELECT * FROM earthquake";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="600" border="1">
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
</body>
</html>
