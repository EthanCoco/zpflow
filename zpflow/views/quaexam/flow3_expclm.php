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
<div>
	<form id="stepIndex_three_flow3_exportForm" action="<?= Url::to(['quaexam/export-quaexam']); ?>" method="post" style="display:none;">
	    <input type="text" name="type" />
	    <input type="text" name="flag" />
	    <input type="text" name="recID" />
	    <input type="text" name="condition" />
	    <input type="text" name="extracolumns" />
	    <input type="text" name="ecolumns" />
	    <input type="text" name="zcolumns" />
	</form>
	<div id="stepIndex_three_expclm"></div>
	<div class="layui-form">
		<fieldset class="layui-elem-field layui-field-title">
		  	<legend>添加额外信息：<span style="color: red;">额外添加多个字段请使用中文字符顿号（、）分割</span></legend>
		</fieldset>
		<div class="layui-form-item layui-form-text">
		    <label class="layui-form-label">导出预留<br/>额外字段</label>
		    <div class="layui-input-block">
		      <textarea id="stepIndex_three_flow3_textarea" class="layui-textarea"></textarea>
		    </div>
	  	</div>
	</div>
</div>
<?php $this->endBody() ?>
<script>
$(function(){
	$('#stepIndex_three_expclm').datagrid({    
	    url:'./json/stepIndex_three_expclm.json',
	    rownumbers: true, 
	    columns:[[    
	    	{field:'ck',checkbox:true},
	        {field:'cname',title:'导出字段中文名',align:'center',width:'90%'},    
	        {field:'name',title:'字段名',hidden:true},    
	    ]]
	});
	layui.use('form', function(){
	 	var form = layui.form;
	});
});


function stepIndexThreeExpclm(){
	layui.use('layer', function(){
	 	var layer = layui.layer;
		var rows = $("#stepIndex_three_expclm").datagrid('getSelections');
		var len = rows.length;
		if(len == 0){
			parent.layer.alert("请勾选需要导出的字段");
			return;
		}
		var columns = "";
		var ccolumns = "";
		for(var i = 0; i < len; i++){
	   		columns += rows[i]['name']+",";
	   		ccolumns += rows[i]['cname']+",";
	   	}
		columns = columns.substr(0,columns.length-1);
		ccolumns = ccolumns.substr(0,ccolumns.length-1);
		var extracolumns = $("#stepIndex_three_flow3_textarea").val().trim();
	  	var type = <?php echo $type ?>;
	  	$("#stepIndex_three_flow3_exportForm").find("input[name='condition']").val(JSON.stringify(parent.__rezp_zgsc_stepIndex_three_condition));
	 	$("#stepIndex_three_flow3_exportForm").find("input[name='type']").val(type);
	 	$("#stepIndex_three_flow3_exportForm").find("input[name='flag']").val(parent.__rczp_zgsc_stepIndex_three_tab__);
	 	$("#stepIndex_three_flow3_exportForm").find("input[name='recID']").val(parent.__rczp_zgsc_stepIndex_three_recID__);
		$("#stepIndex_three_flow3_exportForm").find("input[name='extracolumns']").val(extracolumns);
		$("#stepIndex_three_flow3_exportForm").find("input[name='ecolumns']").val(columns);
		$("#stepIndex_three_flow3_exportForm").find("input[name='zcolumns']").val(ccolumns);
		$("#stepIndex_three_flow3_exportForm").submit();
	});
}
</script>	
</body>
</html>
<?php $this->endPage() ?>