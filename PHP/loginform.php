<?php
$Message = "";
include_once('result.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="../JS/scripts.js"></script>
</head>

<body>
    <form method="POST" name="frmLogin" onsubmit="return(validateLogin());">
        <fieldset>
            <legend>Login</legend>
            <h4 class="loginmessage"><?php echo $Message; ?></h4>
				<h4>Username:</h4>
				<input type="text" name="username" placeholder="Enter your username" />
				<h4>Password:</h4>
				<input
					type="password"
					name="password"
					placeholder="Enter your password"
					autocomplete="current-password"
				/>
				<button type="submit" name="login">Login</button>
			</fieldset>
		</form>
	</body>
</html>
