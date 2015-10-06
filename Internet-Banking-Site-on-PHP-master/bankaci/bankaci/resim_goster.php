<?php
mysql_connect("localhost","kullanici_central","sifre_central");
mysql_select_db("veritabani_central");
if(isset($_GET['id']))
{
	$id = mysql_real_escape_string($_GET['id']);
	$sorgu = mysql_query("select * from resim where id='$id'");
	$yeni=mysql_fetch_array($sorgu);
	$veri=$yeni['resim'];
	
	//header("content-type: image/jpg");

	echo $veri ;
}
else
{
	echo "Hata !!!";
}
?>