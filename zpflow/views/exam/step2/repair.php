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
		    <label class="layui-form-label"><span class="star">*</span>考官属性</label>
		    <div class="layui-input-block">
		        <select name="exmAttr" id="exmAttr" lay-verify="exmAttr">
			        <option value=""></option>
			        <option value="1">公务员局考官</option>
			        <option value="2">其他考官</option>
			    </select>
		    </div>
		</div>
		<div class="layui-form-item">
		    <label class="layui-form-label"><span class="star">*</span>考官分类</label>
		    <div class="layui-input-block">
			    <select name="exmType" id="exmType" lay-verify="exmType">
			        <option value=""></option>
			        <option value="1">主考官</option>
			        <option value="2">固定考官</option>
			        <option value="3">监督员</option>
			    </select>
		    </div>
		</div>
		<div class="layui-form-item">
		    <label class="layui-form-label"><span class="star">*</span>考官姓名</label>
		    <div class="layui-input-block">
			    <input name="exmName" id="exmName" lay-verify="exmName"  placeholder="请输入考官姓名" class="layui-input" type="text">
		    </div>
		</div>
		<div class="layui-form-item">
		    <label class="layui-form-label"><span class="star">*</span>考官所在单位</label>
		    <div class="layui-input-block">
			    <input name="exmCom" id="exmCom" lay-verify="exmCom"  placeholder="请输入考官所在单位" class="layui-input" type="text">
		    </div>
		</div>
		<div class="layui-form-item">
		    <label class="layui-form-label"><span class="star">*</span>职务</label>
		    <div class="layui-input-block">
			    <input name="exmPost" id="exmPost" lay-verify="exmPost"  placeholder="请输入职务" class="layui-input" type="text">
		    </div>
		</div>
		<div class="layui-form-item">
		    <label class="layui-form-label"><span class="star">*</span>手机号码</label>
		    <div class="layui-input-block">
			    <input name="exmPhone" id="exmPhone"  lay-verify="exmPhone"  placeholder="请输入手机号码" class="layui-input" type="text">
		    </div>
		</div>
		<div class="layui-form-item">
		    <label class="layui-form-label"><span class="star">*</span>考官证书编号</label>
		    <div class="layui-input-block">
			    <input name="exmCertNo" id="exmCertNo" lay-verify="exmCertNo" placeholder="请输入考官证书编号" class="layui-input" type="text">
		    </div>
		</div>
		<div class="layui-form-item">
		    <label class="layui-form-label"><span class="star"></span>到岗时间</label>
		    <div class="layui-input-block">
			    <input name="exmTime" id="exmTime" class="layui-input" type="text">
		    </div>
		</div>
	</div>
</div>
<?php $this->endBody() ?>
<script>
var step2_repair_recID = "<?= $recID ?>";	
var step2_repair_exmID = "<?= $exmID ?>";
$(function(){
	layui.use(['element','form','layer', 'laydate'], function(){
		var form = layui.form;
		var laydate = layui.laydate;
		
		laydate.render({
		    elem: '#exmTime',
		    type: 'date',
		});
		
		<?php if($exmID){ ?>
			$("#exmAttr").val("<?= $examinerInfo['exmAttr'] ?>");
			$("#exmType").val("<?= $examinerInfo['exmType'] ?>");
			$("#exmName").val("<?= $examinerInfo['exmName'] ?>");
			$("#exmCom").val("<?= $examinerInfo['exmCom'] ?>");
			$("#exmPost").val("<?= $examinerInfo['exmPost'] ?>");
			$("#exmPhone").val("<?= $examinerInfo['exmPhone'] ?>");
			$("#exmCertNo").val("<?= $examinerInfo['exmCertNo'] ?>");
			$("#exmTime").val("<?= $examinerInfo['exmTime'] ?>");
			ostep2_repair_exmID = "<?= $examinerInfo['exmID'] ?>";
			form.render('select');
		<?php } ?>
	});
});

function step2_repair_save (){
	layui.use('layer',function(){
		var layer = layui.layer;
		
      	if($("#exmAttr").val() == ""){
       	 	return layer.msg('考官属性不能为空',{icon: 5,anim:6});
      	}
      	if($("#exmType").val() == ""){
       	 	return layer.msg('考官类型不能为空',{icon: 5,anim:6});
      	}
      	if($("#exmName").val().trim() == ""){
       	 	return layer.msg('考官姓名不能为空',{icon: 5,anim:6});
      	}
	    if($("#exmCom").val().trim() == ""){
       	 	return layer.msg('考官所在单位不能为空',{icon: 5,anim:6});
      	}
      	if($("#exmPost").val().trim() == ""){
       	 	return layer.msg('考官职务不能为空',{icon: 5,anim:6});
      	}
		if($("#exmPhone").val().trim() == ""){
       	 	return layer.msg('手机号码不能为空',{icon: 5,anim:6});
      	}else if(!validatePhone($("#exmPhone").val().trim())){
      		return layer.msg('手机号码格式不正确',{icon: 5,anim:6});
      	}
		if($("#exmCertNo").val().trim() == ""){
       	 	return layer.msg('证书编号不能为空',{icon: 5,anim:6});
      	}

		var objParam = {};
		objParam['exmAttr'] = $("#exmAttr").val();
		objParam['exmType'] = $("#exmType").val();
		objParam['exmName'] = $("#exmName").val();
		objParam['exmCom'] = $("#exmCom").val();
		objParam['exmPost'] = $("#exmPost").val();
		objParam['exmPhone'] = $("#exmPhone").val();
		objParam['exmCertNo'] = $("#exmCertNo").val();
		objParam['exmTime'] = $("#exmTime").val();
		objParam['recID'] = step2_repair_recID;
		$.post("<?= Url::to(['examiner/examiner-save']) ?>",{'Examiner':objParam,'exmID':step2_repair_exmID},function(json){
			if(json.result){
				parent.init_flow4_step2_datagrid();
				parent.layer.msg(json.msg);
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