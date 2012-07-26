
<style style="text/css">

.lcdstyle{ /*Example CSS to create LCD countdown look*/
background-color:black;
color:lime;
font: bold 18px MS Sans Serif;
padding: 3px;
}

.lcdstyle sup{ /*Example CSS to create LCD countdown look*/
font-size: 80%
}

</style>

<script type="text/javascript">
		/***********************************************
		* Universal Countdown script- ? Dynamic Drive (http://www.dynamicdrive.com)
		* This notice MUST stay intact for legal use
		* Visit http://www.dynamicdrive.com/ for this script and 100s more.
		***********************************************/
			function cdLocalTime(container, servermode, offsetMinutes, targetdate, debugmode){
				if (!document.getElementById || !document.getElementById(container)) return
				this.container=document.getElementById(container)
				var servertimestring=(servermode=="server-php")? '<? print date("F d, Y H:i:s", time())?>' : (servermode=="server-ssi")? '<!--#config timefmt="%B %d, %Y %H:%M:%S"--><!--#echo var="DATE_LOCAL" -->' : '<%= Now() %>'
				//this.localtime=this.serverdate=new Date(servertimestring)
				// this.localtime=this.serverdate=new Date()
				this.localtime=this.serverdate=new Date('<?php echo date("F d, Y H:i:s", time())?>')
				this.targetdate=new Date(targetdate)
				//this.debugmode=(typeof debugmode!="undefined")? 1 : 0
				this.debugmode=0
				this.timesup=false
				this.localtime.setTime(this.serverdate.getTime()+offsetMinutes*60*1000) //add user offset to server time
				this.updateTime()
			}
			 
			cdLocalTime.prototype.updateTime=function(){
				var thisobj=this
				this.localtime.setSeconds(this.localtime.getSeconds()+1)
				setTimeout(function(){thisobj.updateTime()}, 1000) //update time every second
			}
			 
			cdLocalTime.prototype.displaycountdown=function(baseunit, functionref){
				this.baseunit=baseunit
				this.formatresults=functionref
				this.showresults()
			}
			 
			cdLocalTime.prototype.showresults=function(){
				var thisobj=this
				var debugstring=""
				var debugstring=(this.debugmode)? "<p style=\"background-color: #FCD6D6; color: black; padding: 5px\"><big>Debug Mode on!</big><br /><b>Current Local time:</b> "+this.localtime.toLocaleString()+"<br />Verify this is the correct current local time, in other words, time zone of count down date.<br /><br /><b>Target Time:</b> "+this.targetdate.toLocaleString()+"<br />Verify this is the date/time you wish to count down to (should be a future date).</p>" : ""
				 
				var timediff=(this.targetdate-this.localtime)/1000 //difference btw target date and current date, in seconds
				if (timediff<0){ //if time is up
					this.timesup=true
					this.container.innerHTML=debugstring+this.formatresults()
					return
					}
					
				var oneMinute=60 //minute unit in seconds
				var oneHour=60*60 //hour unit in seconds
				var oneDay=60*60*24 //day unit in seconds
				var dayfield=Math.floor(timediff/oneDay)
				var hourfield=Math.floor((timediff-dayfield*oneDay)/oneHour)
				var minutefield=Math.floor((timediff-dayfield*oneDay-hourfield*oneHour)/oneMinute)
				var secondfield=Math.floor((timediff-dayfield*oneDay-hourfield*oneHour-minutefield*oneMinute))
				if (this.baseunit=="hours"){ //if base unit is hours, set "hourfield" to be topmost level
					hourfield=dayfield*24+hourfield
					dayfield="n/a"
					}
				else if (this.baseunit=="minutes"){ //if base unit is minutes, set "minutefield" to be topmost level
					minutefield=dayfield*24*60+hourfield*60+minutefield
					dayfield=hourfield="n/a"
					}
				else if (this.baseunit=="seconds"){ //if base unit is seconds, set "secondfield" to be topmost level
					var secondfield=timediff
					dayfield=hourfield=minutefield="n/a"
					}

				this.container.innerHTML=debugstring+this.formatresults(dayfield, hourfield, minutefield, secondfield)
				setTimeout(function(){thisobj.showresults()}, 1000) //update results every second
			}
			 
			/////CUSTOM FORMAT OUTPUT FUNCTIONS BELOW//////////////////////////////
			 
			//Create your own custom format function to pass into cdLocalTime.displaycountdown()
			//Use arguments[0] to access "Days" left
			//Use arguments[1] to access "Hours" left
			//Use arguments[2] to access "Minutes" left
			//Use arguments[3] to access "Seconds" left
			 
			//The values of these arguments may change depending on the "baseunit" parameter of cdLocalTime.displaycountdown()
			//For example, if "baseunit" is set to "hours", arguments[0] becomes meaningless and contains "n/a"
			//For example, if "baseunit" is set to "minutes", arguments[0] and arguments[1] become meaningless etc

			 
			//2) Display countdown with a stylish LCD look, and display an alert on target date/time
			function formatresults2(){
				if (this.timesup==false){ //if target date/time not yet met
					var displaystring="<span style='font-size:90%;text-align:center;font-color:DDDDDD;'>"+arguments[0]+" <sup>hari</sup> "+arguments[1]+" <sup>jam</sup> "+arguments[2]+" <sup>menit</sup> "+arguments[3]+" <sup>detik</sup> </span>"
				}
				else{ //else if target date/time met
				// var displaystring="sedang berlangsung" 
				var displaystring=""
				//alert("Launch time!") //Instead, perform a custom alert
			}
			return displaystring
			}

		</script>

