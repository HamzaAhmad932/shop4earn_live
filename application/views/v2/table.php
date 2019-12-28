<!DOCTYPE html>
<html>
<head>
	<title>Users table</title>
</head>
<body>
<table>
	<thead>
		<th style='border: 1px solid black' >User ID</th>
		<th style='border: 1px solid black' >User Name</th>
		<th style='border: 1px solid black' >Total Sub Members</th>
		<th style='border: 1px solid black' >Child 1(L)</th>
		<th style='border: 1px solid black' >Child 2(R)</th>
		<th style='border: 1px solid black' >Power Count</th>
		<th style='border: 1px solid black' >Weak Count</th>
		<th style='border: 1px solid black' >Difference</th>
		<th style='border: 1px solid black' >Powered ID</th>
		<th style='border: 1px solid black' >Powered Name</th>
	</thead>
	<?php foreach($users as $user){?>
		<tr>
			<td style='border: 1px solid black' ><?=$user['user_id']?></td>
			<td style='border: 1px solid black' ><?=$user['name']?></td>
			<td style='border: 1px solid black' ><?=$user['total_sub_members']?></td>
			<td style='border: 1px solid black' ><?=$user['child_1']?></td>
			<td style='border: 1px solid black' ><?=$user['child_2']?></td>
			<td style='border: 1px solid black' ><?=$user['power']?></td>
			<td style='border: 1px solid black' ><?=$user['weak']?></td>
			<td style='border: 1px solid black' ><?=$user['diff']?></td>
			<td style='border: 1px solid black' ><?=$user['power_id']?></td>
			<td style='border: 1px solid black' ><?=$user['power_name']?></td>
		</tr>
	<?php }?>
</table>
</body>
</html>