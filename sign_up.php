<!DOCTYPE html>
<html lang="en">

		<head>
			<meta charset = "UTF-8">
			<title> Sign up </title>
			<link rel = "stylesheet" href = "style_sign_up.css">
		
		</head>

	<body>
	
		<div class="box">
	

			<form autocomplete="off" action="#" method="post">

				<h2>Sign up</h2>

				<div class="inputBox">
					<input id = "username" type = "text" required = "required" name = "user_name">
					<span>Username</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "name" type = "text" required = "required" name = "name">
					<span>First name</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "surname" type = "text" required = "required" name = "surname">
					<span>Last name</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "email" type = "text" required = "required" name = "email">
					<span>Email</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "password" type = "password" required = "required" name = "password">
					<span>Password</span>
					<i></i>
				</div>

                <div class = "inputBox">
					<input id = "password" type = "password" required = "required" name = "password">
					<span>Repeat password</span>
					<i></i>
				</div>

				<input type="submit" name="insert-btn" value="Sign up">

			</form>


		</div>

	</body>
</html>