	<b><i><h2 style="margin :0px">Form Pendaftaran ITB Senior Programming Contest</h2></i></b>
	</br></br></br>
<div class="register_div" style="margin-left:auto;margin-right:auto;">
	
	<form action="/itbpc2012/index.php/contestant/register_spc" method="POST">
		<i>&nbsp Silakan isi form berikut ini:</i>
		</br></br>
		<input type="text" class="register" name="nama_tim" placeholder="Nama Tim"> <br>
		<input type="text" class="register" name="nama_universitas" placeholder="Nama Perguruan Tinggi"> <br>
		<input type="text" class="register" name="alamat_universitas" placeholder="Alamat Perguruan Tinggi"> <br>
		<input type="text" class="register" name="nama_anggota_satu" placeholder="Nama Lengkap Anggota Tim #1 (Ketua)"> <br>
		<input type="text" class="register" name="ponsel_anggota_satu" placeholder="Nomor Ponsel Anggota Tim #1"> <br>
		<input type="text" class="register" name="email_anggota_satu" placeholder="Email Anggota Tim #1"> <br>
		<a href="javascript:tambah(2);" id="add_anggota_1" class="add_anggota_button"> TAMBAH ANGGOTA 2 </a> 
		
		<input type="text" class="register" id="anggota_2" name="nama_anggota_dua" placeholder="Nama Lengkap Anggota Tim #2"> <br>
		<a href="javascript:tambah(3);" id="add_anggota_2" class="add_anggota_button"> TAMBAH ANGGOTA 3 </a> 
		
		<input type="text" class="register" id="anggota_3" name="nama_anggota_tiga" placeholder="Nama Lengkap Anggota Tim #3"> <br>
		<a href="javascript:tambah(4);" id="add_anggota_3" class="add_anggota_button"> TAMBAH DOSEN PEMBIMBING </a> 
		
		<input type="text" class="register" id="anggota_4" name="nama_pembimbing" placeholder="Nama Lengkap Dosen Pembimbing"> <br>
		
		<?php
			require_once($_SERVER['DOCUMENT_ROOT'].'/itbpc2012/application/libraries/recaptchalib.php');
			$publickey = "6LcNUdQSAAAAABwRmWD9DB5TySJP2TKFcg-F45Iy"; // you got this from the signup page
			echo recaptcha_get_html($publickey);
		?>
		
		<br />
		<input type="submit" class="register_button" value="Daftar" style="float:right;"/>
	</form>
</div>
<script type="text/javascript" src="<?php echo base_url("js/jquery-1.7.2.js");?>"> </script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#anggota_2').hide();
		$('#anggota_3').hide();
		$('#anggota_4').hide();
		$('#add_anggota_2').hide();
		$('#add_anggota_3').hide();
	});
	function tambah(i) {
		$('#anggota_'+i).fadeIn();
		$('#add_anggota_'+i).fadeIn();
		i--;
		$('#add_anggota_'+i).hide();
	}
</script>