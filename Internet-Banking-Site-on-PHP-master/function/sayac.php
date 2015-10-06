<?php

@mysql_connect("localhost", "kullanici_central", "sifre_central") or die("Bağlantı kurulamıyor: " . mysql_error());
@mysql_select_db("veritabani_central");

$ip=$_SERVER['REMOTE_ADDR'];
//Siteye ziyaret edenin IP'sini öğrenilir

$zaman       =time();
$buguntarih  = date('Y-m-d');
$kayit_sorgu = mysql_query("SELECT * FROM ip_sayaci WHERE tarih='$buguntarih' AND ip='$ip'");
$kayit_sayisi=mysql_num_rows($kayit_sorgu);

if($kayit_sayisi==0){//0 geldiyse bugun bu ipden giriş yapılmış demektir. Yani IP ile daha önce giriş yapılmadıysa o zaman güncellenmeli
	$ip_kaydet=mysql_query("INSERT INTO ip_sayaci (tarih, tiklama, ip) VALUES ('$buguntarih',1,'$ip')");
	
}


?>