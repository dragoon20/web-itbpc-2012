<div style="width:500px; margin-left:auto; margin-right:auto;">
	
	<form id="form1" action="<?php echo base_url("contestant/upload_kartu_pelajar_universitas?flag=1"); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<label class="left" style="width:35%;">KTM #1</label>
		<input type="file" name="userfile" size="60%" class="left"/>
		<br/><br/>
	</form>
	
	<form id="form2" action="<?php echo base_url("contestant/upload_kartu_pelajar_universitas?flag=2"); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	
		<label class="left" style="width:35%;">KTM #2</label><input type="file" name="userfile" size="60%" class="left"/>
		<br /><br />
	</form>
	
	<form id="form3" action="<?php echo base_url("contestant/upload_kartu_pelajar_universitas?flag=3"); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<label class="left" style="width:35%;">KTM #3</label><input type="file" name="userfile" size="60%" class="left" />
		<br /><br />
	</form>
	
	<form id="form4" action="<?php echo base_url("contestant/upload_bukti_pembayaran"); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<label class="left" style="width:35%;">Bukti Pembayaran</label><input type="file" name="userfile" size="60%" class="left" />
		<br /><br />
	</form>
	<br>
	<a class="link_blue" href="javascript:submit()">Upload</a>
	<br><br>
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
					} else if (iframeId2.contentWindow) {
						content2 = iframeId2.contentWindow.document.body.innerHTML;
					} else if (iframeId2.document) {
						content2 = iframeId2.document.body.innerHTML;
					}
			
					hide_loader();
					
					if (content2 == "success")
					{
						var iframe3 = document.createElement("iframe");
						var form3 = document.getElementById('form3');
						iframe3.setAttribute("id", "upload_iframe3");
						iframe3.setAttribute("name", "upload_iframe3");
						iframe3.setAttribute("width", "0");
						iframe3.setAttribute("height", "0");
						iframe3.setAttribute("border", "0");
						iframe3.setAttribute("style", "width: 0; height: 0; border: none;");
						
						// Add to document...
						form3.parentNode.appendChild(iframe3);
						window.frames['upload_iframe3'].name = "upload_iframe3";
						
						iframeId3 = document.getElementById("upload_iframe3");
						
						// Add event...
						var eventHandler3 = function () {
						
							if (iframeId3.detachEvent) iframeId3.detachEvent("onload", eventHandler3);
							else iframeId3.removeEventListener("load", eventHandler3, false);
					
							// Message from server...
							if (iframeId3.contentDocument) {
								content3 = iframeId3.contentDocument.body.innerHTML;
							} else if (iframeId3.contentWindow) {
								content3 = iframeId3.contentWindow.document.body.innerHTML;
							} else if (iframeId3.document) {
								content3 = iframeId3.document.body.innerHTML;
							}
					
							hide_loader();
							
							if (content3 == "success")
							{
								var iframe4 = document.createElement("iframe");
								var form4 = document.getElementById('form4');
								iframe4.setAttribute("id", "upload_iframe4");
								iframe4.setAttribute("name", "upload_iframe4");
								iframe4.setAttribute("width", "0");
								iframe4.setAttribute("height", "0");
								iframe4.setAttribute("border", "0");
								iframe4.setAttribute("style", "width: 0; height: 0; border: none;");
								
								// Add to document...
								form4.parentNode.appendChild(iframe4);
								window.frames['upload_iframe4'].name = "upload_iframe4";
								
								iframeId4 = document.getElementById("upload_iframe4");
								
								// Add event...
								var eventHandler4 = function () {
								
									if (iframeId4.detachEvent) iframeId4.detachEvent("onload", eventHandler4);
									else iframeId4.removeEventListener("load", eventHandler4, false);
							
									// Message from server...
									if (iframeId4.contentDocument) {
										content4 = iframeId4.contentDocument.body.innerHTML;
									} else if (iframeId4.contentWindow) {
										content4 = iframeId4.contentWindow.document.body.innerHTML;
									} else if (iframeId4.document) {
										content4 = iframeId4.document.body.innerHTML;
									}
							
									hide_loader();
									
									if (content4 == "success")
									{
										window.location = "<?php echo base_url("contestant/halaman_spc"); ?>";
									}
									else
									{
										alert("Upload gambar gagal");
									}
									
									// Del the iframe...
									setTimeout('iframeId4.parentNode.removeChild(iframeId4)', 250);
								};
								
								if (iframeId4.addEventListener) iframeId4.addEventListener("load", eventHandler4, true);
								if (iframeId4.attachEvent) iframeId4.attachEvent("onload", eventHandler4);
								
								// Set properties of form...
								form4.setAttribute("target", "upload_iframe4");
								
								// Submit the form...
								form4.submit();
							}
							else
							{
								alert("Upload gambar gagal");
							}
							
							// Del the iframe...
							setTimeout('iframeId3.parentNode.removeChild(iframeId3)', 250);
						}
						if (iframeId3.addEventListener) iframeId3.addEventListener("load", eventHandler3, true);
						if (iframeId3.attachEvent) iframeId3.attachEvent("onload", eventHandler3);
						
						// Set properties of form...
						form3.setAttribute("target", "upload_iframe3");
						
						// Submit the form...
						form3.submit();
					}
					else
					{
						alert("Upload gambar gagal");
					}
					
					// Del the iframe...
					setTimeout('iframeId2.parentNode.removeChild(iframeId2)', 250);
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