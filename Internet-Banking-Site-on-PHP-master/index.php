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


 
  
<div class="container">
      
      
      <div class="row">
        <div class="col-md-9"><div class="well">
        
     <img height="300" width="350"  vspace="15" hspace="15" border="0" align="left" src="./resim/resimgoster.php?id=1" />
        <h2> Central BANK Kredi </h2>
								<?php
								
                                	include("./class/veritabani.php");
						
									$taban=new veritabani();
						
					
									$taban->vtServer="localhost";
									$taban->vtKullanici="kullanici_central";
									$taban->vtSifre="sifre_central";
									$taban->vtAdi="veritabani_central";
									$taban->baglan();
												
								
                                	$sorgu="SELECT icerik FROM siteayar";
							
									$veri=mysql_fetch_array(mysql_query($sorgu));
									echo $veri['icerik'];
                                ?>
                           
        
        
        						
        
        
        </div></div>
        
      	<div class="col-md-3">
        	<div class="well"> 
               
                                <?php
                                //Merkez Bankasından Kur Bilgilerini Çekme
                                $dosya= simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml');
                                foreach ($dosya->Currency as $Currency) {
                                // Dolar ALIŞ-SATIŞ
                                
                                if ($Currency['Kod']=="USD") {$usd_satis=$Currency->BanknoteSelling; $usd_alis=$Currency->BanknoteBuying; }
                                // EURO ALIŞ-SATIŞ
                                if ($Currency['Kod']=="EUR") {$euro_satis=$Currency->BanknoteSelling; $euro_alis=$Currency->BanknoteBuying; }
                                if ($Currency['Kod']=="GBP") {$gbp_satis=$Currency->BanknoteSelling; $gbp_alis=$Currency->BanknoteBuying; }
                                if ($Currency['Kod']=="CHF") {$chf_satis=$Currency->BanknoteSelling; $chf_alis=$Currency->BanknoteBuying; }
                                if ($Currency['Kod']=="SEK") {$sek_satis=$Currency->BanknoteSelling; $sek_alis=$Currency->BanknoteBuying; }
                                if ($Currency['Kod']=="CAD") {$cad_satis=$Currency->BanknoteSelling; $cad_alis=$Currency->BanknoteBuying; }
                                
                                
                                }
                                ?>
                                  <h4>  Döviz Kurları </h4>   
                               
                                <div ><?php echo " USD Satış Fiyatı \n".$usd_alis ?></div>
                                <div ><?php echo " USD Satış Fiyatı \n".$usd_satis ?></div>
                                
                                <div ><?php echo "EURO Satış Fiyatı \n".$euro_alis ?></div>
                                <div ><?php echo "EURO Satış Fiyatı \n".$euro_satis ?></div>
                                <div ><?php echo " İngiliz Sterlini Satış Fiyatı \n".$gbp_alis ?></div>
                                <div ><?php echo " İngiliz Sterlini Alış Fiyatı \n".$gbp_satis ?></div>
                                <div ><?php echo " İsviçre Frangı Alış Fiyatı \n".$chf_alis ?></div>
                                <div ><?php echo " İsviçre Frangı Satış Fiyatı \n".$chf_satis ?></div>
                                <div ><?php echo " İsveç Kronu Alış Fiyatı \n".$sek_alis ?></div>
                                <div ><?php echo " İsveç Kronu Satış Fiyatı \n".$sek_satis ?></div>
                                <div ><?php echo " Kanada Doları Alış Fiyatı \n".$cad_alis ?></div>
                                <div ><?php echo " Kanada Doları Satış Fiyatı \n".$cad_satis ?></div>
                                
                                           
            		
            
              <!--araya çekilen beyaz çizgi-->
              <hr style="height:2px;border:none;color:#FFF;background-color:#FFF;" />
              <!--///(aradaki)araya çekilen beyaz çizgi-->
                 <!--takvim-->
                <h4> Takvim </h4> 
                
                
                <?php
				
				$takvim='	
						
			
							<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
								
							<style>
								.ui-datepicker {
								/*what ever width you want*/
								 font-size:13px;
								}
							</style>
							<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
							<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
							<script type="text/javascript" src="http://jqueryui.com/ui/i18n/jquery.ui.datepicker-tr.js"></script>
							<script type="text/javascript">
							
							$(document).ready(function($){
				
								$("#tarih").datepicker($.datepicker.regional["tr"]).width().height();
							});
							</script>
						
							
							<div id="tarih">   </div> 
							';//function($) ile ekrana basıyor
				echo $takvim;
				
				?>
            
        
              
                <!--//takvim-->
              
              
                     
            </div>
        </div>
      </div>
      
      
        
