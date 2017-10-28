<div class="layui-tab layui-tab-brief" lay-filter="flow4_step1_tab">
  	<ul class="layui-tab-title">
	    <li class="layui-this" lay-id="1">考官分组<span id="flow4_step1_tabli1" style="display: none;"></span></li>
	    <li lay-id="2">考生分组<span id="flow4_step1_tabli2" style="display: none;"></span></li>
  	</ul>
  	<div class="layui-tab-content" style="padding: 0;">
	    <div class="layui-tab-item layui-show">
	     	<div id="flow4_step1_datagrid">
	
			</div>
	    </div>
  </div>
</div>
<script>
var __flow4_step1_datagrid_flag__ = "1";
var __flow4_step1_datagrid__; 
var __flow4_step1_editRow__ = undefined;
var __flow4_step1_editRowData__ = {};
var __flow4_step1_flowOneSingleID__ = "";
var __flow4_step1_group__ = {};
$(function(){
	layui.use(['element','layer', 'laydate'], function(){
		var element = layui.element;
		  	element.on('tab(flow4_step1_tab)', function(){
	    	__flow4_step1_datagrid_flag__ = this.getAttribute('lay-id');
	    	init_flow4_step1_datagrid();
	  	});
	});
	$.ajax({
		type:"get",
		url:"<?= yii\helpers\Url::to(['setgroup/get-group']); ?>",
		async:false,
		dataType:'json',
		success:function(json){
			__flow4_step1_group__ = json;
		}
	});
	init_flow4_step1_datagrid();
});

