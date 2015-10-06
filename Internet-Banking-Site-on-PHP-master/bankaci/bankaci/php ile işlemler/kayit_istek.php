<?php
//Dikkat TABLODAN TABLOYA VERİ AKTARIMI!!!!
$sil=isset($_POST['sil']);
$kaydet=isset($_POST['kaydet']);


@session_start();
$isim=$_SESSION['yadi'];

if(!$isim)
{
 header("location: uyari.php");
}






$baglan=mysql_connect("localhost","kullanici_central","sifre_central");
echo $baglan;

if(!$baglan) die ("veri tabanina bag yok");
mysql_select_db("veritabani_central",$baglan) or die("secilemedi");








//KULLANICI İSTEK TABLOSUNUN BİR KISMI uyeler_adi TABLOSUNA BİR KISMIDA uye_bilgi TABLOSUNA AKTARILIYOR
					
						
						
						if(isset($_POST['kaydet']) && isset($_POST['sil']) )
						{
							
							if(!empty($_POST['kaydet']) && !empty($_POST['sil'])){ include("ekle_uyari.php"); }
							
							
							
							
							
							
							
							
					} //dıştaki if bloğu kapatıldı
												 
												 		
						else if (!isset($_POST['sil']) && !isset($_POST['kaydet']))
						{
						
						
						include("ekle_uyari.php");
						
						}
						
						
						if(isset($_POST['kaydet']) && !isset($_POST['sil'])){
							$kontrol=1;//aynı kullanıcıdan var mı yok mu kontrolü 1 olunca yok demektir
						if((!empty($_POST['kaydet'])) && empty($_POST['sil'])){
							//aynı kullanıcıdan başka var mı uyeler_adi tablosunda kul_adi kısmını ve uye_bilgi tablosundaki kul_bilgi ile //çakışmıyorsa o zaman eklenir
				
							
							
							
							
										$sorgu=mysql_query("select * from kul_istek");
															while($veri=mysql_fetch_array($sorgu))
															{
																		$tckimlik=$veri['istek_tc'];
																	
																		$ad=$veri['ad_istek'];
																		$soyad=$veri['soyad'];
																		$sifre=$veri['sifre'];
																		$mail=$veri['mail'];
																		$tel=$veri['tel'];
																		$adres=$veri['adres'];
																		$kul_adi=$ad.$veri['id'];
																	
																	
																		$hesapbilgi="10000";
																		$banka_id="100000000"+$veri['id'];
																		
																		
																		$sql1="select tckimlik from uyeler_adi where tckimlik='$tckimlik'";
																		$veri1=mysql_query($sql1);
																		while($data1=mysql_fetch_array($veri1))
																		{
																				if($tckimlik==$data1['tckimlik'])
																				{
																					$kontrol=0;//aynı kullanıcıdan var mı yok mu kontrolü 0 olunca var demektir
																				}
																		}
																		
																		
																		if($kontrol==1)
																		{
																		mysql_query("INSERT INTO uyeler_adi (kul_adi,uye_sifre,tckimlik,hesapbilgi) values ('$kul_adi','$sifre','$tckimlik','$hesapbilgi')");
																		}
																	
															}//1. while kapatıldı
															if($kontrol==1)
															{
															mysql_close();
															echo "****ikinci tabloya yazdırılıyor********************";
															$baglan=mysql_connect("localhost","kullanici_central","sifre_central");
															echo $baglan;
															if(!$baglan) die ("veri tabanina bag yok");
																			mysql_select_db("veritabani_central",$baglan) or die("secilemedi");
																			$sorgu=mysql_query("select * from kul_istek");
																			while($veri=mysql_fetch_array($sorgu))
																			{
																						$tckimlik=$veri['istek_tc'];
																						echo $tckimlik;
																						$ad=$veri['ad_istek'];
																						echo "<br/> isim :".$ad."<br/>";
																						$soyad=$veri['soyad'];
																						$sifre=$veri['sifre'];
																						$mail=$veri['mail'];
																						$tel=$veri['tel'];
																						$adres=$veri['adres'];
																						$kul_adi=$ad.$veri['id'];
																						echo $kul_adi;
																						$hesapbilgi="10000";
																						$banka_id="100000000".$veri['id'];
																						echo $banka_id;
																						mysql_query("INSERT INTO uye_bilgi (tckimlik,banka_id,ad,soyad,adres,mail,tel) values        		('$tckimlik','$banka_id','$ad','$soyad','$adres','$mail','$tel')");
																						if(!$sorgu) die("Sorgu yazılmadı");
																			}//2. while kapatıldı
																			mysql_query("DELETE FROM kul_istek");
															
															
															}
															else{
																
																include("ekle_uyari2.php");
																
																
																}
															
															
													
										}
							else if($kontrol==0)
							{
							 echo "<br/>
																						<br/>
																						<br/>
																						<br/><br/>
																						<br/>
																						<br/>
																						<br/><p>Kaydedildi</p> ";
							}//empty kontrolü
							
							
						  		  }//if içteki bloğu kapatıldı else if yazıldı
						
						
						
						
