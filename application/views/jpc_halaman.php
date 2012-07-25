<div class="register_div" style="margin-left:auto;margin-right:auto;">
		
	Nama Lengkap : <?php echo $data['name'];?> <br />
	Nomor Handphone : <?php echo $data['phone']?> <br />
	Alamat : <?php echo $data['address']?> <br />
	Email : <?php echo $data['email']?> <br />
	Kelas dan Jurusan : <?php echo $data['class']?> <br />
	Nama Sekolah : <?php echo $data['school_name']?> <br />
	Alamat Sekolah : <?php echo $data['school_address']?> <br />
	Nama Pembimbing : <?php echo $data['supervisor']?> <br />
	
	<a href = "<?php echo base_url("contestant/edit_data_jpc");?>">Edit Data</a>
	<a href = "<?php echo base_url("contestant/upload_data_sma");?>">Upload Data</a>
</div>