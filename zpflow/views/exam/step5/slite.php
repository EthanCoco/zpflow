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
<style>
	.star{color:red;}
</style>
</head>
<body>
<?php $this->beginBody() ?>
<div style="padding: 10px;">
	<div class="layui-form">
		<div class="layui-form-item">
		    <label class="layui-form-label"><span class="star"></span>考试结果</label>
		    <div class="layui-input-block">
		        <select name="perExamResult" id="perExamResult">
			        <option value="1">通过</option>
			        <option value="2">不通过</option>
			    </select>
		    </div>
		</div>
	</div>
</div>
<?php $this->endBody() ?>
<script>
var __flow4_step5_slite_result_recID__ = "<?= $recID ?>";	
$(function(){
	layui.use('form', function(){
		var form = layui.form;
		
	});
});

function flow4_step5_slite_result_sure (){
	layui.use('layer',function(){
		var layer = layui.layer;
		var perExamResult = $("#perExamResult").val();
      	parent.layer.confirm('确定要微调选择的人员么？',function(index){
      		$.post("<?= Url::to(['examinee/exam-result-slite']) ?>",{'recID':__flow4_step5_slite_result_recID__,'perIDs':parent.__flow4_step5_slite_result_perIDs__,'perExamResult':perExamResult},function(json){
      			if(json.result){
      				parent.init_flow4_step5_datagrid();
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