<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
AppAsset::register($this);
$this->registerJsFile("@web/js/common/jquery-1.9.1.min.js", ['depends' => ['yii\web\YiiAsset'], 'position' => $this::POS_HEAD]);
$this->title = '添加招聘年度';
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
		<fieldset class="layui-elem-field layui-field-title">
		  	<legend>基本信息</legend>
		</fieldset>
	  	<div class="layui-form-item layui-inline">
		    <label class="layui-form-label">招聘年度</label>
		    <div class="layui-input-block">
		      	<input class="layui-input" lay-verify="recYear" id="recYear" name="recYear" placeholder="请选择招聘年度" type="text">
		    </div>
	  	</div>
	    <div class="layui-form-item layui-inline">
		    <label class="layui-form-label">是否默认</label>
		    <div class="layui-input-block">
		      	<input type="checkbox" id="recDefault" name="recDefault" lay-skin="switch" lay-text="是|否">
		    </div>
		</div>
	    
	    <div class="layui-form-item layui-inline">
	      	<label class="layui-form-label">起始时间</label>
	      	<div class="layui-input-block">
	        	<input class="layui-input" lay-verify="recStart" id="recStart" name="recStart" placeholder="请选择起始时间" type="text">
	      	</div>
	    </div>
	    <div class="layui-form-item layui-inline">
	      	<label class="layui-form-label">结束时间</label>
	      	<div class="layui-input-block">
	        	<input class="layui-input" lay-verify="recEnd" id="recEnd" name="recEnd" placeholder="请选择结束时间" type="text">
	      	</div>
	    </div>
	    
	    <fieldset class="layui-elem-field layui-field-title">
		  	<legend>批次信息</legend>
		</fieldset>
      	<div class="layui-form-item">
		    <label class="layui-form-label">招聘批次</label>
		    <div class="layui-input-block">
		      	<select id="recBatch" name="recBatch" lay-verify="recBatch">
			        <option value=""></option>
			        <option value="0">北京</option>
			        <option value="1">上海</option>
			        <option value="2">广州</option>
			        <option value="3">深圳</option>
			        <option value="4">杭州</option>
		      	</select>
		    </div>
	 	</div>
    	
    	<div class="layui-form-item">
		    <label class="layui-form-label">考试地点</label>
		    <div class="layui-input-block">
		      <input type="text" id="recViewPlace" name="recViewPlace"  placeholder="请输入考试地点" class="layui-input">
		    </div>
	  	</div>
    	
    	<div class="layui-form-item">
		    <label class="layui-form-label">体检地点</label>
		    <div class="layui-input-block">
		      <input type="text" id="recHealthPlace" name="recHealthPlace"  placeholder="请输入体检地点" class="layui-input">
		    </div>
	  	</div>
	  	<hr class="layui-bg-gray">
	  	<div class="layui-form-item layui-form-center">
		    <div class="layui-input-block1">
		      	<button id="flow1_repair_submit" class="layui-btn" lay-submit>立即提交</button>
		      	<button id="flow1_repair_cancel" class="layui-btn layui-btn-primary">取消</button>
		    </div>
	  	</div>
	</div>
</div>
<?php $this->endBody() ?>
<script>
$(function(){
	layui.use(['form','layer', 'laydate'], function(){
	 	var form = layui.form,
	 		layer = layui.layer,
	 		laydate = layui.laydate;
	  	form.verify({
		    recYear: function(value){
		      if(value == ""){
		        return '招聘年度不能为空';
		      }
		    },
		    recStart: function(value){
		    	var recEnd = $("#recEnd").val();
		    	if(value == ""){
		    		return '起始时间不能为空';
		    	}else if(recEnd != "" && recEnd<value){
		    		return '起始时间不能大于结束时间';
		    	}
		    },
		    recEnd: function(value){
		    	var recStart = $("#recStart").val();
		    	if(value == ""){
		    		return '结束时间不能为空';
		    	}else if(recStart != "" && value<recStart){
		    		return '结束时间不能小于起始时间';
		    	}
		    },
		    recBatch: function(value){
		    	if(value == ""){
		    		return '招聘批次不能为空';
		    	}
		    }
		});
		
		laydate.render({
		    elem: '#recYear',
		    type: 'year',
		});
		laydate.render({
		    elem: '#recStart',
		    type: 'datetime',
		});
		laydate.render({
		    elem: '#recEnd',
		    type: 'datetime',
		});
		
		$("#flow1_repair_cancel").click(function(){
			parent.layer.close(parent.layer.getFrameIndex(window.name));
		});
		
		$("#flow1_repair_submit").bind("click",function(){
			form.on('submit',function(data){
				$.post("<?= Url::to(['recruit/repair-do']) ?>",{'Recruit':data.field},function(json){
					if(json.result){
						alert("dsdsdsd");
					}else{
						layer.alert(json.msg);
					}
				},'json');
			});
		});
	});
});
</script>	
</body>
</html>
<?php $this->endPage() ?>