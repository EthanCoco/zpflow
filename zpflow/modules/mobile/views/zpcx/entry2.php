<div style="padding: 10px;margin-bottom: 60px;">
	<div class="layui-row">
		<div class="mobile-enter-title">
			<h2>2、学习情况填写</h2>
	    </div>
	</div>
	
	
	
	
	
	
	
	
	<div class="layui-row">
		<div class="layui-col-xs4">
			<div style="text-align: center;">
			<button id="pre_info2" onclick="pre_info2()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 80px;width: 60%;">上一步</button></div>
		</div>
		<div class="layui-col-xs4">
			<div style="text-align: center;">
			<button onclick="save_info2()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 80px;width: 60%;">保存</button></div>
		</div>
		<div class="layui-col-xs4">
			<div style="text-align: center;">
			<button id="next_info2" onclick="next_info2()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 80px;width: 60%;">下一步</button></div>
		</div>
	</div>
</div>


<script>
var __entey_perID = "";
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
  	//$("#perBirth").mobiscroll($.extend(opt['date'], opt['default']));
  	
});

function pre_info2(){
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry']); ?>");
}

function next_info2(){
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry3']); ?>");
}
</script>