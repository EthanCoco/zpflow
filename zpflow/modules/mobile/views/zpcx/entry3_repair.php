<div style="padding: 10px;margin-bottom: 60px;">
	<div class="layui-row">
		<div class="mobile-enter-title">
			<h2>3、<?= $title ?></h2>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>起止时间：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="wkStart" title="起止时间" style="font-size: 12px;" class="layui-input" placeholder="" type="text"  must="1" page="1">
	    </div>
	</div>
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>截止时间：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="wkEnd" title="截止时间" style="font-size: 12px;" class="layui-input" placeholder="" type="text"  must="1" page="1">
	    </div>
	</div>
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star"></span>所在岗位：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="wkPost" title="所在岗位" style="font-size: 12px;" class="layui-input" placeholder="" type="text"  must="0" page="1">
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>所在单位：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="wkCom" title="所在单位" style="font-size: 12px;" class="layui-input" placeholder="" type="text"  must="1" page="1">
	    </div>
	</div>
	<div class="layui-row" style="padding:0 0 25px 0;">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>工作简述：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="wkInfo" title="奖学金及荣誉" style="font-size: 12px;" class="layui-input" placeholder="" type="text"  must="1" page="1">
	    </div>
	</div>
	
	<div class="layui-row">
		<div class="layui-col-xs6">
			<div style="text-align: center;">
			<button id="pre_info2" onclick="save_info3()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 120px;width: 60%;">保存</button></div>
		</div>
		<div class="layui-col-xs6">
			<div style="text-align: center;">
			<button id="next_info2" onclick="cancel_info3()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 120px;width: 60%;">取消</button></div>
		</div>
	</div>
</div>

<script>
var __recID__ = "<?= $recID ?>";
var __wkID__ = "<?= $wkID ?>";
var __perID__ = "<?= $perID ?>";
$(function(){
	var currYear = (new Date()).getFullYear();	
	var opt={};
	opt.date = {preset : 'date'};
	opt.datetime = {preset : 'datetime'};
	opt.time = {preset : 'time'};
	opt.default = {
		theme: 'android-ics light', //皮肤样式
        display: 'modal', //显示方式 
        mode: 'scroller', //日期选择模式
		dateFormat: 'yyyy-mm-dd',
		lang: 'zh',
		showNow: true,
		nowText: "今天",
        startYear: currYear - 117, //开始年份
        endYear: currYear + 40 //结束年份
	};
    $("#wkStart").mobiscroll($.extend(opt['date'], opt['default']));
    $("#wkEnd").mobiscroll($.extend(opt['date'], opt['default']));
    
    <?php if(!empty($workInfo)){ ?>
    	$("#wkStart").val("<?php echo !empty($workInfo['wkStart']) ? substr($workInfo['wkStart'], 0,10) : '' ?>");
    	$("#wkEnd").val("<?php echo !empty($workInfo['wkEnd']) ? substr($workInfo['wkEnd'], 0,10) : '' ?>");
    	$("#wkPost").val("<?php echo $workInfo['wkPost'] ?>");
    	$("#wkCom").val("<?= $workInfo['wkCom'] ?>");
    	$("#wkInfo").val("<?= $workInfo['wkInfo'] ?>");
    <?php } ?>
});

function cancel_info3(){
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry3']);  ?>"+"&recID="+__recID__+"&perID="+__perID__);
}

function save_info3(){
	var isNull = false;
	var errorMsg = "存在必填项未填：<br/>";
	$("[page='1'][must='1']").each(function(){
		var thObjId = $(this).attr('id');
		if($("#"+thObjId).val()==''){
			isNull = true;
			errorMsg += $(this).attr("title");
			return false;
		}
	});
	
	if(isNull){
		layer.open({content: errorMsg,btn: '我知道了'});
		return;
	}
	
	if($("#wkStart").val()>$("#wkEnd").val()){
		layer.open({content: "起止时间不能大于终止时间",btn: '我知道了'});
		return;
	}
	
	dataObj = {};
	dataObj['wkStart'] = $("#wkStart").val();
	dataObj['wkEnd'] = $("#wkEnd").val();
	dataObj['wkPost'] = $("#wkPost").val();
	dataObj['wkCom'] = $("#wkCom").val();
	dataObj['wkInfo'] = $("#wkInfo").val();
	$.ajax({
		type:"post",
		url:"<?= yii\helpers\Url::to(['zpcx/entry3-save']); ?>",
		async:true,
		data:{'recID':__recID__,'wkID':__wkID__,'perID':__perID__,'Work':dataObj},
		dataType:'json',
		success:function(json){
			if(json.result){
				$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry3']);  ?>"+"&recID="+__recID__+"&perID="+__perID__);
			}else{
				layer.open({content: json.msg,btn: '我知道了'});
			}
		}
	});
}
</script>