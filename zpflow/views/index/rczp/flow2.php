<div class="headinfo">
	<span><b>招聘批次</b></span>
	<span>
	  	<select name="city" lay-verify="required" class="input1">
		    <?php foreach($pcInfo as $pc){ ?>
	        	<option value="<?php echo $pc['id']; ?>"><?php echo $pc['value']; ?></option>
	        <?php } ?>
	 	</select>
	</span>
</div>
<div id="stepIndex_two">
	
</div>
<script>
	$(function(){
		layui.use(['form','layer', 'laydate'], function(){
		});
	});
</script>