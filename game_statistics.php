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

        $dataPoints=array(
                array("label"=>"Total game played","y"=>$row["total_game_played"]),
                array("label"=>"Total goal score","y"=>$row["total_goal_score"]),
                array("label"=>"Total Yellow card","y"=>$row["yellow_card"]),
                array("label"=>"Total Red card","y"=>$row["red_card"])
        );

      
        $link = null;

    
?>
    
    
    <div id="chartContainer" style="height: 400px; width: 600px"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <div><button><a href="<?php echo  'player_info.php?id='.$row["player_id"];?>" >Back</a></button></div>


<script>
        window.onload = function() {
        
        
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "<?php echo $row["name"]; ?>"
            },
            subtitles: [{
                text: "Game Data"
            }],
            data: [{
                type: "pie",
                yValueFormatString: "#,##0",
                indexLabel: "{label} ({y})",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
        
        }
</script>

<?php include("include/footer.php");?>