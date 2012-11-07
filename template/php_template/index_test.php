<!DOCTYPE html>
<html lang="zh-cn" >
<head>
<meta charset="utf-8">
<title> Kunlun.com </title>
<meta http-equiv="X-UA-Compatible" content="IE=9,chrome=1">
<script>document.domain='doopp.com'</script>
<style>
html {
}
html, body, #doc, #page-outer { height: 100%; }

body, label, input, textarea, select, button {
	font-family: "Helvetica Neue",Arial,sans-serif;
}
body {
	overflow-y: scroll;
	background-color: #292929;
	color: #333333;
	font-size: 14px;
	line-height: 18px;
	margin: 0;
	padding: 0;
}
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
    background: none repeat scroll 0 0 #000000;
    height: 200%;
    left: -50%;
    position: fixed;
    width: 200%;
}
.front-image {
	display: block;
    bottom: 0;
    left: 0;
    margin: auto;
    min-height: 50%;
    min-width: 50%;
    right: 0;
    top: 0;
}
img {
	border: 0 none;
}
</style>
</head>
<body>
	<div id="doc">
		<div class="topbar">
			<div class="global-nav"></div>	
		</div>
		<div id="page-outer">
			<div class="front-container">
				<div class="front-bg">
					<img src="image/jp-mountain@2x.jpg" class="front-image">
				</div>
				<div>123</div>
			</div>
		</div>
	</div>
</body>
</html>