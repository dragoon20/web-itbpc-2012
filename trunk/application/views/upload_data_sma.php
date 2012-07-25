<div style="width:400px; margin-left:auto; margin-right:auto;">
	<form id="form1" action="<?php echo base_url("contestant/upload_kartu_pelajar_sma"); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<label class="left" style="width:35%;">Kartu Pelajar</label> <input class="left" type="file" name="userfile" size="60%"/>
		<br/><br/>
	</form>
	
	<form id="form2" action="<?php echo base_url("contestant/upload_bukti_pembayaran"); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<label class="left" style="width:35%;">Bukti Pembayaran</label>
		<input class="left" type="file" name="userfile" size="20" />
		<br/><br/>
	</form>
	<br>
	<a class="link_blue" href="javascript:submit()">Upload</a>
	<br><br>
</div>
<script type="text/javascript">

	function submit()
	{
		var iframe = document.createElement("iframe");
		var form = document.getElementById('form1');
		iframe.setAttribute("id", "upload_iframe");
		iframe.setAttribute("name", "upload_iframe");
		iframe.setAttribute("width", "0");
		iframe.setAttribute("height", "0");
		iframe.setAttribute("border", "0");
		iframe.setAttribute("style", "width: 0; height: 0; border: none;");
		
		// Add to document...
		form.parentNode.appendChild(iframe);
		window.frames['upload_iframe'].name = "upload_iframe";
		
		iframeId = document.getElementById("upload_iframe");
		
		// Add event...
		var eventHandler = function () {
		
			if (iframeId.detachEvent) iframeId.detachEvent("onload", eventHandler);
			else iframeId.removeEventListener("load", eventHandler, false);
	
			// Message from server...
			if (iframeId.contentDocument) {
				content = iframeId.contentDocument.body.innerHTML;
			} else if (iframeId.contentWindow) {
				content = iframeId.contentWindow.document.body.innerHTML;
			} else if (iframeId.document) {
				content = iframeId.document.body.innerHTML;
			}
	
			hide_loader();
			
			if (content == "success")
			{
				var iframe2 = document.createElement("iframe");
				var form2 = document.getElementById('form2');
				iframe2.setAttribute("id", "upload_iframe2");
				iframe2.setAttribute("name", "upload_iframe2");
				iframe2.setAttribute("width", "0");
				iframe2.setAttribute("height", "0");
				iframe2.setAttribute("border", "0");
				iframe2.setAttribute("style", "width: 0; height: 0; border: none;");
				
				// Add to document...
				form2.parentNode.appendChild(iframe2);
				window.frames['upload_iframe2'].name = "upload_iframe2";
				
				iframeId2 = document.getElementById("upload_iframe2");
				
				// Add event...
				var eventHandler2 = function () {
				
					if (iframeId2.detachEvent) iframeId2.detachEvent("onload", eventHandler2);
					else iframeId2.removeEventListener("load", eventHandler2, false);
			
					// Message from server...
					if (iframeId2.contentDocument) {
						content2 = iframeId2.contentDocument.body.innerHTML;
					} else if (iframeId.contentWindow) {
						content2 = iframeId2.contentWindow.document.body.innerHTML;
					} else if (iframeId.document) {
						content2 = iframeId2.document.body.innerHTML;
					}
			
					hide_loader();
					
					if (content2 == "success")
					{
						window.location = "<?php echo base_url("contestant/halaman_jpc"); ?>";
					}
					else
					{
						alert("Upload gambar gagal");
					}
					
					// Del the iframe...
					setTimeout('iframeId.parentNode.removeChild(iframeId)', 250);
				};
				
				if (iframeId2.addEventListener) iframeId2.addEventListener("load", eventHandler2, true);
				if (iframeId2.attachEvent) iframeId2.attachEvent("onload", eventHandler2);
				
				// Set properties of form...
				form2.setAttribute("target", "upload_iframe2");
				
				// Submit the form...
				form2.submit();
			}
			else
			{
				alert("Upload gambar gagal");
			}
			
			// Del the iframe...
			setTimeout('iframeId.parentNode.removeChild(iframeId)', 250);
		};
		
		if (iframeId.addEventListener) iframeId.addEventListener("load", eventHandler, true);
		if (iframeId.attachEvent) iframeId.attachEvent("onload", eventHandler);
		
		// Set properties of form...
		form.setAttribute("target", "upload_iframe");
		
		// Submit the form...
		form.submit();
	}
</script>