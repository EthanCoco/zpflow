<div style="padding: 10px;margin-bottom: 60px;">
	<div class="layui-row">
		<div class="mobile-enter-title">
			<h2>3、<?= $title ?></h2>
	    </div>
	</div>
	
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>成员关系：</label></div>
	    <div class="layui-col-xs8">
	      	<select id="famRelation" title="成员关系" style="font-size: 12px;" class="layui-input" must="1" page="1">
	    		<option value=""></option>
	    		<?php foreach($codes['JTGX'] as $val){ ?>
	             	<option value="<?php echo $val['codeID'] ?>"><?php echo $val['codeName']; ?></option>;
	            <?php }; ?> 
	    	</select>
	    </div>
	</div>
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star">*</span>成员姓名：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="famName" title="成员姓名" style="font-size: 12px;" class="layui-input" placeholder="" type="text"  must="1" page="1">
	    </div>
	</div>
	<div class="layui-row">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star"></span>所在工作单位：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="famCom" title="所在工作单位" style="font-size: 12px;" class="layui-input" placeholder="" type="text"  must="0" page="1">
	    </div>
	</div>
	<div class="layui-row" style="padding:0 0 25px 0;">
	    <div class="layui-col-xs4"><label class="mobile-input-label"><span class="star"></span>任职岗位：</label></div>
	    <div class="layui-col-xs8">
	      	<input id="famPost" title="任职岗位" style="font-size: 12px;" class="layui-input" placeholder="" type="text"  must="0" page="1">
	    </div>
	</div>
	
	<div class="layui-row" >
		<div class="layui-col-xs6">
			<div style="text-align: center;">
			<button  onclick="save_info4()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 120px;width: 60%;">保存</button></div>
		</div>
		<div class="layui-col-xs6">
			<div style="text-align: center;">
			<button  onclick="cancel_info4()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 120px;width: 60%;">取消</button></div>
		</div>
	</div>
</div>

<script>
var __recID__ = "<?= $recID ?>";
var __famID__ = "<?= $famID ?>";
var __perID__ = "<?= $perID ?>";
$(function(){    
    <?php if(!empty($famInfo)){ ?>
    	$("#famRelation").val("<?= $famInfo['famRelation']; ?>");
    	$("#famName").val("<?= $famInfo['famName'] ?>");
    	$("#famCom").val("<?= $famInfo['famCom'] ?>");
    	$("#famPost").val("<?= $famInfo['famPost'] ?>");
    <?php } ?>
});

function cancel_info4(){
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry4']);  ?>"+"&recID="+__recID__+"&perID="+__perID__);
}

function save_info4(){
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
	
	dataObj = {};
	dataObj['famRelation'] = $("#famRelation").val();
	dataObj['famName'] = $("#famName").val();
	dataObj['famCom'] = $("#famCom").val();
	dataObj['famPost'] = $("#famPost").val();
	$.ajax({
		type:"post",
		url:"<?= yii\helpers\Url::to(['zpcx/entry4-save']); ?>",
		async:true,
		data:{'recID':__recID__,'famID':__famID__,'perID':__perID__,'Fam':dataObj},
		dataType:'json',
		success:function(json){
			if(json.result){
				$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry4']);  ?>"+"&recID="+__recID__+"&perID="+__perID__);
			}else{
				layer.open({content: json.msg,btn: '我知道了'});
			}
		}
	});
}
</script>