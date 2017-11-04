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
				    	<?php if($dealData['baseData']['perStatus'] == 2 && $dealData['baseData']['perReResult1'] == '03'){ ?>
					    	<p style="padding-top: 25px;">恭喜您资格审查通过，是否会参加考试？</p>
					    	<div style="padding: 10px;text-align: center;">
								<button onclick="flow2_reback('01')" class="layui-btn layui-btn-normal layui-btn-small layui-btn-radius" >确定参加</button>
								<button onclick="flow2_reback('02')" class="layui-btn layui-btn-normal layui-btn-small layui-btn-radius" >放弃参加</button>
					    	</div>
				    	<?php }	?>
				    </div>
			    </div>
			</div>
			<?php if($dealData['baseData']['perStatus'] == 2 && $dealData['baseData']['perReResult1'] != '03'){ ?>
			<div class="layui-row">
				<div style="margin-left: -2px;color: #666;">
				    <div class="layui-textarea">
				    	<p><b>资格审查环节反馈信息：</b></p>
				    	<?php if($dealData['baseData']['perStatus'] == 2 && $dealData['baseData']['perReResult1'] == '01'){ ?>
				    		<p><b>反馈结果：确定参加考试</b></p>
				    		<p><b>反馈时间：<?= $dealData['baseData']['perReTime1'] ?></b></p>
				    	<?php }elseif($dealData['baseData']['perStatus'] == 2 && $dealData['baseData']['perReResult1'] == '02'){ ?>
				    		<p><b>反馈结果：放弃参加考试</b></p>
				    		<p><b>放弃原因：<?= $dealData['baseData']['perReGiveup1'] ?></b></p>
				    		<p><b>反馈时间：<?= $dealData['baseData']['perReTime1'] ?></b></p>
				    	<?php }	?>
				    </div>
			    </div>
			</div>
			<?php }	?>
		</fieldset>
		
		<!--基于资格审查通过并公示了结果的情况下-->
		<?php if($dealData['baseData']['perStatus'] == 2){ ?>
			<!--//TODO 考试安排环节 --> 
			<?php if($dealData['baseData']['perPub2'] == '0'){ ?>
				<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
				  	<legend style="font-size: 14px;color: blue;padding: 5px;">step3&nbsp;&nbsp;&nbsp;&nbsp;考试安排信息</legend>
					<div class="layui-row">
						<div style="margin-left: -2px;color: #666;">
						    <div class="layui-textarea">
						    	<b>工作人员正在进行安排考试工作，请耐性等候...</b>
						    </div>
					    </div>
					</div>
				</fieldset>
			<?php }elseif($dealData['baseData']['perPub2'] == '1'){ ?>	
				<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
				  	<legend style="font-size: 14px;color: blue;padding: 5px;">step3&nbsp;&nbsp;&nbsp;&nbsp;考试安排信息</legend>
				  	<div class="layui-row">
						<div style="margin-left: -2px;color: #666;">
						    <div class="layui-textarea">
						    	<p><b>考试安排信息：</b></p>
						    	<p><b>准考证号：</b><?= $dealData['step3']['perTicketNo']; ?></p>
						    	<p><b>考试组别：</b><?= $dealData['step3']['perGroupSet']; ?></p>
						    	<p><b>考试时间：</b></p><p><?= $dealData['step3']['gstStartEnd']; ?></p>
						    	<p><b>考试地点：</b><?= $dealData['step3']['gstItvPlace']; ?></p>
						    	<?php if($dealData['baseData']['perReResult2'] == '03'){ ?>
							    	<p style="padding-top: 25px;">已经为您安排考试时间地点了，是否会参加考试？</p>
							    	<div style="padding: 10px;text-align: center;">
										<button onclick="flow4_reback('01')" class="layui-btn layui-btn-normal layui-btn-small layui-btn-radius" >确定参加</button>
										<button onclick="flow4_reback('02')" class="layui-btn layui-btn-normal layui-btn-small layui-btn-radius" >放弃参加</button>
							    	</div>
						    	<?php }	?>
						    </div>
					    </div>
					</div>
					<?php if($dealData['baseData']['perReResult2'] != '03'){ ?>
					<div class="layui-row">
						<div style="margin-left: -2px;color: #666;">
						    <div class="layui-textarea">
						    	<p><b>考试安排环节反馈信息：</b></p>
						    	<?php if($dealData['baseData']['perReResult2'] == '01'){ ?>
						    		<p><b>反馈结果：确定参加考试</b></p>
						    		<p><b>反馈时间：<?= $dealData['baseData']['perReTime2'] ?></b></p>
						    		<p><br/></p>
						    		<p><b>邀请考试通知：</b><a href="javascript:;" onclick='flow_print_pdf_ticketno()' style="color: blue;">下载准考证</a></p>
						    		<p><?= $dealData['step3']['ntsContent']; ?></p>
						    	<?php }elseif($dealData['baseData']['perReResult2'] == '02'){ ?>
						    		<p><b>反馈结果：放弃参加考试</b></p>
						    		<p><b>放弃原因：<?= $dealData['baseData']['perReGiveup2'] ?></b></p>
						    		<p><b>反馈时间：<?= $dealData['baseData']['perReTime2'] ?></b></p>
						    	<?php }	?>
						    </div>
					    </div>
					</div>
					<?php }	?>
				</fieldset>
			<?php } ?>
				
			<!--//TODO 考试结果公示环节 --> 
			
			
		
		
		<?php } ?>
	<?php } ?>
