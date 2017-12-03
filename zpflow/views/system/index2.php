<div id="system_admin">
	
</div>
<div id="system_admin_toolbar" style="padding:5px">
	<div class="layui-form">
		<div class="layui-form-item" style="margin-bottom: 0;">
		    <div class="layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: auto;font-size: 12px;">账号</label>
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
				    <button class="layui-btn" onclick="load_system_admin();"><i class="layui-icon">&#xe615;</i></button>
				    <button class="layui-btn layui-btn-primary" onclick="load_system_admin_cancle();"><i class="layui-icon">&#xe640;</i></button>
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
	
	load_system_admin();
});

function load_system_admin(){
	var name = $("#name").val().trim();
	var realName = $("#realName").val();
	var phone = $("#phone").val().trim();
	
	$('#system_admin').datagrid({
        width:'auto',
        height:'auto',
	    url:"<?= yii\helpers\Url::to(['sysdata/sys-user-list']); ?>",
	    method: "post",
	    queryParams: {'name':name,'realName':realName,'phone':phone,'type':'2'},
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
	    toolbar:"#system_admin_toolbar",
        columns:[[
	        {field:'name',title:'账号',width:'200',align:'center',sortable:true},
	        {field:'realName',title:'真实姓名',width:'150',align:'center',sortable:true},
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
	        		return "<a href='javascript:;' style='color:blue;text-decoration:underline;' onclick='sys_admin_resetpwd("+row.uid+")'>重置密码</a>";
	        	}
	        },
	    ]],
	    onDblClickRow:function(index,row){
	    	layui.use('layer',function(){
	   			var layer = layui.layer;
	   			layer.open({
		    		type:2,
		    		title:'修改管理员',
		    		area:["500px",'350px'],
		    		content:"<?= yii\helpers\Url::to(['system/sys-admin-repair']); ?>"+"&uid="+row.uid,
		    		btn:['保存','取消'],
		    		yes: function(){
		    			$("iframe[id*='layui-layer-iframe'")[0].contentWindow.system_admin_save(); 
			        },
		    		btn2:function(){
		    			layer.closeAll();
		    		}
			    });
	   		});
	    },
        onLoadSuccess: function(data){
			$('#system_admin').datagrid('resize',{
	    		height: $(window).height()-124-15
	    	});
	    	
	    	$("#system_admin").datagrid('getPager').pagination({
	    		buttons:[{
		   			iconCls:'icon-add',text:'添加',
				   	handler:function(){
				   		layui.use('layer',function(){
				   			var layer = layui.layer;
				   			layer.open({
					    		type:2,
					    		title:'添加管理员',
					    		area:["500px",'350px'],
					    		content:"<?= yii\helpers\Url::to(['system/sys-admin-repair']); ?>"+"&uid=",
					    		btn:['保存','取消'],
					    		yes: function(){
					    			$("iframe[id*='layui-layer-iframe'")[0].contentWindow.system_admin_save(); 
						        },
					    		btn2:function(){
					    			layer.closeAll();
					    		}
						    });
				   		});
					}
		   		},'-',{
				  	iconCls:'icon-remove',
				   	text:'删除',
				   	handler:function(){
				   		layui.use('layer',function(){
				   			var layer = layui.layer;
				   			var row = $('#system_admin').datagrid('getSelected');
				   			if(row == "" || row == null || typeof row === "undefined"){
				   				return layer.alert('请选择要删除的用户');
				   			}
				   			
				   			layer.confirm('您确定要删除'+row.name+'用户吗？',function(index){
								$.post("<?= yii\helpers\Url::to(['sysdata/sys-user-del']); ?>",{'uid':row.uid},function(json){
									if(json.result){
										load_system_admin();
										layer.msg(json.msg)
										layer.close(index);
									}else{
										layer.alert(json.msg);
									}
								},'json');				   				
				   			});
				   		});
				   	}
			   	}]
			});
    	}
    });
}

function load_system_admin_cancle(){
	layui.use('form', function(){
		var form = layui.form;
		$("#name").val("");
	 	$("#realName").val("");
		$("#phone").val("");
	  	load_system_admin();
	});
}

function sys_admin_resetpwd(uid){
	layui.use('layer',function(){
		var layer = layui.layer;
		
		layer.confirm('您确定要重置密码么？', function(index){
			$.post("<?= yii\helpers\Url::to(['sysdata/sys-user-resetpwd']) ?>",{'uid':uid},function(json){
				if(json.result){
					load_system_admin();
					layer.msg(json.msg);
					layer.close(index);
				}else{
					layer.alert(json.msg);
				}
			},'json');
		});
	});
}
</script>