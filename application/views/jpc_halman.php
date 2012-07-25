<div class="register_div" style="margin-left:auto;margin-right:auto;">
		
	Nama Lengkap : <?php echo $data['name'];?> <br />
	Nomor Handphone : <?php $data['phone']?> <br />
	Alamat : <?php $data['address']?> <br />
	Email : <?php $data['email']?> <br />
	Kelas dan Jurusan : <?php $data['class']?> <br />
	Nama Sekolah : <?php $data['school_name']?> <br />
	Alamat Sekolah : <?php $data['school_address']?> <br />
	Nama Pembimbing : <?php $data['supervisor']?> <br />
	
	<a href = "<? echo base_url("contestant/edit_data_jpc");?>">Edit Data</a>
	<a href = "<? echo base_url("contestant/upload_data_sma");?>">Upload Data</a>
</div>