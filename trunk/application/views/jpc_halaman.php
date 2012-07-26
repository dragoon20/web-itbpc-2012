<div class="halaman_peserta_div">
	<div class="left" style="width:40%;font-weight:bold;"> 
		Nama Lengkap <br>
		Nomor Handphone <br>  
		Alamat <br>
		Email  <br>
		Kelas dan Jurusan<br> 
		Nama Sekolah  <br>
		Alamat Sekolah  <br>
		Nama Pembimbing <br><br>
		
		Kartu Pelajar <br>
		Bukti Pembayaran <br>
	</div>
	<div class="left" style="width:60%"> 
		: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['name'];?> 
		<br>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['phone']?> 
		<br>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['address']?> 
		<br>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['email']?> 
		<br>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['class']?> 
		<br>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['school_name']?> 
		<br>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['school_address']?> 
		<br>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['supervisor']?> 
		<br><br>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<?php
			if (ISSET($kartu))
			{
				foreach ($kartu as $temp)
				{
					echo "<img src='".$temp->contestant_image_url."' style='width:200px;' />";
				}
			}
		?>
		<br>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<?php
			if (ISSET($bukti))
			{
				foreach ($bukti as $temp)
				{
					echo "<img src='".$temp->contestant_image_url."' style='width:200px;' />";
				}
			}
		?>
	</div>
	<div>
		
	</div>
	<div style="clear:both">
	</div>
	<div style="margin-top:20px;">
		<a class="link_blue" href = "<?php echo base_url("contestant/edit_data_jpc");?>">Edit Data</a>
		<a style="margin-left:20px;" class="link_blue" href = "<?php echo base_url("contestant/upload_data_sma");?>">Upload Data</a>
		<a style="margin-left:20px;" class="link_blue" href = "<?php echo base_url("contestant/change_password");?>">Ubah Password</a>
	</div>
</div>