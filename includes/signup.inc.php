<?php
if (isset($_POST['signup-submit']))
{
	require 'dbh.inc.php';
	
	 $username = $_POST['uid'];
	 $email = $_POST['email'];
	 $password = $_POST['pwd'];
	 $passwordConfirm = $_POST['pwd-confirm'];
	 
	 if (empty($username) || empty($email) || empty($password) || empty($passwordConfirm))
	 {
		 header("Location: ../signup.php?error=emptyfields&uid=".$username."&email=".$email);
		 exit();
	 }
	 else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username))
	 {
		 header("Location: ../signup.php?error=invalidemailuid");
		 exit();		 
	 }
	 else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	 {
		 header("Location: ../signup.php?error=invalidemail&uid=".$username);
		 exit();		 
	 }
	 else if (!preg_match("/^[a-zA-Z0-9]*$/", $username))
	 {
		 header("Location: ../signup.php?error=invaliduid&email=".$email);
		 exit();		 
	 }
	 else if ($password !== $passwordConfirm)
	 {
		 header("Location: ../signup.php?error=passwordcheck&uid=".$username."&email=".$email);
		 exit();
	 }
	 else
	 {
		 $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
		 $stmt = mysqli_stmt_init($conn);
		 if (!mysqli_stmt_prepare($stmt, $sql))
		 {
		 header("Location: ../signup.php?error=sqlerror");
		 exit();			 
		 }
		 else
		 {
			 mysqli_stmt_bind_param($stmt, "s", $username);
			 mysqli_stmt_execute($stmt);
			 mysqli_stmt_store_result($stmt);
			 $resultCheck = mysqli_stmt_num_rows($stmt);
			 if ($resultCheck > 0)
			 {
				header("Location: ../signup.php?error=usertaken&email=".$email);
				exit();				 
			 }
			 else
			 {
				 $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
				 $stmt = mysqli_stmt_init($conn);
				 if (!mysqli_stmt_prepare($stmt, $sql))
				 {
					 header("Location: ../signup.php?error=sqlerror");
					 exit();
				 }
				 else
				 {
					$hashed_password = password_hash($password, PASSWORD_DEFAULT);
					
					mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);
					mysqli_stmt_execute($stmt);
					header("Location: ../signup.php?signup=success");
					exit(); 
				 }
			 }
		 }
	 }
	 mysqli_stmt_close($stmt);
	 mysqli_close($conn);
}
else
{
	header("Location: ../signup.php?");
	exit();
}