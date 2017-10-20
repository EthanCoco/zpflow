<div class="headinfo">
	<span><b>招聘批次</b></span>
	<span>
	  	<select id="recID_id" name="recID_name" lay-verify="required" class="input1" onchange="selRecruitID(this)">
		    <?php foreach($pcInfo as $pc){ ?>
	        	<option recend="<?php echo $pc['recend']; ?>" code="<?php echo $pc['code']; ?>" value="<?php echo $pc['id']; ?>"><?php echo $pc['value']; ?></option>
	        <?php } ?>
	 	</select>
	</span>
</div>

<div class="layui-row" id="stepIndex_three_search">
    <div class="layui-col-xs2">
      	<div class="layui-form" style="vertical-align: middle;">
			<div class="layui-form-item layui-inline" style="margin-bottom: 0;">
			    <label class="layui-form-label" style="width: 40px;margin-top: 1px;">姓名</label>
			    <div class="layui-input-block" style="margin-left: 70px;">
			      	<input class="layui-input" id="perName" name="perName" type="text" style="height: 30px;margin-top: 5px;">
			    </div>
		  	</div>
		</div>
    </div>
    <div class="layui-col-xs2">
    	<div class="layui-form-item layui-inline" style="margin-bottom: 0;">
    		<label class="layui-form-label" style="width: 40px;margin-top: 1px;">性别</label>
    		<div class="layui-input-block" style="margin-left: 70px;">
				<select id="perGender" name="perGender" class="input1" style="margin-top: 5px;">
			        <option value=""></option>
			        <option value="1">男</option>
			        <option value="2">女</option>
		      	</select>
	      	</div>
      	</div>
    </div>
    <div class="layui-col-xs2">
    	<div class="layui-form" style="vertical-align: middle;">
	    	<div class="layui-form-item layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: 50px;margin-top: 1px;">出生日期</label>
		      	<div class="layui-input-block" style="margin-left: 80px;">
		        	<input class="layui-input" id="perBirth" name="perBirth" type="text" style="height: 30px;margin-top: 5px;">
		      	</div>
		    </div>
    	</div>
    </div>
    
    <div class="layui-col-xs2">
    	<div class="layui-form-item layui-inline" style="margin-bottom: 0;">
    		<label class="layui-form-label" style="width: 80px;margin-top: 1px;">考试反馈结果</label>
    		<div class="layui-input-block" style="margin-left: 110px;">
				<select id="perReResult1" name="perReResult1" class="input1" style="margin-top: 5px;">
			        <option value=""></option>
			        <option value="01">确定参加</option>
			        <option value="02">放弃参加</option>
			        <option value="03">未反馈</option>
		      	</select>
	      	</div>
      	</div>
    </div>
    
    <div class="layui-col-xs4">
    	<div  style="float: right;margin-right: 10px;margin-top: 2px;">
    	<button id="stepIndex_three_search" onclick="stepIndex_three_search()" class="layui-btn">搜索</button>
      	<button id="stepIndex_three_clear" onclick="stepIndex_three_clear()" class="layui-btn layui-btn-primary">清空</button>
      	</div>
    </div>
</div>
<hr class="layui-bg-blue" style="margin: 1px 0;">
<div class="layui-tab layui-tab-brief" lay-filter="stepIndex_three_tab">
  	<ul class="layui-tab-title" id="stepIndex_three_tab">
	    <li class="layui-this" lay-id="1">待审核<span id="stepIndex_three_tabli1" style="display: none;"></span></li>
	    <li lay-id="2">审核通过<span id="stepIndex_three_tabli2" style="display: none;"></span></li>
	    <li lay-id="3">审核不通过<span id="stepIndex_three_tabli3" style="display: none;"></span></li>
	    <li lay-id="-1">所有<span id="stepIndex_three_tabli4" style="display: none;"></span></li>
  	</ul>
  	<div class="layui-tab-content" style="padding: 0;"> 
	    <div class="layui-tab-item layui-show">
	     	<div id="stepIndex_three">
				
			</div>
	    </div>
  </div>
</div>

<form id="stepIndex_three_exportForm" action="<?= yii\helpers\Url::to(['quaexam/export-quaexam']); ?>" method="post" style="display:none;">
    <input type="text" name="type" />
    <input type="text" name="flag" />
    <input type="text" name="recID" />
    <input type="text" name="condition" />
</form>

<ul class="tabsMoreList" id="stepIndex_three_checklist" style="margin-left:0px;right:0px;bottom:53px;top:auto">
	<li rel="stepIndex_three_checklist"><a href="javascript:;" onclick="stepIndex_three_check(2)" title="审核通过">审核通过</a></li>
	<li rel="stepIndex_three_checklist"><a href="javascript:;" onclick="stepIndex_three_check(3)" title="审核不通过">审核不通过</a></li>
</ul>

