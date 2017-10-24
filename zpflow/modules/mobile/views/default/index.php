<script>
	var index = "<?= $index ?>"
	$(document).ready(function() {
		$("#moblie-header span a[index='"+index+"']").addClass('current');
		layer.open({content: '您不是应聘者，不允许登录',btn: '我知道了'});
	});
</script>