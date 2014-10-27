<?php
header("Content-type:text/xml; charset=UTF-8");              
header("Cache-Control: no-store, no-cache, must-revalidate");             
header("Cache-Control: post-check=0, pre-check=0", false);   
mysql_connect("localhost","root","secret") or die("Cannot connect the Server");
mysql_select_db("test") or die("Cannot select database");
$strSQL = "SELECT * FROM local";
mysql_query("set character set utf8");
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<markers>
<?php
$q="SELECT * FROM province_latlng WHERE 1 ORDER BY province_id LIMIT 30 ";
$qr=mysql_query($q);
while($rs=mysql_fetch_array($qr)){
?>
	<marker id="<?=$rs['province_id']?>">
        <name><?=$rs['province_name']?></name>
        <latitude><?=$rs['province_lat']?></latitude>
        <longitude><?=$rs['province_lon']?></longitude>
    </marker>
<?php } ?>
</markers>