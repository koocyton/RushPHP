var xFBClient = new Class({
	
	Implements: Options,

	options:
	{
	},

	initialize: function(options)
	{
		this.setOptions(options);
	},

	gameAllow : function()
	{
	},
	
	gameLogin : function()
	{
	},
	
	gameInit : function()
	{
		this.showGame();
	},
	
	showGame : function()
	{
		var flashGameObj = new Swiff('http://static.knight.doopp.com/QscsGame.swf', {
			id: 'game_flash_object',
			width: 600,
			height: 500,
			params: {
				menu:"false",
				scale:"noScale",
				allowFullscreen:"true",
				allowScriptAccess: 'always',
				quality: 'high',
				wmode: 'Opaque',
				bgcolor: '#ffff',
				swLiveConnect: 'true'
			}
		});
		$('game_flash_div').empty();
		flashGameObj.inject('game_flash_div');
	},
	
	encodeFeedText : function(text)
	{
		var tempText = [];
		for(var i=0, length=text.length; i< length;i++)
		{
			var ch = text.charCodeAt(i);
			if(ch > 127 || ch == 94)
			{
				tempText.push(text[i] + '\n');
			}
			else
			{
				tempText.push(text[i]);
			}
		}
		return tempText.join("");
	},

	feedPublish : function(user_message, attachment, action_links, target_id, user_prompt, callback)
	{
		FB.ensureInit(function(){ FB.Connect.forceSessionRefresh(function(){

			feedInfo = {
				user_message : user_message.toString(),
				attachment   : typeOf(attachment)   == "object"   ? attachment   : null,
				action_links : typeOf(action_links) == "array"    ? action_links : null,
				target_id    : typeOf(target_id)    == "string"   ? target_id    : null,
				user_prompt  : typeOf(user_prompt)  == "string"   ? user_prompt  : null,
				callback     : typeOf(callback)     == "function" ? callback     : null,
			};

			if(!!window.ActiveXObject && !!document.documentMode && feedInfo.attachment!=null)
			{
				if (!!feedInfo.attachment.caption && feedInfo.attachment.caption.length>1)
				{
					feedInfo.attachment.caption = encodeFeedText(feedInfo.attachment.caption);
				}
				if (!!feedInfo.attachment.description && feedInfo.attachment.description.length>1)
				{
					feedInfo.attachment.description = encodeFeedText(feedInfo.attachment.description);
				}
				if (!!feedInfo.attachment.name && feedInfo.attachment.name.length>1)
				{
					feedInfo.attachment.name = feedInfo.attachment.name.substring(0, 100);
				}
			}
			FB.Connect.streamPublish(feedInfo.user_message, feedInfo.attachment, feedInfo.action_links, feedInfo.target_id, feedInfo.user_prompt, feedInfo.callback);

		});});
	}
});

XFB = new xFBClient();