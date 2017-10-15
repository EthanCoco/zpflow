/*人才招聘-招聘设置-招聘列表*/
function init_stepIndex_one_grid(){
    $('#stepIndex_one').datagrid({
        width:'auto',
        height:'auto',
        striped: true,
	    fixed: true,
	    fitColumns: false,
	    singleSelect: false,
	    method: "post",
	    queryParams: {},
        url:'',
        pagination: true,  
	    rownumbers: true, 
	    pageNumber:1,
	    pageSize:20,
	    pageList:[20,50,80,100,200],
        columns:[[
        	{field:'ck',checkbox:true,width:'10%'},
            {field:'recruitYear',title:'招聘年度',width:'10%',align:'center',},
            {field:'recruitTime',title:'招聘批次',width:'10%',align:'center',},
            {field:'recruitStart',title:'报名起始时间',width:'15%',align:'center',},
            {field:'recruitEnd',title:'报名截止时间',width:'15%',align:'center',},
            {field:'interviewPlace',title:'考试地点',width:'15%',align:'center',},
            {field:'healthPlace',title:'体检地点',width:'15%',align:'center',},
            {field:'recruitState',title:'是否当前默认招聘年度',width:'10%',align:'center',
//          	formatter:function(value){
//          	  if(value==1){
//		                return "是";
//          		}else{
//		                return "否";
//          		}
//	            }
	        }
        ]],
        onDblClickRow: function(rowIndex,rowData){
        	
	    },
        onLoadSuccess: function(data){
//      	var contentObj = $(".mainright");
//			$(".datagrid-wrap",contentObj).css("border-left","0px");
//			$(".datagrid-wrap",contentObj).css("border-right","0px");
//			$(".datagrid-wrap",contentObj).css("border-top","0px");
//			$('#recruitTable').datagrid('resize',{
//	    		height: contentObj.height()-32
//	    	});
	    }
    });
}