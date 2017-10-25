<div class="mobile-index2-content-index1">
	
	正在报名 还未报名 前去报名
	<a href="javascript:;" onclick="mobile_entry()">前去报名</a>
</div>

<script>
function mobile_entry(){
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry']); ?>");
}
</script>