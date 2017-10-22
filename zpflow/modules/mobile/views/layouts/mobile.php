<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;

AppAsset::register($this);
$this -> title = '杨浦区储备人才';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app -> language ?>">
<head>
<meta charset="<?= Yii::$app -> charset ?>">
<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=no" />
<style type="text/css"></style>
<?= Html::csrfMetaTags() ?>
<title><?= Html::encode($this -> title) ?></title>
<?php $this->head() ?>
</head>
<body class="big-mobile">
<?php $this->beginBody() ?>
<div class="showDivHeight" >
	<!-- 头部区域开始 -->
	<div class="mobilehead">
		
		<div class="mobilemoremenu" id="moreMenudiv" >
			<ul>
				<li>
				<span><a   class="nobg" >公告资讯</a></span>
				<span><a href="javascript:void(0)" onclick="validateTime()" class="nobg" >招聘查询</a></span>
				<span><a  >常见问题</a></span>
				<span><a  >消息中心</a></span>
				
				<div style="clear:both"></div>
				</li>
		    </ul>
	    </div>
	</div>
	<?php echo $content ?>

	<!-- 内容结束 -->
	<div class="mobilebottom">
		上海市杨浦区人力资源与社会保障局&nbsp;&nbsp;
		<?php if (!Yii::$app->user->isGuest){ ?>	
		  <a href="<?php echo Yii::$app->urlManager->createUrl('mobile/zhuxiao'); ?>" style="float: right;margin-right: 20px;color: #FFFFFF;">注销</a>
		  <a href="<?php echo Yii::$app->urlManager->createUrl('mobile/modpass'); ?>" style="float: right;margin-right: 10px;color: #FFFFFF;">修改密码</a>
		<?php } ?>
	</div>
</div>

<script type="text/javascript">

/**
 * 检验应聘时间
 */
//function validateTime() {
//	$.getJSON('index.php?r=mobile/validate-time', {}, function(json) {
//			if(json.result == '-1') {
//				location.href = "<?php echo Yii::$app->urlManager->createUrl('mobile/myjob') ?>&infopage=2";
//				return;
//			} else if(json.result == '-2') { //不是应聘者
//				layer.alert('您不是应聘者，不能进行该项操作！');
//				return;
//			} else if(json.result == '1') { //应聘者已登录
//				location.href = "<?php echo Yii::$app->urlManager->createUrl('mobile/myjob') ?>&infopage=2";
//	    } else if(json.result == '-3') {
//						location.href = "<?php echo Yii::$app->urlManager->createUrl('mobile/myjob') ?>&infopage=2";
//	    }
//  });
//}
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