function init_flow4_step1_datagrid(){
	__flow4_step1_datagrid__ = $('#flow4_step1_datagrid').datagrid({
        width:'auto',
        height:'auto',
	    fitColumns: false,
	    singleSelect: true,
	    method: "post",
	    queryParams: {'gstType':__flow4_step1_datagrid_flag__,'recID':__flow4_recID__},
      	url:"<?= yii\helpers\Url::to(['setgroup/list-info']); ?>",
      	rownumbers: true, 
      	sortName:'',
	    sortOrder:'',
	    pagination: true, 
        columns:[[
        	{width:'50%',field:'gstStartEnd',title:'考试时间',align:'center',sortable:true},
        	{width:'25%',field:'gstItvStartTime',title:'考试起始时间',align:'center',hidden:true,
				editor:{
					type:'datetimebox',
					options:{
						showSeconds:false,
						required:true
					}
				}
        	},
        	{width:'25%',field:'gstItvEndTime',title:'考试终止时间',align:'center',hidden:true,
				editor:{
					type:'datetimebox',
					options:{
						showSeconds:false,
						required:true
					}
				}
        	},
            {width:'15%',field:'gstGroup',title:'组别名称',align:'center',sortable:true,
            	formatter: function(value,row,index){
					return transCodeInfo(__flow4_step1_group__,'ZBMC',value);
				},
				editor:{
					type:'combobox',
					options:{
						valueField:'id',
						textField:'text',
						data :__flow4_step1_group__,
						panelHeight:200,
						editable: false,
						required:true
					}
				}
            },
        	{width:'34%',field:'gstItvPlace',title:'考试地点',align:'center',
				editor:{
					type:'textbox',
					options:{
						required:true
					} 
				}
        	}]],
        onAfterEdit: function (rowIndex, rowData, changes) {
            __flow4_step1_editRowData__ = rowData;
        },
        onClickRow:function(index,row){
			__flow4_step1_flowOneSingleID__ = row.gstID;
        },
    	onDblClickRow:function(index,row){
	    	if(__flow4_show_flag__ == "0"){
				return;
			}
			
	    	$("#flow4_step1_datagrid").datagrid("hideColumn", 'gstStartEnd');
	    	$("#flow4_step1_datagrid").datagrid("showColumn", 'gstItvStartTime');
	    	$("#flow4_step1_datagrid").datagrid("showColumn", 'gstItvEndTime');
	    	
            if (__flow4_step1_editRow__ != undefined) {
				$("#flow4_step1_datagrid").datagrid("rejectChanges");
	            $("#flow4_step1_datagrid").datagrid("unselectAll");
                $("#flow4_step1_datagrid").datagrid("endEdit", __flow4_step1_editRow__);
                $("#flow4_step1_datagrid") = undefined;
            }
            
            if (__flow4_step1_editRow__ == undefined) {
                $("#flow4_step1_datagrid").datagrid("beginEdit", index);
                __flow4_step1_editRow__ = index;
                __flow4_step1_editRowData__ = row;
            }
	    },
        onLoadSuccess: function(data){
			$("#flow4_step1_tabli1").html("");
        	$("#flow4_step1_tabli2").html("");
        	var headInfo = data.headInfo;
        	$("#flow4_step1_tabli1").html("("+headInfo.gstType1+")");
        	$("#flow4_step1_tabli2").html("("+headInfo.gstType2+")");
        	
        	$("#flow4_step1_tabli1").css("display","");
        	$("#flow4_step1_tabli2").css("display","");
			
			mergeCellsByField("flow4_step1_datagrid", "gstStartEnd", 0);
        	$('#flow4_step1_datagrid').datagrid('resize',{
	    		height: $(window).height()-124-25-90-10
	    	});
	    	
	    	if(__flow4_show_flag__ == "1"){
		    	$("#flow4_step1_datagrid").datagrid('getPager').pagination({buttons:[
					{
					  	iconCls:'icon-add',
					   	text:'添加',
					   	handler:function(){
					   		layui.use('layer',function(){
					   			var layer = layui.layer;
						   		if (__flow4_step1_editRow__ != undefined) {
									return layer.alert("有正在编辑的行，请取消或保存后添加！");
							    }
							    if (__flow4_step1_editRow__ == undefined) {
							        __flow4_step1_datagrid__.datagrid("insertRow", {
							            index: 0,
							            row: {
							            	'gstID':'0',
							            	'gstItvPlace':__flow4_defaultplace__
							            }
							        });
							        
							        __flow4_step1_datagrid__.datagrid("hideColumn", 'gstStartEnd');
							    	__flow4_step1_datagrid__.datagrid("showColumn", 'gstItvStartTime');
							    	__flow4_step1_datagrid__.datagrid("showColumn", 'gstItvEndTime');
							        __flow4_step1_datagrid__.datagrid("beginEdit", 0);
							        __flow4_step1_editRow__ = 0;
							    }
							});
					   	}
				   	},'-',{
					  	iconCls:'icon-remove',
					   	text:'删除',
					   	handler:function(){
					   		layui.use('layer',function(){
					   			if (__flow4_step1_editRow__ != undefined) {
							 		return layer.alert("有正在编辑的行，请先取消行编辑！");
							    }
							    
								if(__flow4_step1_flowOneSingleID__ == ""){
									return layer.alert("请选择要删除的组别！");
								}
								
								layer.confirm('您确定要删除选择的组别么', function(index){
								  	$.post("<?= yii\helpers\Url::to(['setgroup/del-setgroup']); ?>",{'gstID':__flow4_step1_flowOneSingleID__,'recID':__flow4_recID__},function(json){
							            if(json.result){
							                layer.msg(json.msg);
							                init_flow4_step1_datagrid();
							                __flow4_step1_flowOneSingleID__ = "";
							            }else{
							                layer.alert(json.msg);
							            }
							        },'json');
								}); 
					   		});
					   	}
				   	},'-',{
					  	iconCls:'icon-save',
					   	text:'保存',
					   	handler:function(){
					   		layui.use('layer',function(){
					   			var layer = layui.layer;
					   			if(__flow4_step1_editRow__ == undefined){
									return;
								}
								var flag = __flow4_step1_datagrid__.datagrid("validateRow", __flow4_step1_editRow__);
								if(!flag){
									return layer.alert("存在必填项未填写，请确认后再保存！");
								}
								
								__flow4_step1_datagrid__.datagrid("endEdit", __flow4_step1_editRow__);
								
								$.ajax({
									type:"post",
									url:"<?= yii\helpers\Url::to(['setgroup/save-setgroup']); ?>",
									async:true,
									dataType:'json',
									data:{'paramInfoMod':__flow4_step1_editRowData__,'gstType':__flow4_step1_datagrid_flag__,'recID':__flow4_recID__},
									success:function(json){
										if(json.result){
											layer.alert(json.msg);
											__flow4_step1_editRow__ = undefined;
											__flow4_step1_editRowData__ = {};
											init_flow4_step1_datagrid();
											
										}else{
											__flow4_step1_datagrid__.datagrid("beginEdit", __flow4_step1_editRow__);
							                __flow4_step1_editRow__ = __flow4_step1_editRow__;
							                layer.alert(json.msg);
										}
									}
								});
					   		})
					   	}
				   	},'-',{
					  	iconCls:'icon-undo',
					   	text:'取消',
					   	handler:function(){
					   		layui.use('layer',function(){
					   			if(__flow4_step1_editRow__ != undefined){
									__flow4_step1_editRow__ = undefined;
									__flow4_step1_datagrid__.datagrid("showColumn", 'gstStartEnd');//切换成展示状态
								    __flow4_step1_datagrid__.datagrid("hideColumn", 'gstItvStartTime');
								    __flow4_step1_datagrid__.datagrid("hideColumn", 'gstItvEndTime');
							        __flow4_step1_datagrid__.datagrid("rejectChanges");
							        __flow4_step1_datagrid__.datagrid("unselectAll");
								}else{
									return ;
								}
					   		});
					   	}
				   	}]
				});
	    	}
	    }
    });
}

</script>