// -*-coding:utf-8; mode:javascript-mode;-*-

/** 
 * @file   core.js
 * @author koocyton <koocyton@gmail.com>
 * @date   Sun Feb 22 17:44:40 2009
 * 
 * @brief  后台的基本JS
 * 
 * 
 */

/**
 * 最基本的页面交互方式 
 * _query 如果是 页面的 form 节点，就POST这个表单
 *        如果是 字符串 ，就当这个字符串是URL，发送请求
 * 将返回结果提交给 KwPt().jsonAct() 处理
 * 并打出返回结果到调试的页面节点上
 */
function KQ(_query, _action)
{
	pt.loading('block');
	var queryForm = $(_query);
	if(queryForm!=null && $type(queryForm)=="element" && queryForm.tagName=='FORM')
	{
		_query  = queryForm.toQueryString();
		_action = ($type(_action)=="string") ? _action : queryForm.action;
	}
	if ($type(_action)!=false)
	{
		var jsonRequest = new Request.JSON({
			url: _action,
			method: 'post',
			onComplete: function(person, json){
				if ($type($('debugDiv'))=="element") { $('debugDiv').set('text', json); }
				var jsonObj = JSON.decode(json);
				pt.jsonAct(jsonObj);
			}
		}).send(_query);

	} else {
		ht.add(_query);
		var jsonRequest = new Request.JSON({
			url: _query,
			method: 'get',
			onComplete: function(person, json){
				if ($type($('debugDiv'))=="element") { $('debugDiv').set('text', json); }
				var jsonObj = JSON.decode(json);
				pt.jsonAct(jsonObj);
			}
		}).send();
	}
};

/**
 * KwPt Class Begin 基本的JS
 */
