<div class="layui-side layui-bg-black"  style="top: 94px;">
    <div class="layui-side-scroll" style="height: 100%;">
      	<ul class="layui-nav layui-nav-tree">
		  	<li class="layui-nav-item layui-nav-itemed">
		  		<a href="javascript:;">信息管理</a>
			    <dl class="layui-nav-child">
				    <dd class="layui-this"><a index=1 onclick="load_system_info(1)" href="javascript:;">用户管理</a></dd>
				    <dd ><a index=2 onclick="" href="javascript:;">管理员管理</a></dd>
				    <dd ><a index=3 onclick="" href="javascript:;">其他设置</a></dd>
			    </dl>
		  	</li>
		</ul>
    </div>
</div>
  
<div class="layui-body" style="top: 94px;height: 85%;min-width: 1000px;">
	<div id="stepSystem" class="hg-div">
	</div>
</div>

<script type="text/javascript">
$(function(){
	changeTop(4);
	load_system_info(1);
});

function load_system_info(index){
	$("#stepSystem").empty();
	$("#stepSystem").load("<?= yii\helpers\Url::to(['system/index']); ?>"+"&index="+index);
}	
</script>