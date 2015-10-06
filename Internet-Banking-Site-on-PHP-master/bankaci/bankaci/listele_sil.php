<?php

session_start();
$isim=$_SESSION['yadi'];

if(!$isim)
{
 header("location: uyari.php");
}




include("../../class/veritabani.php");
$veri= new veritabani();
$veri->vtAdi="veritabani_central";
$veri->vtKullanici="kullanici_central";
$veri->vtServer="localhost";
$veri->vtSifre="sifre_central";
$veri->baglan();


if(isset($_POST['sil'])) {
    $silinecekler = implode(', ', $_POST['sil']);
  	//echo "<br><br><br><br><br><br>silinecekler== ".$silinecekler."<br>";
	
	$sorgu2=mysql_query('SELECT tckimlik FROM uyeler_adi where uye_id IN ('.$silinecekler.')');
	//var_dump($sorgu2);
	
	while($veri2=mysql_fetch_array($sorgu2)){
	$tckimlik=$veri2['tckimlik'];
	//echo "Tc Kimlik: ".$veri2['tckimlik']."<br>";
	mysql_query('DELETE FROM uyeler_adi WHERE uye_id IN ( ' . $silinecekler . ' )');
    mysql_query('DELETE FROM uye_bilgi WHERE tckimlik IN ( ' . $tckimlik . ' )');
	}
   
	//echo count($_POST['sil']) . ' adet istek silindi.';
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
                        <i class="fa fa-folder-open"></i><b>&nbsp; <?php echo $isim.", Yönetim Paneline Hoşgeldiniz" ?>  
                    </div>
                </div>
                <!--end  Welcome -->
            </div>


            

            <div class="row">
                <div class="col-lg-12">



                    
                    <!--Simple table example -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i>Kullanıcı Listesi
                            
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-14">
                                    <div class="table-responsive">
                                      <form action="listele_sil.php" method="post">   
                                       
                                       
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                  <th></th>
                                                    <th>Tc No</th>
                                                    <th>İsim</th>
                                                    <th>Soyisim</th>
                                                    <th>Hesap Bilgisi</th>
                                                    <th>Adres</th>
                                                    <th>Mail</th>
                                                    <th>Telefon</th>
                                                </tr>
                                            </thead>
                                            <tbody>                       
                                                     <tr>
                                                     <?php
													 $query="SELECT * FROM uyeler_adi INNER JOIN uye_bilgi ON uyeler_adi.tckimlik=uye_bilgi.tckimlik";
//hey maş. :D
$sorgu=mysql_query($query);
													 while($yveri=mysql_fetch_array($sorgu))
													 {
													
													 
													 
													 ?>
                                                     
                                                     
                                                     
                                                  
                                                  <th><label><input type="checkbox" name="sil[]" value="<?php echo $yveri["uye_id"]; ?> 
			"/> </label><br/>
                                                  </th>
                                                  <th><?php echo $yveri['tckimlik']  ?>
                                                  </th>
                                                  <th><?php echo $yveri['ad']  ?>
                                                  </th>
                                                  <th><?php echo $yveri['soyad']  ?>
                                                  </th>
                                                  <th><?php echo $yveri['hesapbilgi']  ?>
                                                  </th>
                                                  <th><?php echo $yveri['adres']  ?>
                                                  </th>
                                                  <th><?php echo $yveri['mail']  ?>
                                                  </th>
                                                   <th><?php echo $yveri['tel']  ?>
                                                  </th>
                                                  </tr>  
                                                  
                                                  <?php   }
														 mysql_close();
														 ?>
                                                                                                  
                                                 
                                            </tbody>
                                        </table>     
                            <input type="submit" value="Seçilileri sil">      
                                                 
                           </form>
                            </div>  
                              
                                    </div>

                                </div>

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!--End simple table example -->

                </div>
							<!--  <div class="col-lg-4"  />
                             	 <div class="panel panel-primary">
                       						 <div class="panel-heading">
                           						 <i class="fa fa-bar-chart-o fa-fw"></i>Kayıt Sil
                            							
                                <form class="form-horizontal" role="form" method="post" action="uye_sil.php">
                                                                 <div class="form-group">
                                                                  <label for="name" class="col-sm-2 control-label">TC Kimlik: </label>
                                                                      <div class="col-sm-10">
                                                                 <input type="text" class="form-control" id="name" name="tckimlik" placeholder="" value="">
                                                                      </div>
                                                                </div>
                                                                   
                                                                   
                                                                <div class="form-group">
                                                                  <label for="name" class="col-sm-2 control-label">Banka No:</label>
                                                                      <div class="col-sm-10">
                                                                 <input type="text" class="form-control" id="name" name="bankano" placeholder="" value="">
                                                                      </div>
                                                                </div>
                                                                
                                                                    <div class="form-group">
                                                                      <div class="col-sm-10 col-sm-offset-2">
                                                                      <p> Silmek için TC Kimlik Numarası yada Banka Numarası Giriniz </p>
                                                                       <input id="submit" name="submit" type="submit" value="Gönder" class="btn btn-primary">
                                                                        </div>
                                                                        </div>
                                                                                                                        
                                                                 
                                                                   
                                                                <div class="form-group">
                                                                    <div class="col-sm-10 col-sm-offset-2">
                                                                        <! Will be used to display an alert to the user>
                                                                    </div>
                                                                </div>
                                                      </form>
                                                        
                                                                               		                
                                                     
                                                        
                                                                                                        
                                                               
                                                        
                                                        
                                                        
                            							
                            							
                            							
                       							 </div>
                                         
              				  </div>
                -->
                    <!-- <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body blue">
                            <i class="fa fa-pencil-square-o fa-3x"></i>
                            <h3>2,060 </h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Pending Orders Found
                            </span>
                        </div>
                    </div>
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body green">
                            <i class="fa fa fa-floppy-o fa-3x"></i>
                            <h3>20 GB</h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">New Data Uploaded
                            </span>
                        </div>
                    </div>
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body red">
                            <i class="fa fa-thumbs-up fa-3x"></i>
                            <h3>2,700 </h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">New User Registered
                            </span>
                        </div>
                    </div> -->







                </div>

            </div>

            <div class="row">
                <div class="col-lg-4">
                    
                </div>
                <div class="col-lg-4">
                  
                </div>
                <div class="col-lg-4">
                  
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
