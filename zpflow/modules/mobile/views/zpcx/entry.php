<div style="padding: 10px;margin-bottom: 60px;">
	<div class="layui-row">
		<div class="mobile-enter-title">
			<h2>1、基本信息填写</h2>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>姓名：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="perName" title="姓名" style="font-size: 12px;" class="layui-input" placeholder="请输入真实姓名" type="text" must="1" page="1">
	    </div>
	</div>
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>性别：</label></div>
	    <div class="layui-col-xs8">
	    	<select id="perGender" title="性别" style="font-size: 12px;" class="layui-input" must="1" page="1">
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
	      	<input id="perIDCard" title="身份证号" style="font-size: 12px;" class="layui-input" placeholder="请输入身份证号" type="text" must="1" page="1">
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>出生日期：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="perBirth" title="出生日期" style="font-size: 12px;" class="layui-input" placeholder="请选择出生日期" type="text" must="1" page="1">
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>籍贯：</label></div>
	    <div class="layui-col-xs4">
	      	<select id="perOrigin_pid" title="籍贯" style="font-size: 12px;" class="layui-input" onchange="change_sub('perOrigin_pid','perOrigin','AB')" must="1" page="1">
	    		<option value="">请选择籍贯</option>
	    		<?php foreach($codes['AB'] as $val){ ?>
                 	<option value="<?php echo $val['codeID'] ?>"><?php echo $val['codeName']; ?></option>;
                <?php }; ?>
	    	</select>
	    </div>
	    <div class="layui-col-xs4">
	      	<select id="perOrigin" title="籍贯" style="font-size: 12px;" class="layui-input" must="1" page="1">
	    	</select>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>民族：</label></div>
	    <div class="layui-col-xs8">
	    	<select id="perNation" title="民族" style="font-size: 12px;" class="layui-input" must="1" page="1">
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
	    	<select id="perPolitica" title="政治面貌" style="font-size: 12px;" class="layui-input" must="1" page="1">
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
	    	<select id="perEducation" title="学历" style="font-size: 12px;" class="layui-input" must="1" page="1">
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
	      	<select id="perDegree_pid" title="学位" style="font-size: 12px;" class="layui-input" onchange="change_sub('perDegree_pid','perDegree','BC')" must="1" page="1">
	    		<option value="">请选择学位</option>
	    		<?php foreach($codes['BC'] as $val){ ?>
                 	<option value="<?php echo $val['codeID'] ?>"><?php echo $val['codeName']; ?></option>;
                <?php }; ?>
	    	</select>
	    </div>
	    <div class="layui-col-xs4">
	      	<select id="perDegree" title="学位" style="font-size: 12px;" class="layui-input" must="1" page="1">
	    	</select>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>婚姻状况：</label></div>
	    <div class="layui-col-xs8">
	    	<select id="perMarried" title="婚姻状况" style="font-size: 12px;" class="layui-input" must="1" page="1">
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
	      	<select id="perForeignLang_pid" title="外语水平" style="font-size: 12px;" class="layui-input" onchange="change_sub('perForeignLang_pid','perForeignLang','MC')" must="1" page="1">
	    		<option value="">请选择外语水平</option>
	    		<?php foreach($codes['MC'] as $val){ ?>
                 	<option value="<?php echo $val['codeID'] ?>"><?php echo $val['codeName']; ?></option>;
                <?php }; ?>
	    	</select>
	    </div>
	    <div class="layui-col-xs4">
	      	<select id="perForeignLang" title="外语水平" style="font-size: 12px;" class="layui-input" must="1" page="1">
	    	</select>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>计算机水平：</label></div>
	    <div class="layui-col-xs4">
	      	<select id="perComputerLevel_pid" title="计算机水平" style="font-size: 12px;" class="layui-input" onchange="change_sub('perComputerLevel_pid','perComputerLevel','MD')" must="1" page="1">
	    		<option value="">请选择计算机水平</option>
	    		<?php foreach($codes['MD'] as $val){ ?>
                 	<option value="<?php echo $val['codeID'] ?>"><?php echo $val['codeName']; ?></option>;
                <?php }; ?>
	    	</select>
	    </div>
	    <div class="layui-col-xs4">
	      	<select id="perComputerLevel" title="计算机水平" style="font-size: 12px;" class="layui-input" must="1" page="1">
	    	</select>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>毕业生生源地：</label></div>
	    <div class="layui-col-xs4">
	      	<select id="perEduPlace_pid" title="毕业生生源地" style="font-size: 12px;" class="layui-input" onchange="change_sub('perEduPlace_pid','perEduPlace','AB')" must="1" page="1">
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
	      	<input id="perUniversity" title="毕业院校" style="font-size: 12px;" class="layui-input" placeholder="请输入毕业院校" type="text" must="1" page="1">
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>专业：</label></div>
	    <div class="layui-col-xs4">
	      	<select id="perMajor_pid" title="专业" style="font-size: 12px;" class="layui-input" onchange="change_sub('perMajor_pid','perMajor','AJ')" must="1" page="1">
	    		<option value="">请选择专业</option>
	    		<?php foreach($codes['AJ'] as $val){ ?>
                 	<option value="<?php echo $val['codeID'] ?>"><?php echo $val['codeName']; ?></option>;
                <?php }; ?>
	    	</select>
	    </div>
	    <div class="layui-col-xs4">
	      	<select id="perMajor" title="专业" style="font-size: 12px;" class="layui-input" must="1" page="1">
	    	</select>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>手机号码：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="perPhone" title="手机号码" style="font-size: 12px;" class="layui-input" placeholder="请输入手机号码" type="text" must="1" page="1">
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star"></span>紧急人联系电话：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="perEmePhone" title="紧急人联系电话" style="font-size: 12px;" class="layui-input" placeholder="请输入紧急人联系电话" type="text" must="0" page="1">
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>电子邮箱：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="perEmail" title="电子邮箱" style="font-size: 12px;" class="layui-input" placeholder="请输入电子邮箱" type="text" must="1" page="1">
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star"></span>邮政编码：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="perPostCode" title="邮政编码" style="font-size: 12px;" class="layui-input" placeholder="请输入邮政编码" type="text" must="0" page="1">
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>联系地址：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="perAddr" title="联系地址" style="font-size: 12px;" class="layui-input" placeholder="请输入联系地址" type="text" must="1" page="1">
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>应聘岗位性质：</label></div>
	    <div class="layui-col-xs8">
	    	<select id="perJob" title="应聘岗位性质" style="font-size: 12px;" class="layui-input" must="1" page="1">
	    		<option value="">请选择应聘岗位性质</option>
	    		<?php foreach($codes['XZ'] as $val){ ?>
	             	<option value="<?php echo $val['codeID'] ?>"><?php echo $val['codeName']; ?></option>;
	            <?php }; ?> 
	    	</select>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star"></span>备注：</label></div>
	    <div class="layui-col-xs8">
	    	<label class="mobile-input-label3">&nbsp;</label>
	    </div>
	</div>
	<div class="layui-row" style="padding:0 0 25px 0;">
		<div style="margin-left: -2px;">
			<textarea id="perMark" title="备注" style="font-size: 12px;" class="layui-textarea" placeholder="请输入备注信息" must="0" page="1"></textarea>
		</div>
	</div>
	
	<div class="layui-row">
		<div class="layui-col-xs6">
			<div style="text-align: center;">
			<button onclick="save_info1()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 120px;width: 60%;">保存</button></div>
		</div>
		<div class="layui-col-xs6">
			<div style="text-align: center;">
			<button id="next_info1" onclick="next_info1()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 120px;width: 60%;">下一步</button></div>
		</div>
	</div>
