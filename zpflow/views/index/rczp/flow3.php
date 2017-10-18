<div class="headinfo">
	<span><b>招聘批次</b></span>
	<span>
	  	<select id="recID_id" name="recID_name" lay-verify="required" class="input1" onchange="selRecruitID(this)">
		    <?php foreach($pcInfo as $pc){ ?>
	        	<option code="<?php echo $pc['code']; ?>" value="<?php echo $pc['id']; ?>"><?php echo $pc['value']; ?></option>
	        <?php } ?>
	 	</select>
	</span>
</div>
<div class="layui-tab layui-tab-brief" lay-filter="stepIndex_three_tab">
  	<ul class="layui-tab-title">
	    <li class="layui-this" lay-id="0">待审核</li>
	    <li lay-id="1">审核通过</li>
	    <li lay-id="2">审核不通过</li>
	    <li lay-id="-1">所有</li>
  	</ul>
  	<div class="layui-tab-content">
	    <div class="layui-tab-item layui-show">
	     	<div id="stepIndex_three">
				
			</div>
	    </div>
  </div>
</div>

<script>
$(function(){
	$("#stepIndex_three").html("待审核");
	layui.use(['element','layer', 'laydate'], function(){
		var element = layui.element;
		  	element.on('tab(stepIndex_three_tab)', function(){
	    	$("#stepIndex_three").html(this.getAttribute('lay-id'));
	  	});
	});
});
</script>