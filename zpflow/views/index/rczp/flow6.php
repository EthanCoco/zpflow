<div class="headinfo">
	<span><b>招聘批次</b></span>
	<span>
	  	<select id="recID_id" name="recID_name" lay-verify="required" class="input1" onchange="selRecruitID(this)">
		    <?php foreach($pcInfo as $pc){ ?>
	        	<option recend="<?php echo $pc['recend']; ?>" code="<?php echo $pc['code']; ?>" value="<?php echo $pc['id']; ?>"><?php echo $pc['value']; ?></option>
	        <?php } ?>
	 	</select>
	</span>
</div>
