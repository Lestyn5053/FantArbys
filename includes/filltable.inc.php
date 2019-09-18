<?php
if (isset($_POST['filltable-submit']))
{
    require 'dbh.inc.php';

    $rUrl = "https://www.thebluealliance.com/api/v3/district/2019fim/teams/simple";

    $curl = curl_init($rUrl);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'X-TBA-Auth-Key: ksRTHX6izdxPx5pCAYbt9Cp5xIIX7IVhh6pHurbW8W6oKEVFONNwDHnv8AFoB9wR',
        'accept: application/json'
    ));

    $response = curl_exec($curl);

    //$json = file_get_contents($response);
    $obj = json_decode($response,true);

    foreach($response as $item)
    {

        $ID = $item['team_number'];
        $team_number = $item['team_number'];
        $team_name = $item['nickname'];
        $state_prov = $item['state_prov'];

        $sql = mysqli_query("INSERT INTO FRCTeam (ID, TeamNumber, TeamName, Region) VALUES ($ID, $team_number, $team_name, $state_prov)");

        /*$sql = mysql_query("INSERT INTO `FRCTeam` (`ID`, `TeamNumber`, `TeamName`, `Region`) 
        VALUES ('".$item['team_number']."', '".$item['team_number']."', '".$item['nickname']."', '".$item['state_prov']."')");*/
    } 

    if ($conn->query($sql) === TRUE)
    {
        echo '<p>Congrats. Ya did it.</p>';
    }
    else
    {
        echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
    }

    mysqli_close($conn);
    curl_close($curl);
}
else
{
    header("Location: ../index.php?");
	exit();
}