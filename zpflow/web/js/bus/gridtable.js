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
var __rczp_zpgg_stepIndex_two_datagrid_flag__ = "A";
var __rczp_zpgg_stepIndex_two_show_flag__ = "";
var __rczp_zpgg_stepIndex_two_recID__ = "";

function init_stepIndex_two_grid_AB(stepIndex_two_urls,stepIndex_two_recID,stepIndex_two_datagrid_flag,stepIndex_two_show_flag){
	__rczp_zpgg_stepIndex_two_urls__ = stepIndex_two_urls;
	__rczp_zpgg_stepIndex_two_recID__ = stepIndex_two_recID;
	__rczp_zpgg_stepIndex_two_datagrid_flag__ = stepIndex_two_datagrid_flag;
	__rczp_zpgg_stepIndex_two_show_flag__ = stepIndex_two_show_flag;
	if(stepIndex_two_datagrid_flag == "A"){
		var cloumns = [[
        	{field:'ck',checkbox:true,width:'10%'},
            {field:'ancName',title:'公告名称',width:'25%',align:'center',},
            {field:'ancTime',title:'发布时间',width:'25%',align:'center',},
            {field:'ancStatus',title:'发布状态',width:'25%',align:'center',
            	formatter:function(value,row,index){
            		return value == "1" ? "已发布" : (value == 2 ? "已归档" : "未发布");
            	}
            },
            {field:'operation',title:'操作',width:'24%',align:'center',
            	formatter:function(value,row,index){
            		var _html = "<button onclick=\"viewAnnounce("+row.ancID+")\" class=\"layui-btn layui-btn-primary layui-btn-small  layui-btn-radius \">预览</button>";
            		if(row.ancStatus == "2"){
            			return _html+"";
            		}else if(row.ancStatus == "1"){
            			return _html+"<button onclick=\"pubAnnounce("+row.ancID+",0,'"+row.ancName+"')\" class=\"layui-btn layui-btn-primary layui-btn-small  layui-btn-radius \">取消</button>";
            		}else{
            			return _html+"<button onclick=\"pubAnnounce("+row.ancID+",1,'"+row.ancName+"')\" class=\"layui-btn layui-btn-primary layui-btn-small  layui-btn-radius \">发布</button>";
            		}
            	}
            },
        ]];
	}else{
		var cloumns = [[
        	{field:'ck',checkbox:true,width:'10%'},
            {field:'ancName',title:'单位简介',width:'25%',align:'center',},
            {field:'ancTime',title:'发布时间',width:'25%',align:'center',},
            {field:'ancStatus',title:'发布状态',width:'25%',align:'center',
            	formatter:function(value,row,index){
            		return value == "1" ? "已发布" : (value == 2 ? "已归档" : "未发布");
            	}
            },
            {field:'operation',title:'操作',width:'24%',align:'center',
            	formatter:function(value,row,index){
            		var _html = "<button onclick=\"viewAnnounce("+row.ancID+")\" class=\"layui-btn layui-btn-primary layui-btn-small  layui-btn-radius \">预览</button>";
            		if(row.ancStatus == "2"){
            			return _html+"";
            		}else if(row.ancStatus == "1"){
            			return _html+"<button onclick=\"pubAnnounce("+row.ancID+",0,'"+row.ancName+"')\" class=\"layui-btn layui-btn-primary layui-btn-small  layui-btn-radius \">取消</button>";
            		}else{
            			return _html+"<button onclick=\"pubAnnounce("+row.ancID+",1,'"+row.ancName+"')\" class=\"layui-btn layui-btn-primary layui-btn-small  layui-btn-radius \">发布</button>";
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
	    queryParams: {'recID':stepIndex_two_recID,'ancType':stepIndex_two_datagrid_flag},
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
        	var msg = "";
		 	if(__rczp_zpgg_stepIndex_two_datagrid_flag__ == "A"){
		 		msg = "招聘公告";
		 	}else{
		 		msg = "单位简介";
		 	}
        	layui.use('layer', function(){
				var layer = layui.layer;
				if(__rczp_zpgg_stepIndex_two_show_flag__ == "1"){
					if(row.ancStatus == "1"){
						layer.alert('此'+msg+"【"+row.ancName+"】已经发布了，如需修改，请先取消发布");
						return;
					}
					
					layer.open({
		        		type:2,
		        		title:'修改'+msg,
		        		area:["650px",'505px'],
		        		content:__rczp_zpgg_stepIndex_two_urls__.__repair_url+"&flag=mod&ancID="+row.ancID+"&ancType="+__rczp_zpgg_stepIndex_two_datagrid_flag__
		        	}); 
				}
        	});
	    },
        onLoadSuccess: function(data){
			$('#stepIndex_two_' + stepIndex_two_datagrid_flag).datagrid('resize',{
	    		height: $(window).height()-124-25-60
	    	});
	    }
    });
	
	if(__rczp_zpgg_stepIndex_two_show_flag__ == "1"){
		var msg = "";
	 	if(__rczp_zpgg_stepIndex_two_datagrid_flag__ == "A"){
	 		msg = "招聘公告";
	 	}else{
	 		msg = "单位简介";
	 	}
		$('#stepIndex_two_' + __rczp_zpgg_stepIndex_two_datagrid_flag__).datagrid('getPager').pagination({buttons:[
			{
			   	iconCls:'icon-add',
			   	text:'添加',
			   	handler:function(){
					layui.use('layer', function(){
					 	var layer = layui.layer;
					 	layer.open({
			        		type:2,
			        		title:'添加'+msg,
			        		area:["650px",'505px'],
			        		content:__rczp_zpgg_stepIndex_two_urls__.__repair_url+"&flag=add&ancType="+__rczp_zpgg_stepIndex_two_datagrid_flag__
			        	}); 
					});
			   	}
		   	},'-',{
			  	iconCls:'icon-remove',
			   	text:'删除',
			   	handler:function(){
			   		layui.use('layer', function(){
					 	var layer = layui.layer;
					 	var rows = $('#stepIndex_two_' + __rczp_zpgg_stepIndex_two_datagrid_flag__).datagrid("getSelections");
						var len = rows.length;
						if(len == 0){
							layui.layer.alert("请选择要删除的"+msg);
							return;
						}
						
						var selectInfoIds = [];
						var flag = 0;
						for(var i = 0; i < len; i++){
					   		if(rows[i].ancStatus != "0"){
					   			flag = 1;
		           				break;
					   		}else{
					   			selectInfoIds.push(rows[i].ancID);
					   		}
					   	}
						
						if(!flag){
							layer.confirm('您确定要删除勾选的【'+len+'】条'+msg+'数据么', function(index){
							  	$.post(__rczp_zpgg_stepIndex_two_urls__.__recdel_url,{'ancIDs':selectInfoIds},function(json){
									if(json.result){
										layer.msg(json.msg);
										init_stepIndex_two_grid_AB(__rczp_zpgg_stepIndex_two_urls__,__rczp_zpgg_stepIndex_two_recID__,__rczp_zpgg_stepIndex_two_datagrid_flag__,__rczp_zpgg_stepIndex_two_show_flag__);
										layer.close(index);
									}else{
										layer.alert(json.msg);
									}
								},'json');
							}); 
						}else{
							layui.layer.alert("选择删除的数据中包含已发布的"+msg+"信息");
							return;
						}
					});
				}
		   	}]
		});
	}
}

function pubAnnounce(ancID,type,ancName){
	var msg = ['取消发布','发布'];
	layui.use('layer', function(){
	 	var layer = layui.layer;
	 	layer.confirm('您确定要'+msg[type]+'【'+ancName+'】么?', function(index){
		  	$.post(__rczp_zpgg_stepIndex_two_urls__.__recpub_url,{'ancID':ancID,'ancStatus':type},function(json){
				if(json.result){
					layer.msg(json.msg);
					init_stepIndex_two_grid_AB(__rczp_zpgg_stepIndex_two_urls__,__rczp_zpgg_stepIndex_two_recID__,__rczp_zpgg_stepIndex_two_datagrid_flag__,__rczp_zpgg_stepIndex_two_show_flag__);
					layer.close(index);
				}else{
					layer.alert(json.msg);
				}
			},'json');
		}); 
	});
}

function viewAnnounce(ancID){
	layui.use('layer', function(){
	 	var layer = layui.layer;
	 	layer.open({
    		type:2,
    		title:'预览',
    		area:[$(window).width()/2+"px",'520px'],
    		content:__rczp_zpgg_stepIndex_two_urls__.__recpre_url+"&ancID="+ancID,
    		btn:['关闭'],
    		btn2:function(){
    			layer.closeAll();
    		}
    	}); 
	});
}



/*人才招聘-资格审查-数据列表*/
var __rczp_zgsc_stepIndex_three_urls__ = {};
var __rczp_zgsc_stepIndex_three_tab__ = "1";
var __rczp_zgsc_stepIndex_three_show_flag__ = "";
var __rczp_zgsc_stepIndex_three_recID__ = "";

function init_stepIndex_three_grid(stepIndex_three_urls,stepIndex_three_recID,stepIndex_three_tab,stepIndex_three_show_flag){
	var __stepIndex_three_search = {
		'perName' : "",
		'perGender' : "",
		'perBirth' : "",
		'perReResult1' : "",
	};
	if(stepIndex_three_tab == __rczp_zgsc_stepIndex_three_tab__){
		__stepIndex_three_search.perName = $("#stepIndex_three_search #perName").val();
		__stepIndex_three_search.perGender = $("#stepIndex_three_search #perGender").val();
		__stepIndex_three_search.perBirth = $("#stepIndex_three_search #perBirth").val();
		__stepIndex_three_search.perReResult1 = $("#stepIndex_three_search #perReResult1").val();
	}
	
	__rczp_zgsc_stepIndex_three_urls__ = stepIndex_three_urls;
	__rczp_zgsc_stepIndex_three_recID__ = stepIndex_three_recID;
	__rczp_zgsc_stepIndex_three_tab__ = stepIndex_three_tab;
	__rczp_zgsc_stepIndex_three_show_flag__ = stepIndex_three_show_flag;
	
	$('#stepIndex_three').datagrid({
        width:'auto',
        height:'auto',
	    url:stepIndex_three_urls.__list_url,
	    method: "post",
	    queryParams: {'recID':stepIndex_three_recID,'type':stepIndex_three_tab,'search':__stepIndex_three_search},
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
	    frozenColumns:[[
    		{field:'ck',checkbox:true},
	        {field:'perIndex',title:'报名序号',width:'80',align:'center',sortable:true},
	        {field:'perName',title:'姓名',width:'70',align:'center',sortable:true},
        ]], 
        columns:[[
	        {field:'perIDCard',title:'身份证号',width:'180',align:'center',rowspan:2,sortable:true},
	        {field:'perGender',title:'性别',width:'5%',align:'center',rowspan:2,sortable:true,
	        	formatter:function(value,row,index){
	        		return value == "1" ? "男" : "女";
	        	}
	        },
	        {field:'perBirth',title:'出生年月',width:'100',align:'center',rowspan:2,sortable:true},
	        {field:'perJob',title:'应聘岗位性质',width:'8%',align:'center',rowspan:2,sortable:true,
	        	formatter:function(value,row,index){
	        		return value == "01" ? "事业" : "企业";
	        	}
	        },
	        {field:'perPhone',title:'手机号码',width:'100',align:'center',rowspan:2},
	        {field:'perStatus',title:'审查结果',width:'100',align:'center',rowspan:2,sortable:true,
	        	formatter:function(value,row,index){
	        		return value == "1" ? "待审" : (value == "2" ? "通过" : "不通过");
	        	}
	        },
	        {field:'perPub',title:'公示结果',width:'80',align:'center',rowspan:2,sortable:true,
	        	formatter:function(value,row,index){
	        		return value == "0" ? "未公示" : "<span style='color:red;'>已公示</span>";
	        	}
	        },
	        {field:'perReason',title:'审查不通过原因',width:'10%',align:'center',rowspan:2},
	        {field:'perCheckTime',title:'审查时间',width:'130',align:'center',rowspan:2,sortable:true},
	        {field:'perZGSC',title:'考试反馈结果',width:'300',colspan:3,align:'center'}
	        ],[
		    	{field:'perReResult1',title:'反馈结果',width:'10%',align:'center',sortable:true,
		    		formatter:function(value,row,index){
		        		return value == "01" ? "确定参加" : (value == "02" ? "放弃参加" : "未反馈");
		        	}
		    	},
		    	{field:'perReGiveup1',title:'放弃原因',width:'10%',align:'center'},
		    	{field:'perReTime1',title:'反馈时间',width:'130',align:'center',sortable:true}
	    ]],
        onDblClickRow: function(index,row){
        	
	    },
        onLoadSuccess: function(data){
        	var tabs = data.tabInfo;
        	$("#stepIndex_three_tab #stepIndex_three_tabli1").html("");
        	$("#stepIndex_three_tab #stepIndex_three_tabli2").html("");
        	$("#stepIndex_three_tab #stepIndex_three_tabli3").html("");
        	$("#stepIndex_three_tab #stepIndex_three_tabli4").html("");
        	
        	$("#stepIndex_three_tab #stepIndex_three_tabli1").html("("+tabs.tab1+")");
        	$("#stepIndex_three_tab #stepIndex_three_tabli2").html("("+tabs.tab2+")");
        	$("#stepIndex_three_tab #stepIndex_three_tabli3").html("("+tabs.tab3+")");
        	$("#stepIndex_three_tab #stepIndex_three_tabli4").html("("+tabs.tab4+")");
        	
        	$("#stepIndex_three_tab #stepIndex_three_tabli1").css("display","");
        	$("#stepIndex_three_tab #stepIndex_three_tabli2").css("display","");
        	$("#stepIndex_three_tab #stepIndex_three_tabli3").css("display","");
        	$("#stepIndex_three_tab #stepIndex_three_tabli4").css("display","");
        	
			$('#stepIndex_three').datagrid('resize',{
	    		height: $(window).height()-124-25-60-30-5
	    	});
	    }
    });
	
}
