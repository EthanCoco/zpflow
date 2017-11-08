<div class="layui-tab layui-tab-brief" lay-filter="flow5_step2_tab">
  	<ul class="layui-tab-title">
	    <li class="layui-this" lay-id="1">待录入<span id="flow5_step2_tabli1" style="display: none;"></span></li>
	    <li lay-id="2">合格<span id="flow5_step2_tabli2" style="display: none;"></span></li>
	    <li lay-id="3">不合格<span id="flow5_step2_tabli3" style="display: none;"></span></li>
	    <li lay-id="4">所有<span id="flow5_step2_tabli4" style="display: none;"></span></li>
  	</ul>
  	<div class="layui-tab-content" style="padding: 0;">
	    <div class="layui-tab-item layui-show" id="flow5_step2_datagrid_parentdiv">
	     	<div id="flow5_step2_datagrid">
	
			</div>
	    </div>
  	</div>
</div>
<div id="flow5_step2_toolbar" style="padding:5px">
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
				    <button class="layui-btn" onclick="init_flow5_step2_datagrid();"><i class="layui-icon">&#xe615;</i></button>
				    <button class="layui-btn layui-btn-primary" onclick="init_flow5_step2_cancle();"><i class="layui-icon">&#xe640;</i></button>
			 	</div>
		 	</div>
	  	</div>
	  	
	</div>
</div>
<script>
var __flow5_step2_datagrid_flag__ = "1";
var __flow5_step2_condition__ ;
var __flow5_step2_total__ = "0";
var __flow_step2_headInfo__ ;
var __flow5_step2_msg_content__ = "";
var __flow5_step2_medresult_json__ = [{'id':0,'name':'无数据'},{'id':1,'name':'合格'},{'id':2,'name':'不合格'}];
var __flow3_to__ = "<?= $flow3_to; ?>";
var __flow4_to__ = "<?= $flow4_to; ?>";
$(function(){
	layui.use(['element','form','layer', 'laydate'], function(){
		var element = layui.element;
		var form = layui.form;
		  	element.on('tab(flow5_step2_tab)', function(){
	    	__flow5_step2_datagrid_flag__ = this.getAttribute('lay-id');
	    	init_flow5_step2_datagrid();
	  	});
	  	
	  	form.render('select');
	  	<?php if($flow3_to > 0){ ?>
	  		return layer.alert('资格审查环节存在未公示的结果');
	  	<?php }elseif($flow4_to > 0){ ?>
	  		return layer.alert('考试录入环节存在未公示的人员');
	  	<?php } ?>
	});
	init_flow5_step2_datagrid();
});

