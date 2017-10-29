<div id="flow4_step3_datagrid">

</div>
<script>
var __flow4_step3_title_info__ = {};
var __flow4_step3_total_flag__ = "0";
$(function(){
	init_flow4_step3_datagrid();
});


function init_flow4_step3_datagrid(){
	$('#flow4_step3_datagrid').datagrid({
        width:'auto',
        height:'auto',
	    fitColumns: false,
	    singleSelect: true,
	    rownumbers: true,
	    method: "post",
	    queryParams: {'recID':__flow4_recID__},
      	url:"<?= yii\helpers\Url::to(['examiner/examiner-group-list']); ?>",
      	sortName:'',
	    sortOrder:'',
	    pagination: true, 
        columns:[[
        	{width:'30%',field:'gstStartEnd',title:'考试时间',align:'center',sortable:true},
        	{width:'15%',field:'gstGroup',title:'组别名称',align:'center',sortable:true},
        	{width:'15%',field:'gstItvPlace',title:'考试地点',align:'center'},
        	{width:'40%',field:'exmNames',title:'选择考官',align:'left'},
        ]],
        onClickRow:function(index,row){
			flowThreeSingleID = row;
        },
        onLoadSuccess: function(data){
        	mergeCellsByField("flow4_step3_datagrid", "gstStartEnd", 0);
        	
        	__flow4_step3_title_info__ = {'sy':data.examiner_num,'yap':data.examiner_num_deal,'wap':data.examiner_num_nodeal};
        	__flow4_step3_total_flag__ = data.total;
        	
        	$("div[class$='datagrid-header']").find("div[class$='exmNames']:not(.datagrid-sort-icon)").html("选择考官<span style='color:#6DBFFF;'>（考官总数/未安排人数："+data.examiner_num+"/"+data.examiner_num_nodeal+"）<span>");
        	
        	$('#flow4_step3_datagrid').datagrid('resize',{
	    		height: $(window).height()-124-25-50
	    	});
	    	
	    	if(__flow4_show_flag__ == "1"){
		    	$("#flow4_step3_datagrid").datagrid('getPager').pagination({
		    		showPageList:false,
		    		displayMsg:'',
		    		layout:['sep','refresh'],
		    		buttons:[{
					  	iconCls:'icon-add',
					   	text:'分配考官',
					   	handler:function(){
					   		layui.use('layer',function(){
					   			var layer = layui.layer;
					   		});
					   	}
				   	},'-',{
					  	iconCls:'icon-tip',
					   	text:'短信提醒',
					   	handler:function(){
					   		
					   	}
				   	},'-',{
					  	iconCls:'icon-print',
					   	text:'打印签到表',
					   	handler:function(){
					   		
					   	}
				   	},'-',{
					  	iconCls:'icon-export',
					   	text:'Excel导出',
					   	handler:function(){
					   		
					   	}
				   	}]
				});
	    	}else{
	    		$("#flow4_step3_datagrid").datagrid('getPager').pagination({
		    		showPageList:false,
		    		displayMsg:'',
		    		layout:['sep','refresh'],
		    		buttons:[{
					  	iconCls:'icon-export',
					   	text:'Excel导出',
					   	handler:function(){
					   		
					   	}
				   	}]
				});
	    	}
	    }
    });
}	
</script>