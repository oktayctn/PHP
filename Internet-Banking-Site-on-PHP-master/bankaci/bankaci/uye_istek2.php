<?php



session_start();
$isim=$_SESSION['yadi'];

if(!$isim)
{
 header("location: uyari.php");
}


mysql_connect("localhost","kullanici_central","sifre_central");
mysql_select_db("veritabani_central");

mysql_query("SET NAMES 'UTF8'");//TÜRKÇE KARAKTER DESTEĞİ İÇİN

//$POST['name']="23   ,";


if(isset($_POST['name'])) {
	//echo "<br>BURASI JQUERYDEN GELEN POST".$_POST['name']."<br>";
    $silinecekler = rtrim($_POST['name'],","); //virgül karakterini sondan çıkarmak için
	$silinecekler=chop($silinecekler);//chop sondaki boşlukları silmeye yarar
	echo "Boşluklar Silindiiii!!!!!!!!!!".$silinecekler;
  	
	$sorgu=mysql_query('SELECT * FROM kul_istek WHERE id in ('.$silinecekler.') ');
	
	var_dump($sorgu);
	
	
	
	
	
	
	while($veri=mysql_fetch_array($sorgu)){
		$id=$veri['id'];
		$tckimlik=$veri['istek_tc'];
		$ad=$veri['ad_istek'];
		$soyad=$veri['soyad'];
		$sifre=$veri['sifre'];
		$mail=$veri['mail'];
		$tel=$veri['tel'];
		$adres=$veri['adres'];
		$banka_id="100000000"+$id;
		$kul_adi=$ad.$veri['id'];
		$hesapbilgi="100000";
		$cripto=md5($sifre);
	    mysql_query("INSERT INTO uye_bilgi (tckimlik,banka_id,ad,soyad,adres,mail,tel) values ('$tckimlik','$banka_id','$ad','$soyad','$adres','$mail','$tel')");
		
	
		
		mysql_query("INSERT INTO uyeler_adi (kul_adi,uye_sifre,tckimlik,hesapbilgi) values ('$kul_adi','$cripto','$tckimlik','$hesapbilgi') ");	
		
		
		mysql_query("DELETE FROM kul_istek where id=$id");
//ÜYELERE SİSTEME KAYIT YAPILDIĞINDA GÖNDERİLEN MAİL KULLANICI ADI VE ŞİFRE İÇERİYOR		
	  $eposta=$mail;
	  
      $konu = "Central Bank Üyelik Bilgileri";
      $mesaj = '
	  Central Bank Üyelik Bilgileriniz Aşağıdadır:
	  '.'Kullanıcı Adı: '.$kul_adi.'
	  Şifre: '.$sifre.'
	  Herhangi bir problemde sistemimizde bulunan iletişim formuyla bankamız yetkililerine ulaşabilirsiniz...';
	  
      $icerik = 'Sayın: ' . $ad ." ".$soyad. '
	  E-Posta: '. $mail . '' . $mesaj;
	  $headers="From: harun tamokur <"."h.tamokur@yahoo.com.tr".">"."\r\n"."Cc:".$mail;
      mail($mail, $konu, $icerik,$headers); 
      echo "<center><h4>Mesajınız Gönderildi!<h4><p> <br>İletişim sayfasına yönlendiriliyorsunuz...</p></center> ";
	  echo '<meta http-equiv="refresh" content="6;URL=iletisim.php">';
	}	
	
	 
	
	
}
unset($_SESSION['sifre']);
//header("location:index.php");
mysql_close();

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    
    <title>Central BANK | Yönetim Paneli</title>

</head>
<body>
</body>
</html>

