<div class="register_div" style="margin-left:auto;margin-right:auto;">
	<div id="warning_box" style="color:red;width:330px;height:auto;">
		<?php
			if (ISSET($error))
			{
				foreach ($error as $temp)
				{
					echo "- ".$temp."<br />";
				}
			}
		?>
	</div>
	<form action="/itbpc2012/index.php/contestant/reseted_password" method="POST">

		<input type="hidden" name="id" value="<?php echo $id;?>" />
		<input type="password" class="register" name="password_baru" placeholder="Password"/> <br />
		<input type="password" class="register" name="konfirmasi_password_baru" placeholder="Konfirmasi Password"/> <br />
		<input type="submit" class="link_blue" value="Ubah" style="float:right;"/>

	</form>
</div>