<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8" />
<meta name="viewport" content="user-scalable=no, width=window.screen.width, initial-scale=1, maximum-scale=1.0,minimum-scale=1.0" />
<title> login </title>
<style type="text/css">
	html,body{
		height:100%;
	}
    body{
		background-color:#f4f4f4;
	}
    body,div,p,h1,span,h2,form{
        margin: 0;padding: 0;
    }
    .clearfix {display: block;}
	.clearfix:before,.clearfix:after {
		content:"";display:table;
	}
	.clearfix:after {clear:both;}
	img{
		vertical-align: middle;
	}
    a{
		color:#50B9DC;
        text-decoration: none;
    }
	.container{
		margin:0;
	}
	.top_header{
		height:47px;
		position:relative;
		text-align:center;
		background: -moz-linear-gradient(top,  #ffffff 0%, #d7d7d7 100%);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(100%,#d7d7d7));
		background: -webkit-linear-gradient(top,  #ffffff 0%,#d7d7d7 100%);
	}
	.top_header #btn_back{
		display:none;
		width:40px;
		padding-left:7px;
		height:28px;
		line-height:28px;
		text-shadow:0 1px 1px white;
		background:url("http://img.app.wcdn.cn/ops/game/style/images/center/../mobile/sdk.png?v=201210261715");
		background-size:150px 200px;
		background-position:0 -100px;
		position:absolute;
		font-size:14px;
		color:#858484;
		top:10px;
		left:15px;
	}
	.top_header .logo{
		height:47px;
		width:125px;
		display:inline-block;
		background-size:150px 200px;
		background-position:0 0;
	}
	.top_header .btn_close{
		width:45px;
		height:27px;
		line-height:27px;
		font-size:14px;
		border-radius:5px;
		text-shadow:0 1px 1px white;
		color:#858484;
		position:absolute;
		top:10px;
		right:15px;
		border-style:solid;
		border-width:1px;
		border-color:#aaaaaa #c0c0c0 #adadad #c0c0c0;
		background: -moz-linear-gradient(top,  #f5f5f5 0%, #c6c6c6 100%); /* FF3.6+ */
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f5f5f5), color-stop(100%,#c6c6c6)); /* Chrome,Safari4+ */
		background: -webkit-linear-gradient(top,  #f5f5f5 0%,#c6c6c6 100%); /* Chrome10+,Safari5.1+ */
	}
	#content_home{
		background:#f4f4f4;
	}
</style>
</head>
<body>
	<form method="post" action="/oauth/auth/auth" onsubmit="return validate()">
		<div class="container">
			<header class="top_header">
				<a id="btn_back" href="javascript:void(0);">返回</a>
				<div class="logo" > Koramgame.com </div>
				<a class="btn_close" href="wyx4056772555://#signal_code=close">关闭</a>
			</header>
			<div id="content_home">
				1
			</div>
		</div>
	</form>
	<script type="text/javascript">
		function validate(){
			if($id('username').value !='' && $id('password').value !='' ){
				return true;
			}else{
				$id('errormsg').innerHTML = '对不起,信息不可为空';
				return false;
			}
		}
		var browserName=navigator.appName;
		if (browserName=="Netscape"){
			function closeme(){
				window.location.href = window.location.href+'#cmd=close';
				window.open('','_parent','');
				window.close();
			}
		}
		else{
			if (browserName=="Microsoft Internet Explorer"){
				function closynoshowsme(){
					window.opener = "whocares";
					window.close();
				}
			}
		}
		function $id( id ){
			return document.getElementById( id );
		}
		window.addEventListener("load", function() {
			$id('authorization').addEventListener("click",function(){
				$id('content_home').style.display = "none";
				$id('content_auth').style.display = "block";
				$id('btn_back').style.display = "block";
			},false);
			$id('btn_back').addEventListener('click',function(){
				this.style.display = "none";
				$id('content_auth').style.display = "none";
				$id('content_home').style.display = "block";
			},false);
		}, false);
	</script>
</body>
</html>