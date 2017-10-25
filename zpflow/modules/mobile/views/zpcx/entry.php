<div style="padding: 10px;margin-bottom: 60px;">
	<div class="layui-row">
		<div class="mobile-enter-title">
			<h2>1、基本信息填写</h2>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>姓名：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="perName" style="font-size: 12px;" class="layui-input" placeholder="请输入真实姓名" type="text" must="1" page="1">
	    </div>
	</div>
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>性别：</label></div>
	    <div class="layui-col-xs8">
	    	<select id="perGender" style="font-size: 12px;" class="layui-input" must="1" page="1">
	    		<option value="">请选择性别</option>
	    		<?php foreach($codes['XB'] as $val){ ?>
	             	<option value="<?php echo $val['codeID'] ?>"><?php echo $val['codeName']; ?></option>;
	            <?php }; ?> 
	    	</select>
	    </div>
	</div>
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>身份证号：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="perIDCard" style="font-size: 12px;" class="layui-input" placeholder="请输入身份证号" type="text" must="1" page="1">
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>出生日期：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="perBirth" style="font-size: 12px;" class="layui-input" placeholder="请选择出生日期" type="text" must="1" page="1">
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>籍贯：</label></div>
	    <div class="layui-col-xs4">
	      	<select id="perOrigin_pid" style="font-size: 12px;" class="layui-input" onchange="change_sub(this,'perOrigin','AB')" must="1" page="1">
	    		<option value="">请选择籍贯</option>
	    		<?php foreach($codes['AB'] as $val){ ?>
                 	<option value="<?php echo $val['codeID'] ?>"><?php echo $val['codeName']; ?></option>;
                <?php }; ?>
	    	</select>
	    </div>
	    <div class="layui-col-xs4">
	      	<select id="perOrigin" style="font-size: 12px;" class="layui-input" must="1" page="1">
	    	</select>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>民族：</label></div>
	    <div class="layui-col-xs8">
	    	<select id="perNation" style="font-size: 12px;" class="layui-input" must="1" page="1">
	    		<option value="">请选择民族</option>
	    		<?php foreach($codes['AI'] as $val){ ?>
	             	<option value="<?php echo $val['codeID'] ?>"><?php echo $val['codeName']; ?></option>;
	            <?php }; ?> 
	    	</select>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>政治面貌：</label></div>
	    <div class="layui-col-xs8">
	    	<select id="perPolitica" style="font-size: 12px;" class="layui-input" must="1" page="1">
	    		<option value="">请选择政治面貌</option>
	    		<?php foreach($codes['AG'] as $val){ ?>
	             	<option value="<?php echo $val['codeID'] ?>"><?php echo $val['codeName']; ?></option>;
	            <?php }; ?> 
	    	</select>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>学历：</label></div>
	    <div class="layui-col-xs8">
	    	<select id="perEducation" style="font-size: 12px;" class="layui-input" must="1" page="1">
	    		<option value="">请选择学历</option>
	    		<?php foreach($codes['XL'] as $val){ ?>
	             	<option value="<?php echo $val['codeID'] ?>"><?php echo $val['codeName']; ?></option>;
	            <?php }; ?> 
	    	</select>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>学位：</label></div>
	    <div class="layui-col-xs4">
	      	<select id="perDegree_pid" style="font-size: 12px;" class="layui-input" onchange="change_sub(this,'perDegree','BC')" must="1" page="1">
	    		<option value="">请选择学位</option>
	    		<?php foreach($codes['BC'] as $val){ ?>
                 	<option value="<?php echo $val['codeID'] ?>"><?php echo $val['codeName']; ?></option>;
                <?php }; ?>
	    	</select>
	    </div>
	    <div class="layui-col-xs4">
	      	<select id="perDegree" style="font-size: 12px;" class="layui-input" must="1" page="1">
	    	</select>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>婚姻状况：</label></div>
	    <div class="layui-col-xs8">
	    	<select id="perMarried" style="font-size: 12px;" class="layui-input" must="1" page="1">
	    		<option value="">请选择婚姻状况</option>
	    		<?php foreach($codes['CG'] as $val){ ?>
	             	<option value="<?php echo $val['codeID'] ?>"><?php echo $val['codeName']; ?></option>;
	            <?php }; ?> 
	    	</select>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>外语水平：</label></div>
	    <div class="layui-col-xs4">
	      	<select id="perForeignLang_pid" style="font-size: 12px;" class="layui-input" onchange="change_sub(this,'perForeignLang','MC')" must="1" page="1">
	    		<option value="">请选择外语水平</option>
	    		<?php foreach($codes['MC'] as $val){ ?>
                 	<option value="<?php echo $val['codeID'] ?>"><?php echo $val['codeName']; ?></option>;
                <?php }; ?>
	    	</select>
	    </div>
	    <div class="layui-col-xs4">
	      	<select id="perForeignLang" style="font-size: 12px;" class="layui-input" must="1" page="1">
	    	</select>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>计算机水平：</label></div>
	    <div class="layui-col-xs4">
	      	<select id="perComputerLevel_pid" style="font-size: 12px;" class="layui-input" onchange="change_sub(this,'perComputerLevel','MD')" must="1" page="1">
	    		<option value="">请选择计算机水平</option>
	    		<?php foreach($codes['MD'] as $val){ ?>
                 	<option value="<?php echo $val['codeID'] ?>"><?php echo $val['codeName']; ?></option>;
                <?php }; ?>
	    	</select>
	    </div>
	    <div class="layui-col-xs4">
	      	<select id="perComputerLevel" style="font-size: 12px;" class="layui-input" must="1" page="1">
	    	</select>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>毕业生生源地：</label></div>
	    <div class="layui-col-xs4">
	      	<select id="perEduPlace_pid" style="font-size: 12px;" class="layui-input" onchange="change_sub(this,'perEduPlace','AB')" must="1" page="1">
	    		<option value="">请选择毕业生生源地</option>
	    		<?php foreach($codes['AB'] as $val){ ?>
                 	<option value="<?php echo $val['codeID'] ?>"><?php echo $val['codeName']; ?></option>;
                <?php }; ?>
	    	</select>
	    </div>
	    <div class="layui-col-xs4">
	      	<select id="perEduPlace" style="font-size: 12px;" class="layui-input" must="1" page="1">
	    	</select>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>毕业院校：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="perUniversity" style="font-size: 12px;" class="layui-input" placeholder="请输入毕业院校" type="text" must="1" page="1">
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>专业：</label></div>
	    <div class="layui-col-xs4">
	      	<select id="perMajor_pid" style="font-size: 12px;" class="layui-input" onchange="change_sub(this,'perMajor','AJ')" must="1" page="1">
	    		<option value="">请选择专业</option>
	    		<?php foreach($codes['AJ'] as $val){ ?>
                 	<option value="<?php echo $val['codeID'] ?>"><?php echo $val['codeName']; ?></option>;
                <?php }; ?>
	    	</select>
	    </div>
	    <div class="layui-col-xs4">
	      	<select id="perMajor" style="font-size: 12px;" class="layui-input" must="1" page="1">
	    	</select>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>手机号码：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="perPhone" style="font-size: 12px;" class="layui-input" placeholder="请输入手机号码" type="text" must="1" page="1">
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star"></span>紧急人联系电话：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="perEmePhone" style="font-size: 12px;" class="layui-input" placeholder="请输入紧急人联系电话" type="text" must="0" page="1">
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>电子邮箱：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="perEmail" style="font-size: 12px;" class="layui-input" placeholder="请输入电子邮箱" type="text" must="1" page="1">
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star"></span>邮政编码：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="perPostCode" style="font-size: 12px;" class="layui-input" placeholder="请输入邮政编码" type="text" must="0" page="1">
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>联系地址：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="perAddr" style="font-size: 12px;" class="layui-input" placeholder="请输入联系地址" type="text" must="1" page="1">
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>应聘岗位性质：</label></div>
	    <div class="layui-col-xs8">
	    	<select id="perJob" style="font-size: 12px;" class="layui-input" must="1" page="1">
	    		<option value="">请选择应聘岗位性质</option>
	    		<?php foreach($codes['XZ'] as $val){ ?>
	             	<option value="<?php echo $val['codeID'] ?>"><?php echo $val['codeName']; ?></option>;
	            <?php }; ?> 
	    	</select>
	    </div>
	</div>
	
	<div class="layui-row" style="padding:0 0 25px 0;">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star"></span>备注：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="perMark" style="font-size: 12px;" class="layui-input" placeholder="请输入备注信息" type="text" must="0" page="1">
	    </div>
	</div>
	
	<div class="layui-row">
		<div class="layui-col-xs6">
			<div style="text-align: center;">
			<button onclick="save_info(1)" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 120px;width: 60%;">保存</button></div>
		</div>
		<div class="layui-col-xs6">
			<div style="text-align: center;">
			<button onclick="next_info(1)" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 120px;width: 60%;">下一步</button></div>
		</div>
	</div>
	
