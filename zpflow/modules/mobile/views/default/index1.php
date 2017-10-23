<div class="layui-row">
	<div class="layui-col-xs6">
    	<div class="mobile-index1-title1">
    		<a index='A' href="javascript:;" onclick="mobile_anc('A')">通知公告</a>
    	</div>
    </div>
	<div class="layui-col-xs6">
		<div class="mobile-index1-title2">
	    	<a index='B' href="javascript:;" onclick="mobile_anc('B')">单位简介</a>
	   </div>
	</div>
</div>

<div class="layui-row">
	<div class="mobile-index1-content">
		<div class="mobile-index1-list" id="mobile-index1-list-info">
		</div>
	</div>
</div>

<script>
var index = <?= $index;?>;
var anc_type = 'A';
$(document).ready(function() {
	mobile_anc_getlist();
	$("#moblie-header span a[index='"+index+"']").addClass('current');
});

function mobile_anc(type){
	anc_type = type;
	$('mobile-index1-title* a').removeClass('color-gg');
	$('a[index="'+type+'"]').addClass('color-gg');
	mobile_anc_getlist();
}

function mobile_anc_getlist(option){
	layui.use('layer',function(){
		if(!option){
			option = {"anc_type":anc_type,"page":"1","rows":"5"};
		}
		$.ajax({
			type:"get",
			url:"<?= yii\helpers\Url::to(['ggzx/anc-list']); ?>",
			dataType:'json',
			data:option,
			async:true,
			success:function(json){
				//alert(JSON.stringify(json));
				var rows = json.rows;
		    	var total = json.total;
		    	var tableObj = $("#mobile-index1-list-info");
		    	//遍历显示数据
	    		tableObj.empty();
	    		replyInfo = {};
	    		
	    		if(total == 0){
	    			tableObj.addClass('current-back');
		    		tableObj.html("<p style='font-size: 15px;text-align:center;font-family:\"微软雅黑\";'>暂无消息！</p>");
	    		}else if(total == 1){
	    			tableObj.removeClass('current-back');
	    			var html = "";
	    			html = "<p class='list-title' >"+rows[0].ancName+"</p>";
		    		var str = "";
		    		if(rows[0].ancTime!='') {
		    			var info = "<span>发布日期："+rows[0].ancTime + "</span>";
		    			str = str==""?info:str+info;
		    		}
		    		if(str!='')
		    		html = html + "<p class='list-subtitle'>"+str+"</p>";
		    		html = html + "<div class='list-content'>"+rows[0].ancInfo+"</div>";
		    		tableObj.html(html);
	    		}else{
	    			tableObj.removeClass('current-back');
	    			var html = "";
				
	    			for(var i = 0;i < total; i++){
	    				var dates = rows[i].ancTime;
	    				if(dates != '' && dates != '0000-00-00 00:00:00'){
	    					var datesArr = dates.split(" ");
	    					dates = datesArr[0];
	    				}
	    				
	    				html = html + "<div class='mobile-table-list'>";
	    				html = html + "<a><div>";
	    				html = html + "<span class='titles'>"+rows[i].ancName+"</span>";
	    				var texts = rows[i].ancInfo;
	    					
	    				html = html + "<p style='word-break:break-all;line-height:20px;text-indent: 20px; padding:0 5px;'>"+texts+"</p>";
	    				html = html + "<p style='text-align:right;color:darkgray;'>"+dates+"</p>";
	    				html = html + "</div></a>";
	    				html = html + "</div>";
			    	}
			    	tableObj.html(html);
			    	//分页效果
			    	//TODO
	    		}
			}
		});
	});
}

</script>