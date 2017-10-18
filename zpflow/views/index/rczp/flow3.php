<div class="headinfo">
	<span><b>招聘批次</b></span>
	<span>
	  	<select id="recID_id" name="recID_name" lay-verify="required" class="input1" onchange="selRecruitID(this)">
		    <?php foreach($pcInfo as $pc){ ?>
	        	<option code="<?php echo $pc['code']; ?>" value="<?php echo $pc['id']; ?>"><?php echo $pc['value']; ?></option>
	        <?php } ?>
	 	</select>
	</span>
</div>
<div class="layui-tab layui-tab-brief" lay-filter="stepIndex_three_tab">
  	<ul class="layui-tab-title">
	    <li class="layui-this" lay-id="1">待审核</li>
	    <li lay-id="2">审核通过</li>
	    <li lay-id="3">审核不通过</li>
	    <li lay-id="-1">所有</li>
  	</ul>
  	<div class="layui-tab-content"> 
	    <div class="layui-tab-item layui-show">
	     	<div id="stepIndex_three">
				
			</div>
	    </div>
  </div>
</div>

<script>
var __stepIndex_three_recID__ = "";
var __stepIndex_three_show_flag = "";
var __stepIndex_three_tab = "";
var __stepIndex_three_tab = "0";
var __stepIndex_three_urls__ = {
	'__list_url' : "<?= yii\helpers\Url::to(['quaexam/list-info']); ?>",
	'__recpub_url' : "<?= yii\helpers\Url::to(['quaexam/pub-quaexam']); ?>",
	'__recdel_url' : "<?= yii\helpers\Url::to(['quaexam/del-quaexam']); ?>",
};

$(function(){
	__stepIndex_three_recID__ = $("#recID_id").val();
	__stepIndex_three_show_flag = $("#recID_id option:selected").attr("code");
	
	$("#stepIndex_three").html("待审核");
	layui.use(['element','layer', 'laydate'], function(){
		var element = layui.element;
		  	element.on('tab(stepIndex_three_tab)', function(){
		  	__stepIndex_three_tab = this.getAttribute('lay-id');
	  	});
	});
});

function selRecruitID(th){
	__stepIndex_three_recID__ = $(th).val();
	__stepIndex_three_show_flag = $("#recID_id option:selected").attr("code");
}
</script>