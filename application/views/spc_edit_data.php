<div class="register_div" style="margin-left:auto;margin-right:auto;">
	<div id="warning_box" style="color:red;width:330px;height:auto;">
		<?php
			if (ISSET($error))
			{
				foreach ($error as $temp)
				{
					echo "- ".$temp."<br />";
				}
			
			}
		?>
	</div>
	<form action="/itbpc2012/index.php/contestant/edit_data_spc" method="POST">
		<input type="text" class="register" name="nama_universitas" placeholder="Nama Perguruan Tinggi" value="<?php echo $data['university_name'];?>"> <br>
		<input type="text" class="register" name="alamat_universitas" placeholder="Alamat Perguruan Tinggi" value="<?php echo $data['university_address'];?>"> <br>
		<input type="text" class="register" name="nama_anggota_satu" placeholder="Nama Lengkap Anggota Tim #1 (Ketua)" value="<?php echo $data['leader_name'];?>"> <br>
		<input type="text" class="register" name="ponsel_anggota_satu" placeholder="Nomor Ponsel Anggota Tim #1" value="<?php echo $data['leader_phone'];?>"> <br>
		<input type="text" class="register" name="email_anggota_satu" placeholder="Email Anggota Tim #1" value="<?php echo $data['leader_email'];?>"> <br>
		<input type="text" class="register" id="anggota_4" name="nama_pembimbing" placeholder="Nama Lengkap Dosen Pembimbing" value="<?php echo $data['supervisor_name'];?>"> <br>

		<a href="javascript:tambah(2);" id="add_anggota_1" class="add_anggota_button"> TAMBAH ANGGOTA 2 </a> 
		
		<input type="text" class="register" id="anggota_2" name="nama_anggota_dua" placeholder="Nama Lengkap Anggota Tim #2" value="<?php echo $data['second_name'];?>"> <br>
		<a href="javascript:tambah(3);" id="add_anggota_2" class="add_anggota_button"> TAMBAH ANGGOTA 3 </a> 
		
		<input type="text" class="register" id="anggota_3" name="nama_anggota_tiga" placeholder="Nama Lengkap Anggota Tim #3" value="<?php echo $data['third_name'];?>"> <br>		
		
		<input type="submit" class="register_button" value="Ubah" style="float:right;"/>
	</form>
</div>
<script type="text/javascript">
	var nama_2 = "<?php echo $data['second_name'];?>";
	var nama_3 = "<?php echo $data['third_name'];?>";
	$(document).ready(function() {
		$('#anggota_3').hide();
		if ((nama_2=="")||(nama_2=="null")||(nama_2==null))
		{
			if ((nama_3=="")||(nama_3=="null")||(nama_3==null))
			{
				$('#anggota_2').hide();
				$('#add_anggota_1').show();
				$('#add_anggota_2').hide();
			}
			else
			{
				$('#anggota_2').val(nama_3);
				$('#anggota_3').val("");
				$('#anggota_2').show();
				$('#add_anggota_1').hide();
				$('#add_anggota_2').show();
			}
		}
		else
		{
			$('#anggota_2').show();
			$('#add_anggota_1').hide();
		}
	});
	function tambah(i) {
		$('#anggota_'+i).fadeIn();
		$('#add_anggota_'+i).fadeIn();
		i--;
		$('#add_anggota_'+i).hide();
	}
</script>