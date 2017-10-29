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
	<table class="layui-table" lay-skin="nob" lay-size="lg">
  	<colgroup>
	    <col width="120">
	    <col>
  	</colgroup>
	 <tbody>
	    <tr>
	      	<td>选择文件</td>
	      	<td>
	      		<input type="text" id="fileName"  style="display: none;"/>
	      		<button type="button" class="layui-btn" id="step2_file_btn"><i class="layui-icon"></i>选择文件</button>
	      	</td>
	    </tr>
	    <tr id="import_tr_sh" style="display: none;"><td colspan="2"><span id="showhtml"></span></td></tr>
	    <tr>
	      	<td>模板下载</td>
	      	<td><a href="javascript:void(0)" style="text-decoration:underline;color:blue;" onclick='window.open("<?= Url::to(['examiner/examiner-importmb']) ?>");'>考官导入模板.xls</a></td>
	    </tr>
	</tbody>
</table>

</div>
<?php $this->endBody() ?>
<script>
var __step2_import_recID__ = "<?= $recID ?>";	
$(function(){
	$("#fileName").val("");
	$("#showhtml").html("");
	$("#import_tr_sh").css('display','none');
	layui.use(['upload','layer'], function(){
	 	var upload = layui.upload,layer = layui.layer;
	 	upload.render({
		    elem: '#step2_file_btn',
		    url: "<?= Url::to(['examiner/examiner-upexcel']) ?>",
		    accept: 'file',
		    exts: 'xls',
		    size: 1024*1024*2,
		    done: function(res){
		    	if(res.code != '0'){
		        	return layer.msg(res.msg);
		      	}else{
		      		$("#fileName").val(res.data.src);
		      		$("#showhtml").html(res.data.src);
		      		$("#import_tr_sh").css('display','');
		      	}
		    }
		});
	});
});

function step2_import_data_sure(){
	layui.use(['upload','layer'], function(){
	    $.post("<?= Url::to(['examiner/examiner-upexcel-sure']) ?>",{'recID':__step2_import_recID__,'filePath':$("#fileName").val()},function(json){
			if(json.result){
				parent.init_flow4_step2_datagrid();
				parent.layer.msg(json.msg);
				$("#fileName").val("");
				$("#showhtml").html("");
				$("#import_tr_sh").css('display','none');
				parent.layer.close(parent.layer.getFrameIndex(window.name));
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