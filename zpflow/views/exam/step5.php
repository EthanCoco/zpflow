<div class="layui-tab layui-tab-brief" lay-filter="flow4_step5_tab">
  	<ul class="layui-tab-title">
	    <li class="layui-this" lay-id="1">待录入<span id="flow4_step5_tabli1" style="display: none;"></span></li>
	    <li lay-id="2">考试通过<span id="flow4_step5_tabli2" style="display: none;"></span></li>
	    <li lay-id="3">考试不通过<span id="flow4_step5_tabli3" style="display: none;"></span></li>
	    <li lay-id="4">所有<span id="flow4_step5_tabli4" style="display: none;"></span></li>
  	</ul>
  	<div class="layui-tab-content" style="padding: 0;">
	    <div class="layui-tab-item layui-show">
	     	<div id="flow4_step5_datagrid">
	
			</div>
	    </div>
  </div>
</div>
<div id="flow4_step5_toolbar" style="padding:5px">
	<div class="layui-form">
		<div class="layui-form-item" style="margin-bottom: 0;">
		    <div class="layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: auto;font-size: 12px;">姓名</label>
		      	<div class="layui-input-inline" style="margin-right: 0;width: 120px;">
		        	<input id="perName" name="perName" class="layui-input">
		      	</div>
		    </div>
		    <!--<div class="layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: auto;font-size: 12px;">性别</label>
		      	<div class="layui-input-inline" style="margin-right: 0;width: auto;">
			        <select id="perGender" name="perGender"  lay-search="">
			          	<option value=""></option>
			          	<option value="1">男</option>
			          	<option value="2">女</option>
			        </select>
		      	</div>
		    </div>-->
		    
		    <div class="layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: auto;font-size: 12px;">身份证号</label>
		      	<div class="layui-input-inline" style="margin-right: 0;width: 120px;">
		        	<input id="perIDCard" name="perIDCard" class="layui-input">
		      	</div>
		    </div>
		    
		    <div class="layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: auto;font-size: 12px;">准考证号</label>
		      	<div class="layui-input-inline" style="margin-right: 0;width: 120px;">
		        	<input id="perTicketNo" name="perTicketNo" class="layui-input">
		      	</div>
		    </div>
		    
		    <div class="layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: auto;font-size: 12px;">考试结果</label>
		      	<div class="layui-input-inline" style="margin-right: 0;width: 120px;">
			        <select id="perExamResult" name="perExamResult"  lay-search="">
			          	<option value=""></option>
			          	<option value="0">待处理</option>
			          	<option value="1">通过</option>
			          	<option value="2">不通过</option>
			        </select>
		      	</div>
		    </div>
		    <div class="layui-inline" style="margin-bottom: 0;float: right;">
			  	<div class="layui-btn-group">
				    <button class="layui-btn" onclick="init_flow4_step5_datagrid();"><i class="layui-icon">&#xe615;</i></button>
				    <button class="layui-btn layui-btn-primary" onclick="init_flow4_step5_cancle();"><i class="layui-icon">&#xe640;</i></button>
			 	</div>
		 	</div>
	  	</div>
	</div>
</div>
<script>
var __flow4_step5_datagrid_flag__ = "1";
//var __flow4_step5_perIDs__ = [];
var __flow3_to__ = "<?= $flow3_to; ?>";
$(function(){
	layui.use(['element','form','layer'], function(){
		var element = layui.element,
			layer = layui.layer,
			form = layui.form;
		  	element.on('tab(flow4_step4_tab)', function(){
	    	__flow4_step5_datagrid_flag__ = this.getAttribute('lay-id');
	    	init_flow4_step5_datagrid();
	  	});
	  	
	  	form.render('select');
	  	
	  	<?php if($flow3_to > 0){ ?>
	  		return layer.alert('资格审查环节存在未公示的结果');
	  	<?php } ?>
	});
	init_flow4_step5_datagrid();
});

