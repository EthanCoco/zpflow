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
<body>
<?php $this->beginBody() ?>
<div style="padding: 10px;">
	<div class="layui-form">
		<div class="layui-form-item">
			<?php if($ancType == 'A'){ ?>
		    <label class="layui-form-label">公告名称</label>
		   	<?php }else{ ?>
		   	<label class="layui-form-label">单位名称</label>
		   	<?php } ?>
		    <div class="layui-input-block">
		      	<?php if($ancType == 'A'){ ?>
			    <input name="ancName" lay-verify="ancName" autocomplete="off" placeholder="请输入公告名称" class="layui-input" type="text">
			   	<?php }else{ ?>
			    <input name="ancName" lay-verify="ancName" autocomplete="off" placeholder="请输入单位名称" class="layui-input" type="text">
			   	<?php } ?>
		    </div>
		</div>
		
		<div class="layui-form-item layui-form-text">
		    <?php if($ancType == 'A'){ ?>
		    <label class="layui-form-label">公告内容</label>
		   	<?php }else{ ?>
		   	<label class="layui-form-label">简介内容</label>
		   	<?php } ?>
		    <div class="layui-input-block">
		      <textarea class="layui-textarea layui-hide" name="ancInfo" lay-verify="content" id="ancInfo"></textarea>
		    </div>
		</div>
		<hr class="layui-bg-gray">
	  	<div class="layui-form-item layui-form-center">
		    <div class="layui-input-block1">
		      	<button id="flow2_repair_save" class="layui-btn" lay-submit>保存</button>
		      	<button id="flow2_repair_pub" class="layui-btn layui-btn-warm" lay-submit>发布</button>
		      	<button id="flow2_repair_cancel" class="layui-btn layui-btn-primary">取消</button>
		    </div>
	  	</div>
	  	
	</div>
</div>
<?php $this->endBody() ?>
<script>
var __flow2_repair_flag__ = "<?php echo $flag; ?>";
var __flow2_repair_ancType__ = "<?php echo $ancType; ?>";
$(function(){
	//alert(__flow2_repair_ancType__);
	if(__flow2_repair_flag__ == "mod"){
	
	}
	
	layui.use(['form','layer','layedit'], function(){
	 	var form = layui.form,
	 		layer = layui.layer,
	 		layedit = layui.layedit;
	 		
	 	layedit.set({
		  	uploadImage: {
		    	url: "<?= Url::to(['index/upload']); ?>", //接口url
		    	type: 'post'
		  	}
		});	
	 		
	 	
		var editIndex = layedit.build('ancInfo');
		
		
		
		
		$("#flow2_repair_cancel").click(function(){
			parent.layer.close(parent.layer.getFrameIndex(window.name));
		});
		
		
		
		
		
	});
});
</script>	
</body>
</html>
<?php $this->endPage() ?>