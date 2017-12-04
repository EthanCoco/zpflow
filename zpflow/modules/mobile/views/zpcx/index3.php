<!--
	作者：lijianlin0204@163.com
	时间：2017-12-04
	描述：正在招聘界面
-->
<div style="padding: 10px;margin-bottom: 60px;text-align: center;">
	<p style="padding: 10px;">当前存在<?= $recInfo['recYear'] ?>年，<?= $recInfo['recBatch'] ?>正在招聘......</p>
	<p style="padding: 10px;">报名起始时间：<?= $recInfo['recStart'] ?></p>
	<p style="padding: 10px;">报名截止时间：<?= $recInfo['recEnd'] ?></p>
	<div style="padding: 10px;">
		<button onclick="mobile_entry()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 120px;width: 60%;">前去报名</button></div>
	</div>
</div>

<script>
/*报名*/
function mobile_entry(){
	//加载报名界面
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry']); ?>");
}
</script>