</div>

<script>
var __flow_recID__ = "<?= $dealData['recData']['recID'] ?>";
var __flow_perID__ = "<?= $dealData['baseData']['perID']; ?>";
function flow2_reback(type){
	if(type == '01'){
		layer.open({content:'是否确认参加考试？',btn: ['确定','取消'],yes: function(index){
				$.post("<?= yii\helpers\Url::to(['zpcx/flow2-reback']); ?>",{'perReResult1':type,'perReGiveup1':'','recID':__flow_recID__,'perID':__flow_perID__},function(json){
					if(json.result){
						location.href = "<?= yii\helpers\Url::to(['default/index','index'=>2]); ?>";
					}else{
						layer.open({content: json.msg,btn: '我知道了'});
					}
				},'json');
		    }
		});
	}else{
		layer.open({
		    type: 1,
		    content: '<textarea id="perReGiveup1" style="font-size: 12px;" class="layui-textarea" placeholder="请输入放弃原因"></textarea>',
		    anim: 'up',
		    style: 'position:fixed; bottom:0; left:0; width: 100%; height: 150px; padding:10px 0; border:none;',
		    btn:['确定','取消'],
		    yes: function(index){
		    	var perReGiveup1 = $("#perReGiveup1").val();
		    	if(perReGiveup1 == ""){
		    		return layer.open({content: '请填写放弃原因',skin: 'msg',time: 2 });
		    	}
		    	
		    	layer.open({content:'是否确认放弃参加考试？',btn: ['确定','取消'],yes: function(index){
						$.post("<?= yii\helpers\Url::to(['zpcx/flow2-reback']); ?>",{'perReResult1':type,'perReGiveup1':perReGiveup1,'recID':__flow_recID__,'perID':__flow_perID__},function(json){
							if(json.result){
								location.href = "<?= yii\helpers\Url::to(['default/index','index'=>2]); ?>";
							}else{
								layer.open({content: json.msg,btn: '我知道了'});
							}
						},'json');
				    }
				});
		    }
		});
	}
}


function flow4_reback(type){
	if(type == '01'){
		layer.open({content:'是否确认参加考试？',btn: ['确定','取消'],yes: function(index){
				$.post("<?= yii\helpers\Url::to(['zpcx/flow4-reback']); ?>",{'perReResult2':type,'perReGiveup2':'','recID':__flow_recID__,'perID':__flow_perID__},function(json){
					if(json.result){
						location.href = "<?= yii\helpers\Url::to(['default/index','index'=>2]); ?>";
					}else{
						layer.open({content: json.msg,btn: '我知道了'});
					}
				},'json');
		    }
		});
	}else{
		layer.open({
		    type: 1,
		    content: '<textarea id="perReGiveup2" style="font-size: 12px;" class="layui-textarea" placeholder="请输入放弃原因"></textarea>',
		    anim: 'up',
		    style: 'position:fixed; bottom:0; left:0; width: 100%; height: 150px; padding:10px 0; border:none;',
		    btn:['确定','取消'],
		    yes: function(index){
		    	var perReGiveup2 = $("#perReGiveup2").val();
		    	if(perReGiveup2 == ""){
		    		return layer.open({content: '请填写放弃原因',skin: 'msg',time: 2 });
		    	}
		    	
		    	layer.open({content:'是否确认放弃参加考试？',btn: ['确定','取消'],yes: function(index){
						$.post("<?= yii\helpers\Url::to(['zpcx/flow4-reback']); ?>",{'perReResult2':type,'perReGiveup2':perReGiveup2,'recID':__flow_recID__,'perID':__flow_perID__},function(json){
							if(json.result){
								location.href = "<?= yii\helpers\Url::to(['default/index','index'=>2]); ?>";
							}else{
								layer.open({content: json.msg,btn: '我知道了'});
							}
						},'json');
				    }
				});
		    }
		});
	}
}

function flow_print_pdf_ticketno(){
	
}

</script>