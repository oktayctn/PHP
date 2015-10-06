<?php

$verisay=0;
session_start();
@$Padi = $_POST['adi'];
@$Psifre = $_POST['sifre'];

$kripto=md5($Psifre);


$baglan=mysql_connect("localhost","kullanici_central","sifre_central");
mysql_select_db("veritabani_central");


if(!empty($Padi) && !empty($Psifre)) {
	
	            $sorgu = mysql_query("SELECT kul_adi,uye_sifre FROM uyeler_adi where kul_adi ='$Padi' and uye_sifre='$kripto' ");
				$verisay=mysql_num_rows($sorgu);
										if($verisay !=0 ){
											$_SESSION['Padi']=$Padi;
											echo "başarılı şekilde giriş yaptınız";
											echo $_SESSION['Padi'];
											header("Location: ./user/bireysel.php");
														}
										else 
									

?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Kullanıcı Paneli</title>

    <link rel="stylesheet" href="css/style.css">
    
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
 <script type="text/javascript">
 $(function(){

 
			
				
				 $("input.submit").click(function(){
					
					 
				 var icerik1=$("input[name='adi']").val();
				 var icerik2=$("input[name='sifre']").val();
 
				 if( icerik1 == "" )
							 {
								 document.getElementById("submit").setAttribute("type","button");
								$("input[name='adi']").css({"border":"2px solid red"}).attr("placeholder","Boş Alanları Doldurunuz");
								
								//SUBMİT BUTONU KULLANIRSAN YAZIYI TEXTBOX İÇİNE YAZDIKTAN SONRA YA DA 
								//HERHANGİ BİR LABELA YAZDIKTAN SONRA SAYFAYI YENİLİYOR VE YAZI EKRANDAN
								//SİLİNİYOR 
								//BU YÜZDEN JQUERY YA DA JAVASCRİPT İÇİN BUTON OLARAK BUTTON KULLAN SUBMİT 
								//KULLANMA
								
							 }
				 if( icerik2 == "" )
							 {
								 document.getElementById("submit").setAttribute("type","button");
								$("input[name='sifre']").css({"border":"2px solid red"}).attr("placeholder","Boş Alanları Doldurunuz");
							
							 }
				if (icerik1!="" && icerik2!="")
			 {
				
				 document.getElementById("submit").setAttribute("type","submit"); 
			 }
			 
       });
 
 });
 
 </script>   
    
    

</head>

<body>

 

<div id="login">
  <div id="triangle"></div>
  <h1>Central | Bank Kullanıcı Paneli</h1>
  <form class="login active" action="login.php" method="POST">
    <input type="password" name="adi" placeholder="Email" />
    <input type="password" name="sifre" placeholder="Password" />
    <input type="submit" value="Giriş" id="submit" class="submit" />
     <?php
							
					                                   {
																	
	            							echo "<p>Lütfen bilgilerinizi kontrol ederek giriş yapın...</p>";	
								
											 		    }				
			              
                               } 
		else      {
		
		?>
                                    
           
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Kullanıcı Paneli</title>

    <link rel="stylesheet" href="css/style.css">
    
    
    
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
 <script type="text/javascript">
 $(function(){

 
			
				
				 $("input.submit").click(function(){
					
					 
				 var icerik1=$("input[name='adi']").val();
				 var icerik2=$("input[name='sifre']").val();
 
				 if( icerik1 == "" )
							 {
								 document.getElementById("submit").setAttribute("type","button");
								$("input[name='adi']").css({"border":"2px solid red"}).attr("placeholder","Boş Alanları Doldurunuz");
								
								//SUBMİT BUTONU KULLANIRSAN YAZIYI TEXTBOX İÇİNE YAZDIKTAN SONRA YA DA 
								//HERHANGİ BİR LABELA YAZDIKTAN SONRA SAYFAYI YENİLİYOR VE YAZI EKRANDAN
								//SİLİNİYOR 
								//BU YÜZDEN JQUERY YA DA JAVASCRİPT İÇİN BUTON OLARAK BUTTON KULLAN SUBMİT 
								//KULLANMA
								
							 }
				 if( icerik2 == "" )
							 {
								 document.getElementById("submit").setAttribute("type","button");
								$("input[name='sifre']").css({"border":"2px solid red"}).attr("placeholder","Boş Alanları Doldurunuz");
							
							 }
				if (icerik1!="" && icerik2!="")
			 {
				
				 document.getElementById("submit").setAttribute("type","submit"); 
			 }
			 
       });
 
 });
 
 </script>   
    

</head>

<body>

 

<div id="login">
  <div id="triangle"></div>
  <h1>Central | Bank Kullanıcı Paneli</h1>
  <form class="login active" action="login.php" method="POST">
    <input type="password" name="adi" placeholder="Email" />
    <input type="password" name="sifre" placeholder="Password" />
 <input type="submit" value="Giriş" class="submit" id="submit" />
           
           
           
                                    
      <?php
							

							  
			    echo "<p>Lütfen boş alan bırakmayınız...</p>";
			
				
				
						            }
						

	mysql_close();
	
	?>
  </form>
    
   
    
  
  
</div>

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

  <script src="js/index.js"></script>


</body>

</html>