var KwPt = new Class({

	diaryManage: 0,

	/** 
	 * 相当于构造函数
	 */
	initialize: function()
	{
	},

	/** 
	 * 给页面第一次加载的时候执行
	 */
	init: function()
	{
		// 弹出层初始化
		this.popDivInit();

		// 左侧菜单初始化
		this.menuInit();

		// 前进后退初始化
		this.jumpInit();

		// 时间选择器初始化
		tt.dateSpace();
		
		// 刷新服务器时间
		// this.flushDayTime();
		setInterval(function(){pt.flushDayTime();}, 1000);
	},
	
	/**
	 * JSON 到这里执行动作
	 */
	jsonAct: function(jsonObj)
	{

		this.loading('none');
		if ($('bodyContentFoot')!=null) { $('bodyContentFoot').set('html', ''); }
		if ($('bodyTitle')!=null && $type(jsonObj.head)!=false && jsonObj.head!=null && jsonObj.head!="") { $('bodyTitle').set('html', jsonObj.head); }
		if ($type(jsonObj.body)=="array")
		{
			jsonObj.body.each(function(item, index){
				var rst = item.func.match(/^(.+)\.(.+)$/i);
				var todo = ($type(rst)=="array") ? 'new '+rst[1]+'().'+rst[2]+'(item.bind, item.data)' 
					: item.func+'(item.bind, item.data)';
				try{ eval(todo); } catch (e) {}
			});
		}
	},
	
	/**
	 * 将HTML现在在 bind 节点
	 */
	showHtml: function(bind, data)
	{
		var mye = $(bind);
		if (mye!=null && $type(mye)=="element" && $type(data)=="string") { mye.empty(); mye.set("html", data);}
		// mye.innerHTML = data;
	},
	
	/**
	 *  弹出层 到页面居中的位置
	 */
	pop: function(elt)
	{
		var mye = $(elt);
		if ($type(mye)!="element") { return; }

		this.masking('block');
		this.toggle(mye, 'block');
		mye.setOpacity(0);

		var ew = mye.getStyle("width").toInt();
		var ww = $(window).getScrollWidth().toInt();
		var lt = (ww/2 - ew/2) + 'px';
		var tp = $(document.body).getScrollTop().toInt() + $(window).getHeight().toInt()/3;

		var pc = mye.getFirst().getNext();
		if (pc.get('tag')=="a" && $type(pc.getFirst())=="element" && pc.getFirst().get('tag')=="b")
		{
			pc.setStyle("left", (ew-24)+'px');
		}

		mye.setStyles({left: lt, top: tp});
		mye.setOpacity(1);
	},

	confirm: function(message, callback, title)
	{
		var title = ($type(title)=="string") ? title : '提示信息'
		$('pageAlertHeader').set('html', title);
		$('pageAlertBody').set('html', message);

		$('pageAlertOk').removeEvents();
		$('pageAlertOk').addEvents({ 'click': function(){ eval(callback); pt.alertCancel(); }});

		$('pageAlertNo').set('class', 'button');
		$('pageAlertNo').removeEvents();
		$('pageAlertNo').addEvents({ 'click': function(){ pt.alertCancel(); }});

		this.pop('pageAlert');
	},

	alert: function(bind, data)
	{
		data.title = ($type(data.title)==false || data.title=="") ? '提示信息' : '&nbsp;'+data.title;
		$('pageAlertHeader').set('html', data.title);
		$('pageAlertBody').set('html', data.message);

		$('pageAlertOk').removeEvents();
		$('pageAlertOk').addEvents({ 'click': function(){ pt.alertCancel(); }});

		$('pageAlertNo').set('class', 'nbutton');
		$('pageAlertNo').removeEvents();

		this.pop('pageAlert');
	},

	jseval: function(bind, ev)
	{
		eval(ev);
	},
	
	location: function(bind, url)
	{
		el = $(bind);
		if(bind=="window") {
			window.location = url;
		} else if (bind=="top") {
			window.top.location = url;
		} else if ($type(el)=="element" && el.get('tag')=='iframe') {
			el.src = url;
		} else {
			KQ(url.toString());
		}
	},

	/**
	 * 显示分页
	 */
	showCleft: function(bind, data)
	{
		new KwCt({
			bind: bind,
			url: data.url,
			page: data.page,
			field: data.field,
			count: data.count,
			limit: data.limit}).outPut();
	},

	/**
	 * 自定义 checkbox
	 */
	checkBoxToggle: function(bind, type)
	{
		if ($type(type)!="string") { type=''; } else { type=type+"_" }
		var elts = $$('#'+bind+' input.myCheckBox');
		elts.each(function(item, index){
			var cElt = $(item);            if(cElt==null) return;
			var aElt = cElt.getParent();   if(aElt==null) return;
			if (aElt.getStyle('background-image').test(/chk_.+\.gif/)!=true && aElt.get('tag')=="a" && cElt.get('tag')=="input" && cElt.get('type')=="checkbox")
			{
				cElt.setStyles({position: 'absolute', left    : '-9999px'});
				aElt.setStyle('padding-left', '18px');
				aElt.setStyle('background-position', 'left center');
				aElt.setStyle('background-repeat', 'no-repeat');
				if (cElt.get('value')=="")
				{
					cElt.set('checked', false);
				} else {
					aElt.addEvent('click', function(e){
						aElt.setStyle('background-image', (cElt.get('checked')==true) 
									  ? "url(/img/chk_"+type+"off.gif)"
									  : "url(/img/chk_"+type+"on.gif)");
						cElt.set('checked', (cElt.get('checked')==true) ? false : true);
						if (bind=="serverListBind") {
							sa.checkBox(item);
						}
					});
				}
				if (cElt.get('checked')==true)
				{
					aElt.setStyle('background-image', "url(/img/chk_"+type+"on.gif)");
				} else {
					aElt.setStyle('background-image', "url(/img/chk_"+type+"off.gif)");
				}
			}
		});
	},

	/**
	 * 自定义checkbox 全选，反选
	 */
	checkBoxAll: function(elt, checked)
	{
		if($type(checked)!="boolean") { return; }
		var elts = $$('#'+elt+' input.myCheckBox');
		elts.each(function(item, index){
			var aElt = item.getParent();
			var aEltOn  = aElt.getStyle('background-image').replace("off", "on");
			var aEltOff = aElt.getStyle('background-image').replace("on", "off");
			if (checked==true)
			{
				item.set('checked', true);
				aElt.setStyle('background-image', aEltOn);
			} else {
				item.set('checked', false);
				aElt.setStyle('background-image', aEltOff);
			}
		});
	},

	/**
	 * 关闭弹出
	 */
	popCancel: function(elt)
	{
		var mye = $$('div.popDiv');
		var elt = $(elt);
		var myeCount = 0;
		mye.each(function(item, index){
			if (item==elt) {
				pt.toggle(elt, 'none');
			} else if (item.getStyle('display')=="block") {
				myeCount++;
			}
		});
		if (myeCount==0 && $('pageLoad').getStyle("display")=="none") { this.masking('none'); }
	},

	/**
	 * 关闭警告
	 */
	alertCancel: function()
	{
		this.popCancel('pageAlert');
	},

	/**
	 * loading 控制
	 */
	loading: function(display)
	{
		this.masking(display);
		this.toggle('pageLoad', display);
	},

	/**
	 * 遮罩层控制
	 */
	masking: function(display)
	{
		var nHeight = window.getScrollHeight()+'px'; 
		$('pageMask').setStyles({top: '0px', height: nHeight, display: display});
	},

	/**
	 * 遮罩层控制
	 */
	toggle: function(elt, display)
	{
		var mye = $(elt); if (mye==null) { return; }
		var nDisplay = mye.getStyle('display');
		if ($type(display)==false) {
			display = (nDisplay=="block") ? 'none' : 'block';
		} else {
			display = (display=="none") ? 'none' : 'block';
		}
		mye.setStyle("display", display);
		return display;
	},

	btoggle2: function(btGrp, btElt)
	{
		var objBtGrp = $$(btGrp);     var objBoGrp = $$(btGrp + '_bo');
		var fcolor   = NaN;           var bcolor   = NaN;

		if ($type(objBtGrp)=="array" && $type(objBoGrp)=="array")
		{
			objBtGrp.each(function(item, index) {
				fcolor = NaN;  bcolor = NaN;  bdisplay = "none";
				if ($(item)==$(btElt)) { bcolor = "#666";  fcolor = "#fff"; bdisplay = "";}
				item.setStyles({background: bcolor, color: fcolor});
				objBoGrp[index].setStyles({display: bdisplay});
			});
		}
	},

	/**
	 * 下拉层按钮控制，上下箭头，凸起凹下控制
	 */
	btoggle: function(elt, grp)
	{
		var mye = $(elt); var myt = $(elt+'Act').getFirst();
		if (mye==null || myt==null) { return; }
		var myd = mye.get('id');
		if ($type(grp)!=false)
		{
			$$(grp).each(function(item, index) { 
				var itd = $(item).get('id');
				if (itd==myd) { $(itd+'Act').blur(); return; }
				pt.toggle(item, 'none');
				var myb = $(itd+'Act').getFirst().getFirst().getFirst();
				myb.setStyle('background-image', myb.getStyle('background-image').replace('up.gif', 'down.gif'));
				$(itd+'Act').getFirst().setStyle("background-position", "left top");

				if (grp=="div.ctrlBar")
				{
					$(itd+'Act').getFirst().setStyle("border-bottom-color", "#aaa");
					$(itd+'Act').getFirst().addEvents({
						'mouseover': function(){ $(itd+'Act').getFirst().setStyle("border-bottom-color", "#888"); },
						'mouseout':  function(){ $(itd+'Act').getFirst().setStyle("border-bottom-color", "#aaa"); }
					});
				}
			});
		}
		var myb = myt.getFirst().getFirst();
		var display = this.toggle(mye);
		if (display=="none") {
			myb.setStyle('background-image', myb.getStyle('background-image').replace('up.gif', 'down.gif'));
			myt.setStyle("background-position", "left top");
			if (grp=="div.ctrlBar")
			{
				myt.setStyle("border-bottom-color", "#888");
				myt.addEvents({
					'mouseover': function(){ myt.setStyle("border-bottom-color", "#888"); },
					'mouseout':  function(){ myt.setStyle("border-bottom-color", "#aaa"); }
				});
			}
		} else {
			myb.setStyle('background-image', myb.getStyle('background-image').replace('down.gif', 'up.gif'));
			myt.setStyle("background-position", "left bottom");
			if (grp=="div.ctrlBar")
			{
				myt.setStyle("border-bottom-color", "#fff");
				myt.addEvents({
					'mouseover': function(){ myt.setStyle("border-bottom-color", "#fff"); },
					'mouseout':  function(){ myt.setStyle("border-bottom-color", "#fff"); }
				});
			}
		}
	},

	/**
	 * 校验码切换
	 */
	loginVerifyChange: function()
	{
		var mye = $('loginVerify'); 
		if (mye==null) { return; }
		var imageUrl = mye.getStyle('background-image').toString();
		var result = imageUrl.match(/^url\((\"?)(.+?)(\"?)\)$/i);
		var purepath = this.getPureurl(result[2].toString(), 'vnb');
		var time = new Date().getTime();
		mye.setStyle('background-image', 'url('+purepath[0]+purepath[1]+'vnb='+time+')');
	},

	/**
	 * 获得一个不含 arg 的干净的URL
	 */
	getPureurl: function(url, arg)
	{
		var purepath = url;
		var fieldRegexp = new RegExp("(\\?|\\&)(" + arg + ")=(\\d*)(&?)","i");
		var result = nResult = ["","","","","",""];
		while(1)
		{
			nResult = purepath.match(fieldRegexp);
			if ($type(nResult)!="array") { break; }
			nResult[5] = (nResult[4]=="&") ? nResult[1] : '';
			purepath = purepath.replace(nResult[0], nResult[5]);
			result = nResult;
		}
		nResult = purepath.match(/\?(.+?)=/i);
		result[5] = ($type(nResult)=="array") ? '&' : '?';
		return [purepath, result[5]];
	},

	/**
	 * 弹出层初始化为可拖拽
	 */
	popDivInit: function()
	{
		var mye = $$('div.popDiv');
		mye.each(function(item, index){
			var nHandle = item.getFirst();
			var nClose  = nHandle.getNext();
			if ($type(nClose)=="element" && nClose.get('tag')=="a" && nClose.get('class')=="button popCancel")
			{
				nClose.addEvents({ 'click': function(){ pt.popCancel(item);}});
			}
			var alertDrag = new Drag.Move(item, {
				container: 'pageMask',
				snap: 5,
				handle: nHandle
			});
		});
	},

	/**
	 * 前进后退按钮初始化
	 */
	jumpInit: function()
	{
		var jumpBut = $$('div.jumpReload','div.jumpPrev','div.jumpNext');
		jumpBut.each(function(item, index){
			var hash = new Hash({mouseover:'2', mouseout:'1', mousedown:'3', mouseup:'2'});
			hash.each(function(value, key){
				item.addEvent(key.toString(), function(e){
					var itemBack = item.getStyle('background-image');
					if (!itemBack.test('_0'))
					{
						item.setStyle('background-image', itemBack.replace(/_\d/, '_'+value.toString()));
					}
				});
			});
			item.addEvent('click', function(e){
				var itemBack = item.getStyle('background-image');
				if (!itemBack.test('_0'))
				{
					var nItem = item.get('class').replace("jump","").toLowerCase();
					eval('ht.'+nItem+'()');
				}
			});
		});
	},

	/**
	 * 左侧菜单初始化
	 */
	menuInit: function()
	{
		var menuGrp = $$('div.menuDiv');
		menuGrp.each(function(item, index){
			var itemAct      = item.getPrevious();
			var itemActFirst = itemAct.getFirst();
			var itemActBkimg = itemActFirst.getStyle('background-image');
			var itemDisplay = item.getStyle('display');
			itemActFirst.setStyle('background-image',
								  (itemDisplay=="none") ? itemActBkimg.replace('_down', '_right'):
								  itemActBkimg.replace('_right', '_down'));
			itemAct.addEvent('click', function(e){
				var itemDisplay = item.getStyle('display');
				var itemActBkimg  = itemActFirst.getStyle('background-image');
				item.setStyle('display', (itemDisplay=="none") ? 'block' : 'none');
				itemActFirst.setStyle('background-image',
									  (itemDisplay=="none") ? itemActBkimg.replace('_right', '_down'):
									  itemActBkimg.replace('_down', '_right'));
			});
		});
	},

	/**
	 * 时间，选服，功能 的选择
	 */
	actRequest: function(obj)
	{
		var nForm  = $('mainActForm');
		var nHash  = new Hash(obj);
		nHash.each(function(value, key){
			if (key=="act")
			{
				$('mainActFormAct').set('value', value);
			} else {
				var nInput = $(nForm[key]);
				if ($type(nInput)=="element") { nInput.set("value", value); }
			}
		});
		var nQuery  = nForm.toQueryString();
		var nAction = $('mainActFormAct').get('value')
		KQ(nAction+'?'+nQuery);
	},

	/**
	 * 调整页面高度
	 */
	autoHeight: function(elt)
	{
		var h = "800px";
		alert($type($elt));
		//if ($(elt)!=null && $(elt.document)!=null)
		//{
		//}
		//try{ h = (20 + ctIframe.document.body.scrollHeight) + 'px'; } catch (e) {}
		//$('ctIframe').setStyle("height", h);
	},
	
	flushDayTime: function()
	{
		var mye = $('nowDayTime');
		if ($type(mye)!="element") { return false; }
		var rel = mye.get('rel').toString();
		var rev = mye.get('rev').toString();
		if (rev=="-")
		{
			var cfTime = tt.getTimeObject();
			var sfTime = tt.getTimeObject(rel.toString());
			var dfTime = cfTime.getTime() - sfTime.getTime();
			rev = dfTime.toString();
			mye.set('rev', rev);
		}
		var cnTime = tt.getTimeObject();
		var dnTime = cnTime.getTime();
		cnTime.setTime(dnTime-rev.toInt()+3000);
		var cy = cnTime.getFullYear();
		var cm = cnTime.getMonth()+1;
		var cd = cnTime.getDate();
		var ch = cnTime.getHours();
		var ci = cnTime.getMinutes();
		var cs = cnTime.getSeconds();
		if (cm < 10) cm = "0"+cm;
		if (cd < 10) cd = "0"+cd;
		if (ch < 10) ch = "0"+ch;
		if (ci < 10) ci = "0"+ci;
		if (cs < 10) cs = "0"+cs;
		var mdate = cy+'-'+cm+'-'+cd+' '+ch+':'+ci+':'+cs;
		mye.set("html", mdate + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
	},

	stringHash: function(d) {
		if (!d || d=="") { d=''; };
		d = '#$%VK%^ ' + d;
		var h=0,g=0;
		for (var i=d.length-1;i>=0;i--) {
			var c=parseInt(d.charCodeAt(i));
			h=((h << 6) & 0xfffffff) + c + (c << 14);
			if ((g=h & 0xfe00000)!=0) h=(h ^ (g >> 21));
		}
		return h;
	},
	
	selectApp : function(ii, obj)
	{
		var nForm  = $('mainActForm');
		nForm['app'] = ii;

		var nBuf = $$("a.buf");
		nBuf.each(function(item, index){
			item.set("class", "buf");
		});

		var nSBuf = $$("a.selectedbuf");
		nSBuf.each(function(item, index){
			item.set("class", "buf");
		});

		$(obj).set("class", "selectedbuf");
		pt.actRequest({app:ii});
	}
});
var pt = null;

var KwTs = new Class ({

	getTimeSliderHtml: function(cal)
	{
		// var ret = ["", cal.date.getTime().toString()];
		var ret = ["", cal.date.print("%Y%m%d")];

		dt = cal.date.print("%Y-%m-%d");

		ret[0]= '	<ul>' +
				'		<li style="width:80px">' +
				'			<input type="text" name="dtm_val['+ret[1]+']" style="border-width:0" value="'+dt+'" onfocus="this.blur();"readonly="true"/>' +
				'		</li>' +
				'		<li style="width:130px">' +
				'			<label>' +
				'				<input type="radio" name="dtm_cho['+ret[1]+']" value="day" checked="true" /> 整日' +
				'			</label>' +
				'			<label>' +
				'				<input type="radio" name="dtm_cho['+ret[1]+']" value="time" /> 时间段' +
				'			</label>' +
				'		</li>' +
				'		<li style="width:30px; text-align:center;"> 从 </li>' +
				'		<li style="width:130px;">' +
				'			<div style="margin: 12px 0 0 0;background-color:#888; height:2px; width:100%; text-align:left">' +
				'				<div id="dtm_beg_'+ret[1]+'" class="hstClock">' +
				'					<div class="hstStep"></div><input name="dtm_beg['+ret[1]+']" type="hidden" value="0" />' +
				'				</div>' +
				'			</div>' +
				'		</li>' +
				'		<li style="width:30px; text-align:center;"> 到 </li>' +
				'		<li style="width:130px;">' +
				'			<div style="margin: 12px 0 0 0; background-color:#888; height:2px; width:100%; text-align:left">' +
				'				<div id="dtm_end_'+ret[1]+'" class="hstClock">' +
				'					<div class="hstStep"></div><input name="dtm_end['+ret[1]+']" type="hidden" value="0" />' +
				'				</div>' +
				'			</div>' +
				'		</li>' +
				'		<li style="width:50px; text-align:center;"> <a href="javascript:void(0)" onclick="$(this).getParent().getParent().getParent().destroy()">删除</a> </li>' +
				'	</ul>';

		return ret;
	},

	timeChoiceInit: function()
	{
		var siliderGroup = $$("div.hstClock");
		siliderGroup.each(function(item, index){
			ts.timeSliderAdd(item);
		});
	},

	timeChoiceAdd: function(cal, elt)
	{
		var buf = this.getTimeSliderHtml(cal);
		if ($type($('dtm_beg_' + buf[1]))=="element" || $type($('dtm_end_' + buf[1]))=="element")
		{
			alert("已有当日的记录，不可重复添加 !");
			return false;
		}
		var choiceHtml  = new Element('div');
		choiceHtml.set("class", 'round_border_content');
		choiceHtml.setStyle('border-width', '0px');

		choiceHtml.inject(elt);
		choiceHtml.set("html", buf[0]);

		this.timeSliderAdd('dtm_beg_' + buf[1]);
		this.timeSliderAdd('dtm_end_' + buf[1]);

	},

	timeSliderAdd: function(knob)
	{
		knob = $(knob);
		if ($type(knob)!="element") { return false; }

		kelt = knob.getParent().getParent();
		if ($type(kelt)!="element") { return false; }

		kstp = 48;
		kset = 0;
		
		kval = knob.getFirst().get("html");
		rest = kval.match(/(\d{2}):(\d{2})/);
		if (rest!=null)
		{
			rest[1] = rest[1].toInt()*2;
			rest[2] = (rest[2]=="30") ? 1 : 0 ;
			kset = rest[1] + rest[2];
		}

		kevt = 'ts.timeSliderVal(this)';
		this.sliderAdd(kelt, knob, kevt, kstp, kset);
	},

	timeSliderDel: function(knob)
	{
		knob = $(knob);
		if ($type(knob)!="element") { return false; }

		kelt = knob.getParent().getParent();
		if ($type(kelt)!="element") { return false; }

		knob.removeEvents();
		kelt.removeEvents();
	},

	timeSliderVal: function(sobj)
	{
		var val = rt.planTime(0, sobj.step/2);

		knob = $(sobj.knob);
		if ($type(knob)!="element") { return false; }

		kval = $(knob).getFirst();
		if ($type(kval)!="element") { return false; }
		kval.set("html", val.end);

		knpt = $(kval).getNext();
		if ($type(knpt)!="element" && knpt.get('tag')!="input") { return false; }
		knpt.value = val.end;
	},

	sliderAdd: function(kelt, knob, kevt, kstp, kset)
	{
		if ($type(kset)!="number" || kset>kstp) { kset=0; }
		var slider = new Slider(kelt, knob, {
			steps: kstp,
			wheel: true,
		 onChange: function(){try{eval(kevt)}catch(e){}}
		}).set(kset);
	}
});
var ts = new KwTs();

/**
 * 分页
 */
var KwCt = new Class({
	
	Implements: Options,

	options:
	{
        bind: [],
        url: '',
        page: 1,
        field: 'page',
        count: 1,
        limit: 1,
		pageCount: 1,

        fullurl: false,
        pureurl: false
	},

	/** 
	 * 初始化分页参数
	 */
	initialize: function(options)
	{
		this.setOptions(options);
		this.getPureUrl();
		this.options.pageCount = Math.ceil(this.options.count/this.options.limit);
	},

	/** 
	 * 获得干净的URL （ 没有 第几页这个参数 ）
	 */
	getPureUrl: function()
	{
		this.options.pureurl = this.options.fullurl = this.options.url;
		while(1) {
			var fieldRegexp = new RegExp("(\\?|\\&)(" + this.options.field + ")=(\\d*)(&?)","i");
			var result = this.options.pureurl.match(fieldRegexp);
			if (result==null) { break; }
			result[5] = (result[4]=="&") ? result[1] : '';
			this.options.page = (result[3]=="") ? 1 : result[3].toInt();
			this.options.pureurl = this.options.pureurl.replace(result[0], result[5]);
		}
		var result = this.options.pureurl.match(/(\&|\?)(\w+)=/i);
		this.options.pureurl += (result==null) ?  '?' : '&';
	},

	/** 
	 * 输出分页
	 */
	outPut: function()
	{
		var opt = this.options;
		this.options.bind.each(function(item, index){
			eval('ct_theme_'+item.style+'(item, opt)');
		});
	}
});

/** 
 * 分页样式
 */
function ct_theme_default(item, opt)
{
	opt.pageCount =   opt.pageCount.toInt();
	opt.page      =   opt.page.toInt();
	var style     =   '';
	var href      =   '';
	var html      =   '';
	var elt       =   $(item.vessel);

	var bi        =   ((opt.page + 5)>opt.pageCount) ? opt.pageCount : (opt.page + 5);
	var ei        =   ((bi - 10)<1) ? 1 : (bi - 10);
	bi        =   ((ei + 10)>opt.pageCount) ? opt.pageCount : (ei + 10);

	for (var ii=bi; ii>=ei; ii--)
	{
		if (ii==bi && bi!=opt.pageCount) {
			href  = ' href="javascript:KQ(\''+opt.pureurl+opt.field+'='+opt.pageCount+'\');"';
			html += '<a class="button" style="float: right;"'+href+'><b><b><b>'+
				opt.pageCount+'</b></b></b></a>';
			if (bi<opt.pageCount-1) { html += '<a style="float: right;">...</a>'; }
		}

		style = (ii==opt.page) ? ' background: #ddd url(/img/button.gif) repeat-x left bottom;' : ' ';
		href  = (ii!=opt.page) ? ' href="javascript:KQ(\''+opt.pureurl+opt.field+'='+ii+'\');"' : ' ';

		html += '<a class="button" style="float: right;"'+href+'>'+
			'<b style="'+style+'"><b><b>'+ii+'</b></b></b></a>';

		if (ii==ei && ei!=1) {
			href  = ' href="javascript:KQ(\''+opt.pureurl+opt.field+'=1\');"';
			if (ei>2) { html += '<a style="float: right;">...</a>'; }
			html += '<a class="button" style="float: right;"'+href+'><b><b><b>'+1+'</b></b></b></a>';
		}
	}
	html += '<a class="button" style="float: right;" href="javascript:void(0)"><b><b><b>总计: '+opt.count+'</b></b></b></a>';
	elt.set('html', html);
}

/**
 * 自定义 前进后退 操作
 */
var KwHt = new Class({

	history:  [],
	nonius:   0,
	count:  -1,
	licence:   1,
	
	initialize: function()
	{
		this.history =  [];
		this.nonius  =  -1;
		this.count   =  this.history.length;
	},

	next: function()
	{
		if (this.nonius<(this.count-1))
		{
			this.nonius++;
			this.reload();
		}
	},

	prev: function()
	{
		if (this.nonius>0)
		{
			this.nonius--;
			this.reload();
		}
	},

	reload: function()
	{
		this.licence = 0;
		KQ(this.history[this.nonius]);
		this.flush();
	},

	flush: function()
	{
		var jumpBut = $$('div.jumpPrev','div.jumpNext','div.jumpReload');

		if (this.nonius>0)
		{
			jumpBut[0].setStyle('background-image', jumpBut[0].getStyle('background-image').replace(/_\d/, '_1'));
		}else{
			jumpBut[0].setStyle('background-image', jumpBut[0].getStyle('background-image').replace(/_\d/, '_0'));
		}

		if (this.nonius<(this.count-1) && this.count>1)
		{
			jumpBut[1].setStyle('background-image', jumpBut[1].getStyle('background-image').replace(/_\d/, '_1'));
		}else{
			jumpBut[1].setStyle('background-image', jumpBut[1].getStyle('background-image').replace(/_\d/, '_0'));
		}

		if (this.nonius>=0)
		{
			jumpBut[2].setStyle('background-image', jumpBut[2].getStyle('background-image').replace(/_\d/, '_1'));
		}else{
			jumpBut[2].setStyle('background-image', jumpBut[2].getStyle('background-image').replace(/_\d/, '_0'));
		}
	},

	add: function(url)
	{
		if (this.licence==0) { this.licence = 1; return; }
		var historys = $A([]);
		for(var ii=0; ii<=this.nonius; ii++) {
			historys[ii] = this.history[ii];
		}
		this.history = historys;
		this.nonius++;
		this.count   = this.nonius + 1;
		this.history[this.nonius] = url;
		this.flush();
	}
});
var ht = new KwHt();

/**
 * 时间选择
 */
var KwTt = new Class({

	/** 
	 * 打出时间控制台
	 */
	dateSpace: function() 
	{
		var bg_cal = $('f_calcdate_begin'); if (bg_cal==null) { return; }
		var ed_cal = $('f_calcdate_begin'); if (ed_cal==null) { return; }
		var DT = this.getDateObject(bg_cal.get('value'));
		Calendar.setup({
			flat      :	"d_calcdate_begin",
			ifFormat  :	"%Y-%m-%d",
			firstDay  : 1,
			date      :	DT,
			showOthers		:	true,
			flatCallback	:	function(cal){tt.dateChoice(cal, 'f_calcdate_begin');}
		});
		var DT = this.getDateObject(ed_cal.get('value'));
		Calendar.setup({
			flat      :	"d_calcdate_end",
			ifFormat  :	"%Y-%m-%d",
			firstDay  : 1,
			date      :	DT,
			showOthers		:	true,
			flatCallback	:	function(cal){tt.dateChoice(cal, 'f_calcdate_end');}
		});
	},

	/** 
	 * 格式化为时间对象
	 */
	getDateObject: function(str)
	{
		var pat = /^(19[0-9][0-9]|20[0-9][0-9])-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])$/;
		var rst = null;
		if ($type(str)=="string")
		{
			rst = str.toString().match(pat);
		}
		var dt = new Date;
		if (rst!=null) {
			dt.setFullYear(rst[1]);
			dt.setMonth(rst[2]-1);
			dt.setDate(rst[3]);
		}
		return dt;
	},

	/** 
	 * 格式化为时间对象
	 */
	getTimeObject: function(str)
	{
		var pat = /^(19[0-9][0-9]|20[0-9][0-9])-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01]) ([0-1][0-9]|2[0-3])\:([0-5][0-9])\:([0-5][0-9])$/;
		var rst = null;
		if ($type(str)=="string")
		{
			rst = str.toString().match(pat);
		}
		var dt = new Date;
		if (rst!=null) {
			dt.setFullYear(rst[1]);
			dt.setMonth(rst[2]-1);
			dt.setDate(rst[3]);
			dt.setHours(rst[4]);
			dt.setMinutes(rst[5]);
			dt.setSeconds(rst[6]);
		}
		return dt;
	},

	/** 
	 * 提交这个时间选择
	 */
	dateChanged: function()
	{
		pt.btoggle('ctrlBarTime', 'div.ctrlBar');
		var mye = $('ctrlBarTimeAct').getFirst().getFirst().getFirst();
		mye.set('html',$('f_calcdate_begin').value+' ~ '+$('f_calcdate_end').value);
		pt.actRequest({bgtm: $('f_calcdate_begin').value, edtm: $('f_calcdate_end').value});
	},

	/** 
	 * 选择时间
	 */
	dateChoice: function(calendar, id) 
	{
		if (calendar.dateClicked) {
			var dt = calendar.date.print("%Y-%m-%d");
			$(id).value = dt;
		}
	},
	
	/**
	 * 将 <div class="calendar" style="position: absolute; display: none;">
	 * 这样的层清除，并垃圾回收掉
	 */
	 dateDivClean: function()
	 {
		// var elts = $$("div.calendar");
		/*
		elts.each(function(item, index){
			var eltStyle = item.getStyles('position');
			if (eltStyle.position=="absolute")
			{
				item.destroy();
			}
		});
		*/
	 }
});
var tt = new KwTt();

