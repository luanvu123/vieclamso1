!function(){var f=function(){try{if(!("localStorage"in window&&null!==window.localStorage))return!1;try{localStorage.setItem("_admstorage",""),localStorage.removeItem("_admstorage")}catch(a){return!1}return!0}catch(a){return!1}}();({version:"1.0.0",paramFlash:{},lcStorage:{timestamp:"timestamp_",get_exprises:function(a,b,c,d){return b=(a+="").indexOf(b,c),c=a.length-1,-1!=b?(-1==(d=a.indexOf(d,b))&&(d=c),a.substring(b,d)):""},get_item:function(a,b){var c;b=localStorage.getItem(a);var d=
    (new Date).getTime(),e=this.timestamp;return""==b||null==b?"":-1==b.indexOf("timestamp_")?b:""==(c=(c=this.get_exprises(b,e,0,a="_azs"==a?";":",")).replace(e,""))||isNaN(parseInt(c))||parseInt(c)<d?"":b.replace(e+c+a,"")}},getDomainGuid:function(){var a="",b="";try{a=this.getCookie("__uidac");b="";var c=f;c&&(b=window.localStorage.__uidac);b&&""!=b&&""==a&&(a=b,this.setCookie("__uidac",b,2E3,"/","."+window.location.hostname));c&&b&&""!=b&&""!=a&&a!=b&&(window.localStorage.__uidac=a)}catch(d){}b=window.__admloadPageIdc||
    window.__admloadPageRdIdc||"";""!=a&&""==b?(window.__admloadPageIdc=a,window.__admloadPageRdIdc=a):""!=b&&""==a?(a=b,this.setCookie("__uidac",a,2E3,"/","."+window.location.hostname),c&&(window.localStorage.__uidac=a)):""==b&&""==a&&this.createDomainGuid();return window.__admloadPageIdc||(window.__admloadPageIdc=b),window.__admloadPageRdIdc||(window.__admloadPageRdIdc=b),b},makeDomainGuid:function(){function a(b){return(void 0!==b&&b&&2==b?Math.floor(256*(1+Math.random())):Math.floor(65536*(1+Math.random()))).toString(16).substring(1)}
    return"01"+Math.floor((new Date).getTime()/1E3).toString(16)+a(2)+a(4)+a(4)+a(4)+a(4)+a(4)},createDomainGuid:function(){var a="",b=this.getCookie("__uidac");return f&&""==(a=localStorage.__uidac||b)&&(a=this.makeDomainGuid(),localStorage.__uidac=a,window.__admloadPageIdc=a,window.__admloadPageRdIdc=a,this.setCookie("__uidac",a,2E3,"/","."+document.domain)),""==a&&(a=this.makeDomainGuid(),this.setCookie("__uidac",a,2E3,"/","."+document.domain),window.__admloadPageIdc=a,window.__admloadPageRdIdc=a),
    a},setCookie:function(a,b,c,d,e,h){for(var g in(new Date).getTime(),c=(0==c||""==c?new Date(+new Date+63072E7):new Date(+new Date+864E5*c)).toGMTString(),a=[a+"="+escape(b)],c={expires:c,path:"/",domain:e})c[g]&&a.push(g+"="+c[g]);return h&&a.push("secure"),document.cookie=a.join(";"),!0},getCookie:function(a){a+="=";var b=window.unescape(document.cookie).split(";");for(let c=0;c<b.length;c++){let d=b[c];for(;" "==d.charAt(0);)d=d.substring(1);if(0==d.indexOf(a))return d.substring(a.length,d.length)}return""},
    get:function(a){if("__uidac"==a)return this.getDomainGuid();var b="",c=a;return("__ui"!=a&&"__uid"!=a&&"__create"!=a||(c=a,a="__uif"),"__uif"==a&&""!=(b=f&&null!=(b=localStorage.__uif)&&""!=b?b:this.getCookie("__uif")))&&(a=(new RegExp(c+":([0-9+%C]+)")).exec(b))&&1<a.length?a[1]||"":(""==(b=f&&(a=localStorage[c])&&""!=a?a.replace(/timestamp_[0-9]+?,/g,""):b)?this.getCookie(c):b)||""},getParam:function(){try{var a=this.get("__create")||this.getCookie("__create"),b=this.get("__uid")||this.getCookie("__uid");
    return 11<(a=""==(b=30<b.length?"":b)?"":a).length&&""!=b&&(a=Math.floor((new Date).getTime()/1E3)),"&ce=1&lc="+this.get("__RC")+"&cr="+a+"&ui="+b+"&dg="+(this.get("__uidac")||this.getCookie("__uidac"))}catch(c){return""}},getInfoParam:function(){return"&ce=1&guie=1&ui="+this.get("__uid")+"&cr="+this.get("__create")+"&dg="+(this.get("__uidac")||this.getCookie("__uidac"))}}).get("__uidac")}();

