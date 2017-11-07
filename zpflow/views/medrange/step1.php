<div class="layui-tab layui-tab-brief" lay-filter="flow5_step1_tab">
  	<ul class="layui-tab-title">
	    <li class="layui-this" lay-id="1">待安排<span id="flow5_step1_tabli1" style="display: none;"></span></li>
	    <li lay-id="2">已安排<span id="flow5_step1_tabli2" style="display: none;"></span></li>
	    <li lay-id="3">放弃体检<span id="flow5_step1_tabli3" style="display: none;"></span></li>
	    <li lay-id="4">所有<span id="flow5_step1_tabli4" style="display: none;"></span></li>
  	</ul>
  	<div class="layui-tab-content" style="padding: 0;">
	    <div class="layui-tab-item layui-show">
	     	<div id="flow5_step1_datagrid">
	
			</div>
	    </div>
  	</div>
</div>
<div id="flow5_step1_toolbar" style="padding:5px">
	<div class="layui-form">
		<div class="layui-form-item" style="margin-bottom: 0;">
		    <div class="layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: auto;font-size: 12px;">姓名</label>
		      	<div class="layui-input-inline" style="margin-right: 0;width: auto;">
		        	<input id="perName" name="perName" class="layui-input">
		      	</div>
		    </div>
		    <div class="layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: auto;font-size: 12px;">性别</label>
		      	<div class="layui-input-inline" style="margin-right: 0;width: auto;">
			        <select id="perGender" name="perGender"  lay-search="">
			          	<option value=""></option>
			          	<option value="1">男</option>
			          	<option value="2">女</option>
			        </select>
		      	</div>
		    </div>
		    <div class="layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: auto;font-size: 12px;">身份证号</label>
		      	<div class="layui-input-inline" style="margin-right: 0;width: auto;">
		        	<input id="perIDCard" name="perIDCard" class="layui-input">
		      	</div>
		    </div>
		    <div class="layui-inline" style="margin-bottom: 0;float: right;">
			  	<div class="layui-btn-group">
				    <button class="layui-btn" onclick="init_flow5_step1_datagrid();"><i class="layui-icon">&#xe615;</i></button>
				    <button class="layui-btn layui-btn-primary" onclick="init_flow5_step1_cancle();"><i class="layui-icon">&#xe640;</i></button>
			 	</div>
		 	</div>
	  	</div>
	  	
	</div>
</div>
<form id="flow5_step1_exportForm" action="<?= yii\helpers\Url::to(['examiner/examiner-export']); ?>" method="post" style="display:none;">
    <input type="text" name="flag" />
    <input type="text" name="recID" />
    <input type="text" name="condition" />
</form>

<script>
var __flow5_step1_datagrid_flag__ = "1";
var __flow5_step1_condition__ ;
var __flow5_step1_total__ = "0";
var __flow3_to__ = "<?= $flow3_to; ?>";
var __flow4_to__ = "<?= $flow4_to; ?>";
$(function(){
	layui.use(['element','form','layer', 'laydate'], function(){
		var element = layui.element;
		var form = layui.form;
		  	element.on('tab(flow5_step1_tab)', function(){
	    	__flow5_step1_datagrid_flag__ = this.getAttribute('lay-id');
	    	init_flow5_step1_datagrid();
	  	});
	  	
	  	form.render('select');
	  	
	  	<?php if($flow3_to > 0){ ?>
	  		return layer.alert('资格审查环节存在未公示的结果');
	  	<?php }elseif($flow4_to > 0){ ?>
	  		return layer.alert('考试录入环节存在未公示的人员');
	  	<?php } ?>
	  	
	});
//	init_flow5_step1_datagrid();
});

