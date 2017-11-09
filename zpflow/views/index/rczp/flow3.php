<div class="headinfo">
	<div class="layui-form head-select">
		<div class="layui-inline" style="margin-bottom: 0;">
	      	<label class="layui-form-label" style="width: auto;font-size: 12px;padding: 5px 10px 5px 2px;"><b>招聘批次</b></label>
	      	<div class="layui-input-inline" style="margin-right: 0;width: auto;height: 30px;">
		        <select id="recID_id" name="recID_name" lay-verify="required" class="input1" onchange="selRecruitID(this)">
		          	<?php foreach($pcInfo as $pc){ ?>
			        	<option recend="<?php echo $pc['recend']; ?>" code="<?php echo $pc['code']; ?>" value="<?php echo $pc['id']; ?>"><?php echo $pc['value']; ?></option>
			        <?php } ?>
		        </select>
	      	</div>
	    </div>
	    <div class="layui-inline" style="margin-bottom: 0;">
	    	<label class="layui-form-label" style="width: auto;font-size: 12px;padding: 5px 10px 5px 2px;">
	      		<span id="stepIndex_three_head_pubinfo" style="color: red;"></span>
	      	</label>
	    </div>
	</div>
</div>
<div id="stepIndex_three_search" style="padding:5px">
	<div class="layui-form">
		<div class="layui-form-item" style="margin-bottom: 0;">
		    <div class="layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: auto;font-size: 12px;">姓名</label>
		      	<div class="layui-input-inline" style="margin-right: 0;width: auto;">
		        	<input id="perName" name="perName" class="layui-input">
		      	</div>
		    </div>
		    <div class="layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: auto;font-size: 12px;">性别</label>
		      	<div class="layui-input-inline" style="margin-right: 0;width: auto;">
			        <select id="perGender" name="perGender"  lay-search="">
			          	<option value=""></option>
				        <option value="1">男</option>
				        <option value="2">女</option>
			        </select>
		      	</div>
		    </div>
		    <div class="layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: auto;font-size: 12px;">出生日期</label>
		      	<div class="layui-input-inline" style="margin-right: 0;width: auto;">
		        	<input id="perBirth" name="perBirth" class="layui-input">
		      	</div>
		    </div>
		    <div class="layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: auto;font-size: 12px;">考试反馈结果</label>
		      	<div class="layui-input-inline" style="margin-right: 0;width: auto;">
			        <select id="perReResult1" name="perReResult1"  lay-search="">
			          	<option value=""></option>
				        <option value="01">确定参加</option>
				        <option value="02">放弃参加</option>
				        <option value="03">未反馈</option>
			        </select>
		      	</div>
		    </div>
		    <div class="layui-inline" style="margin-bottom: 0;float: right;">
			  	<div class="layui-btn-group">
				    <button class="layui-btn" id="stepIndex_three_search" onclick="stepIndex_three_search()"><i class="layui-icon">&#xe615;</i></button>
				    <button class="layui-btn layui-btn-primary" id="stepIndex_three_clear" onclick="stepIndex_three_clear()"><i class="layui-icon">&#xe640;</i></button>
			 	</div>
		 	</div>
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

<ul class="tabsMoreList" id="stepIndex_three_perprint" style="margin-left:0px;right:0px;bottom:53px;top:auto">
	<li rel="stepIndex_three_perprint"><a href="javascript:;" onclick="stepIndex_three_perprint(0)" title="打印全部">打印全部</a></li>
	<li rel="stepIndex_three_perprint"><a href="javascript:;" onclick="stepIndex_three_perprint(1)" title="打印全部审核">打印全部审核</a></li>
	<li rel="stepIndex_three_perprint"><a href="javascript:;" onclick="stepIndex_three_perprint(2)" title="打印全部公示人员">打印全部公示人员</a></li>
	<li rel="stepIndex_three_perprint"><a href="javascript:;" onclick="stepIndex_three_perprint(3)" title="打印全部未审核人员">打印全部未审核人员</a></li>
	<li rel="stepIndex_three_perprint"><a href="javascript:;" onclick="stepIndex_three_perprint(4)" title="勾选打印">勾选打印</a></li>

</ul>

<ul class="tabsMoreList" id="stepIndex_three_msgtip" style="margin-left:0px;right:0px;bottom:53px;top:auto">
	<li rel="stepIndex_three_msgtip"><a href="javascript:;" onclick="stepIndex_three_msgtip(0)" title="通知通过人员">通知通过人员</a></li>
	<li rel="stepIndex_three_msgtip"><a href="javascript:;" onclick="stepIndex_three_msgtip(1)" title="通知未通过人员">通知未通过人员</a></li>
	<li rel="stepIndex_three_msgtip"><a href="javascript:;" onclick="stepIndex_three_msgtip(2)" title="通知已审核人员（不包括待审人员）">通知已审核人员</a></li>
	<li rel="stepIndex_three_msgtip"><a href="javascript:;" onclick="stepIndex_three_msgtip(3)" title="通知勾选人员">短信通知勾选人员</a></li>
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
	'__qamexpclm_url' : "<?= yii\helpers\Url::to(['quaexam/expclm-quaexam']); ?>",
	'__qamextrap_url' : "<?= yii\helpers\Url::to(['quaexam/extrap-quaexam']); ?>",
	'__perpub_url' : "<?= yii\helpers\Url::to(['quaexam/perpub-quaexam']); ?>",
	'__pubcheck_url' : "<?= yii\helpers\Url::to(['quaexam/pubck-quaexam']); ?>",
	'__perprint_url' : "<?= yii\helpers\Url::to(['quaexam/perprint-quaexam']); ?>",
	'__qumsendmsg_url' : "<?= yii\helpers\Url::to(['quaexam/sendmsg-quaexam']); ?>",
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
	  	
	  	form.render('select');
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
	layui.use('form', function(){
		var form = layui.form;
		$("#stepIndex_three_search #perName").val("");
		$("#stepIndex_three_search #perGender").val("");
		$("#stepIndex_three_search #perBirth").val("");
		$("#stepIndex_three_search #perReResult1").val("");
		form.render('select');
		init_stepIndex_three_grid(__stepIndex_three_urls__,__stepIndex_three_recID__,__stepIndex_three_tab,__stepIndex_three_show_flag,__stepIndex_three_recend);
	});
}
</script>