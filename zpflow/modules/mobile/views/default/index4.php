<!--
	作者：lijianlin0204@163.com
	时间：2017-12-04
	描述：个人中心界面
-->
<div class="layui-row">
	<div class="mobile-personal-header">
		<a href="javascript:;" class="medal_detail">
            <div class="mobile-info-detail">
                <div class="mobile-info-photo">
                    <?php if(!empty($perInfo)){ ?>
                    	<img src="<?= $perInfo['perPhoto']; ?>">
                    <?php }else{ ?>
                    	<img src="./images/mobile/pic.jpg">
                    <?php } ?>
                </div>
                <div class="mobile-info-name">
                    <div class="mobile-nickname">
                        <p style="color: #666;"><?= Yii::$app->user->identity->realName; ?></p>                                
                    </div>
                    <div class="mobile-login-name">
                        <p>
                        	<?php 
                        		$name = Yii::$app->user->identity->name;
								echo substr($name,0,2).'******'.substr($name, strlen($name)-2,strlen($name));
                        	?>
                        </p>
                    </div>
                </div>
            </div>
        </a>
	</div>
</div>
<div class="layui-row">
	<div style="background: white; height: 50px;">
		<p >待开发</p>
	</div>
</div>
<span>&nbsp;</span>
<div class="layui-row">
	<div style="background: white; height: 50px;line-height: 50px;font-size: 16px;opacity: 0.6;">
		<div class="layui-col-xs1">
			<div style="float: right;">&nbsp;</div>
		</div>
		<div class="layui-col-xs7">招聘历史查询</div>
		<div class="layui-col-xs4">
			<div style="float: right;margin-right: 5px;"><i class="layui-icon" style="font-size: 20px;">&#xe602;</i></div>
		</div>
	</div>
</div>
<span>&nbsp;</span>
<div class="layui-row">
	<div style="background: white; height: 50px;line-height: 50px;font-size: 16px;opacity: 0.6;">
		<div class="layui-col-xs1">
			<div style="float: right;">&nbsp;</div>
		</div>
		<div class="layui-col-xs7">我的信息</div>
		<div class="layui-col-xs4">
			<div style="float: right;margin-right: 5px;"><i class="layui-icon" style="font-size: 20px;">&#xe602;</i></div>
		</div>
	</div>
</div>
<span>&nbsp;</span>
<div class="layui-row">
	<div style="background: white; height: 50px;line-height: 50px;font-size: 16px;opacity: 0.6;">
		<div class="layui-col-xs1">
			<div style="float: right;">&nbsp;</div>
		</div>
		<div class="layui-col-xs7">问题反馈</div>
		<div class="layui-col-xs4">
			<div style="float: right;margin-right: 5px;"><i class="layui-icon" style="font-size: 20px;">&#xe602;</i></div>
		</div>
	</div>
</div>
<span>&nbsp;</span>
<div class="layui-row">
	<div style="text-align: center;">
		<a style="width: 80%;" onclick="mobile_logout()" class="layui-btn layui-btn-normal layui-btn-radius" >退出</a>
	</div>
</div>

<script type="text/javascript">
var index = <?php echo $index;?>;
$(document).ready(function() {
	$("#moblie-header span a[index='"+index+"']").addClass('current');
});

/*退出登录*/
function mobile_logout(){
	layer.open({content:'确定要退出登录？',btn: ['确定','取消'],yes: function(index){
			location.href = "<?= yii\helpers\Url::to(['default/logout']); ?>";	
		}
	});
}
</script>