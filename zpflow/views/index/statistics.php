<?php 
	$this->registerJsFile("@web/js/plugin/Highcharts-6.0.2/code/highcharts.js", ['depends' => ['yii\web\YiiAsset'], 'position' => $this::POS_HEAD]);
?>
<div class="layui-side layui-bg-black"  style="top: 94px;">
    <div class="layui-side-scroll" style="height: 100%;">
      	<ul class="layui-nav layui-nav-tree" lay-filter="test">
		  	<li class="layui-nav-item layui-nav-itemed">
			    <a href="javascript:;">默认展开</a>
			    <dl class="layui-nav-child">
			      	<dd><a href="javascript:;">选项1</a></dd>
			      	<dd><a href="javascript:;">选项2</a></dd>
			      	<dd><a href="">跳转</a></dd>
			      	<dd><a href="javascript:;">选项1</a></dd>
			      	<dd><a href="javascript:;">选项2</a></dd>
			    </dl>
		  	</li>
		  	<li class="layui-nav-item">
			    <a href="javascript:;">解决方案</a>
			    <dl class="layui-nav-child">
			      	<dd><a href="">移动模块</a></dd>
			      	<dd><a href="">后台模版</a></dd>
			      	<dd><a href="">电商平台</a></dd>
			    </dl>
		  	</li>
		  	<li class="layui-nav-item"><a href="">产品</a></li>
		  	<li class="layui-nav-item"><a href="">大数据</a></li>
		</ul>
    </div>
</div>
  
<div class="layui-body" style="top: 94px;height: 90%;min-width: 1000px;">
	<div id="stepStatistics" class="hg-div">
		
		<div class="hg-left">
		    <div id="container" style="height: 99.5%; width: 99.5%;"></div>
		</div>
		<div class="hg-right">
		    2
		</div>
		<div class="hg-left">
		    3
		</div>
		<div class="hg-right">
		    4
		</div>
	</div>
</div>

<script type="text/javascript">
$(function(){
	changeTop(3);
	
	layui.use('element',function(){
		var element = layui.element;
	});
	ff();
});

function ff(){
	Highcharts.chart('container', {

    title: {
        text: 'Solar Employment Growth by Sector, 2010-2016'
    },

    subtitle: {
        text: ''
    },

    yAxis: {
        title: {
            text: 'Number of Employees'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 2010
        }
    },

    series: [{
        name: 'Installation',
        data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
    }, {
        name: 'Manufacturing',
        data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
    }, {
        name: 'Sales & Distribution',
        data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
    }, {
        name: 'Project Development',
        data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
    }, {
        name: 'Other',
        data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
    }],

    responsive: {
        rules: [{
            condition: {
//              maxWidth: 500,
//				height:100,
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
}
</script>