<?php
	require "header.php";
?>

<main>
	<?php
		if(isset($_SESSION['userID']))
		{
            echo '<form action="includes/filltable.inc.php" method="POST">
            <button class="btn btn-primary" id="button" type="submit" name="filltable-submit">Populate FRC Teams Table</button>
            </form>';
		}
		else
		{
			echo '<p>You must be logged in to use this feature.</p>';
		}
	?>
</main>

<?php
	require "footer.php";
?>