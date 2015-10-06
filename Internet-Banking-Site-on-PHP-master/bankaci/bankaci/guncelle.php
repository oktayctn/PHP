<?php



session_start();
$isim=$_SESSION['yadi'];

if(!$isim)
{
 header("location: uyari.php");
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
                <a class="navbar-form" href="index.php">
                   <img height="80" width="300" src="assets/img/logo.png" alt="" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                <li class="dropdown">
                    
                  
                </li>

                
                </li>

             

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
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="assets/img/user.jpg" alt="">
                            </div>
                            <div class="user-info">
                                <div><?php echo $isim ; ?></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="divider">
                    <p><!--boşluk için eklendi--></p>
                    </li>
                    
                    <li>
                        
                     <li>
                        <a href="index.php"><i class="fa fa-flask fa-fw"></i>Anasayfa</a>
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
                    
                    
                    <li>
                        <a href="guncelle.php"><i class="fa fa-flask fa-fw"></i>Bilgilerimi Güncelle</a>
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
                        <i class="fa fa-folder-open"></i><b>&nbsp; <?php echo $isim.", Yönetim Paneline Hoşgeldiniz...  ";
						
						include("../../class/veritabani.php");
						
						$taban=new veritabani();
						
					
						$taban->vtServer="localhost";
						$taban->vtKullanici="kullanici_central";
						$taban->vtSifre="sifre_central";
						$taban->vtAdi="veritabani_central";
						$taban->baglan();
						
						$bilgi=mysql_query("SELECT son_giris FROM panel_kul where kul_adi='$isim'");
						
						$veri=mysql_fetch_array($bilgi);
						//nesne haline getiripte yazdırma
						//mysql_fetch_object($bilgi);
						//echo $veri->son_giris;
						
						
						
						$yenitarih = date("d-m-Y", strtotime($veri['son_giris']));
						echo " ".$yenitarih. "'den beri gelmiyorsunuz.";
						
						 ?>  
                    </div>
                </div>
                <!--end  Welcome -->
            </div>


            <div class="row">
               
            </div>

            <div class="row">
                <div class="col-lg-8">



                    <!--Area chart example -->
                    
                    
                    
                      <?php
								$sayac=0;
								$aktif_sorgu=mysql_query("Select uye_bilgi.ad,uye_bilgi.soyad,uye_bilgi.tckimlik,uye_bilgi.banka_id,uyeler_adi.hesapbilgi from uyeler_adi inner join uye_bilgi on uye_bilgi.tckimlik=uyeler_adi.tckimlik where aktif='1'");
				
								
								//echo '<hr style="height:2px;border:none;color:#FFF;background-color:#444;" />';
								//echo "Online Kişi Sayısı= ".$sayac;
								
								
								
							?>
    <!-- panel sonu...--->        
    							
                    
    <!--// panel sonu...--->                
                   
                </div>

                
			

            </div>

            <div class="row">
                <div class="col-md-12">	
                            <div class="panel panel-primary"> 
                                                        <div class="panel-heading">
                                                            <i class="fa fa-bar-chart-o fa-fw"></i>Bilgilerimi Güncelle
                                                        </div>
                                <div class="panel-body">
                 <?php    
				$sorgu2=mysql_query("Select * from panel_kul inner join panel_bilgi on panel_kul.p_tckim=panel_bilgi.p_tckim where kul_yetki='0' and kul_adi='$isim'");
				$veri2=mysql_fetch_array($sorgu2);
				 
				 ?>       
                <form class="form-horizontal" role="form" method="post" action="guncelle_kayit.php">
                
                <div class="form-group">
        		 <label for="email" class="col-sm-2 control-label">Ad:</label>
       				    <div class="col-sm-9">
            	 <input type="text" class="form-control" id="bankano" name="adi" placeholder="" value="<?php echo $veri2['adi_kul'];?>">
       			 </div>
    				</div>
                
                
                <div class="form-group">
        		 <label for="email" class="col-sm-2 control-label">Soyad:</label>
       				    <div class="col-sm-9">
            	 <input type="text" class="form-control" id="tckimlik" name="soyadi" placeholder="" value="<?php echo $veri2['soy_kul'];?>">
       			 </div>
    				</div>
                
                
   				 <div class="form-group">
      			  <label for="name" class="col-sm-2 control-label">Mail:</label>
      				  <div class="col-sm-9">
       		     <input type="text" class="form-control" id="isim" name="mail" placeholder="" value="<?php echo $veri2['mail_kul'];?>">
       				  </div>
    			</div>  
                <div class="form-group">
      			  <label for="name" class="col-sm-2 control-label">Telefon:</label>
      				  <div class="col-sm-9">
       		     <input type="text" class="form-control" id="isim" name="tel" placeholder="" value="<?php echo $veri2['tel_kul'];?>">
       				  </div>
    			</div>  
                
    						<div class="form-group">
      			  <label for="message" class="col-sm-2 control-label">Adres:</label>
       				 <div class="col-sm-9">
          		  <textarea class="form-control" rows="4" name="adres" ><?php echo htmlspecialchars($veri2['adres_kul']);?></textarea>
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

            </div>



            </div>


         


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
