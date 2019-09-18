<?php
	require "header.php";
?>

<main>
	<script>
		$.ajax({
    	url: 'https://www.thebluealliance.com/api/v3/district/2019fim/rankings',
    	headers: {
        	'X-TBA-Auth-Key':'ksRTHX6izdxPx5pCAYbt9Cp5xIIX7IVhh6pHurbW8W6oKEVFONNwDHnv8AFoB9wR'
    	},
    method: 'GET',
    dataType: 'json',
    success: function(teams){
	  console.log(teams);
	  
	  var $teams = $('#teams');

	  $.each(teams, function(i, team) {
		$teams.append('<li>Rank '+ team.rank +': '+ team.team_key + '</li>')
	  });
    }
  });
	</script>
    <?php
		if(isset($_SESSION['userID']))
		{
			echo '<p>WE HAVE THE MEATS.</p>
			<h2>2019 FiM District Rankings</h2>
			<ul id="teams"></ul>';
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