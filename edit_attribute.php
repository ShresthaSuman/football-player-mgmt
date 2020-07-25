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
if(isset($_POST['update']) && $_POST['update'] == "Submit"){
        $att_id = $_POST['att_id'];
        $player_id = $_POST['player_id'];
        $player_no = $_POST['player_no'];
        $position = $_POST['position'];
        $footed = $_POST['footed'];
        $ranking = $_POST['ranking'];
        $division = $_POST['division'];

        $query = "UPDATE attribute SET player_no='".$player_no."', position='".$position."', footed='".$footed."', ranking='".$ranking."', division='".$division."' WHERE player_id=".$player_id;
        $result = mysqli_query($con,$query);

        header("Location: attribute.php");
		 }
// Retrieving attribute data
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
    $query = "SELECT p.id,a.player_no,a.position,a.footed,a.ranking,a.division FROM attribute as a INNER JOIN player_detail as p on a.player_id = p.id";

    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);

?>

<div id="pagename">Edit Player Attribute</div>

<br /><br />
<form action="<?php echo 'edit_attribute.php';?>" method="post">
    <input type="hidden" name="att_id" value="<?php echo $att_id;?>" />

    <table class="formshade" border="0" width="50%" cellspacing="0" cellpadding="5">
        <tr>
            <td>Name</td>
            <td><select name="player_id" id="player_id" required>
                            <option value="" >Select...</option>
                            <?php

                                $result = mysqli_query($con,"select id, name from player_detail order by name");

                                while($rows = mysqli_fetch_array($result)) {
                            ?>
                                <option value="<?= $rows['id']?>" <?php if($rows['id'] == $row['id']) echo "selected"?> >
									<?= $rows['name']?>
                                </option>
                            <?php
                                }
                            ?>
               </select></td>
          </tr>

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td>Player No.</td>
            <td><input type="text" name="player_no" value="<?php echo $row['player_no'];?>" required /></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td>Position</td>
            <td><select name="position" id="position" required>
                    <option value="" >Select...</option>
                        <option value="striker" <?php if($row['position'] == "striker") echo "selected"?>>striker</option>
                        <option value="left winger" <?php if($row['position'] == "left winger") echo "selected"?>>left winger</option>
                        <option value="right winger" <?php if($row['position'] == "right winger") echo "selected"?>>right winger</option>
                        <option value="left midfielder" <?php if($row['position'] == "left midfielder") echo "selected"?>>left midfielder</option>
                        <option value="center midfielder" <?php if($row['position'] == "center midfielder") echo "selected"?>>center midfielder</option>
                        <option value="right midfielder" <?php if($row['position'] == "right midfielder") echo "selected"?>>right midfielder</option>
                        <option value="center defender" <?php if($row['position'] == "center defender") echo "selected"?>>center defender</option>
                        <option value="left defender" <?php if($row['position'] == "left defender") echo "selected"?>>left defender</option>
                        <option value="right defender" <?php if($row['position'] == "right defender") echo "selected"?>>right defender</option>
                        <option value="goalkeeper" <?php if($row['position'] == "goalkeeper") echo "selected"?>>goalkeeper</option>
                </select></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td>Footed</td>
            <td><input type="radio" name="footed" value="right" checked/>right&nbsp;<input type="radio" name="footed" value="left" <?php if($row['footed'] == "left") echo "checked"?>/>left</td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td>Ranking</td>
            <td><input type="text" name="ranking" value="<?php echo $row['ranking'];?>" required/></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td>Division</td>
            <td><input type="radio" name="division" value="A" checked/>A&nbsp;
            <input type="radio" name="division" value="B" <?php if($row['division'] == "B") echo "checked"?>/>B&nbsp;<input type="radio" name="division" value="C" <?php if($row['division'] == "C") echo "checked"?>/>C</td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>

         <tr>
            <td colspan="2"><input type="submit" name="update" value="Submit" /></td>
        </tr>

    </table>
</form>
 <?php
include 'include/footer.php'
?>







