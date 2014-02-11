<h1>Users</h1>

<form action="<?php echo URL?>user/create" method="post">
	<label for="">Login</label><input type="text" name="login"><br>
	<label for="">Password</label><input type="password" name="password"><br>
	<label for="">Role</label>
	<select name="role">
		<option value="default" selected="selected">Default</option>
		<option value="admin">Admin</option>
	</select>
	<br>
	<input type="submit">
</form>

<hr>

<table >
<?php foreach($this->userList as $key => $value): ?>
	<tr>
		<td><?php echo $value['id']; ?></td>
		<td><?php echo $value['login']; ?></td>
		<td><?php echo $value['role']; ?></td>
		<td><a href="<?php echo URL;?>user/edit/<?php echo $value['id']?>">Edit</a> | 
			<a href="<?php echo URL;?>user/delete/<?php echo $value['id']?>">Delete</a>
		</td>
	</tr>
<?php endforeach;?>
</table>