<div id="cdcontainer"></div>

	<div id="header">
		<div style="width:280px;margin-top:20px;" class="left">
			<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
			<script>
				new TWTR.Widget({
				  version: 2, 
				  type: 'profile',
				  rpp: 10,
				  interval: 30000,
				  width: 245,
				  height: 120,
				  theme: {
				    shell: {
				      background: '#007bc2',
				      color: '#ffffff'
				    },
				    tweets: {
				      background: '#ffffff',
				      color: '#696469',
				      links: '#ec7526'
				    }
				  },
				  features: {
				    scrollbar: true,
				    loop: false,
				    live: false,
				    behavior: 'all'
				  }
				}).render().setUser('itbpc').start();
			</script>
		</div>
		<div style="width:220px;height:210px; margin-top:20px; margin-left:85px;" class="left">
			<a href="<?php echo base_url("welcome/index");?>"><img src="<?php echo base_url("images/itbpc2012.png");?>" width="100%"></a>
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=192855437509108";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
			</script>
			<div style="margin-top:10px; margin-left:72px; width:100px;" class="fb-like" data-href="http://www.facebook.com/itbpc" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-font="lucida grande"></div>
		</div>
		<div style="width:260px;height:180px; margin-top:60px; margin-left:20px;" class="right"> 
			<span style="font-size:18px;color:#666;">
			Pendaftaran ITBPC 2012 <br>
			dibuka hingga : 
				<div id="countdown_daftar"></div>
					<script type="text/javascript">
						var cd_ioi=new cdLocalTime("countdown_daftar", "server-php", 0, "September 10, 2012 23:59:00", 0)
						cd_ioi.displaycountdown("days", formatresults2)
						</script> 
						
						<a href="http://www.twitter.com/itbpc" target="_blank"><img 
								src="<?php echo base_url("images/twitter.png");?>"
								style="
									width	: 50px;
									height	: 50px;"
								title="Follow us on Twitter!"
						></a>
						<a href="http://www.facebook.com/itbpc" target="_blank"><img 
							src="<?php echo base_url("images/facebook.png");?>"
							style="
								width	: 50px;
								height	: 50px;"	
							title="Visit our page on Facebook!"
						></a>
						<a href="http://www.tokilearning.org" target="_blank"><img 
							src="<?php echo base_url("images/toki.png");?>"
							style="
								width	: 50px;
								height	: 50px;"	
							title="TOKI Learning Center"	
						></a> 
						<a 	href="#fragment-4a"
							id="goToContact" 
						><img src="<?php echo base_url("images/contact.png");?>"
							style="
								width	: 50px;
								height	: 50px;"	
							title="Kontak panitia"	 /></a>
			<span>
		</div>
	</div>
			
	

	<!-- end #header -->