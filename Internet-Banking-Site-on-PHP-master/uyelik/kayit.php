
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta charset="utf-8">
		<title>Central | BANK </title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
     <!--yazıyı genişletip ileri doğru getirdim bu scriptte-->   
       <script src="../js/cufon-yui.js" type="text/javascript"></script>
		<script src="../js/ChunkFive_400.font.js" type="text/javascript"></script>
		<script type="text/javascript">
			Cufon.replace('h1',{ textShadow: '1px 1px #fff'});
			Cufon.replace('h2',{ textShadow: '1px 1px #fff'});
			Cufon.replace('h3',{ textShadow: '1px 1px #000'});
			Cufon.replace('.back');
		</script>
        
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
     <script type="text/javascript">
 $(function(){
				
				
				 $("input.submit").click(function(){
					
					  
				 var icerik1=$("input[name='tckimlik']").val();
				 var icerik2=$("input[name='isim']").val();
				 var icerik3=$("input[name='soyad']").val();
				 var icerik4=$("input[name='sifre']").val();
				 var icerik5=$("input[name='mail']").val();
				 var icerik6=$("input[name='tel']").val();
 				 var icerik7=$("textarea[name='adres']").val();
				 if( icerik1 == "" )
							 {
								 document.getElementById("submit").setAttribute("type","button");
								$("input[name='tckimlik']").css({"border":"2px solid red"}).attr("placeholder","Boş Alanları Doldurunuz");
								
								//SUBMİT BUTONU KULLANIRSAN YAZIYI TEXTBOX İÇİNE YAZDIKTAN SONRA YA DA 
								//HERHANGİ BİR LABELA YAZDIKTAN SONRA SAYFAYI YENİLİYOR VE YAZI EKRANDAN
								//SİLİNİYOR 
								//BU YÜZDEN JQUERY YA DA JAVASCRİPT İÇİN BUTON OLARAK BUTTON KULLAN SUBMİT 
								//KULLANMA
								
							 }
				 if( icerik2 == "" )
							 {
								 document.getElementById("submit").setAttribute("type","button");
								$("input[name='isim']").css({"border":"2px solid red"}).attr("placeholder","Boş Alanları Doldurunuz");
							
							 }
				if( icerik3 == "" )
							 {
								 document.getElementById("submit").setAttribute("type","button");
								$("input[name='soyad']").css({"border":"2px solid red"}).attr("placeholder","Boş Alanları Doldurunuz");
							
							 }
				if( icerik4 == "" )
							 {
								 document.getElementById("submit").setAttribute("type","button");
								$("input[name='sifre']").css({"border":"2px solid red"}).attr("placeholder","Boş Alanları Doldurunuz");
							
							 }
				if( icerik5 == "" )
							 {
								 document.getElementById("submit").setAttribute("type","button");
								$("input[name='mail']").css({"border":"2px solid red"}).attr("placeholder","Boş Alanları Doldurunuz");
							
							 }
				if( icerik6 == "" )
							 {
								 document.getElementById("submit").setAttribute("type","button");
								$("input[name='tel']").css({"border":"2px solid red"}).attr("placeholder","Boş Alanları Doldurunuz");
							
							 }
				if( icerik7 == "" )
							 {
								 document.getElementById("submit").setAttribute("type","button");
								$("textarea[name='adres']").css({"border":"2px solid red"}).attr("placeholder","Boş Alanları Doldurunuz");
							
							 }
				
							 
				if (icerik1 !="" && icerik2 !="" && icerik3 !="" && icerik4 !="" && icerik5 !="" && icerik6 !="" && icerik7 != "")
			 {
				
				 document.getElementById("submit").setAttribute("type","submit"); 
			 }
			 
			 
       });
 
 });
 
 </script>     
        
        
        
	</head>
