!function(){!function(){$.fn.extend({pagination:function(a){var e={page:"",perPage:9,dataCount:1,perCount:20,url:"",callback:null};for(var i in a)e[i]=a[i];if(""==e.page){var l=location.href.toString().match(/page=([0-9]+)/);l&&l.length>0?e.page=l[1]:e.page=1}var t=parseInt(e.dataCount/e.perCount)+(e.dataCount%e.perCount?1:0),n=parseInt(e.perPage/2),r="";if(r+='<div class="common-pager text-right">',r+='<ul class="pagination">',r+="<li><a >&laquo;</a></li>",t<=e.perPage)for(var o=1;o<=t;o++)r+="<li><a >"+o+"</a></li>";else if(e.page<=n)for(var o=1;o<=e.perPage;o++)r+="<li><a >"+o+"</a></li>";else if(t-e.page<=n)for(var o=1,s=t-e.perPage;s<=t;o++,s++)r+="<li><a >"+s+"</a></li>";else for(var o=1,s=e.page-n;o<=e.perPage;o++,s++)r+="<li><a >"+s+"</a></li>";r+="<li><a >&raquo;</a></li>",r+="</ul>",r+="</div>",$(this).html(r),1==e.page&&$(this).find("li").eq(0).addClass("disabled"),e.page==t&&$(this).find("li").last().addClass("disabled"),$(this).find("a").each(function(){var a=$(this);a.html()==e.page+""&&a.parent().addClass("active")}),$(this).find("a").each(function(){$(this).click(function(){if(!$(this).parent().hasClass("disabled")){var a=$(this).html();if("function"==typeof e.callback){var i={};return i.page=a,void e.callback(i)}if("«"==$(this).html()||"&laquo;"==$(this).html()?a=1:"»"!=$(this).html()&&"&raquo;"!=$(this).html()||(a=t),location.href.toString().match(/page=[0-9]+/))var l=location.href.toString().replace(/page=[0-9]+/,"page="+a);else var l=location.href.indexOf("?")>0?location.href+"&page="+a:location.href+"?page="+a;$.loader(!0),location.href=l}})})}})}(),function(){$.extend($,{loader:function(a){if(1==a){var e='<div id="loader_panel" class="loader-panel">';e+='<i class="fa fa-spinner fa-spin fa-3x"></i>',e+="</div>";var i=$('<div id="loader_block" class="common-loader"></div>');i.append('<div id="loader_mask" class="loader-mask"></div>'),i.append(e),$("body").after(i)}else $("#loader_block").remove()}})}()}();
//# sourceMappingURL=framework.js.map