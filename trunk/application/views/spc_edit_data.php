<div style="width:600px;margin-left:auto;margin-right:auto;">
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
		<label class="left" style="width:250px; line-height:30px;"> Nama Perguruan Tinggi </label>
		<input type="text" class="register" name="nama_universitas" placeholder="Nama Perguruan Tinggi" value="<?php echo $data['university_name'];?>"> <br>
		
		<label class="left" style="width:250px; line-height:30px;"> Alamat Perguruan Tinggi </label>
		<input type="text" class="register" name="alamat_universitas" placeholder="Alamat Perguruan Tinggi" value="<?php echo $data['university_address'];?>"> <br>
		
		<label class="left" style="width:250px; line-height:30px;"> Nama Lengkap Anggota Tim #1 </label>
		<input type="text" class="register" name="nama_anggota_satu" placeholder="Nama Lengkap Anggota Tim #1 (Ketua)" value="<?php echo $data['leader_name'];?>"> <br>
		
		<label class="left" style="width:250px; line-height:30px;"> Nomor Ponsel Anggota Tim #1 </label>
		<input type="text" class="register" name="ponsel_anggota_satu" placeholder="Nomor Ponsel Anggota Tim #1" value="<?php echo $data['leader_phone'];?>"> <br>
		
		<label class="left" style="width:250px; line-height:30px;"> Nama Lengkap Dosen Pembimbing </label>
		<input type="text" class="register" id="anggota_4" name="nama_pembimbing" placeholder="Nama Lengkap Dosen Pembimbing" value="<?php echo $data['supervisor_name'];?>"> <br>
		
		<center>
		<a href="javascript:tambah(2);" id="add_anggota_1" class="add_anggota_button" style="margin-top:20px;"> TAMBAH ANGGOTA 2 </a> 
		</center>
		
		<label class="left" id="anggota_2_label" style="width:250px; line-height:30px;"> Nama Lengkap Anggota TIm #2 </label>
		<input type="text" class="register" id="anggota_2" name="nama_anggota_dua" placeholder="Nama Lengkap Anggota Tim #2" value="<?php echo $data['second_name'];?>"> <br>
		
		<center>
		<a href="javascript:tambah(3);" id="add_anggota_2" class="add_anggota_button" style="margin-top:20px;"> TAMBAH ANGGOTA 3 </a> 
		</center>
		
		<label class="left" id="anggota_3_label" style="width:250px; line-height:30px;"> Nama Lengkap Anggota Tim #3 </label>
		<input type="text" class="register" id="anggota_3" name="nama_anggota_tiga" placeholder="Nama Lengkap Anggota Tim #3" value="<?php echo $data['third_name'];?>"> <br>		
		
		<input type="submit" class="link_blue" value="Ubah" style="margin-right:20px;margin-top:10px;float:right;"/>
	</form>
</div>
<script type="text/javascript">
	var nama_2 = "<?php echo $data['second_name'];?>";
	var nama_3 = "<?php echo $data['third_name'];?>";
	$(document).ready(function() {
		if ((nama_3=="")||(nama_3=="null")||(nama_3==null)) {
			//anggota 3 tidak ada 
			$('#add_anggota_2').show();
			$('#anggota_3').hide();
			$('#anggota_3_label').hide();
			if ((nama_2=="")||(nama_2=="null")||(nama_2==null)) {
				$('#anggota_2').hide();
				$('#anggota_2_label').hide();
				$('#add_anggota_1').show();
				$('#add_anggota_2').hide();
			}
			else {
				$('#anggota_2').show();
				$('#anggota_2_label').show();
				$('#add_anggota_1').hide();
			}
		}
		else {
			//anggota 2 dan 3 ada
			$('#add_anggota_1').hide();
			$('#add_anggota_2').hide();
		}
	});
	function tambah(i) {
		$('#anggota_'+i).fadeIn();
		$('#anggota_'+i+'_label').fadeIn();
		$('#add_anggota_'+i).fadeIn();
		i--;
		$('#add_anggota_'+i).hide();
	}
</script>