/**
 * 打印测试数据
 */
function writeLog()
{
	try {
		window.console.log("arguments.length : " + arguments.length);
		Array.from(arguments).each(function(item){
			window.console.log(item);
		});
	}
	catch(e){;}
};

/**
 * 控制对象
 */
var AC = {

	authSession      : "",

	layoutElements   : {},
	
	acRootElement    : null,

	appiconsFrameDiv : null,
	
	appiconsFrameUl  : null,
	
	windowWidth      : 1024,

    appCtrlTweenObj  : null,
    
    windowTweenObj   : null,
    
    closeAppTimer    : null,

	/**
	 * 初始化
	 */
	init : function(param)
	{
		this.acRootElement = $("ac-root");
		this.userSession = param.userSession;

		this.setLayoutElements(param);
		this.setWindowSize();
		this.openLeft();

		this.appCtrlTweenObj = new Fx.Tween(this.layoutElements.appctrl);
		this.windowTweenObj  = new Fx.Tween(this.layoutElements.window);
        this.closeAppTimer   = null;

        this.setAppCtrlEvent();
		window.addEvent("resize", function(){this.setWindowSize()}.bind(this));
	},

	setLayoutElements : function(param)
	{
		this.layoutElements = {	"window"   : $(param.windowLayout),
								"main"     : $(param.mainLayout),
								"app"      : $(param.appLayout),
								"right"    : $(param.rightLayout),
								"left"     : $(param.leftLayout),
								"appicons" : $(param.appiconsLayout),
								"paging"   : $(param.pagingLayout),
								"gadget"   : $(param.gadgetLayout),
								"appframe" : $(param.appframeLayout),
								"appctrl"  : $(param.appctrlLayout)};
	},

	openLeft: function()
	{
		this.layoutElements.right.setStyle("width", "61%");
		this.layoutElements.left.setStyle("width", "38%");
	},

	closeLeft: function()
	{
		this.layoutElements.right.setStyle("width", "100%");
		this.layoutElements.left.setStyle("width", "0px");
	},

	setWindowSize : function()
	{
		var scrollHeight   = window.document.getSize().y;
		var windowHeight   = "" + scrollHeight + "px";
		this.layoutElements.window.setStyle("height", windowHeight );

		var pagingHeight   = this.layoutElements.paging.getStyle("height").toInt();
		var appiconsHeight = "" + ( scrollHeight - pagingHeight ) + "px";
		this.layoutElements.appicons.setStyle("height", appiconsHeight);
	},

	getRequestUrl : function(baseUrl, param)
	{
		return baseUrl+"?"+Object.toQueryString(param);
	},

	ui : function(param, callback)
	{
		var randomId = Date.now();
		var requestUrl = this.getRequestUrl(param.baseUrl, {"callback":param.method, "rid":randomId});
		var scriptElement  = new Element( "script", { "src" : requestUrl , "id" : "rid_" + randomId });
		scriptElement.inject(this.acRootElement, "top");
	},

	flushAppIcons : function(rid, iconsInfo)
	{
		if ( !iconsInfo || typeOf(iconsInfo)!="array" || iconsInfo.length < 1 ) return;
		this.appiconsFrameInit();
		Array.from(iconsInfo).each(function(iconInfo){this.flushAppIconsGrid(iconInfo);}.bind(this));
	},

	appiconsFrameInit: function()
	{
		if (typeOf(this.appiconsFrameDiv)!="element") {
			this.appiconsFrameDiv = new Element( "div", { "class" : "appicons_frame" } );
			this.appiconsFrameDiv.inject(this.layoutElements.appicons, "top");
		}

		if (typeOf(this.appiconsFrameUl)!="element") {
			this.appiconsFrameUl = new Element( "ul" );
			this.appiconsFrameUl.inject(this.appiconsFrameDiv, "top");
		}
	},

	flushAppIconsGrid: function(iconInfo)
	{
		if (!iconInfo || typeOf(iconInfo)!="object") return;

		var liElement = new Element("li").inject(this.appiconsFrameUl, "bottom");

		var lidivElt = new Element("div",{
			events:{
				click:function(){ AC.onAppIconsClick(iconInfo) }
			}
		}).inject(liElement, "bottom");

		var liimgElt = new Element("img",{"src":iconInfo.icon}).inject(lidivElt, "top");

		var lispanElt = new Element("b",{"text":iconInfo.name}).inject(lidivElt, "bottom");
	},

	onAppIconsClick: function(iconInfo)
	{
		var showAppFrame = (iconInfo.type=="gadget") ? this.openGadgetFrame(iconInfo) : this.openAppFrame(iconInfo);
		showAppFrame.src = iconInfo.appUrl + "&authSession=" + this.authSession;
	},

	openGadgetFrame: function(iconInfo)
	{
		var gadgetFrameId = "afi_" + iconInfo.id;
		var gadgetFrame = $(gadgetFrameId);
		if (typeOf(gadgetFrame)=="element") return gadgetFrame;

		var divElt   = new Element("div").inject(this.layoutElements.gadget, "bottom");
		var frameElt = new Element("iframe", {
			frameborder : "0",
			id			: gadgetFrameId
		}).inject(divElt, "bottom");

		return frameElt;
	},

    setAppCtrlEvent: function()
    {
		var appCtrlTweenObj = new Fx.Tween(this.layoutElements.appctrl);
		this.layoutElements.appctrl.addEvents({
            mouseout  : function(){
				AC.closeAppCtrl();
            },
			mouseover : function(event){
				if(typeOf(AC.closeAppTimer)=="function"){
					clearTimeout(AC.closeAppTimer);
					AC.closeAppTimer = null;
				}
				AC.openAppCtrl();
			}
        });
    },

    openAppCtrl: function()
    {
		this.appCtrlTweenObj.start("top", "0px");
    },

    closeAppCtrl: function()
    {
		var ctrlTop = "-" + (this.layoutElements.appctrl.getStyle("height").toInt()-4) + "px";
		this.closeAppTimer = (function(){
			AC.appCtrlTweenObj.addEvents({
				complete: function() {
					clearTimeout(AC.closeAppTimer);
                    AC.closeAppTimer = null;
				}
			});       
            AC.appCtrlTweenObj.start("top", ctrlTop);
        }).delay(1000);
    },

	openAppFrame: function(iconInfo)
	{
        this.windowTweenObj.addEvents({
            complete: function() {
                AC.layoutElements.window.setStyle("left", "-100%");
                AC.closeAppCtrl();
            }
        });
        this.openAppCtrl();
        this.windowTweenObj.start('left', "-"+window.document.getSize().x+"px");
		return this.layoutElements.appframe;
	},

	closeAppFrame: function(iconInfo)
	{
        var windowWidth = "-"+window.document.getSize().x+"px";
        this.layoutElements.window.style.left = windowWidth;
        this.windowTweenObj.addEvents({
			complete: function() {
				AC.layoutElements.window.setStyle("left", "0px");
				AC.closeAppCtrl();
			}
        });
        this.windowTweenObj.start('left', "0px");
		return this.layoutElements.appframe;
	}
}