function init_flow4_step5_datagrid(){
	var perName = $("#perName").val().trim();
	var perGender = $("#perGender").val();
	var perIDCard = $("#perIDCard").val().trim();
	var perGroupSet = $("#perGroupSet").val();
	var perTicketNo = $("#perTicketNo").val().trim();
	var perExamResult = $("#perExamResult").val();
	
	$('#flow4_step5_datagrid').datagrid({
        width:'auto',
        height:'auto',
	    url:"<?= yii\helpers\Url::to(['examinee/examinee-deal-list']); ?>",
	    method: "post",
	    queryParams: {'recID':__flow4_recID__,'flag':__flow4_step5_datagrid_flag__,'perName':perName,'perGender':perGender,'perIDCard':perIDCard,'perTicketNo':perTicketNo,'perExamResult':perExamResult},
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
	    toolbar:"#flow4_step5_toolbar",
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
	        {field:'perViewScore',title:'面试成绩',width:'100',align:'center',rowspan:2},
	        {field:'perPenScore',title:'笔试成绩',width:'100',align:'center',rowspan:2,sortable:true},
	        {field:'perViewPenScore',title:'综合成绩',width:'100',align:'center',rowspan:2},
	        {field:'perExamResult',title:'考试结果',width:'100',align:'center',rowspan:2},
	        {field:'perRead3',title:'通知阅读情况',width:'100',align:'center',rowspan:2,sortable:true},
	        
	        {field:'perTJ',title:'体检反馈情况',width:'300',colspan:3,align:'center'}
	        ],[
		    	{field:'perReResult3',title:'反馈结果',width:'10%',align:'center',sortable:true},
		    	{field:'perReGiveup3',title:'放弃原因',width:'10%',align:'center'},
		    	{field:'perReTime3',title:'反馈时间',width:'130',align:'center',sortable:true,
		    		formatter:function(value,row,index){
		        		return value == "0000-00-00 00:00:00" ? "" : value;
		        	}
			    }
	    ]],
        onLoadSuccess: function(data){
//    		$("#stepIndex_four_head_pubinfo").html('');
//			$("#stepIndex_four_head_pubinfo").html('发布状态：'+ (data.pub_flag == 0 ? '未发布' : (data.pub_flag == 1 ? '暂无数据' : '已发布')));
        	
        	$("#flow4_step5_tabli1").html("");
        	$("#flow4_step5_tabli2").html("");
        	$("#flow4_step5_tabli3").html("");
        	$("#flow4_step5_tabli4").html("");
        	var headInfo = data.headInfo;
        	$("#flow4_step5_tabli1").html("("+headInfo.tab1+")");
        	$("#flow4_step5_tabli2").html("("+headInfo.tab2+")");
        	$("#flow4_step5_tabli3").html("("+headInfo.tab3+")");
        	$("#flow4_step5_tabli4").html("("+headInfo.tab4+")");
        	$("#flow4_step5_tabli1").css("display","");
        	$("#flow4_step5_tabli2").css("display","");
        	$("#flow4_step5_tabli3").css("display","");
        	$("#flow4_step5_tabli4").css("display","");
        	
			$('#flow4_step5_datagrid').datagrid('resize',{
	    		height: $(window).height()-124-25-100
	    	});
	    	
	    	if(__flow4_show_flag__ == "1"){
	    		if(__flow3_to__ != "0"){}else{}
	    	}else{
	    		$("#flow4_step5_datagrid").datagrid('getPager').pagination({
		    		buttons:[{
					  	iconCls:'icon-export',
					   	text:'Excel导出',
					   	handler:function(){
					   		layui.use('layer',function(){
					   			if(data.total == "0"){
					   				return layer.alert("当前没有任何数据，不需要导出");
					   			}
					   			window.open("<?= yii\helpers\Url::to(['examinee/examinee-export-step4']); ?>"+"&recID="+__flow4_recID__+"&condition="+JSON.stringify(data.exportInfo.condition));
					   		});
					   	}
				   	}]
				});
	    	}
        }
    });
}

function init_flow4_step5_cancle(){
	layui.use('form', function(){
		var form = layui.form;
		$("#perName").val("");
	 	$("#perGender").val("");
		$("#perIDCard").val("");
		$("#perTicketNo").val("");
		$("#perExamResult").val("");
	  	form.render('select');
	  	init_flow4_step5_datagrid();
	});
}
</script>