// kaydedilmeden silindi------------------------------------------------------------------------------------			
						if(!isset($_POST['kaydet']) && (isset($_POST['sil']))){
						
						 if(empty($_POST['kaydet']) && (!empty($_POST['sil'])))
							{
							    mysql_query("DELETE FROM kul_istek");
							
							
							}
					
							
						}
							
		




?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Central BANK | Yönetim Paneli</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-from" href="index.php">
                   <img height="80" width="300" src="assets/img/logo.png" alt="" />
                </a>
            </div>
            <!-- end navbar-header -->
             <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
               
                
               
             

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                       
     
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Çıkış</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
  
                        <!-- user image section-->
                        <div class="user-section">
                        
                            <div class="user-section-inner">
                                <img src="assets/img/user.jpg" alt="">
                            </div>
                            <div class="user-info">
                                <div><?php echo $isim ; ?></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                   
                    <li class="divider">
                    <p><!--boşluk için eklendi--></p>
                    </li>
                    
                    <li>
                        
                     <li class="selected">
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i>Anasayfa</a>
                    </li>
                   
                     <li>
                        <a href="ayar.php"><i class="fa fa-flask fa-fw"></i>Site Ayar</a>
                    </li>
                   
                    
                 
                    <li>
                        
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-files-o fa-fw"></i>Kullanıcı Bilgileri<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           
                            <li>
                                <a href="listele.php">Kullanıcıları Listele</a>
                            </li>
                            <li>
                                <a href="istek.php">Kullanıcı Talepleri</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                </ul>
                <!-- end side-menu -->
          </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Central BANK | Müşteri Yönetim Paneli</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp; <?php echo $isim.", Yönetim Paneline Hoşgeldiniz"."<br/>Bilgiler Eklendi!" ?>  
                    </div>
                </div>
                <!--end  Welcome -->
            </div>


            <div class="row">
               
            </div>

            <div class="row">
                <div class="col-lg-12">



                    <!--Area chart example -->
                  
                    
                    <div class="panel panel-primary"> <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Tc No</th>
                                                    <th>İsim</th>
                                                    <th>Soyisim</th>
                                                    <th>Şifre</th>
                                                    <th>Mail</th>
                                                    <th>Tel</th>
                                                    <th>Adres</th>
                                                </tr>
                                            </thead>
                                            <tbody>       
                                          
                                                            
                                                  <tr>
                                                  
                                                  
                                                    <?php 
											$baglan=mysql_connect("localhost","kullanici_central","sifre_central");
											if(!$baglan) die("Baglanti Kurulumadi");
											if(!mysql_select_db("veritabani_central")) die("veri tabani secilemedi");
											
											$veri=mysql_query("select * from kul_istek");
											
										
											while($yveri=mysql_fetch_assoc($veri))
											{
											
											
											
											
											?>
                                                  
                                                  
                                                  <th><?php echo $yveri['id']  ?>
                                                  </th>
                                                  <th><?php echo $yveri['istek_tc']  ?>
                                                  </th>
                                                  <th><?php echo $yveri['ad_istek']  ?>
                                                  </th>
                                                  <th><?php echo $yveri['soyad']  ?>
                                                  </th>
                                                  <th><?php echo $yveri['sifre']  ?>
                                                  </th>
                                                  <th><?php echo $yveri['mail']  ?>
                                                  </th>
                                                  <th><?php echo $yveri['tel']  ?>
                                                  </th>
                                                  <th><?php echo $yveri['adres']  ?>
                                                  </th>
                                                  </tr>  
                                                  
                                                  <?php
                                                  
											        }
												  ?>
                                                                                                  
                                                  <tr/>
                                            </tbody>
                                        </table></div>
                                 <form name="form" method="post" action="kayit_istek.php">
                                  <input type="checkbox" name="sil" id="Sil">
                                  <label for="kontrol">Sil</label>
                                  
                                    <input type="checkbox" name="kaydet" id="Kaydet">
                                  <label for="kontrol">Kaydet</label>
                                  
                                   <button type="submit" >Gönder</button>
                                </form>

                             
                                        
                    <!--End area chart example -->
                   

                </div>
 
                

            </div>

            <div class="row">
                <div class="col-lg-4">
                    <!--boş şablon-->
                </div>
                <div class="col-lg-4">
                  <!--boş şablon-->
                </div>
                <div class="col-lg-4">
                  <!--boş şablon-->
                </div>
            </div>


        <!--//boş kısım--> 


        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>

</body>

</html>
