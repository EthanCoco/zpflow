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
	      	<input id="login_pwd" style="font-size: 13px;" class="layui-input" placeholder="请输入密码" type="text">
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
	layui.use('layer',function(){
		var layer = layui.layer;
		var login_name = $("#login_name").val().trim();
		var login_pwd = $("#login_pwd").val().trim();
		var login_vcode = $("#login_vcode").val().trim();
		if(login_name == "" || login_pwd == ""){
			//layer.msg('不开心。。', {icon: 5,anim:6});
			layer.alert("Dsdsd");
		}
	});
}

</script>