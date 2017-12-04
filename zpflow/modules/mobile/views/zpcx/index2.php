<!--
	作者：lijianlin0204@163.com
	时间：2017-12-04
	描述：正在报名 已经报名界面信息
-->
<div style="padding: 10px;margin-bottom: 60px;">
	<div class="layui-row">
		<div class="mobile-enter-title">
			<h2>报名信息</h2>
			<p style="color: red;">您已经报名，资料信息正在审核当中，请耐性等候...</p>
	    </div>
	</div>
	<!--
    	作者：lijianlin0204@163.com
    	时间：2017-12-04
    	描述：基本信息
    -->
	<?php if(!empty($entryData['baseData'])){ ?>
			<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
			  	<legend>
			  		基本信息
			  	</legend>
			  	
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">照片：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span></span></label>
				    </div>
				</div>
				<div style="margin-left: -2px;color: #666;">
				    <div class="layui-textarea" style="text-align: center;">
				    	<img class="layui-upload-img" src="<?= $entryData['baseData']['perPhoto']; ?>">
				    </div>
			    </div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">姓名：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $entryData['baseData']['perName']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">性别：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $entryData['baseData']['perGender']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">身份证号：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $entryData['baseData']['perIDCard']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">出生日期：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $entryData['baseData']['perBirth']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">籍贯：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $entryData['baseData']['perOrigin']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">民族：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $entryData['baseData']['perNation']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">政治面貌：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $entryData['baseData']['perPolitica']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">学历：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $entryData['baseData']['perEducation']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">学位：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $entryData['baseData']['perDegree']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">婚姻状况：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $entryData['baseData']['perMarried']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">外语水平：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $entryData['baseData']['perForeignLang']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">计算机水平：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $entryData['baseData']['perComputerLevel']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">毕业生生源地：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $entryData['baseData']['perEduPlace']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">毕业院校：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $entryData['baseData']['perUniversity']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">专业：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $entryData['baseData']['perMajor']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">手机号码：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $entryData['baseData']['perPhone']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">紧急人联系电话：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $entryData['baseData']['perEmePhone']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">电子邮箱：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $entryData['baseData']['perEmail']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">邮政编码：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $entryData['baseData']['perPostCode']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">联系地址：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $entryData['baseData']['perAddr']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">应聘岗位性质：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $entryData['baseData']['perJob']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">备注：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span></span></label>
				    </div>
				</div>
				<div class="layui-row">
					<div style="margin-left: -2px;color: #666;">
					    <div class="layui-textarea">
					    	<?= $entryData['baseData']['perMark']; ?>
					    </div>
				    </div>
				</div>
			</fieldset>
	<?php } ?>
	
	<!--
    	作者：lijianlin0204@163.com
    	时间：2017-12-04
    	描述：教育信息
    -->
	<?php if(!empty($entryData['eduData'])){ ?>
		<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
		  	<legend>
		  		学习情况信息
		  	</legend>
		<?php foreach($entryData['eduData'] as $edu){ ?>
			<div class="layui-row">
			    <div class="layui-col-xs4"><label class="mobile-input-label">起始时间：</label></div>
			    <div class="layui-col-xs8">
			    	<label class="mobile-input-label2"><span><?= $edu['eduStart']; ?></span></label>
			    </div>
			</div>
			<div class="layui-row">
			    <div class="layui-col-xs4"><label class="mobile-input-label">终止时间：</label></div>
			    <div class="layui-col-xs8">
			    	<label class="mobile-input-label2"><span><?= $edu['eduEnd']; ?></span></label>
			    </div>
			</div>
			<div class="layui-row">
			    <div class="layui-col-xs4"><label class="mobile-input-label">在何学校：</label></div>
			    <div class="layui-col-xs8">
			    	<label class="mobile-input-label2"><span><?= $edu['eduSchool']; ?></span></label>
			    </div>
			</div>
			<div class="layui-row">
			    <div class="layui-col-xs4"><label class="mobile-input-label">所学专业：</label></div>
			    <div class="layui-col-xs8">
			    	<label class="mobile-input-label2"><span><?= $edu['eduMajor']; ?></span></label>
			    </div>
			</div>
			<div class="layui-row">
			    <div class="layui-col-xs4"><label class="mobile-input-label">任职职务：</label></div>
			    <div class="layui-col-xs8">
			    	<label class="mobile-input-label2"><span><?= $edu['eduPost']; ?></span></label>
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
				    	<?= $edu['eduBurseHonorary']; ?>
				    </div>
			    </div>
			</div>
		<?php } ?>
		</fieldset>
	<?php } ?>
	
	<!--
    	作者：lijianlin0204@163.com
    	时间：2017-12-04
    	描述：工作经历
    -->
	<?php if(!empty($entryData['workData'])){ ?>
		<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
		  	<legend>
		  		工作经历信息
		  	</legend>
		<?php foreach($entryData['workData'] as $work){ ?>
			
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">起始时间：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $work['wkStart']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">终止时间：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $work['wkStart']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">所在岗位：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $work['wkPost']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">所在单位：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $work['wkCom']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">工作简述：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span></span></label>
				    </div>
				</div>
				<div class="layui-row">
					<div style="margin-left: -2px;color: #666;">
					    <div class="layui-textarea">
					    	<?= $work['wkInfo']; ?>
					    </div>
				    </div>
				</div>
		<?php } ?>
		</fieldset>
	<?php } ?>
	
	<!--
    	作者：lijianlin0204@163.com
    	时间：2017-12-04
    	描述：家庭成员
    -->
	<?php if(!empty($entryData['famData'])){ ?>
		<fieldset class="layui-elem-field site-demo-button" style="margin-top: 10px;">
		  	<legend>
		  		家庭成员信息
		  	</legend>
		<?php foreach($entryData['famData'] as $fam){ ?>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">成员关系：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $fam['famRelation']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">成员姓名：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $fam['famName']; ?></span></label>
				    </div>
				</div>
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">所在工作单位：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $fam['famCom']; ?></span></label>
				    </div>
				</div>
				
				<div class="layui-row">
				    <div class="layui-col-xs4"><label class="mobile-input-label">任职岗位：</label></div>
				    <div class="layui-col-xs8">
				    	<label class="mobile-input-label2"><span><?= $fam['famPost']; ?></span></label>
				    </div>
				</div>
		<?php } ?>
		</fieldset>
	<?php } ?>
	
	<!--
    	作者：lijianlin0204@163.com
    	时间：2017-12-04
    	描述：报名撤回
    -->	
	<div class="layui-row" style="padding:25px 0 0 0;">
		<div class="layui-col-xs12">
			<div style="text-align: center;">
			<button id="enrty_back" onclick="enrty_back()" class="layui-btn layui-btn-normal layui-btn-radius" style="min-width: 120px;width: 40%;">报名撤回</button></div>
		</div>
	</div>	
