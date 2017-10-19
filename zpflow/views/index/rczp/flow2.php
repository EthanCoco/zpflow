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
<div class="layui-tab layui-tab-brief" lay-filter="stepIndex_two_tab">
  	<ul class="layui-tab-title">
	    <li class="layui-this" lay-id="A">招聘公告</li>
	    <li lay-id="B">单位简介</li>
  	</ul>
  	<div class="layui-tab-content" style="padding: 0;">
	    <div class="layui-tab-item layui-show">
	     	<div id="stepIndex_two_A">
	
			</div>
	    </div>
    	<div class="layui-tab-item">
    		<div id="stepIndex_two_B">
	
			</div>
    	</div>
  </div>
</div>


<script>
var __stepIndex_two_recID__ = "";
var __stepIndex_two_datagrid_flag = "A";
var __stepIndex_two_show_flag = "";
var __stepIndex_two_urls__ = {
	'__list_url' : "<?= yii\helpers\Url::to(['announce/list-info']); ?>",
	'__repair_url' : "<?= yii\helpers\Url::to(['announce/repair']); ?>",
	'__recpub_url' : "<?= yii\helpers\Url::to(['announce/pub-announce']); ?>",
	'__recdel_url' : "<?= yii\helpers\Url::to(['announce/del-announce']); ?>",
	'__recpre_url' : "<?= yii\helpers\Url::to(['announce/view-announce']) ?>",
};
$(function(){
	__stepIndex_two_recID__ = $("#recID_id").val();
	__stepIndex_two_show_flag = $("#recID_id option:selected").attr("code");
	init_stepIndex_two_grid_AB(__stepIndex_two_urls__,__stepIndex_two_recID__,__stepIndex_two_datagrid_flag,__stepIndex_two_show_flag);
	layui.use(['element','layer', 'laydate'], function(){
		var element = layui.element;
		  	element.on('tab(stepIndex_two_tab)', function(){
	    	__stepIndex_two_datagrid_flag = this.getAttribute('lay-id');
	    	init_stepIndex_two_grid_AB(__stepIndex_two_urls__,__stepIndex_two_recID__,__stepIndex_two_datagrid_flag,__stepIndex_two_show_flag);
	  	});
	});
});

function selRecruitID(th){
	__stepIndex_two_recID__ = $(th).val();
	__stepIndex_two_show_flag = $("#recID_id option:selected").attr("code");
	init_stepIndex_two_grid_AB(__stepIndex_two_urls__,__stepIndex_two_recID__,__stepIndex_two_datagrid_flag,__stepIndex_two_show_flag);
}


</script>