/**
 * 会议室房间 时间选择器
 */
var KwRt = new Class({

	lastTd:  null,

	init: function()
	{
	},
	
	planClean: function()
	{
		if ($type($(this.lastTd))=="element")
		{
			$(this.lastTd).empty();
		}
	},

	historyClick: function()
	{
		pt.pop('holidaysPop');
	},

	diaryClick: function(obj, day)
	{
		var elt = $('diary-' + day);
		var dia = (elt.innerHTML!="") ? elt.innerHTML : "1.\n2.\n3.";
		var html = '<a href="/diarys/downDiary/'+day+'" target="_blank">';
		html += '管理员点此下载当日汇报的日报集</a><br/>';
		if (pt.diaryManage!="1") { html = ""; }
		html += '<form method="post" id="saveDiaryOrder" action="/diarys/saveDiary">';
		html += '<textarea name=content rows=7 style="font-size: 8.75pt; width: 500px;">'+dia+'</textarea>';
		html += '<input type="hidden" name="day" value="'+day+'"></form>';
		pt.confirm(html, "KQ('saveDiaryOrder')", day+" 日报");
	},

	planClick: function(obj, beg, day, roomId)
	{
		if ($type($(obj).getFirst())=="element") { return; }

		this.planClean();
		var beginEndTime = this.planTime(beg);
		$(obj).set("html", "<div class=\"roomTimeSpace\"><div class=\"roomTime\" style=\"display: block;\"><div class=\"roomTimeHead\">"+beginEndTime.beg+" ~ "+beginEndTime.end+"</div><div class=\"roomTimeBody\" style=\"height: 0px;\"></div><div class=\"roomTimeFoot\"/></div></div></div>");

		var mye = $(obj).getFirst().getFirst();
		var myh = mye.getFirst();
		var myb = myh.getNext();
		var myf = myb.getNext();
		var beg = 1*beg.toFloat();

		maxHeight = ($type(roomId)) ? (20.5-beg) * 2 * 21 : (19.5-beg) * 2 * 21;


		var myResize = myb.makeResizable({
			modifiers: {x: false, y: 'height'},
			limit: {y: [0, maxHeight]},
			grid: 21,
			handle: myf,
			onDrag: function()
			{
				var end = (beg + ((myb.getStyle("height").toInt()/21*0.5)+0.5));
				var nBeginEndTime = rt.planTime(beg, end);
				this.options.handle.getPrevious().getPrevious().set("html", nBeginEndTime.beg+" ~ "+nBeginEndTime.end);
			},
			onComplete: function()
			{
				var timeTitle = this.options.handle.getPrevious().getPrevious().get("html");
				if ($type(roomId))
				{
					rt.roomForm(day, timeTitle, roomId);
				} else {
					rt.planForm(day, timeTitle);
				}
			}
		});
		
		this.lastTd = $(obj);
	},

	roomForm: function(day, timeTitle, roomId)
	{
		if ($type(day)!=false && $type(timeTitle)!=false)
		{
			var rst = timeTitle.match(/^(.+) ~ (.+)$/i);
			var html = '<form method="post" id="addRoomOrder" action="/auditorias/roomOrder">';
			html += '<input name="nwtm" type="hidden" value="'+day+'">';
			html += '预计在' + day + ' 的 ' + rst[1] + '~' + rst[2] + '之间, 有 ';
			html += '<input name="man" type="text" class="input" style="width:20px"> 人参加此次会议';
			html += '<br /><br />你的会议主题是 : <input name="motif" type="text" class="input" style="width:200px"> (可留空)'
			html += '<input type="hidden" name="roomId"    value="'+roomId+'">';
			html += '<input type="hidden" name="beginTime" value="'+rst[1]+'">';
			html += '<input type="hidden" name="endTime"   value="'+rst[2]+'"></form>';
			pt.confirm(html, "KQ('addRoomOrder')");
		}
		else
		{
			pt.alert(null, {message: '发生异常的错误，请重新刷新页面后操作'});
		}
	},

	planForm: function(day, timeTitle)
	{
		if ($type(day)!=false && $type(timeTitle)!=false)
		{
			var rst = timeTitle.match(/^(.+) ~ (.+)$/i);
			var html = '<form method="post" id="addWeekPlan" action="/workbenchs/weekPlan/planAdd">';
			html += '<input name="day" type="hidden" value="'+day+'">';
			html += '<input name="beg" type="hidden" value="'+rst[1]+'">';
			html += '<input name="end" type="hidden" value="'+rst[2]+'">';
			html += '你在 ' + day + ' 的 ' + timeTitle + '的计划是：';
			html += '<textarea name="plan" rows="7" style="width: 500px;"></textarea>';
			html += '</form>';
			pt.confirm(html, "KQ('addWeekPlan')");
		}
		else
		{
			pt.alert(null, {message: '发生异常的错误，请重新刷新页面后操作'});
		}
	},
	
	planTime: function(beg, end)
	{
		beg = beg.toFloat();
		if ($type(end)==false)
		{
			end = beg + 0.5;
		}
		var beg_hour       = Math.floor(beg);
		var beg_minute     = (beg-beg_hour)*60;
		if (beg_hour<10)     { beg_hour = '0' + beg_hour; }
		if (beg_minute<10)   { beg_minute = '0' + beg_minute; }

		var end_hour       = Math.floor(end);
		var end_minute     = (end-end_hour)*60;
		if (end_hour<10)     { end_hour = '0' + end_hour; }
		if (end_minute<10)   { end_minute = '0' + end_minute; }

		return {beg: beg_hour+':'+beg_minute, end: end_hour+':'+end_minute}
	},
	//显示预订取消按钮
	cancelOrderDiv: function (event, obj, id)
	{
		document.documentElement.oncontextmenu = function() {return false;};
		
		var event = window.event || event;
		if (event.button == 2) {
			$('orderId').value = id;
			var x = obj.offsetLeft + obj.offsetWidth;
			var y = obj.offsetTop;
			
			var divWidth = $('cancelDiv').style.width;
			divWidth = divWidth.substr(0, divWidth.length - 2);
			
			if (x > document.documentElement.clientWidth - obj.offsetWidth) {
				x = obj.offsetLeft - divWidth;
			}
			
			$('cancelDiv').style.left = x.toString() + "px";
			$('cancelDiv').style.top = y.toString() + "px";
			$('cancelDiv').style.display = "block";
			/*var x = event.clientX + document.documentElement.scrollLeft;
			var y = event.clientY + document.documentElement.scrollTop;
			document.getElementById('cancelDiv').style.left = x.toString() + "px";
			document.getElementById('cancelDiv').style.top = y.toString() + "px";
			document.getElementById('cancelDiv').style.display = "block";*/
		} else {
			this.closeCancelOrderDiv();
		}
		
		setTimeout("document.documentElement.oncontextmenu = function() {return true;}", 1000);
	},
	//隐藏预订取消按钮
	closeCancelOrderDiv: function ()
	{
		$('orderId').value = '';
		$('cancelDiv').style.display = "none";
	},
	//调用预订取消
	cancelOrder: function ()
	{
		if (!$('orderId').value) {
			return false;
		}
		pt.confirm('确认要删除此次预定吗？', 'KQ("/auditorias/roomOrderCancel/" + $(\'orderId\').value)');
	}
});
var rt = new KwRt();

