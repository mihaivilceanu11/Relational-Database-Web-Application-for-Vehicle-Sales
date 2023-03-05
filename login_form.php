<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset = "UTF-8">
		<title>Vehicle Sales-Sign in</title>
		<link rel = "stylesheet" href = "style_login_form.css">
	</head>

	<body>
	
		<div class="box">
	

			<form autocomplete="off" action="first_page.php" method="post" onsubmit="return authenticate()">

				<h2>Vehicle Sales</h2>

				<div class="inputBox">
					<input id = "username" type = "text" required = "required" name = "user_name">
					<span>Username</span>
					<i></i>
				</div>

				<div class = "inputBox">
					<input id = "password" type = "password" required = "required" name = "password">
					<span>Password</span>
					<i></i>
				</div>

				<div class = "links">
					<a href = "forgot.php">Forgot password ?</a>
					<a href = "sign_up.php">Don't have an account yet?</a>
				</div>

				<input type="submit" name="insert-btn" value="Sign in">
				

			</form>
			
			<script>

			function authenticate(){
        			var authorised;
        			var username = document.getElementById("username").value;
        			var password = document.getElementById("password").value;
        
        
        			if(username == "mihai" && password == "pass"){
          				authorised = true;
        			}
					else{ 
          				authorised = false;
          				alert("Sorry, password is incorrect.");
        				}
        
        			return authorised;
      				}
	  
    		</script>

		</div>

	</body>
</html>