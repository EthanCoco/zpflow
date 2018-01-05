
<h1 style="color: red;">表格PDF打印</h1>

<table class="common-table" cellpadding="0" cellspacing="0" border="1">
	<tr>
		<td width="30mm" class="ctd">姓名</td>
		<td width="30mm" class="ctd"><?= $jsonData['name'] ?></td>
		<td width="30mm" class="ctd">性别</td>
		<td width="30mm" class="ctd"><?= $jsonData['gender'] ?></td>
		<td width="30mm" class="ctd">民族</td>
		<td width="30mm" class="ctd"><?= $jsonData['nation'] ?></td>
	</tr>
	<tr>
		<td width="30mm" class="ctd">手机号</td>
		<td width="30mm" class="ctd"><?= $jsonData['phone'] ?></td>
		<td width="30mm" class="ctd">身份证号码</td>
		<td width="30mm" class="ctd" colspan="3"><?= $jsonData['idcard'] ?></td>
	</tr>
</table>
