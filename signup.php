<?php
	require "header.php";
?>

<main>
	<h1>Signup</h1>
	<?php
	if (isset($_GET['error']))
	{
		if ($_GET['error'] == "emptyfields")
		{
			echo '<p class="text-error">Please fill in all fields.</p>';
		}
		else if ($_GET['error'] == "invalidemailuid")
		{
			echo '<p class="text-error">Invalid email or username.</p>';
		}
		else if ($_GET['error'] == "invalidemail")
		{
			echo '<p class="text-error">Invalid email.</p>';
		}
		else if ($_GET['error'] == "invaliduid")
		{
			echo '<p class="text-error">Invalid username.</p>';
		}
		else if ($_GET['error'] == "passwordcheck")
		{
			echo '<p class="text-error">Your passwords do not match. Please double check your spelling and try again.</p>';
		}
		else if ($_GET['error'] == "usertaken")
		{
			echo '<p class="text-error">That username has already been taken. Please pick a new name and try again.</p>';
		}
	}
	else if ($_GET['signup'] == "success")
	{
		echo '<p class="text-success">Sign up successful!</p>';
	}
	?>
	<form action="includes/signup.inc.php" method="post">
		<div class="form-group">
			<label class="form-label" for="uid">Username</label>
			<input class="form-input" type="text" id="uid" name="uid" placeholder="Username">
		</div>
		<div class="form-group">
			<label class="form-label" for="email">E-mail Address</label>
			<input class="form-input" type="text" name="email" id="email" placeholder="E-mail address">
		</div>
		<div class="form-group">
			<label class="form-label" for="pwd">Password</label>
			<input class="form-input" type="password" name="pwd" id="pwd" placeholder="Password">
		</div>
		<div class="form-group">
			<label class="form-label" for="pwd-confirm">Confirm Password</label>
			<input class="form-input" type="password" name="pwd-confirm" id="pwd-confirm" placeholder="Confirm Password">
		</div>
		<button class="btn btn-primary input-group-btn" type="submit" name="signup-submit">Signup</button>
	</form>
</main>

<?php
	require "footer.php";
?>