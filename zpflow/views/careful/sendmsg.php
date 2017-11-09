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
    <fieldset class="layui-elem-field layui-field-title">
	  	<legend>通知信息</legend>
	    <p id="stepIndex_flow6_content" style="padding: 10px;"> </p>
	</fieldset>
</div>
  
<div class="layui-body_sendmsg">
    <div id="stepIndex_flow6_sendmsg">
    	
    </div>
</div>
<?php $this->endBody() ?>
<script>
var __stepIndex_flow6_sendmsg_recID = "<?= $recID; ?>";
$(function(){
	$("#stepIndex_flow6_content").html(parent.__flow6_msg_content__);
	$('#stepIndex_flow6_sendmsg').datagrid({
		width:'auto',
        height:'520',
	    url:"<?= Url::to(['careful/sendmsg-list']) ?>",
	    method: "get",
	    queryParams: {'recID':__stepIndex_flow6_sendmsg_recID},
	    fixed: true,
	    fitColumns: false,
	    singleSelect:true,
	    rownumbers: true, 
        columns:[[
        	{field:'perIndex',title:'报名序号',width:'10%',align:'center'},
            {field:'perName',title:'姓名',width:'15%',align:'center'},
            {field:'perPhone',title:'手机号码',width:'20%',align:'center'},
            {field:'perJob',title:'应聘岗位性质',width:'15%',align:'center'},
            {field:'perCarefulStatus',title:'政审结果',width:'20%',align:'center'},
	        {field:'perPub6',title:'公示结果',width:'20%',align:'center'},
        ]]
 	});
});

function flow6_send_msg_sure(){
	layui.use('layer', function(){
	 	var layer = layui.layer;
		var data = $("#stepIndex_flow6_sendmsg").datagrid('getData');
		var rows = data.rows;
		var len = rows.length;
		var perPhones = [];
		for(var i = 0; i < len; i++){
	   		perPhones.push(rows[i]['perPhone']);
	   	}
		
		$.ajax({
			type:"post",
			url:"<?= Url::to(['careful/sendmsg-do']) ?>",
			async:true,
			dataType:'json',
			data:{'perPhones':perPhones,'content':parent.__flow6_msg_content__},
			success:function(json){
				if(json.result){
					parent.layer.closeAll();
					parent.layer.msg(json.msg);
				}else{
					parent.layer.alert(json.msg);
				}
			}
		});
	})
}
</script>	
</body>
</html>
<?php $this->endPage() ?>