<div class="headinfo">
	<span><b>招聘年度设置</b></span>
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