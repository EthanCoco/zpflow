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
	    <p id="stepIndex_three_flow3_content" style="padding: 10px;"> </p>
	</fieldset>
</div>
  
<div class="layui-body_sendmsg">
    <div id="stepIndex_three_flow3_sendmsg">
    	
    </div>
</div>
<?php $this->endBody() ?>
<script>
var __stepIndex_three_flow3_sendmsg_recID = "<?php echo $recID; ?>";
var __stepIndex_three_flow3_sendmsg_type = "<?php echo $type; ?>";
var __stepIndex_three_flow3_sendmsg_perIDs = "<?php echo $perIDs; ?>";

$(function(){
	$("#stepIndex_three_flow3_content").html(parent.__rczp_zgsc_stepIndex_three_sendmsg__content__);
	$('#stepIndex_three_flow3_sendmsg').datagrid({
		width:'auto',
        height:'520',
	    url:"<?= Url::to(['quaexam/send-info-quaexam']) ?>",
	    method: "get",
	    queryParams: {'recID':__stepIndex_three_flow3_sendmsg_recID,'type':__stepIndex_three_flow3_sendmsg_type,'perIDs':__stepIndex_three_flow3_sendmsg_perIDs},
	    fixed: true,
	    fitColumns: false,
	    rownumbers: true, 
        columns:[[
            {field:'perIndex',title:'报名序号',width:'20%',align:'center',},
            {field:'perName',title:'姓名',width:'20%',align:'center',},
            {field:'perPhone',title:'手机号码',width:'20%',align:'center',},
            {field:'perStatus',title:'审查结果',width:'20%',align:'center',
            	formatter:function(value,row,index){
	        		return value == "1" ? "待审" : (value == "2" ? "通过" : "不通过");
	        	}
            },
            {field:'perPub',title:'公示结果',width:'19%',align:'center',
            	formatter:function(value,row,index){
	        		return value == "0" ? "未公示" : '已公示';
	        	}
            },
        ]]
 	});
});

function stepIndexThreeSendMsg(){
	layui.use('layer', function(){
	 	var layer = layui.layer;
		var data = $("#stepIndex_three_flow3_sendmsg").datagrid('getData');
		var rows = data.rows;
		var len = rows.length;
		var perPhones = "";
		for(var i = 0; i < len; i++){
	   		perPhones += rows[i]['perPhone']+",";
	   	}
	   	
		perPhones = perPhones.substr(0,perPhones.length-1);
		
		$.ajax({
			type:"get",
			url:"<?= Url::to(['quaexam/send-do-quaexam']) ?>",
			async:false,
			dataType:'json',
			data:{'perPhones':perPhones,'content':parent.__rczp_zgsc_stepIndex_three_sendmsg__content__},
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