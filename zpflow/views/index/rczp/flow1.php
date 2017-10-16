<div class="headinfo">
	<span><b>招聘年度设置</b></span>
</div>
<div id="stepIndex_one">
	
</div>
<script>

var __list_url = "<?= yii\helpers\Url::to(['recruit/list-info']); ?>",
	__repair_url = "<?= yii\helpers\Url::to(['recruit/repair']); ?>",
	__recdel_url = "<?= yii\helpers\Url::to(['recruit/recdel']); ?>";

$(function(){
	init_stepIndex_one_grid(__list_url,__repair_url,__recdel_url);
});
</script>