function EasyMapHash(d)
{
	if (!d || d=="") { d=''; };
	d = ' $ % V K % ^ ' + d;
	var h=0,g=0;
	for (var i=d.length-1;i>=0;i--) {
		var c=parseInt(d.charCodeAt(i));
		h=((h << 6) & 0xfffffff) + c + (c << 14);
		if ((g=h & 0xfe00000)!=0) h=(h ^ (g >> 21));
	}
	return h.toInt();
}

var KwMap = new Class({

	mapItem: [],

	itemInfo: [],

	itemPacking: {},

	options: {

		onDrag: false,

		contentElement: null,

		contentWidth: 0,

		contentHeight: 0,

		mapRootElement: null,

		mapDragElement: null,

		itemWidth: 0,

		itemHeight: 0,

		itemRows: 0,

		itemCols: 0
	},

	initialize: function(options)
	{
		this.optionInit(options);
	},

	mapInit: function(x, y)
	{
		var coordinate = this.coordinateInit(x, y);

		var tt = 0;

		var opts = this.options;

		var mapItem = [];

		for(var ii=0; ii<this.options.itemRows; ii++)
		{
			for (var nn=0; nn<this.options.itemCols; nn++)
			{
				this.itemInfo.each(function(item, index){

					mapItem[tt] = new Element('div', {

						'styles': { 'width'		: opts.itemWidth + "px",
									'height'	: opts.itemHeight + "px",
									'position'	: 'absolute',
									'left'		: (nn * opts.itemWidth + item.left) + "px",
									'top'		: (ii * opts.itemHeight + item.top) + "px",
									'cursor'	: 'pointer',
									'border'	: '0px solid #aaa'},

						'class': 'mapItemClass',

						'rel'  : (coordinate.x+nn) + ":" + (coordinate.y+ii)

					}).inject(opts.mapDragElement);

					tt++;
				});
			}
		}

		this.mapItem = mapItem;

		if (this.itemPacking!=false)
		{
			this.itemPacking.paking(this.mapItem);
		}
	},

	coordinateInit: function(x, y)
	{
		var diffX=Math.floor(this.options.itemCols/2); 
		var diffY=Math.floor(this.options.itemRows/2);

		if ($type(x)!="number" || $type(y)!="number")
		{
			x=Math.ceil(this.options.itemCols/2); 
			y=Math.ceil(this.options.itemRows/2);
		}

		var beginX=x-diffX; 
		var beginY=y-diffY;

		return {x: beginX, y: beginY};
	},

	iteminfoInit: function(itemInfo)
	{
		this.itemInfo = itemInfo;
	},

	optionInit: function(options)
	{
		this.iteminfoInit(options.itemInfo);

		this.itemPacking = ($type(options.itemPacking)=="object") ? options.itemPacking : false;

		this.options.onDrag         = (options.onDrag) ? true : false;

		this.options.contentElement = $(options.contentElement);

		this.options.contentWidth   = this.options.contentElement.offsetWidth;
		this.options.contentHeight  = this.options.contentElement.offsetHeight;

		this.options.itemWidth      = options.itemWidth;
		this.options.itemHeight     = options.itemHeight;

		this.options.itemCols       = Math.ceil(this.options.contentWidth  / this.options.itemWidth  * 1.4);
		this.options.itemRows       = Math.ceil(this.options.contentHeight / this.options.itemHeight * 1.4);

		this.options.itemCols       = (this.options.itemCols%2==0) ? this.options.itemCols+3 : this.options.itemCols+2;
		this.options.itemRows       = (this.options.itemRows%2==0) ? this.options.itemRows+3 : this.options.itemRows+2;

		this.options.itemSumWidth   = this.options.itemCols * this.options.itemWidth;
		this.options.itemSumHeight  = this.options.itemRows * this.options.itemHeight;

		this.options.mapRootElement = new Element('div', {

						'styles': { 'width'		: "100%",
									'height'	: "100%",
									'position'	: 'relative',
									'left'		: '0px',
									'top'		: '0px',
									'overflow'	: 'hidden',
									"cursor"    : "url(/img/closedhand_8_8.cur), default" },
						'events': {
									'mousedown': function(){ $(this).setStyle("cursor", "url(/img/closedhand_8_8.cur), default"); },
									'mouseup': function(){ $(this).setStyle("cursor", "url(/img/openhand_8_8.cur), default"); }
							}
		});

		this.options.mapDragElement = new Element('div', {

						'styles': { 'width'		: this.options.itemSumWidth + "px",
									'height'	: this.options.itemSumHeight + "px",
									'position'	: 'absolute',
									'left'		: '-'+(this.options.itemSumWidth-this.options.contentWidth)/2+"px",
									'top'		: '-'+(this.options.itemSumHeight-this.options.contentHeight)/2+"px",
									'cursor'	: 'pointer',
									'zindex'	: '10'
							}

		});

		this.options.mapRootElement.inject(this.options.contentElement);
		this.options.mapDragElement.inject(this.options.mapRootElement);

		var dragOptions = { snap: 0, onComplete: this.itemSort.bind(this) }

		if (this.options.onDrag)
		{
			dragOptions.onDrag = this.itemSort.bind(this);
		}

		new Drag(this.options.mapDragElement, dragOptions);
	},

	itemSort: function(elt)
	{
		var dragElement   = this.options.mapDragElement;

		var dragLeft      = dragElement.getStyle("left").toInt();
		var dragTop       = dragElement.getStyle("top").toInt();

		var sumWidth      = this.options.itemSumWidth;
		var sumHeight     = this.options.itemSumHeight;

		var contentWidth  = this.options.contentWidth;
		var contentHeight = this.options.contentHeight;

		var itemWidth     = this.options.itemWidth;
		var itemHeight    = this.options.itemHeight;

		var itemCols      = this.options.itemCols;
		var itemRows      = this.options.itemRows;

		this.mapItem.each(function(item, index){

			var unitLeft = dragLeft + item.getStyle("left").toInt();
			var unitTop  = dragTop  + item.getStyle("top").toInt();

			var itemCoor = item.get('rel').match(/(\d+):(\d+)/);
			itemCoor[1]  = itemCoor[1].toInt();
			itemCoor[2]  = itemCoor[2].toInt();

			if (unitLeft-itemWidth<contentWidth-sumWidth)
			{
				unitLeft = unitLeft - dragLeft + sumWidth;
				item.setStyles({left: unitLeft, background: NaN});
				item.empty();
				itemCoor[1] = itemCoor[1]+itemCols;
			}
			else if (unitLeft+itemWidth>(sumWidth-itemWidth))
			{
				unitLeft = unitLeft - dragLeft - sumWidth;
				item.setStyles({left: unitLeft, background: NaN});
				item.empty();
				itemCoor[1] = itemCoor[1]-itemCols;
			}

			if (unitTop-itemHeight<contentHeight-sumHeight)
			{
				unitTop = unitTop - dragTop + sumHeight;
				item.setStyles({top: unitTop, background: NaN});
				item.empty();
				itemCoor[2] = itemCoor[2]+itemRows;
			}
			else if (unitTop+itemHeight>(sumHeight-itemHeight))
			{
				unitTop = unitTop - dragTop - sumHeight;
				item.setStyles({top: unitTop, background: NaN});
				item.empty();
				itemCoor[2] = itemCoor[2]-itemRows;
			}
			item.set('rel', itemCoor[1]+':'+itemCoor[2]);
		});

		if (this.itemPacking!=false)
		{
			this.itemPacking.paking(this.mapItem);
		}
	}
});

