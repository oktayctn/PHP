<form action="resimupload.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="image" /><br />
	<input type="submit" name="submit" value="Yükle" />
</form>

<?php

if(isset($_POST['submit']))
{
	mysql_connect("localhost","kullanici_central","sifre_central");
	mysql_select_db("veritabani_central");

	$resim_adi = mysql_real_escape_string($_FILES["image"]["name"]);
	$resim_veri = mysql_real_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
	$resim_turu = mysql_real_escape_string($_FILES["image"]["type"]);
	
	if(substr($resim_turu,0,5) == "image")
	{
		mysql_query("insert into resim(site_adi,resim) values('Google','$resim_veri')");

	}

	else
	{
		echo "Sadece resim yüklenebilir.";
	}
}

?>

<img src="resimgoster.php?id=6" />

<? 
include("../.././doviz/doviz.php");

?>

