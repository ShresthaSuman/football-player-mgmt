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

</style>
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

<?php
	if(isset($_GET["id"])){
		$player_id=$_GET["id"];
		$query = "SELECT *FROM player_detail
				INNER JOIN player_game_info ON player_detail.id = player_game_info.player_id 
				INNER JOIN attribute ON player_detail.id = attribute.player_id
				INNER JOIN salary ON player_detail.id = salary.player_id
		 WHERE player_detail.id=".$player_id;
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
}



?>

<div class="design">
<div>
		<h2><a href="game_statistics.php?id=<?php echo $row['player_id']; ?>" >View game statistics</a></h2>
</div>
	<center><img src="player_pic/<?php echo $row["image"]; ?>" height="200px" width="200px"   alt="" ></center>
	

	<div class="content">
	<center><H1>Basic Info
	</H1></center>
		<table>
			<tr>
				<td style='width:50px'>Name:</td>
				<td><?php echo $row["name"];?></td>
				<td>Address:</td>
				<td><?php echo $row["address"];?></td>
			</tr>
			<tr> 
				<td>Date of birth:</td>
				<td><?php echo $row["DOB"];?></td>
				<td>Email:</td>
				<td><?php echo $row["email"];?></td>
			</tr>

			<tr>
				<td>Phone Number:</td>
				<td><?php echo $row["phone_no"];?></td>
				
			</tr>
			<tr>
				<td colspan="4" style="text-align:center; font-size:20px">Game Info</td>
			</tr>
			
			<tr>
				<td style='width:50px'>Position:</td>
				<td><?php echo $row["position"];?></td>
				<td>Jersey Number:</td>
				<td><?php echo $row["player_no"];?></td>
			</tr>
			<tr>
				<td style='width:50px'>Footed:</td>
				<td><?php echo $row["footed"];?></td>
				<td>Ranking:</td>
				<td><?php echo $row["ranking"];?></td>
			</tr>
			<tr>
				<td style='width:50px'>Division:</td>
				<td><?php echo $row["division"];?></td>
				<td>Former Club name:</td>
				<td><?php echo $row["former_club"];?></td>
			</tr>
			<tr>
				<td style='width:50px'>Join club date:</td>
				<td><?php echo $row["join_date"];?></td>
				<td>Contract end date:</td>
				<td><?php echo $row["contract_date"];?></td>
			</tr>
			<tr>
				<td colspan="4" style="text-align:center; font-size:20px"><a href="game_statistics.php?id=<?php echo $row['player_id']; ?>">View game statistics</a></td>
			</tr>



		</table>


	</div>

</div>


<?php include("include/footer.php");?>
