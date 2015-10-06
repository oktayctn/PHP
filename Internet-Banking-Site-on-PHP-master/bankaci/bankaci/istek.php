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
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    
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

alert("Lütfen işlem tamamlana kadar bekleyiniz. Aksi halde işlem yarıda kesilecektir...");
//alert(txt);
  $.post("uye_istek2.php",
    {
        name: txt,
        city: "Duckburg"
    },
    function(data, status){
		
		/*function countdown() {
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML)<=0) {
        location.href = 'login.php';
    }
    i.innerHTML = parseInt(i.innerHTML)-1;
}
setInterval(function(){ countdown(); },1000);		
		*/
		
	//alert("İşlem Tamamlandı");		
     //alert("Data: " + data + "\nStatus: " + status);
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
                        <i class="fa fa-folder-open"></i><b>&nbsp; <?php echo $isim.", Yönetim Paneline Hoşgeldiniz" ?>  
                    </div>
                    
                    
                 
                    
                    
                    
                </div>
                <!--end  Welcome -->
            </div>


            <div class="row">
               
            </div>

            <div class="row">
                <div class="col-lg-12">



                    <!--Area chart example -->
                  
                   
                    <div class="panel panel-primary"> 
                         					<div class="panel-heading">
                                                <i class="fa fa-bar-chart-o fa-fw"></i>Üyelik Talepleri
                                                
                                            		</div>
                               <form action="uye_istek.php" method="post">                        
                                            <table class="table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Tc No</th>
                                                    <th>İsim</th>
                                                    <th>Soyisim</th>
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
											 mysql_query("SET NAMES 'UTF8'");
											$veri=mysql_query("select * from kul_istek");
											
										
											while($yveri=mysql_fetch_assoc($veri))
											{
											
											
											
											
											?>
                                                  
                                                  
                                                  <th><label><input type="checkbox" name="sil[]" value="<?php echo $yveri["id"]; ?> 
			"/> </label>
                                                  </th>
                                                  <th><?php echo $yveri['istek_tc']  ?>
                                                  </th>
                                                  <th><?php echo $yveri['ad_istek']  ?>
                                                  </th>
                                                  <th><?php echo $yveri['soyad']  ?>
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
                                        </table>
                                        </div>  
                              <input type="submit" value="Seçilileri sil">      
                                <input type="button" name="kaydet" id="kaydet" onClick="processForm()" value="Kaydet">                 
                           </form>

                </div>
                 <!--End area chart example -->  
                  
		

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
