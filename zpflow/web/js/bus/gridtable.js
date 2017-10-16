/*人才招聘-招聘设置-招聘列表*/
function init_stepIndex_one_grid(url,repair_url,recdel_url){
    $('#stepIndex_one').datagrid({
        width:'auto',
        height:'auto',
	    url:url,
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
            {field:'recViewPlace',title:'考试地点',width:'20%',align:'center',},
            {field:'recHealthPlace',title:'体检地点',width:'20%',align:'center',},
            {field:'recDefault',title:'默认招聘年度',width:'9%',align:'center'},
        ]],
        onDblClickRow: function(rowIndex,rowData){
        	
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
		        		area:["600px",'475px'],
		        		content:repair_url
		        	}); 
				});
		   	}
	   	},'-',{
		  	iconCls:'icon-remove',
		   	text:'删除',
		   	handler:function(){
				
			}
	   	}]
	});
    
    
    
    
    
}