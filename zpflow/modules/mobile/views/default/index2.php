<div class="layui-row">
	<div class="mobile-index2-content" id='index2_content'>
		
	</div>
</div>




<script type="text/javascript">
var index = <?php echo $index;?>;
var flowtype = "<?= $flowtype ?>";
$(document).ready(function() {
	$("#moblie-header span a[index='"+index+"']").addClass('current');
	mobile_load_zpcx();
});

function mobile_load_zpcx(){
	$("#index2_content").empty();
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/index']); ?>"+"&index="+flowtype);
//	switch(flowtype){
//		case "1" :
//		  	//alert('期待下次报名');okay
//		break;
//		case "2" :
//		  	//alert("正在报名 已经报名");okay
//		break;
//		case "3" :
//		  	//alert("正在报名 还未报名 前去报名");okay
//		break;
//		case "4" :
//		  	//alert("报名结束 正在处理等待结果（考试，体检，政审环节）");
//		break;
//		default:
//		  	alert("错误页面");
//		break;
//	}
}
</script>