</div>


<script>
$(function(){
	var currYear = (new Date()).getFullYear();	
	var opt={};
	opt.date = {preset : 'date'};
	opt.datetime = {preset : 'datetime'};
	opt.time = {preset : 'time'};
	opt.default = {
		theme: 'android-ics light', //皮肤样式
        display: 'modal', //显示方式 
        mode: 'scroller', //日期选择模式
		dateFormat: 'yyyy-mm-dd',
		lang: 'zh',
		showNow: true,
		nowText: "今天",
        startYear: currYear - 117, //开始年份
        endYear: currYear + 40 //结束年份
	};
  	$("#perBirth").mobiscroll($.extend(opt['date'], opt['default']));
  	
  	<?php if(!empty($basePerInfo)){ ?>
  		alert("赋值，初始值");
  	<?php } ?>
  	
});

function change_sub(th,id,codetype){
	var thObj = $(th).attr("id");
	var pvalue = $("#"+thObj).val();
	if(pvalue == ""){
		return ;
	}
	$("#"+id).empty();
	$.getJSON("<?= yii\helpers\Url::to(['zpcx/son-code']); ?>",{'codePiD':pvalue,'codeTypeID':codetype},function(data){
		var len = data['selectCodeInfo'].length;
		for(var i = 0; i < len; i++){
			$("#"+id).append('<option value="'+data['selectCodeInfo'][i].codeID+'">'+data['selectCodeInfo'][i].codeName+'</option>');
		}
	});
}
</script>