<div style="padding: 10px;margin-bottom: 60px;">
	<div class="layui-row">
		<div class="mobile-enter-title">
			<h2>流程信息</h2>
			<p style="color: red;"><?= $dealData['title'] ?></p>
	    </div>
	</div>
	
	<?php if(!empty($dealData['step1'])){ ?>
		<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
		  	<legend style="font-size: 14px;color: blue;padding: 5px;">step1&nbsp;&nbsp;&nbsp;&nbsp;报名信息</legend>
			<div class="layui-row">
			    <div class="layui-col-xs4"><label class="mobile-input-label">报名序号：</label></div>
			    <div class="layui-col-xs8">
			    	<label class="mobile-input-label2"><span><?= $dealData['step1']['perIndex']; ?></span></label>
			    </div>
			</div>
			<div class="layui-row">
			    <div class="layui-col-xs4"><label class="mobile-input-label">姓名：</label></div>
			    <div class="layui-col-xs8">
			    	<label class="mobile-input-label2"><span><?= $dealData['step1']['perName']; ?></span></label>
			    </div>
			</div>
			<div class="layui-row">
			    <div class="layui-col-xs4"><label class="mobile-input-label">身份证号：</label></div>
			    <div class="layui-col-xs8">
			    	<label class="mobile-input-label2"><span><?= $dealData['step1']['perIDCard']; ?></span></label>
			    </div>
			</div>
			<div class="layui-row">
			    <div class="layui-col-xs4"><label class="mobile-input-label">性别：</label></div>
			    <div class="layui-col-xs8">
			    	<label class="mobile-input-label2"><span><?= $dealData['step1']['perGender']; ?></span></label>
			    </div>
			</div>
			<div class="layui-row">
			    <div class="layui-col-xs4"><label class="mobile-input-label">出生日期：</label></div>
			    <div class="layui-col-xs8">
			    	<label class="mobile-input-label2"><span><?= $dealData['step1']['perBirth']; ?></span></label>
			    </div>
			</div>
			<div class="layui-row">
			    <div class="layui-col-xs4"><label class="mobile-input-label">手机号码：</label></div>
			    <div class="layui-col-xs8">
			    	<label class="mobile-input-label2"><span><?= $dealData['step1']['perPhone']; ?></span></label>
			    </div>
			</div>
			<div class="layui-row">
			    <div class="layui-col-xs4"><label class="mobile-input-label">电子邮箱：</label></div>
			    <div class="layui-col-xs8">
			    	<label class="mobile-input-label2"><span><?= $dealData['step1']['perEmail']; ?></span></label>
			    </div>
			</div>
			<div class="layui-row">
			    <div class="layui-col-xs4"><label class="mobile-input-label">毕业院校：</label></div>
			    <div class="layui-col-xs8">
			    	<label class="mobile-input-label2"><span><?= $dealData['step1']['perUniversity']; ?></span></label>
			    </div>
			</div>
			<div class="layui-row">
			    <div class="layui-col-xs4"><label class="mobile-input-label">应聘岗位性质：</label></div>
			    <div class="layui-col-xs8">
			    	<label class="mobile-input-label2"><span><?= $dealData['step1']['perJob']; ?></span></label>
			    </div>
			</div>
		</fieldset>
	<?php } ?>
	
	
	<?php if($dealData['baseData']['perPub'] == 0){ ?>
		<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
		  	<legend style="font-size: 14px;color: blue;padding: 5px;">step2&nbsp;&nbsp;&nbsp;&nbsp;资格审查信息</legend>
		  	<div class="layui-row">
				<div style="margin-left: -2px;color: #666;">
				    <div class="layui-textarea">
				    	<b>资料信息正在审核当中，请耐性等候...</b>
				    </div>
			    </div>
			</div>
		</fieldset>
	<?php }else{ ?>
		<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
		  	<legend style="font-size: 14px;color: blue;padding: 5px;">step2&nbsp;&nbsp;&nbsp;&nbsp;资格审查信息</legend>
		  	<div class="layui-row">
				<div style="margin-left: -2px;color: #666;">
				    <div class="layui-textarea">
				    	<p><b>资格审查结果：</b></p>
				    	<b><?= $dealData['step2']['step2Result']; ?></b>
				    	<p><b>资格审查日期：</b></p>
				    	<b><?= $dealData['step2']['perCheckTime']; ?></b>
				    </div>
			    </div>
			</div>
		</fieldset>
		
		<!--//TODO 考试安排环节 --> 
		
		
		
	<?php } ?>
	
	
		
</div>
