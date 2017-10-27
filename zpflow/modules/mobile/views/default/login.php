<div id="mobile-login">
	<div class="layui-row">
		<div class="mobile-login-title">
			<h2>用户登录</h2>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label">身份证号：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="login_name" style="font-size: 13px;" class="layui-input" placeholder="请输入身份证号码" type="text">
	    </div>
  	</div>
	<div class="layui-row"  style="padding:25px 0 ;">
	    <div class="layui-col-xs4"><label class="mobile-input-label">密码：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="login_pwd" style="font-size: 13px;" class="layui-input" placeholder="请输入密码"  type="password">
	    </div>
  	</div>
	
	<div class="layui-row"  style="padding:0 0 25px 0;">
	    <div class="layui-col-xs4"><label class="mobile-input-label">验证码：</label></div>
	    <div class="layui-col-xs4">
	      	<input id="login_vcode" style="font-size: 13px;" class="layui-input" placeholder="请输入验证码" type="text">
	    </div>
	    <div class="layui-col-xs4"><img id="mobile-vcode-img" class="mobile-valcode" src="<?= yii\helpers\Url::to(['default/valcode']); ?>" onclick="this.src='<?= yii\helpers\Url::to(['default/valcode']); ?>&'+Math.random();" /></div>
  	</div>
	
	<div class="layui-row">
		<div class="layui-col-xs6">
			<div style="text-align: center;">
			<button onclick="mobile_user_login()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 120px;width: 60%;">登录</button></div>
		</div>
		<div class="layui-col-xs6">
			<div style="text-align: center;">
			<button onclick="change_mobile(1)" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 120px;width: 60%;">注册</button></div>
		</div>
	</div>
	<div class="layui-row">
		<div class="mobile-forget-pwd">
			<a>忘记密码？</a>
		</div>
	</div>	
</div>

<div id="mobile-reg" style="display: none;">
	<div class="layui-row">
		<div class="mobile-login-title">
			<h2>用户注册</h2>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label">身份证号：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="reg_name" style="font-size: 13px;" class="layui-input" placeholder="填写真实身份证号" type="text">
	    </div>
  	</div>
  	<div class="layui-row"  style="padding:25px 0 ;">
	    <div class="layui-col-xs4"><label class="mobile-input-label">姓名：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="reg_realName" style="font-size: 13px;" class="layui-input" placeholder="填写真实姓名"  type="text">
	    </div>
  	</div>
  	<div class="layui-row" >
	    <div class="layui-col-xs4"><label class="mobile-input-label">手机号码：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="reg_phone" style="font-size: 13px;" class="layui-input" placeholder="填写真实手机号码"  type="text">
	    </div>
  	</div>
  	
	<div class="layui-row"  style="padding:25px 0 ;">
	    <div class="layui-col-xs4"><label class="mobile-input-label">密码：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="reg_pwd" style="font-size: 13px;" class="layui-input" placeholder="密码长度6-20"  type="password">
	    </div>
  	</div>
	<div class="layui-row" style="padding:0 0 25px 0;">
	    <div class="layui-col-xs4"><label class="mobile-input-label">确认密码：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="reg_sure_pwd" style="font-size: 13px;" class="layui-input" placeholder="密码确认"  type="password">
	    </div>
  	</div>
	
	<div class="layui-row">
		<div class="layui-col-xs12">
			<div style="text-align: center;">
			<button onclick="mobile_user_reg()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 120px;width: 100%;">注册</button></div>
		</div>
	</div>
	
	<div style="width: 100%;text-align: center;height: 30px;line-height: 30px;margin-top: 10px;color: #888;" >
		<p onclick="change_mobile(2)">已有账号登录</p>
	</div>
</div>

<script>
var index = "<?= $index ?>"
$(function(){
	$("#mobile-vcode-img").click();
	$("#moblie-header span a[index='"+index+"']").addClass('current');
});

