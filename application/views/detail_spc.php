<?php
	$_SESSION['url']=base_url("admin/manage_spc");
?>
<div style="width:700px; margin-left:auto; margin-right:auto; line-height: 40px;">
	<div class="left" style="width:45%;font-weight:bold;"> 
		Nama Tim <br>
		Universitas/Institut <br>
		Alamat Universitas/Institut <br>
		Nama Lengkap Anggota Tim #1 <br>
		Nomor Ponsel Anggota Tim #1 <br>
		Email Anggota Tim #1 <br>
		Nama Lengkap Anggota Tim #2 <br>
		Nama Lengkap Anggota Tim #3 <br>
		Nama Lengkap Dosen Pembimbing <br><br>
		<div style="height:180px;">
			<span style="line-height:180px;vertical-align:middle;">Kartu Tanda Mahasiswa #1</span> 
		</div>
		<br>
		<div style="height:180px;">
			<span style="line-height:180px;vertical-align:middle;">Kartu Tanda Mahasiswa #2</span> 
		</div>
		<br>
		<div style="height:180px;">
			<span style="line-height:180px;vertical-align:middle;">Kartu Tanda Mahasiswa #3</span> 
		</div>
		<br>
		<div style="height:180px;">
			<span style="line-height:180px;vertical-align:middle;">Bukti Pembayaran</span> 
		</div>
	</div>
	<div class="left" style="width:50%"> 
		: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['team_name'];?>
		<br>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['university_name'];?> 
		<br>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['university_address'];?> 
		<br>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['leader_name']?> 
		<br>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['leader_phone']?> 
		<br>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['leader_email']?> 
		<br>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['second_name']?> 
		<br>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['third_name']?> 
		<br>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['supervisor_name']?> 
		<br><br>
		<?php
			if ((ISSET($kartu))&&(count($kartu)!=0))
			{
				$j=3;
				foreach ($kartu as $temp)
				{
					$j--;
					echo '<div style="height:180px;">
							<div class="left" style="height:180px;">
								<span style="line-height:180px;vertical-align:middle;">: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>	
							</div>
							<img src="'.$temp->contestant_image_url.'" style="height:180px;" /></div><br>';
				}
				for ($i=0;$i<$j;$i++)
					echo '<div style="height:180px;">
							<div class="left" style="height:180px;">
								<span style="line-height:180px;vertical-align:middle;">: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>	
							</div></div><br>';
			}
			else
			{
				for ($i=0;$i<3;$i++)
					echo '<div style="height:180px;">
							<div class="left" style="height:180px;">
								<span style="line-height:180px;vertical-align:middle;">: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>	
							</div></div><br>';
			}
		?>
		<div style="height:180px;">
			<div class="left" style="height:180px;">
				<span style="line-height:180px;vertical-align:middle;">: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
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
		<br>
	</div>
	<div style="clear:both">
	</div>
	<div style="margin-top:20px;">
		<a class="link_blue" href = "<?php echo base_url("admin/approve?id=".$id);?>">Approve</a>
		<a style="margin-left:20px;" class="link_blue" href = "<?php echo base_url("admin/unapprove?id=".$id);?>">Unapprove</a>
	</div>
	<br>	
</div>
<script>
	$('#home_navigation').removeClass('current_menu');
	$('#senior_navigation').removeClass('current_menu');
	$('#junior_navigation').removeClass('current_menu');
	$('#gallery_navigation').removeClass('current_menu');
	$('#faq_navigation').removeClass('current_menu');
	$('#edit_data_navigation').addClass('current_menu');
</script>