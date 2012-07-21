<div class="register_div" style="margin-left:auto;margin-right:auto;">
	<form action="/itbpc2012/index.php/contestant/reseted_password" method="POST">

		<input type="hidden" name="id" value="<?php echo $id;?>" />
		<input type="password" class="register" name="password_baru" placeholder="Password"/> <br />
		<input type="password" class="register" name="konfirmasi_password_baru" placeholder="Konfirmasi Password"/> <br />
		<input type="submit" class="register_button" value="Ubah" style="float:right;"/>

	</form>
</div>
<script type="text/javascript" src="<?php echo base_url("js/jquery-1.7.2.js");?>"> </script>