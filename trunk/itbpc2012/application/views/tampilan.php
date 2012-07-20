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
	echo link_tag('css/style.css');
?>
</head>
<body>
	<div id="menu-wrapper">
		<div id="menu">
			<ul>
				<li class="current_page_item"><a href="#">Homepage</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="#">Photos</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Links</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</div>
		<!-- end #menu -->
	</div>

<div id="wrapper">
	<?php echo $this->load->view('header'); ?>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<?php echo $this->load->view($isi); ?>
				</div>
				<!-- end #content -->
				<?php echo $this->load->view('kiri'); ?>
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page -->
	<?php echo $this->load->view('footer'); ?>
</div>

</body>
</html>
