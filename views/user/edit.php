<h1>Edit User</h1>


<form action="<?php echo URL?>user/editSave/<?php echo $this->user['id']?>" method="post">
	<label for="">Login</label><input type="text" name="login" value="<?php echo $this->user['login']?>"><br>
	<label for="">Password</label><input type="password" name="password" value=""><br>
	<label for="">Role</label>
	<select name="role">
		<option value="default" <?php if($this->user['role']=='default' ) echo 'selected'?> >Default</option>
		<option value="admin" <?php if($this->user['role']=='admin' ) echo 'selected'?> >Admin</option>
		<option value="owner" <?php if($this->user['role']=='owner' ) echo 'selected'?> >Owner</option>
	</select>
	<br>
	<input type="submit">
</form>
