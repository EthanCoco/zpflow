<?php
	$duration = 20;
	//缓存依赖
	$dependency = [
		'class'	=>	'yii\caching\FileDependency',
		'fileName'	=>	'hw.txt'
	];

	//缓存开关
	$enabled = true;
?>

<!--
	片段缓存通过beginCache来实现，如果需要设置缓存时间的话需要在beginCache里面添加第二个参数，是个数组
	['duration'=>20]
-->
<?php if($this->beginCache('cache_div',['duration'=>$duration,'dependency'=>$dependency,'enabled'=>$enabled])){ ?>
	
	<div id='cache_div'>
		<div>这里待会会被缓存</div>
		
		<!--
			片段缓存时间问题
			如果外存缓存时间大于里层缓存时间，那么在外存未过期的情况下，里层即使过期了也没有机会重新刷新
			所以，一般外存的缓存时间应该小于等于里层的缓存时间，但也不绝对
		-->
		<?php if($this->beginCache('cache_inner_div',['duration'=>1])){ ?>
			<div id="cache_inner_div">这是一个嵌套缓存111</div>
		<?php 
				$this->endCache();
			}
		?>
		 
	</div>
	
<?php
		$this->endCache();
	}
?>

<!--<div id='no_cache_div'>
	<div>这里待不会被缓存1111</div>
</div>-->