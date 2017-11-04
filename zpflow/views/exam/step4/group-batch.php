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
		    <label class="layui-form-label"><span class="star"></span>组别名称</label>
		    <div class="layui-input-block">
		        <select name="perGroupSet" id="perGroupSet" >
			        <option value=""></option>
			        <?php if(!empty($groupInfo)){ ?>
		          		<?php foreach($groupInfo as $info){ ?>
		          			<option value="<?= $info['gcode'] ?>"><?= $info['gname'] ?></option>
		          		<?php } ?>
		          	<?php } ?>
			    </select>
		    </div>
		</div>
	</div>
</div>
<?php $this->endBody() ?>
<script>
var __flow4_step4_group_batch_recID__ = "<?= $recID ?>";
$(function(){
	layui.use(['element','form','layer', 'laydate'], function(){
		var form = layui.form;
		form.render('select');
	});
});

function flow4_step4_group_batch_sure(){
	layui.use('layer',function(){
		var layer = layui.layer;
		var perGroupSet = $("#perGroupSet").val();
		if(perGroupSet == ""){
			return parent.layer.alert("请选择组别信息");
		}
		
		$.post("<?= Url::to(['examinee/examinee-group-batch']); ?>",{'perGroupSet':perGroupSet,'perIDs':parent.__flow4_step4_perIDs__,'recID':__flow4_step4_group_batch_recID__},function(json){
	       if(json.result){
	            parent.layer.msg(json.msg);
	            parent.init_flow4_step4_datagrid();
	            parent.layer.closeAll();
	        }else{
	        	parent.layer.alert(json.msg);
	        }
	    },'json');
	});
}
</script>	
</body>
</html>
<?php $this->endPage() ?>