//function init_flow4_step2_datagrid(){
//	var exmName = $("#exmName").val().trim();
//	var exmType = $("#exmType").val();
//	
//	$('#flow4_step2_datagrid').datagrid({
//      width:'auto',
//      height:'auto',
//	    fitColumns: false,
//	    singleSelect: false,
//	    rownumbers: true,
//	    method: "post",
//	    queryParams: {'exmName':exmName,'exmType':exmType,'recID':__flow4_recID__,'type':__flow4_step2_datagrid_flag__},
//    	url:"<= yii\helpers\Url::to(['examiner/list-info']); ?>",
//    	rownumbers: true, 
//    	sortName:'',
//	    sortOrder:'',
//	    pagination: true, 
//	    toolbar:'#flow4_step2_toolbar',
//      columns:[[
//      	{field:'ck',checkbox:true,width:'10%'},
//      	{width:'12%',field:'exmName',title:'姓名',align:'center',sortable:true},
//      	{width:'12%',field:'exmAttr',title:'考官属性',align:'center',sortable:true,
//      		formatter:function(value,row,index){
//	        		return value == "1" ? "公务员局考官" : "其他考官";
//	        	}
//      	},
//      	{width:'10%',field:'exmType',title:'考官类别',align:'center',sortable:true,
//      		formatter:function(value,row,index){
//	        		return value == "1" ? "主考官" : (value == "2" ? "固定考官" : "监督员");
//	        	}
//      	},
//      	{width:'15%',field:'exmCom',title:'考官所在单位',align:'center'},
//      	{width:'14%',field:'exmPost',title:'考官职务',align:'center'},
//      	{width:'10%',field:'exmPhone',title:'手机号码',align:'center',sortable:true},
//      	{width:'15%',field:'exmCertNo',title:'证书编号',align:'center',sortable:true},
//      	{width:'10%',field:'exmTime',title:'到岗时间',align:'center'},
//      ]],
//  	onDblClickRow:function(index,row){
//	    	if(__flow4_show_flag__ == "0"){
//	    		return;
//	    	}
//	    	layui.use('layer',function(){
//	   			var layer = layui.layer;
//	   			layer.open({
//		    		type:2,
//		    		title:'修改考官',
//		    		area:["400px",'550px'],
//		    		content:"<= yii\helpers\Url::to(['exam/repair-step2']); ?>"+"&exmID="+row.exmID+"&recID="+__flow4_recID__,
//		    		btn:['保存','取消'],
//		    		yes: function(){
//		    			$("iframe[id*='layui-layer-iframe'")[0].contentWindow.step2_repair_save(); 
//			        },
//		    		btn2:function(){
//		    			layer.closeAll();
//		    		}
//			    });
//	   		});
//	    },
//      onLoadSuccess: function(data){
//			__flow4_step2_condition__ = data.exportInfo.condition;
//			__flow4_step2_total__ = data.total;
//			
//			$("#flow4_step2_tabli1").html("");
//      	$("#flow4_step2_tabli2").html("");
//      	$("#flow4_step2_tabli3").html("");
//      	var headInfo = data.headInfo;
//      	$("#flow4_step2_tabli1").html("("+headInfo.tab1+")");
//      	$("#flow4_step2_tabli2").html("("+headInfo.tab2+")");
//      	$("#flow4_step2_tabli3").html("("+headInfo.tab3+")");
//      	
//      	$("#flow4_step2_tabli1").css("display","");
//      	$("#flow4_step2_tabli2").css("display","");
//      	$("#flow4_step2_tabli3").css("display","");
//			
//      	$('#flow4_step2_datagrid').datagrid('resize',{
//	    		height: $(window).height()-124-25-90-10
//	    	});
//	    	
//	    	if(__flow4_show_flag__ == "1"){
//		    	$("#flow4_step2_datagrid").datagrid('getPager').pagination({
//		    		showPageList:false,
//		    		displayMsg:'',
//		    		layout:['sep','refresh'],
//		    		buttons:[{
//					  	iconCls:'icon-add',
//					   	text:'添加',
//					   	handler:function(){
//					   		layui.use('layer',function(){
//					   			var layer = layui.layer;
//					   			layer.open({
//						    		type:2,
//						    		title:'添加考官',
//						    		area:["400px",'550px'],
//						    		content:"<= yii\helpers\Url::to(['exam/repair-step2']); ?>"+"&exmID=&recID="+__flow4_recID__,
//						    		btn:['保存','取消'],
//						    		yes: function(){
//						    			$("iframe[id*='layui-layer-iframe'")[0].contentWindow.step2_repair_save(); 
//							        },
//						    		btn2:function(){
//						    			layer.closeAll();
//						    		}
//							    });
//					   		});
//					   	}
//				   	},'-',{
//					  	iconCls:'icon-remove',
//					   	text:'删除',
//					   	handler:function(){
//					   		layui.use('layer',function(){
//					   			var layer = layui.layer;
//						   		var rows = $("#flow4_step2_datagrid").datagrid('getSelections');
//								var len = rows.length;
//								if(len == 0){
//							       return layer.alert('请选择要删除的数据！');
//							    }
//							    
//							    var exmIDs = [];
//							    for( var i =0 ; i < len ; i++ ){
//							        exmIDs.push(rows[i]['exmID']);
//							    }
//							    
//							    layer.confirm('您确定要删除勾选的【'+len+'】条数据么', function(index){
//								  	$.post("<= yii\helpers\Url::to(['examiner/examiner-del']); ?>",{'exmIDs':exmIDs,'recID':__flow4_recID__},function(json){
//										if(json.result){
//											layer.msg(json.msg);
//											init_flow4_step2_datagrid();
//											layer.close(index);
//										}else{
//											layer.alert(json.msg);
//										}
//									},'json');
//								}); 
//						    });
//					   	}
//				   	},'-',{
//					  	iconCls:'icon-import',
//					   	text:'Excel导入',
//					   	handler:function(){
//					   		layui.use('layer',function(){
//					   			var layer = layui.layer;
//					   			layer.open({
//						    		type:2,
//						    		title:'导入考官信息',
//						    		area:["500px",'350px'],
//						    		content:"<= yii\helpers\Url::to(['exam/import-step2']); ?>"+"&recID="+__flow4_recID__,
//						    		btn:['上传','取消'],
//						    		yes: function(){
//						    			$("iframe[id*='layui-layer-iframe'")[0].contentWindow.step2_import_data_sure(); 
//							        },
//						    		btn2:function(){
//						    			layer.closeAll();
//						    		}
//							    });
//					   		});
//					   	}
//				   	},'-',{
//					  	iconCls:'icon-export',
//					   	text:'Excel导出',
//					   	handler:function(){
//					   		layui.use('layer',function(){
//					   			var layer = layui.layer;
//					   			if(__flow4_step2_total__ == "0"){
//					   				return layer.alert("当前没有任何数据，不需要导出");
//					   			}
//					   			
//					   			$("#flow4_step2_exportForm").find("input[name='condition']").val(JSON.stringify(__flow4_step2_condition__));
//							 	$("#flow4_step2_exportForm").find("input[name='flag']").val(__flow4_step2_datagrid_flag__);
//							 	$("#flow4_step2_exportForm").find("input[name='recID']").val(__flow4_recID__);
//								$("#flow4_step2_exportForm").submit();
//					   		});
//					   	}
//				   	}]
//				});
//	    	}else{
//	    		$("#flow4_step2_datagrid").datagrid('getPager').pagination({
//		    		showPageList:false,
//		    		displayMsg:'',
//		    		layout:['sep','refresh'],
//		    		buttons:[{
//					  	iconCls:'icon-export',
//					   	text:'Excel导出',
//					   	handler:function(){
//					   		layui.use('layer',function(){
//					   			var layer = layui.layer;
//					   			if(__flow4_step2_total__ == "0"){
//					   				return layer.alert("当前没有任何数据，不需要导出");
//					   			}
//					   			
//					   			$("#flow4_step2_exportForm").find("input[name='condition']").val(JSON.stringify(__flow4_step2_condition__));
//							 	$("#flow4_step2_exportForm").find("input[name='flag']").val(__flow4_step2_datagrid_flag__);
//							 	$("#flow4_step2_exportForm").find("input[name='recID']").val(__flow4_recID__);
//								$("#flow4_step2_exportForm").submit();
//					   		});
//					   	}
//				   	}]
//				});
//	    	}
//	    }
//  });
//}

function init_flow5_step1_cancle(){
	layui.use('form', function(){
		var form = layui.form;
		$("#perName").val("");
		$("#perGender").val("");
	  	form.render('select');
	  	init_flow5_step1_datagrid();
	});
}
</script>

