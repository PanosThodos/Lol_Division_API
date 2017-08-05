<?php 
	//Global variable for your riot api key
	$apikey = "YOUR-API-KEY-GOES-HERE"; 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>League of Legends API</title>

    <!-- Custom Css-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="background:url('images/bodyimg.jpg')">

  	<div id="header">
  		<img src="images/logo.png">
	    <h1>This is the League of Legends API.</h1>
    </div>

	<div id="content">

		<?php echo "<h3>".$_GET["summoner"]."</h3>"; ?>
		<?php
			//Make API call for summoner name data
			$jsonurlname = "https://eun1.api.riotgames.com/lol/summoner/v3/summoners/by-name/".$_GET["summoner"]."?api_key=".$apikey;
			$jsonname = @file_get_contents($jsonurlname);
			$parsed_jsonname = json_decode($jsonname, true);
			if($jsonname === FALSE) { echo("<p>Summoner name ".$_GET["summoner"]." could not be found.</p>"); }
			else{
				//Display data
				$summId = $parsed_jsonname['id'];
				echo("<p>Account id : ".$parsed_jsonname['accountId']."</p>");
				echo("<p>SummonerName : ".$parsed_jsonname['name']."</p>");
				echo("<p>profileIcon id :".$parsed_jsonname['profileIconId']."</p>");
				echo("<p>revisionDate : ".$parsed_jsonname['revisionDate']."</p>");
				echo("<p>Summoner Level : ".$parsed_jsonname['summonerLevel']."</p>");
			}


			//Make API call for rank and division
			$jsonurlrank = "https://eun1.api.riotgames.com/lol/league/v3/positions/by-summoner/".$summId."?api_key=".$apikey;
			$jsonrank = @file_get_contents($jsonurlrank);
			$parsed_jsonrank = json_decode($jsonrank, true);

			//Check for errors
			if($jsonrank === FALSE) { echo("<p>Summoner Division could not be loaded.</p>"); }
			else{

				//Display data
				if($parsed_jsonname['summonerLevel'] == 30){
					if(empty($parsed_jsonrank)){
					echo("<h2> UNRANKED </h2>");
					}
					else{
						//Checks every single division and tier and displays the icon
						if($parsed_jsonrank[0]['tier'] == "BRONZE"){
							if($parsed_jsonrank[0]['rank'] == "V"){echo('<img src="images/tier-icons/tier-icons/bronze_v.png">');}
							if($parsed_jsonrank[0]['rank'] == "IV"){echo('<img src="images/tier-icons/tier-icons/bronze_iv.png">');}
							if($parsed_jsonrank[0]['rank'] == "III"){echo('<img src="images/tier-icons/tier-icons/bronze_iii.png">');}
							if($parsed_jsonrank[0]['rank'] == "II"){echo('<img src="images/tier-icons/tier-icons/bronze_ii.png">');}
							if($parsed_jsonrank[0]['rank'] == "I"){echo('<img src="images/tier-icons/tier-icons/bronze_i.png">');}
						}
						if($parsed_jsonrank[0]['tier'] == "SILVER"){
							if($parsed_jsonrank[0]['rank'] == "V"){echo('<img src="images/tier-icons/tier-icons/silver_v.png">');}
							if($parsed_jsonrank[0]['rank'] == "IV"){echo('<img src="images/tier-icons/tier-icons/silver_iv.png">');}
							if($parsed_jsonrank[0]['rank'] == "III"){echo('<img src="images/tier-icons/tier-icons/silver_iii.png">');}
							if($parsed_jsonrank[0]['rank'] == "II"){echo('<img src="images/tier-icons/tier-icons/silver_ii.png">');}
							if($parsed_jsonrank[0]['rank'] == "I"){echo('<img src="images/tier-icons/tier-icons/silver_i.png">');}
						}
						if($parsed_jsonrank[0]['tier'] == "GOLD"){
							if($parsed_jsonrank[0]['rank'] == "V"){echo('<img src="images/tier-icons/tier-icons/gold_v.png">');}
							if($parsed_jsonrank[0]['rank'] == "IV"){echo('<img src="images/tier-icons/tier-icons/gold_iv.png">');}
							if($parsed_jsonrank[0]['rank'] == "III"){echo('<img src="images/tier-icons/tier-icons/gold_iii.png">');}
							if($parsed_jsonrank[0]['rank'] == "II"){echo('<img src="images/tier-icons/tier-icons/gold_ii.png">');}
							if($parsed_jsonrank[0]['rank'] == "I"){echo('<img src="images/tier-icons/tier-icons/gold_i.png">');}
						}
					    if($parsed_jsonrank[0]['tier'] == "PLATINUM"){
							if($parsed_jsonrank[0]['rank'] == "V"){echo('<img src="images/tier-icons/tier-icons/platinum_v.png">');}
							if($parsed_jsonrank[0]['rank'] == "IV"){echo('<img src="images/tier-icons/tier-icons/platinum_iv.png">');}
							if($parsed_jsonrank[0]['rank'] == "III"){echo('<img src="images/tier-icons/tier-icons/platinum_iii.png">');}
							if($parsed_jsonrank[0]['rank'] == "II"){echo('<img src="images/tier-icons/tier-icons/platinum_ii.png">');}
							if($parsed_jsonrank[0]['rank'] == "I"){echo('<img src="images/tier-icons/tier-icons/platinum_i.png">');}
						}
						if($parsed_jsonrank[0]['tier'] == "DIAMOND"){
							if($parsed_jsonrank[0]['rank'] == "V"){echo('<img src="images/tier-icons/tier-icons/diamond_v.png">');}
							if($parsed_jsonrank[0]['rank'] == "IV"){echo('<img src="images/tier-icons/tier-icons/diamond_iv.png">');}
							if($parsed_jsonrank[0]['rank'] == "III"){echo('<img src="images/tier-icons/tier-icons/diamond_iii.png">');}
							if($parsed_jsonrank[0]['rank'] == "II"){echo('<img src="images/tier-icons/tier-icons/diamond_ii.png">');}
							if($parsed_jsonrank[0]['rank'] == "I"){echo('<img src="images/tier-icons/tier-icons/diamond_i.png">');}
						}
						if($parsed_jsonrank[0]['tier'] == "MASTER"){
							echo('<img src="images/tier-icons/base-icons/master.png"');
						}
						if($parsed_jsonrank[0]['tier'] == "CHALLENGER"){
							echo('<img src="images/tier-icons/base-icons/challenger.png"');
						}
						if(empty($parsed_jsonrank[0])){
						//Checking for Unranked
							echo('<img src="images/tier-icons/base-icons/provisional.png">');
						}
						//Prints Flex 5v5 Rank
						echo("<h2>Solo/Duo : ".$parsed_jsonrank[0]['tier']." ".$parsed_jsonrank[0]['rank']."</h2>");
						if(empty($parsed_jsonrank[1])){
							echo("<h2> Flex 5v5 : UNRANKED </h2>");
						}
						else{
						echo("<h2>Flex 5v5 : ".$parsed_jsonrank[1]['tier']." ".$parsed_jsonrank[1]['rank']."</h2>");
						}
					}
				}
				else
				{
					//if everything fails he is unranked
					echo("<h2> UNRANKED </h2>");
				}
			}


		?>

	</div>
	<footer class="footer">
		<p class="text-center"> <?php echo("Copyright 2017 &copy; Created by Panos Thodos"); ?> </p>
		<p style="font-size:11px">This Application isn't endorsed by Riot Games and doesn't reflect the views or opinions of Riot Games or anyone officially involved in producing or managing League of Legends. League of Legends and Riot Games are trademarks or registered trademarks of Riot Games, Inc. League of Legends © Riot Games, Inc.</p>
	</footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>