<div style="padding: 10px;margin-bottom: 60px;">
	<div class="layui-row">
		<div class="mobile-enter-title">
			<h2>2、学习情况填写</h2>
	    </div>
	</div>
	
	<!--<div id="entry2-base-div">
		
	</div>-->
	<?php if(!empty($eduInfo)){ ?>
		<?php foreach($eduInfo as $edu){ ?>
			<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
			  	<legend>
			  		<div class="layui-btn-group">
					    <button class="layui-btn layui-btn-primary layui-btn-small" onclick="mofiy_edu2('<?php echo $edu['eduID']; ?>')"><i class="layui-icon"></i></button>
					    <button class="layui-btn layui-btn-primary layui-btn-small" onclick="delete_edu2('<?php echo $edu['eduID']; ?>')"><i class="layui-icon"></i></button>
					</div>
			  	</legend>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">起始时间：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $edu['eduStart']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">终止时间：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $edu['eduEnd']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">在何学校：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $edu['eduSchool']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">所学专业：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $edu['eduMajor']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">任职职务：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $edu['eduPost']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">奖学金及荣誉：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $edu['eduBurseHonorary']; ?></span></label>
				    </div>
				</div>
			</fieldset>
		<?php } ?>
	<?php }else{ ?>
		<div class="mobile-index2-content-index1">
			<p style='font-size: 15px;text-align:center;font-family:\"微软雅黑\";'>
				您还没有填写学习情况，报名条件中，必须至少有一条学习情况（从高中起），点击下方添加按钮添加
			</p>
		</div>
	<?php } ?>
	
	
	
	
	<div class="layui-row">
		<div class="layui-col-xs4">
			<div style="text-align: center;">
			<button id="pre_info2" onclick="pre_info2()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 80px;width: 60%;">上一步</button></div>
		</div>
		<div class="layui-col-xs4">
			<div style="text-align: center;">
			<button onclick="add_info2()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 80px;width: 60%;">添加</button></div>
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

function delete_edu2(eduID){
	layer.open({content:'确定要删除么？',btn: ['确定','取消'],yes: function(index){
	      	alert(eduID);
	      	layer.close(index);
	    }
	});
}


function pre_info2(){
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry']); ?>");
}

function next_info2(){
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry3']); ?>");
}
</script>