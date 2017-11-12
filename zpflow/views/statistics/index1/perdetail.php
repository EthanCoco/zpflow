<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
AppAsset::register($this);
$this->registerJsFile("@web/js/common/jquery-1.9.1.min.js", ['depends' => ['yii\web\YiiAsset'], 'position' => $this::POS_HEAD]);
$this->title = '';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?= Html::csrfMetaTags() ?>
<title><?= Html::encode($this->title) ?></title>
<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div>
	<div id="per_con_detail_datagrid">
		
	</div>
</div>
<?php $this->endBody() ?>
<script>
var __recID_per_con_detail__ = "<?= $recID ?>";
$(function(){
	load_per_detail_datagrid();
});

function load_per_detail_datagrid(){
	var datagri_height = $(window).height();
	$('#per_con_detail_datagrid').datagrid({
        width:'auto',
        height:$(window).height()-20,
	    fitColumns: false,
	    singleSelect: false,
	    rownumbers: true,
	    method: "get",
	    queryParams: {'recID':__recID_per_con_detail__,'type':"<?= $type ?>",'nodeType':"<?= $nodeType ?>",'typeOneWhere':"<?= $typeOneWhere ?>",'typeTwoWhere':"<?= $typeTwoWhere ?>"},
      	url:"<?= Url::to(['statistics/get-con-detail-list']); ?>",
      	rownumbers: true, 
      	sortName:'',
	    sortOrder:'',
	    pagination: true, 
//	    toolbar:'#flow4_step2_toolbar',
        frozenColumns:[[
    		{field:'ck',checkbox:true},
	        {field:'perIndex',title:'报名序号',width:'80',align:'center',sortable:true},
	        {field:'perName',title:'姓名',width:'70',align:'center',sortable:true},
        ]], 
        columns:[[
	        {field:'perIDCard',title:'身份证号',width:'180',align:'center',sortable:true},
	        {field:'perTicketNo',title:'准考证号',width:'100',align:'center'},
	        {field:'perGender',title:'性别',width:'5%',align:'center',sortable:true},
	        {field:'perBirth',title:'出生年月',width:'100',align:'center',sortable:true},
	        {field:'perJob',title:'应聘岗位性质',width:'8%',align:'center',sortable:true},
	        {field:'perPhone',title:'手机号码',width:'100',align:'center'},
	        {field:'perNation',title:'民族',width:'100',align:'center'},
	        {field:'perPolitica',title:'籍贯',width:'100',align:'center'},
	        {field:'perMarried',title:'婚姻状况',width:'100',align:'center'},
	        {field:'perUniversity',title:'毕业院校',width:'100',align:'center'},
	        {field:'perDegree',title:'学位',width:'100',align:'center'},
	        {field:'perMajor',title:'专业',width:'100',align:'center'},
	        {field:'perEducation',title:'学历',width:'100',align:'center'},
	        {field:'perForeignLang',title:'外语水平',width:'100',align:'center'},
	        {field:'perComputerLevel',title:'计算机水平',width:'100',align:'center'},
	        {field:'perEduPlace',title:'毕业生生源地',width:'100',align:'center'},
	        {field:'perEmePhone',title:'紧急人联系电话',width:'100',align:'center'},
	        {field:'perEmail',title:'电子邮箱',width:'100',align:'center'},
	        {field:'perPostCode',title:'邮政编码',width:'100',align:'center'},
	        {field:'perAddr',title:'联系地址',width:'100',align:'center'},
	        {field:'perMark',title:'备注信息',width:'100',align:'center'},
	        
	        {field:'perStatus',title:'审核状态（资格审查环节）',width:'100',align:'center'},
	        {field:'perReason',title:'审核不通过时间（资格审查环节）',width:'100',align:'center'},
	        {field:'perCheckTime',title:'审核时间（资格审查环节）',width:'100',align:'center'},
	        
	        {field:'perViewScore',title:'面试成绩（考试环节）',width:'100',align:'center'},
	        {field:'perPenScore',title:'笔试成绩（考试环节）',width:'100',align:'center'},
	        {field:'perPenViewScore',title:'综合成绩（考试环节）',width:'100',align:'center'},
	        {field:'perExamResult',title:'考试结果（考试环节）',width:'100',align:'center'},
	        
	        {field:'perMedCheck1',title:'体检结果（体检环节）',width:'100',align:'center'},
	        {field:'perMedCheck2',title:'复查结果（体检环节）',width:'100',align:'center'},
	        {field:'perMedCheck3',title:'体检最终结果（体检环节）',width:'100',align:'center'},
	        
	        
	        {field:'perCarefulStatus',title:'政审状态（政审环节）',width:'100',align:'center'},
	        {field:'perCarefulReson',title:'政审不通过原因（政审环节）',width:'100',align:'center'},
	        {field:'perCarefulTime',title:'政审时间（政审环节）',width:'100',align:'center'}
	        
	    ]],
    	onDblClickRow:function(index,row){
	    	
	    },
	});
}
</script>	
</body>
</html>
<?php $this->endPage() ?>