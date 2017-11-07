<div class="layui-tab layui-tab-brief" lay-filter="flow4_step4_tab">
  	<ul class="layui-tab-title">
	    <li class="layui-this" lay-id="1">待安排<span id="flow4_step4_tabli1" style="display: none;"></span></li>
	    <li lay-id="2">已安排<span id="flow4_step4_tabli2" style="display: none;"></span></li>
	    <li lay-id="3">放弃考试<span id="flow4_step4_tabli3" style="display: none;"></span></li>
	    <li lay-id="4">所有<span id="flow4_step4_tabli4" style="display: none;"></span></li>
  	</ul>
  	<div class="layui-tab-content" style="padding: 0;">
	    <div class="layui-tab-item layui-show">
	     	<div id="flow4_step4_datagrid">
	
			</div>
	    </div>
  </div>
</div>
<div id="flow4_step4_toolbar" style="padding:5px">
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
		    
		    <div class="layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: auto;font-size: 12px;">组别</label>
		      	<div class="layui-input-inline" style="margin-right: 0;width: auto;">
			        <select id="perGroupSet" name="perGroupSet"  lay-search="">
			          	<option value=""></option>
			          	<?php if(!empty($groupInfo)){ ?>
			          		<?php foreach($groupInfo as $info){ ?>
			          			<option value="<?= $info['gcode'] ?>"><?= $info['gname'] ?></option>
			          		<?php } ?>
			          	<?php } ?>
			        </select>
		      	</div>
		    </div>
		    <div class="layui-inline" style="margin-bottom: 0;float: right;">
			  	<div class="layui-btn-group">
				    <button class="layui-btn" onclick="init_flow4_step4_datagrid();"><i class="layui-icon">&#xe615;</i></button>
				    <button class="layui-btn layui-btn-primary" onclick="init_flow4_step4_cancle();"><i class="layui-icon">&#xe640;</i></button>
			 	</div>
		 	</div>
	  	</div>
	</div>
</div>

<ul class="tabsMoreList" id="flow4_step4_group_info" style="margin-left:0px;right:0px;bottom:53px;top:auto">
	<li rel="flow4_step4_group_info"><a href="javascript:;" onclick="flow4_step4_group_auto()" title="自动分组">自动分组</a></li>
	<li rel="flow4_step4_group_info"><a href="javascript:;" onclick="flow4_step4_group_batch()" title="批量分组">批量分组</a></li>
</ul>

<form id="flow4_step4_exportForm" action="<?= yii\helpers\Url::to(['examinee/examinee-export-step4']); ?>" method="post" style="display:none;">
    <input type="text" name="recID" />
    <input type="text" name="condition" />
</form>


<script>
var __flow4_step4_datagrid_flag__ = "1";
var __flow4_step4_perIDs__ = [];
var __flow3_to__ = "<?= $flow3_to; ?>";
$(function(){
	layui.use(['element','form','layer'], function(){
		var element = layui.element,
			layer = layui.layer,
			form = layui.form;
		  	element.on('tab(flow4_step4_tab)', function(){
	    	__flow4_step4_datagrid_flag__ = this.getAttribute('lay-id');
	    	init_flow4_step4_datagrid();
	  	});
	  	
	  	form.render('select');
	  	
	  	<?php if($flow3_to > 0){ ?>
	  		return layer.alert('资格审查环节存在未公示的结果');
	  	<?php } ?>
	});
	init_flow4_step4_datagrid();
});

