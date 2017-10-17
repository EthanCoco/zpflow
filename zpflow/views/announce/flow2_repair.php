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
});
</script>	
</body>
</html>
<?php $this->endPage() ?>