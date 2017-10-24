<script>
	var index = "<?= $index ?>"
	$(document).ready(function() {
		layui.use('layer',function(){
			$("#moblie-header span a[index='"+index+"']").addClass('current');
			layer.alert("您不是应聘者，不允许登录");
		});
	});
</script>