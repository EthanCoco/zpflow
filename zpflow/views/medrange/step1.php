<div class="layui-tab layui-tab-brief" lay-filter="flow5_step1_tab">
  	<ul class="layui-tab-title">
	    <li class="layui-this" lay-id="1">待体检人员<span id="flow5_step1_tabli1" style="display: none;"></span></li>
	    <li lay-id="2">放弃体检<span id="flow5_step1_tabli2" style="display: none;"></span></li>
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
var __flow5_step1_msg_content__ = "";
var __flow_step1_medical_flag__ = 0;
var __flow_step1_headInfo__ = [];
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
	init_flow5_step1_datagrid();
});

function init_flow5_step1_datagrid(){
	var perName = $("#perName").val().trim();
	var perGender = $("#perGender").val();
	var perIDCard = $("#perIDCard").val().trim();
	
	$('#flow5_step1_datagrid').datagrid({
        width:'auto',
        height:'auto',
	    fitColumns: false,
	    singleSelect: false,
	    rownumbers: true,
	    method: "post",
	    queryParams: {'perName':perName,'perGender':perGender,'perIDCard':perIDCard,'recID':__flow5_recID__,'flag':__flow5_step1_datagrid_flag__},
      	url:"<?= yii\helpers\Url::to(['medrange/list-info-step1']); ?>",
      	rownumbers: true, 
      	sortName:'',
	    sortOrder:'',
	    pagination: true, 
	    toolbar:'#flow5_step1_toolbar',
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
	        {field:'medPlace',title:'体检地点',width:'100',align:'center',rowspan:2,sortable:true},
	        {field:'medStartEnd',title:'体检时间',width:'100',align:'center',rowspan:2,sortable:true},
	        {field:'perRead4',title:'通知阅读情况',width:'100',align:'center',rowspan:2,sortable:true},
	        {field:'perKSLRHJTJ',title:'考试录入环节体检反馈情况',width:'300',colspan:3,align:'center'},
	        {field:'perTJAPTJ',title:'体检安排环节体检反馈情况',width:'300',colspan:3,align:'center'}
	        ],[
		    	{field:'perReResult3',title:'反馈结果',width:'10%',align:'center',sortable:true},
		    	{field:'perReGiveup3',title:'放弃原因',width:'10%',align:'center'},
		    	{field:'perReTime3',title:'反馈时间',width:'130',align:'center',sortable:true,
		    		formatter:function(value,row,index){
		        		return value == "0000-00-00 00:00:00" ? "" : value;
		        	}
			   	},
			   	{field:'perReResult4',title:'反馈结果',width:'10%',align:'center',sortable:true},
		    	{field:'perReGiveup4',title:'放弃原因',width:'10%',align:'center'},
		    	{field:'perReTime4',title:'反馈时间',width:'130',align:'center',sortable:true,
		    		formatter:function(value,row,index){
		        		return value == "0000-00-00 00:00:00" ? "" : value;
		        	}
			    }
	    ]],
    	onDblClickRow:function(index,row){
	    	if(__flow5_show_flag__ == "0"){
	    		return;
	    	}
	    },
        onLoadSuccess: function(data){
        	$("#stepIndex_five_head_pubinfo").html('');
			$("#stepIndex_five_head_pubinfo").html('发布状态：'+ (data.pub_flag == 0 ? '未发布' : (data.pub_flag == 1 ? '暂无数据' : '已发布')));
        	
			__flow5_step1_condition__ = data.exportInfo.condition;
			__flow5_step1_total__ = data.total;
			__flow_step1_medical_flag__ = data.medical_flag;
			__flow_step1_headInfo__ = data.headInfo;
			$("#flow5_step1_tabli1").html("");
        	$("#flow5_step1_tabli2").html("");
        	
        	var headInfo = data.headInfo;
        	$("#flow5_step1_tabli1").html("("+headInfo.tab1+")");
        	$("#flow5_step1_tabli2").html("("+headInfo.tab2+")");
        	
        	$("#flow5_step1_tabli1").css("display","");
        	$("#flow5_step1_tabli2").css("display","");
			
        	$('#flow5_step1_datagrid').datagrid('resize',{
	    		height: $(window).height()-124-25-90-10
	    	});
	    	
	    	if(__flow5_show_flag__ == "1"){
	    		if(data.pub_flag == 1){
	    			$("#flow5_step1_datagrid").datagrid('getPager').pagination({});
	    		}else if(data.pub_flag == 0){
	    			if(__flow3_to__ == "0" && __flow4_to__ == "0"){
	    				//显示全部
	    				$("#flow5_step1_datagrid").datagrid('getPager').pagination({
				    		buttons:[{
					   			iconCls:'icon-edit',text:'体检安排',
							   	handler:function(){
							   		flow5_step1_medrange_range();
								}
					   		},'-',{
					   			iconCls:'icon-pub',text:'结果公示',
							   	handler:function(){
							   		layui.use('layer',function(){
										var layer = layui.layer;
										if(__flow_step1_headInfo__.tab1 == 0){
											return layer.alert("暂无考生信息，不需要公布");
										}
										if(__flow_step1_medical_flag__ == 0){
											return layer.alert("您还没有安排体检设置体检时间和地点，请先设置");
										}
										
										if(data.medical_edit_num == 0){
											return layer.alert("您还没有编辑体检安排，请先编辑");
										}
										
										parent.layer.confirm('您确定公示体检安排么？', function(index){
											$.post("<?= yii\helpers\Url::to(['medrange/range-pub-fs1']) ?>",{
													'recID':__flow5_recID__
												},function(json){
												if(json.result){
													init_flow5_step1_datagrid();
													parent.layer.msg(json.msg);
													parent.layer.closeAll();
												}else{
													parent.layer.alert(json.msg);
												}
											},'json');
										});
									});
								}
					   		},'-',{
					   			iconCls:'icon-edittz',text:'体检安排编辑',
							   	handler:function(){
							   		flow5_step1_medrange_info();
								}
					   		},'-',{
					   			iconCls:'icon-tip',text:'短信提醒',
							   	handler:function(){
							   		flow5_step1_sendmsg();
								}
					   		},'-',{
							  	iconCls:'icon-export',
							   	text:'Excel导出',
							   	handler:function(){
							   		flow5_step1_export_info();
							   	}
						   	},'-',{
							  	iconCls:'icon-print',
							   	text:'打印签到表',
							   	handler:function(){
							   		flow5_step1_print_sign();
							   	}
						   	}]
						});
	    			}else{
	    				//隐藏结果公示按钮
	    				$("#flow5_step1_datagrid").datagrid('getPager').pagination({
				    		buttons:[{
					   			iconCls:'icon-edit',text:'体检安排',
							   	handler:function(){
							   		flow5_step1_medrange_range();
								}
					   		},'-',{
					   			iconCls:'icon-edittz',text:'体检安排编辑',
							   	handler:function(){
							   		flow5_step1_medrange_info();
								}
					   		},'-',{
					   			iconCls:'icon-tip',text:'短信提醒',
							   	handler:function(){
							   		flow5_step1_sendmsg();
								}
					   		},'-',{
							  	iconCls:'icon-export',
							   	text:'Excel导出',
							   	handler:function(){
							   		flow5_step1_export_info();
							   	}
						   	},'-',{
							  	iconCls:'icon-print',
							   	text:'打印签到表',
							   	handler:function(){
							   		flow5_step1_print_sign();
							   	}
						   	}]
						});
	    			}
	    		}else{
	    			$("#flow5_step1_datagrid").datagrid('getPager').pagination({
			    		buttons:[{
				   			iconCls:'icon-edit',text:'体检安排',
						   	handler:function(){
						   		flow5_step1_medrange_range();
							}
				   		},'-',{
				   			iconCls:'icon-edittz',text:'体检安排编辑',
						   	handler:function(){
						   		flow5_step1_medrange_info();
							}
					   	},'-',{
				   			iconCls:'icon-tip',text:'短信提醒',
						   	handler:function(){
						   		flow5_step1_sendmsg();
							}
				   		},'-',{
						  	iconCls:'icon-export',
						   	text:'Excel导出',
						   	handler:function(){
						   		flow5_step1_export_info();
						   	}
					   	},'-',{
						  	iconCls:'icon-print',
						   	text:'打印签到表',
						   	handler:function(){
						   		flow5_step1_print_sign();
						   	}
					   	}]
					});
	    		}
	    	}else{
	    		$("#flow5_step1_datagrid").datagrid('getPager').pagination({
		    		buttons:[{
			   			iconCls:'icon-tip',text:'短信提醒',
					   	handler:function(){
					   		flow5_step1_sendmsg();
						}
			   		},'-',{
					  	iconCls:'icon-export',
					   	text:'Excel导出',
					   	handler:function(){
					   		flow5_step1_export_info();
					   	}
				   	},'-',{
					  	iconCls:'icon-print',
					   	text:'打印签到表',
					   	handler:function(){
					   		flow5_step1_print_sign();
					   	}
				   	}]
				});
	    	}
	    }
    });
}

