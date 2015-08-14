window.ZENG=window.ZENG||{};ZENG.dom={getById:function(a){return document.getElementById(a)},get:function(a){return(typeof(a)=="string")?document.getElementById(a):a},createElementIn:function(d,f,e,c){var a=(f=ZENG.dom.get(f)||document.body).ownerDocument.createElement(d||"div"),b;if(typeof(c)=="object"){for(b in c){if(b=="class"){a.className=c[b]}else{if(b=="style"){a.style.cssText=c[b]}else{a[b]=c[b]}}}}e?f.insertBefore(a,f.firstChild):f.appendChild(a);return a},getStyle:function(b,f){b=ZENG.dom.get(b);if(!b||b.nodeType==9){return null}var a=document.defaultView&&document.defaultView.getComputedStyle,c=!a?null:document.defaultView.getComputedStyle(b,""),d="";switch(f){case"float":f=a?"cssFloat":"styleFloat";break;case"opacity":if(!a){var h=100;try{h=b.filters["DXImageTransform.Microsoft.Alpha"].opacity}catch(g){try{h=b.filters("alpha").opacity}catch(g){}}return h/100}else{return parseFloat((c||b.style)[f])}break;case"backgroundPositionX":if(a){f="backgroundPosition";return((c||b.style)[f]).split(" ")[0]}break;case"backgroundPositionY":if(a){f="backgroundPosition";return((c||b.style)[f]).split(" ")[1]}break}if(a){return(c||b.style)[f]}else{return(b.currentStyle[f]||b.style[f])}},setStyle:function(c,g,h){if(!(c=ZENG.dom.get(c))||c.nodeType!=1){return false}var e,b=true,d=(e=document.defaultView)&&e.getComputedStyle,f=/z-?index|font-?weight|opacity|zoom|line-?height/i;if(typeof(g)=="string"){e=g;g={};g[e]=h}for(var a in g){h=g[a];if(a=="float"){a=d?"cssFloat":"styleFloat"}else{if(a=="opacity"){if(!d){a="filter";h=h>=1?"":("alpha(opacity="+Math.round(h*100)+")")}}else{if(a=="backgroundPositionX"||a=="backgroundPositionY"){e=a.slice(-1)=="X"?"Y":"X";if(d){var i=ZENG.dom.getStyle(c,"backgroundPosition"+e);a="backgroundPosition";typeof(h)=="number"&&(h=h+"px");h=e=="Y"?(h+" "+(i||"top")):((i||"left")+" "+h)}}}}if(typeof c.style[a]!="undefined"){c.style[a]=h+(typeof h==="number"&&!f.test(a)?"px":"");b=b&&true}else{b=b&&false}}return b},getScrollTop:function(a){var b=a||document;return Math.max(b.documentElement.scrollTop,b.body.scrollTop)},getClientHeight:function(a){var b=a||document;return b.compatMode=="CSS1Compat"?b.documentElement.clientHeight:b.body.clientHeight}};ZENG.string={RegExps:{trim:/^\s+|\s+$/g,ltrim:/^\s+/,rtrim:/\s+$/,nl2br:/\n/g,s2nb:/[\x20]{2}/g,URIencode:/[\x09\x0A\x0D\x20\x21-\x29\x2B\x2C\x2F\x3A-\x3F\x5B-\x5E\x60\x7B-\x7E]/g,escHTML:{re_amp:/&/g,re_lt:/</g,re_gt:/>/g,re_apos:/\x27/g,re_quot:/\x22/g},escString:{bsls:/\\/g,sls:/\//g,nl:/\n/g,rt:/\r/g,tab:/\t/g},restXHTML:{re_amp:/&/g,re_lt:/</g,re_gt:/>/g,re_apos:/&(?:apos|#0?39);/g,re_quot:/"/g},write:/\{(\d{1,2})(?:\:([xodQqb]))?\}/g,isURL:/^(?:ht|f)tp(?:s)?\:\/\/(?:[\w\-\.]+)\.\w+/i,cut:/[\x00-\xFF]/,getRealLen:{r0:/[^\x00-\xFF]/g,r1:/[\x00-\xFF]/g},format:/\{([\d\w\.]+)\}/g},commonReplace:function(a,c,b){return a.replace(c,b)},format:function(c){var b=Array.prototype.slice.call(arguments),a;c=String(b.shift());if(b.length==1&&typeof(b[0])=="object"){b=b[0]}ZENG.string.RegExps.format.lastIndex=0;return c.replace(ZENG.string.RegExps.format,function(d,e){a=ZENG.object.route(b,e);return a===undefined?d:a})}};ZENG.object={routeRE:/([\d\w_]+)/g,route:function(d,c){d=d||{};c=String(c);var b=ZENG.object.routeRE,a;b.lastIndex=0;while((a=b.exec(c))!==null){d=d[a[0]];if(d===undefined||d===null){break}}return d}};var ua=ZENG.userAgent={},agent=navigator.userAgent;ua.ie=9-((agent.indexOf("Trident/5.0")>-1)?0:1)-(window.XDomainRequest?0:1)-(window.XMLHttpRequest?0:1);if(typeof(ZENG.msgbox)=="undefined"){ZENG.msgbox={}}ZENG.msgbox._timer=null;ZENG.msgbox.loadingAnimationPath=ZENG.msgbox.loadingAnimationPath||("gb_tip_loading.gif");ZENG.msgbox.show=function(c,g,h,a){if(typeof(a)=="number"){a={topPosition:a}}a=a||{};var j=ZENG.msgbox,i='<span class="zeng_msgbox_layer" style="display:none;z-index:10000;" id="mode_tips_v2"><span class="gtl_ico_{type}"></span>{loadIcon}{msgHtml}<span class="gtl_end"></span></span>',d='<span class="gtl_ico_loading"></span>',e=[0,0,0,0,"succ","fail","clear"],b,f;j._loadCss&&j._loadCss(a.cssPath);b=ZENG.dom.get("q_Msgbox")||ZENG.dom.createElementIn("div",document.body,false,{className:"zeng_msgbox_layer_wrap"});b.id="q_Msgbox";b.style.display="";b.innerHTML=ZENG.string.format(i,{type:e[g]||"hits",msgHtml:c||"",loadIcon:g==6?d:""});j._setPosition(b,h,a.topPosition)};ZENG.msgbox._setPosition=function(a,f,d){f=f||5000;var g=ZENG.msgbox,b=ZENG.dom.getScrollTop(),e=ZENG.dom.getClientHeight(),c=Math.floor(e/2)-40;ZENG.dom.setStyle(a,"top",((document.compatMode=="BackCompat"||ZENG.userAgent.ie<7)?b:0)+((typeof(d)=="number")?d:c)+"px");clearTimeout(g._timer);a.firstChild.style.display="";f&&(g._timer=setTimeout(g.hide,f))};ZENG.msgbox.hide=function(a){var b=ZENG.msgbox;if(a){clearTimeout(b._timer);b._timer=setTimeout(b._hide,a)}else{b._hide()}};ZENG.msgbox._hide=function(){var a=ZENG.dom.get("q_Msgbox"),b=ZENG.msgbox;clearTimeout(b._timer);if(a){var c=a.firstChild;ZENG.dom.setStyle(a,"display","none")}};

u = window.u ||{
	
	msg:function(text,type,url,time){
		
		var type=type || 4;
		var time=time || 1102;	
		if(url) setTimeout("window.location.href ='"+url+"';",2000); 
	    ZENG.msgbox.show(text, type, time);
		
	}
}


			//check login
$(function(){
	$.ajax({
		type:"GET",
		url:"index.php?m=Login&a=isLogin",
		success:function(jsstr){
			if(jsstr == 'nologin') ctrModal('myLoginModal','show');
		}
	});
	
});


//dealsome('index.php?m=project&a=delurl&token=','<{$arr['url_hash']}>')
function dealsome(url,url_hash){
	$.ajax({
		type:"GET",
		url:url+url_hash,
		success:function(jsstr){
			obj = JSON.parse(jsstr);
			u.msg(obj.message,obj.type,obj.url);
		}
	});
	
};


//dealsome('index.php?m=project&a=delurl&token=','<{$arr['url_hash']}>')
function logout(url,url_hash){
	$.ajax({
		type:"GET",
		url:'index.php?m=Login&a=logout',
		success:function(jsstr){
			obj = JSON.parse(jsstr);
			u.msg(obj.message,obj.type,obj.url);
		}
	});
	
};

