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
<script>
var __flow4_step4_datagrid_flag__ = "1";
$(function(){
	layui.use(['element','form','layer'], function(){
		var element = layui.element;
		var form = layui.form;
		  	element.on('tab(flow4_step4_tab)', function(){
	    	__flow4_step4_datagrid_flag__ = this.getAttribute('lay-id');
	    	init_flow4_step4_datagrid();
	  	});
	  	
	  	form.render('select');
	  	
	});
	init_flow4_step4_datagrid();
});

function init_flow4_step4_datagrid(){
	$('#flow4_step4_datagrid').datagrid({
        width:'auto',
        height:'auto',
//	    url:stepIndex_three_urls.__list_url,
	    method: "post",
//	    queryParams: {'recID':stepIndex_three_recID,'type':stepIndex_three_tab,'search':__stepIndex_three_search},
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
	        {field:'考试地点',title:'考试地点',width:'100',align:'center',rowspan:2},
	        {field:'考试时间',title:'考试时间',width:'100',align:'center',rowspan:2,sortable:true},
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
        onDblClickRow: function(index,row){
	    },
        onLoadSuccess: function(data){
			$('#flow4_step4_datagrid').datagrid('resize',{
	    		height: $(window).height()-124-25-50
	    	});
        }
    });
}
</script>