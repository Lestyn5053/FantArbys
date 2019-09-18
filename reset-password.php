<?php
	require "header.php";
?>

<main>
    <h1>Reset Your Password</h1>
    <p>We will send you an email with instructions on how to reset your password.</p>
    <form action="includes/reset-request.inc.php" method="post">
        <div class="form-group">
            <label class="form-label" for="email">Please enter your e-mail address.</label>
            <input class="form-input" type="text" name="email" placeholder="Enter your e-mail address">
        </div>
        <button class="btn btn-primary input-group-btn" type="submit" name="reset-request-submit">Submit</button>
    </form>
    <?php
        if (isset($_GET["reset"]))
        {
            if ($_GET["reset"] == "success")
            {
                echo '<p class="text-success">Request sent! Check your e-mail for details!</p>';
            }
        }
    ?>
</main>

<?php
	require "footer.php";
?>