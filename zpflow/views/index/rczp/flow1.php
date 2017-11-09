<div class="headinfo">
	<div class="layui-form head-select">
		<div class="layui-inline" style="margin-bottom: 0;">
	      	<label class="layui-form-label" style="width: auto;font-size: 12px;padding: 5px 10px 5px 2px;"><b>招聘年度设置</b></label>
	    </div>
	</div>
</div>
<div id="stepIndex_one">
	
</div>
<script>

var  __stepIndex_one_urls__ = {
		'__list_url' : "<?= yii\helpers\Url::to(['recruit/list-info']); ?>",
		'__repair_url' : "<?= yii\helpers\Url::to(['recruit/repair']); ?>",
		'__recdel_url' : "<?= yii\helpers\Url::to(['recruit/recdel']); ?>",
   	 	'__recpub_url' : "<?= yii\helpers\Url::to(['recruit/pub-recruit']); ?>",
		'__recdel_url' : "<?= yii\helpers\Url::to(['recruit/del-recruit']); ?>",
};

$(function(){
	init_stepIndex_one_grid(__stepIndex_one_urls__);
});
</script>