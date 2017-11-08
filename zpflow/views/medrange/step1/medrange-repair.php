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
		    <label class="layui-form-label"><span class="star">*</span>体检开始时间</label>
		    <div class="layui-input-block">
			    <input name="medStartTime" id="medStartTime" placeholder="请输入体检开始时间" class="layui-input" type="text">
		    </div>
		</div>
		<div class="layui-form-item">
		    <label class="layui-form-label"><span class="star">*</span>体检截止时间</label>
		    <div class="layui-input-block">
			    <input name="medEndTime" id="medEndTime" placeholder="请输入体检截止时间" class="layui-input" type="text">
		    </div>
		</div>
		<div class="layui-form-item">
		    <label class="layui-form-label"><span class="star">*</span>体检地点</label>
		    <div class="layui-input-block">
			    <input name="medPlace" id="medPlace" placeholder="请输入体检地点" class="layui-input" type="text">
		    </div>
		</div>
	</div>
</div>
<?php $this->endBody() ?>
<script>
var flow5_step1_med_repair_recID = "<?= $recID ?>";	
var flow5_step1_med_repair_medID = "";
$(function(){
	layui.use(['element','form','layer', 'laydate'], function(){
		var form = layui.form;
		var laydate = layui.laydate;
		
		laydate.render({
		    elem: '#medStartTime',
		    type: 'datetime',
		});
		laydate.render({
		    elem: '#medEndTime',
		    type: 'datetime',
		});
		
		<?php if(!empty($medinfo)){ ?>
			$("#medStartTime").val("<?= $medinfo['medStartTime'] ?>");
			$("#medEndTime").val("<?= $medinfo['medEndTime'] ?>");
			$("#medPlace").val("<?= $medinfo['medPlace'] ?>");
			flow5_step1_med_repair_medID = "<?= $medinfo['medID'] ?>";
		<?php } ?>
	});
});

function flow5_step1_range_medical_save(){
	layui.use('layer',function(){
		var layer = layui.layer;
		var medStartTime = $("#medStartTime").val();
		var medEndTime = $("#medEndTime").val();
		var medPlace = $("#medPlace").val().trim();
		
      	if(medStartTime == ""){
       	 	return layer.msg('体检开始时间不能为空',{icon: 5,anim:6});
      	}
      	if(medEndTime == ""){
       	 	return layer.msg('体检截止时间不能为空',{icon: 5,anim:6});
      	}
      	if(medEndTime < medStartTime){
       	 	return layer.msg('截止时间不能小于开始时间',{icon: 5,anim:6});
      	}
	    if(medPlace == ""){
       	 	return layer.msg('体检地点不能为空',{icon: 5,anim:6});
      	}
		
		parent.layer.confirm('您确定安排保存么？', function(index){
			$.post("<?= Url::to(['medrange/range-medical-fs1-save']) ?>",{
					'recID':flow5_step1_med_repair_recID,
					'medID':flow5_step1_med_repair_medID,
					'medStartTime':medStartTime,
					'medEndTime':medEndTime,
					'medPlace':medPlace
				},function(json){
				if(json.result){
					parent.init_flow5_step1_datagrid();
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