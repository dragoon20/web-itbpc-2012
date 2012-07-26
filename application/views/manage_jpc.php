<table>
	<tr>
		<th>Nama</th>
		<th>Nomor Ponsel</th>
		<th>Email</th>
		<th>Kelas</th>
		<th>Nama Sekolah</th>
		<th>Status</th>
	</tr>
	<?php
		foreach ($contestant as $each)
		{
			?>
			<tr onclick="view_detail(<?php echo $each['id'];?>)">
				<td><?php echo $each['name']; ?></td>
				<td><?php echo $each['phone']; ?></td>
				<td><?php echo $each['email']; ?></td>
				<td><?php echo $each['class']; ?></td>
				<td><?php echo $each['school_name']; ?></td>
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
		window.location = "<?php echo base_url("admin/detail_jpc?id="); ?>"+i;
	}
</script>