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
	    <div class="layui-col-xs4"><img class="mobile-valcode" src="<?= yii\helpers\Url::to(['default/valcode']); ?>" onclick="this.src='<?= yii\helpers\Url::to(['default/valcode']); ?>&'+Math.random();" /></div>
  	</div>
	
	<div class="layui-row">
		<div class="layui-col-xs6">
			<div style="text-align: center;">
			<button onclick="mobile_user_login()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 120px;width: 60%;">登录</button></div>
		</div>
		<div class="layui-col-xs6">
			<div style="text-align: center;">
			<button class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 120px;width: 60%;">注册</button></div>
		</div>
	</div>
	<div class="layui-row">
		<div class="mobile-forget-pwd">
			<a>忘记密码？</a>
		</div>
	</div>	
</div>

<script>
var index = "<?= $index ?>"
$(function(){
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
		return;
	}
	
	if(login_vcode == ""){
		layer.open({content: '验证码不能为空',skin: 'footer',time: 2 });
		return;
	}
	
	$.ajax({
		type:"post",
		url:"<?= yii\helpers\Url::to(['default/login-do']); ?>",
		data:{'User':{'name':login_name,'password':MD5(login_pwd),'vcode':login_vcode}},
		dataType:'json',
		async:true,
		success:function(json){
			if(json.result){
				window.location.href = "<?= yii\helpers\Url::to(['default/index']) ?>"+"&index="+index;
			}else{
				layer.open({content: json.msg,btn: '我知道了'});
			}
		}
	});
}

</script>