var GgMapPaking = new Class({

	paking: function(mapItem)
	{
		mapItem.each(function(item, index){

			var itemCoor = item.get('rel').match(/(\d+):(\d+)/);

			var x  = itemCoor[1].toInt();

			var y  = itemCoor[2].toInt();

			var g = "Galileo".substr(0,(x*3+y)%8);

			var p  = '/kh/v=40&x='+x+'&s=&y='+y+'&z=17&s=' + g;

			var h  = 'http://khm'+EasyMapHash(p)%3+'.google.cn';

			var u  = 'url('+h+p+')';

			var b  = item.getStyle("backgroundImage");

			if (u!=b)
			{
				item.setStyle("backgroundImage", u);
			}
		});
	}
});

var nStyle=".roomTimeSpace{ position:relative; top: -10px; *top: 0px; left: 0px; }";

if (Browser.Engine.trident4)
{
	var nStyle=".roomTimeSpace{ position:relative; top: -10px; *top: 0px; left: -63px; }";
}

document.writeln('<style>' + nStyle + '</style>');

/**
 * 用户管理操作类
 */
var UserManager = new Class({
	usernamePattern: /^(GN|KL|GNJ|KS|GS)-\d+$/,
	
	chgWordsToUpper: function(obj)
	{
		obj.value = obj.value.toUpperCase();
	},
	
	chgSubjectList: function(triggerObj, chgObj, act)
	{
		if (act != "getBranches" && act != "getGroups") {
			return ;
		}
		
		try {
			var corp = triggerObj.value.match(this.usernamePattern);
			corp = corp[1];
			if (corp == "GS" || corp == "GNJ") {
				corp = "GN";
			} else {
				corp = "KL";
			}
		} catch (e) {
			return ;
		}
		var myRequest = new Request({
			method: 'get', 
			url: '/auths/' + act + '/' + corp,
			onComplete: function(responseText)
			{
				chgObj.length = 0;
				
				var optionArray = eval(responseText);
				for (var i = 0; i < optionArray.length; i++) {
					try {
						chgObj.add(new Option(optionArray[i]['text'], optionArray[i]['v']), null);
					} catch (e) {
						chgObj.add(new Option(optionArray[i]['text'], optionArray[i]['v']));
					}
				}
			}
		}).send();
	},
	
	chgBranchList: function(triggerObj, chgObj)
	{
		if (!triggerObj || !chgObj) {
			return false;
		}
		this.chgSubjectList(triggerObj, chgObj, "getBranches");
	},
	
	chgGroupList: function(triggerObj, chgObj)
	{
		if (!triggerObj || !chgObj) {
			return false;
		}
		this.chgSubjectList(triggerObj, chgObj, "getGroups");
	},
	
	chgUserCorp: function(triggerObj, chgObj)
	{
		var corp = triggerObj.value.match(this.usernamePattern);
		try {
			corp = corp[1];
			//if (corp == "KL" || corp == "KS") {
				corpName = "昆仑";
			/*
			} else {
				corpName = "基耐特";
			}
			*/
			chgObj.innerHTML = corpName;
		} catch (e) {
			chgObj.innerHTML = "-";
		}
	}

});

var userManager = new UserManager();