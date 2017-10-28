<div class="layui-tab layui-tab-brief" lay-filter="flow4_step2_tab">
  	<ul class="layui-tab-title">
	    <li class="layui-this" lay-id="1">公务员考官<span id="flow4_step2_tabli1" style="display: none;"></span></li>
	    <li lay-id="2">其他考官<span id="flow4_step2_tabli2" style="display: none;"></span></li>
	    <li lay-id="3">所有考官<span id="flow4_step2_tabli3" style="display: none;"></span></li>
  	</ul>
  	<div class="layui-tab-content" style="padding: 0;">
	    <div class="layui-tab-item layui-show">
	     	<div id="flow4_step2_datagrid">
	
			</div>
	    </div>
  </div>
</div>
<div id="flow4_step2_toolbar" style="padding:5px">
	<div class="layui-form">
		<div class="layui-form-item" style="margin-bottom: 0;">
		    <div class="layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: auto;font-size: 12px;">姓名</label>
		      	<div class="layui-input-inline" style="margin-right: 0;width: auto;">
		        	<input id="exmName" name="exmName" class="layui-input">
		      	</div>
		    </div>
		    <div class="layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: auto;font-size: 12px;">考官类型</label>
		      	<div class="layui-input-inline" style="margin-right: 0;width: auto;">
			        <select id="exmType" name="exmType"  lay-search="">
			          	<option value=""></option>
			          	<option value="1">主考官</option>
			          	<option value="2">固定考官</option>
			          	<option value="3">监督员</option>
			        </select>
		      	</div>
		    </div>
		    <div class="layui-inline" style="margin-bottom: 0;float: right;">
			  	<div class="layui-btn-group">
				    <button class="layui-btn" onclick="init_flow4_step2_datagrid();"><i class="layui-icon">&#xe615;</i></button>
				    <button class="layui-btn layui-btn-primary" onclick="init_flow4_step2_cancle();"><i class="layui-icon">&#xe640;</i></button>
			 	</div>
		 	</div>
	  	</div>
	  	
	</div>
</div>



<script>
var __flow4_step2_datagrid_flag__ = "1";
$(function(){
	layui.use(['element','form','layer', 'laydate'], function(){
		var element = layui.element;
		var form = layui.form;
		  	element.on('tab(flow4_step2_tab)', function(){
	    	__flow4_step2_datagrid_flag__ = this.getAttribute('lay-id');
	    	init_flow4_step2_datagrid();
	  	});
	  	
	  	form.render('select');
	  	
	});
	init_flow4_step2_datagrid();
});

function init_flow4_step2_datagrid(){
	var exmName = $("#exmName").val().trim();
	var exmType = $("#exmType").val();
	
	$('#flow4_step2_datagrid').datagrid({
        width:'auto',
        height:'auto',
	    fitColumns: false,
	    singleSelect: false,
	    rownumbers: true,
	    method: "post",
	    queryParams: {'exmName':exmName,'exmType':exmType,'recID':__flow4_recID__,'type':__flow4_step2_datagrid_flag__},
      	url:"<?= yii\helpers\Url::to(['examiner/list-info']); ?>",
      	rownumbers: true, 
      	sortName:'',
	    sortOrder:'',
	    pagination: true, 
	    toolbar:'#flow4_step2_toolbar',
        columns:[[
        	{field:'ck',checkbox:true,width:'10%'},
        	{width:'12%',field:'exmName',title:'姓名',align:'center',sortable:true},
        	{width:'12%',field:'exmAttr',title:'考官属性',align:'center',sortable:true},
        	{width:'10%',field:'exmType',title:'考官类别',align:'center',sortable:true},
        	{width:'15%',field:'exmCom',title:'考官所在单位',align:'center'},
        	{width:'14%',field:'exmPost',title:'考官职务',align:'center'},
        	{width:'10%',field:'exmPhone',title:'手机号码',align:'center',sortable:true},
        	{width:'15%',field:'exmCertNo',title:'证书编号',align:'center',sortable:true},
        	{width:'10%',field:'exmTime',title:'到岗时间',align:'center'},
        ]],
    	onDblClickRow:function(index,row){
	    	
	    },
        onLoadSuccess: function(data){
			$("#flow4_step2_tabli1").html("");
        	$("#flow4_step2_tabli2").html("");
        	$("#flow4_step2_tabli3").html("");
        	var headInfo = data.headInfo;
        	$("#flow4_step2_tabli1").html("("+headInfo.tab1+")");
        	$("#flow4_step2_tabli2").html("("+headInfo.tab2+")");
        	$("#flow4_step2_tabli3").html("("+headInfo.tab3+")");
        	
        	$("#flow4_step2_tabli1").css("display","");
        	$("#flow4_step2_tabli2").css("display","");
        	$("#flow4_step2_tabli3").css("display","");
			
        	$('#flow4_step2_datagrid').datagrid('resize',{
	    		height: $(window).height()-124-25-90-10
	    	});
	    	
	    	if(__flow4_show_flag__ == "1"){
		    	$("#flow4_step2_datagrid").datagrid('getPager').pagination({
		    		showPageList:false,
		    		displayMsg:'',
		    		layout:['sep','refresh'],
		    		buttons:[{
					  	iconCls:'icon-add',
					   	text:'添加',
					   	handler:function(){
					   		
					   	}
				   	},'-',{
					  	iconCls:'icon-remove',
					   	text:'删除',
					   	handler:function(){
					   		
					   	}
				   	},'-',{
					  	iconCls:'icon-import',
					   	text:'Excel导入',
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
	    		$("#flow4_step2_datagrid").datagrid('getPager').pagination({
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

function init_flow4_step2_cancle(){
	layui.use('form', function(){
		var form = layui.form;
		$("#exmName").val("");
		$("#exmType").val("");
	  	form.render('select');
	  	init_flow4_step2_datagrid();
	});
}
</script>

