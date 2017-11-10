<div class="headinfo">
	<div class="layui-form head-select">
		<div class="layui-inline" style="margin-bottom: 0;">
	      	<label class="layui-form-label" style="width: auto;font-size: 12px;padding: 5px 10px 5px 2px;"><b>招聘批次</b></label>
	      	<div class="layui-input-inline" style="margin-right: 0;width: auto;height: 30px;">
		        <select id="recID_id" name="recID_name" lay-filter="recID_REC" class="input1" onchange="selRecruitID(this)">
		          	<?php foreach($pcInfo as $pc){ ?>
			        	<option defaultplace="<?php echo $pc['recViewPlace']; ?>" recend="<?php echo $pc['recend']; ?>" code="<?php echo $pc['code']; ?>" value="<?php echo $pc['id']; ?>"><?php echo $pc['value']; ?></option>
			        <?php } ?>
		        </select>
	      	</div>
	    </div>
	    <div class="layui-inline" style="margin-bottom: 0;">
	    	<label class="layui-form-label" style="width: auto;font-size: 12px;padding: 5px 10px 5px 2px;">
	      		<span id="stepIndex_four_head_pubinfo" style="color: red;"></span>
	      	</label>
	    </div>
	</div>
</div>

<div class="flow4-header-menu" id="flow4_header">
	<a class="current" href="javascript:void(0)" index="1" onclick="changeSetWin(1)">
        <font></font>
        <font>组别设置</font>
        <font class="last"></font>
    </a>
    <span><i class="layui-icon" style="color: #1975BE;">&#xe602;</i></span>
    <a href="javascript:void(0)" index="2" onclick="changeSetWin(2)">
        <font></font>
        <font>考官管理</font>
        <font class="last"></font>
    </a>
    <span><i class="layui-icon" style="color: #1975BE;">&#xe602;</i></span>
    <a href="javascript:void(0)" index="3" onclick="changeSetWin(3)">
        <font></font>
        <font>考官分组及通知</font>
        <font class="last"></font>
    </a>
    <span><i class="layui-icon" style="color: #1975BE;">&#xe602;</i></span>
    <a href="javascript:void(0)" index="4" onclick="changeSetWin(4)">
        <font></font>
        <font>考生分组及通知</font>
        <font class="last"></font>
    </a>
    <span><i class="layui-icon" style="color: #1975BE;">&#xe602;</i></span>
    <a href="javascript:void(0)" index="5" onclick="changeSetWin(5)">
        <font></font>
        <font>考试结果录入及公示</font>
        <font class="last"></font>
    </a>
</div>
<div class="layui-body-flow4" id="flow4_content">
    <div id="flow4_content1" name="flow4"></div>
    <div id="flow4_content2" name="flow4"></div>
    <div id="flow4_content3" name="flow4"></div>
    <div id="flow4_content4" name="flow4"></div>
    <div id="flow4_content5" name="flow4"></div>
</div>

<script>
var __flow4_recID__ = "";
var __flow4_show_flag__ = "";
var __flow4_recend__ = "";
var __flow4_defaultplace__ = "";
var __flow4_pos__ = 1;
$(function(){
	layui.use('form', function(){
		var form = layui.form;
		form.render('select');
		form.on('select(recID_REC)', function(data){
			__flow4_recID__ = data.value;
			__flow4_show_flag__ = $("#recID_id option:selected").attr("code");
			__flow4_recend__ = $("#recID_id option:selected").attr("recend");
			__flow4_defaultplace__ = $("#recID_id option:selected").attr("defaultplace");
//			loadFlow4Info(1);
			changeSetWin(__flow4_pos__);
		});
	});
	__flow4_recID__ = $("#recID_id").val();
	__flow4_show_flag__ = $("#recID_id option:selected").attr("code");
	__flow4_recend__ = $("#recID_id option:selected").attr("recend");
	__flow4_defaultplace__ = $("#recID_id option:selected").attr("defaultplace");
	loadFlow4Info(1);
});

/*切换步骤事件*/
function changeSetWin(pos){  
	__flow4_pos__ = pos;  
	$("#flow4_content div[name='flow4']").hide();
	$("#flow4_content #flow4_content"+pos).show();
	var obj = $("#flow4_header a[index='"+pos+"']");
	obj.parent().find('a').removeClass('current');
	obj.addClass('current');
	
	if(pos == 4 || pos == 5){
		$("#stepIndex_four_head_pubinfo").css('display','');
	}else{
		$("#stepIndex_four_head_pubinfo").css('display','none');
	}
	//加载对应的div内容
	loadFlow4Info(pos);
}

/*加载考核步骤对应的内容*/
function loadFlow4Info(pos){
	var contentObj = $("#flow4_content #flow4_content"+pos);
	contentObj.empty();
	contentObj.load("<?= yii\helpers\Url::to(['exam/step']); ?>"+"&index="+pos+"&recID="+__flow4_recID__);
}

function selRecruitID(th){
	__flow4_recID__ = $(th).val();
	__flow4_show_flag__ = $("#recID_id option:selected").attr("code");
	__flow4_recend__ = $("#recID_id option:selected").attr("recend");
	__flow4_defaultplace__ = $("#recID_id option:selected").attr("defaultplace");
	loadFlow4Info(1);
}
</script>






