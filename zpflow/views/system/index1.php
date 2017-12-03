<div id="system_user">
	
</div>
<div id="system_user_toolbar" style="padding:5px">
	<div class="layui-form">
		<div class="layui-form-item" style="margin-bottom: 0;">
		    <div class="layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: auto;font-size: 12px;">用户名</label>
		      	<div class="layui-input-inline" style="margin-right: 0;width: auto;">
		        	<input id="name" name="name" class="layui-input">
		      	</div>
		    </div>
		    <div class="layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: auto;font-size: 12px;">真实姓名</label>
		      	<div class="layui-input-inline" style="margin-right: 0;width: auto;">
		        	<input id="realName" name="realName" class="layui-input">
		      	</div>
		    </div>
		    <div class="layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: auto;font-size: 12px;">手机号码</label>
		      	<div class="layui-input-inline" style="margin-right: 0;width: auto;">
		        	<input id="phone" name="phone" class="layui-input">
		      	</div>
		    </div>
		    
		    <div class="layui-inline" style="margin-bottom: 0;float: right;">
			  	<div class="layui-btn-group">
				    <button class="layui-btn" onclick="load_system_user();"><i class="layui-icon">&#xe615;</i></button>
				    <button class="layui-btn layui-btn-primary" onclick="load_system_user_cancle();"><i class="layui-icon">&#xe640;</i></button>
			 	</div>
		 	</div>
	  	</div>
	</div>
</div>
<script>
$(function(){
	layui.use('form', function(){
		var form = layui.form;
	});	
	
	load_system_user();
});

function load_system_user(){
	var name = $("#name").val().trim();
	var realName = $("#realName").val();
	var phone = $("#phone").val().trim();
	
	$('#system_user').datagrid({
        width:'auto',
        height:'auto',
	    url:"<?= yii\helpers\Url::to(['sysdata/sys-user-list']); ?>",
	    method: "post",
	    queryParams: {'name':name,'realName':realName,'phone':phone},
	    striped: true,
	    fixed: true,
	    fitColumns: false,
	    singleSelect: true,
        pagination: true,  
	    rownumbers: true, 
	    pageNumber:1,
	    pageSize:20,
	    pageList:[20,50,100,200],
	    sortName:'',
	    sortOrder:'',
	    toolbar:"#system_user_toolbar",
        columns:[[
	        {field:'name',title:'账号',width:'200',align:'center',sortable:true},
	        {field:'realName',title:'真实姓名',width:'150',align:'center',sortable:true,
	        	formatter:function(value,row,index){
	        		if(value == "" || value == null){
	        			return value;
	        		}else{
	        			return "<a href='javascript:;' style='color:blue;text-decoration:underline;' onclick='sys_user_detail(\""+row.perID+"\",\""+row.name+"\",\""+row.realName+"\")'>"+value+"</a>";
	        		}
	        	}
	        },
	        {field:'phone',title:'手机号码',width:'200',align:'center',sortable:true},
	        {field:'userRegisterTime',title:'注册时间',width:'20%',align:'center',sortable:true,
        		formatter:function(value,row,index){
	        		return value == "0000-00-00 00:00:00" ? "" : value;
	        	}
	        },
	        {field:'userLoginCount',title:'登录次数',width:'100',align:'center',sortable:true},
	        {field:'userLastLoginTime',title:'最后登录时间',width:'20%',align:'center',sortable:true,
        		formatter:function(value,row,index){
	        		return value == "0000-00-00 00:00:00" ? "" : value;
	        	}
	        },
	        {field:'operate',title:'操作',width:'100',align:'center',
        		formatter:function(value,row,index){
	        		return "<a href='javascript:;' style='color:blue;text-decoration:underline;' onclick='sys_user_resetpwd("+row.uid+")'>重置密码</a>";
	        	}
	        },
	    ]],
        onLoadSuccess: function(data){
			$('#system_user').datagrid('resize',{
	    		height: $(window).height()-124-15
	    	});
    	}
    });
}

function load_system_user_cancle(){
	layui.use('form', function(){
		var form = layui.form;
		$("#name").val("");
	 	$("#realName").val("");
		$("#phone").val("");
	  	load_system_user();
	});
}

function sys_user_resetpwd(uid){
	layui.use('layer',function(){
		var layer = layui.layer;
		
		layer.confirm('您确定要重置密码么？', function(index){
			$.post("<?= yii\helpers\Url::to(['sysdata/sys-user-resetpwd']) ?>",{'uid':uid},function(json){
				if(json.result){
					load_system_user();
					layer.msg(json.msg);
					layer.close(index);
				}else{
					layer.alert(json.msg);
				}
			},'json');
		});
	});
}

function sys_user_detail(perID,name,realName){
	layui.use('layer',function(){
		var layer = layui.layer;
		var tname = realName=="" ? name : realName;
		var title = '【'+ tname +'】详情';
		layer.open({
	  		type:2,
	  		title:title,
	  		area:["600px",'520px'],
	  		content:"<?= yii\helpers\Url::to(['system/sys-user-detail']); ?>"+"&perID="+perID
	    });
	});
}
</script>