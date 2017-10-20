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
		.td{text-align:center;height:auto;}
		.td1{text-align:center;height:auto;font-weight: bold;}
	</style>
</head>
<body>
<?php $this->beginBody() ?>
<div style="padding: 10px;">
	<div style="text-align: center;font-size: 24px;font-weight: bold;margin-bottom: 10px;">
		XXXX年XXXXXXX单位人才报名表
	</div>
	<table class="layui-table">
	    <tbody>
	    	<tr>
		      	<td class="td1">姓名</td><td class="td"><?= $base['perName'] ?></td>
		      	<td class="td1">性别</td><td class="td"><?= $base['perGender'] ?></td>
		      	<td class="td1">出生年月</td><td class="td"><?= $base['perBirth'] ?></td>
		      	<td class="td1" rowspan="3" width="120px"><img src="<?= $base['perPhoto'] ?>" /></td>
		    </tr>
		    <tr>
		      	<td class="td1">籍贯</td><td class="td"><?= $base['perOrigin'] ?></td>
		      	<td class="td1">民族</td><td class="td"><?= $base['perNation'] ?></td>
		      	<td class="td1">政治面貌</td><td class="td"><?= $base['perPolitica'] ?></td>
		    </tr>
		    <tr>
		      	<td class="td1">学历</td><td class="td"><?= $base['perEducation'] ?></td>
		      	<td class="td1">学位</td><td class="td"><?= $base['perDegree'] ?></td>
		      	<td class="td1">婚姻状况</td><td class="td"><?= $base['perMarried'] ?></td>
		    </tr>
		    <tr>
		      	<td class="td1">外语水平</td><td class="td"><?= $base['perForeignLang'] ?></td>
		      	<td class="td1">计算机水平</td><td class="td"><?= $base['perComputerLevel'] ?></td>
		      	<td class="td1">毕业生生源地</td><td class="td" colspan="2"><?= $base['perEduPlace'] ?></td>
		    </tr>
		    <tr>
		      	<td class="td1" colspan="2">毕业院校及专业</td><td class="td" colspan="2"><?= $base['perUniversity'] ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= $base['perMajor'] ?></td>
		      	<td class="td1" colspan="2">应聘岗位性质</td><td class="td"><?= $base['perJob'] ?></td>
		    </tr>
		    <tr>
		      	<td class="td1">联系电话</td><td class="td"><?= $base['perPhone'] ?></td>
		      	<td class="td1">电子邮箱</td><td class="td"><?= $base['perEmail'] ?></td>
		      	<td class="td1">邮政编码</td><td class="td" colspan="2"><?= $base['perPostCode'] ?></td>
		    </tr>
		    
		    <tr>
		      	<td class="td1" colspan="2">联系地址</td><td class="td" colspan="5"><?= $base['perAddr'] ?></td>
		    </tr>
		    <tr><td class="td" colspan="7"><hr class="layui-bg-gray"></td></tr>
		    <tr>
		    	<td class="td1" rowspan="<?= count($eduset) == 0 ? 2 : (count($eduset)+1); ?>">学习情况</td>
		    	<td class="td1" colspan="2">起止年月</td>
		    	<td class="td1">在何学校</td>
		    	<td class="td1">所学专业</td>
		    	<td class="td1">任职职务</td>
		    	<td class="td1">奖学金及荣誉称号</td>
		    </tr>
	    	<?php if(!empty($eduset)){ ?>
	    		<?php foreach($eduset as $edu){ ?>
	    			<tr>
						<td class="td" colspan="2"><?php echo $edu['eduStart']."-".$edu['eduEnd'] ?></td>
				    	<td class="td"><?php echo $edu['eduSchool'] ?></td>
				    	<td class="td"><?php echo $edu['eduMajor'] ?></td>
				    	<td class="td"><?php echo $edu['eduPost'] ?></td>
				    	<td class="td"><?php echo $edu['eduPost'] ?></td>
			    	</tr>
				<?php }	?>
	    	<?php }else{?>
	    		<tr><td class="td" colspan="6">暂无信息</td></tr>
	    	<?php } ?>
		    <tr><td class="td" colspan="7"><hr class="layui-bg-gray"></td></tr>
		    <tr>
		    	<td class="td1" rowspan="<?= count($workset) == 0 ? 2 : (count($workset)+1); ?>">工作经历</td>
		    	<td class="td1">起始时间</td>
		    	<td class="td1">截止时间</td>
		    	<td class="td1">所在岗位</td>
		    	<td class="td1">所在单位</td>
		    	<td class="td1" colspan="2">工作简述</td>
		    </tr>
	    	<?php if(!empty($workset)){ ?>
	    		<?php foreach($workset as $work){ ?>
	    			<tr>
						<td class="td"><?php echo $work['wkStart'] ?></td>
				    	<td class="td"><?php echo $work['wkEnd'] ?></td>
				    	<td class="td"><?php echo $work['wkPost'] ?></td>
				    	<td class="td"><?php echo $work['wkCom'] ?></td>
				    	<td class="td" colspan="2"><?php echo $work['wkInfo'] ?></td>
			    	</tr>
				<?php }	?>
	    	<?php }else{?>
	    		<tr><td class="td" colspan="6">暂无信息</td></tr>
	    	<?php } ?>
		    <tr><td class="td" colspan="7"><hr class="layui-bg-gray"></td></tr>
		    <tr>
		    	<td class="td1" rowspan="<?= count($famset) == 0 ? 2 : (count($famset)+1); ?>">家庭成员</td>
		    	<td class="td1">成员关系</td>
		    	<td class="td1">成员姓名</td>
		    	<td class="td1" colspan="2">所在工作单位</td>
		    	<td class="td1" colspan="2">任职岗位</td>
		    </tr>
	    	<?php if(!empty($famset)){ ?>
	    		<?php foreach($famset as $fam){ ?>
	    			<tr>
						<td class="td"><?php echo $fam['famRelation'] ?></td>
				    	<td class="td"><?php echo $fam['famName'] ?></td>
				    	<td class="td" colspan="2"><?php echo $fam['famCom'] ?></td>
				    	<td class="td" colspan="2"><?php echo $fam['famPost'] ?></td>
			    	</tr>
				<?php }	?>
	    	<?php }else{?>
	    		<tr><td class="td" colspan="6">暂无信息</td></tr>
	    	<?php } ?>
		    <tr><td class="td" colspan="7"><hr class="layui-bg-gray"></td></tr>
		    <tr><td class="td1">备注信息</td><td  colspan="6"><?= $base['perMark'] ?></td></tr>
	    </tbody>
	</table>
</div>
<?php $this->endBody() ?>
<script>
layui.use('table', function(){
  var table = layui.table;
  
});
</script>	
</body>
</html>
<?php $this->endPage() ?>