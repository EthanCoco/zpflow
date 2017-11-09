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
	      		<span id="stepIndex_five_head_pubinfo" style="color: red;"></span>
	      	</label>
	    </div>
	</div>
</div>

<div class="flow4-header-menu" id="flow5_header">
	<a class="current" href="javascript:void(0)" index="1" onclick="changeSetWin_five(1)">
        <font></font>
        <font>体检安排</font>
        <font class="last"></font>
    </a>
    <span><i class="layui-icon" style="color: #1975BE;">&#xe602;</i></span>
    <a href="javascript:void(0)" index="2" onclick="changeSetWin_five(2)">
        <font></font>
        <font>体检录入</font>
        <font class="last"></font>
    </a>
</div>
<div class="layui-body-flow4" id="flow5_content">
    <div id="flow5_content1" name="flow5"></div>
    <div id="flow5_content2" name="flow5"></div>
</div>

<script>
var __flow5_recID__ = "";
var __flow5_show_flag__ = "";
$(function(){
	layui.use('form', function(){
		var form = layui.form;
		form.render('select');
		form.on('select(recID_REC)', function(data){
			__flow5_recID__ = data.value;
			__flow5_show_flag__ = $("#recID_id option:selected").attr("code");
			loadFlow5Info(1);
		});
	});
	__flow5_recID__ = $("#recID_id").val();
	__flow5_show_flag__ = $("#recID_id option:selected").attr("code");
	loadFlow5Info(1);
});

/*切换步骤事件*/
function changeSetWin_five(pos){    
	$("#flow5_content div[name='flow5']").hide();
	$("#flow5_content #flow5_content"+pos).show();
	var obj = $("#flow5_header a[index='"+pos+"']");
	obj.parent().find('a').removeClass('current');
	obj.addClass('current');
	
	//加载对应的div内容
	loadFlow5Info(pos);
}

/*加载考核步骤对应的内容*/
function loadFlow5Info(pos){
	var contentObj = $("#flow5_content #flow5_content"+pos);
	contentObj.empty();
	contentObj.load("<?= yii\helpers\Url::to(['medrange/step']); ?>"+"&index="+pos+"&recID="+__flow5_recID__);
}

function selRecruitID(th){
	__flow5_recID__ = $(th).val();
	__flow5_show_flag__ = $("#recID_id option:selected").attr("code");
	loadFlow5Info(1);
}