<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
AppAsset::register($this);
$this->registerJsFile("@web/js/common/jquery-1.9.1.min.js", ['depends' => ['yii\web\YiiAsset'], 'position' => $this::POS_HEAD]);
$this->title = '';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?= Html::csrfMetaTags() ?>
<title><?= Html::encode($this->title) ?></title>
<?php $this->head() ?>
</head>
<style>
	.layui-form-radio span {
	    font-size: 12px;
	}
</style>
<body>
<?php $this->beginBody() ?>
<div>
	<div class="layui-form">
		<fieldset class="layui-elem-field layui-field-title">
		  	<legend>审核通过公示额外通知信息设置</legend>
		  	<div class="layui-form-item">
		    	<label class="layui-form-label">信息位置</label>
			    <div class="layui-input-block">
			      	<input name="qraPassType" value="2" title="追加后面" checked="" type="radio">
			      	<input name="qraPassType" value="1" title="追加前面" type="radio">
			      	<input name="qraPassType" value="3" title="追加前面并换" type="radio">
			      	<input name="qraPassType" value="4" title="追加后面并换行" type="radio">
			      	<input name="qraPassType" value="5" title="重新编辑通知信息（换行已@字符分割）" type="radio">
			    </div>
		  	</div>
			<div class="layui-form-item layui-form-text">
			    <label class="layui-form-label">通过公示<br/>额外信息</label>
			    <div class="layui-input-block">
			      <textarea id="qraPassMsg" class="layui-textarea"></textarea>
			    </div>
		  	</div>
		</fieldset>
		
		<fieldset class="layui-elem-field layui-field-title">
		  	<legend>审核不通过公示额外通知信息设置</legend>
		  	<div class="layui-form-item">
		    	<label class="layui-form-label">信息位置</label>
			    <div class="layui-input-block">
			      	<input name="qraNoPassType" value="2" title="追加后面" checked="" type="radio">
			      	<input name="qraNoPassType" value="1" title="追加前面" type="radio">
			      	<input name="qraNoPassType" value="3" title="追加前面并换" type="radio">
			      	<input name="qraNoPassType" value="4" title="追加后面并换行" type="radio">
			      	<input name="qraNoPassType" value="5" title="重新编辑通知信息（换行已@字符分割）" type="radio">
			    </div>
		  	</div>
			<div class="layui-form-item layui-form-text">
			    <label class="layui-form-label">不通过公示<br/>额外信息</label>
			    <div class="layui-input-block">
			      <textarea id="qraNoPassMsg" class="layui-textarea"></textarea>
			    </div>
		  	</div>
		</fieldset>
		
	</div>
</div>
<?php $this->endBody() ?>
<script>
var __stepIndex_three_flow3_recID = "<?php echo $recID; ?>";
$(function(){
	layui.use(['form','jquery'], function(){
	 	var form = layui.form;
	 	$ = layui.jquery;
	 	<?php if(!empty($infos)){ ?>
			$("#qraPassMsg").val("<?php echo $infos['qraPassMsg'] ?>");
			$("input[name='qraPassType'][value='<?php echo $infos["qraPassType"] ?>']").attr('checked',true);
			$("#qraNoPassMsg").val("<?php echo $infos['qraNoPassMsg'] ?>");
			$("input[name='qraNoPassType'][value='<?php echo $infos["qraNoPassType"] ?>']").attr('checked',true);
			form.render();
		<?php } ?>
	});
});

function stepIndexThreeExtraset(){
	layui.use(['form','jquery','layer'], function(){
	 	var form = layui.form;
	 	var layer = layui.layer;
	 	$ = layui.jquery;
	 	var qraPassMsg = $("#qraPassMsg").val().trim();
	 	var qraPassType = $("input[name='qraPassType']:checked").val();
	 	var qraNoPassMsg = $("#qraNoPassMsg").val().trim();
	 	var qraNoPassType = $("input[name='qraNoPassType']:checked").val();
	 	
	 	if(qraPassMsg == "" && qraNoPassMsg == ""){
	 		parent.layer.alert("没有设置任何信息");
	 		return;
	 	}
	 	
	 	parent.layer.confirm('您确定要保存么', function(index){
		  	$.post("<?= Url::to(['quaexam/save-extra-quaexam']); ?>",{'recID':__stepIndex_three_flow3_recID,'qraPassType':qraPassType,'qraPassMsg':qraPassMsg,'qraNoPassType':qraNoPassType,'qraNoPassMsg':qraNoPassMsg},function(json){
				if(json.result){
					parent.layer.msg(json.msg);
					parent.layer.closeAll();
				}else{
					parent.layer.alert(json.msg);
				}
			},'json');
		}); 
	});	
}


</script>	
</body>
</html>
<?php $this->endPage() ?>