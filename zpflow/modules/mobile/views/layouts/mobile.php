<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;

AppAsset::register($this);
$this->registerJsFile("@web/js/common/jquery-1.9.1.min.js", ['depends' => ['yii\web\YiiAsset'], 'position' => $this::POS_HEAD]);
$this -> title = 'XXXXX招聘';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app -> language ?>">
<head>
<meta charset="<?= Yii::$app -> charset ?>">
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=no" />-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<style type="text/css"></style>
<?= Html::csrfMetaTags() ?>
<title><?= Html::encode($this -> title) ?></title>
<?php $this->head() ?>
<!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
<!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="bg-mobile" style="height:100%; width: 100%;">
<?php $this->beginBody() ?>
<div class="mobile-content">
	<div class="layui-row" id="moblie-header">
	    <div class="layui-col-xs3">
	    	<div class="mobile-titile">
	    		<span><a  index=1 href="<?= yii\helpers\Url::to(['default/index','index'=>1]); ?>">公告资讯</a></span>
	    	</div>
	    </div>
	    <div class="layui-col-xs3">
	    	<div class="mobile-titile">
	    		<span><a index=2 href="<?= yii\helpers\Url::to(['default/index','index'=>2]); ?>">招聘查询</a></span>
	    	</div>
	    </div>
	    <div class="layui-col-xs3">
	    	<div class="mobile-titile">
	    		<span><a index=3 href="<?= yii\helpers\Url::to(['default/index','index'=>3]); ?>">常见问题</a></span>
	    	</div>
	    </div>
	    <div class="layui-col-xs3">
	    	<div class="mobile-titile">
	    		<span><a index=4 href="<?= yii\helpers\Url::to(['default/index','index'=>4]); ?>">消息中心</a></span>
	    	</div>
	    	
	    </div>
	</div>
	
	<?php echo $content ?>

	<div class="mobile-footer">
		xxxxxxxxxxxxxxxxx&nbsp;&nbsp;
		<?php if (!Yii::$app->user->isGuest){ ?>	
		  <a href="<?php echo Yii::$app->urlManager->createUrl('mobile/zhuxiao'); ?>" style="float: right;margin-right: 20px;color: #FFFFFF;">注销</a>
		  <a href="<?php echo Yii::$app->urlManager->createUrl('mobile/modpass'); ?>" style="float: right;margin-right: 10px;color: #FFFFFF;">修改密码</a>
		<?php } ?>
	</div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