function init_flow4_step4_datagrid(){
	var perName = $("#perName").val().trim();
	var perGender = $("#perGender").val();
	var perIDCard = $("#perIDCard").val().trim();
	var perGroupSet = $("#perGroupSet").val();
	
	$('#flow4_step4_datagrid').datagrid({
        width:'auto',
        height:'auto',
	    url:"<?= yii\helpers\Url::to(['examinee/examinee-deal-list']); ?>",
	    method: "post",
	    queryParams: {'recID':__flow4_recID__,'flag':__flow4_step4_datagrid_flag__,'perName':perName,'perGender':perGender,'perIDCard':perIDCard,'perGroupSet':perGroupSet},
	    striped: true,
	    fixed: true,
	    fitColumns: false,
	    singleSelect: false,
        pagination: true,  
	    rownumbers: true, 
	    pageNumber:1,
	    pageSize:20,
	    pageList:[20,50,100,200],
	    sortName:'perIndex',
	    sortOrder:'ASC',
	    toolbar:"#flow4_step4_toolbar",
	    frozenColumns:[[
    		{field:'ck',checkbox:true},
	        {field:'perIndex',title:'报名序号',width:'80',align:'center',sortable:true},
	        {field:'perName',title:'姓名',width:'70',align:'center',sortable:true},
        ]], 
        columns:[[
	        {field:'perIDCard',title:'身份证号',width:'180',align:'center',rowspan:2,sortable:true},
	        {field:'perGender',title:'性别',width:'5%',align:'center',rowspan:2,sortable:true},
	        {field:'perBirth',title:'出生年月',width:'100',align:'center',rowspan:2,sortable:true},
	        {field:'perJob',title:'应聘岗位性质',width:'8%',align:'center',rowspan:2,sortable:true},
	        {field:'perPhone',title:'手机号码',width:'100',align:'center',rowspan:2},
	        {field:'perTicketNo',title:'准考证号',width:'100',align:'center',rowspan:2,sortable:true},
	        {field:'perGroupSet',title:'组别名称',width:'100',align:'center',rowspan:2,sortable:true},
	        {field:'gstItvPlace',title:'考试地点',width:'100',align:'center',rowspan:2},
	        {field:'gstStartEnd',title:'考试时间',width:'100',align:'center',rowspan:2,sortable:true},
	        {field:'perRead2',title:'通知阅读情况',width:'100',align:'center',rowspan:2,sortable:true},
	        
	        {field:'perZGSC',title:'资格审查环节',width:'300',colspan:3,align:'center'},
	        {field:'perKSAP',title:'考试安排环节',width:'300',colspan:3,align:'center'}
	        ],[
		    	{field:'perReResult1',title:'反馈结果',width:'10%',align:'center',sortable:true},
		    	{field:'perReGiveup1',title:'放弃原因',width:'10%',align:'center'},
		    	{field:'perReTime1',title:'反馈时间',width:'130',align:'center',sortable:true,
		    		formatter:function(value,row,index){
		        		return value == "0000-00-00 00:00:00" ? "" : value;
		        	}
			    },
			    {field:'perReResult2',title:'反馈结果',width:'10%',align:'center',sortable:true},
		    	{field:'perReGiveup2',title:'放弃原因',width:'10%',align:'center'},
		    	{field:'perReTime2',title:'反馈时间',width:'130',align:'center',sortable:true,
		    		formatter:function(value,row,index){
		        		return value == "0000-00-00 00:00:00" ? "" : value;
		        	}
		    	}
	    ]],
        onLoadSuccess: function(data){
      		$("#stepIndex_four_head_pubinfo").html('');
			$("#stepIndex_four_head_pubinfo").html('发布状态：'+ (data.pub_flag == 0 ? '未发布' : (data.pub_flag == 1 ? '暂无数据' : '已发布')));
        	
        	$("#flow4_step4_tabli1").html("");
        	$("#flow4_step4_tabli2").html("");
        	$("#flow4_step4_tabli3").html("");
        	$("#flow4_step4_tabli4").html("");
        	var headInfo = data.headInfo;
        	$("#flow4_step4_tabli1").html("("+headInfo.tab1+")");
        	$("#flow4_step4_tabli2").html("("+headInfo.tab2+")");
        	$("#flow4_step4_tabli3").html("("+headInfo.tab3+")");
        	$("#flow4_step4_tabli4").html("("+headInfo.tab4+")");
        	$("#flow4_step4_tabli1").css("display","");
        	$("#flow4_step4_tabli2").css("display","");
        	$("#flow4_step4_tabli3").css("display","");
        	$("#flow4_step4_tabli4").css("display","");
        	
			$('#flow4_step4_datagrid').datagrid('resize',{
	    		height: $(window).height()-124-25-100
	    	});
	    	
	    	if(__flow4_show_flag__ == "1"){
	    		if(__flow3_to__ != "0"){
	    			$("#flow4_step4_datagrid").datagrid('getPager').pagination({
			    		buttons:[{
						  	iconCls:'icon-setcard',
						   	text:'自动生成准考证号',
						   	handler:function(){
						   		layui.use('layer',function(){
						   			var layer = layui.layer;
						   			$.post("<?= yii\helpers\Url::to(['examinee/examinee-auto-ticket']); ?>",{'recID':__flow4_recID__},function(json){
								        if(json.result){
								        	layer.msg(json.msg);
								            init_flow4_step4_datagrid();
								        }else{
								        	layer.alert(json.msg);
								        }
								    },'json');
						   		});
						   	}
					   	},'-',{
						  	iconCls:'icon-batch',
						   	text:'分组',
						   	handler:function(){
						   		manager_showMore(this,'flow4_step4_group_info');
						   	}
					   	},'-',{
						  	iconCls:'icon-edit',
						   	text:'考试安排编辑',
						   	handler:function(){
						   		layer.open({
							  		type:2,
							  		title:'考试分组通知编辑',
							  		area:[$(window).width()*3/4+"px",'520px'],
							  		content:"<?= yii\helpers\Url::to(['exam/group-edit-step4']); ?>"+"&recID="+__flow4_recID__,
							  		btn:['保存','取消'],
							  		yes: function(){
							  			$("iframe[id*='layui-layer-iframe'")[0].contentWindow.flow4_step4_group_edit_save(); 
								    },
							  		btn2:function(){
							  			layer.close(layer.getFrameIndex(window.name));
							  		}
							    });
						   	}
					   	},'-',{
						  	iconCls:'icon-print',
						   	text:'打印签到表',
						   	handler:function(){
						   		layui.use('layer',function(){
						   			if(data.headInfo.tab4 == 0){
						   				return layer.alert("暂无考生信息");
						   			}else{
						   				window.open("<?= yii\helpers\Url::to(['examinee/examinee-download']); ?>"+"&recID="+__flow4_recID__);
						   			}
					   			});
						   	}
					   	},'-',{
						  	iconCls:'icon-export',
						   	text:'Excel导出',
						   	handler:function(){
						   		layui.use('layer',function(){
						   			if(data.total == "0"){
						   				return layer.alert("当前没有任何数据，不需要导出");
						   			}
						   			window.open("<?= yii\helpers\Url::to(['examinee/examinee-export-step4']); ?>"+"&recID="+__flow4_recID__+"&condition="+JSON.stringify(data.exportInfo.condition));
						   		});
						   	}
					   	}]
					});
	    		}else{
	    			if(data.pub_flag == 0){
	    				$("#flow4_step4_datagrid").datagrid('getPager').pagination({
				    		buttons:[{
							  	iconCls:'icon-batch',
							   	text:'自动生成准考证号',
							   	handler:function(){
							   		layui.use('layer',function(){
							   			var layer = layui.layer;
							   			$.post("<?= yii\helpers\Url::to(['examinee/examinee-auto-ticket']); ?>",{'recID':__flow4_recID__},function(json){
									        if(json.result){
									        	layer.msg(json.msg);
									            init_flow4_step4_datagrid();
									        }else{
									        	layer.alert(json.msg);
									        }
									    },'json');
							   		});
							   	}
						   	},'-',{
							  	iconCls:'icon-batch',
							   	text:'分组',
							   	handler:function(){
							   		manager_showMore(this,'flow4_step4_group_info');
							   	}
						   	},'-',{
							  	iconCls:'icon-pub',
							   	text:'发布通知',
							   	handler:function(){
							   		layui.use('layer',function(){
							   			var layer = layui.layer;
							   			if(data.headInfo.tab4 == 0){
							   				return layer.alert("暂无考生信息，不需要发布考生安排信息");
							   			}else if(data.headInfo.tab1 != 0){
							   				return layer.alert("存在未安排的考生");
							   			}
							   			layer.confirm('您确定要发布考生安排通知么', function(index){
							   				$.post("<?= yii\helpers\Url::to(['examinee/examinee-notice-pub']); ?>",{'recID':__flow4_recID__},function(json){
										        if(json.result){
										        	layer.msg(json.msg);
										            init_flow4_step4_datagrid();
										            layer.close(index);
										        }else{
										        	layer.alert(json.msg);
										        }
										    },'json');
							   			});
							   		});
							   	}
						   	},'-',{
							  	iconCls:'icon-import',
							   	text:'考试安排编辑',
							   	handler:function(){
							   		layer.open({
								  		type:2,
								  		title:'考试分组通知编辑',
								  		area:[$(window).width()*3/4+"px",'520px'],
								  		content:"<?= yii\helpers\Url::to(['exam/group-edit-step4']); ?>"+"&recID="+__flow4_recID__,
								  		btn:['保存','取消'],
								  		yes: function(){
								  			$("iframe[id*='layui-layer-iframe'")[0].contentWindow.flow4_step4_group_edit_save(); 
									    },
								  		btn2:function(){
								  			layer.close(layer.getFrameIndex(window.name));
								  		}
								    });
							   	}
						   	},'-',{
							  	iconCls:'icon-print',
							   	text:'打印签到表',
							   	handler:function(){
							   		layui.use('layer',function(){
							   			if(data.headInfo.tab4 == 0){
							   				return layer.alert("暂无考生信息");
							   			}else{
							   				window.open("<?= yii\helpers\Url::to(['examinee/examinee-download']); ?>"+"&recID="+__flow4_recID__);
							   			}
						   			});
							   	}
						   	},'-',{
							  	iconCls:'icon-export',
							   	text:'Excel导出',
							   	handler:function(){
							   		layui.use('layer',function(){
							   			if(data.total == "0"){
							   				return layer.alert("当前没有任何数据，不需要导出");
							   			}
							   			window.open("<?= yii\helpers\Url::to(['examinee/examinee-export-step4']); ?>"+"&recID="+__flow4_recID__+"&condition="+JSON.stringify(data.exportInfo.condition));
							   		});
							   	}
						   	}]
						});
	    			}else if(data.pub_flag == 2){
	    				$("#flow4_step4_datagrid").datagrid('getPager').pagination({
				    		buttons:[{
							  	iconCls:'icon-import',
							   	text:'考试安排编辑',
							   	handler:function(){
							   		layer.open({
								  		type:2,
								  		title:'考试分组通知编辑',
								  		area:[$(window).width()*3/4+"px",'520px'],
								  		content:"<?= yii\helpers\Url::to(['exam/group-edit-step4']); ?>"+"&recID="+__flow4_recID__,
								  		btn:['保存','取消'],
								  		yes: function(){
								  			$("iframe[id*='layui-layer-iframe'")[0].contentWindow.flow4_step4_group_edit_save(); 
									    },
								  		btn2:function(){
								  			layer.close(layer.getFrameIndex(window.name));
								  		}
								    });
							   	}
						   	},'-',{
							  	iconCls:'icon-print',
							   	text:'打印签到表',
							   	handler:function(){
							   		layui.use('layer',function(){
							   			if(data.headInfo.tab4 == 0){
							   				return layer.alert("暂无考生信息");
							   			}else{
							   				window.open("<?= yii\helpers\Url::to(['examinee/examinee-download']); ?>"+"&recID="+__flow4_recID__);
							   			}
						   			});
							   	}
						   	},'-',{
							  	iconCls:'icon-export',
							   	text:'Excel导出',
							   	handler:function(){
							   		layui.use('layer',function(){
							   			if(data.total == "0"){
							   				return layer.alert("当前没有任何数据，不需要导出");
							   			}
							   			window.open("<?= yii\helpers\Url::to(['examinee/examinee-export-step4']); ?>"+"&recID="+__flow4_recID__+"&condition="+JSON.stringify(data.exportInfo.condition));
							   		});
							   	}
						   	}]
						});
	    			}else{
	    				$("#flow4_step4_datagrid").datagrid('getPager').pagination({
				    		buttons:[]
						});
	    			}
	    			
	    		}
	    	}else{
	    		$("#flow4_step4_datagrid").datagrid('getPager').pagination({
		    		buttons:[{
						  	iconCls:'icon-print',
						   	text:'打印签到表',
						   	handler:function(){
						   		layui.use('layer',function(){
						   			if(data.headInfo.tab4 == 0){
						   				return layer.alert("暂无考生信息");
						   			}else{
						   				window.open("<?= yii\helpers\Url::to(['examinee/examinee-download']); ?>"+"&recID="+__flow4_recID__);
						   			}
					   			});
						   	}
					   	},'-',{
					  	iconCls:'icon-export',
					   	text:'Excel导出',
					   	handler:function(){
					   		layui.use('layer',function(){
					   			if(data.total == "0"){
					   				return layer.alert("当前没有任何数据，不需要导出");
					   			}
					   			window.open("<?= yii\helpers\Url::to(['examinee/examinee-export-step4']); ?>"+"&recID="+__flow4_recID__+"&condition="+JSON.stringify(data.exportInfo.condition));
					   		});
					   	}
				   	}]
				});
	    	}
        }
    });
}

