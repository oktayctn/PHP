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
    
    
    
    <script>
function processForm() {
//var selected_values = $("input[name='id[]']:checked");

var id = document.forms[0];
    var txt = "";
    var i;
    for (i = 0; i < id.length; i++) {
        if (id[i].checked) {
            txt = txt + id[i].value + ",";
        }
    }

//alert("index.phpdir burası");
//alert(txt);
  $.post("kontrol_istek2.php",
    {
        name: txt,
        city: "Duckburg"
    },
    function(data, status){
     //   alert("Data: " + data + "\nStatus: " + status);
	 window.location.reload(true);
    });


}
</script>
    
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
    							 <h3> Online Kullanıcı Bilgileri </h3>                  
                             <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i>Online Kullanıcı Listesi
                            
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                            
                            
                            
                           
                    <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>İsim</th>
                                            <th>Soyisim</th>
                                           
                                            <th>TC Kimlik</th>
                                            <th>Banka Numarası</th>
                                            <th>Hesap Bilgisi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($aktif_kul=mysql_fetch_array($aktif_sorgu))
								{
								?>
                                    
                                    
                                    
                                    
                                        <tr>       
                                            <td><?php echo $aktif_kul['ad']; ?> </td>
                                            <td><?php echo $aktif_kul['soyad']; ?> </td>
                                            
                                           
                                            
                                            
                                            <td><?php echo $aktif_kul['tckimlik']; ?></td>
                                            <td><?php echo $aktif_kul['banka_id']; ?></td>
                                            <td><?php echo $aktif_kul['hesapbilgi']; } ?></td>
                                            
                                        </tr>
                                        
                                        
                                       

                                    </tbody>
                                </table>
                    
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    
    <!--// panel sonu...--->                
                   
                </div>

                <div class="col-lg-4">
                    <div class="panel panel-primary text-center no-boder">
                        
                        <div class="panel-footer"> <i class="fa fa-bar-chart-o fa-3x"></i><br/>
                            <span class="panel-eyecandy-title">Online Kullanıcılar
                            </span>
                        </div>
                        
                        <div class="panel-body blue">
                           
                            <?php
								$sayac=0;
								$aktif_sorgu=mysql_query("Select kul_adi from uyeler_adi where aktif='1'  ");
								while($aktif_kul=mysql_Fetch_array($aktif_sorgu))
								{
								echo $aktif_kul['kul_adi']."<br/>";
								$sayac++;
								}
								echo '<hr style="height:2px;border:none;color:#FFF;background-color:#444;" />';
								echo "Online Kişi Sayısı= ".$sayac;
								
								
								
							?>
                        </div>
                        
                    </div>
                    <!--
                    <div class="panel panel-primary text-center no-boder">
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
                    </div>
-->
                  
                </div>

			

            </div>

            <div class="row">
                <div class="col-md-12">	
                            <div class="panel panel-primary"> 
                                                        <div class="panel-heading">
                                                            <i class="fa fa-bar-chart-o fa-fw"></i>Kredi Talepleri
                                                        </div>
                                                        
                <form action="kontrol_istek.php" method="post">          
                              <table class="table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>TC Kimlik</th>
                                                    <th>İsim</th>
                                                    <th>Soyisim</th>
                                                    <th>Miktar</th>
                                                    <th>Banka Numarası</th>
                                                    <th>Mesaj</th>
                                                </tr>
                                            </thead>
                                            <tbody>       
                                          
                                                            
                                                  <tr>
                                                  
                                                  
                                                    <?php 
											$baglan=mysql_connect("localhost","kullanici_central","sifre_central");
											if(!$baglan) die("Baglanti Kurulumadi");
											if(!mysql_select_db("veritabani_central")) die("veri tabani secilemedi");
											
											$veri=mysql_query("select * from kredi_istek");
											
										
											while($yveri=mysql_fetch_assoc($veri))
											{
											
											
											
											
											?>
                                                  
                                                  
                                                  <th><label><input type="checkbox" name="sil[]" value="<?php echo $yveri["id_kredi"]; ?> 
			"/> </label><br/>
                                                  </th>
                                                  <th><?php echo $yveri['tckimlik']  ?>
                                                  </th>
                                                  <th><?php echo $yveri['isim']  ?>
                                                  </th>
                                                  <th><?php echo $yveri['soyad']  ?>
                                                  </th>
                                                  <th><?php echo $yveri['miktar']  ?>
                                                  </th>
                                                  <th><?php echo $yveri['bankano']  ?>
                                                  </th>
                                                  <th><?php echo $yveri['mesaj']  ?>
                                                  </th>
                                                  </tr>  
                                                  
                                                  <?php
                                                  
											        }
													mysql_close();
												  ?>
                                                                                                  
                                                  <tr/>
                                            </tbody>
                                        </table>     
                            
                            </div>  
                              <input type="submit" value="Seçilileri sil">      
                                <input type="button" name="kaydet" id="kaydet" onClick="processForm()" value="Kaydet">                 
                           </form>
                            
                            
                            
                            
                                                     
                                                    
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
