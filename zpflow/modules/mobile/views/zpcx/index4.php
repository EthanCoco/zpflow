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
						    		
						    		<?php if($dealData['step3']['examoverpass'] == 1){ ?>
						    			<p style="padding-top: 25px;">抱歉您已经错过考试时间，敬请期待下次招聘，谢谢！</p>
						    		<?php }else{ ?>
								    	<p style="padding-top: 25px;">已经为您安排考试时间地点了，是否会参加考试？</p>
								    	<div style="padding: 10px;text-align: center;">
											<button onclick="flow4_reback('01')" class="layui-btn layui-btn-normal layui-btn-small layui-btn-radius" >确定参加</button>
											<button onclick="flow4_reback('02')" class="layui-btn layui-btn-normal layui-btn-small layui-btn-radius" >放弃参加</button>
								    	</div>
							    	<?php } ?>
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
						    		<p><b>邀请考试通知：</b><a href="<?= yii\helpers\Url::to(['zpcx/print-ticketno']); ?>&perID=<?= $dealData['baseData']['perID']; ?>&recID=<?= $dealData['recData']['recID'] ?>" style="color: blue;">下载《准考证.pdf》</a></p>
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
			<?php if($dealData['baseData']['perReResult2'] == '01'){  ?>
				<?php if($dealData['baseData']['perGradePub'] == 1 && $dealData['baseData']['perPub3'] == 0 ){  ?>
					<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
					  	<legend style="font-size: 14px;color: blue;padding: 5px;">step4&nbsp;&nbsp;&nbsp;&nbsp;考试结果信息</legend>
					  	<div class="layui-row">
							<div style="margin-left: -2px;color: #666;">
							    <div class="layui-textarea">
							    	<p><b>考试信息：</b></p>
							    	<p><b>面试成绩：</b><?php echo  $dealData['step4']['perViewScore']=="" ? '没成绩' : $dealData['step4']['perViewScore']; ?></p>
							    	<p><b>笔试成绩：</b><?php echo  $dealData['step4']['perPenScore']=="" ? '没成绩' : $dealData['step4']['perPenScore'] ?></p>
							    </div>
						    </div>
						</div>
					</fieldset>
				
				<?php }elseif($dealData['baseData']['perPub3'] == 1){ ?>
					<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
					  	<legend style="font-size: 14px;color: blue;padding: 5px;">step4&nbsp;&nbsp;&nbsp;&nbsp;考试结果信息</legend>
					  	<div class="layui-row">
							<div style="margin-left: -2px;color: #666;">
							    <div class="layui-textarea">
							    	<?php if($dealData['baseData']['perGradePub'] == 0 && $dealData['baseData']['perExamResult'] == 1){ ?>
								    	<p><b>考试信息：</b></p>
								    	<p>恭喜您考试通过！相关信息如下：</p>
								    	<p><b>考试结果：</b><?= $dealData['step4']['perExamResult']; ?></p>
							    	<?php }elseif($dealData['baseData']['perGradePub'] == 1 && $dealData['baseData']['perExamResult'] == 1){ ?>
							    		<p><b>考试信息：</b></p>
								    	<p>恭喜您考试通过！相关信息如下：</p>
								    	<p><b>考试结果：</b><?= $dealData['step4']['perExamResult']; ?></p>
								    	<p><b>面试成绩：</b><?php echo  $dealData['step4']['perViewScore']=="" ? '没成绩' : $dealData['step4']['perViewScore']; ?></p>
							    		<p><b>笔试成绩：</b><?php echo  $dealData['step4']['perPenScore']=="" ? '没成绩' : $dealData['step4']['perPenScore'] ?></p>
								    	<p><b>综合成绩：</b><?= $dealData['step4']['perPenViewScore']; ?></p>
							    	<?php }elseif($dealData['baseData']['perGradePub'] == 0 && $dealData['baseData']['perExamResult'] != 1){ ?>
							    		<p><b>考试信息：</b></p>
								    	<p><b>考试结果：</b><?= $dealData['step4']['perExamResult']; ?></p>
								    	<p>抱歉，您的考试未通过！</p>
								    	<p>敬请期待下次招聘，谢谢！</p>
							    	<?php }elseif($dealData['baseData']['perGradePub'] == 1 && $dealData['baseData']['perExamResult'] != 1){ ?>
							    		<p><b>考试信息：</b></p>
								    	<p>抱歉，您的考试未通过！</p>
								    	<p>敬请期待下次招聘，谢谢！</p>
								    	<p>相关成绩如下：</p>
								    	<p><b>考试结果：</b><?= $dealData['step4']['perExamResult']; ?></p>
								    	<p><b>面试成绩：</b><?php echo  $dealData['step4']['perViewScore']=="" ? '没成绩' : $dealData['step4']['perViewScore']; ?></p>
							    		<p><b>笔试成绩：</b><?php echo  $dealData['step4']['perPenScore']=="" ? '没成绩' : $dealData['step4']['perPenScore'] ?></p>
								    	<p><b>综合成绩：</b><?= $dealData['step4']['perPenViewScore']; ?></p>
							    	<?php } ?>
							    	
							    	<?php if($dealData['baseData']['perExamResult'] == 1 && $dealData['baseData']['perReResult3'] == '03'){ ?>
							    		<p style="padding-top: 25px;">接下来将为您安排体检时间地点了，是否会参加体检？</p>
								    	<div style="padding: 10px;text-align: center;">
											<button onclick="flow5_reback('01')" class="layui-btn layui-btn-normal layui-btn-small layui-btn-radius" >确定参加</button>
											<button onclick="flow5_reback('02')" class="layui-btn layui-btn-normal layui-btn-small layui-btn-radius" >放弃参加</button>
								    	</div>
							    	<?php } ?>	
							    		
							    </div>
						    </div>
						</div>
						<?php if($dealData['baseData']['perExamResult'] == 1 && $dealData['baseData']['perReResult3'] != '03'){ ?>
						<div class="layui-row">
							<div style="margin-left: -2px;color: #666;">
							    <div class="layui-textarea">
							    	<p><b>体检安排环节反馈信息：</b></p>
							    	<?php if($dealData['baseData']['perReResult3'] == '01'){ ?>
							    		<p><b>反馈结果：确定参加体检</b></p>
							    		<p><b>反馈时间：<?= $dealData['baseData']['perReTime3'] ?></b></p>
							    		
							    	<?php }elseif($dealData['baseData']['perReResult3'] == '02'){ ?>
							    		<p><b>反馈结果：放弃参加体检</b></p>
							    		<p><b>放弃原因：<?= $dealData['baseData']['perReGiveup3'] ?></b></p>
							    		<p><b>反馈时间：<?= $dealData['baseData']['perReTime3'] ?></b></p>
							    	<?php }	?>
							    </div>
						    </div>
						</div>
					<?php }	?>
					</fieldset>
				<?php } ?>
			<?php } ?>
			<!--体检安排环节TODO-->	
			<?php if($dealData['baseData']['perExamResult'] == 1 && $dealData['baseData']['perPub3'] == 1 && $dealData['baseData']['perPub4'] == 1 ){  ?>
				<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
				  	<legend style="font-size: 14px;color: blue;padding: 5px;">step5&nbsp;&nbsp;&nbsp;&nbsp;体检安排信息</legend>
				  	<div class="layui-row">
						<div style="margin-left: -2px;color: #666;">
						    <div class="layui-textarea">
						    	<p><b>体检安排：</b></p>
						    	<p><b>体检时间：</b></p><p><?= $dealData['step5']['medStartEnd']; ?></p>
					    		<p><b>体检地点：</b><?= $dealData['step5']['medPlace']; ?></p>
					    		<p><br/></p>
					    		<p><b>邀请体检通知：</b></p>
					    		<p><?= $dealData['step5']['ntsContent']; ?></p>
					    		<?php if($dealData['baseData']['perReResult4'] == '03'){ ?>
							    	<p style="padding-top: 25px;">已经为您安排了体检时间地点了，是否会参加体检？</p>
							    	<div style="padding: 10px;text-align: center;">
										<button onclick="flow6_reback('01')" class="layui-btn layui-btn-normal layui-btn-small layui-btn-radius" >确定参加</button>
										<button onclick="flow6_reback('02')" class="layui-btn layui-btn-normal layui-btn-small layui-btn-radius" >放弃参加</button>
							    	</div>
						    	<?php }	?>
						    </div>
					    </div>
					</div>
					<?php if($dealData['baseData']['perReResult4'] != '03'){ ?>
					<div class="layui-row">
						<div style="margin-left: -2px;color: #666;">
						    <div class="layui-textarea">
						    	<p><b>体检安排环节反馈信息：</b></p>
						    	<?php if($dealData['baseData']['perReResult4'] == '01'){ ?>
						    		<p><b>反馈结果：确定参加体检</b></p>
						    		<p><b>反馈时间：<?= $dealData['baseData']['perReTime4'] ?></b></p>
						    	<?php }elseif($dealData['baseData']['perReResult4'] == '02'){ ?>
						    		<p><b>反馈结果：放弃参加体检</b></p>
						    		<p><b>放弃原因：<?= $dealData['baseData']['perReGiveup4'] ?></b></p>
						    		<p><b>反馈时间：<?= $dealData['baseData']['perReTime4'] ?></b></p>
						    	<?php }	?>
						    </div>
					    </div>
					</div>
					<?php }	?>
				</fieldset>
			<?php } ?>
			<!--体检结果公示环节TODO-->
			<?php if($dealData['baseData']['perExamResult'] == 1 && $dealData['baseData']['perPub3'] == 1 && $dealData['baseData']['perPub4'] == 1 && $dealData['baseData']['perPub5'] == 1 ){  ?>
				<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
				  	<legend style="font-size: 14px;color: blue;padding: 5px;">step6&nbsp;&nbsp;&nbsp;&nbsp;体检结果信息</legend>
				  	<div class="layui-row">
						<div style="margin-left: -2px;color: #666;">
						    <div class="layui-textarea">
						    	
						    	<?php if($dealData['baseData']['perMedCheck3'] == 1){ ?>
						    		<p><b>恭喜您，您的体检已经通过！</b></p>
						    	<?php }else{ ?>
						    		<p><b>抱歉，您的体检没有通过！敬请期待下次招聘！谢谢！</b></p>
						    	<?php } ?>
						    	<p><b>您的体检结果如下：</b></p>
						    	<p><b>体检结果：</b><?= $dealData['step6']['perMedCheck1']; ?></p>
					    		<p><b>复查结果：</b><?= $dealData['step6']['perMedCheck2']; ?></p>
					    		<p><b>是否通过：</b><?= $dealData['step6']['perMedCheck3']; ?></p>
					    		<p><br/></p>
					    		
					    		<?php if($dealData['baseData']['perReResult5'] == '03' && $dealData['baseData']['perMedCheck3'] == 1){ ?>
							    	<p style="padding-top: 25px;">接下来将会是政审环节，是否会参加政审？</p>
							    	<div style="padding: 10px;text-align: center;">
										<button onclick="flow7_reback('01')" class="layui-btn layui-btn-normal layui-btn-small layui-btn-radius" >确定参加</button>
										<button onclick="flow7_reback('02')" class="layui-btn layui-btn-normal layui-btn-small layui-btn-radius" >放弃参加</button>
							    	</div>
						    	<?php }	?>
						    		
						    </div>
					    </div>
					</div>
					<?php if($dealData['baseData']['perReResult5'] != '03' && $dealData['baseData']['perMedCheck3'] == 1){ ?>
					<div class="layui-row">
						<div style="margin-left: -2px;color: #666;">
						    <div class="layui-textarea">
						    	<p><b>参加政审反馈信息：</b></p>
						    	<?php if($dealData['baseData']['perReResult5'] == '01'){ ?>
						    		<p><b>反馈结果：确定参加政审</b></p>
						    		<p><b>反馈时间：<?= $dealData['baseData']['perReTime5'] ?></b></p>
						    	<?php }elseif($dealData['baseData']['perReResult5'] == '02'){ ?>
						    		<p><b>反馈结果：放弃参加政审</b></p>
						    		<p><b>放弃原因：<?= $dealData['baseData']['perReGiveup5'] ?></b></p>
						    		<p><b>反馈时间：<?= $dealData['baseData']['perReTime5'] ?></b></p>
						    	<?php }	?>
						    </div>
					    </div>
					</div>
					<?php }	?>
				</fieldset>
			<?php } ?>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
				
				
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

