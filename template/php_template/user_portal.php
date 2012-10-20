<!DOCTYPE html>
	<html>
	<?php include("page_head.php");?>
	<body>
        <!--
         <div class="width:100%">
         
            <div class="width:200%">
         
                <div class="width:100%;float:left">
                    <div class="top"></div>
                </div>

                <div class="width:100%:float:right">
                </div>

            </div>

         </div>
         //-->
		<div id="window_layout">

			<div id="main_layout">

				<div id="left_layout">
					<div id="appicons_layout"></div><div id="paging_layout"></div>
				</div>

				<div id="right_layout">
					<div id="gadget_layout"></div>
				</div>

			</div>

			<div id="app_layout">
				<iframe id="appframe_layout" frameborder="0" scrolling="no" name="appframe_layout" src="javascript:void(0)"></iframe>
				<div id="appctrl_layout"><img src="image/backbutton.png" class="back_button" onclick="AC.closeAppFrame();"></div>
			</div>

		</div>
		<div id="ac-root"></div>
		<script>
		window.addEvent('domready', function(){

			AC.init({
				windowLayout   : $("window_layout"),

				mainLayout     : $("main_layout"),
				appLayout      : $("app_layout"),

				rightLayout    : $("left_layout"),
				leftLayout     : $("right_layout"),

				appiconsLayout : $("appicons_layout"),
				pagingLayout   : $("paging_layout"),
				gadgetLayout   : $("gadget_layout"),

				appframeLayout : $("appframe_layout"),
				appctrlLayout  : $("appctrl_layout"),

				authSession    : "abcdefghijk"
			});

			AC.ui({method:"showAppIcons", baseUrl:"test_data/init.js"});
         
		});
		</script>
	</body>
</html>
