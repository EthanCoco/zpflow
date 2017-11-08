<div class="headinfo">
	<span><b>招聘批次</b></span>
	<span>
	  	<select id="recID_id" name="recID_name" lay-verify="required" class="input1" onchange="selRecruitID(this)">
		    <?php foreach($pcInfo as $pc){ ?>
	        	<option defaultplace="<?php echo $pc['recViewPlace']; ?>" recend="<?php echo $pc['recend']; ?>" code="<?php echo $pc['code']; ?>" value="<?php echo $pc['id']; ?>"><?php echo $pc['value']; ?></option>
	        <?php } ?>
	 	</select>
	</span>
	<span id="stepIndex_six_head_pubinfo" style="color: red; "></span>
</div>

<div id="stepIndex_six_toolbar" style="padding:5px">
	<div class="layui-form">
		<div class="layui-form-item" style="margin-bottom: 0;">
		    <div class="layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: auto;font-size: 12px;">姓名</label>
		      	<div class="layui-input-inline" style="margin-right: 0;width: auto;">
		        	<input id="perName" name="perName" class="layui-input">
		      	</div>
		    </div>
		    <div class="layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: auto;font-size: 12px;">性别</label>
		      	<div class="layui-input-inline" style="margin-right: 0;width: auto;">
			        <select id="perGender" name="perGender"  lay-search="">
			          	<option value=""></option>
				        <option value="1">男</option>
				        <option value="2">女</option>
			        </select>
		      	</div>
		    </div>
		    <div class="layui-inline" style="margin-bottom: 0;">
		      	<label class="layui-form-label" style="width: auto;font-size: 12px;">身份证号</label>
		      	<div class="layui-input-inline" style="margin-right: 0;width: auto;">
		        	<input id="perIDCard" name="perIDCard" class="layui-input">
		      	</div>
		    </div>
		    
		    <div class="layui-inline" style="margin-bottom: 0;float: right;">
			  	<div class="layui-btn-group">
				    <button class="layui-btn" onclick=""><i class="layui-icon">&#xe615;</i></button>
				    <button class="layui-btn layui-btn-primary" onclick="stepIndex_six_clear()"><i class="layui-icon">&#xe640;</i></button>
			 	</div>
		 	</div>
	  	</div>
	  	
	</div>
</div>

<hr class="layui-bg-blue" style="margin: 1px 0;">
<div class="layui-tab layui-tab-brief" lay-filter="stepIndex_six_tab">
  	<ul class="layui-tab-title" id="stepIndex_three_tab">
	    <li class="layui-this" lay-id="1">待审核<span id="stepIndex_six_tabli1" style="display: none;"></span></li>
	    <li lay-id="2">审核通过<span id="stepIndex_six_tabli2" style="display: none;"></span></li>
	    <li lay-id="3">审核不通过<span id="stepIndex_six_tabli3" style="display: none;"></span></li>
	    <li lay-id="4">放弃政审<span id="stepIndex_six_tabli4" style="display: none;"></span></li>
	    <li lay-id="5">所有<span id="stepIndex_six_tabli5" style="display: none;"></span></li>
  	</ul>
  	<div class="layui-tab-content" style="padding: 0;"> 
	    <div class="layui-tab-item layui-show">
	     	<div id="stepIndex_six">
				
			</div>
	    </div>
  </div>
</div>

<script>
var __flow6_recID__ = "";
var __flow6_show_flag__ = "";
var __flow6_datagrid_flag__ = "1";
$(function(){
	__flow6_recID__ = $("#recID_id").val();
	__flow6_show_flag__ = $("#recID_id option:selected").attr("code");
	
	layui.use(['element','form','layer', 'laydate'], function(){
		var element = layui.element;
		var form = layui.form;
		  	element.on('tab(flow5_step1_tab)', function(){
	    	__flow6_datagrid_flag__ = this.getAttribute('lay-id');
	    	init_stepIndex_flow6_datagrid();
	  	});
	  	
	  	form.render('select');
	  	
//	  	<php if($flow3_to > 0){ ?>
//	  		return layer.alert('资格审查环节存在未公示的结果');
//	  	<php }elseif($flow4_to > 0){ ?>
//	  		return layer.alert('考试录入环节存在未公示的人员');
//	  	<php } ?>
	  	
	});
});

function selRecruitID(th){
	__flow6_recID__ = $(th).val();
	__flow6_show_flag__ = $("#recID_id option:selected").attr("code");
	init_stepIndex_flow6_datagrid();
}