</div>
        
        
        
         
 <!--///sağ kutu-->       
        
       
        
        
      
      
      
      
      
  
<div class="container">
      
      
      <div class="row">
        <div class="col-md-5">
        
        
        
        <div class="well2">
        <h4>Milliyet Güncel Haber Bülteni </h4>
  
     		<?php

			$icerik = file_get_contents('http://www.milliyet.com.tr/ekonomi/');			
			
			preg_match('/<div class="haberRight"[^>]*>(.*?)<\/ul><\/div>/i', $icerik, $sonuc);//? 0 ya da bir karakter bulur
			
			$degree = $sonuc[0]; 
			
			echo $degree;
			
			
			?>
            
          
            
            
            
		
        <p>Central BANK ile kredi almak artık çok kolay...</p>
        </div></div>
     
        <!--<div class="col-md-4">
        <div class="well2">
      
     	<h4>  Piyasa Verileri </h4> 
        
		
          <?php
               /* 
                $site= "http://finans.mynet.com/";
                $content = file_get_contents($site);				
               
                preg_match_all('/<table class="fnSmallTable">(.*?)<\/table>/si', $content, $sonuc);//? 0 ya da bir karakter bulur
              
                var_dump($sonuc);
				if(isset($sonuc)){
				if(isset($sonuc[0][0]))
				{
					$gecici=$sonuc;//gecici herhangi bir durumda veri çekilememesi sonucunda oluşturulmuştur. 
					//bot verileri sayfaya her tıkladığında çekemezse o halde gecici den çekecektir. Eğer sayfaya veri
					//gelirde veri güncellenirse yine güncel veri gösterilecektir.
					
				
					
				}
				else if(isset($sonuc[0][1]))
				{
					$gecici=$sonuc;
				
					
				}
				}
				
				if(isset($gecici[0][0]))
				{
				echo $gecici[0][0];	
				}
				else if(isset($gecici[0][1]))
				{
				echo $gecici[0][1];	
				}
				*/
				
				
				
                
                
                ?>   
        
        
			    
     
        
        
        
        
        
        
        
       
        <p>Central BANK ile kredi almak artık çok kolay...</p>
        </div>
      </div>-->
       
        <div class="col-md-3">
        <div class="well2">
         <h4>  Hava Durumu </h4> 
							<?php
	
							$content = file_get_contents('http://www.mgm.gov.tr/tahmin/il-ve-ilceler.aspx?m=ISTANBUL');				
							// Derece
							preg_match_all('/<em class="renk[a-zA-Z\s]{3,11}">(.+)C<\/em>/si', $content, $results);//c santigrattaki cdir
							// İlk eşleşeni alıyoruz
							//değiştirildi....sabah ile gündüz class ismi değiştirildiği için
							$degree = $results[0][0]; 
							// ikon ve açıklama
							preg_match_all('/"([\wÇŞİĞÜÖöçşğüı ]+)" rowspan="2"><img src="\.\.([\w\/\.-]+)"/si', $content, $results);
							$description = $results[1][0];
							$image = 'http://www.mgm.gov.tr' . $results[2][0];
							if($description=="AÇIK")
							{
							 $description="acik";	
							}
							echo $degree . ' ' . $description;
							echo '<img src="' . $image . '" />';
							
							?>
      <p>Central BANK ile kredi almak artık çok kolay...</p>
        </div>
      
        </div></div>
      </div>
       </div>
       
        
</div>
        
        
        
       

<!--burası-->
    
<div class="divider"></div>
  <!--aradaki resim -->
<section class="bg-1">
  <div class="col-sm-6 col-sm-offset-3 text-center"></div>
</section>
   <!--//aradaki resim -->


<div class="divider" id="section4"></div>

<div class="row">
  <div class="col-md-8 col-md-offset-1">
  <p> Central Online Bankacılık  © </p>
  </div>
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