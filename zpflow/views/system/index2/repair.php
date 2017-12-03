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
		<input name="uid" id="uid"  type="hidden">
		<div class="layui-form-item">
		    <label class="layui-form-label"><span class="star">*</span>用户名</label>
		    <div class="layui-input-block">
			    <input name="name" id="name"  placeholder="请输入用户名作为登录账号" class="layui-input" type="text">
		    </div>
		</div>
		<div class="layui-form-item">
		    <label class="layui-form-label"><span class="star">*</span>真实姓名</label>
		    <div class="layui-input-block">
			    <input name="realName" id="realName"  placeholder="请输入真实姓名" class="layui-input" type="text">
		    </div>
		</div>
		<div class="layui-form-item">
		    <label class="layui-form-label"><span class="star"></span>手机号码</label>
		    <div class="layui-input-block">
			    <input name="phone" id="phone"  placeholder="" class="layui-input" type="text">
		    </div>
		</div>
	</div>
</div>
<script>
$(function(){
	layui.use('layer',function(){
		var layer = layui.layer;
		<?php if(!empty($infos)){ ?>
			$("#uid").val("<?= $infos['uid'] ?>");
			$("#name").val("<?= $infos['name'] ?>");
			$("#realName").val("<?= $infos['realName'] ?>");
			$("#phone").val("<?= $infos['phone'] ?>");
		<?php } ?>
	});
});

function system_admin_save(){
	layui.use('layer',function(){
		var layer = layui.layer;
		var uid = $("#uid").val();
		var name = $("#name").val().trim();
		var realName = $("#realName").val().trim();
		var phone = $("#phone").val().trim();
		
		if(name == ""){
			return parent.layer.alert('用户名不能为空');
		}
		if(name != "" && !validateUserName(name)){
			return parent.layer.alert('用户名格式不正确！用户名由5-20个以字母开头、可带数字、下划线');
		}
		if(realName == ""){
			return parent.layer.alert('真实姓名不能为空');
		}
		if(phone != "" && !validatePhone(phone)){
			return parent.layer.alert('手机号码格式不正确');
		}
		
		parent.layer.confirm('您确定要保存吗？',function(index){
			$.post("<?= Url::to(['sysdata/sys-admin-save']) ?>",{'uid':uid,'name':name,'realName':realName,'phone':phone},function(json){
				if(json.result){
					parent.load_system_admin();
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
<?php $this->endBody() ?>	
</body>
</html>
<?php $this->endPage() ?>