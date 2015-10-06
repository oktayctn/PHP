


<!DOCTYPE html>
<html lang="en">
	<head>
    
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
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
       <script src="js/cufon-yui.js" type="text/javascript"></script>
		<script src="js/ChunkFive_400.font.js" type="text/javascript"></script>
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
					
					  
				 var icerik1=$("input[name='ad']").val();
		
				 var icerik2=$("input[name='soyad']").val();
				 var icerik3=$("input[name='eposta']").val();
				 var icerik4=$("input[name='konu']").val();
				 var icerik5=$("textarea[name='mesaj']").val();
 	
				 if( icerik1 == "" )
							 {
								 document.getElementById("submit").setAttribute("type","button");
								$("input[name='ad']").css({"border":"2px solid red"}).attr("placeholder","Boş Alanları Doldurunuz");
								
								//SUBMİT BUTONU KULLANIRSAN YAZIYI TEXTBOX İÇİNE YAZDIKTAN SONRA YA DA 
								//HERHANGİ BİR LABELA YAZDIKTAN SONRA SAYFAYI YENİLİYOR VE YAZI EKRANDAN
								//SİLİNİYOR 
								//BU YÜZDEN JQUERY YA DA JAVASCRİPT İÇİN BUTON OLARAK BUTTON KULLAN SUBMİT 
								//KULLANMA
								
							 }
				
				if( icerik2 == "" )
							 {
								 document.getElementById("submit").setAttribute("type","button");
								$("input[name='soyad']").css({"border":"2px solid red"}).attr("placeholder","Boş Alanları Doldurunuz");
							
							 }
				if( icerik3 == "" )
							 {
								 document.getElementById("submit").setAttribute("type","button");
								$("input[name='eposta']").css({"border":"2px solid red"}).attr("placeholder","Boş Alanları Doldurunuz");
							
							 }
				if( icerik4 == "" )
							 {
								 document.getElementById("submit").setAttribute("type","button");
								$("input[name='konu']").css({"border":"2px solid red"}).attr("placeholder","Boş Alanları Doldurunuz");
							
							 }
				if( icerik5 == "" )
							 {
								 document.getElementById("submit").setAttribute("type","button");
								$("textarea[name='mesaj']").css({"border":"2px solid red"}).attr("placeholder","Boş Alanları Doldurunuz");
							
							 }
				
				
							 
				if (icerik1 !="" && icerik2 !="" && icerik3 !="" && icerik4 !="" && icerik5)
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
          <li><a href="index.php">ANASAYFA</a></li>
       
<!--2 adet dropdown menu-->
          <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
              Bireysel <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
            <li><a href="./login1/index.php">Giris Yap</a></li>
            <li><a href="./uyelik/bireyseluyeol.php">Uye Ol</a></li>
            </ul>
          </li>
 
           <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
              Ticari <span class="caret"></span>
            </a>
            <ul class="dropdown-menu disabled" role="menu">
            <li><a href="./login1/index.php">Giris Yap</a></li>
            <li><a href="./uyelik/ticariuyeol.php">Uye Ol</a></li>
            </ul>
          </li>
          
          
         
          
          
          
<!-- bitiş 2 adet dropdown menu-->      
          <li><a href="hakkimizda.php">HAKKIMIZDA</a></li>
          <li><a href="iletisim.php">İLETİŞİM</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container -->
</div><!--/.navbar -->
  
<!-- Begin page content -->
 <div align="center"><h2>Bizimle irtibata geçin...</h2></div>
  
<div class="container">
  <div class="col-sm-6 col-sm-offset-3">
	<?php
//script tag ile inputlara yazılan <a> gibi taglar siliniyor
if(isset($_POST['ad']) && isset($_POST['soyad']) && isset($_POST['eposta']) && isset($_POST['konu']) && isset($_POST['mesaj'])) {//veriler gönderildimi

     if(empty($_POST['ad']) || empty($_POST['eposta']) || empty($_POST['konu']) || empty($_POST['mesaj'])) {//gönderilen veriler boş mu dolumu
	      echo "<center>Lütfen Form Alanlarını Doldurunuz....</center>";
   } else {
      $ad = strip_tags($_POST['ad'])." ".strip_tags($_POST['soyad']);

	 
	  $eposta=$_POST['eposta'];
      $konu = strip_tags($_POST['konu']);
      $mesaj = strip_tags($_POST['mesaj']);
      $icerik = 'Ad: ' . $ad . '<br/>E-Posta: '. $eposta . '<br/>' . $mesaj;
	  $headers="From: harun tamokur <htamokur38@gmail.com>"."\r\n"."Cc:".$eposta;
      mail('htamokur38@gmail.com', $konu, $icerik,$headers); 
      echo "<center><h4>Mesajınız Gönderildi!<h4><p> <br>İletişim sayfasına yönlendiriliyorsunuz...</p></center> ";
	  echo '<meta http-equiv="refresh" content="6;URL=iletisim.php">
';
   }
} 

?>

				
   
        <form class="form-horizontal" role="form" method="post" action="mail.php">
   				 <div class="form-group">
      			  <label for="name" class="col-sm-2 control-label">İsim</label>
      				  <div class="col-sm-10">
       		     <input type="text" class="form-control" id="name" name="ad" placeholder="" value="">
       				  </div>
    			</div>
    					<div class="form-group">
        		 <label for="email" class="col-sm-2 control-label">Soyad:</label>
       				    <div class="col-sm-10">
            	 <input type="text" class="form-control" id="isim" name="soyad" placeholder="" value="">
       			 </div>
    				</div>
                    
                    
                <div class="form-group">
      			  <label for="name" class="col-sm-2 control-label">Mail:</label>
      				  <div class="col-sm-10">
       		     <input type="email" class="form-control" id="name" name="eposta" placeholder="" value="">
       				  </div>
    			</div>
               
               
               <div class="form-group">
        		 <label for="email" class="col-sm-2 control-label">Konu:</label>
       				    <div class="col-sm-10">
            	 <input type="text" class="form-control" id="isim" name="konu" placeholder="" value="">
       			 </div>
    				</div>
               
    				<div class="form-group">
      			  <label for="message" class="col-sm-2 control-label">Mesaj</label>
       				 <div class="col-sm-10">
          		  <textarea class="form-control" rows="4" name="mesaj"></textarea>
       				 </div>
    				</div>
    				
    				<div class="form-group">
      			  <div class="col-sm-10 col-sm-offset-2">
         		  <input type="submit" value="Gönder" id="submit" class="submit btn" />
                    </div>
            		</div>
	              </form>
                  
                
                </div>
                </div>
   
<div class="divider"> </div>
  <!--aradaki resim -->
<section class="bg-1">
  <div class="col-sm-6 col-sm-offset-3 text-center"></div>
</section>
   <!--//aradaki resim -->


<div class="divider" id="section4"></div>

<div class="row">
  <div class="col-md-8 col-md-offset-1">
  <p> buraya değer girilebilir</p>
  </div>
</div>
 </div>
<div id="footer">
  <div class="container">
    <p class="text-muted">Copyright© 2015 Harun Tamokur</p>
  </div>
</div>



	 

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js?sensor=false&extension=.js&output=embed"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>