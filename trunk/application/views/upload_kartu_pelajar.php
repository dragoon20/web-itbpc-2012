<div class="register_div" style="margin-left:auto;margin-right:auto;">
	<?php echo form_open_multipart('contestant/upload_kartu_pelajar');?>

		<input type="file" name="userfile" size="20" />

		<br /><br />

		<input type="submit" value="upload" />
	</form>
</div>
<script>
	$('#home_navigation').removeClass('current_menu');
	$('#senior_navigation').removeClass('current_menu');
	$('#junior_navigation').removeClass('current_menu');
	$('#gallery_navigation').removeClass('current_menu');
	$('#faq_navigation').removeClass('current_menu');
	$('#edit_data_navigation').addClass('current_menu');

</script>