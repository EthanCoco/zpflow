<div style="padding: 10px;margin-bottom: 60px;">
	<div class="layui-row">
		<div class="mobile-enter-title">
			<h2>4、家庭主要成员填写</h2>
	    </div>
	</div>
	
	
	
	
	
	
	
	
	<div class="layui-row">
		<div class="layui-col-xs4">
			<div style="text-align: center;">
			<button id="pre_info4" onclick="pre_info4()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 80px;width: 60%;">上一步</button></div>
		</div>
		<div class="layui-col-xs4">
			<div style="text-align: center;">
			<button onclick="save_info4()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 80px;width: 60%;">保存</button></div>
		</div>
		<div class="layui-col-xs4">
			<div style="text-align: center;">
			<button id="submit_info" onclick="submit_info()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 80px;width: 60%;">提交</button></div>
		</div>
	</div>
</div>


<script>
var __recID__ = "<?= $recID ?>";
var __perID__ = "<?= $perID ?>";
$(function(){

});

function pre_info4(){
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry3']); ?>"+"&recID="+__recID__+"&perID="+__perID__);
}

</script>