<ul class="tabsMoreList" id="stepIndex_three_checkpub" style="margin-left:0px;right:0px;bottom:53px;top:auto">
	<li rel="stepIndex_three_checkpub"><a href="javascript:;" onclick="stepIndex_three_pub(0)" title="公示通过人员">公示通过人员</a></li>
	<li rel="stepIndex_three_checkpub"><a href="javascript:;" onclick="stepIndex_three_pub(1)" title="公示不通过人员">公示不通过人员</a></li>
	<li rel="stepIndex_three_checkpub"><a href="javascript:;" onclick="stepIndex_three_pub(2)" title="全部公示">全部公示</a></li>
	<li rel="stepIndex_three_checkpub"><a href="javascript:;" onclick="stepIndex_three_pub(3)" title="勾选公示">勾选公示</a></li>
</ul> 

<ul class="tabsMoreList" id="stepIndex_three_msgtip" style="margin-left:0px;right:0px;bottom:53px;top:auto">
	<li rel="stepIndex_three_msgtip"><a href="javascript:;" onclick="stepIndex_three_msgtip(0)" title="通知通过人员">通知通过人员</a></li>
	<li rel="stepIndex_three_msgtip"><a href="javascript:;" onclick="stepIndex_three_msgtip(1)" title="通知未通过人员">通知未通过人员</a></li>
	<li rel="stepIndex_three_msgtip"><a href="javascript:;" onclick="stepIndex_three_pub(2)" title="通知已审核人员（不包括待审人员）">通知已已审核人员</a></li>
	<li rel="stepIndex_three_msgtip"><a href="javascript:;" onclick="stepIndex_three_pub(3)" title="通知勾选人员">短信通知勾选人员</a></li>
</ul>

<ul class="tabsMoreList" id="stepIndex_three_export" style="margin-left:0px;right:0px;bottom:53px;top:auto">
	<li rel="stepIndex_three_export"><a href="javascript:;" onclick="stepIndex_three_export(0)" title="导出全部信息">导出全部信息</a></li>
	<li rel="stepIndex_three_export"><a href="javascript:;" onclick="stepIndex_three_export(1)" title="导出自定义信息">导出自定义信息</a></li>
</ul>
<script>
var __stepIndex_three_recID__ = "";
var __stepIndex_three_show_flag = "";
var __stepIndex_three_tab = "1";
var __stepIndex_three_recend = "";
var __stepIndex_three_urls__ = {
	'__list_url' : "<?= yii\helpers\Url::to(['quaexam/list-info']); ?>",
	'__qamstatus_url' : "<?= yii\helpers\Url::to(['quaexam/status-quaexam']); ?>",
	'__qamdetial_url' : "<?= yii\helpers\Url::to(['quaexam/perdetl-quaexam']); ?>",
};

$(function(){
	__stepIndex_three_recID__ = $("#recID_id").val();
	__stepIndex_three_show_flag = $("#recID_id option:selected").attr("code");
	__stepIndex_three_recend = $("#recID_id option:selected").attr("recend");
	init_stepIndex_three_grid(__stepIndex_three_urls__,__stepIndex_three_recID__,__stepIndex_three_tab,__stepIndex_three_show_flag,__stepIndex_three_recend);
	layui.use(['element','layer', 'laydate','form'], function(){
		var element = layui.element,form = layui.form,laydate = layui.laydate;
		laydate.render({
		    elem: '#perBirth',
		    type: 'date',
		});
		
	  	element.on('tab(stepIndex_three_tab)', function(){
		  	if(this.getAttribute('lay-id') != __stepIndex_three_tab){
		  		$("#stepIndex_three_search #perName").val("");
				$("#stepIndex_three_search #perGender").val("");
				$("#stepIndex_three_search #perBirth").val("");
				$("#stepIndex_three_search #perReResult1").val("");
		  	}
		  	__stepIndex_three_tab = this.getAttribute('lay-id');
			init_stepIndex_three_grid(__stepIndex_three_urls__,__stepIndex_three_recID__,__stepIndex_three_tab,__stepIndex_three_show_flag,__stepIndex_three_recend);
	  	});
	});
	
});

function selRecruitID(th){
	__stepIndex_three_recID__ = $(th).val();
	__stepIndex_three_show_flag = $("#recID_id option:selected").attr("code");
	__stepIndex_three_recend = $("#recID_id option:selected").attr("recend");
	init_stepIndex_three_grid(__stepIndex_three_urls__,__stepIndex_three_recID__,__stepIndex_three_tab,__stepIndex_three_show_flag,__stepIndex_three_recend);
}

function stepIndex_three_search(){
	init_stepIndex_three_grid(__stepIndex_three_urls__,__stepIndex_three_recID__,__stepIndex_three_tab,__stepIndex_three_show_flag,__stepIndex_three_recend);
}

function stepIndex_three_clear(){
	$("#stepIndex_three_search #perName").val("");
	$("#stepIndex_three_search #perGender").val("");
	$("#stepIndex_three_search #perBirth").val("");
	$("#stepIndex_three_search #perReResult1").val("");
	init_stepIndex_three_grid(__stepIndex_three_urls__,__stepIndex_three_recID__,__stepIndex_three_tab,__stepIndex_three_show_flag,__stepIndex_three_recend);
}
</script>