<!--
	作者：lijianlin0204@163.com
	时间：2017-12-04
	描述：教育信息添加修改界面
-->
<div style="padding: 10px;margin-bottom: 60px;">
	<div class="layui-row">
		<div class="mobile-enter-title">
			<h2>2、<?= $title ?></h2>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>起止时间：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="eduStart" title="起止时间" style="font-size: 12px;" class="layui-input" placeholder="" type="text"  must="1" page="1">
	    </div>
	</div>
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>截止时间：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="eduEnd" title="截止时间" style="font-size: 12px;" class="layui-input" placeholder="" type="text"  must="1" page="1">
	    </div>
	</div>
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>在何学校：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="eduSchool" title="在何学校" style="font-size: 12px;" class="layui-input" placeholder="" type="text"  must="1" page="1">
	    </div>
	</div>
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>所学专业：</label></div>
	    <div class="layui-col-xs4">
	      	<select id="eduMajor_pid" title="专业" style="font-size: 12px;" class="layui-input" onchange="change_sub('eduMajor_pid','eduMajor','AJ')"  must="1" page="1">
	    		<option value=""></option>
	    		<?php foreach($codes['AJ'] as $val){ ?>
                 	<option value="<?php echo $val['codeID'] ?>"><?php echo $val['codeName']; ?></option>;
                <?php }; ?>
	    	</select>
	    </div>
	    <div class="layui-col-xs4">
	      	<select id="eduMajor" title="专业" style="font-size: 12px;" class="layui-input"  must="1" page="1">
	    	</select>
	    </div>
	</div>
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star"></span>任职职务：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="eduPost" title="任职职务" style="font-size: 12px;" class="layui-input" placeholder="" type="text"  must="0" page="1">
	    </div>
	</div>
	<!--<div class="layui-row" style="padding:0 0 25px 0;">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star"></span>奖学金及荣誉：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="eduBurseHonorary" title="奖学金及荣誉" style="font-size: 12px;" class="layui-input" placeholder="" type="text"  must="0" page="1">
	    </div>
	</div>-->
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star"></span>奖学金及荣誉称号：</label></div>
	    <div class="layui-col-xs8">
	    	<label class="mobile-input-label3">&nbsp;</label>
	    </div>
	</div>
	<div class="layui-row" style="padding:0 0 25px 0;">
		<div style="margin-left: -2px;">
			<textarea id="eduBurseHonorary" title="奖学金及荣誉称号" style="font-size: 12px;" class="layui-textarea" placeholder="请输入奖学金及荣誉称号" must="0" page="1"></textarea>
		</div>
	</div>
	
	<div class="layui-row">
		<div class="layui-col-xs6">
			<div style="text-align: center;">
			<button id="pre_info2" onclick="save_info2()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 120px;width: 60%;">保存</button></div>
		</div>
		<div class="layui-col-xs6">
			<div style="text-align: center;">
			<button id="next_info2" onclick="cancel_info2()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 120px;width: 60%;">取消</button></div>
		</div>
	</div>
</div>

<script>
var __recID__ = "<?= $recID ?>";
var __eduID__ = "<?= $eduID ?>";
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
    $("#eduStart").mobiscroll($.extend(opt['date'], opt['default']));
    $("#eduEnd").mobiscroll($.extend(opt['date'], opt['default']));
    
    //修改是否默认信息
    <?php if(!empty($eduInfo)){ ?>
    	$("#eduStart").val("<?php echo !empty($eduInfo['eduStart']) ? substr($eduInfo['eduStart'], 0,10) : '' ?>");
    	$("#eduEnd").val("<?php echo !empty($eduInfo['eduEnd']) ? substr($eduInfo['eduEnd'], 0,10) : '' ?>");
    	$("#eduSchool").val("<?php echo $eduInfo['eduSchool'] ?>");
    	var temp_eduMajor = "<?= $eduInfo['eduMajor'] ?>";
		eduMajor_array = temp_eduMajor.split("_");
		$("#eduMajor_pid").val(eduMajor_array[0]);
		change_sub("eduMajor_pid",'eduMajor','AJ');
		$("#eduMajor").val(eduMajor_array[1]);
    	$("#eduPost").val("<?= $eduInfo['eduPost'] ?>");
    	$("#eduBurseHonorary").val("<?= $eduInfo['eduBurseHonorary'] ?>");
    <?php } ?>
});

/*联动信息*/
function change_sub(pid,id,codetype){
	var pvalue = $("#"+pid).val();
	if(pvalue == ""){
		return ;
	}
	$("#"+id).empty();
	
	$.ajax({
		type:"get",
		url:"<?= yii\helpers\Url::to(['zpcx/son-code']); ?>",
		async:false,
		data:{'codePiD':pvalue,'codeTypeID':codetype},
		dataType:'json',
		success:function(data){
			var len = data['selectCodeInfo'].length;
			for(var i = 0; i < len; i++){
				$("#"+id).append('<option value="'+data['selectCodeInfo'][i].codeID+'">'+data['selectCodeInfo'][i].codeName+'</option>');
			}
		}
	});
}

/*取消返回*/
function cancel_info2(){
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry2']); ?>");
}

/*保存教育信息*/
function save_info2(){
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
	
	if($("#eduStart").val()>$("#eduEnd").val()){
		layer.open({content: "起止时间不能大于终止时间",btn: '我知道了'});
		return;
	}
	
	dataObj = {};
	dataObj['eduStart'] = $("#eduStart").val();
	dataObj['eduEnd'] = $("#eduEnd").val();
	dataObj['eduSchool'] = $("#eduSchool").val();
	dataObj['eduMajor'] = $("#eduMajor_pid").val()+"_"+ $("#eduMajor").val();
	dataObj['eduPost'] = $("#eduPost").val();
	dataObj['eduBurseHonorary'] = $("#eduBurseHonorary").val();
	$.ajax({
		type:"post",
		url:"<?= yii\helpers\Url::to(['zpcx/entry2-save']); ?>",
		async:true,
		data:{'recID':__recID__,'eduID':__eduID__,'perID':__perID__,'Edu':dataObj},
		dataType:'json',
		success:function(json){
			if(json.result){
				$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry2']); ?>");
			}else{
				layer.open({content: json.msg,btn: '我知道了'});
			}
		}
	});
}
</script>