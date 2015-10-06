<?php



session_start();
$isim=$_SESSION['yonet'];

if(!$isim)
{
 header("location: uyari.php");
}


$baglan=mysql_connect("localhost","kullanici_central","sifre_central");
mysql_select_db("veritabani_central");
mysql_query("SET NAMES 'UTF8'");
$tckimlik=$_POST['tckimlik'];
$gel_isim=$_POST['isim'];
$soyad=$_POST['soyad'];
$kul_adi=$_POST['kul_adi'];
$gsifre=$_POST['sifre'];
$sifre=md5($gsifre);
$adres=$_POST['adres'];
$numara=$_POST['telefon'];
$mail=$_POST['mail'];






if($_POST['secim']=="Yönetici")
{
$yetki=1;

}
else if($_POST['secim']=="Bankacı")
{
$yetki=0;
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin <?php echo $isim; ?> <b class="caret"></b></a>
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
                      Yönetici Ekle</h1>
                       
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong><?php echo $isim.", Yönetim Paneline Hoşgeldiniz...  ";
						
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
						
						 ?>  'den beri gelmiyorsunuz..</strong>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

              
                <!-- /.row -->

                <div class="row">
                    
                </div>
                <!-- /.row -->

                <div class="row">
                   
                    <div class="col-lg-2">
                      <h2> </h2>
                    </div>
                    
                    
                    
                    
                      <div class="col-md-7 ">
     
                    <!--kredi isteği-->
                     <div class="panel panel-default ">
                        <div class="panel-heading">
<h3> Yönetici, Bankacı Ekleme </h3>
                        </div>
                        <div class="panel-body">
     			<form class="form-horizontal" role="form" method="post" action="ekle_kayit.php">
                
                <?php 
				   //echo $ayni->kul_adi." ".$ayni->p_tckim;
				   
				   
				   
				   
				   $tc_kontrol=mysql_query("SELECT p_tckim,kul_adi FROM panel_kul WHERE p_tckim='$tckimlik' ");
				   $kul_kontrol=mysql_query("SELECT p_tckim,kul_adi FROM panel_kul WHERE kul_adi='$kul_adi' ");
				   $ayni_tc=mysql_fetch_object($tc_kontrol);
				   $ayni_kul=mysql_fetch_object($kul_kontrol);

				   
						if(!empty($tckimlik)&& !empty($gel_isim) && !empty($soyad) && !empty($kul_adi) && !empty($gsifre) && !empty($adres) && !empty($numara) && !empty($mail) ){
						
												if( empty($ayni_tc->p_tckim) && empty($ayni_kul->kul_adi)){							
															$sql="INSERT INTO panel_kul (p_tckim,kul_adi,kul_sifre,kul_yetki) values ('$tckimlik','$kul_adi','$sifre','$yetki') ";
															mysql_query($sql);
															$sql2="INSERT INTO panel_bilgi (p_tckim,adi_kul,soy_kul,adres_kul,tel_kul,mail_kul) values ('$tckimlik','$gel_isim','$soyad','$adres','$numara','$mail') ";
															mysql_query($sql2);
															
															echo "<center><p>Yönetici başarılı bir şekilde sisteme kaydedildi...</p></center>";
															
															
												}
												else if(!empty($ayni_tc->p_tckim) && !empty($ayni_kul->kul_adi)) 
												   {
															
															echo "<center><p>Farklı bir TC Kimlik numarası ve kullanıcı adı seçiniz...</p></center>";
												   }
												else if(!empty($ayni_kul->kul_adi))
												{
															echo "<center><p>Farklı bir kullanıcı adı seçiniz...</p></center>";
												}
												else if(!empty($ayni_tc->p_tckim))
												{
															echo "<center><p>Farklı bir TC Kimlik numarası giriniz...</p></center>";
												}
												
						}
						else 
						{
						echo "<center><p>Form Alanlarını Boş bırakmayınız..</p></center>";
						
						
						}

				
				
				
				?>
                  <div class="form-group">
        		 <label for="email" class="col-sm-2 control-label">TC Kimlik:</label>
       				    <div class="col-sm-9">
            	 <input type="text" class="form-control" id="tckimlik" name="tckimlik" placeholder="" value="">
       			 </div>
    				</div>
                
                
                
                
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
        		 <label for="kul_adi" class="col-sm-2 control-label">Kullanıcı Adı:</label>
       				    <div class="col-sm-9">
            	 <input type="text" class="form-control" id="kul_adi" name="kul_adi" placeholder="" value="">
       			 </div>
    				</div>
                    
                    
                    
                    
                     <div class="form-group">
        		 <label for="kul_adi" class="col-sm-2 control-label">Telefon Numarası:</label>
       				    <div class="col-sm-9">
            	 <input type="text" class="form-control" id="telefon" name="telefon" placeholder="" value="">
       			 </div>
    				</div>
                     <div class="form-group">
        		 <label for="kul_adi" class="col-sm-2 control-label">Mail Adresi:</label>
       				    <div class="col-sm-9">
            	 <input type="text" class="form-control" id="mail" name="mail" placeholder="" value="">
       			 </div>
    				</div>
                    
                    
                  
                  
                  <div class="form-group">
        		 <label for="email" class="col-sm-2 control-label">Sifre:</label>
       				    <div class="col-sm-9">
            	 <input type="password" class="form-control" id="sifre" name="sifre" placeholder="" value="">
       			 </div>
    				</div>
  
    				<div class="form-group">
      			  <label for="adres" class="col-sm-2 control-label">Adres</label>
       				 <div class="col-sm-9">
          		  <textarea class="form-control" rows="4" name="adres"></textarea>
       				 </div>
    				</div>
    				
                    
                     <div class="form-group">
      			  		<div class="col-sm-9 col-sm-offset-2">
                  
                 <?php  
                  if($_POST['secim']=="Yönetici")
                    {
                   echo '<div class="radio">
                                <label><input type="radio" name="secim" id="secim" value="Bankacı">Bankacı</label>
                                </div>
                                <div class="radio">
                                <label><input type="radio" name="secim" id="secim" value="Yönetici" checked>Yönetici</label>
                                </div>';
                    
                    }
                    else if($_POST['secim']=="Bankacı")
                    {
                   echo '<div class="radio">
                                <label><input type="radio" name="secim" id="secim" value="Bankacı" checked>Bankacı</label>
                                </div>
                                <div class="radio">
                                <label><input type="radio" name="secim" id="secim" value="Yönetici" >Yönetici</label>
                                </div>';
                    }
                  
                  ?>
                  
                                
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