function init_flow5_step2_datagrid(){
	var perName = $("#perName").val().trim();
	var perGender = $("#perGender").val();
	var perIDCard = $("#perIDCard").val().trim();
	
	$('#flow5_step2_datagrid').datagrid({
        width:'auto',
        height:'auto',
	    fitColumns: false,
	    singleSelect: false,
	    rownumbers: true,
	    method: "post",
	    queryParams: {'perName':perName,'perGender':perGender,'perIDCard':perIDCard,'recID':__flow5_recID__,'flag':__flow5_step2_datagrid_flag__},
      	url:"<?= yii\helpers\Url::to(['medrange/list-info-step2']); ?>",
      	rownumbers: true, 
      	sortName:'',
	    sortOrder:'',
	    pagination: true, 
	    toolbar:'#flow5_step2_toolbar',
        frozenColumns:[[
    		{field:'ck',checkbox:true},
	        {field:'perIndex',title:'报名序号',width:'80',align:'center',sortable:true},
	        {field:'perName',title:'姓名',width:'70',align:'center',sortable:true},
        ]], 
        columns:[[
	        {field:'perIDCard',title:'身份证号',width:'200',align:'center',rowspan:2,sortable:true},
	        {field:'perGender',title:'性别',width:'100',align:'center',rowspan:2,sortable:true},
	        {field:'perBirth',title:'出生年月',width:'150',align:'center',rowspan:2,sortable:true},
	        {field:'perJob',title:'应聘岗位性质',width:'120',align:'center',rowspan:2,sortable:true},
	        {field:'perPhone',title:'手机号码',width:'150',align:'center',rowspan:2},
	        {field:'perMedCheck1',title:'体检结果',width:'150',align:'center',rowspan:2,sortable:true,
	        	editor : {  
	                type : 'combobox',  
	                options : {  
		                data: __flow5_step2_medresult_json__,  
		                valueField: 'id',    
		                textField: 'name',    
		                panelHeight: 'auto',  
		                editable:false 
		            } 
                }  
	        },
	        {field:'perMedCheck2',title:'复查结果',width:'150',align:'center',rowspan:2,sortable:true,
	        	editor : {  
	                type : 'combobox',  
	                options : {  
		                data: __flow5_step2_medresult_json__,  
		                valueField: 'id',    
		                textField: 'name',    
		                panelHeight: 'auto',  
		                editable:false 
		            } 
                }  
	        },
	        {field:'perRead5',title:'通知阅读情况',width:'150',align:'center',rowspan:2,sortable:true},
	        {field:'perSFCJZS',title:'是否参加政审反馈情况',width:'300',colspan:3,align:'center'}
	        ],[
			   	{field:'perReResult5',title:'反馈结果',width:'10%',align:'center',sortable:true},
		    	{field:'perReGiveup5',title:'放弃原因',width:'10%',align:'center'},
		    	{field:'perReTime5',title:'反馈时间',width:'130',align:'center',sortable:true,
		    		formatter:function(value,row,index){
		        		return value == "0000-00-00 00:00:00" ? "" : value;
		        	}
			    }
	    ]],
	    onBeforeEdit: function (rowIndex, rowData, changes) {
            return true;
        },
        onDblClickRow: function (rowIndex, rowData) {
        	if(__flow5_show_flag__ == "0"){
	    		return;
	    	}
        	
        	if(rowData.perPub5 == 1){
        		return;
        	}
        	$('#flow5_step2_datagrid').datagrid("beginEdit", rowIndex);
        },
	    onLoadSuccess: function(data){
        	$("#stepIndex_five_head_pubinfo").html('');
			$("#stepIndex_five_head_pubinfo").html('发布状态：'+ (data.pub_flag == 0 ? '未发布' : (data.pub_flag == 1 ? '暂无数据' : '已发布')));
        	
			__flow5_step2_condition__ = data.exportInfo.condition;
			__flow5_step2_total__ = data.total;
			__flow_step2_headInfo__ = data.headInfo;
			$("#flow5_step2_tabli1").html("");
        	$("#flow5_step2_tabli2").html("");
        	$("#flow5_step2_tabli3").html("");
        	$("#flow5_step2_tabli4").html("");
        	
        	var headInfo = data.headInfo;
        	$("#flow5_step2_tabli1").html("("+headInfo.tab1+")");
        	$("#flow5_step2_tabli2").html("("+headInfo.tab2+")");
        	$("#flow5_step2_tabli3").html("("+headInfo.tab3+")");
        	$("#flow5_step2_tabli4").html("("+headInfo.tab4+")");
        	
        	$("#flow5_step2_tabli1").css("display","");
        	$("#flow5_step2_tabli2").css("display","");
        	$("#flow5_step2_tabli3").css("display","");
        	$("#flow5_step2_tabli4").css("display","");
			
        	$('#flow5_step2_datagrid').datagrid('resize',{
	    		height: $(window).height()-124-25-90-10
	    	});
	    	if(__flow5_show_flag__ == "1"){
	    		if(data.pub_flag == 1){
	    			$("#flow5_step2_datagrid").datagrid('getPager').pagination({});
	    		}else if(data.pub_flag == 0){
	    			if(__flow3_to__ == "0" && __flow4_to__ == "0"){
	    				//显示全部
	    				$("#flow5_step2_datagrid").datagrid('getPager').pagination({
				    		buttons:[{
					   			iconCls:'icon-save',text:'保存',
							   	handler:function(){
							   		flow5_step2_medresult_save();
								}
					   		},'-',{
					   			iconCls:'icon-redo',text:'重置',
							   	handler:function(){
							   		init_flow5_step2_datagrid();
								}
					   		},'-','-','-',{
					   			iconCls:'icon-import',text:'Excel导入',
							   	handler:function(){
							   		flow5_step2_medresult_import();
								}
					   		},'-',{
					   			iconCls:'icon-pub',text:'结果公示',
							   	handler:function(){
							   		layui.use('layer',function(){
										var layer = layui.layer;
										if(__flow_step2_headInfo__.tab4 == 0){
											return layer.alert("暂无考生信息，不需要公布");
										}
										
										parent.layer.confirm('您确定公示体检结果么？', function(index){
											$.post("<?= yii\helpers\Url::to(['medrange/range-pub-fs2']) ?>",{
													'recID':__flow5_recID__
												},function(json){
												if(json.result){
													init_flow5_step2_datagrid();
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
							  	iconCls:'icon-export',
							   	text:'Excel导出',
							   	handler:function(){
							   		flow5_step2_export_info();
							   	}
						   	},'-',{
							  	iconCls:'icon-tip',
							   	text:'短息提醒',
							   	handler:function(){
							   		flow5_step2_sendmsg();
							   	}
						   	}]
						});
	    			}else{
	    				//隐藏结果公示按钮
	    				$("#flow5_step2_datagrid").datagrid('getPager').pagination({
				    		buttons:[{
					   			iconCls:'icon-save',text:'保存',
							   	handler:function(){
							   		flow5_step2_medresult_save();
								}
					   		},'-',{
					   			iconCls:'icon-redo',text:'重置',
							   	handler:function(){
							   		init_flow5_step2_datagrid();
								}
					   		},'-','-','-',{
					   			iconCls:'icon-import',text:'Excel导入',
							   	handler:function(){
							   		flow5_step2_medresult_import();
								}
					   		},'-',{
							  	iconCls:'icon-export',
							   	text:'Excel导出',
							   	handler:function(){
							   		flow5_step2_export_info();
							   	}
						   	},'-',{
							  	iconCls:'icon-tip',
							   	text:'短息提醒',
							   	handler:function(){
							   		flow5_step2_sendmsg();
							   	}
						   	}]
						});
	    			}
	    		}else{
	    			$("#flow5_step2_datagrid").datagrid('getPager').pagination({
			    		buttons:[{
				   			iconCls:'icon-tip',text:'短信提醒',
						   	handler:function(){
						   		flow5_step2_sendmsg();
							}
				   		},'-',{
						  	iconCls:'icon-export',
						   	text:'Excel导出',
						   	handler:function(){
						   		flow5_step2_export_info();
						   	}
					   	}]
					});
	    		}
	    	}else{
	    		$("#flow5_step2_datagrid").datagrid('getPager').pagination({
		    		buttons:[{
			   			iconCls:'icon-tip',text:'短信提醒',
					   	handler:function(){
					   		flow5_step2_sendmsg();
						}
			   		},'-',{
					  	iconCls:'icon-export',
					   	text:'Excel导出',
					   	handler:function(){
					   		flow5_step2_export_info();
					   	}
				   	}]
				});
	    	}
	    }
    });
}

function flow5_step2_medresult_save(){
	layui.use('layer',function(){
		var layer = layui.layer;
		var check = before_save_checked_fs2('flow5_step2_datagrid', 'flow5_step2_datagrid_parentdiv');
	  	if(check != 0) {
	    	return;
	  	}
	  	
	  	var rows = $("#flow5_step2_datagrid").datagrid("getRows");
		for(var i = 0; i < rows.length; i++){
			$('#flow5_step2_datagrid').datagrid("endEdit", i);
		}
	  	
	  	layer.confirm('确定要保存么', function(index){
	  		var data_infos = get_datagrid_save_info();
	  		$.post("<?= yii\helpers\Url::to(['medrange/medical-save-fs2']); ?>", {"data_infos": data_infos,"recID":__flow5_recID__}, function (json) {
	            if(json.result){
	            	layer.msg(json.msg);
	            	init_flow5_step2_datagrid();
	            }else{
	            	layer.alert(json.msg);
	            }
	        });
	  	},function(){
	  		init_flow5_step2_datagrid();
	  	});
  	});
}

function get_datagrid_save_info() {
    var grid_infos = [];
    var grid_obj = {};
    var rows = $("#flow5_step2_datagrid").datagrid("getRows");
    var grid_edit_columns = ["perID","perMedCheck1", "perMedCheck2"];
    
    for (var i = 0; i < rows.length; i++) {
        grid_obj = {};
        grid_obj['perID'] = rows[i]['perID'];
        grid_obj['perMedCheck1'] = rows[i]['perMedCheck1'];
        grid_obj['perMedCheck2'] = rows[i]['perMedCheck2'];
        for (var j = 0; j < grid_edit_columns.length; j++) {
            grid_obj[grid_edit_columns[j]] = rows[i][grid_edit_columns[j]] == "" ? "" : rows[i][grid_edit_columns[j]];
        }
        grid_infos.push(grid_obj);
    }
    return grid_infos;
}

function before_save_checked_fs2(gridId,parentDivId){
	var rows = $("#"+gridId).datagrid("getRows");
	if(rows.length == 0){
		layer.alert("当前表格数据为空，无需保存！");
		return 1;
	}
	$editNodes = $(".datagrid-editable-input");
	if($editNodes == null || $editNodes == undefined || $editNodes.length == 0){
		layer.alert("表格数据没有编辑，无需保存！");
		return 1;
	}
	var check = 0;
	var field = "";
	var perentObj = null;
	var _curRow = null;
	var tdobj = null;
	var _val = '';
	var _index = '';
	var alertcontent = '';
	var checkMsg = '';
	$("#"+parentDivId).find(".datagrid-btable").find("tr").each(function (n){
		_curRow = $(this);
		tdobj = $(this).find("td[field]");
		$(tdobj).find(".datagrid-editable-input").each(function(){
			perentObj = $(this).parent().parent().parent().parent().parent().parent();
			field = perentObj.attr("field");
	 		_val=$(this).val();
			fieldyh=$(".datagrid-view2").find(".datagrid-header").find("tbody td[field='"+field+"']").find("span").html();
			_index=_curRow.attr("datagrid-row-index");
		    if(_val==''){
		    	checkMsg = "不允许为空！";
        		check = 1;
				alertcontent +="第"+(parseInt(_index)+1)+"行记录中“"+fieldyh+"”，"+checkMsg+"<br>";
			}
		});
	});
	if(check == 1){
		layer.alert(alertcontent);
	}
	return check;
}

function flow5_step2_medresult_import(){
	layui.use('layer',function(){
		var layer = layui.layer;
		layer.open({
    		type:2,
    		title:'导入体检结果',
    		area:["500px",'350px'],
    		content:"<?= yii\helpers\Url::to(['medrange/import-fs2']); ?>"+"&recID="+__flow5_recID__,
    		btn:['上传','取消'],
    		yes: function(){
    			$("iframe[id*='layui-layer-iframe'")[0].contentWindow.flow5_step1_import_data_sure(); 
	        },
    		btn2:function(){
    			layer.closeAll();
    		}
	    });
	});
}

function flow5_step2_sendmsg(){
	layui.use('layer',function(){
		var layer = layui.layer;
		layer.prompt({
		  	formType: 2,
		  	value: '',
		  	title: '编辑短信通知内容',
		  	area: ['300px', '150px']
		}, function(value, index, elem){
			  	__flow5_step2_msg_content__ = value;
	    	 	layer.open({
			  		type:2,
			  		title:'确认短信发送',
			  		area:[$(window).width()*3/4+"px",'520px'],
			  		content:"<?= yii\helpers\Url::to(['medrange/send-msg-fs2']); ?>"+"&recID="+__flow5_recID__,
			  		btn:['发送','关闭'],
			  		yes: function(){
			  			$("iframe[id*='layui-layer-iframe'")[0].contentWindow.flow5_step2_send_msg_sure(); 
				    },
			  		btn2:function(){
			  			layer.close(layer.getFrameIndex(window.name));
			  		}
			    });
		});
	});
}

function flow5_step2_export_info(){
	layui.use('layer',function(){
		var layer = layui.layer;
		if(__flow5_step2_total__ == 0){
			return layer.alert("当前没有任何数据，不需要导出");
		}else{
			window.open("<?= yii\helpers\Url::to(['medrange/export-info-fs2']); ?>"+"&recID="+__flow5_recID__+"&condition="+JSON.stringify(__flow5_step2_condition__));
		}
	});
}

function init_flow5_step2_cancle(){
	layui.use('form', function(){
		var form = layui.form;
		$("#perName").val("");
		$("#perGender").val("");
		$("#perIDCard").val("");
	  	form.render('select');
	  	init_flow5_step2_datagrid();
	});
}
</script>

