<table class="table_admin">
	<tr>
		<th width="20%">Nama Tim</th>
		<th width="20%">Nama Ketua</th>
		<th width="20%">Nama Universitas</th>
		<th width="20%">Nomor Ponsel</th>
		<th width="20%">Email</th>
		<th width="20%">Status</th>
	</tr>
	<?php
		foreach ($contestant as $each)
		{
			?>
			<tr onclick="view_detail(<?php echo $each['id'];?>)">
				<td><?php echo $each['name']; ?></td>		
				<td><?php echo $each['leader_name']; ?></td>
				<td><?php echo $each['university_name']; ?></td>
				<td><?php echo $each['phone']; ?></td>
				<td><?php echo $each['email']; ?></td>
				<td>
					<?php
						if ($each['flag']==1)
						{
							echo "Checked";
						}
						else if ($each['flag']==0)
						{
							echo "Unchecked";
						}
					?>
				</td>
			</tr>
			<?php
		}
	?>
</table>
<script>
	function view_detail(i)
	{
		window.location = "<?php echo base_url("admin/detail_spc?id="); ?>"+i;
	}
</script>