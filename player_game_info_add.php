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
    if(isset($_POST["submit"]) && $_POST["register"]=="Add Record" ){
        $former_club_name=$_POST["club_name"];
        $join_date=$_POST["join_date"];
        $contract_upto=$_POST["contract_upto"];
        $total_game=$_POST["total_game"];
        $total_goal=$_POST["total_goal"];
        $yellow_card=$_POST["yellow_card"];
        $red_card=$_POST["red_card"];
        $rating=$_POST["rating"];

        $query = "insert into player_game_info (former_club, join_date,contract_date, total_game_played, total_goal_score,yellow_card,red_card,rating) ".
        "values('".$former_club_name."', '".$join_date."','".$contract_upto."', '".$total_game."', '".$total_goal."','".$yellow_card."','".$red_card."','".$rating."'); ";
        $result = mysqli_query($con,$query);
        if ($result>0){
            
             header("location: player_game_info.php?message=successfully added");

        }else{
             header("location: player_game_info.php?message=adding faliure");
        }

    }



?>

<div id="pagename">Player Game Information</div>
<br /><br />

<form action="<?php echo 'player_game_info_add.php';?>" method="post" >
    <table class="formshade" border="0" width="50%" cellspacing="0" cellpadding="5">
        <tr>
            <td>Former Club Name</td>
            <td><input type="text" name="club_name" value="" required/></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Join Date</td>
          <td>  <input type="date" name="join_date" required></td>
        </tr>
       

        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Contract Upto</td>
          <td>  <input type="date" name="contract_upto" required></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Total game played from team</td>
            <td><input type="number" name="total_game" value="" min="0" required/></td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Total goal score for the team</td>
            <td><input type="number" name="total_goal" value="" min="0" required/></td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Yellow Card</td>
            <td><input type="number" name="yellow_card" value="" min="0" required/></td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Red card</td>
            <td><input type="number" name="red_card" value="" min="0" required/></td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Rating</td>
            <td><input type="number" name="rating" value="" min="0" max="5" required/></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>
    
        <tr>
            <td colspan="2"><input type="submit" name="register" value="Add Record" /></td>
        </tr>

    </table>
</form>

<?php
include 'include/footer.php'
?>