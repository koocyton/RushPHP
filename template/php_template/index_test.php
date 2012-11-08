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
form {
    font-size: 12px;
    margin-bottom: 0;
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
    background: -moz-linear-gradient(center top , #FFFFFF 0px, #DDDDDD 100%) repeat scroll 0 0 transparent;
    border-bottom: 1px solid #CCCCCC;
    border-left: 1px solid #EEEEEE;
    border-right: 1px solid #EEEEEE;
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
    border-radius: 4px 4px 4px 4px;
    height: 108px;
    left: 536px;
    position: absolute;
    top: 0;
    width: 300px;
}
.front-signin .username {
    left: 12px;
    position: absolute;
    top: 12px;
    width: 276px;
    height: 30px;
    font-size: 13px;
    overflow: visible;
    color: #999999;
    font-size: 12px;
}

.front-signin .username .text-input {
    width: 266px;
}
.front-card .text-input {
    height: 20px;
}
.front-card .text-input {
    border: 1px solid #CCCCCC;
    box-shadow: 0 1px 0 #EEEEEE inset, 0 1px 0 #FFFFFF;
}
.placeholding-input input {
    position: absolute;
    top: 0;
}
input, textarea {
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05) inset, 0 1px 0 rgba(255, 255, 255, 0.075);
    transition: background 0.2s linear 0s;
}
input, textarea {
}
input, textarea, select {
    background-color: #FFFFFF;
    border: 1px solid #CCCCCC;
    border-radius: 3px 3px 3px 3px;
    display: inline-block;
    margin: 0;
    outline: 0 none;
    padding: 4px;
    width: 210px;
}
label, input, textarea, select {
    font-size: 13px;
    line-height: 20px;
    margin: 0;
}
body, label, input, textarea, select, button {
    font-family: "Helvetica Neue",Arial,sans-serif;
}
.placeholding-input input:focus + .placeholder {
    opacity: 0.6;
}
.placeholding-input .placeholder {
    -moz-user-select: none;
    bottom: 1px;
    color: #999999;
    cursor: text;
    font-size: 13px;
    height: 20px;
    left: 2px;
    line-height: 20px;
    padding: 4px;
    position: absolute;
    right: 1px;
    text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
    top: 1px;
    transition: opacity 0.1s ease 0s, font-size 0.1s ease 0s;
    white-space: nowrap;
    z-index: 1;
}
label {
    color: #333333;
    cursor: pointer;
    display: block;
    margin-bottom: 5px;
}
.front-signin .password-signin {
    left: 12px;
    position: absolute;
    top: 48px;
    width: 276px;
}
.flex-table {
    width: 100%;
}
table {
    border-collapse: collapse;
    border-spacing: 0;
}
.flex-table-primary {
    padding-right: 5px;
    width: 99%;
}
.flex-table-primary, .flex-table-secondary {
    vertical-align: top;
}
td, th {
    padding: 0;
}
.front-signin .remember-forgot {
    left: 12px;
    margin: 0;
    position: absolute;
    top: 82px;
    width: 276px;
}
.front-signin .submit {
    box-shadow: 0 1px 0 #FFFFFF;
    height: 30px;
}
.flex-table-btn {
    float: right;
    white-space: nowrap;
    width: auto;
}
.primary-btn, .following.first-hover .follow-btn:hover, .following .follow-btn, .following .follow-button.cancel-hover-style:hover, .following .follow-button {
    background-color: #019AD2;
    background-image: linear-gradient(#33BCEF, #019AD2);
    background-repeat: repeat-x;
    border-color: #057ED0;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1) inset;
    color: #FFFFFF;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}
.btn {
    background-color: #DDDDDD;
    background-image: linear-gradient(#FFFFFF, #DDDDDD);
    background-repeat: repeat-x;
}
.btn {
    background-color: #CCCCCC;
    background-repeat: no-repeat;
    border: 1px solid #CCCCCC;
    border-radius: 4px 4px 4px 4px;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
    color: #333333;
    cursor: pointer;
    display: inline-block;
    font-size: 13px;
    font-weight: bold;
    line-height: 18px;
    overflow: visible;
    padding: 5px 10px;
    position: relative;
    text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
}
button {
    border: 0 none;
}
button {
    margin: 0;
}
label, input, textarea, select {
    font-size: 13px;
    line-height: 20px;
    margin: 0;
}
label {
    color: #333333;
    cursor: pointer;
    display: block;
    margin-bottom: 5px;
}
label, input, textarea, select {
    font-size: 13px;
    line-height: 20px;
    margin: 0;
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
        <div class="username">
          <input type="text" id="signin-email" class="text-input email-input" name="account" title="用户名或电子邮件地址" autocomplete="on" tabindex=1>
          <label for="signin-email" class="placeholder">用户名或电子邮件地址</label>
        </div>
    
        <table class="flex-table password-signin">
          <tbody>
          <tr>
            <td class="flex-table-primary">
              <div class="placeholding-input password flex-table-form">
                <input type="password" id="signin-password" class="text-input flex-table-input" name="password" title="密码" tabindex=2>
                <label for="signin-password" class="placeholder">密码</label>
              </div>
            </td>
            <td class="flex-table-secondary">
              <button type="submit" class="submit btn primary-btn flex-table-btn js-submit" tabindex=4>
                
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
          <a class="forgot" href="/account/resend_password">忘记密码?</a>
          <span class="forgot" style="color:red;float:right;padding:3px 0;"></span>
        </div>
      </form>
    
					
					
					
					<!-- Login Form End //-->
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>