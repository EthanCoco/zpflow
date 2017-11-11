<div class="hg-left">
    <div id="container1" style="height: 99.5%; width: 99.5%;"></div>
</div>
<div class="hg-right">
    <div id="container2" style="height: 99.5%; width: 99.5%;"></div>
</div>
<div class="hg-left">
    <div id="container3" style="height: 99.5%; width: 99.5%;"></div>
</div>
<div class="hg-right">
    <div id="container4" style="height: 99.5%; width: 99.5%;"></div>
</div>

<script>
var __index1_recbatch_recID__ = "<?= $recID ?>";
$(function(){
	$.getJSON("<?= yii\helpers\Url::to(['statistics/get-recbatch-info']); ?>",{'recID':__index1_recbatch_recID__},function(json){
		load_container1(json.c1);
		load_container2(json.c2);
		load_container3(json.c3);
		load_container4(json.c1,json.c2,json.c3);
	});
});

function load_container4(data1,data2,data3){
	$('#container4').highcharts({
		 chart: {
            zoomType: 'xy'
        },
        title: {
            text: '图形一览'
        },
        xAxis: {
            categories: [
                '资格审查',
                '参加考试',
                '参加体检',
                '参加政审'
            ],
        },
        yAxis: [{
            min: 0,
            title: {
                text: '人数 '
            }
        }, {
            title: {
                text: '通过占比（%）'
            },
            opposite: true
        }],
        credits:{
		    enabled: false 
		},
        plotOptions: {
            series: {
                stacking: 'normal'
            }
        },
        labels: {
            items: [{
                style: {
                    left: '100px',
                    top: '18px',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                }
            }]
        },
        series: [{
            type: 'column',
            name: data1[0]['name'],
            data:data1[0]['data']
        }, {
            type: 'column',
            name: data1[1]['name'],
            data:data1[1]['data']
        }, {
            type: 'spline',
            yAxis:1,
            name: data2[0].name,
            data: data2[0].data,
            marker: {
                lineWidth: 2,
                lineColor: Highcharts.getOptions().colors[3],
                fillColor: 'white'
            }
        }, {
            type: 'pie',
            name: '人数占比',
            data: data3,
            center: [100, 80],
            size: 100,
            showInLegend: false,
            dataLabels: {
                enabled: false
            }
        }]
    });
}

function load_container3(data){
	$('#container3').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            spacing : [20, 0 , 40, 0]
        },
        title: {
            floating:true,
            text: '考官人数占比'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        credits:{
		    enabled: false 
		},
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                      enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.2f} %'
                },
                point: {
                    events: {
                        mouseOver: function(e) { 
                            chart.setTitle({
                                text: e.target.name+ '\t'+ e.target.y + ' 人'
                            });
                        }
                        //, 
                        // click: function(e) { // 同样的可以在点击事件里处理
                        //     chart.setTitle({
                        //         text: e.point.name+ '\t'+ e.point.y + ' %'
                        //     });
                        // }
                    }
                },
            }
        },
        series: [{
            type: 'pie',
            innerSize: '80%',
            name: '人数占比',
            data:data
        }]
    }, function(c) {
        // 环形图圆心
        var centerY = c.series[0].center[1],
            titleHeight = parseInt(c.title.styles.fontSize);
        c.setTitle({
            y:centerY + titleHeight/2
        });
        chart = c;
    });
}

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
	            text: '通过占比（%）'
	        }
	    },
	    xAxis: {
            categories: [
                '资格审查',
                '参加考试',
                '参加体检',
                '参加政审'
            ],
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
            },
            series: {
                cursor: 'pointer',
                events: {
                    click: function (event) {
						alert(this.type);
                    }
                }
            }
        },
        credits:{
		    enabled: false 
		},
        series: data
    });
}
</script>