function flow5_reback(type){
	if(type == '01'){
		layer.open({content:'是否确认参加体检？',btn: ['确定','取消'],yes: function(index){
				$.post("<?= yii\helpers\Url::to(['zpcx/flow5-reback']); ?>",{'perReResult3':type,'perReGiveup3':'','recID':__flow_recID__,'perID':__flow_perID__},function(json){
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
		    content: '<textarea id="perReGiveup3" style="font-size: 12px;" class="layui-textarea" placeholder="请输入放弃原因"></textarea>',
		    anim: 'up',
		    style: 'position:fixed; bottom:0; left:0; width: 100%; height: 150px; padding:10px 0; border:none;',
		    btn:['确定','取消'],
		    yes: function(index){
		    	var perReGiveup3 = $("#perReGiveup3").val();
		    	if(perReGiveup3 == ""){
		    		return layer.open({content: '请填写放弃原因',skin: 'msg',time: 2 });
		    	}
		    	
		    	layer.open({content:'是否确认放弃参加体检？',btn: ['确定','取消'],yes: function(index){
						$.post("<?= yii\helpers\Url::to(['zpcx/flow5-reback']); ?>",{'perReResult3':type,'perReGiveup3':perReGiveup3,'recID':__flow_recID__,'perID':__flow_perID__},function(json){
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

function flow6_reback(type){
	if(type == '01'){
		layer.open({content:'是否确认参加体检？',btn: ['确定','取消'],yes: function(index){
				$.post("<?= yii\helpers\Url::to(['zpcx/flow6-reback']); ?>",{'perReResult4':type,'perReGiveup4':'','recID':__flow_recID__,'perID':__flow_perID__},function(json){
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
		    content: '<textarea id="perReGiveup4" style="font-size: 12px;" class="layui-textarea" placeholder="请输入放弃原因"></textarea>',
		    anim: 'up',
		    style: 'position:fixed; bottom:0; left:0; width: 100%; height: 150px; padding:10px 0; border:none;',
		    btn:['确定','取消'],
		    yes: function(index){
		    	var perReGiveup4 = $("#perReGiveup4").val();
		    	if(perReGiveup4 == ""){
		    		return layer.open({content: '请填写放弃原因',skin: 'msg',time: 2 });
		    	}
		    	
		    	layer.open({content:'是否确认放弃参加体检？',btn: ['确定','取消'],yes: function(index){
						$.post("<?= yii\helpers\Url::to(['zpcx/flow6-reback']); ?>",{'perReResult4':type,'perReGiveup4':perReGiveup4,'recID':__flow_recID__,'perID':__flow_perID__},function(json){
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

function flow7_reback(type){
	if(type == '01'){
		layer.open({content:'是否确认参加政审？',btn: ['确定','取消'],yes: function(index){
				$.post("<?= yii\helpers\Url::to(['zpcx/flow7-reback']); ?>",{'perReResult5':type,'perReGiveup5':'','recID':__flow_recID__,'perID':__flow_perID__},function(json){
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
		    content: '<textarea id="perReGiveup5" style="font-size: 12px;" class="layui-textarea" placeholder="请输入放弃原因"></textarea>',
		    anim: 'up',
		    style: 'position:fixed; bottom:0; left:0; width: 100%; height: 150px; padding:10px 0; border:none;',
		    btn:['确定','取消'],
		    yes: function(index){
		    	var perReGiveup5 = $("#perReGiveup5").val();
		    	if(perReGiveup5 == ""){
		    		return layer.open({content: '请填写放弃原因',skin: 'msg',time: 2 });
		    	}
		    	
		    	layer.open({content:'是否确认放弃参加政审？',btn: ['确定','取消'],yes: function(index){
						$.post("<?= yii\helpers\Url::to(['zpcx/flow7-reback']); ?>",{'perReResult5':type,'perReGiveup5':perReGiveup5,'recID':__flow_recID__,'perID':__flow_perID__},function(json){
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

</script>