function mobile_user_login(){
	var login_name = $("#login_name").val().trim();
	var login_pwd = $("#login_pwd").val().trim();
	var login_vcode = $("#login_vcode").val().trim();
	if(login_name == "" || login_pwd == ""){
		layer.open({content: '身份证号或密码不能为空',skin: 'footer',time: 2 });
		return;
	}
	if(!validateIdCard(login_name)){
		$("#login_name").focus();
		return;
	}
	
	if(login_vcode == ""){
		$("#login_vcode").focus();
		layer.open({content: '验证码不能为空',skin: 'footer',time: 2 });
		return;
	}
	
	layer.open({type: 2,content: '登录中'});
	$.ajax({
		type:"post",
		url:"<?= yii\helpers\Url::to(['default/login-do']); ?>",
		data:{'User':{'name':login_name,'password':MD5(login_pwd),'vcode':login_vcode}},
		dataType:'json',
		async:true,
		success:function(json){
			layer.closeAll();
			if(json.result){
				window.location.href = "<?= yii\helpers\Url::to(['default/index']) ?>"+"&index="+index;
			}else{
				if(typeof json.type !== "undefined"){
					$("#mobile-vcode-img").click();
					$("#login_vcode").val("");
					$("#login_vcode").focus();
				}
				layer.open({content: json.msg,btn: '我知道了'});
			}
		}
	});
}

function change_mobile(type){
	if(type == 1){
		$('#mobile-login').css('display','none');
		$('#mobile-reg').css('display','block');
	}else{
		$('#mobile-reg').css('display','none');
		$('#mobile-login').css('display','block');
	}
}

function mobile_user_reg(){
	var reg_name = $("#reg_name").val().trim();
	var reg_realName = $("#reg_realName").val().trim();
	var reg_phone = $("#reg_phone").val().trim();
	var reg_pwd = $("#reg_pwd").val().trim();
	var reg_sure_pwd = $("#reg_sure_pwd").val().trim();
	if(reg_name == ""){
		layer.open({content: '身份证号不能为空',skin: 'footer',time: 2 });
		return;
	}
	if(!validateIdCard(reg_name)){
		return ;
	}
	if(reg_realName == ""){
		layer.open({content: '姓名不能为空',skin: 'footer',time: 2 });
		return;
	}
	if(reg_phone == ""){
		layer.open({content: '手机号码不能为空',skin: 'footer',time: 2 });
		return;
	}
	
	var validatePhoneNumber = validatePhone(reg_phone);
	if(validatePhoneNumber == false){
		layer.open({content: '手机号码格式不正确',skin: 'footer',time: 2 });
		return;
	}
	
	if(reg_pwd == "" || reg_sure_pwd == ""){
		layer.open({content: '密码不能为空',skin: 'footer',time: 2 });
		return;
	}
	if(reg_pwd != reg_sure_pwd){
		layer.open({content: '两次密码不一致',skin: 'footer',time: 2 });
		return;
	}
	
	var validatePassWord = validatePwd(reg_pwd);
	if(validatePassWord == false){
		layer.open({content: '密码格式只能为6-20位数字或字母',skin: 'footer',time: 2 });
		return;
	}
	
	layer.open({type: 2,content: '注册中'});
	$.ajax({
		type:"post",
		url:"<?= yii\helpers\Url::to(['default/register']); ?>",
		data:{'User':{'name':reg_name,'password':MD5(reg_pwd),'realName':reg_realName,'phone':reg_phone}},
		dataType:'json',
		async:true,
		success:function(json){
			layer.closeAll();
			if(json.result){
				layer.open({content:json.msg+",点击确定到登录页面",btn: ['确定'],yes: function(index){
				      	window.location.href = "<?= yii\helpers\Url::to(['default/index']) ?>"+"&index=2";
				      	layer.close(index);
				    }
				});
			}else{
				layer.open({content: json.msg,btn: '我知道了'});
			}
		}
	});
}
</script>