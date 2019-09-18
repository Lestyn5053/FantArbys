<?php
	require "header.php";
?>

<main>
    <?php
        $selector = $_GET["selector"];
        $validator = $_GET["validator"];

        if (empty($selector) || empty($validator))
        {
            echo "We could not validate your request. Please try again.";
        }
        else
        {
            if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false)
            {
                echo '<form action="includes/reset-password.inc.php" method="post">
                <input type="hidden" name="selector" value="$selector">
                <input type="hidden" name="validator" value="$validator">
                <input type="password" name="pwd" placeholder="Enter a new password">
                <input type="password" name="pwdConfirm" placeholder="Confirm new password">
                <button class="btn btn-primary input-group-btn" type="submit" name="reset-password-submit">Reset Password</button>
                </form>';
            }
        }
    ?>
</main>

<?php
	require "footer.php";
?>