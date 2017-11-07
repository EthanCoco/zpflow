<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
AppAsset::register($this);
$this->registerJsFile("@web/js/common/jquery-1.9.1.min.js", ['depends' => ['yii\web\YiiAsset'], 'position' => $this::POS_HEAD]);
$this->registerCssFile("@web/js/plugin/ztree/zTreeStyle.css", ['depends' => ['yii\web\YiiAsset'], 'position' => $this::POS_HEAD]);
$this->registerJsFile("@web/js/plugin/ztree/jquery.ztree.all-3.5.min.js", ['depends' => ['yii\web\YiiAsset'], 'position' => $this::POS_HEAD]);
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
<div class="layui-side_sendmsg"  style="overflow: auto;">
  	<p style="height: 40px;text-align: left;line-height: 40px;border-bottom: solid 1px #40AFFE; color:#6DBFFF;"><span>&nbsp;&nbsp;&nbsp;&nbsp;考官总数：所有/已安排/未安排：</span><span id="examiner_info"></span></p>
	<div class="ztree" id='examiner_info_tree' style="overflow: auto;position: absolute;left: 0px;bottom: 30px;top: 40px;width: 290px;"></div>
	<div style="text-align: center;vertical-align: middle;position: absolute;bottom: 0px;left:0px;width: 300px;border-top:solid 1px #6DBFFF;">
	    <button onclick="flow4_step3_choose_examiner()" class="layui-btn layui-btn-normal layui-btn-small" style="line-height: 15px;">选择</button>
	    <button onclick="load_flow4_step3_tree()" class="layui-btn layui-btn-normal layui-btn-primary layui-btn-small" style="line-height: 15px;">重置</button>
	</div>
</div>
  
<div class="layui-body_sendmsg">
	<p style="height: 40px;text-align: left;line-height: 40px;border-bottom: solid 1px #6DBFFF; color:#6DBFFF;"><span>&nbsp;&nbsp;&nbsp;&nbsp;已选考官人数：</span><span id="examiner_choose">0</span></p>
    <div id="stepIndex_flow4_step3_assign_examiner">
    	
    </div>
    <div style="text-align: center;vertical-align: middle;position: absolute;bottom: 0px;left:0px;width: 100%;border-top:solid 1px #6DBFFF;">
	    <!--<button onclick="flow4_step3_sure()" class="layui-btn layui-btn-normal layui-btn-small" style="line-height: 15px;">确定</button>-->
	    <button onclick="flow4_step3_delete_examiner()" class="layui-btn layui-btn-normal layui-btn-small" style="line-height: 15px;">删除</button>
	</div>
</div>
<?php $this->endBody() ?>
<script>
var __stepIndex_flow4_step3__assign_examiner_recID = "<?= $recID; ?>";
var __stepIndex_flow4_step3_assign_examiner_gstID = "<?= $gstID; ?>";
$(function(){
	load_flow4_step3_tree();
});

function load_flow4_step3_tree(){
	$("#examiner_info").html("");
	$("#examiner_info").html(parent.__flow4_step3_title_info__.sy+"/"+parent.__flow4_step3_title_info__.yap+"/"+parent.__flow4_step3_title_info__.wap);
	
	$.getJSON("<?= Url::to(['examiner/examiner-tree-list']); ?>",{'recID':__stepIndex_flow4_step3__assign_examiner_recID,'gstID':__stepIndex_flow4_step3_assign_examiner_gstID}, function(json){
		var treeData = json.treeInfo;
		var selectData = json.group_info;
		var setting = {
		    		edit : {
						enable : false,
						showRemoveBtn: false,
						showRenameBtn: false
					},
					data : {
						simpleData : {
							enable : true,
							idKey : "id",
							pIdKey : "pId"
						}
					},
					check:{
						enable:true
					},
					view : {
						dblClickExpand : false,	
						showLine : true,
						selectedMulti : false
					},
					callback: {
						beforeClick:function(treeId,treeNode,clickFlag){
						    return false;
						}
					}
				};
    	
    	var treeObj = $.fn.zTree.init($("#examiner_info_tree"), setting, treeData);// 生成树形结构
    	var zTree = $.fn.zTree.getZTreeObj("examiner_info_tree");
    	zTree.expandAll(true); 
		for(i = 0; i < selectData.length; i++) { 
		    zTree.checkNode(zTree.getNodeByParam("id",selectData[i]["exmID"]),true);
		} 
		var nodes = zTree.getCheckedNodes(true);
		for (var i = 0, l = nodes.length; i < l ; i++) {
			treeObj.setChkDisabled(nodes[i], true);
		}
		flow4_step3__assign_examiner_choose_list();
	});
}

