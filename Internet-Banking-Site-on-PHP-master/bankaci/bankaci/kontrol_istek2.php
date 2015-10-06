<?php

//JQUERY ile post verisi buraya gönderiliyor. Bu durumda bootstrapın html tagları buraya eklenmedi.
session_start();
$isim=$_SESSION['yadi'];

if(!$isim)
{
 header("location: uyari.php");
}

mysql_connect("localhost","kullanici_central","sifre_central");
mysql_select_db("veritabani_central");

mysql_query("SET NAMES 'UTF8'");



if(isset($_POST['name'])) {
    $silinecekler = rtrim($_POST['name'],","); //virgül karakterini sondan çıkarmak için
  	//echo $silinecekler;
	//silinecekler bir değişken ismi olarak düşünüldü. normalde burada kayıt işlemine gidecek idleri tutuyor.
	$sorgu=mysql_query('SELECT id_kredi,miktar,tckimlik FROM `kredi_istek` WHERE id_kredi in ('.$silinecekler.') ');
	
	//var_dump($sorgu);
	while($veri=mysql_fetch_array($sorgu)){
		$tckimlik=$veri['tckimlik'];
		$miktar=$veri['miktar'];
		$id_kredi=$veri['id_kredi'];
	    $sorgu2=mysql_query("UPDATE uyeler_adi SET hesapbilgi=hesapbilgi+$miktar where tckimlik=$tckimlik");	
		mysql_query("DELETE FROM kredi_istek where id_kredi=$id_kredi");
	
	
	}	
}

//header("location:index.php");
mysql_close();



?>


