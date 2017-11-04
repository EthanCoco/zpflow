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
	.layui-side_sendmsg {
	    position: fixed;
	    top: 0;
	    bottom: 0;
	    z-index: 999;
	    width: 300px;
	    overflow-x: hidden;
	    border: 1px solid skyblue;
	}
	.layui-body_sendmsg {
	    position: absolute;
	    left: 300px;
	    right: 0;
	    top: 0;
	    bottom: 0;
	    z-index: 999;
	    width: auto;
	    overflow: hidden;
	    box-sizing: border-box;
	    border: 1px solid skyblue;
	    border-left-color: white;
	}
</style>
	
</head>
<body>
<?php $this->beginBody() ?>
<div class="layui-side_sendmsg">
	<p style="padding:5px 10px 5px 10px; color: red;">
    	参考字段：如果需要在右侧替换所需要替换的【字段名】，如下格式recYear
    </p>
    <div id="flow4_step4__group_edit_datagrid">
    	
    </div>
</div>
  
<div class="layui-body_sendmsg">
    <div class="layui-form">
    	<div style="margin: 10px auto;width: 300px;">
    		<input name="ntsID" id="ntsID" type="text" style="display: none;">
    		<input name="ntsTitle" id="ntsTitle" placeholder="请输入标题" class="layui-input" type="text">
    	</div>
    	<textarea class="layui-textarea layui-hide" name="ntsContent" lay-verify="content" id="ntsContent"></textarea>
    </div>
</div>
<?php $this->endBody() ?>
<script>
var __flow4_step4_group_edit_recID__ = "<?= $recID; ?>";
var __flow4_step4_group_edit_editIndex__ = "";
$(function(){
	$('#flow4_step4__group_edit_datagrid').datagrid({    
	    url:'./json/stepIndex_four_step4.json',
	    rownumbers: true, 
	    columns:[[    
	        {field:'name',title:'字段名',align:'center',width:'50%'},   
	        {field:'cname',title:'导出字段中文名',align:'center',width:'50%'},   
	    ]]
	});
	
	layui.use(['form','layedit'], function(){
	 	var form = layui.form,
	 	layedit = layui.layedit;
		
		__flow4_step4_group_edit_editIndex__ = layedit.build('ntsContent', {
		    tool: ['strong','italic','underline','del','face', 'link', 'unlink', '|', 'left', 'center', 'right'],
		    height:320
		});
		
		$("#ntsID").val("<?= $nstnotice_info['ntsID']; ?>");
		$("#ntsTitle").val("<?= $nstnotice_info['ntsTitle']; ?>");
		$("#ntsContent").val("<?= $nstnotice_info['ntsContent']; ?>");
	});
});

function flow4_step4_group_edit_save(){
	layui.use(['form','layedit'], function(){
	 	var form = layui.form,
	 	layedit = layui.layedit;
	 	var ntsTitle = $("#ntsTitle").val().trim();
	 	var ntsID = $("#ntsID").val();
	 	var ntsContent = layedit.getContent(__flow4_step4_group_edit_editIndex__);
	 	if(ntsTitle == ""){
	 		return parent.layer.alert("标题不能为空");
	 	}
	 	$.post(
			"<?= Url::to(['examinee/examinee-noticemb-save']) ?>",
			{
				'recID':__flow4_step4_group_edit_recID__,
				'ntsID':ntsID,
				'ntsTitle':ntsTitle,
				'ntsContent':ntsContent
			},
			function(json){
				if(json.result){
					parent.layer.msg(json.msg);
					parent.layer.closeAll();
				}else{
					parent.layer.alert(json.msg);
				}
			},
		'json');
	});
}

</script>	
</body>
</html>
<?php $this->endPage() ?>