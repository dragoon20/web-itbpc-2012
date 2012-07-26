<?php
	$_SESSION['url']=base_url("admin/manage_jpc");
?>
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
		<div style="height:180px;">
			<span style="line-height:180px;vertical-align:middle;">Kartu Pelajar</span> 
		</div>
		<br>
		<div style="height:180px;">
			<span style="line-height:180px;vertical-align:middle;">Bukti Pembayaran</span> <br>
		</div>
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
		<br><br>
		<div style="height:180px;">
			<div class="left" style="height:180px;">
				<span style="line-height:180px;vertical-align:middle;">: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>	
			</div>
			<?php
				if (ISSET($kartu))
				{
					foreach ($kartu as $temp)
					{
						echo "<img src='".$temp->contestant_image_url."' style='height:180px;' />";
					}
				}
			?>
		</div>
		<br>
		<div style="height:180px;">	
			<div class="left" style="height:180px;">
				<span style="line-height:180px;vertical-align:middle;">: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
			</div>
			<?php
				if (ISSET($bukti))
				{
					foreach ($bukti as $temp)
					{
						echo "<img src='".$temp->contestant_image_url."' style='height:180px;' />";
					}
				}
			?>
		</div>
	</div>
	<div>
		
	</div>
	<div style="clear:both">
	</div>
	<div style="margin-top:20px;">
		<a class="link_blue" href = "<?php echo base_url("admin/approve?id=".$id);?>">Approve</a>
		<a style="margin-left:20px;" class="link_blue" href = "<?php echo base_url("admin/unapprove?id=".$id);?>">Unapprove</a>
	</div>
</div>
<script>
	$('#home_navigation').removeClass('current_menu');
	$('#senior_navigation').removeClass('current_menu');
	$('#junior_navigation').removeClass('current_menu');
	$('#gallery_navigation').removeClass('current_menu');
	$('#faq_navigation').removeClass('current_menu');
	$('#edit_data_navigation').addClass('current_menu');
</script>