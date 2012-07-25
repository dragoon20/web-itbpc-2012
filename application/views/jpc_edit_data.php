<div class="register_div" style="margin-left:auto;margin-right:auto;">
	<form action="/itbpc2012/index.php/contestant/edit_data_jpc" method="POST">		
		<input type="text" class="register" name="nama_lengkap" placeholder="Nama lengkap" value="<?php echo $data['name'];?>" /> <br />
		<input type="text" class="register" name="nomor_ponsel" placeholder="Nomor handphone" value="<?php $data['phone']?>"/> <br />
		<input type="text" class="register" name="alamat" placeholder="Alamat" value="<?php $data['address']?>"/> <br />
		<input type="text" class="register" name="email" placeholder="Email" value="<?php $data['email']?>"/> <br />
		<input type="text" class="register" name="kelas" placeholder="Kelas dan jurusan" value="<?php $data['class']?>"/> <br />
		<input type="text" class="register" name="nama_sekolah" placeholder="Nama sekolah" value="<?php $data['school_name']?>"/> <br />
		<input type="text" class="register" name="alamat_sekolah" placeholder="Alamat sekolah" value="<?php $data['school_address']?>"/> <br />
		<input type="text" class="register" name="nama_pembimbing" placeholder="Nama pembimbing" value="<?php $data['supervisor']?>"/> <br />
		<input type="submit" class="register_button" value="Ubah" style="float:right;"/>
	</form>
</div>