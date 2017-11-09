<div class="layui-side layui-bg-black"  style="top: 94px;">
    <div class="layui-side-scroll" style="height: 100%;">
      	<ul class="layui-nav layui-nav-tree" lay-filter="test">
		  	<li class="layui-nav-item layui-nav-itemed">
			    <a href="javascript:;">默认展开</a>
			    <dl class="layui-nav-child">
			      	<dd><a href="javascript:;">选项1</a></dd>
			      	<dd><a href="javascript:;">选项2</a></dd>
			      	<dd><a href="">跳转</a></dd>
			      	<dd><a href="javascript:;">选项1</a></dd>
			      	<dd><a href="javascript:;">选项2</a></dd>
			    </dl>
		  	</li>
		  	<li class="layui-nav-item">
			    <a href="javascript:;">解决方案</a>
			    <dl class="layui-nav-child">
			      	<dd><a href="">移动模块</a></dd>
			      	<dd><a href="">后台模版</a></dd>
			      	<dd><a href="">电商平台</a></dd>
			    </dl>
		  	</li>
		  	<li class="layui-nav-item"><a href="">产品</a></li>
		  	<li class="layui-nav-item"><a href="">大数据</a></li>
		</ul>
    </div>
</div>
  
<div class="layui-body" style="top: 94px;height: 90%;min-width: 1000px;">
	<div id="stepStatistics" class="hg-div">
		
		<div class="hg-left">
		    1
		</div>
		<div class="hg-right">
		    2
		</div>
		<div class="hg-left">
		    3
		</div>
		<div class="hg-right">
		    4
		</div>
	</div>
</div>

<script type="text/javascript">
$(function(){
	changeTop(3);
	
	layui.use('element',function(){
		var element = layui.element;
	});
	
});
</script>