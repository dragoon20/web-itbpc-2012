<div class="register_div" style="margin-left:auto;margin-right:auto;">
	
	Nama Tim : <?php echo $data['team_name'];?> <br>
	Universitas/Institut : <?php echo $data['university_name'];?> <br>
	Alamat Universitas/Institut : <?php echo $data['university_address'];?> <br>
	Nama Lengkap Anggota Tim #1 : <?php echo $data['leader_name'];?> <br>
	Nomor Ponsel Anggota Tim #1 : <?php echo $data['leader_phone'];?> <br>
	Email Anggota Tim #1 : <?php echo $data['leader_email'];?> <br>
	Nama Lengkap Anggota Tim #2 : <?php echo $data['second_name'];?> <br>
	Nama Lengkap Anggota Tim #3 : <?php echo $data['third_name'];?> <br>
	Nama Lengkap Dosen Pembimbing : <?php echo $data['supervisor_name'];?> <br>
	
	<a href = "<? echo base_url("contestant/edit_data_spc");?>">Edit Data</a>
	<a href = "<? echo base_url("contestant/upload_data_universitas");?>">Upload Data</a>
</div>