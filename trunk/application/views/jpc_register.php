<center> <b><h2 style="margin :0px">Form Pendaftaran ITB Junior Programming Contest</h2></b></center>
	</br></br></br>
<div class="register_div" style="margin-left:auto;margin-right:auto;">

	<div id="warning_box" style="color:red;width:330px;height:auto;">
		<?php
			foreach ($error as $temp)
			{
			}
		?>
	</div>
	<br>
	<form action="/itbpc2012/index.php/contestant/register_jpc" method="POST">
		<i>&nbsp Silakan isi form berikut ini:</i>
		</br></br>
		
		<input type="text" class="register" name="nama_lengkap" placeholder="Nama lengkap"/> <br />
		<input type="text" class="register" name="nomor_ponsel" placeholder="Nomor handphone"/> <br />
		<input type="text" class="register" name="alamat" placeholder="Alamat"/> <br />
		<input type="text" class="register" name="email" placeholder="Email"/> <br />
		<input type="text" class="register" name="kelas" placeholder="Kelas dan jurusan"/> <br />
		<input type="text" class="register" name="nama_sekolah" placeholder="Nama sekolah"/> <br />
		<input type="text" class="register" name="alamat_sekolah" placeholder="Alamat sekolah"/> <br />
		<input type="text" class="register" name="nama_pembimbing" placeholder="Nama pembimbing"/> <br />
		<?php
			require_once($_SERVER['DOCUMENT_ROOT'].'/itbpc2012/application/libraries/recaptchalib.php');
			$publickey = "6LcNUdQSAAAAABwRmWD9DB5TySJP2TKFcg-F45Iy"; // you got this from the signup page
			echo recaptcha_get_html($publickey);
		?>
		<br />
		<input type="submit" class="register_button" value="Daftar" style="float:right;"/>
	</form>
</div>

<script> 
	$('#home_navigation').removeClass('current_menu');
	$('#senior_navigation').removeClass('current_menu');
	$('#junior_navigation').addClass('current_menu');
	$('#gallery_navigation').removeClass('current_menu');
	$('#faq_navigation').removeClass('current_menu');
</script>