function flow5_step1_medrange_range(){
	layui.use('layer',function(){
		var layer = layui.layer;
		layer.open({
    		type:2,
    		title:'安排体检',
    		area:["400px",'420px'],
    		content:"<?= yii\helpers\Url::to(['medrange/range-medical-fs1']); ?>"+"&recID="+__flow5_recID__,
    		btn:['保存','取消'],
    		yes: function(){
    			$("iframe[id*='layui-layer-iframe'")[0].contentWindow.flow5_step1_range_medical_save(); 
	        },
    		btn2:function(){
    			layer.closeAll();
    		}
	    });
	});
}

function flow5_step1_medrange_info(){
	layui.use('layer',function(){
		var layer = layui.layer;
		layer.open({
	  		type:2,
	  		title:'体检安排通知编辑',
	  		area:[$(window).width()*3/4+"px",'520px'],
	  		content:"<?= yii\helpers\Url::to(['medrange/medrange-edit-fs1']); ?>"+"&recID="+__flow5_recID__,
	  		btn:['安排','取消'],
	  		yes: function(){
	  			$("iframe[id*='layui-layer-iframe'")[0].contentWindow.flow5_step1_medrange_edit_save(); 
		    },
	  		btn2:function(){
	  			layer.close(layer.getFrameIndex(window.name));
	  		}
	    });
	});
}

