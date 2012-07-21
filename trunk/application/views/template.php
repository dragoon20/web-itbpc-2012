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
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Limitless by FCT</title>
<link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
<?php
	$this->load->helper('HTML');
	$this->load->helper('url');
	echo link_tag('css/style.css');
	session_start();
?>
</head>
<body>

	<div id="page-background"><img src="<?php echo base_url("images/background.jpg"); ?>" width="100%" height="100%"></div>
	<div id="menu-wrapper">
	</div>
	
	<div id="menu">
		<ul>
			<li><?php echo anchor("welcome/index","Home");?></li>
			<li><?php echo anchor("seniorpc/spc_deskripsi","Senior PC");?>
				<ul>
					<li><?php echo anchor("seniorpc/spc_deskripsi","Deskripsi");?></li>
					<li><?php echo anchor("seniorpc/spc_peraturan","Peraturan & Regulasi");?></li>
					<li><?php echo anchor("seniorpc/spc_pendaftaran","Pendaftaran");?></li>
				</ul>
			</li>
			<li><?php echo anchor("juniorpc/jpc_deskripsi","Junior PC");?>
				<ul>
					<li><?php echo anchor("juniorpc/jpc_deskripsi","Deskripsi");?></li>
					<li><?php echo anchor("juniorpc/jpc_peraturan","Peraturan & Regulasi");?></li>
					<li><?php echo anchor("juniorpc/jpc_pendaftaran","Pendaftaran");?></li>
				</ul>
			</li>
			<li><?php echo anchor("faq/faq_content","FAQ");?></li>
			<li><?php 
					if (isset($_SESSION['contestant_id']))
					{
						echo anchor("contestant/upload_kartu","Edit");
						echo anchor("contestant/logout","Logout");
					}
					else
					{
						echo anchor("contestant/login","Login");	
					}
				?></li>
		</ul>
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
</html>
