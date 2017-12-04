<!--
	作者：lijianlin0204@163.com
	时间：2017-12-04
	描述：家庭成员信息
-->
<div style="padding: 10px;margin-bottom: 60px;">
	<div class="layui-row">
		<div class="mobile-enter-title">
			<h2>4、家庭主要成员填写</h2>
	    </div>
	</div>
	
	<?php if(!empty($famInfo)){ ?>
		<?php foreach($famInfo as $fam){ ?>
			<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
			  	<legend>
			  		<div class="layui-btn-group">
					    <button class="layui-btn layui-btn-primary layui-btn-small" onclick="mofiy_fam4('<?php echo $fam['famID']; ?>')"><i class="layui-icon"></i></button>
					    <button class="layui-btn layui-btn-primary layui-btn-small" onclick="delete_fam4('<?php echo $fam['famID']; ?>')"><i class="layui-icon"></i></button>
					</div>
			  	</legend>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">成员关系：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $fam['famRelation']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">成员姓名：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $fam['famName']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">所在工作单位：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $fam['famCom']; ?></span></label>
				    </div>
				</div>
				
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">任职岗位：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?php echo $fam['famPost']; ?></span></label>
				    </div>
				</div>
			</fieldset>
		<?php } ?>
	<?php }else{ ?>
		<div class="mobile-index2-content-index1">
			<p style='font-size: 15px;text-align:center;font-family:\"微软雅黑\";'>
				您还没有填写家庭成员，报名条件中，必须至少有一条家庭成员信息（父母双过者，填写监护人员），点击下方添加按钮添加
			</p>
		</div>
	<?php } ?>
	
	<div class="layui-row" style="padding:25px 0 0 0;">
		<div class="layui-col-xs4">
			<div style="text-align: center;">
			<button id="pre_info4" onclick="pre_info4()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 80px;width: 60%;">上一步</button></div>
		</div>
		<div class="layui-col-xs4">
			<div style="text-align: center;">
			<button onclick="add_info4()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 80px;width: 60%;">添加</button></div>
		</div>
		<div class="layui-col-xs4">
			<div style="text-align: center;">
			<button id="submit_info4" onclick="submit_info4()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 80px;width: 60%;">提交</button></div>
		</div>
	</div>
</div>


<script>
var __recID__ = "<?= $recID ?>";
var __perID__ = "<?= $perID ?>";
var __next_flag = 0;
<?php if(!empty($famInfo)){ ?>
	__next_flag = 1;
<?php } ?>

$(function(){
	//提交报名信息按钮事件控制
	if(__next_flag == 0){
		$("#submit_info4").attr('disabled','disabled');
		$("#submit_info4").addClass("layui-btn-disabled");
	}else{
		$("#submit_info4").removeAttr('disabled');
		$("#submit_info4").removeClass("layui-btn-disabled");
	}
});

/*上一步*/
function pre_info4(){
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry3']); ?>"+"&recID="+__recID__+"&perID="+__perID__);
}

/*删除*/
function delete_fam4(famID){
	layer.open({content:'确定要删除么？',btn: ['确定','取消'],yes: function(index){
	      	$.post("<?= yii\helpers\Url::to(['zpcx/del-fam']); ?>",{'recID':__recID__,'famID':famID},function(json){
	      		if(json.result){
	      			$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry4']); ?>"+"&recID="+__recID__+"&perID="+__perID__);
	      			layer.close(index);
	      		}else{
	      			layer.open({content: json.msg,btn: '我知道了'});
	      		}
	      	},'json');
	    }
	});
}

/*修改*/
function mofiy_fam4(famID){
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry4-repair']); ?>"+"&famID="+famID+"&recID="+__recID__+"&perID="+__perID__);
}

/*添加*/
function add_info4(){
	$("#index2_content").load("<?= yii\helpers\Url::to(['zpcx/entry4-repair']); ?>"+"&famID="+"&recID="+__recID__+"&perID="+__perID__);
}

/*提交报名信息*/
function submit_info4(){
	//alert(111);return;
	layer.open({content:'确定信息无误，确定要提交么？',btn: ['确定','取消'],yes: function(index){
	      	$.post("<?= yii\helpers\Url::to(['zpcx/sub-entry']); ?>",{'recID':__recID__,'perID':__perID__},function(json){
	      		if(json.result){
	      			layer.open({content:json.msg,btn: ['确定'],yes: function(index){
	      					location.href = "<?= yii\helpers\Url::to(['default/index','index'=>2]); ?>";
	      				}
	      			});
	      		}else{
	      			layer.open({content: json.msg,btn: '我知道了'});
	      		}
	      	},'json');
	    }
	});
}
</script>