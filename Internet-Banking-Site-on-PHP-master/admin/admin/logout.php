<title>Çıkış</title>
<?php
include("../../class/veritabani.php");


session_start();
$isim=$_SESSION['yonet'];
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
$tarihekle = mysql_query("UPDATE panel_kul SET son_giris='$yenitarih' WHERE kul_adi='$isim' and kul_yetki='1'");		

unset($_SESSION['yonet']);

echo "</br>"."Guvenli Cikis Yapildi...";

header('Location: ../index.php');
?>	
