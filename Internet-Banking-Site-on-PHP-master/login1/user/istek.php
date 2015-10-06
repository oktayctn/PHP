
<?php


//----ip adresleri tutuluyor--------------
include("../.././function/sayac.php");
///---///ip adresleri tutuluyor------------------

include("../../class/veritabani.php");
include("../../class/query.php");

session_start();
$isim=$_SESSION['Padi'];
//------bağlantı
$vt = new veritabani();
$vt->vtAdi = "veritabani_central";
$vt->vtServer = "localhost";
$vt->vtKullanici = "kullanici_central";
$vt->vtSifre = "sifre_central";
$vt->baglan();
//-----bağlanti//////


//kullanıcı aktivitesi
$aktif=1;
mysql_query("UPDATE uyeler_adi SET aktif='$aktif' where kul_adi='$isim'");


///------------kullanıcı aktivitesi



			
				
				if(empty($isim))
				{
				 header("location: uyari.php");
				}
				else{
                
				
				
				$veri1=mysql_fetch_array(mysql_query("SELECT tckimlik FROM uyeler_adi WHERE kul_adi='$isim' "));
				$veri2=mysql_fetch_array(mysql_query("SELECT uye_bilgi.ad,uye_bilgi.soyad,uye_bilgi.banka_id,uyeler_adi.hesapbilgi FROM uyeler_adi inner join uye_bilgi on uye_bilgi.tckimlik=uyeler_adi.tckimlik  where uyeler_adi.kul_adi='$isim'   "));
		
               $tarih=mysql_fetch_array(mysql_query("Select son_giris from uyeler_adi where kul_adi='$isim'  "));
			   
		
			   
				}


?>




<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Central BANK</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="bireysel.php"><?php echo $isim." ". $veri2['soyad']; ?></a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> 		<?php 

								$yenitarih = date("d-m-Y", strtotime($tarih[0]));
								echo "Son Giriş ".$yenitarih;  
								
						?> 



&nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Çıkış</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a href="bireysel.php"><i class="fa fa-dashboard fa-3x"></i> Anasayfa</a>
                        <a  href="istek.php"><i class="fa fa-square-o fa-3x"></i> Kredi İsteği</a>
                         <a  href="guncelle.php"><i class="fa fa-square-o fa-3x"></i> Bilgilerimi Güncelle</a>
                    </li>
                    
                  
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Central | Bank Online, Hoşgeldiniz...</h2>   
                        <h5><?php echo "<br> Sayın, ".$isim." ".$veri2['soyad']; ?>
						<?php
				echo "<br/>". "TCKimlik No:". $veri1['tckimlik'];
				?> </h5>
                    </div>
                </div>              
                               
              
 
 
   <!--///tablo--> 
 <div class="container">    
 <div class="row">
                 
                  <div class="col-md-7 ">
     
                    <!--kredi isteği-->
                     <div class="panel panel-default ">
                        <div class="panel-heading">
                           Kredi İsteği
                        </div>
                        <div class="panel-body">
     			<form class="form-horizontal" role="form" method="post" action="istek_kayit.php">
                
   				 <div class="form-group">
      			  <label for="name" class="col-sm-2 control-label">İsim</label>
      				  <div class="col-sm-9">
       		     <input type="text" class="form-control" id="isim" name="isim" placeholder="" value="">
       				  </div>
    			</div>
    					<div class="form-group">
        		 <label for="email" class="col-sm-2 control-label">Soyad:</label>
       				    <div class="col-sm-9">
            	 <input type="text" class="form-control" id="soyad" name="soyad" placeholder="" value="">
       			 </div>
    				</div>
                    <div class="form-group">
        		 <label for="email" class="col-sm-2 control-label">TC Kimlik:</label>
       				    <div class="col-sm-9">
            	 <input type="text" class="form-control" id="tckimlik" name="tckimlik" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
       			 </div>
    				</div>
                    
                    <div class="form-group">
        		 <label for="email" class="col-sm-2 control-label">Banka Numarası:</label>
       				    <div class="col-sm-9">
            	 <input type="text" class="form-control" id="bankano" name="bankano" placeholder="" value="Başında TR olmadan banka numarasını giriniz.">
       			 </div>
    				</div>
                    <div class="form-group">
        		 <label for="email" class="col-sm-2 control-label">Miktar:</label>
       				    <div class="col-sm-9">
            	 <input type="text" class="form-control" id="miktar" name="miktar" placeholder="" value="">
       			 </div>
    				</div>
  
    				<div class="form-group">
      			  <label for="message" class="col-sm-2 control-label">Mesaj</label>
       				 <div class="col-sm-9">
          		  <textarea class="form-control" rows="4" name="mesaj"></textarea>
       				 </div>
    				</div>
    				
    				<div class="form-group">
      			  <div class="col-sm-9 col-sm-offset-2">
         		   <input id="submit" name="submit" type="submit" value="Gönder" class="btn btn-primary">
                    </div>
            		</div>
	              </form>
     						
            			 </div>
                    </div>
                    <!--//kredi isteği-->
                    
                    
                  </div>
     <!--///tablo-->  
     
      
               
                   
               
                 
     <!-- sağ kutu -->              
                  
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
                                
                                           
            		
            
            
              <hr style="height:2px;border:none;color:#FFF;background-color:#FFF;" />
              <!--araya çekilen beyaz çizgi-->
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
              
              
                     
            </div>
        </div>
 
      </div>
      
      <!--<div class="row">
      <div class="col-md-4">
        <div class="well2">
        <h3>Piyasa Verileri</h3>
        
        
        <?php
             /*   
                $site= "http://finans.mynet.com/";
                $content = file_get_contents($site);				
               
                preg_match_all('/<table class="fnSmallTable">(.*?)<\/table>/si', $content, $sonuc);//? 0 ya da bir karakter bulur
              
               // var_dump($sonuc);
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
        
     
      </div>
      </div>-->
      
      
      <div class="col-md-4">
        <div class="well2">
          <h3>Hava Durumu</h3>
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
        
        
      </div>
      </div>
      
      </div>
        
</div>
        
        
        
         
 <!--///sağ kutu-->       
        
       
              
                     
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   

</body>
</html>
