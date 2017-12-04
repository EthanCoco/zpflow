<!--
	作者：lijianlin0204@163.com
	时间：2017-12-04
	描述：默认界面非应聘者进入提示
-->
<script>
	var index = "<?= $index ?>"
	$(document).ready(function() {
		$("#moblie-header span a[index='"+index+"']").addClass('current');
		layer.open({content: '您不是应聘者，不允许登录',btn: '我知道了'});
	});
</script>