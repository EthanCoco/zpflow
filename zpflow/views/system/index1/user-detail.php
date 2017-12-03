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
	<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
	  	<legend style="font-size: 14px;color: blue;padding: 5px;">基本信息</legend>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">姓名：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perName']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label style="height: 80px;" class="mobile-input-label">照片：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2">
		    		<div id="person-photo" class="layer-photos-demo">
					  	<img layer-pid="" layer-src="<?= $perInfo['perPhoto']; ?>" height="80" width="80" src="<?= $perInfo['perPhoto']; ?>" alt="">
					</div>
		    	</label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">身份证号：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perIDCard']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">性别：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perGender']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">出生日期：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perBirth']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">手机号码：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perPhone']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">电子邮箱：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perEmail']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">应聘岗位性质：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perJob']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">民族：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perNation']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">籍贯：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perOrigin']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">政治面貌：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perPolitica']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">现工作单位：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perWorkPlace']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">婚姻状况：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perMarried']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">身高：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perHeight']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">体重：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perWeight']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">毕业院校：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perUniversity']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">学位：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perDegree']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">专业：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perMajor']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">学历：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perEducation']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">外语水平：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perForeignLang']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">计算机水平：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perComputerLevel']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">毕业生生源地：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perEduPlace']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">紧急人联系电话：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perEmePhone']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">电子邮箱：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perEmail']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">邮政编码：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perPostCode']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">联系地址：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perAddr']; ?></span></label>
		    </div>
		</div>
		<div class="layui-row">
		    <div class="layui-col-xs4"><label class="mobile-input-label">备注：</label></div>
		    <div class="layui-col-xs8">
		    	<label class="mobile-input-label2"><span><?= $perInfo['perMark']; ?></span></label>
		    </div>
		</div>
	</fieldset>
	
	<?php if(!empty($eduInfo)){ ?>
		<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
		  	<legend style="font-size: 14px;color: blue;padding: 5px;">教育信息</legend>
		<?php foreach($eduInfo as $edu){ ?>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">起始时间：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $edu['eduStart']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">终止时间：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $edu['eduEnd']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">在何学校：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $edu['eduSchool']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">所学专业：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $edu['eduMajor']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">任职职务：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $edu['eduPost']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">奖学金及荣誉：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span></span></label>
				    </div>
				</div>
				<div class="layui-row">
					<div style="margin-left: -2px;color: #666;">
					    <div class="layui-textarea">
					    	<?php echo $edu['eduBurseHonorary']; ?>
					    </div>
				    </div>
				</div>
		<?php } ?>
		</fieldset>
	<?php }else{ ?>
		<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
		  	<legend style="font-size: 14px;color: blue;padding: 5px;">教育信息</legend>
			<div class="mobile-index2-content-index1">
				<p style='font-size: 15px;text-align:center;font-family:\"微软雅黑\";'>
					暂无信息
				</p>
			</div>
		</fieldset>
	<?php } ?>
	
	<?php if(!empty($workInfo)){ ?>
		<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
		  	<legend style="font-size: 14px;color: blue;padding: 5px;">工作经历</legend>
		<?php foreach($workInfo as $work){ ?>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">起始时间：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $work['wkStart']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">终止时间：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $work['wkStart']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">所在岗位：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $work['wkPost']; ?></span></label>
				    </div>
				</div>
				
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">所在单位：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $work['wkCom']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">工作简述：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span></span></label>
				    </div>
				</div>
				<div class="layui-row">
					<div style="margin-left: -2px;color: #666;">
					    <div class="layui-textarea">
					    	<?php echo $work['wkInfo']; ?>
					    </div>
				    </div>
				</div>
		<?php } ?>
		</fieldset>
	<?php }else{ ?>
		<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
		  	<legend style="font-size: 14px;color: blue;padding: 5px;">工作经历</legend>
			<div class="mobile-index2-content-index1">
				<p style='font-size: 15px;text-align:center;font-family:\"微软雅黑\";'>
					暂无信息
				</p>
			</div>
		</fieldset>
	<?php } ?>
	
	<?php if(!empty($famInfo)){ ?>
		<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
		  	<legend style="font-size: 14px;color: blue;padding: 5px;">家庭信息</legend>
		<?php foreach($famInfo as $fam){ ?>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">成员关系：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $fam['famRelation']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">成员姓名：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $fam['famName']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">所在工作单位：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $fam['famCom']; ?></span></label>
				    </div>
				</div>
				
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">任职岗位：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $fam['famPost']; ?></span></label>
				    </div>
				</div>
		<?php } ?>
		</fieldset>
	<?php }else{ ?>
		<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
		  	<legend style="font-size: 14px;color: blue;padding: 5px;">家庭信息</legend>
			<div class="mobile-index2-content-index1">
				<p style='font-size: 15px;text-align:center;font-family:\"微软雅黑\";'>
					暂无信息
				</p>
			</div>
		</fieldset>
	<?php } ?>
</div>
<script>
$(function(){
	layui.use('layer',function(){
		var layer = layui.layer;
		layer.photos({
		  	photos: '#person-photo',anim: 5 
		});
	});
	
});
</script>
<?php $this->endBody() ?>	
</body>
</html>
<?php $this->endPage() ?>