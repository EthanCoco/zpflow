<div style="padding: 10px;margin-bottom: 60px;">
	<div class="layui-row">
		<div class="mobile-enter-title">
			<h2>2、学习情况填写</h2>
	    </div>
	</div>
	
	<?php if(!empty($eduInfo)){ ?>
		<?php foreach($eduInfo as $edu){ ?>
			<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
			  	<legend>
			  		<div class="layui-btn-group">
					    <button class="layui-btn layui-btn-primary layui-btn-small" onclick="mofiy_edu2('<?php echo $edu['eduID']; ?>')"><i class="layui-icon"></i></button>
					    <button class="layui-btn layui-btn-primary layui-btn-small" onclick="delete_edu2('<?php echo $edu['eduID']; ?>')"><i class="layui-icon"></i></button>
					</div>
			  	</legend>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">起始时间：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $edu['eduStart']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">终止时间：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $edu['eduEnd']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">在何学校：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $edu['eduSchool']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">所学专业：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $edu['eduMajor']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">任职职务：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $edu['eduPost']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">奖学金及荣誉：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span></span></label>
				    </div>
				</div>
				<div class="layui-row">
					<div style="margin-left: -2px;color: #666;">
					    <div class="layui-textarea">
					    	<?php echo $edu['eduBurseHonorary']; ?>
					    </div>
				    </div>
				</div>
			</fieldset>
		<?php } ?>
	<?php }else{ ?>
		<div class="mobile-index2-content-index1">
			<p style='font-size: 15px;text-align:center;font-family:\"微软雅黑\";'>
				您还没有填写学习情况，报名条件中，必须至少有一条学习情况（从高中起），点击下方添加按钮添加
			</p>
		</div>
	<?php } ?>
	
	<div class="layui-row" style="padding:25px 0 0 0;">
		<div class="layui-col-xs4">
			<div style="text-align: center;">
			<button id="pre_info2" onclick="pre_info2()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 80px;width: 60%;">上一步</button></div>
		</div>
		<div class="layui-col-xs4">
			<div style="text-align: center;">
			<button onclick="add_info2()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 80px;width: 60%;">添加</button></div>
		</div>
		<div class="layui-col-xs4">
			<div style="text-align: center;">
			<button id="next_info2" onclick="next_info2()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 80px;width: 60%;">下一步</button></div>
		</div>
	</div>
</div>

<script>
var __recID__ = "<?= $recID ?>";
var __perID__ = "<?= $perID ?>"
var __next_flag = 0;
<?php if(!empty($eduInfo)){ ?>
	__next_flag = 1;
<?php } ?>

$(function(){
	if(__next_flag == 0){
		$("#next_info2").attr('disabled','disabled');
		$("#next_info2").addClass("layui-btn-disabled");
	}else{
		$("#next_info2").removeAttr('disabled');
		$("#next_info2").removeClass("layui-btn-disabled");
	}
});

function delete_edu2(eduID){
	layer.open({content:'确定要删除么？',btn: ['确定','取消'],yes: function(index){
	      	$.post("<?= yii\helpers\Url::to(['zpcx/del-edu']); ?>",{'recID':__recID__,'eduID':eduID},function(json){
	      		if(json.result){
	      			$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry2']); ?>");
	      			layer.close(index);
	      		}else{
	      			layer.open({content: json.msg,btn: '我知道了'});
	      		}
	      	},'json');
	    }
	});
}

function mofiy_edu2(eduID){
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry2-repair']); ?>"+"&eduID="+eduID+"&recID="+__recID__+"&perID="+__perID__);
}

function add_info2(){
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry2-repair']); ?>"+"&eduID="+"&recID="+__recID__+"&perID="+__perID__);
}

function pre_info2(){
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry']); ?>");
}

function next_info2(){
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry3']); ?>"+"&recID="+__recID__+"&perID="+__perID__);
}
</script>