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
<div style="width:540px;margin-left:auto;margin-right:auto;">
	<form action="/itbpc2012/index.php/contestant/edit_data_jpc" method="POST">		
		<label class="left" style="width:200px; line-height:30px;"> Nama Lengkap </label>
		<input type="text" class="register" name="nama_lengkap" placeholder="Nama lengkap" value="<?php echo $data['name'];?>" /> <br />
		
		<label class="left" style="line-height:30px; width:200px;"> Nomor Handphone </label>
		<input type="text" class="register" name="nomor_ponsel" placeholder="Nomor handphone" value="<?php echo $data['phone']?>"/> <br />
		
		<label class="left" style="line-height:30px; width:200px;"> Alamat </label>
		<input type="text" class="register" name="alamat" placeholder="Alamat" value="<?php echo $data['address']?>"/> <br />
		
		<label class="left" style="line-height:30px; width:200px;"> Kelas dan Jurusan </label>
		<input type="text" class="register" name="kelas" placeholder="Kelas dan jurusan" value="<?php echo $data['class']?>"/> <br />
		
		<label class="left" style="line-height:30px; width:200px;"> Nama Sekolah </label>
		<input type="text" class="register" name="nama_sekolah" placeholder="Nama sekolah" value="<?php echo $data['school_name']?>"/> <br />
		
		<label class="left" style="line-height:30px; width:200px;"> Alamat Sekolah </label>
		<input type="text" class="register" name="alamat_sekolah" placeholder="Alamat sekolah" value="<?php echo $data['school_address']?>"/> <br />
		
		<label class="left" style="line-height:30px; width:200px;"> Nama Pembimbing </label>
		<input type="text" class="register" name="nama_pembimbing" placeholder="Nama pembimbing" value="<?php echo $data['supervisor']?>"/> <br />
		<br>
		<input type="submit" class="link_blue" value="Ubah" style="float:right;"/>
	</form>
</div>