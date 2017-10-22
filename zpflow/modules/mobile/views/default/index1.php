<div class="layui-row">
	<div class="layui-col-xs6">
    	<div class="mobile-index1-title1">
    		<a href="<?= yii\helpers\Url::to(['default/index','index'=>1]); ?>">通知公告</a>
    	</div>
    </div>
	<div class="layui-col-xs6">
		<div class="mobile-index1-title2">
	    	<a href="javascript:void(0)">单位简介</a>
	   </div>
	</div>
</div>

<div class="layui-row">
	<div class="mobile-index1-content">
		<div class="mobile-index1-list">
			<p class="list-title">上海市杨浦区2017年青年储备人才招聘</p>
			<p class="list-subtitle"><span>发布日期：2017-09-15 23:12:23</span></p>
			<div class="list-content">
				同学们，想投身党政机关工作吗？想来杨浦创新创业吗？如果你的答案是肯定的，相信你一定不会错过上海市杨浦区储备人才这一职位的招聘。杨浦区为深入实施人才强区战略，形成合理的人才梯队，吸引更多重点大学的优秀毕业生到杨浦来，将招聘2017年青年储备人才。加入我们，相信你能凭借自己的努力和才华快速成长，实现自己的人生价值！
一、杨浦区情概述
杨浦区位于上海中心城区东北部，面积60.61平方公里，常住人口131万，是上海面积最大、人口最多的中心城区，拥有百年大学、百年工业、百年市政“三个百年”文明。近年来，杨浦紧紧围绕国家创新型城区、上海科创中心重要承载区、更高品质国际大都市中心城区和国家双创示范基地“三区一基地”的建设目标，在创新发展的道路上稳步前进。
			</div>
		</div>
		
	</div>
</div>

<script>
var index = <?= $index;?>;
$(document).ready(function() {
	$("#moblie-header span a[index='"+index+"']").addClass('current');
});
</script>