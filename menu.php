<?php
	require "header.php";
?>

<main>
	<script>
		$.ajax({
    	url: 'https://www.thebluealliance.com/api/v3/event/2019milan/teams/simple',
    	headers: {
        	'X-TBA-Auth-Key':'ksRTHX6izdxPx5pCAYbt9Cp5xIIX7IVhh6pHurbW8W6oKEVFONNwDHnv8AFoB9wR'
    	},
    method: 'GET',
    dataType: 'json',
    success: function(data){
      console.log(data);

 	  var json_obj = JSON.parse(data);
    }
  });
	</script>
    <?php
		if(isset($_SESSION['userID']))
		{
			echo '<p>WE HAVE THE MEATS.</p>';
		}
		else
		{
			echo '<p>You are logged out. Please log in to continue.</p>';
		}
	?>
</main>

<?php
	require "footer.php";
?>