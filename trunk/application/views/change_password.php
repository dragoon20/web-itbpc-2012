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
	<form action="/itbpc2012/index.php/contestant/change_password" method="POST">

		<input type="password" class="register" name="password_lama" placeholder="Password Lama"/> <br />
		<input type="password" class="register" name="password_baru" placeholder="Password Baru"/> <br />
		<input type="password" class="register" name="konfirmasi_password_baru" placeholder="Konfirmasi Password Baru"/> <br />
		<input type="submit" class="link_blue" value="Ubah" style="float:right;"/>

	</form>
</div>