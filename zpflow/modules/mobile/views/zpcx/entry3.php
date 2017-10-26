<div style="padding: 10px;margin-bottom: 60px;">
	<div class="layui-row">
		<div class="mobile-enter-title">
			<h2>3、工作经历填写</h2>
	    </div>
	</div>
	
	<?php if(!empty($workInfo)){ ?>
		<?php foreach($workInfo as $work){ ?>
			<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
			  	<legend>
			  		<div class="layui-btn-group">
					    <button class="layui-btn layui-btn-primary layui-btn-small" onclick="mofiy_work3('<?php echo $work['wkID']; ?>')"><i class="layui-icon"></i></button>
					    <button class="layui-btn layui-btn-primary layui-btn-small" onclick="delete_work3('<?php echo $work['wkID']; ?>')"><i class="layui-icon"></i></button>
					</div>
			  	</legend>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">起始时间：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $work['wkStart']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">终止时间：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $work['wkStart']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">所在岗位：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $work['wkPost']; ?></span></label>
				    </div>
				</div>
				
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">所在单位：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $work['wkCom']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">工作简述：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $work['wkInfo']; ?></span></label>
				    </div>
				</div>
			</fieldset>
		<?php } ?>
	<?php }else{ ?>
		<div class="mobile-index2-content-index1">
			<p style='font-size: 15px;text-align:center;font-family:\"微软雅黑\";'>
				您还没有填写工作经历，报名条件中，必须至少有一条工作经历，点击下方添加按钮添加
			</p>
		</div>
	<?php } ?>
	
	<div class="layui-row">
		<div class="layui-col-xs4">
			<div style="text-align: center;">
			<button id="pre_info3" onclick="pre_info3()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 80px;width: 60%;">上一步</button></div>
		</div>
		<div class="layui-col-xs4">
			<div style="text-align: center;">
			<button onclick="add_info3()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 80px;width: 60%;">添加</button></div>
		</div>
		<div class="layui-col-xs4">
			<div style="text-align: center;">
			<button id="next_info3" onclick="next_info3()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 80px;width: 60%;">下一步</button></div>
		</div>
	</div>
</div>

<script>
var __recID__ = "<?= $recID ?>";
var __perID__ = "<?= $perID ?>";
var __next_flag = 0;
<?php if(!empty($workInfo)){ ?>
	__next_flag = 1;
<?php } ?>

$(function(){
	if(__next_flag == 0){
		$("#next_info3").attr('disabled','disabled');
		$("#next_info3").addClass("layui-btn-disabled");
	}else{
		$("#next_info3").removeAttr('disabled');
		$("#next_info3").removeClass("layui-btn-disabled");
	}
});

function mofiy_work3(wkID){
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry3-repair']); ?>"+"&wkID="+wkID+"&recID="+__recID__+"&perID="+__perID__);
}

function add_info3(){
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry3-repair']); ?>"+"&wkID="+"&recID="+__recID__+"&perID="+__perID__);
}

function delete_work3(wkID){
	layer.open({content:'确定要删除么？',btn: ['确定','取消'],yes: function(index){
	      	$.post("<?= yii\helpers\Url::to(['zpcx/del-work']); ?>",{'recID':__recID__,'wkID':wkID},function(json){
	      		if(json.result){
	      			$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry3']); ?>"+"&recID="+__recID__+"&perID="+__perID__);
	      			layer.close(index);
	      		}else{
	      			layer.open({content: json.msg,btn: '我知道了'});
	      		}
	      	},'json');
	    }
	});
}


function pre_info3(){
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry2']); ?>");
}

function next_info3(){
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry4']); ?>"+"&recID="+__recID__+"&perID="+__perID__);
}
</script>