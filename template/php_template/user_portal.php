<!DOCTYPE html>
<html lang="zh-cn" >
<head>
<meta charset="utf-8">
<title> Kunlun.com </title>
<meta http-equiv="X-UA-Compatible" content="IE=9,chrome=1">
<script>
document.domain='doopp.com';
window.server_time = "<?php echo $server_time;?>";
window.server_date = "<?php echo $server_date;?>";
window.server_wess = "<?php echo $wess;?>";
</script>
<script>
(function(){function a(){document.write="";window.top.location=window.self.location;setTimeout(function(){document.body.innerHTML=""},0);window.self.onload=function(a){document.body.innerHTML=""}}if(window.top!==window.self)try{window.top.location.host||a(
)}catch(b){a()}})();
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
}
#apps-bar{
    position: absolute;	
	top: 50px;	
    left: 3%;
	width: 94%;
	height: 580px;
	border: 1px solid #000000;
}
#apps-bar ul {
	list-style-type:none;
	width:100%;
	height:100%;
}
#apps-bar ul li{
	display:inline;
	border:1px solid #ccc;
	float:left;
	width:150px;
	height:150px;
}
#apps-bar ul li div{
}
#apps-bar ul li div img{
	width:100%;
	height:100%;
}
.apps-frame{
	display:none;
    position: absolute;	
	top: 50px;	
    left: 5%;
	width: 90%;
	height: 580px;
	border: 1px solid #ffffff;
}
</style>
</head>
<body>
	<div id="doc">
		<div class="topbar">
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
		<div class="apps-frame"></div>
	</div>
	<div id="js-root"></div>
</body>
<script>
(function(){
	function b(){
		var b=a.href.match(/#(.)(.*)$/);
		return b&&b[1]=="!"&&b[2].replace(/^\//,"")
	}
	function c(a){
		if(!a)return!1;a=a.replace(/^#|\/$/,"");//.toLowerCase();
		return a.match(/^[A-Za-z0-9_]+$/)?a:!1
	}
	function d(b){
		var b=c(b);
		if(b){
			var d=document.referrer||"none",e="ev_redir_"+b+"="+d+"; path=/";
			document.cookie=e;
			a.replace("/?act=portal#"+b);
			RushJR(b);
		}
	}
	function e(){
		alert(1);
		var c=b();
		c&&a.replace("//"+a.host+"/"+c);
		a.hash!=""&&d(a.hash.substr(1));//.toLowerCase());
	}
	var a=window.location;
	e();
	window.addListener("hashchange",e);
})();
RushJR("portal.getUserApps&callback=UI.showPortalApps");
</script>
</html>