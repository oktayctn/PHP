<?php



session_start();
$isim=$_SESSION['yonet'];

if(!$isim)
{
 header("location: uyari.php");
}

@$ad=$_POST['adi'];
@$soyad=$_POST['soyadi'];
@$mail=$_POST['mail'];
@$telefon=$_POST['tel'];
@$adres=$_POST['adres'];






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
						
						$bilgi=mysql_query("SELECT son_giris,p_tckim FROM panel_kul where kul_adi='$isim'");
						
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
                             
                <form class="form-horizontal" role="form" method="post" action="guncelle_kayit.php">
                
                <div class="form-group">
        		
                <?php  
				
				$tckimlik=$veri['p_tckim'];
				
				if(!empty($ad) && !empty($soyad) && !empty($soyad) && !empty($adres) && !empty($telefon) && !empty($mail) )
				{
				
				mysql_query("Update panel_bilgi set adi_kul='$ad', soy_kul='$soyad' ,adres_kul='$adres',tel_kul='$telefon',mail_kul='$mail' where p_tckim='$tckimlik'") or die ("başarısız");
				echo "<center><p>Bilgileriniz başarılı bir şekilde güncellendi...</p></center>";
				
				}
				else 
				{
				echo "<center><p>Lütfen form alanlarını boş bırakmayınız....</p></center>";
				
				}
				
				$sorgu=mysql_query("Select * from panel_bilgi inner join panel_kul on panel_bilgi.p_tckim=panel_kul.p_tckim where kul_adi='$isim'");
				$veri=mysql_fetch_array($sorgu);
				
				 ?>
                
                 <label for="email" class="col-sm-2 control-label">Ad:</label>
       				    <div class="col-sm-9">
            	 <input type="text" class="form-control" id="bankano" name="adi" placeholder="" value="<?php echo $veri['adi_kul'];?>">
       			 </div>
    				</div>
                
                
                <div class="form-group">
        		 <label for="email" class="col-sm-2 control-label">Soyad:</label>
       				    <div class="col-sm-9">
            	 <input type="text" class="form-control" id="tckimlik" name="soyadi" placeholder="" value="<?php echo $veri['soy_kul'];?>">
       			 </div>
    				</div>
                
                
   				 <div class="form-group">
      			  <label for="name" class="col-sm-2 control-label">Mail:</label>
      				  <div class="col-sm-9">
       		     <input type="text" class="form-control" id="isim" name="mail" placeholder="" value="<?php echo $veri['mail_kul'];?>">
       				  </div>
    			</div>  
                <div class="form-group">
      			  <label for="name" class="col-sm-2 control-label">Telefon</label>
      				  <div class="col-sm-9">
       		     <input type="text" class="form-control" id="isim" name="tel" placeholder="" value="<?php echo $veri['tel_kul'];?>">
       				  </div>
    			</div>  
                
    						<div class="form-group">
      			  <label for="message" class="col-sm-2 control-label">Adres:</label>
       				 <div class="col-sm-9">
          		  <textarea class="form-control" rows="4" name="adres" ><?php echo htmlspecialchars($veri['adres_kul']);?></textarea>
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
                <!-- /.row -->

                <div class="row">
                   <?php mysql_close(); ?>
                    
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
