<div class="layui-row">
	<div class="layui-col-xs6">
    	<div class="mobile-index1-title1 mobile-index1-color-gg">
    		<a index='A' href="javascript:;" class="color-gg" onclick="mobile_anc('A')">通知公告</a>
    	</div>
    </div>
	<div class="layui-col-xs6">
		<div class="mobile-index1-title2 mobile-index1-color-gg">
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
<div class="layui-row" id="mobile-index1-page-info" style="display: none;text-align: right;padding-right: 10px;margin-bottom: 30px;">
</div>

<!--<div class="layui-row" id="mobile-index1-detail" style="display: none;text-align: right;padding-right: 10px;margin-bottom: 80px;">
		<a href="../index/show.php?menupid=2&menuid=4&articleid=122" >首篇</a>
	    <a href="../index/show.php?menupid=2&menuid=4&articleid=121" >上篇</a>
	    <a href="../index/show.php?menupid=2&menuid=4&arrrticleid=119" >下篇</a>
	    <a href="../index/show.php?menupid=2&menuid=4&articleid=100" >末篇</a>
</div>-->

<script>
var index = <?= $index;?>;
var anc_type = 'A';
var anc_current_page = 1;
$(document).ready(function() {
	mobile_anc_getlist();
	$("#moblie-header span a[index='"+index+"']").addClass('current');
});

function mobile_anc(type){
	anc_type = type;
	$('.mobile-index1-color-gg a').removeClass('color-gg');
	$('a[index="'+type+'"]').addClass('color-gg');
	mobile_anc_getlist();
}

function mobile_anc_getlist(option){
	layui.use(['layer','laypage'],function(){
		 var laypage = layui.laypage;
		if(!option){
			option = {"anc_type":anc_type,"page":anc_current_page,"rows":"5"};
		}
		$.ajax({
			type:"get",
			url:"<?= yii\helpers\Url::to(['ggzx/anc-list']); ?>",
			dataType:'json',
			data:option,
			async:true,
			success:function(json){
//				$("#mobile-index1-detail").css('display','none');
				var rows = json.rows;
		    	var total = json.total;
		    	var tableObj = $("#mobile-index1-list-info");
		    	//遍历显示数据
	    		tableObj.empty();
	    		replyInfo = {};
	    		
	    		if(total == 0){
	    			$("#mobile-index1-page-info").css('display','none');
	    			tableObj.addClass('current-back');
		    		tableObj.html("<p style='font-size: 15px;text-align:center;font-family:\"微软雅黑\";'>暂无消息！</p>");
	    		}else if(total == 1){
	    			$("#mobile-index1-page-info").css('display','none');
	    			tableObj.removeClass('current-back');
	    			var html = "";
	    			html = "<p class='list-title' >"+rows[0].ancName+"</p>";
		    		var str = "";
		    		if(rows[0].ancTime!='') {
		    			var info = "<span>发布日期："+rows[0]['ancTime'] + "</span>";
		    			str = str==""?info:str+info;
		    		}
		    		if(str!='')
		    		html = html + "<p class='list-subtitle'>"+str+"</p>";
		    		html = html + "<div class='list-content'>"+rows[0].ancInfo+"</div>";
		    		tableObj.html(html);
	    		}else{
	    			tableObj.removeClass('current-back');
	    			var html = "";
	    			var len = rows.length;
	    			for(var i = 0;i < len; i++){
	    				var dates = rows[i].ancTime;
	    				if(dates != '' && dates != '0000-00-00 00:00:00'){
	    					var datesArr = dates.split(" ");
	    					dates = datesArr[0];
	    				}
	    				var dt_url = "<?= yii\helpers\Url::to(['ggzx/anc-one']);?>"+"&ancID="+rows[i].ancID+"&ancType="+rows[i].ancType;
	    				html = html + "<div class='mobile-table-list'>";
	    				html = html + "<a href='javascript:;' onclick=detail_anc_info("+rows[i].ancID+",'"+rows[i].ancType+"')><div>";
	    				html = html + "<span class='titles'>"+rows[i].ancName+"</span>";
	    				var texts = rows[i].ancInfo;
	    					
	    				html = html + "<p style='word-break:break-all;line-height:20px;text-indent: 20px; padding:0 5px;'>"+texts+"</p>";
	    				html = html + "<p style='text-align:right;color:darkgray;'>"+dates+"</p>";
	    				html = html + "</div></a>";
	    				html = html + "</div>";
			    	}
			    	tableObj.html(html);
			    	//分页效果
			    	if(total <= 5){
			    		$("#mobile-index1-page-info").css('display','none');
			    	}else{
			    		$("#mobile-index1-page-info").css('display','block');
			    		laypage.render({
						  	elem: 'mobile-index1-page-info',
						  	count: total,
						  	curr: json.current_page,
						  	jump: function(obj, first){
						    	anc_current_page = obj.curr; 
							    //首次不执行
							    if(!first){
							      	mobile_anc_getlist({"anc_type":anc_type,"page":anc_current_page,"rows":"5"});
							    }
						  	}
						});
			    		
			    	}	
	    		}
			}
		});
	});
}

function detail_anc_info(ancID,ancType){
	$.ajax({
		type:"get",
		url:"<?= yii\helpers\Url::to(['ggzx/anc-one']);?>",
		async:true,
		dataType:'json',
		data:{'ancID':ancID,'ancType':ancType},
		success:function(json){
			var tableObj = $("#mobile-index1-list-info");
    		tableObj.empty();
			$("#mobile-index1-page-info").css('display','none');
//			$("#mobile-index1-detail").css('display','block');
			tableObj.removeClass('current-back');
			var html = "";
			html = "<p class='list-title' >"+json['info'].ancName+"</p>";
    		var str = "";
    		if(json.ancTime!='') {
    			var info = "<span>发布日期："+json['info']['ancTime'] + "</span>";
    			str = str==""?info:str+info;
    		}
    		if(str!='')
    		html = html + "<p class='list-subtitle'>"+str+"</p>";
    		html = html + "<div class='list-content'>"+json['info'].ancInfo+"</div>";
    		tableObj.html(html);
		}
	});
}


</script>