</div>

<script>
var __entey_perID = "";
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
  		<?php if($perID_type == 1){ ?>
  			__entey_perID = "<?= $basePerInfo['perID'] ?>";
  		<?php } ?>
  		$("#perName").val("<?= $basePerInfo['perName'] ?>");
		$("#perGender").val("<?= $basePerInfo['perGender'] ?>");
		$("#perIDCard").val("<?= $basePerInfo['perIDCard'] ?>");
		$("#perBirth").val("<?= $basePerInfo['perBirth'] ?>");
		var temp_perOrigin = "<?= $basePerInfo['perOrigin'] ?>";
		perOrigin_array = temp_perOrigin.split("_");
		$("#perOrigin_pid").val(perOrigin_array[0]);
		change_sub("perOrigin_pid",'perOrigin','AB');
		$("#perOrigin").val(perOrigin_array[1]);
		$("#perNation").val("<?= $basePerInfo['perNation'] ?>");
		$("#perPolitica").val("<?= $basePerInfo['perPolitica'] ?>");
		$("#perEducation").val("<?= $basePerInfo['perEducation'] ?>");
		var temp_perDegree = "<?= $basePerInfo['perDegree'] ?>";
		perDegree_array = temp_perDegree.split("_");
		$("#perDegree_pid").val(perDegree_array[0]);
		change_sub("perDegree_pid",'perDegree','BC');
		$("#perDegree").val(perDegree_array[1]);
		$("#perMarried").val("<?= $basePerInfo['perMarried'] ?>");
		var temp_perForeignLang = "<?= $basePerInfo['perForeignLang'] ?>";
		perForeignLang_array = temp_perForeignLang.split("_");
		$("#perForeignLang_pid").val(perForeignLang_array[0]);
		change_sub("perForeignLang_pid",'perForeignLang','MC');
		$("#perForeignLang").val(perForeignLang_array[1]);
		var temp_perComputerLevel = "<?= $basePerInfo['perComputerLevel'] ?>";
		perComputerLevel_array = temp_perComputerLevel.split("_");
		$("#perComputerLevel_pid").val(perComputerLevel_array[0]);
		change_sub("perComputerLevel_pid",'perComputerLevel','MD');
		$("#perComputerLevel").val(perComputerLevel_array[1]);
		var temp_perEduPlace = "<?= $basePerInfo['perEduPlace'] ?>";
		perEduPlace_array = temp_perEduPlace.split("_");
		$("#perEduPlace_pid").val(perEduPlace_array[0]);
		change_sub("perEduPlace_pid",'perEduPlace','AB');
		$("#perEduPlace").val(perEduPlace_array[1]);
		$("#perUniversity").val("<?= $basePerInfo['perUniversity'] ?>");
		var temp_perMajor = "<?= $basePerInfo['perMajor'] ?>";
		perMajor_array = temp_perMajor.split("_");
		$("#perMajor_pid").val(perMajor_array[0]);
		change_sub("perMajor_pid",'perMajor','AJ');
		$("#perMajor").val(perMajor_array[1]);
		$("#perPhone").val("<?= $basePerInfo['perPhone'] ?>");
		$("#perEmePhone").val("<?= $basePerInfo['perEmePhone'] ?>");
		$("#perEmail").val("<?= $basePerInfo['perEmail'] ?>");
		$("#perPostCode").val("<?= $basePerInfo['perPostCode'] ?>");
		$("#perAddr").val("<?= $basePerInfo['perAddr'] ?>");
		$("#perJob").val("<?= $basePerInfo['perJob'] ?>");
		$("#perMark").val("<?= $basePerInfo['perMark'] ?>");
  	<?php } ?>
  	
  	if(__entey_perID == ""){
  		$("#next_info1").attr('disabled','disabled');
  		$("#next_info1").addClass("layui-btn-disabled");
  	}else{
  		$("#next_info1").removeAttr('disabled');
  		$("#next_info1").removeClass("layui-btn-disabled");
  	}
});