</div>

<script>

var __index2_recID__ = "<?= $entryData['recData']['recID']; ?>";
var __index2_recEnd__ = "<?= $entryData['recData']['recEnd']; ?>";
var __index2_backtimes__ = "<?= $entryData['baseData']['perBack'] ?>";
var __index2_perID__ = "<?= $entryData['baseData']['perID'] ?>";

$(function(){
	//控制报名撤回按钮的显示与隐藏
	var nowData = formatDateTime();
	if(__index2_recEnd__ < nowData){
		$("#enrty_back").attr('disabled','disabled');
		$("#enrty_back").addClass("layui-btn-disabled");
	}else{
		$("#enrty_back").removeAttr('disabled');
		$("#enrty_back").removeClass("layui-btn-disabled");
	}
});

/*报名撤回*/
function enrty_back(){
	if(__index2_backtimes__ == 3){
		layer.open({content: "报名撤回已经操作三次了，不允许再次撤回",btn: '我知道了'});
		return;
	}
	layer.open({content:'信息已经在审核当中了，您确定要报名撤回了？<br/><span style="color:red;">当前已撤回'+__index2_backtimes__+'次</span>',btn: ['确定','取消'],yes: function(index){
	      	$.post("<?= yii\helpers\Url::to(['zpcx/entry-back']); ?>",{'recID':__index2_recID__,'perID':__index2_perID__,'perBack':__index2_backtimes__},function(json){
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