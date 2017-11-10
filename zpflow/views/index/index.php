<div class="layui-side1 layui-bg-black">
    <div class="layui-side-scroll1">
      	<div class="main_left" style="top: 94px;">
			<a index="1" onclick="changeMenu(1)" href="javascript:;" class="current">招聘<br>设置</a>
			<i class="layui-icon">&#xe61a;</i> 
			<a index="2" onclick="changeMenu(2)" href="javascript:;">招聘<br>公告</a>
			<i class="layui-icon">&#xe61a;</i> 
			<a index="3" onclick="changeMenu(3)" href="javascript:;">资格<br>审查</a>
			<i class="layui-icon">&#xe61a;</i> 
			<a index="4" onclick="changeMenu(4)" href="javascript:;">考<br/>试</a>
			<i class="layui-icon">&#xe61a;</i> 
			<a index="5" onclick="changeMenu(5)" href="javascript:;">体<br/>检</a>
			<i class="layui-icon">&#xe61a;</i> 
			<a index="6" onclick="changeMenu(6)" href="javascript:;">政审<br>公示</a>
		</div>
    </div>
</div>
  
<div class="layui-body1">
	<div id="stepIndex">
		
	</div>
</div>
  
<script type="text/javascript">
$(function(){
	changeTop(1);
	changeMenu(1);
});
/**
 * 左侧菜单切换
 */
function changeMenu(index){
	$(".main_left a").removeClass('current');//加上默认选中的样式
	var aObj = $(".main_left a[index='"+index+"']");
	aObj.addClass('current');
	var url ="<?= yii\helpers\Url::to(['index/rczp']); ?>"+"&index="+index;
	if(url){
		$("#stepIndex").load(url);
	}
}
</script>