function flow4_step3__assign_examiner_choose_list() {
	$('#stepIndex_flow4_step3_assign_examiner').datagrid({
        width:'auto',
        height:405,
        rownumbers: false,
        fitColumns: false,
	    singleSelect: false,
	    method: "get",
	    queryParams: {'recID':__stepIndex_flow4_step3__assign_examiner_recID,'gstID':__stepIndex_flow4_step3_assign_examiner_gstID},
      	url:"<?= Url::to(['examiner/examiner-choose-list']); ?>",
        columns:[[
         		{field:'ck',checkbox:true},
	        	{width:'20%',field:'id',title:'序号',align:'center',formatter: function(value,row,index){return index+1;}},
	            {width:'25%',field:'exmName',title:'姓名',align:'center'},
	        	{width:'25%',field:'codeName',title:'组别',align:'center'},
	        	{width:'25%',field:'exmType',title:'考官分类',align:'center',formatter: function(value,row,index){
	        		return value == "1" ? "主考官" : (value == "2" ? "固定考官" : "监督员");
	        	}}
        	]],
        onLoadSuccess: function(data){
        	$("#examiner_choose").html("");
        	$("#examiner_choose").html(data.total);
	    }
    });
}

function flow4_step3_choose_examiner(){
	layui.use('layer',function(){
		var layer = layui.layer;
		var zTree = $.fn.zTree.getZTreeObj("examiner_info_tree");
		var nodes = zTree.getCheckedNodes(true);
		if(nodes.length == 0){
			parent.layer.alert("请选择要安排的考官！");
			return;
		}
		var exmID_info = [];
		if(nodes.length > 0){
			for(var i=0; i<nodes.length; i++){
				if(nodes[i]['isChild'] == "1"){
					exmID_info.push(nodes[i]['id']);
				}
			}
		}
		
		parent.layer.confirm('您确定分配选择的考官', function(index){
			$.ajax({
				type:"POST",
				url:"<?= Url::to(['examiner/examiner-choose-do']); ?>",
				data:{'recID':__stepIndex_flow4_step3__assign_examiner_recID,'gstID':__stepIndex_flow4_step3_assign_examiner_gstID,'gstStartEnd':parent.__flow4_step3_single_gstStartEnd__,'exmIDs':exmID_info},
				dataType:"json",
				success: function(json){
					if(json.result){
						parent.layer.msg(json.msg);
						init_flow4_step3_head_info();
						parent.init_flow4_step3_datagrid();
						load_flow4_step3_tree();
						layer.close(index);
					}else{
						parent.layer.alert(json.msg);
					}
				}
			});
		});
	});
}

function flow4_step3_delete_examiner(){
	layui.use('layer',function(){
		var layer = layui.layer;
		var rows = $("#stepIndex_flow4_step3_assign_examiner").datagrid('getSelections');
		var len = rows.length;
		if(len == 0){
	     	return parent.layer.alert('请选择要删除的数据！');
	    }
	    var gstexmIDs = [];
	    for(var i = 0 ; i < len ; i++){
	        gstexmIDs.push(rows[i]['gstexmID']);
	    }
	    
	    parent.layer.confirm('您确定删除选择的考官', function(index){
			$.post("<?= Url::to(['examiner/examiner-choose-del']); ?>",{'gstexmIDs':gstexmIDs},function(json){
	            if(json.result){
	                parent.layer.msg('删除成功！');
	                init_flow4_step3_head_info();
	                parent.init_flow4_step3_datagrid();
					load_flow4_step3_tree();
					layer.close(index);
	            }else{
	                parent.layer.alert(json.msg);
	            }
	        },'json');
		});
    });
}

function init_flow4_step3_head_info(){
	$.ajax({
		type:"post",
		url:"<?= Url::to(['examiner/examiner-choose-hinfo']); ?>",
		data:{'recID':__stepIndex_flow4_step3__assign_examiner_recID},
		dataType:"json",
		success: function(json){
			$("#examiner_info").html("");
			$("#examiner_info").html(json.sy+"/"+json.yap+"/"+json.wap);
		}
	});
}
</script>	
</body>
</html>
<?php $this->endPage() ?>