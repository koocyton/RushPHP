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
.topbar {box-shadow: 0 2px 3px rgba(0, 0, 0, 0.25);left: 0;position: fixed;right: 0;top: 0;z-index: 1000;}
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
    border: 0 none;
    margin: auto;
    min-height: 50%;
    min-width: 50%;
    right: 0;
    top: 0;
}
.front-card {
    height: 328px;
    margin: -154px 0 0 -418px;
    top: 55%;
    left: 50%;
    position: absolute;
    width: 838px;
}
.front-welcome {
    background: none repeat scroll 0 center transparent;
    box-shadow: none;
    border: 0 none;
    display: block;
    height: 328px;
    left: 0;
    position: absolute;
    top: 0;
    width: 520px;
}
.front-welcome-text {
    bottom: 1%;
    color: #EEEEEE;
    font-size: 20px;
    font-weight: 300;
    left: 0;
    line-height: 22px;
    position: absolute;
    text-align: left;
    text-shadow: 0 1px 2px #000000;
    width: 470px;
}
.front-welcome-text h1 {
    color: #FFFFFF;
    font-size: 20px;
    font-weight: 700;
    line-height: 1;
    margin: 0;
    text-rendering: optimizelegibility;
}
.front-signin{
	position:absolute;
    top:0;
    left:536px;
    width:300px;
    height:108px;
	-webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow:0 1px 0 rgba(0,0,0,.1);
    -moz-box-shadow:0 1px 0 rgba(0,0,0,.1);
    box-shadow:0 1px 0 rgba(0,0,0,.1);
	padding:0;
    margin:0;
	background:#fff;
    background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#fff),color-stop(100%,#ddd));
    background:-webkit-linear-gradient(top,#fff 0,#ddd 100%);
    background:-moz-linear-gradient(top,#fff 0,#ddd 100%);
    background:-ms-linear-gradient(top,#fff 0,#ddd 100%);
    background:-o-linear-gradient(top,#fff 0,#ddd 100%);
    background:linear-gradient(top,#fff 0,#ddd 100%);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff',endColorstr='#dddddd',GradientType=0);
    border-left:solid 1px #eee;
    border-right:solid 1px #eee;
    border-bottom:solid 1px #ccc;
}
.front-signin .username{
	left: 12px;
    position: absolute;
    top: 12px;
    width: 276px;
    height: 30px;
    font-size: 13px;
    overflow: visible;
    color: #999999;
}
.placeholder{
	position:absolute;
	top:1px;
	background-color: #FFFFFF;
	right:1px;
	bottom:1px;
	left:2px;
	z-index:1;
	height:20px;
	padding:4px;
	font-size:13px;
	line-height:20px;
	color:#999;
	text-shadow:0 1px 0 rgba(255,255,255,.5);
	white-space:nowrap;
	cursor:text;
	-webkit-transition:opacity .1s,font-size .1s;
	-moz-transition:opacity .1s,font-size .1s;
	-o-transition:opacity .1s,font-size .1s;
	-webkit-user-select:none;
	-moz-user-select:none;
	-o-user-select:none;
	user-select:none;
}
.flex-table {
	left: 12px;
	position: absolute;
	top: 48px;
	width: 276px;
}
.flex-table-primary {
	padding-right: 5px;
	width: 99%;
	vertical-align: top;
}
.placeholding-input {
	width: 100%;
	height: 30px;
	font-size: 13px;
	overflow: visible;
	position: relative;
	float: left;
}
.text-input{
	background-color: #FFFFFF;
	display:block;
	text-align:left;
	border:1px solid #ccc;
	-webkit-box-shadow:inset 0 1px 0 #eee,#fff 0 1px 0;
	-moz-box-shadow:inset 0 1px 0 #eee,#fff 0 1px 0;
	box-shadow:inset 0 1px 0 #eee,#fff 0 1px 0;
	-webkit-box-sizing:border-box;
	-moz-box-sizing:border-box;
	-ms-box-sizing:border-box;
	height:30px;
	line-height:normal;
	*width:92%;
	*height:24px;
}
.text-input:focus{
	background-color: #FFFFFF;	
	border:1px solid #56b4ef;
	-webkit-box-shadow:inset 0 1px 3px rgba(0,0,0,.05),0 0 8px rgba(82,168,236,.6);
	-moz-box-shadow:inset 0 1px 3px rgba(0,0,0,.05),0 0 8px rgba(82,168,236,.6);
	box-shadow:inset 0 1px 3px rgba(0,0,0,.05),0 0 8px rgba(82,168,236,.6);
}
.front-signin .username .account-input{
	width:266px
}
.password-input {
	width:100%;
}
.flex-table-secondary {
	max-width: 1%;
    width: 1%;
    vertical-align: top;
}
.flex-table-secondary .btn{
	height: 30px;
	float: right;
	white-space: nowrap;
	width: auto;
	border: 1px solid #057ED0;
	color: #FFFFFF;
	text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
	border-radius: 4px 4px 4px 4px;
	cursor: pointer;
	display: inline-block;
	font-size: 13px;
	font-weight: bold;
	line-height: 18px;
	overflow: visible;
	padding: 5px 10px;
	position: relative;
	-webkit-box-shadow:0 1px 0 rgba(255,255,255,.5);
	-moz-box-shadow:0 1px 0 rgba(255,255,255,.5);
	box-shadow:0 1px 0 rgba(255,255,255,.5);
}
.flex-table-secondary .submit{
    background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#33BCEF),color-stop(100%,#019AD2));
    background:-webkit-linear-gradient(top,#33BCEF 0,#019AD2 100%);
    background:-moz-linear-gradient(top,#33BCEF 0,#019AD2 100%);
    background:-ms-linear-gradient(top,#33BCEF 0,#019AD2 100%);
    background:-o-linear-gradient(top,#33BCEF 0,#019AD2 100%);
    background:linear-gradient(top,#33BCEF 0,#019AD2 100%);
}
.flex-table-secondary .submit:hover{
    background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#2DADDC),color-stop(100%,#0271BF));
    background:-webkit-linear-gradient(top,#2DADDC 0,#0271BF 100%);
    background:-moz-linear-gradient(top,#2DADDC 0,#0271BF 100%);
    background:-ms-linear-gradient(top,#2DADDC 0,#0271BF 100%);
    background:-o-linear-gradient(top,#2DADDC 0,#0271BF 100%);
    background:linear-gradient(top,#2DADDC 0,#0271BF 100%);
}
.remember-forgot {
	left: 12px;
	margin: 0;
	position: absolute;
	top: 82px;
	width: 276px;
}
.front-signin .remember {
	color: #999999;
    display: inline;
    font-size: 11px;
    line-height: 13px;
    margin: 0;
    text-shadow: 0 1px 0 rgba(255, 255, 255, 0.6);
    text-align: left;
}
.front-signin .remember input[type="checkbox"] {
    height: 13px;
    margin: 0;
    vertical-align: text-top;
}
input[type="checkbox"], input[type="radio"] {
    background-color: transparent;
    border: 0 none;
    cursor: pointer;
    height: auto;
    line-height: normal;
    margin: 3px 0;
    padding: 0;
    width: auto;
}
.front-signin .separator {
    color: #999999;
    font-weight: bold;
    margin: 0 1px 0 2px;
    display: inline;
    font-size: 11px;
    line-height: 13px;
}
.front-signin .forgot{
    color: #999999;
    display: inline;
    font-size: 11px;
    line-height: 13px;
    margin: 0;
    text-shadow: 0 1px 0 rgba(255, 255, 255, 0.6);
    text-decoration: none;
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
					<img src="image/jp-mountain@3x.jpg" class="front-image">
				</div>
				<div class="front-card">
					<div class="front-welcome">
						<div class="front-welcome-text">
							<p>在这里，一起探寻变化的大千世界。</p>
						</div>
					</div>
					<div class="front-signin">
					<!-- Login Form Begin //-->


					<form action="/?act=index.login" class="signin" method="post">
						<div style="display:none;">
						<input type="text" />
						<input type="password" />
						<input type="password" />
						</div>

				        <div class="username">
				          <input type="text" id="signin-account" class="text-input account-input" name="account" title="用户名或电子邮件地址" autocomplete="on" tabindex=1>
				          <label id="signin-account-label" for="signin-account" class="placeholder">账号</label>
				        </div>
				    
				        <table class="flex-table">
				          <tbody>
				          <tr>
				            <td class="flex-table-primary">
				              <div class="placeholding-input">
				                <input type="password" id="signin-password" class="text-input password-input" name="password" title="密码" tabindex=2>
				                <label id="signin-password-label" for="signin-password" class="placeholder">密码</label>
				              </div>
				            </td>
				            <td class="flex-table-secondary">
				              <button type="submit" class="submit btn" tabindex=4>
				                登录
				              </button>
				            </td>
				          </tr>
				          </tbody>
				        </table>
				    
				        <div class="remember-forgot">
				          <label class="remember">
				            <input type="checkbox" value="1" name="remember_me" tabindex=3>
				            <span>记住我</span>
				          </label>
				          <span class="separator">&middot;</span>
				          <a class="forgot" href="/index.php?act=index.test#abc">忘记密码?</a>
				          <span class="forgot" style="color:red;float:right;padding:3px 0;">error</span>
				        </div>
				      </form>

					<!-- Login Form End //-->
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
(function(){function b(){var b=a.href.match(/#(.)(.*)$/);return b&&b[1]=="!"&&b[2].replace(/^\//,"")}function c(a){if(!a)return!1;a=a.replace(/^#|\/$/,"").toLowerCase();return a.match(/^[a-z0-9_]+$/)?a:!1}function d(b){var b=c(b);if(b){var d=document.referrer||"none",e="ev_redir_"+b+"="+d+"; path=/";document.cookie=e;a.replace("/index.php?act=index.test#"+b)}}function e(){var c=b();c&&a.replace("//"+a.host+"/"+c);a.hash!=""&&d(a.hash.substr(1).toLowerCase());}var a=window.location;e();window.addEventListener?window.addEventListener("hashchange",e,!1):window.attachEvent&&window.attachEvent("onhashchange",e)})();(function(){function ev(e,o,d){window.addEventListener?e.addEventListener(o,function(){hd(d)},!1):e.attachEvent&&window.attachEvent(o,function(){hd(d)});}function hd(d){var de=document.getElementById(d);var le=document.getElementById(d+"-label");le.style.display=(de.value=="")?"block":"none";}function c(){var ade = document.getElementById("signin-account");ev(ade, "keydown", "signin-account");ev(ade, "keyup", "signin-account");ev(ade, "change", "signin-account");ev(ade, "focus", "signin-account");ev(ade, "blur", "signin-account");	var pde = document.getElementById("signin-password");ev(pde, "keydown", "signin-password");ev(pde, "keyup", "signin-password");ev(pde, "change", "signin-password");ev(pde, "focus", "signin-password");ev(pde, "blur", "signin-password");ade.focus();hd("signin-account");}c()}())
</script>
</html>