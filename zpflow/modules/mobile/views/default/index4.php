<div class="layui-row">
	<div class="mobile-personal-header">
		<a href="javascript:;" class="medal_detail">
            <div class="mobile-info-detail">
                <div class="mobile-info-photo">
                    <?php if(!empty($perInfo)){ ?>
                    	<img src="<?= $perInfo['perPhoto']; ?>">
                    <?php }else{ ?>
                    	<img src="./images/mobile/pic.jpg">
                    <?php } ?>
                </div>
                <div class="mobile-info-name">
                    <div class="mobile-nickname">
                        <p style="color: #666;"><?= Yii::$app->user->identity->realName; ?></p>                                
                    </div>
                    <div class="mobile-login-name">
                        <p><?= Yii::$app->user->identity->name; ?></p>
                    </div>
                </div>
            </div>
        </a>
	</div>
</div>



<script type="text/javascript">
var index = <?php echo $index;?>;
$(document).ready(function() {
	$("#moblie-header span a[index='"+index+"']").addClass('current');
});
</script>