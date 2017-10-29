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
	      		<input id="fileName" name="fileName" type="text" class="input1" style="display:none"/>
	        	<input id="file_upload" name="file_upload" type="file" multiple="false">
	      	</td>
	    </tr>
	    <tr>
	      	<td>模板下载</td>
	      	<td><a href="javascript:void(0)" style="text-decoration:underline;color:blue;" onclick='window.open("<?= Url::to(['examiner/examiner-importmb']) ?>");'>考官导入模板.xls</a></td>
	    </tr>
	</tbody>
</table>
</div>
<?php $this->endBody() ?>
<script>
var step2_import_recID = "<?= $recID ?>";	
$(function(){
	
});
</script>	
</body>
</html>
<?php $this->endPage() ?>