function flow5_step1_export_info(){
	layui.use('layer',function(){
		var layer = layui.layer;
		if(__flow5_step1_total__ == 0){
			return layer.alert("当前没有任何数据，不需要导出");
		}else{
			window.open("<?= yii\helpers\Url::to(['medrange/export-info-fs1']); ?>"+"&recID="+__flow5_recID__+"&condition="+JSON.stringify(__flow5_step1_condition__));
		}
	});
}

function flow5_step1_print_sign(){
	layui.use('layer',function(){
		var layer = layui.layer;
		if(__flow_step1_headInfo__.tab1 == 0){
			return layer.alert("暂无考生信息");
		}else if(__flow_step1_medical_flag__ == 0){
			return layer.alert('请先设置体检时间和地点');
		}else{
			window.open("<?= yii\helpers\Url::to(['medrange/print-sign-fs1']); ?>"+"&recID="+__flow5_recID__);
		}
	});
}

function flow5_step1_sendmsg(){
	layui.use('layer',function(){
		var layer = layui.layer;
		layer.prompt({
		  	formType: 2,
		  	value: '',
		  	title: '编辑短信通知内容',
		  	area: ['300px', '150px']
		}, function(value, index, elem){
			  	__flow5_step1_msg_content__ = value;
	    	 	layer.open({
			  		type:2,
			  		title:'确认短信发送',
			  		area:[$(window).width()*3/4+"px",'520px'],
			  		content:"<?= yii\helpers\Url::to(['medrange/send-msg-fs1']); ?>"+"&recID="+__flow5_recID__,
			  		btn:['发送','关闭'],
			  		yes: function(){
			  			$("iframe[id*='layui-layer-iframe'")[0].contentWindow.flow5_step1_send_msg_sure(); 
				    },
			  		btn2:function(){
			  			layer.close(layer.getFrameIndex(window.name));
			  		}
			    });
		});
	});
}

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

