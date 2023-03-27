<!DOCTYPE html>
<html>
<head>
	<title>Registration & Login</title>
</head>
<body>

	<h1>Registration</h1>
	<?php
	if(isset($_POST['register'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];
		
		if(empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($confirm_password)){
			echo "All fields are required!";
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			echo "Invalid email format!";
		}
		else if($password !== $confirm_password){
			echo "Passwords do not match!";
		}
		else{
			// Add code here to save user data to a database or file.
			echo "Registration successful!";
		}
	}
	?>

	<form method="post">
		<label for="firstname">First Name:</label>
		<input type="text" name="firstname" id="firstname" required><br>

		<label for="lastname">Last Name:</label>
		<input type="text" name="lastname" id="lastname" required><br>

		<label for="email">Email:</label>
		<input type="email" name="email" id="email" required><br>

		<label for="password">Password:</label>
		<input type="password" name="password" id="password" required><br>

		<label for="confirm_password">Confirm Password:</label>
		<input type="password" name="confirm_password" id="confirm_password" required><br>

		<input type="submit" name="register" value="Register">
	</form>


	<h1>Login</h1>
	<?php
	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		// Add code here to check if email and password are correct.
		if($email === 'example@example.com' && $password === 'password'){
			session_start();
			$_SESSION['firstname'] = 'John'; // Replace with the user's actual first name.
			header('Location: welcome.php');
			exit();
		}
		else{
			echo "Invalid email or password!";
		}
	}
	?>

	<form method="post">
		<label for="email">Email:</label>
		<input type="email" name="email" id="email" required><br>

		<label for="password">Password:</label>
		<input type="password" name="password" id="password" required><br>

		<input type="submit" name="login" value="Login">
	</form>

</body>
</html>
