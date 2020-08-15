<html>
<head>
	<title>Login System</title>
</head>
<body>
	<h1>Login System</h1>
	<?php echo form_open('login/cek_login'); ?>	
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Login"></td>
			</tr>
		</table>
	</form>
</body>
</html>