<body>
<!-- Wrap all page content here -->
<div id="wrap">

 
<header class="masthead">

  	<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src="img/image3.jpg">
          <div class="container">
            <div class="carousel-caption">
              <h2></h2>
              <p></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="img/image1.jpg">
          <div class="container">
            <div class="carousel-caption">
              <h2></h2>
              <p></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="img/image2.jpg">
          <div class="container">
            <div class="carousel-caption">
              <h2></h2>
              <p></p>
            </div>
          </div>
        </div>       
      </div><!-- /.carousel-inner -->
      <div class="logo">Central BANK</div> 
      <!-- Controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
      </a>  
    </div>
    <!-- /.carousel -->
  
</header>
  
  
<!-- Fixed navbar -->
<div class="navbar navbar-custom navbar-inverse navbar-static-top" id="nav">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav nav-justified">
          <li><a href="../index.php">ANASAYFA</a></li>
       
<!--2 adet dropdown menu-->
          <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
              Bireysel <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
            <li><a href=".././login1/index.php">Giris Yap</a></li>
            <li><a href="bireyseluyeol.php">Uye Ol</a></li>
            </ul>
          </li>
 
           <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
              Ticari <span class="caret"></span>
            </a>
            <ul class="dropdown-menu disabled" role="menu">
            <li><a href=".././login1/index.php">Giris Yap</a></li>
            <li><a href="ticariuyeol.php">Uye Ol</a></li>
            </ul>
          </li>
          
          
         
          
          
          
<!-- bitiş 2 adet dropdown menu-->      
          <li><a href="../hakkimizda.php">HAKKIMIZDA</a></li>
          <li><a href="../iletisim.php">İLETİŞİM</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container -->
</div><!--/.navbar -->
  
<!-- Begin page content -->


		
<div class="container">
  <div class="col-sm-10 col-sm-offset-1">
    <div class="page-header text-center">
    	      <h2> Central Bank Üyelik </h2>
     </div>
     <?php
session_start();	 
	 
$baglan=mysql_connect("localhost","kullanici_central","sifre_central");
if(!$baglan) die ("veri tabanina bag yok");
mysql_select_db("veritabani_central",$baglan) or die("secilemedi");
 mysql_query("SET NAMES UTF8");

@$tckimlik=$_POST['tckimlik'];
@$isim=$_POST['isim'];
@$soyad=$_POST['soyad'];
@$sifre=$_POST['sifre'];
@$tel=$_POST['tel'];
@$mail=$_POST['mail'];
@$adres=$_POST['adres'];


if(isset($_POST['tckimlik']) && isset($_POST['isim']) && isset($_POST['soyad'])&&isset($_POST['tel']) && isset($_POST['sifre']) && isset($_POST['mail']) && isset($_POST['adres']) )
{
	
						if(!empty($_POST['tckimlik']) && !empty($_POST['isim'])&& !empty($_POST['tel']) && !empty($_POST['soyad']) && !empty($_POST['sifre']) && !empty($_POST['mail']) && !empty($_POST['adres'])){
						
															//Eğer işlem başarılıysa altta tckimlik numarası kontrol ettirilir. tckimlik numarasından bir tane daha yoksa
															//o halde sisteme kayıt yapılır. Varsa tckimlik numarasının değiştirilmesi istenir.
															$kontrol_biti=0;//kontrol bitiyle sistemde aynı tckimlik numarasının olup
															//olmadığına bakılıyor.
															$kontrol_sorgu=mysql_query('SELECT tckimlik FROM uyeler_adi ');
															
															while($kontrol_tc=mysql_fetch_array($kontrol_sorgu))
															{
																	if($tckimlik==$kontrol_tc['tckimlik'])
																	{
																		$kontrol_biti=1;
																	}
																	//echo '<p>tckimlik= '.$kontrol_tc['tckimlik'].'</p>';
															}
															if($kontrol_biti==1){
															
															echo "<center><p>Sistemde aynı tckimlik numarası ile kayıtlı başka bir kullanıcı var. <br>Lütfen bilgileriniz kontrol ederek tekrar deneyeniz...</p></center>  ";
															}
															else
															{
																
															       		if(strlen($tckimlik)<=11){
																$sorgu=mysql_query("INSERT INTO kul_istek (istek_tc,ad_istek,soyad,sifre,mail,tel,adres) values ('$tckimlik','$isim','$soyad','$sifre','$mail','00000000','$adres')");
															echo "<center><p>Kaydınız Başarılı Bir Şekilde Alınmıştır...<br>
															Üyelik bilgileriniz mail adresinize kısa zamanda gönderilecektir...<p></center>";
																    		                  }
																		else				  {
																								echo "<center><p>11 karakterden fazla TC Kimlik Numarası Girmeyiniz...<p></center>";
																			 				  }
															}
															
															
						
						
							}
		
						else
						    {
						
						echo "<center><p>Boş Alan Bırakmayınız...<p></center>";
						    }	


}
else
{
  echo "<center><p>Boş Alan Bırakmayınız...<p></center>";


}



