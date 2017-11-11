<div class="hg-left">
    <div id="container1" style="height: 99.5%; width: 99.5%;"></div>
</div>
<div class="hg-right">
    <div id="container2" style="height: 99.5%; width: 99.5%;"></div>
</div>
<div class="hg-left">
    3
</div>
<div class="hg-right">
    4
</div>

<script>
var __index1_recbatch_recID__ = "<?= $recID ?>";
$(function(){
	$.getJSON("<?= yii\helpers\Url::to(['statistics/get-recbatch-info']); ?>",{'recID':__index1_recbatch_recID__},function(json){
		load_container1(json.c1);
		load_container2(json.c2);
	});
});

function load_container2(data){
	var chart = Highcharts.chart('container2', {
	    title: {
	        text: '<span style="font-size:14px;">环节通过占比</span>'
	    },
	    subtitle: {
	        text: ''
	    },
	    yAxis: {
	        title: {
	            text: '通过占比'
	        }
	    },
	    xAxis: {
            categories: [
                '资格审查',
                '参加考试',
                '参加体检',
                '参加政审'
            ],
//          crosshair: true
        },
	    credits:{
		    enabled: false 
		},
		tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.2f}%</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },		
	    series:data,
	    responsive: {
	        rules: [{
	            condition: {
	                maxWidth: 500
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

function load_container1(data){
	$('#container1').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '<span style="font-size:14px;">环节男女占比</span>'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                '资格审查',
                '参加考试',
                '参加体检',
                '参加政审'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: '人数 '
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        credits:{
		    enabled: false 
		},
        series: data
    });
}
</script>
