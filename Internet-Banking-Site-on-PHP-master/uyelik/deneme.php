<?php

session_destroy();
$baglan=mysql_connect("localhost","kullanici_central","sifre_central");

if(!$baglan) die ("veri tabanina bag yok");
mysql_select_db("veritabani_central",$baglan) or die("secilemedi");

$sorgu=mysql_query('SELECT tckimlik FROM uyeler_adi  where uye_id IN (2,3,4)');

while($veri=mysql_fetch_array($sorgu))
{
echo "tckimlikler=".$veri['tckimlik']."<br>";

}

mysql_close();
?>