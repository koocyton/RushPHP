<!DOCTYPE html>
<html lang="zh-cn" >
<head>
<meta charset="utf-8">
<title> Kunlun.com </title>
<meta http-equiv="X-UA-Compatible" content="IE=9,chrome=1">
<script>document.domain='doopp.com'</script>
<script>
(function(){function a(){document.write="";window.top.location=window.self.location;setTimeout(function(){document.body.innerHTML=""},0);window.self.onload=function(a){document.body.innerHTML=""}}if(window.top!==window.self)try{window.top.location.host||a(
)}catch(b){a()}})();
</script>
<style>
html {}
html, body, #doc, #page-outer { height: 100%; }
body, label, input, textarea, select, button {font-family: "Helvetica Neue",Arial,sans-serif;}
body {overflow-y: scroll;background-color: #292929;color: #333333;font-size: 14px;line-height: 18px;margin: 0;padding: 0;}
form {font-size: 12px;margin-bottom: 0;}
input, textarea, select {background-color: #FFFFFF;border: 1px solid #CCCCCC;border-radius: 3px 3px 3px 3px;display: inline-block;margin: 0;outline: 0 none;padding: 4px;width: 210px;}
label, input, textarea, select {font-size: 13px;line-height: 20px;margin: 0;}
table {border-collapse: collapse;border-spacing: 0;}
td, th {padding: 0;}
button {border: 0 none;margin: 0;	}
label {color: #333333;cursor: pointer;display: block;margin-bottom: 5px;}
.topbar {
	box-shadow: 0 2px 3px rgba(0, 0, 0, 0.25);
	left: 0;
	position: fixed;
	right: 0;
	top: 0;
	z-index: 1000;
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
.front-container {
	bottom: 0;
    display: block;
    left: 0;
    max-height: 750px;
    min-height: 545px;
    position: absolute;
    right: 0;
    top: 0;
}
.front-bg {
	background: #292929 url(/image/background_linen.png) repeat fixed top;
    height: 200%;
    left: -50%;
    position: fixed;
    width: 200%;
}
.pull-right{
	float:right;
}
.logout{
    padding-left: 12px;
    padding-right: 12px;
    color: #BBBBBB;
    display: block;
    font-weight: bold;
    height: 12px;
    line-height: 1;
    padding: 13px 12px 15px;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.75);
    font-size: 12px;
    position: relative;
}
</style>
</head>
<body>
	<div id="doc">
		<div class="topbar">
			<div class="global-nav">
				<div class="pull-right">
					<a class="logout" href="/?act=index.logout">退出</a>
				</div>
			</div>	
		</div>
		<div id="page-outer">
			<div class="front-container">
				<div class="front-bg"></div>
			</div>
		</div>
	</div>
</body>
<script>
(function(){function b(){var b=a.href.match(/#(.)(.*)$/);return b&&b[1]=="!"&&b[2].replace(/^\//,"")}function c(a){if(!a)return!1;a=a.replace(/^#|\/$/,"").toLowerCase();return a.match(/^[a-z0-9_]+$/)?a:!1}function d(b){var b=c(b);if(b){var d=document.referrer||"none",e="ev_redir_"+b+"="+d+"; path=/";document.cookie=e;a.replace("/#"+b)}}function e(){var c=b();c&&a.replace("//"+a.host+"/"+c);a.hash!=""&&d(a.hash.substr(1).toLowerCase());}var a=window.location;e();window.addEventListener?window.addEventListener("hashchange",e,!1):window.attachEvent&&window.attachEvent("onhashchange",e)})();
</script>
</html>