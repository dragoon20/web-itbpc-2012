
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
* Universal Countdown script- © Dynamic Drive (http://www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/

function cdLocalTime(container, servermode, offsetMinutes, targetdate, debugmode){
if (!document.getElementById || !document.getElementById(container)) return
this.container=document.getElementById(container)
var servertimestring=(servermode=="server-php")? '<? print date("F d, Y H:i:s", time())?>' : (servermode=="server-ssi")? '<!--#config timefmt="%B %d, %Y %H:%M:%S"--><!--#echo var="DATE_LOCAL" -->' : '<%= Now() %>'
this.localtime=this.serverdate=new Date(servertimestring)
this.targetdate=new Date(targetdate)
this.debugmode=(typeof debugmode!="undefined")? 1 : 0
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

//1) Display countdown using plain text
function formatresults(){
	if (this.timesup==false){//if target date/time not yet met
		var displaystring="<span style='background-color: #CFEAFE'>"+arguments[1]+" hours "+arguments[2]+" minutes "+arguments[3]+" seconds</span> left until launch time"
	}
	else{ //else if target date/time met
		var displaystring="Launch time!"
	}
		return displaystring
}

//2) Display countdown with a stylish LCD look, and display an alert on target date/time
function formatresults2(){
	if (this.timesup==false){ //if target date/time not yet met
		var displaystring="<span class='lcdstyle'>"+arguments[0]+" <sup>days</sup> "+arguments[1]+" <sup>hours</sup> "+arguments[2]+" <sup>minutes</sup> "+arguments[3]+" <sup>seconds</sup></span> left until launch time"
	}
	else{ //else if target date/time met
		var displaystring="" //Don't display any text
		alert("Launch time!") //Instead, perform a custom alert
	}
	return displaystring
}

</script>

<div id="cdcontainer"></div>



<div id="header-wrapper">
		<div id="header">
			<div id="logo">
				<h1><img src="<?php echo base_url("images/itbpc2012.png"); ?>" width=20%></h1>
			</div>
			
			<div id="hd_txt">
				<!--<div id="hd_txt_1">COMING <span id="hd_txt_2">(NOT SO) </span>SOON!!</div>-->
				<div id="hd_txt_2">
					Pendaftaran ITBPC 2012
				</div>
				<div id="hd_txt_3">
					dibuka hingga : <!--Daftar sekarang! <br />
					<a href="#itbspc_pendaftaran">ITBSPC</a> | 
					<a href="#itbjpc_pendaftaran">ITBJPC</a> |
					<a href="#secpd_pendaftaran">Seminar</a><br />-->
				</div>

				<div id="cdcontainer"></div>

				<script type="text/javascript">
				//cdLocalTime("ID_of_DIV_container", "server_mode", LocaltimeoffsetMinutes, "target_date", "opt_debug_mode")
				//cdLocalTime.displaycountdown("base_unit", formatfunction_reference)

				//Note: "launchdate" should be an arbitrary but unique variable for each instance of a countdown on your page:

				var launchdate=new cdLocalTime("cdcontainer", "server-php", 0, "July 10, 2012 19:58:00")
				launchdate.displaycountdown("days", formatresults2)
				</script>
					
				<div>	
					<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fitbpc&amp;
							layout=button_count&amp;
							show_faces=true&amp;
							width=450&amp;
							action=like&amp;
							font&amp;
							colorscheme=light&amp;"
							
						scrolling="no" 
						frameborder="0" 
						style="border:none; 
							position: absolute;
							align	: center;
							margin-top: 30px;
							margin-left: 450px;
							height	:20px;" 
						allowTransparency="true">
					</iframe>
				</div>
			</div>
		
		</div>
</div>

	<!-- end #header -->