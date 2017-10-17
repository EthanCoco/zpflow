/*人才招聘-招聘设置-招聘列表*/
var __rczp_zpsz_stepIndex_one_urls__ = {};

function init_stepIndex_one_grid(stepIndex_one_urls){
	__rczp_zpsz_stepIndex_one_urls__ = stepIndex_one_urls;
    $('#stepIndex_one').datagrid({
        width:'auto',
        height:'auto',
	    url:stepIndex_one_urls.__list_url,
	    method: "post",
	    queryParams: {},
	    striped: true,
	    fixed: true,
	    fitColumns: false,
	    singleSelect: false,
        pagination: true,  
	    rownumbers: true, 
	    pageNumber:1,
	    pageSize:20,
	    pageList:[20,50,100,200],
        columns:[[
        	{field:'ck',checkbox:true,width:'10%'},
            {field:'recYear',title:'招聘年度',width:'10%',align:'center',},
            {field:'recBatch',title:'招聘批次',width:'10%',align:'center',},
            {field:'recStart',title:'报名起始时间',width:'15%',align:'center',},
            {field:'recEnd',title:'报名终止时间',width:'15%',align:'center',},
            {field:'recViewPlace',title:'考试地点',width:'15%',align:'center',},
            {field:'recHealthPlace',title:'体检地点',width:'15%',align:'center',},
            {field:'recDefault',title:'是否进行中',width:'9%',align:'center',
            	formatter:function(value,row,index){
            		return value == "1" ? "是" : (value == 2 ? "已结束" : "否");
            	}
            },
            {field:'operation',title:'操作',width:'10%',align:'center',
            	formatter:function(value,row,index){
            		if(row.recDefault == "1" || row.recDefault == "2"){
            			//return "<button onclick=\"javascript: return;\" class=\"layui-btn layui-btn-primary layui-btn-small  layui-btn-radius  layui-btn-disabled \">发布</button>";
            			return "";
            		}else{
            			return "<button onclick=\"pubRecruit("+row.recID+",'"+row.recYear+"','"+row.recBatch+"')\" class=\"layui-btn layui-btn-primary layui-btn-small  layui-btn-radius \">发布</button>";
            		}
            	}
            },
        ]],
        onDblClickRow: function(index,row){
        	layui.use('layer', function(){
				var layer = layui.layer;
	        	var recDefault = row.recDefault;
	        	if(recDefault == 1){
	        		layui.layer.alert("该招聘正在进行中，不允许修改");
					return;
	        	}else if(recDefault == 2){
	        		layui.layer.alert("该招聘已结束归档，不允许修改");
					return;
	        	}
	        	
	        	layer.open({
	        		type:2,
	        		title:'修改招聘年度',
	        		area:["600px",'420px'],
	        		content:stepIndex_one_urls.__repair_url+"&flag=mod&recID="+row.recID
	        	});
	        	
	        	
        	});
	    },
        onLoadSuccess: function(data){
			$('#stepIndex_one').datagrid('resize',{
	    		height: $(window).height()-124-25
	    	});
	    }
    });
    
    $("#stepIndex_one").datagrid('getPager').pagination({buttons:[
		{
		   	iconCls:'icon-add',
		   	text:'添加',
		   	handler:function(){
				layui.use('layer', function(){
				 	var layer = layui.layer;
				  	layer.open({
		        		type:2,
		        		title:'添加招聘年度',
		        		area:["600px",'420px'],
		        		content:stepIndex_one_urls.__repair_url+"&flag=add"
		        	}); 
				});
		   	}
	   	},'-',{
		  	iconCls:'icon-remove',
		   	text:'删除',
		   	handler:function(){
		   		layui.use('layer', function(){
				 	var layer = layui.layer;
				 	var rows = $("#stepIndex_one").datagrid("getSelections");
					var len = rows.length;
					if(len == 0){
						layui.layer.alert("请选择要删除的招聘信息");
						return;
					}
					
					var selectInfoIds = [];
					var flag = 0;
					for(var i = 0; i < len; i++){
				   		if(rows[i]["recDefault"] != "0"){
				   			flag = 1;
	           				break;
				   		}else{
				   			selectInfoIds.push(rows[i].recID);
				   		}
				   	}
					
					if(!flag){
						layer.confirm('您确定要删除勾选的【'+len+'】条数据么', function(index){
						  	$.post(__rczp_zpsz_stepIndex_one_urls__.__recdel_url,{'recIDs':selectInfoIds},function(json){
								if(json.result){
									layer.msg(json.msg);
									init_stepIndex_one_grid(__rczp_zpsz_stepIndex_one_urls__);
									layer.close(index);
								}else{
									layer.alert(json.msg);
								}
							},'json');
						}); 
					}else{
						layui.layer.alert("选择删除的数据中包含已结束或进行中招聘信息");
						return;
					}
				});
				
			}
	   	}]
	});
}

