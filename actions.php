<?php 
	require_once "functions.php";

	if ($_GET['action'] == "loginSignup"){

		$email = mysqli_real_escape_string($link, $_POST['email']);
		$password = mysqli_real_escape_string($link, $_POST['password']);

		$error = "";
		if (!$email) {
			$error = "Email address is required.";
		}elseif (!$password) {
			$error = "Password is required.";
		}elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
			$error = "Please enter a valid email address.";
		}

		/* Sign up functionality */
		if ($_POST['loginActive'] == 0) {
			
			/* Check for double emails */
			$sql = "SELECT * FROM users WHERE `email` = '".$email."' LIMIT 1";
			$result = mysqli_query($link, $sql);
			if (mysqli_num_rows($result) > 0) {
				$error = "The email address you entered is already taken";
			}else{
				/* Insert the user */
				$sql = "INSERT INTO users(email, password) VALUES('$email', '$password')";
				$result = mysqli_query($link, $sql) or die(mysqli_error($link) . __LINE__);
				if ($result) {

					/* Start the session for newly registered user */
					$_SESSION['id'] = mysqli_insert_id($link);

					/* Hash password via md5 */

					$password_hashed = md5(md5($_SESSION['id'].$password));
					$sql = "UPDATE users SET password = '".$password_hashed."' WHERE id='".$_SESSION['id']."' LIMIT 1";
					mysqli_query($link, $sql);

					echo "1";

				}else{
					$error = "Something went wrong, please try again.";
				}
			}

		/* Log in functionality */
		}else if($_POST['loginActive'] == 1){
			$sql = "SELECT * FROM users WHERE email = '".$email."' LIMIT 1";
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_assoc($result);
			
			$email_current = $row['email'];
			$password_current = md5(md5($row['id'].$password));

			if ($email_current == $email && $row['password'] == $password_current) {
				echo "1";

				/* Set the session for logged in user */
				$_SESSION['id'] = $row['id'];
			}else{
				$error = "Username or password are incorrect.";
			}
		}

		if ($error != '') {
			echo $error;
			exit();
		}

	}


	/* Logout functionality */
	if ($_GET['action'] == 'logout') {
		if (isset($_SESSION['id'])) {
			session_destroy();
			header("Location: index.php");
		}
	}
?>