(function(){var k=!1,t=[];if(!window.AdmonDomReady||"function"!=typeof window.AdmonDomReady){var p=function(){if(!document.body)return setTimeout(p,13);for(var f=0;f<t.length;f++)t[f]();t=[]};window.AdmonDomReady=function(f){t.push(f);if("complete"==document.readyState)p();else if(!k){if(document.addEventListener){var w=function(){document.removeEventListener("DOMContentLoaded",w,!1);p()};document.addEventListener("DOMContentLoaded",w,!1);window.addEventListener("load",p,!1)}else if(document.attachEvent){var r=
    function(){"complete"===document.readyState&&(document.detachEvent("onreadystatechange",r),p())};document.attachEvent("onreadystatechange",r);window.attachEvent("onload",p);f=!1;try{f=null==window.frameElement}catch(y){}if(document.documentElement.doScroll&&f){var h=function(){if(0!=t.length){try{document.documentElement.doScroll("left")}catch(y){setTimeout(h,1);return}p()}};h()}}k=!0}}}})();window.logposurlview=window.logposurlview||"";
    (function(){function k(a,b,c){"addEventListener"in a?a.addEventListener(b,c):"attachEvent"in a&&a.attachEvent("on"+b,c)}function t(a,b){var c="",d={},e="";try{c=window.decodeURIComponent(window._ADM_Channel||"")}catch(n){}try{var g=ADM_TRACKING.getCookie("_ck_user"),l={};if(g&&-1!=g.indexOf("{")){try{l=JSON.parse(g)}catch(n){}""!=c&&(d.channel=c);c=0;if("undefined"!=typeof l.expiredate)try{c=0<(new Date(l.expiredate)).getTime()-(new Date).getTime()?1:0}catch(n){}d.isvip=c;"undefined"!=typeof l.id&&
    (d.uid=l.id,e=window.btoa(JSON.stringify(d)))}}catch(n){}d=e||"";e="//"+(-1!=(navigator.userAgent+"").indexOf("coc_coc")?"contineljs.com":"amcdn.vn")+"/anlz?dg="+B;e+="&fl="+x.flashVersion();e+="&je="+x.javaEnabled;e+="&sr="+x.screen_Resolution;e+="&sc="+x.screen_Color;e+="&hn="+x.hostname;""!=d&&(e+="&xtr="+encodeURIComponent(d));e="undefined"!=typeof a&&""!=a?e+("&p="+encodeURIComponent(a)):e+("&p="+x.zenURL.encode(x.url()));e="undefined"!=typeof b&&""!=b?e+("&r="+encodeURIComponent(location.protocol+
    "//"+location.hostname+b)):e+("&r="+(""==x.referrer?"":x.zenURL.encode(x.referrer)));e="undefined"!=typeof window._ADM_Channel&&""!=window._ADM_Channel?e+("&cat="+encodeURIComponent(decodeURIComponent(window._ADM_Channel))):e+"&cat=";try{var q=window.self!==window.top}catch(n){q=!0}f.__ifr=q?1:0;f.__ADM_AnalyticSend=!0;f.__ADMScrollcounter=0;f.__ADMScrollEnd=0;f.__ADMTrackingSendUrl=e;f.__ADMTouch=0;f.__ADMMouse=0;f.__ADMisActive=0;f.__ADMTimeTk=Math.floor((new Date).getTime()/1E3);return e}function p(){var a=
    t();try{var b=window.self!==window.top}catch(c){b=!0}f.__ifr=b?1:0;f.__ADM_AnalyticSend=!0;f.__ADMScrollcounter=0;f.__ADMScrollEnd=0;f.__ADMTrackingSendUrl=a;f.__ADMTouch=0;f.__ADMMouse=0;f.__ADMisActive=0;f.__ADMTimeTk=Math.floor((new Date).getTime()/1E3);try{M()&&(f.__ADMisActive=1)}catch(c){}-1!=(navigator.userAgent+"").indexOf("Firefox")&&(chkBrowser=!1);k(window,"scroll",function(){f.__ADMScrollcounter+=1;0>D.bdHeight()-(D.scrollTop()+D.wdHeight()+200)&&(f.__ADMScrollEnd=1)});k(window,"blur",
    function(){f.__ADMisActive=0});k(window,"focus",function(){f.__ADMisActive=1});"ontouchstart"in window&&k(document,"touchmove",function(c){f.__ADMTouch++});k(document,"mousemove",function(c){f.__ADMMouse++});(function(){var c,d="",e={hidden:"visibilitychange",webkitHidden:"webkitvisibilitychange",mozHidden:"mozvisibilitychange",msHidden:"msvisibilitychange"};for(c in e)if(c in document){var g=e[c];d=c;break}document.addEventListener(g,function(){f.__ADMisActive=document[d]?0:1;w&&clearTimeout(w);
    z("p")})})();if("beforeunload"in window||"onbeforeunload"in window)-1!=navigator.userAgent.indexOf("Firefox")?k(window,"unload",function(){z("e")}):k(window,"beforeunload",function(){z("e")})}var f={},w;window.admanalyticTrk=window.admanalyticTrk||{};var r=function(){try{if(!("localStorage"in window&&null!==window.localStorage))return!1;try{localStorage.setItem("_admstorage",""),localStorage.removeItem("_admstorage")}catch(a){return!1}return!0}catch(a){return!1}}();"undefined"==typeof window.__admPageloadid&&
    (window.__admPageloadid=window.__m_admPageloadid||(new Date).getTime());"undefined"==typeof window.__m_admPageloadid&&(window.__m_admPageloadid=window.__admPageloadid||(new Date).getTime());var h={version:"1.0.0",paramFlash:{},getFlashMovie:function(a){return-1!=navigator.appName.indexOf("Microsoft")?document.getElementById(a):document[a]},checkBrowser:function(){var a=!1;var b=navigator.appName;var c=navigator.userAgent+"",d,e=c.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
    null==e&&-1==c.indexOf("MSIE")&&-1!=c.indexOf("Trident/")?(b=-1,null!=/Trident\/.*rv:([0-9]{1,}[.0-9]{0,})/.exec(c)&&(b=RegExp.$1),e=["MSIE",b+""]):(e&&null!=(d=c.match(/version\/([\.\d]+)/i))&&(e[2]=d[1]),e=e?[e[1],e[2]]:[b,navigator.appVersion,"-?"]);b=e;"undefined"!=typeof b&&null!=b&&1<=b.length&&(c=(b[0]+"").toLowerCase(),b=b[1].split("."),b=parseInt(b[0]),("firefox"==c&&22<=b||"msie"==c&&10<=b||"safari"==c&&5<=b||"chrome"==c)&&r&&(a=!0));return a},fonts:"",getFont:function(a){h.fonts=a},lcStorage:{timestamp:"timestamp_",
    get_exprises:function(a,b,c,d){a+="";b=a.indexOf(b,c);c=a.length-1;return-1!=b?(d=a.indexOf(d,b),-1==d&&(d=c),a.substring(b,d)):""},set_item:function(a,b,c){var d=(new Date).getTime(),e=this.timestamp;d=0==c||""==c?d+63072E7:d+864E5*c;var g="_azs"==a?";":",";c=this.get_exprises(b,e,0,g);b=""==c?b+(e+d.toString()+g):b.replace(c,e+d.toString());localStorage.setItem(a,b)},get_item:function(a,b){var c=localStorage.getItem(a),d=(new Date).getTime(),e=this.timestamp;if(""==c||null==c)return"";var g="_azs"==
    a?";":",",l=this.get_exprises(c,e,0,g);l=l.replace(e,"");return""==l||isNaN(parseInt(l))||parseInt(l)<d?"":c.replace(e+l+g,"")},remove_item:function(a){localStorage.removeItem(a)},flush:function(){localStorage.clear()}},setCookie:function(a,b,c,d,e,g){(new Date).getTime();d="/";c=0==c||""==c?(new Date(+new Date+63072E7)).toGMTString():(new Date(+new Date+864E5*c)).toGMTString();a=[a+"="+escape(b)];for(var l in c={expires:c,path:d,domain:e})c[l]&&a.push(l+"="+c[l]);return g&&a.push("secure"),document.cookie=
    a.join(";"),!0},getCookie:function(a){var b,c;return 0<document.cookie.length&&(b=document.cookie.indexOf(a+"="),-1!=b)?(b=b+a.length+1,c=document.cookie.indexOf(";",b),-1==c&&(c=document.cookie.length),unescape(document.cookie.substring(b,c))):""},get:function(a){var b="",c="";if("__ui"==a||"__uid"==a||"__create"==a)c=a,a="__uif";if(r){if("__R"==a||"__RC"==a||"__uif"==a)b=h.getCookie(a);if(null==b||""==b)b=h.lcStorage.get_item(a),null!=b&&""!=b&&h.setCookie(a,b,"","/","."+document.domain)}else b=
    h.getCookie(a);if(""!=c&&""!=b){a=b.split("|");for(var d=0,e=a.length;d<e;d++)if(-1!=a[d].indexOf(c+":")){b=a[d].replace(c+":","");break}}return b},set:function(a,b,c){if(r){if(h.lcStorage.set_item(a,b,c),"__R"==a||"__RC"==a||"__uif"==a)"__R"==a&&"undefined"!=typeof ADS_Location&&ADS_Location!=b&&""!=b&&"0"!=b&&(ADS_Location=parseInt(b)),"__RC"==a&&"undefined"!=typeof ADS_City&&ADS_City!=b&&""!=b&&"0"!=b&&(ADS_City=parseInt(b)),h.setCookie(a,b,c)}else h.setCookie(a,b,c)},getParam:function(){if(h.checkBrowser()){var a=
    h.get("__create")+"",b=h.get("__uid")+"";30<b.length&&(b="");""==b&&(a="");11<a.length&&""!=b&&(a=Math.floor((new Date).getTime()/1E3));var c="";window.__admloadPageIdc&&(c="&dg="+window.__admloadPageIdc);return"&ce=1&lc="+h.get("__RC")+"&cr="+a+"&ui="+b+c}return""},getInfoParam:function(){if(h.checkBrowser())return"";var a=h.get("__uid"),b=h.get("__create");return"&ce=1&guie=1&__uid="+a+"&__create="+b},flashcheck:function(a){for(var b in a)h.check(b,a[b],!0)},expireAllCookies:function(a,b){var c=
    (new Date(0)).toUTCString();document.cookie=a+"=; expires="+c;for(var d=0,e=b.length;d<e;d++)document.cookie=a+"=; path="+b[d]+"; expires="+c},expireActiveCookies:function(a){for(var b=location.pathname.replace(/\/$/,"").split("/"),c=[],d=0,e=b.length,g;d<e;d++)g=b.slice(0,d+1).join("/"),g=g.replace(/\.([\w]+)/gi,""),""!=g&&(c.push(g),c.push(g+"/"));0<c.length&&h.expireAllCookies(a,c)},check:function(a,b){switch(a){case "__ui":case "__uid":case "__create":if(2==arguments.length&&"__uid"==a||"__create"==
    a&&""!=b){h.paramFlash[a]=b;var c=h.getFlashMovie("_admFlck");c&&c.setck&&c.setck(h.paramFlash)}var d=h.get("__uif")+"";if(""==d)d=a+":"+b;else{c=a+":"+b;d=d.split("|");for(var e=[],g=0,l=d.length;g<l;g++)-1==d[g].indexOf(a+":")&&e.push(d[g]);e.push(c);d=e.join("|")}h.set("__uif",d,10);break;default:d=h.get(a),2==arguments.length&&""!=b&&"0"!=b&&"-1"!=b&&(h.paramFlash[a]=b,(c=h.getFlashMovie("_admFlck"))&&c.setck&&c.setck(h.paramFlash)),d!=b&&h.set(a,b,"")}}},y=h.getCookie("__admUTMtime");""==y&&
    (y=Math.floor((new Date).getTime()/1E3),h.setCookie("__admUTMtime",y,30,"/","."+document.domain));var D={scrollTop:function(){var a=document,b=a.body.scrollTop;0==b&&(b=window.pageYOffset?window.pageYOffset:a.body.parentElement?a.body.parentElement.scrollTop:0);return b},wdHeight:function(){var a,b=document;"number"==typeof window.innerWidth?a=window.innerHeight:b.documentElement&&b.documentElement.clientHeight?a=b.documentElement.clientHeight:b.body&&b.body.clientHeight&&(a=b.body.clientHeight);
    return a},wdWidth:function(){var a,b=document;"number"==typeof window.innerWidth?a=window.innerWidth:b.documentElement&&b.documentElement.clientWidth?a=b.documentElement.clientWidth:b.body&&b.body.clientWidth&&(a=b.body.clientWidth);return a},bdWidth:function(){var a=document;return bodyWidth=Math.max(Math.max(a.body.scrollWidth,a.documentElement.scrollWidth),Math.max(a.body.offsetWidth,a.documentElement.offsetWidth),Math.max(a.body.clientWidth,a.documentElement.clientWidth))},bdHeight:function(){var a=
    document;return Math.max(Math.max(a.body.scrollHeight,a.documentElement.scrollHeight),Math.max(a.body.offsetHeight,a.documentElement.offsetHeight),Math.max(a.body.clientHeight,a.documentElement.clientHeight))}},F=new function(){var a=this;a.installed=!1;a.raw="";a.major=-1;a.minor=-1;a.revision=-1;a.revisionStr="";var b=[{name:"ShockwaveFlash.ShockwaveFlash.7",version:function(d){return c(d)}},{name:"ShockwaveFlash.ShockwaveFlash.6",version:function(d){var e="6.0.r21";try{d.AllowScriptAccess="always",
    e=c(d)}catch(g){}return e}},{name:"ShockwaveFlash.ShockwaveFlash",version:function(d){return c(d)}}],c=function(d){var e=-1;try{e=d.GetVariable("$version")}catch(g){}return e};a.majorAtLeast=function(d){return a.major>=d};a.minorAtLeast=function(d){return a.minor>=d};a.revisionAtLeast=function(d){return a.revision>=d};a.versionAtLeast=function(d){var e=[a.major,a.minor,a.revision],g=Math.min(e.length,arguments.length);for(m=0;m<g;m++)if(e[m]>=arguments[m]){if(!(m+1<g&&e[m]==arguments[m]))return!0}else return!1};
    a._ADMFlashDetect=function(){if(navigator.plugins&&0<navigator.plugins.length){var d=navigator.mimeTypes;if(d&&d["application/x-shockwave-flash"]&&d["application/x-shockwave-flash"].enabledPlugin&&d["application/x-shockwave-flash"].enabledPlugin.description){var e=d=d["application/x-shockwave-flash"].enabledPlugin.description;d=e.split(/ +/);var g=d[2].split(/\./);d=d[3];var l=parseInt(g[0],10);var q=parseInt(g[1],10);var n=d;var A=parseInt(d.replace(/[a-zA-Z]/g,""),10)||a.revision;a.raw=e;a.major=
    l;a.minor=q;a.revisionStr=n;a.revision=A;a.installed=!0}}else if(-1==navigator.appVersion.indexOf("Mac")&&window.execScript)for(d=-1,g=0;g<b.length&&-1==d;g++){e=-1;try{e=new ActiveXObject(b[g].name)}catch(u){e={activeXError:!0}}e.activeXError||(a.installed=!0,d=b[g].version(e),-1!=d&&(e=d,n=e.split(","),l=parseInt(n[0].split(" ")[1],10),q=parseInt(n[1],10),A=parseInt(n[2],10),n=n[2],a.raw=e.replace("Shockwave Flash ",""),a.major=l,a.minor=q,a.revision=A,a.revisionStr=n))}}()};(function(){var a=999;
    try{var b=navigator.userAgent+"";-1!=navigator.appVersion.indexOf("MSIE")&&(a=parseFloat(navigator.appVersion.split("MSIE")[1]));if(-1!=b.indexOf("Trident")){var c=/Trident\/.*rv:([0-9]{1,}[.0-9]{0,})/.exec(b);c&&2<=c.length&&(a=parseFloat(c[1]))}}catch(d){}return a})();var x={screen_Resolution:screen.width+"x"+screen.height,screen_Color:screen.colorDepth,hostname:document.domain.replace("www.",""),cookieEnabled:navigator.cookieEnabled?1:0,javaEnabled:navigator.javaEnabled()?1:0,referrer:document.referrer,
    url:function(){var a=-1!=(document.domain+"").indexOf("danviet.vn")?document.location+"":window.location!=window.parent.location?document.referrer:document.location+"",b=this.hostname;return""==b?a:a.substring(a.indexOf(b)+b.length,a.length)},flashVersion:function(){return F.major+"."+F.minor+"."+F.revisionStr},zenURL:{encode:function(a){return encodeURIComponent(a)},decode:function(a){return decodeURIComponent(a.replace(/\+/g," "))}}},M=function(){var a,b={hidden:"visibilitychange",webkitHidden:"webkitvisibilitychange",
    mozHidden:"mozvisibilitychange",msHidden:"msvisibilitychange"};for(a in b)if(a in document){var c=b[a];break}return function(d){d&&document.addEventListener(c,d);return!document[a]}}();k(window,"blur",function(){f.__ADMisActive=0});k(window,"focus",function(){f.__ADMisActive=1});"ontouchstart"in window&&k(document,"touchmove",function(a){f.__ADMTouch++});k(document,"mousemove",function(a){f.__ADMMouse++});var G=function(){function a(){return Math.floor(65536*(1+Math.random())).toString(16).substring(1)}
    return a()+a()+a()+a()+a()+a()+a()+a()}();if(r){var B=localStorage.__uidac;B||(B=localStorage.__uidac=G)}else B=h.getCookie("__uidac"),""==B&&h.setCookie("__uidac",G,2E3,"/","."+document.domain);var H=function(a){var b=encodeURIComponent;a=a+";"+__admPageloadid+";"+f.__ADMScrollcounter+";"+f.__ADMScrollEnd+";"+f.__ADMisActive+";"+f.__ADMMouse+";"+f.__ADMTouch+";"+(D.wdWidth()+"x"+D.wdHeight())+";"+f.__ifr+";"+("undefined"==typeof ADS_CHECKER?0:1)+";"+G;a:{var c="";try{var d=window.performance||window.webkitPerformance;
    if(d=d&&d.timing){var e=d.navigationStart;c=";"+[d.loadEventStart-e,d.domainLookupEnd-d.domainLookupStart,d.connectEnd-d.connectStart,d.responseStart-d.requestStart,d.responseEnd-d.responseStart,d.fetchStart-e,d.domInteractive-e,d.domContentLoadedEventStart-e].join(";")}var g=";"+h.getCookie("_ga")+c;break a}catch(l){}g=""}return b(a+g)};window.AdmanlaticPopup={open:function(a,b){try{try{"undefined"==typeof this.url&&(this.url=f.__ADMTrackingSendUrl)}catch(e){}f.__ADMTrackingSendUrl=t(a,b);for(var c=
    0,d=window.admicro_analytics_q.length;c<d;c++)window.admicro_analytics_q[c].chksend=!1;z("v",!0)}catch(e){}},close:function(){f.__ADMTrackingSendUrl=this.url}};var z=function(a){try{if(-1!=(document.domain+"").indexOf("vib.com.vn")&&"p"==a)return!1}catch(e){}var b=[];"undefined"==typeof f.__ADMTrackingSendUrl&&(f.__ADMTrackingSendUrl=t());if("undefined"!=typeof window.admicro_analytics_q&&0<window.admicro_analytics_q.length)for(var c=0,d=window.admicro_analytics_q.length;c<d;c++)"undefined"!=typeof window.admicro_analytics_q[c].chksend&&
    window.admicro_analytics_q[c].chksend||"v"!=a?"v"!=a&&(b[c]=new Image,b[c].src=f.__ADMTrackingSendUrl+"&i="+H(a)+"&rdm="+Math.random()+h.getParam()+"&dgt="+y+"&ac="+window.admicro_analytics_q[c].id+window.logposurlview):(window.admicro_analytics_q[c].chksend=!0,b[c]=new Image,b[c].src=f.__ADMTrackingSendUrl+"&i="+H(a)+"&rdm="+Math.random()+h.getParam()+"&dgt="+y+"&ac="+window.admicro_analytics_q[c].id+window.logposurlview);2>arguments.length&&(w&&clearTimeout(w),w=window.setTimeout(function(){z("p")},
    2E4))},K=function(){if("undefined"!=typeof window.admicro_analytics_q&&0<window.admicro_analytics_q.length)for(var a=0,b=window.admicro_analytics_q.length;a<b;a++)"undefined"==typeof window.admicro_analytics_q[a].load&&z("v",!0);window.setTimeout(function(){K()},200)};if("undefined"==typeof window.admanalyticTrk.load){window.admanalyticTrk.load=!0;try{var L=function(a,b,c,d,e,g,l){var q=-1!=(navigator.userAgent+"").indexOf("coc_coc")?"contineljs.com":"amcdn.vn",n=new Image;q=("https:"!=location.protocol?
    "http:":"https:")+"//"+q+"/pgview_event?ac="+arguments[arguments.length-1]+"&hn="+encodeURIComponent(location.hostname)+"&p="+encodeURIComponent(location.pathname+location.search)+"&ref="+encodeURIComponent(document.referrer)+"&dg="+encodeURIComponent(B)+"&etype=event&ecat="+encodeURIComponent(c)+"&eact="+encodeURIComponent(d)+"&elab="+encodeURIComponent(e)+"&eval="+encodeURIComponent(g)+"&eopt=&eid="+a+"&rd="+Math.random();n.src=q;r&&localStorage.setItem("admevent",q);n.onload=function(){r&&localStorage.removeItem("admevent")}};
    window.admicro_analytics_q=window.admicro_analytics_q||[];window.admicro_analytics=function(){"object"===typeof arguments[0]?window.admicro_analytics_q[window.admicro_analytics_q.length]=arguments[0]:window.admicro_analytics_q.send.apply(null,arguments)};window.admicro_analytics_q.send=L;var E=[],I=[];E.send=window.admicro_analytics_q.send;for(var m=0,J=window.admicro_analytics_q.length;m<J;m++)"object"===typeof window.admicro_analytics_q[m]&&"undefined"!=typeof window.admicro_analytics_q[m].event?
    E.push(window.admicro_analytics_q[m]):"object"===typeof window.admicro_analytics_q[m]&&"object"==typeof window.admicro_analytics_q[m][0]?E.push(window.admicro_analytics_q[m][0]):I.push(admicro_analytics_q[m]);window.admicro_analytics_q=E;m=0;for(J=I.length;m<J;m++)L.apply(null,I[m]);(function(){if(r&&localStorage.admevent&&""!=localStorage.admevent){var a=new Image;a.src=localStorage.admevent;a.onload=function(){localStorage.removeItem("admevent")}}})()}catch(a){console.log(a)}p();z("v");K();AdmonDomReady(function(){function a(){var u=
    document.body.scrollTop;0==u&&(u=window.pageYOffset?window.pageYOffset:document.body.parentElement?document.body.parentElement.scrollTop:0);return u}function b(){var u=a()+d;if(u>c){c=u;u=[];for(var C=[],v=0;v<g;v++)c>q[v]&&u.push(v);for(v=0;v<u.length;v++){var N=l[v].getAttributeNode("data-check-position").value;C.push(N+":"+q[v])}C=encodeURIComponent(C);window.logposurlview="&sl="+c+"&si="+C;if(u.length==g){v=0;for(u=window.admicro_analytics_q.length;v<u;v++)C=new Image,"undefined"==typeof f.__ADMTrackingSendUrl&&
    (f.__ADMTrackingSendUrl=t()),C.src=f.__ADMTrackingSendUrl+window.logposurlview+"&i="+H("p")+"&rdm="+Math.random()+h.getParam()+"&dgt="+y+"&ac="+window.admicro_analytics_q[v].id,n||clearTimeout(n);n=window.setTimeout(function(){z("p")},2E4)}}}var c=0,d=window.innerHeight,e=-1,g=0,l=[];l=document.querySelectorAll("[data-check-position]");g=l.length;for(var q=[],n,A=0;A<g;A++)q.push(l[A].offsetTop);window.addEventListener("scroll",function(){-1!=e&&clearTimeout(e);e=window.setTimeout(function(){b()},
    1E3)})})}})();
    (function(){if("undefined"==typeof window.ADMPageview)try{window.ADMPageview={pageload:window.__m_admPageloadid||window.__admPageloadid||"",url:window.__m_ADMTrackingSendUrl||"",trackingPopup:function(k,t){""==this.url&&(this.url=window.__m_ADMTrackingSendUrl||"");__m_admPageloadid=(new Date).getTime();window.__admPageloadid=__m_admPageloadid;try{AdmanlaticPopup.open(k,t)}catch(r){}try{var p="";p="undefined"!=typeof _Analytics_Channel&&""!=_Analytics_Channel?"&cat="+encodeURIComponent(decodeURIComponent(_Analytics_Channel)):"undefined"!=
    typeof _ADM_Channel&&""!=_ADM_Channel?"&cat="+encodeURIComponent(decodeURIComponent(_ADM_Channel)):"&cat=";var f=_admProtocol+"//lg1.logging.admicro.vn/ptkm?ce=1&cr="+ADM_TRACKING.getCookie("__create")+"&ui="+ADM_TRACKING.getCookie("__uid")+p+"&dg="+__admloadPageRdIdc+"&fl="+ADM_TRACKING.flashVersion()+"&je="+ADM_TRACKING.je+"&sr="+ADM_TRACKING.sr+"&sc="+ADM_TRACKING.sc+"&hn="+encodeURIComponent(document.domain)+"&p="+encodeURIComponent(k)+"&r="+encodeURIComponent(_admProtocol+"//"+document.domain+
    t)+"&g=0&uid="+ADM_TRACKING.getCookie("fg_uuid")+"&fiv="+ADM_TRACKING.getCookie("fg_version");window.__m_ADMTrackingSendUrl=f;p="&mdl=Null";try{p="&mdl="+encodeURIComponent(ADM_TRACKING.getCookie("model_name").replace(/"/g,""))}catch(r){}var w=new Image;f=window.__m_ADMTrackingSendUrl+"&i="+encodeURIComponent("s;"+__m_admPageloadid+";"+window.__m_ADMScrollcounter+";"+window.__m_ADMScrollEnd+";"+__m_ADMisActive+";"+__m_ADMMouse+";"+__m_ADMTouch+_AdmGetGa())+window.logposurlview+p;try{w.onerror=function(){(new Image).src=
    f.replace("lg1.logging.admicro.vn","amcdn.vn")}}catch(r){}w.src=f}catch(r){}},closePopup:function(){__m_admPageloadid=ADMPageview.pageload;window.__admPageloadid=__m_admPageloadid;__m_ADMTrackingSendUrl=ADMPageview.url;try{AdmanlaticPopup.close()}catch(k){}}}}catch(k){}})();var ADM_PPTKSend=ADM_PPTKSend||{};window.admTrackingParam=window.admTrackingParam||{};
    ADM_PPTKSend.trackingClosePopup=function(){try{__admPageloadid=window.admTrackingParam.pageloadid,__admloadPageId=window.admTrackingParam.__admloadPageId,__AdmsendRandom=window.admTrackingParam.__AdmsendRandom}catch(k){}try{AdmanlaticPopup.close()}catch(k){}};
    ADM_PPTKSend.trackingPopup=function(){try{window.admTrackingParam.pageloadid=window.admTrackingParam.pageloadid||__admPageloadid,window.admTrackingParam.__admloadPageId=window.admTrackingParam.__admloadPageId||__admloadPageId,"undefined"==typeof window.admTrackingParam.__AdmsendRandom&&(window.admTrackingParam.__AdmsendRandom="&lsn="+window.admTrackingParam.pageloadid+ADM_AdsTracking.getParam()),window.admTrackingParam.ispopup=!0,window.__ADM_TrackingSend=!1,window.__admloadPageId=function(){function k(){return Math.floor(65536*
    (1+Math.random())).toString(16).substring(1)}return k()+k()+k()+k()+k()+k()+k()+k()}(),__admPageloadid=(new Date).getTime(),window.__AdmsendRandom="&lsn="+__admPageloadid+ADM_AdsTracking.getParam(),(new Image).src="//lg1.logging.admicro.vn/ftest?dg="+__admloadPageIdc+ADM_AdsTracking.getParam()+"&url="+encodeURIComponent("http://popup"+document.location.hostname+document.location.pathname)+"&rd="+Math.random(),ADM_TrackingSend()}catch(k){}try{AdmanlaticPopup.open()}catch(k){}};
    (function(){if(!window.sendnandatk)try{window.sendnandatk=!0,(new Image).src="//lg.nanda.vn/mapid?src=admicro&dguid="+__admloadPageIdc+"&3guid="+ADM_AdsTracking.get("__uid")}catch(k){}})();