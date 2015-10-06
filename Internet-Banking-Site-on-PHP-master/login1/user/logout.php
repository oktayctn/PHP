<?php
include("../../class/veritabani.php");


session_start();
$isim=$_SESSION['Padi'];
//------bağlantı
$vt = new veritabani();
$vt->vtAdi = "veritabani_central";
$vt->vtServer = "localhost";
$vt->vtKullanici = "kullanici_central";
$vt->vtSifre = "sifre_central";
$vt->baglan();
//tarih
$tarih= date('d.m.Y');
$yenitarih = date("Y-m-d", strtotime($tarih));
echo $yenitarih;
$tarihekle = mysql_query("UPDATE uyeler_adi SET son_giris='$yenitarih' WHERE kul_adi='$isim'");	
$aktif=0;	
mysql_query("UPDATE uyeler_adi SET aktif='$aktif' where kul_adi='$isim'");
unset($_SESSION['Padi']);

echo ("Güvenli Çıkış Yapıldı...");

header('Location: ../index.php');
?>	
	