<div class="layui-side layui-bg-black"  style="top: 94px;">
    <div class="layui-side-scroll" style="height: 100%;">
      	<ul class="layui-nav layui-nav-tree" lay-filter="test">
		  	<li class="layui-nav-item layui-nav-itemed">
			    <a href="javascript:;">招聘信息图表统计</a>
			    <dl class="layui-nav-child">
			    	<?php if(!empty($recInfo)){ 
			    		$recInfo_len = count($recInfo);
			    	?>
				    	<?php for($i = 0; $i < $recInfo_len; $i++ ){ ?>
				    		<?php if($i == 0 ){ ?>
				    			<dd class="layui-this"><a index=1 onclick="statistics_get_infos(this,<?= $recInfo[$i]['recID'] ?>)" href="javascript:;"><?= $recInfo[$i]['recYear'].$recInfo[$i]['recBatch']; ?></a></dd>
				    		<?php }else{ ?>	
				    			<dd class=""><a index=1 href="javascript:;"><?= $recInfo[$i]['recYear'].$recInfo[$i]['recBatch']; ?></a></dd>
				    		<?php } ?>
				    	<?php } ?>	
			    	<?php }else{ ?>
				    	<dd class=""><a style="font-size: 12px;" onclick="javascript:return;">暂无招聘批次历史数据</a></dd>
			    	<?php } ?>
			    </dl>
		  	</li>
		</ul>
    </div>
</div>
  
<div class="layui-body" style="top: 94px;height: 85%;min-width: 1000px;">
	<div id="stepStatistics" class="hg-div">
	</div>
</div>

<script type="text/javascript">
var __statistics_recID__ = "";
<?php if(!empty($recInfo)){  ?>
	__statistics_recID__ = "<?= $recInfo[0]['recID'] ?>";
<?php } ?>
$(function(){
	changeTop(3);
	
	layui.use('element',function(){
		var element = layui.element;
	});
	statistics_get_infos('',__statistics_recID__);
});

function statistics_get_infos(th,recID){
	$("#stepStatistics").empty();
	if(recID == ""){
		$("#stepStatistics").load("<?= yii\helpers\Url::to(['statistics/nodev']); ?>");
	}else{
		if(th == ""){
			$("#stepStatistics").load("<?= yii\helpers\Url::to(['statistics/recbatch']); ?>"+"&recID="+recID);
		}else{
			var index = $(th).attr('index');
			switch(index){
				case "1" :
					$("#stepStatistics").load("<?= yii\helpers\Url::to(['statistics/recbatch']); ?>"+"&recID="+recID);
				break;
				default:
					
				break;
			}
		}
	}
}
</script>