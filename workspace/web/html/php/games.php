<?php

	$username="strongsi_brian";
	$password="124578";
	$database="strongsi_vball_data";
	
	mysql_connect(localhost,$username,$password);
	
	@mysql_select_db($database) or die( "Unable to select database");

	//Determine the leagues
	$leagues_query="select distinct league_id from games";
	$leagues_result=mysql_query($leagues_query);
	
	$league_iter = 0;
	$num_leagues = mysql_numrows($leagues_result);
	
	while ($league_iter < $num_leagues) {
		
		$league_id = mysql_result($leagues_result,$league_iter,"league_id");
		
		//Determine the name of the league by id
		$league_name_query = "select gender_format from leagues where id = " . $league_id;
		$league_name_result = mysql_query($league_name_query);
		$league_name = mysql_result($league_name_result,0,"gender_format");
	
		echo "<h3 class=\"accordion_section_header\">" . $league_name . "</h3>";		
		?>
		<div>
		<p>
		<table class="schedule_table" id='<?php echo "league_" . $league_id;?>'>
		<thead>
		<tr><th>&nbsp;</th>
		<?php
		
		//Determine the locations
		$locations_query = "select distinct location from games where league_id = " . $league_id;
		$locations_result = mysql_query($locations_query);
	
		//Determine the times
		$times_query = "select distinct time from games where league_id = " . $league_id;
		$times_result = mysql_query($times_query);
		
		//Print the table column headers
		$location_iter = 0;
		$num_locations = mysql_numrows($locations_result);
		
		while ($location_iter < $num_locations) {
			
			$time_iter = 0;
			$num_times = mysql_numrows($times_result);
			
			 while ($time_iter < $num_times) {				
				
			 	echo "<th>" . mysql_result($times_result, $time_iter, "time") . "<br/>" . mysql_result($locations_result, $location_iter, "location") . "</th>";
		
				$time_iter++;
			}
		
			$location_iter++;
		}
		
		echo "</tr></thead>";
		
		echo "<tbody>";
		//select distinct weeks per league
		$weeks_query = "select distinct week from games where league_id = " . $league_id;
		$weeks_result = mysql_query($weeks_query);
		
		//select distinct dates per league
		$dates_query = "select distinct date from games where league_id = " . $league_id;
		$dates_result = mysql_query($dates_query);
		
		//iterate over the number of weeks (we have to assume there is a 1-1 relationship between weeks and dates in any given league
		$week_iter = 0;
		$num_weeks = mysql_numrows($weeks_result);
		
		while ($week_iter < $num_weeks) {
		
			$week = mysql_result($weeks_result, $week_iter, "week");
			
			echo "<tr><td>Week " . $week  . "<br/>";
			echo mysql_result($dates_result, $week_iter, "date");
			echo "</td>";
		
			$location_iter = 0;
			while ($location_iter < $num_locations) {
			
				$time_iter = 0;
				$num_times = mysql_numrows($times_result);
				
				 while ($time_iter < $num_times) {
				
					$game_location = mysql_result($locations_result, $location_iter, "location");
					
					$game_query = "select home_team, away_team, score from games where league_id = " . $league_id . " and week = " . $week . " and location = \"" . $game_location . "\";"; 
					$game_result = mysql_query($game_query);
					
					$home_team = mysql_result($game_result, 0, "home_team");
					$away_team = mysql_result($game_result, 0, "away_team");
					$score = mysql_result($game_result, 0, "score");
					
					echo "<td>" . $home_team . " v " . $away_team . "<br/>" . $score . "</td>";
			
					$time_iter++;
				}
				
				$location_iter++;
			}
		
			echo "</tr>";
			$week_iter++;
		}
		
		echo "</tbody></table></p></div>";
		
		$league_iter++;
	}
?>