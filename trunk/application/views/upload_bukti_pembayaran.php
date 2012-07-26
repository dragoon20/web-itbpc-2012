<div class="register_div" style="margin-left:auto;margin-right:auto;">
	
	<form id="form1" action="<?php echo base_url("contestant/upload_kartu_pelajar"); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	
		<input type="file" name="userfile" size="20" />

		<br /><br />

	</form>
	
	<form id="form2" action="<?php echo base_url("contestant/upload_bukti_pembayaran"); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	
		<input type="file" name="userfile" size="20" />

		<br /><br />

	</form>

	<a class="button" href="javascript:submit()">Upload</a>

</div>
<script type="text/javascript">
	$('#home_navigation').removeClass('current_menu');
	$('#senior_navigation').removeClass('current_menu');
	$('#junior_navigation').removeClass('current_menu');
	$('#gallery_navigation').removeClass('current_menu');
	$('#faq_navigation').removeClass('current_menu');
	$('#edit_data_navigation').addClass('current_menu');

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
				var iframe = document.createElement("iframe");
				var form = document.getElementById('form2');
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
						window.location('<?php echo base_url("welcome/index"); ?>');
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
				form.setAttribute("action", base_url+"web/upload");
				form.setAttribute("encoding", "multipart/form-data");
				
				// Submit the form...
				form.submit();
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
		form.setAttribute("action", base_url+"web/upload");
		form.setAttribute("encoding", "multipart/form-data");
		
		// Submit the form...
		form.submit();
	}
</script>