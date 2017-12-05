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
<div class="layui-row"  index=1 onclick="load_personal_info(1)" >
	<div style="background: white; height: 50px;line-height: 50px;font-size: 16px;opacity: 0.6;">
		<div class="layui-col-xs1">
			<div style="float: right;">&nbsp;</div>
		</div>
		<div class="layui-col-xs7"><a href="javascript:;" style="font-family: '微软雅黑';font-size: 14px;">招聘历史查询</a></div>
		<div class="layui-col-xs4">
			<div style="float: right;margin-right: 5px;"><i class="layui-icon" style="font-size: 20px;">&#xe602;</i></div>
		</div>
	</div>
</div>
<span>&nbsp;</span>
<div class="layui-row"  index=2 onclick="load_personal_info(2)" >
	<div style="background: white; height: 50px;line-height: 50px;font-size: 16px;opacity: 0.6;">
		<div class="layui-col-xs1">
			<div style="float: right;">&nbsp;</div>
		</div>
		<div class="layui-col-xs7"><a href="javascript:;" style="font-family: '微软雅黑';font-size: 14px;">我的信息</a></div>
		<div class="layui-col-xs4">
			<div style="float: right;margin-right: 5px;"><i class="layui-icon" style="font-size: 20px;">&#xe602;</i></div>
		</div>
	</div>
</div>
<span>&nbsp;</span>
<div class="layui-row"  index=3 onclick="load_personal_info(3)">
	<div style="background: white; height: 50px;line-height: 50px;font-size: 16px;opacity: 0.6;">
		<div class="layui-col-xs1">
			<div style="float: right;">&nbsp;</div>
		</div>
		<div class="layui-col-xs7"><a href="javascript:;" style="font-family: '微软雅黑';font-size: 14px;">问题反馈</a></div>
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

/*加载对应模块页面或数据*/
function load_personal_info(type){
	switch(type){
		case 1:
			
		break;
		case 2:
		
		break;
		case 3:
			questtion_reback_system();
		break;
		default:
			layer.open({content: '暂无此功能',btn: '我知道了'});
		break;
	}
}

/*问题反馈*/
function questtion_reback_system(){
	layer.open({
		    type: 1,
		    content: '<textarea id="content_reback" style="font-size: 12px;" class="layui-textarea" placeholder=""></textarea>',
		    anim: 'up',
		    style: 'position:fixed; bottom:0; left:0; width: 100%; height: 150px; padding:10px 0; border:none;',
		    btn:['提交','取消'],
		    yes: function(index){
		    	var content_reback = $("#content_reback").val();
		    	if(content_reback == ""){
		    		return layer.open({content: '请填写反馈信息',skin: 'msg',time: 2 });
		    	}
		    	
		    	layer.open({content:'确定要提交反馈？',btn: ['确定','取消'],yes: function(index){
						$.post("<?= yii\helpers\Url::to(['grzx/grzx-reback']); ?>",{'rb_content':content_reback},function(json){
							if(json.result){
								layer.open({content: json.msg,skin: 'footer',time: 2 });
								setTimeout(function(){
									layer.closeAll();
								},2000); 
							}else{
								layer.open({content: json.msg,btn: '我知道了'});
							}
						},'json');
				    }
				});
		    }
		});
}
</script>