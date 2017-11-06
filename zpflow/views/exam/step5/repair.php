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
		<div class="layui-form-item" style="display: none;">
		    <div class="layui-input-block">
			    <input name="sttID" id="sttID"  type="hidden">
		    </div>
		</div>
		<div class="layui-form-item">
		    <label class="layui-form-label" style="width: 130px;"><span class="star">*</span>面试成绩占比（%）</label>
		    <div class="layui-input-block">
			    <input name="sttView" id="sttView" style="width: auto;" placeholder="请输入数字" class="layui-input" type="text">
		    </div>
		</div>
		<div class="layui-form-item">
		    <label class="layui-form-label" style="width: 130px;"><span class="star">*</span>笔试成绩占比（%）</label>
		    <div class="layui-input-block">
			    <input name="sttPen" id="sttPen" style="width: auto;" placeholder="请输入数字" class="layui-input" type="text">
		    </div>
		</div>
		<div class="layui-form-item">
		    <label class="layui-form-label" style="width: 130px;"><span class="star">*</span>合格线分数</label>
		    <div class="layui-input-block">
			    <input name="sttFinalScore" id="sttFinalScore" style="width: auto;" placeholder="请输入合格线分数" class="layui-input" type="text">
		    </div>
		</div>
	</div>
</div>
<?php $this->endBody() ?>
<script>
var step5_repair_recID = "<?= $recID ?>";	
$(function(){
	<?php if(!empty($stt_infos)){ ?>
		$("#sttView").val("<?= $stt_infos['sttView'] ?>");
		$("#sttPen").val("<?= $stt_infos['sttPen'] ?>");
		$("#sttFinalScore").val("<?= $stt_infos['sttFinalScore'] ?>");
		$("#sttID").val("<?= $stt_infos['sttID'] ?>");
	<?php } ?>
});

function flow4_step5_stant_line_save (){
	layui.use('layer',function(){
		var layer = layui.layer;
		
      	if(!xy_filedcheckcode_js_checkSelfFloat2($("#sttView").val().trim(),2,'面试成绩占比')){
       	 	return;
      	}
      	if(!xy_filedcheckcode_js_checkSelfFloat2($("#sttPen").val().trim(),2,'笔试成绩占比')){
       	 	return;
      	}
      	if(!xy_filedcheckcode_js_checkSelfFloat2($("#sttFinalScore").val().trim(),2,'合格分数线')){
       	 	return;
      	}
		
		var sttView = $("#sttView").val();
		var sttPen = $("#sttPen").val();
		var sttFinalScore = $("#sttFinalScore").val();
		var sttID = $("#sttID").val()
		
		var msg = "确定要保存么？"
		if((parseFloat(sttView) + parseFloat(sttPen)) != 100){
			msg = "面试成绩占比与笔试成绩占比不等于100%，确定要保存么？";
		}
		
		parent.layer.confirm(msg, function(index){
			$.post("<?= Url::to(['examinee/exam-result-stant-save']) ?>",{'recID':step5_repair_recID,'sttView':sttView,'sttPen':sttPen,'sttFinalScore':sttFinalScore,'sttID':sttID},function(json){
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