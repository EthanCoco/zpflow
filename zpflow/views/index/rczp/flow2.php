<div class="headinfo">
	<span><b>招聘批次</b></span>
	<span>
	  	<select id="recID_id" name="recID_name" lay-verify="required" class="input1" onchange="selRecruitID(this)">
		    <?php foreach($pcInfo as $pc){ ?>
	        	<option value="<?php echo $pc['id']; ?>"><?php echo $pc['value']; ?></option>
	        <?php } ?>
	 	</select>
	</span>
</div>
<div class="layui-tab layui-tab-brief" lay-filter="stepIndex_two_tab">
  	<ul class="layui-tab-title">
	    <li class="layui-this" lay-id="A">招聘公告</li>
	    <li lay-id="B">单位简介</li>
  	</ul>
  	<div class="layui-tab-content">
	    <div class="layui-tab-item layui-show">
	     	<div id="stepIndex_two_A">
	
			</div>
	    </div>
    	<div class="layui-tab-item">
    		<div id="stepIndex_two_B">
	
			</div>
    	</div>
  </div>
</div>


<script>
var __stepIndex_two_recID__ = "";
$(function(){
	__stepIndex_two_recID__ = $("#recID_id").val();
	layui.use(['element','layer', 'laydate'], function(){
		var element = layui.element;
		  	element.on('tab(stepIndex_two_tab)', function(){
	    	alert(this.getAttribute('lay-id'));
	  	});
	});
});

function selRecruitID(th){
	__stepIndex_two_recID__ = $(th).val();
}


</script>