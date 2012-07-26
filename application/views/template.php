<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Limitless   
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20120203

-->
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php
			$this->load->helper('HTML');
			$this->load->helper('url');
			$_SESSION['url'] = current_url();
			echo link_tag('css/style.css');
		?>
		<link rel="shortcut icon" href="<?php echo base_url("images/itbpc2012_64x64.ico"); ?>" type="image/x-icon">
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="ITBPC 2012 adalah kontes pemrograman dan seminar tahunan yang diselenggarakan oleh Program Studi Teknik Informatika ITB.">
		<meta name="keywords" content="ITBPC, ITBPC 2012, ITBPC 2011, ITBPC 2010, ITB Programming Contest 2010, ITB Programming Contest 2011, ITB Programming Contest 2012">
		<meta property="og:title" content="Institut Teknologi Bandung Programming Contest 2012">
		<meta property="og:url" content="<?php echo base_url();?>">
		<meta property="og:image" content="<?php echo base_url("images/itbpc2012.png");?>">

		<title>Institut Teknologi Bandung Programming Contest 2012</title>
		
		<script type="text/javascript" src="<?php echo base_url("js/jquery-1.7.2.js");?>" > </script>
		<script type="text/javascript" src="<?php echo base_url("js/all.js");?>" > </script>
	</head>
	<body>
		
		<div id="blacktrans">&nbsp;</div> 	
		
		<?php 
			if (!isset($_SESSION['contestant_id']))
			{
			?>
		<div id="login_box" class="right" style="top:50px;">
			<form id="login_form" action="/itbpc2012/index.php/contestant/login" method="POST">
				<input class="input" type="text" name="username" placeholder="USERNAME"/> <br />
				<input class="input" type="password" name="password" placeholder="PASSWORD"/> <br />
				</br>
				<input type="submit" value="Login" id="login_button"/>
			</form>
			<a style="text-decoration:none; margin-left:20px; color:white; font-size:12px;" href="<?php echo base_url("contestant/forgot_password");?>">Lupa Password</a>
		</div>
			<?php
			}
			?>
		
		<img src="<?php echo base_url("images/ajax-loader.gif");?>" id="loader"> 
		
		<!--<div id="page-background"><img src="<?php echo base_url("images/background.jpg"); ?>" width="100%" height="100%"></div>-->
		<div id="menu-wrapper" class="one-edge-shadow">
			<div id="menu">
				<ul>
					<li id="home_navigation" class="current_menu"><?php echo anchor("welcome/index","Home");?></li>
					<li id="gallery_navigation"> <?php echo anchor("gallery/gallery_content","GALLERY");?> </li>
					<li id="junior_navigation"><?php echo anchor("juniorpc/jpc_deskripsi","Junior PC");?>
						<ul class="sub_menu">
							<li><?php echo anchor("juniorpc/jpc_deskripsi","Deskripsi");?></li>
							<li><a href="<?php echo base_url("juniorpc/jpc_peraturan");?>"> Peraturan & <br> <div style="margin-top:-15px;">Regulasi</div> </a> </li>
							<li><?php echo anchor("juniorpc/jpc_pendaftaran","Pendaftaran");?></li>
						</ul>
					</li>
					<li id="senior_navigation"><?php echo anchor("seniorpc/spc_deskripsi","Senior PC");?>
						<ul class="sub_menu">
							<li><?php echo anchor("seniorpc/spc_deskripsi","Deskripsi");?></li>
							<li><a href="<?php echo base_url("seniorpc/spc_peraturan");?>"> Peraturan & <br> <div style="margin-top:-15px;">Regulasi</div> </a> </li>
							<li><?php echo anchor("seniorpc/spc_pendaftaran","Pendaftaran");?></li>
						</ul>
					</li>					
					<li id="faq_navigation"><?php echo anchor("faq/faq_content","FAQ");?></li>
				</ul>
			</div>
			
			<div style="font-size: 17px; padding: 0px 0px 0px 0px; line-height: 60px; letter-spacing: 1px;" class="right">
				<?php 
					if (isset($_SESSION['contestant_id']))
					{
						?>
						<a href="<?php echo base_url("contestant/logout");?>" style="color:#fff;display:block;width:70px;float:right; margin-right:20px;"> LOGOUT </a>
						<?php

						if ($_SESSION['contestant_type'] == '1')
						{
							?>
							<a id="edit_data_navigation" href="<?php echo base_url("contestant/halaman_jpc");?>" style="color:#fff;display:block;width:120px;float:right;"> EDIT DATA </a>
							<?php
						}
						else if ($_SESSION['contestant_type'] == '2')
						{
							?>
							<a id="edit_data_navigation" href="<?php echo base_url("contestant/halaman_spc");?>" style="color:#fff;display:block;width:120px;float:right;"> EDIT DATA </a>
							<?php
						}
					}
					else
					{?>
						<a href="javascript:login();" style="color:#fff;display:block;width:70px;"> LOGIN </a>
					<?php
					}
				?>
			</div>
		</div>
		<!-- end #menu -->
		
		<div id="wrapper">
			<?php echo $this->load->view('header'); ?>
			<div id="page">
				<div id="page-bgtop">
					<div id="page-bgbtm">
						<div id="content">
							<?php echo $this->load->view($isi); ?>
						</div>
						<!-- end #content -->
						<div style="clear: both;">&nbsp;</div>
					</div>
				</div>
			</div>
			<!-- end #page -->
			<?php echo $this->load->view('footer'); ?>
		</div>
	</body>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#login_box').hide();
		});
		var login_open = 0;
		function login() {
			if (login_open == 0) {
				$('#login_box').fadeIn(400);
				login_open = 1;
			}
			else {
				$('#login_box').fadeOut(400);
				login_open = 0;
			}
		}
		
		function goToByScroll(id){
					$('html,body').animate({
						scrollTop: $(id).offset().top
					},'slow');
				};
				
		$("#linkToContact").live("click", function () {
						goToByScroll("#contact");
					});
					
					
					$("#goToContact").live("click", function () {
						goToByScroll("#contact");
					});
	</script>
</html>
