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
//Updating player
if(isset($_POST['update']) && $_POST['update'] == "save"){
    $game_id=$_POST["id"];
    $former_club_name=$_POST["club_name"];
    $join_date=$_POST["join_date"];
    $contract_upto=$_POST["contract_upto"];
    $total_game=$_POST["total_game"];
    $total_goal=$_POST["total_goal"];
    $yellow_card=$_POST["yellow_card"];
    $red_card=$_POST["red_card"];
    $rating=$_POST["rating"];

    $query = "UPDATE player_game_info SET former_club='".$former_club_name."', join_date='".$join_date."',
     contract_date='".$contract_upto."', total_game_played='".$total_game."', total_goal_score='".$total_goal."',
     yellow_card='".$yellow_card."', red_card='".$red_card."', rating='".$rating."'
     WHERE id=".$game_id;

    $result = mysqli_query($con,$query);
    if ($result>0){
        
         header("location: player_game_info.php?message=successfully added");

    }else{
         header("location: player_game_info.php?message=adding faliure");
    }

}

      

// Retrieving user data
// if(isset($_GET['id'])){
//     $id = $_GET['id'];
// }
//    $query = "SELECT p.id,pgi.former_club,pgi.join_date,pgi.contract_upto,pgi.total_game_played,
//             pgi.total_score,pgi.yellow_card, pgi.red_card,pgi.rating FROM player_game_info as pgi INNER JOIN player_detail as p on pgi.player_id=p.id where pgi.id=".$id;
 
//     $result = mysqli_query($con,$query);
//     $row = mysqli_fetch_object($result);

?>
<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query="Select * from player_game_info WHERE id=".$id;
        $result=mysqli_query($con,$query);
        $row=mysqli_fetch_object($result);
    }
?>

  <div id="pagename">Player Game Information</div>
<br /><br />

<form action="<?php echo 'player_game_info_edit.php';?>" method="post" >
        <input type="hidden" name="id" value="<?php echo $row->id;?>" />
    <table class="formshade" border="0" width="70%" cellspacing="0" cellpadding="5">
   
        <tr>
            <td>Former Club Name</td>
            <td><input type="text" name="club_name" value="<?php echo $row->former_club;?>" required/></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>
   
        <tr>
            <td>Join Date</td>
          <td>  <input type="date" name="join_date" value="<?php echo $row->join_date;?>" required></td>
        </tr>
       

        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Contract Upto</td>
          <td>  <input type="date" name="contract_upto"  value="<?php echo $row->contract_date;?>" required></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Total game played from team</td>
            <td><input type="number" name="total_game" min="0" value="<?php echo $row->total_game_played;?>" required/></td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Total goal score for the team</td>
            <td><input type="number" name="total_goal"  min="0" value="<?php echo $row->total_goal_score;?>" required/></td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Yellow Card</td>
            <td><input type="number" name="yellow_card" value="<?php echo $row->yellow_card;?>" min="0" required/></td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Red card</td>
            <td><input type="number" name="red_card" value="<?php echo $row->red_card;?>" min="0" required/></td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Rating</td>
            <td><input type="number" name="rating" value="<?php echo $row->rating;?>" min="0" max="5" placeholder="1 to 5" required/></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>
    
        <tr>
            <td colspan="2"><input type="submit" name="update" value="save" /></td>
        </tr>

    </table>
</form>
 <?php
include 'include/footer.php'
?>