function change_sub(pid,id,codetype){
	var pvalue = $("#"+pid).val();
	if(pvalue == ""){
		return ;
	}
	$("#"+id).empty();
	
	$.ajax({
		type:"get",
		url:"<?= yii\helpers\Url::to(['zpcx/son-code']); ?>",
		async:false,
		data:{'codePiD':pvalue,'codeTypeID':codetype},
		dataType:'json',
		success:function(data){
			var len = data['selectCodeInfo'].length;
			for(var i = 0; i < len; i++){
				$("#"+id).append('<option value="'+data['selectCodeInfo'][i].codeID+'">'+data['selectCodeInfo'][i].codeName+'</option>');
			}
		}
	});
//	$.getJSON("<= yii\helpers\Url::to(['zpcx/son-code']); ?>",{'codePiD':pvalue,'codeTypeID':codetype},function(data){
//		var len = data['selectCodeInfo'].length;
//		for(var i = 0; i < len; i++){
//			$("#"+id).append('<option value="'+data['selectCodeInfo'][i].codeID+'">'+data['selectCodeInfo'][i].codeName+'</option>');
//		}
//	});
}

function save_info1(){
	var isNull = false;
	var errorMsg = "存在必填项未填：<br/>";
	$("[page='1'][must='1']").each(function(){
		var thObjId = $(this).attr('id');
		if($("#"+thObjId).val()==''){
			isNull = true;
			errorMsg += $(this).attr("title");
			return false;
		}
	});
	
	if(isNull){
		layer.open({content: errorMsg,btn: '我知道了'});
		return;
	}

	if(!validateIdCard1($("#perIDCard").val())){
		return;
	}else if(!validatePhone($("#perPhone").val())){
		layer.open({content: "手机号码格式不正确",btn: '我知道了'});
		return ;
	}else if($("#perEmePhone").val() != "" && !validatePhone($("#perEmePhone").val())){
		layer.open({content: "手机号码格式不正确",btn: '我知道了'});
		return;
	}else if(!validateEmail($("#perEmail").val())){
		layer.open({content: "邮箱格式不正确",btn: '我知道了'});
		return;
	}else if($("#perPostCode").val() != "" && !validatePostCode($("#perPostCode").val())){
		layer.open({content: "邮政编码格式不正确",btn: '我知道了'});
		return;
	}
	
	var dataObj = {};
	dataObj['perName'] = $("#perName").val();
	dataObj['perGender'] = $("#perGender").val();
	dataObj['perIDCard'] = $("#perIDCard").val();
	dataObj['perBirth'] = $("#perBirth").val();
	dataObj['perOrigin'] = $("#perOrigin_pid").val()+"_"+ $("#perOrigin").val();
	dataObj['perNation'] = $("#perNation").val();
	dataObj['perPolitica'] = $("#perPolitica").val();
	dataObj['perEducation'] = $("#perEducation").val();
	dataObj['perDegree'] = $("#perDegree_pid").val()+"_"+$("#perDegree").val();
	dataObj['perMarried'] = $("#perMarried").val();
	dataObj['perForeignLang'] = $("#perForeignLang_pid").val()+"_"+$("#perForeignLang").val();
	dataObj['perComputerLevel'] = $("#perComputerLevel_pid").val()+"_"+$("#perComputerLevel").val();
	dataObj['perEduPlace'] = $("#perEduPlace_pid").val()+"_"+$("#perEduPlace").val();
	dataObj['perUniversity'] = $("#perUniversity").val();
	dataObj['perMajor'] = $("#perMajor_pid").val()+"_"+$("#perMajor").val();
	dataObj['perPhone'] = $("#perPhone").val();
	dataObj['perEmePhone'] = $("#perEmePhone").val();
	dataObj['perEmail'] = $("#perEmail").val();
	dataObj['perPostCode'] = $("#perPostCode").val();
	dataObj['perAddr'] = $("#perAddr").val();
	dataObj['perJob'] = $("#perJob").val();
	dataObj['perMark'] = $("#perMark").val();
	
	$.ajax({
		type:"post",
		url:"<?= yii\helpers\Url::to(['zpcx/entry-save1']); ?>",
		async:true,
		dataType:'json',
		data:{'Per':dataObj,'perID':__entey_perID},
		success:function(json){
			if(json.result){
				layer.open({content:json.msg,btn: ['确定'],yes: function(index){
				      	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry']); ?>");
				      	layer.close(index);
				    }
				});
			}else{
				layer.open({content: json.msg,btn: '我知道了'});
			}
		}
	});
}

function next_info1(){
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry2']); ?>");
}
</script>