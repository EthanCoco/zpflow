/*时间格式化*/
function formatDateTime() {    
    var date = new Date();  
    var y = date.getFullYear();    
    var m = date.getMonth() + 1;    
    m = m < 10 ? ('0' + m) : m;    
    var d = date.getDate();    
    d = d < 10 ? ('0' + d) : d;    
    var h = date.getHours();  
    h = h < 10 ? ('0' + h) : h;  
    var minute = date.getMinutes();  
    var second = date.getSeconds();  
    minute = minute < 10 ? ('0' + minute) : minute;    
    second = second < 10 ? ('0' + second) : second;   
    return y + '-' + m + '-' + d+' '+h+':'+minute+':'+second;    
};

/*显示浮动层*/
function manager_showMore(obj,id){
	 $(".tabsMoreList").hide();
	 objs_idname = $(obj).next();
	if(typeof(id)!='undefined')
		objs_idname = $("#"+id);
	if(objs_idname.css('display')=='none')
	{
		var bottom=$(obj).position().bottom;
		var left=$(obj).position().left;
		objs_idname.css("bottom",bottom);
		objs_idname.css("left",left);
		objs_idname.show();;
		showFlag = true;
		$("body").unbind("click", noneMore_list).bind("click", noneMore_list);
	 }
	 else noneMore_list();
}

/*隐藏浮动层*/
function noneMore_list()
{
	if(!showFlag && objs_idname.css('display')=="block"){
		objs_idname.hide();
		$("body").unbind("click", noneMore_list);
	}
	showFlag = false;
}