<!DOCTYPE html>
<html lang="zh-cn" >
<head>
<meta charset="utf-8">
<title> Kunlun.com </title>
<meta http-equiv="X-UA-Compatible" content="IE=9,chrome=1">
<script>
(function(){function a(){document.write="";window.top.location=window.self.location;setTimeout(function(){document.body.innerHTML=""},0);window.self.onload=function(a){document.body.innerHTML=""}}if(window.top!==window.self)try{window.top.location.host||a()}catch(b){a()}})();
</script>
<script>
document.domain='doopp.com';
window.server_time = "<?php echo $server_time;?>";
window.server_date = "<?php echo $server_date;?>";
window.server_wess = "<?php echo $wess;?>";
</script>
<script src="/js/rushphp_core.js" type="text/javascript"></script>
<style>
* { margin: 0; padding: 0; }
html {}
html, body, #doc, #page-outer { height: 100%; }
body, label, input, textarea, select, button {font-family: "Helvetica Neue",Arial,sans-serif;}
body {overflow-y: scroll; background: #292929 url(/image/background_linen.png) repeat fixed top;color: #333333;font-size: 14px;line-height: 18px;margin: 0;padding: 0;}
form {font-size: 12px;margin-bottom: 0;}
input, textarea, select {background-color: #FFFFFF;border: 1px solid #CCCCCC;border-radius: 3px 3px 3px 3px;display: inline-block;margin: 0;outline: 0 none;padding: 4px;width: 210px;}
label, input, textarea, select {font-size: 13px;line-height: 20px;margin: 0;}
table {border-collapse: collapse;border-spacing: 0;}
td, th {padding: 0;}
button {border: 0 none;margin: 0;	}
label {color: #333333;cursor: pointer;display: block;margin-bottom: 5px;}
#js-root { display:none; height:0px; width:0px; margin:0; padding:0; }
.top-bar {
	box-shadow: 0 2px 3px rgba(0, 0, 0, 0.25);
	left: 0;
	position: fixed;
	right: 0;
	top: 0;
	z-index: 100;
}
.pop-dialog {
    overflow-x: auto;
    overflow-y: scroll;
    background-color: rgba(0, 0, 0, 0.7);
    outline: medium none;
    overflow: visible;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 200;
}
.pop-window
{
    width: 92%;
    height: auto;
    margin: 40px auto 0;
    overflow: visible;
    position: relative;
}
.pop-container {
    direction: ltr;
    position: relative;
    float: right;
    width: 100%;
}
.pop-verticalslab, .pop-horizontalslab {
    background: none repeat scroll 0 0 #525252;
    height: 100%;
	opacity:0.7;
	-moz-opacity:0.7;
	FILTER:progid:DXImageTransform.Microsoft.Alpha(opacity=60);
    position: absolute;
    width: 100%;
}
.pop-verticalslab {
    margin: -10px 0 0;
    padding-bottom: 20px;
}
.pop-horizontalslab {
    margin: 0 0 0 -10px;
    padding-right: 20px;
}
.pop-topleft, .pop-topright, .pop-bottomleft, .pop-bottomright, .pop-topclose {
    height: 10px;
    overflow: hidden;
    position: absolute;
    width: 10px;
}
.pop-topclose {
	background: url("/image/pop-close.png") no-repeat;
	height:29px;	
	width:29px;
	top:-24px;
	left:100%;
	z-index:61;
	cursor: pointer;
}
.pop-topleft {
	background: url("/image/fbicon.png") no-repeat -377px -658px;
    left: -10px;
    top: -10px;
}
.pop-topright {
	background: url("/image/fbicon.png") no-repeat -388px -658px;
    right: -10px;
    top: -10px;
}
.pop-bottomright {
	background: url("/image/fbicon.png") no-repeat -366px -658px;
	bottom: -10px;
	right: -10px;
}
.pop-bottomleft {
	background: url("/image/fbicon.png") no-repeat -355px -658px;
	bottom: -10px;
	left: -10px;
}
.pop-content {
    background: none repeat scroll 0 0 #FFFFFF;	
	direction: ltr;
    outline: medium none;
    position: relative;
}
.pop-content iframe.dialog-frame {
    background: none repeat scroll 0 0 #FFFFFF;
    height: 550px;
    width: 100%;
    padding: 0;
    margin: 0;
}
.global-nav {
	position: relative;
	width: 100%;
	height: 40px;
	background-color: #252525;
	background-position: 0 0;
	background-image: url("image/twitter_web_sprite_bgs.png");
	background-repeat: repeat-x;
}
.pull-right{
	float:right;
    margin-right: 20px;
}
.pull-right a{
    margin-right: 9px;
    color: #BBBBBB;
    font-weight: bold;
    height: 40px;
    line-height: 40px;
    padding: 13px 5px 15px;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.75);
    font-size: 12px;
    position: relative;
    text-decoration: none;
}
.pull-right a:hover{
	text-decoration: underline;
}
#apps-bar{
    position: absolute;	
	top: 80px;	
    left: 5%;
	width: 90%;
	/* height: 580px; */
	/* border: 1px solid #000000; */
}
#apps-bar ul {
	list-style-type:none;
	width:100%;
	height:100%;
}
#apps-bar ul li{
	display:inline;
	border:0px solid #ccc;
	float:left;
	margin:0 60px 30px 0;
	width:120px;
	height:140px;
}
#apps-bar ul li div{
	text-align:center;
	margin: 0 auto;
}
#apps-bar ul li div img{
	width:100%;
	height:100%;
	/* -webkit-border-radius:4px; */
	/* -moz-border-radius:4px; */
	/* border-radius:4px; */
}
#apps-bar ul li div span{
	color:#eeeeee;
	overflow:hidden;
	width:99%;
	height:20px;
	line-height:20px;
	display:block;
}
</style>
</head>
<body>
	<div id="doc">

		<div class="top-bar">
			<div class="global-nav">
				<div class="pull-right">
					<a class="logout" href="/?act=portal#appstore">应用士多店</a>
					<a class="logout" href="/?act=portal#account">账号设置</a>
					<a class="logout" href="/?act=portal#developer">开发者</a>
					<a class="logout" href="/?act=index.logout">退出</a>
				</div>
			</div>	
		</div>

		<div id="apps-bar"></div>

		<!-- <div class="pop-dialog" id="pop-dialog">
			<div class="pop-window">
				<div class="pop_container">
					<div class="pop_verticalslab"></div>
					<div class="pop_horizontalslab"></div>
					<div class="pop_topclose"></div>
					<div class="pop_topleft"></div>
					<div class="pop_topright"></div>
					<div class="pop_bottomright"></div>
					<div class="pop_bottomleft"></div>
					<div class="pop_content">
						<iframe frameborder="0" src="http://www.baidu.com/" class="dialog_frame"></iframe>
					</div>
				</div>
			</div>
		</div> //-->
		
	</div>
	<div id="js-root"></div>
</body>
</html>