function init_flow4_step4_cancle(){
	layui.use('form', function(){
		var form = layui.form;
		$("#perName").val("");
	 	$("#perGender").val("");
		$("#perIDCard").val("");
		$("#perGroupSet").val("");
	  	form.render('select');
	  	init_flow4_step4_datagrid();
	});
}

function flow4_step4_group_auto(){
	layui.use('layer',function(){
		var layer = layui.layer;
		$.post("<?= yii\helpers\Url::to(['examinee/examinee-group-auto']); ?>",{'recID':__flow4_recID__},function(json){
	        if(json.result){
	            layer.msg(json.msg);
	            init_flow4_step4_datagrid();
	        }else{
	        	layer.alert(json.msg);
	        }
	    },'json');
	});
}

function flow4_step4_group_batch(){
	layui.use('layer',function(){
		var layer = layui.layer;
		var flag = 0;
		$.ajax({
			type:"post",
			url:"<?= yii\helpers\Url::to(['examinee/examinee-group-validate']); ?>",
			dataType:'json',
			async:false,
			data:{"reID":__flow4_recID__},
			success:function(json){
				if(json.result){
					layer.alert(json.msg);
					flag = 1;
				}
			}
		});
		
		if(flag)	return;
		
		var rows = $("#flow4_step4_datagrid").datagrid('getSelections');
		var len = rows.length;
		if(len == 0){
			return layer.alert("请选择人员");
		}
		
		for(var i = 0 ; i < len ; i++){
	        __flow4_step4_perIDs__.push(rows[i]['perID']);
	  	}
	  	
		layer.open({
	        type: 2, 
	        title: "批量处理",
	        area: ['400px', '400px'],
	        content:"<?= yii\helpers\Url::to(['exam/group-batch-step4']); ?>"+"&recID="+__flow4_recID__,
	        btn:['确定','关闭'],
	  		yes: function(){
	  			$("iframe[id*='layui-layer-iframe'")[0].contentWindow.flow4_step4_group_batch_sure(); 
		    },
	  		btn2:function(){
	  			layer.close(layer.getFrameIndex(window.name));
	  		}
	    });
	   
	});
}
</script>