mysql_close();



?>
          <form class="form-horizontal" role="form" method="post" action="kayit.php">
   				 <div class="form-group">
      			  <label for="name" class="col-sm-2 control-label">Tc Kimlik No:</label>
      				  <div class="col-sm-10">
       		     <input type="text" class="form-control" id="name" name="tckimlik" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
       				  </div>
    			</div>
    					<div class="form-group">
        		 <label for="email" class="col-sm-2 control-label">İsim:</label>
       				    <div class="col-sm-10">
            	 <input type="text" class="form-control" id="isim" name="isim" placeholder="" value="">
       			 </div>
    				</div>
                    <div class="form-group">
      			  <label for="name" class="col-sm-2 control-label">Soyad:</label>
      				  <div class="col-sm-10">
       		     <input type="text" class="form-control" id="name" name="soyad" placeholder="" value="">
       				  </div>
    			</div>
                    <div class="form-group">
      			  <label for="name" class="col-sm-2 control-label">Sifre:</label>
      				  <div class="col-sm-10">
       		     <input type="password" class="form-control" id="name" name="sifre" placeholder="" value="">
       				  </div>
    			</div>
                <div class="form-group">
      			  <label for="name" class="col-sm-2 control-label">Mail:</label>
      				  <div class="col-sm-10">
       		     <input type="email" class="form-control" id="name" name="mail" placeholder="" value="">
       				  </div>
    			</div>
                <div class="form-group">
      			  <label for="name" class="col-sm-2 control-label">Tel:</label>
      				  <div class="col-sm-10">
       		     <input type="text" class="form-control" id="name" name="tel" placeholder="" value="">
       				  </div>
    			</div>
    				<div class="form-group">
      			  <label for="message" class="col-sm-2 control-label">Adres</label>
       				 <div class="col-sm-10">
          		  <textarea class="form-control" rows="4" name="adres"></textarea>
       				 </div>
    				</div>
    				
    				<div class="form-group">
      			  <div class="col-sm-10 col-sm-offset-2">
         		   <input type="submit" value="Gönder" id="submit" class="submit btn" />
                   <!--
                   JQUERY ÇALIŞMASI İÇİN SUBMİT BTN CSS CLASSINI DEĞİŞTİRDİM VE SADECE SUBMİTİ JQUERY DE OLAY OLARAK GÖNDERDİĞİMDE
                   GAYET DÜZGÜN ŞEKİLDE ÇALIŞTIĞINI GÖRDÜM
                   
                   -->
                    </div>
            		</div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <! Will be used to display an alert to the user>
                    </div>
                </div>
	  </form>
    </div>
    
    <p class="lead text-center">&nbsp;</p> 
    
    <hr>
    
    <div class="divider"></div>
    
  </div>
</div>
    
<div class="divider"></div>
   <!--aradaki resim -->
<section class="bg-1">
  <div class="col-sm-6 col-sm-offset-3 text-center"></div>
</section>
   <!--//aradaki resim -->
<div class="divider" id="section4"></div>

<div class="row">
  <div class="col-md-8 col-md-offset-1">
   <p>Central Online İnternet Bankacılığı © </p>
  </div>
</div>
  
<div id="footer">
  <div class="container">
    <p class="text-muted">Copyright© 2015 Harun Tamokur</p>
  </div>
</div>



	<!-- script references -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&extension=.js&output=embed"></script>
<script src="js/scripts.js"></script>
</body>
</html>