<?php

@$Padi = $_POST['yonet'];
@$Psifre = $_POST['ysifre'];
session_start();
$kripto=md5($Psifre);

$baglan=mysql_connect("localhost","kullanici_central","sifre_central");
mysql_select_db("veritabani_central");


						if(!empty($Padi) && !empty($kripto)) {
							
							$sorgu=mysql_query("SELECT kul_adi,kul_sifre FROM panel_kul where kul_adi ='$Padi' and kul_sifre='$kripto' and kul_yetki='1' ");
							
//1 olanlar admin 0 olanlar banka yöneticisidir							

							$verisay=mysql_num_rows($sorgu);
							if($verisay !=0 ){
								echo "burada";
								$_SESSION['yonet']=$Padi;
								echo "başarılı şekilde giriş yaptınız";
								echo $_SESSION['yonet'];
								header("Location: ./admin/index.php");
								            }
													       }
							else
							{
								echo "Lütfen Bilgilerinizi Kontrol Ediniz...";
								
							
								
								
							}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Admin Paneli</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Expand, contract, animate forms with jQuery wihtout leaving the page" />
        <meta name="keywords" content="expand, form, css3, jquery, animate, width, height, adapt, unobtrusive javascript"/>
		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
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
		<div class="wrapper">
	    <h1>Central Bank</h1>
			<h2><span>Admin paneli </span></h2>
			<div class="content">
				<div id="form_wrapper" class="form_wrapper">
					
				  <form class="login active" action="login.php" method="POST">
						<h3>Giris</h3>
						<div>
							<label>Kullanıcı Adı:</label>
							<input type="text" name="yonet" />
							
						</div>
						<div>
							<label>Şifre: </label>
							<input type="password" name="ysifre" />
						</div>	
						<div class="bottom">
							<input type="submit" value="Giriş" />
							
							<div class="clear"></div>
						</div>
				  </form>
					<form class="forgot_password">
						<h3>Forgot Password</h3>
						<div>
							<label>Username or Email:</label>
							<input type="text" />
							<span class="error">This is an error</span>
						</div>
						<div class="bottom">
							<input type="submit" value="Send reminder"></input>
							<a href="index.html" rel="login" class="linkform">Suddenly remebered? Log in here</a>
							<a href="register.html" rel="register" class="linkform">You don't have an account? Register here</a>
							<div class="clear"></div>
						</div>
					</form>
			  </div>
				<div class="clear"></div>
		  </div>
	</div>
		

		<!-- The JavaScript -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript">
			$(function() {
					//the form wrapper (includes all forms)
				var $form_wrapper	= $('#form_wrapper'),
					//the current form is the one with class active
					$currentForm	= $form_wrapper.children('form.active'),
					//the change form links
					$linkform		= $form_wrapper.find('.linkform');
						
				//get width and height of each form and store them for later						
				$form_wrapper.children('form').each(function(i){
					var $theForm	= $(this);
					//solve the inline display none problem when using fadeIn fadeOut
					if(!$theForm.hasClass('active'))
						$theForm.hide();
					$theForm.data({
						width	: $theForm.width(),
						height	: $theForm.height()
					});
				});
				
				//set width and height of wrapper (same of current form)
				setWrapperWidth();
				
				/*
				clicking a link (change form event) in the form
				makes the current form hide.
				The wrapper animates its width and height to the 
				width and height of the new current form.
				After the animation, the new form is shown
				*/
				$linkform.bind('click',function(e){
					var $link	= $(this);
					var target	= $link.attr('rel');
					$currentForm.fadeOut(400,function(){
						//remove class active from current form
						$currentForm.removeClass('active');
						//new current form
						$currentForm= $form_wrapper.children('form.'+target);
						//animate the wrapper
						$form_wrapper.stop()
									 .animate({
										width	: $currentForm.data('width') + 'px',
										height	: $currentForm.data('height') + 'px'
									 },500,function(){
										//new form gets class active
										$currentForm.addClass('active');
										//show the new form
										$currentForm.fadeIn(400);
									 });
					});
					e.preventDefault();
				});
				
				function setWrapperWidth(){
					$form_wrapper.css({
						width	: $currentForm.data('width') + 'px',
						height	: $currentForm.data('height') + 'px'
					});
				}
				
				/*
				for the demo we disabled the submit buttons
				if you submit the form, you need to check the 
				which form was submited, and give the class active 
				to the form you want to show
				*/
				
			});
        </script>
    </body>
</html>