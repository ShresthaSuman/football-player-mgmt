<?php

session_start();

	if ($_SESSION['username'] == "")
		header('Location: index.php');

include 'include/config.php';

if ($_SESSION['username'] == "admin")
include("include/header_admin.php");
else 
include("include/header.php");
?>

<div id="pagename">Player Game statistic</div>
<div>
    <h3><a href="player_detail.php">Back</a></h3>
</div>


<div id="table">
<table border="1" width="90%" cellspacing="0" cellpadding="0">
    <tr class="tbheader" >
        <th>Player Name</th>
        <th>Former Club</th>
        <th>Join Date</th>
        <th>Contract Period</th>
        <th>Total Game Played</th>
        <th>Total Goal Score</th>
		<th>Total yellow card</th>
		<th>Total red card</th>
		<th>Rating</th>
		
    </tr>

<?php
$query = "SELECT player_detail.name,player_game_info.id, player_game_info.former_club, player_game_info.join_date, player_game_info.contract_date, player_game_info.total_game_played,  player_game_info.total_goal_score,  player_game_info.yellow_card, player_game_info.red_card, player_game_info.rating
FROM player_detail
INNER JOIN player_game_info ON player_detail.id = player_game_info.player_id
 ";


         $result = mysqli_query($con,$query);

        	while($row = mysqli_fetch_array($result))
 		{

?>
    <tr class="tr1">
        <td align="center"><?php echo $row['name'];?></td>
        <td align="center"><?php echo $row['former_club'];?></td>
        <td align="center"><?php echo $row['join_date'];?></td>
        <td align="center"><?php echo $row['contract_date'];?></td>
        <td align="center"><?php echo $row['total_game_played'];?></td>
        <td align="center"><?php echo $row['total_goal_score'];?></td>
		<td align="center"><?php echo $row['yellow_card'];?></td>
		<td align="center"><?php echo $row['red_card'];?></td>
		<td align="center"><?php echo $row['rating'];?></td>
        <td> <a href="<?php echo  'player_game_info_edit.php?id='.$row["id"];?>">Edit</a></td>
    </tr>

     <?php }?>

</table>

<br />


<?php
include 'include/footer.php';
?>
<style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
    border-bottom: 1px solid #ddd;
  text-align:centre;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

tr:hover {background-color:rgb(151, 141, 163);


</style>