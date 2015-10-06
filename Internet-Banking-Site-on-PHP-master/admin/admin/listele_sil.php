<?php



session_start();
$isim=$_SESSION['yonet'];

if(!$isim)
{
 header("location: uyari.php");
}


mysql_connect("localhost","kullanici_central","sifre_central");
mysql_select_db("veritabani_central");
mysql_query("SET NAMES 'UTF8'");


if(isset($_POST['sil'])) {
    $silinecekler = implode(', ', $_POST['sil']);
  	//echo "<br><br><br><br><br><br>silinecekler== ".$silinecekler."<br>";
	
	
	
	mysql_query('DELETE FROM panel_bilgi WHERE p_tckim IN ( ' . $silinecekler . ' )');
    mysql_query('DELETE FROM panel_kul WHERE p_tckim IN ( ' .$silinecekler . ' )');
	
   
	//echo count($_POST['sil']) . ' adet istek silindi.';
}







?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Yönetici Paneli</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Yönetici Paneli</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
             
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin (<?php echo $isim; ?>) <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                     
                       
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i>Çıkış Yap</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Anasayfa</a>
                    </li>
                   
                    <li>
                        <a href="ekle.php"><i class="fa fa-fw fa-edit"></i> Yönetici Ekle</a>
                    </li>
                    <li>
                        <a href="guncelle.php"><i class="fa fa-fw fa-edit"></i> Bilgilerimi Güncelle</a>
                    </li>
                  
                   
                  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                      Anasayfa</h1>
                        
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>
                            <?php echo $isim.", Yönetim Paneline Hoşgeldiniz...  ";
						
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
						echo " ".$yenitarih;
						
						 ?>  
                       'den beri gelmiyorsunuz...</strong>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
<!-- comment kısımları engellendi-->
                 <!-- <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                  <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">26</div>
                                        <div>New Comments!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">12</div>
                                        <div>New Tasks!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">124</div>
                                        <div>New Orders!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">13</div>
                                        <div>Support Tickets!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>--!>
                <!-- /.row -->
                

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Uygulama Yöneticileri</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                 <?php
								$sayac=0;
								$yonet_sorgu=mysql_query("select * from panel_kul inner join panel_bilgi on panel_kul.p_tckim = panel_bilgi.p_tckim");
				
								
								
								
								
								
								
								
							?>
                                
                                
                                
                                  <form action="listele_sil.php" method="post">  
                                
                                
                                
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                             	<th></th>
                                                <th>TC Numarası</th>
                                                <th>Ünvan</th>
                                                <th>İsim</th>
                                                <th>Soyad</th> 
                                                <th>Adres</th>
                                                <th>Telefon</th>
                                                <th>Mail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <?php while($yonet_veri=mysql_fetch_array($yonet_sorgu))
								{
								
								 ?>
                                            	<th><label><input type="checkbox" name="sil[]" value="<?php echo $yonet_veri['p_tckim']; ?> 
			"/> </label><br/>
                                                  </th>
                                                <td><?php echo $yonet_veri['p_tckim']; ?></td>
                                                <td><?php if($yonet_veri['kul_yetki']==1){echo "Yönetici";} else {echo "Bankacı";} ?></td>
                                                <td><?php echo $yonet_veri['adi_kul']; ?></td>
                                                <td><?php echo $yonet_veri['soy_kul']; ?></td>
                                                <td><?php echo $yonet_veri['adres_kul']; ?></td>
                                                <td><?php echo $yonet_veri['tel_kul']; ?></td>
                                                <td><?php echo $yonet_veri['mail_kul']; ?></td>
                                            
                                           
                                            </tr>
                                          
                                             <?php } ?>
                                               
                                          
                                          
                                          
                                          
                                           
                                        </tbody>
                                    </table>
                                    
                                    
                                    
                                    <input type="submit" value="Seçilileri sil">      
                                                 
                           </form>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                   
                    
                    <div class="col-lg-4">
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