function pubRecruit(recID,recYear,recBatch){
	layui.use('layer', function(){
	 	var layer = layui.layer;
	 	layer.confirm('您确定要发布招聘年度【'+recYear+'】，招聘批次【'+recBatch+'】么?<br/><span style="color:red;">注意：一旦发布，招聘截止时间没有结束将不可修改操作！</span>', function(index){
		  	$.post(__rczp_zpsz_stepIndex_one_urls__.__recpub_url,{'recID':recID},function(json){
				if(json.result){
					layer.msg(json.msg);
					init_stepIndex_one_grid(__rczp_zpsz_stepIndex_one_urls__);
					layer.close(index);
				}else{
					layer.alert(json.msg);
				}
			},'json');
		}); 
	});
}


/*人才招聘-招聘公告-公告列表*/
var __rczp_zpgg_stepIndex_two_urls__ = {};
var __rczp_zpgg_stepIndex_two_datagrid_flag = "A";
function init_stepIndex_two_grid_AB(stepIndex_two_urls,stepIndex_two_datagrid_flag){
	__rczp_zpgg_stepIndex_two_urls__ = stepIndex_two_urls;
	__rczp_zpgg_stepIndex_two_datagrid_flag = stepIndex_two_datagrid_flag;
	if(stepIndex_two_datagrid_flag == "A"){
		var cloumns = [[
        	{field:'ck',checkbox:true,width:'10%'},
            {field:'ancName',title:'公告名称',width:'10%',align:'center',},
            {field:'ancTime',title:'发布时间',width:'10%',align:'center',},
            {field:'ancStatus',title:'发布状态',width:'9%',align:'center',
            	formatter:function(value,row,index){
            		return value == "1" ? "已发布" : (value == 2 ? "已归档" : "未发布");
            	}
            },
            {field:'operation',title:'操作',width:'10%',align:'center',
            	formatter:function(value,row,index){
            		if(row.ancStatus == "1" || row.ancStatus == "2"){
            			
            		}else{
            			return "<button onclick=\"pubRecruit("+row.recID+","+row.ancID+")\" class=\"layui-btn layui-btn-primary layui-btn-small  layui-btn-radius \">发布</button>";
            		}
            	}
            },
        ]];
	}else{
		var cloumns = [[
        	{field:'ck',checkbox:true,width:'10%'},
            {field:'ancName',title:'单位简介',width:'10%',align:'center',},
            {field:'ancTime',title:'发布时间',width:'10%',align:'center',},
            {field:'ancStatus',title:'发布状态',width:'9%',align:'center',
            	formatter:function(value,row,index){
            		return value == "1" ? "已发布" : (value == 2 ? "已归档" : "未发布");
            	}
            },
            {field:'operation',title:'操作',width:'10%',align:'center',
            	formatter:function(value,row,index){
            		if(row.ancStatus == "1" || row.ancStatus == "2"){
            			
            		}else{
            			return "<button onclick=\"pubRecruit("+row.recID+","+row.ancID+")\" class=\"layui-btn layui-btn-primary layui-btn-small  layui-btn-radius \">发布</button>";
            		}
            	}
            },
        ]];
	}
	$('#stepIndex_two_' + stepIndex_two_datagrid_flag).datagrid({
        width:'auto',
        height:'auto',
	    url:stepIndex_two_urls.__list_url,
	    method: "post",
	    queryParams: {},
	    striped: true,
	    fixed: true,
	    fitColumns: false,
	    singleSelect: false,
        pagination: true,  
	    rownumbers: true, 
	    pageNumber:1,
	    pageSize:20,
	    pageList:[20,50,100,200],
        columns:cloumns,
        onDblClickRow: function(index,row){
        	layui.use('layer', function(){
				var layer = layui.layer;
        	});
	    },
        onLoadSuccess: function(data){
			$('#stepIndex_two_' + stepIndex_two_datagrid_flag).datagrid('resize',{
	    		height: $(window).height()-124-25
	    	});
	    }
    });
	
}
