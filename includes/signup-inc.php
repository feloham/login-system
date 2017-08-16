<?php

if (isset($_POST['submit'])) {
	
	include_once 'dbh-inc.php';

	$first = mysqli_real_escape_string($connection, $_POST['first']);
	$last = mysqli_real_escape_string($connection, $_POST['last']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$userid = mysqli_real_escape_string($connection, $_POST['userid']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);

	//Error Handlers
	//Check for empty fields
	if (empty($first) || empty($last) || empty($email) || empty($userid) || empty($password)) {
		header("Location: ../signup.php?signup=empty");
		exit();
	} else {
		//Check if input charachters are valid
		if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
			header("Location: ../signup.php?signup=invalid");
			exit();
		} else {
			//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=email");
				exit();
			} else {
				$sql = "SELECT * FROM users WHERE userid='$userid';";
				$result = mysqli_query($connection, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header("Location: ../signup.php?signup=usertaken");
					exit();
				} else {
					//Heashing the password
					$hashedpwd = password_hash($password, PASSWORD_DEFAULT);

					//Insert the user into the database
					$sql = "INSERT INTO users (first, last, email, userid, password) VALUES ('$first', '$last', '$email', '$userid', '$hashedpwd');";
					mysqli_query($connection, $sql);
					header("Location: ../signup.php?signup=success");
					exit();
				}
			}
		}
	}

} else {
	header("Location: ../signup.php");
	exit();
}