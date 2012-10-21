<!DOCTYPE html>
<html lang="zh-cn">
	<head>
	<?php include("page_head.php");?>
	</head>
	<body style="background:url(image/background_linen.png) repeat scroll 0 0 transparent;">
	
	<div style="position:absolute; overflow:hidden; top: 0; left:0; bottom:0; right:0;">
	  
	<div style="position:relative; width:693px; height:309px; top:200px; margin:0 auto; overflow:hidden; -moz-border-radius: 10px; -webkit-border-radius: 10px; border-radius: 10px; -webkit-box-shadow: 5px 5px 5px #222222;
  -moz-box-shadow: 5px 5px 5px #222222 ; box-shadow: 5px 5px 5px #222222; background:-moz-linear-gradient(center top , #FFFFFF 0pt, #cccccc 100%) repeat scroll 0 0 transparent;">
  
	 <div style="float:left; width:500px; height:309px;">
	 <img src="image/img_001.jpg" style="width:500px; height:309px;" />
	 </div>

  <div style="float:left; width:1px; height:309px; background-color:#bbbbbb; border-right:1px solid #efefef"></div>
  
  <div style="float:left; width:191px; height:309px;">
	<form method="post" action="index.php?act=index.login" >
	<div>
	 <input type="text" name="login_name" placeholder="E-mail" style="width:169px; font-size:16px; padding:8px 2px;
	margin:12px 9px 0 8px; -moz-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px;" value="" />
	 </div>
	<input type="password" name="login_pass" placeholder="Password" style="width:169px; font-size:16px; padding:8px 2px; margin:9px 9px 0 8px;-moz-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px;"
	value="" />
	<input type="checkbox" style="width:20px; height:20px; border:1px solid #bbbbbb; margin:10px 9px 0 7px;" />
	记住登陆用户
	<input type="submit" style="width:51px; font-size:16px; height:30px; line-height:30px; padding:2px 2px; margin:10px 9px 0 7px; background-color: #019AD2;  background-image: -moz-linear-gradient(#33BCEF, #019AD2);   background-repeat: repeat-x; border-color: #057ED0; box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1) inset; color: #FFFFFF;   text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
" value="Go" />
  </div>
  </form>
  
</div>

</div>

</body>
</html>
