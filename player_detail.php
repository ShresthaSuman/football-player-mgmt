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
$query = "select * from player_detail";
if(isset($_GET["search"])) {
	$s=$_GET["search"];
	$query.= " where name like '%".$s."%' OR email like '%".$s."%' OR phone_no like '%".$s."%' OR address like '%".$s."%'";	
}
?>

<?php
// Deleting Player
if(isset($_GET['action']) && $_GET['action'] == "delete"){
    $id = $_GET['id'];

    mysqli_query($con,"DELETE FROM player_detail WHERE id=".$id);

    header("Location: player_detail.php");
	}

?>
<div id="pagename">Player Detail</div>
<div><h2><a href="player_game_info.php">Add other information</a></h2> </div>
<div id="search">
<form action="player_detail.php">
<input name="search" type="text" placeholder="Field Data"/>
<input type="submit" value="Search" />
</form>
</div>

<div id="table">
<table border="1" width="100%" cellspacing="0" cellpadding="0">
    <tr class="tbheader" >
        <th>Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Phone No:</th>
        <th>Action</th>
    </tr>
<?php
	   $result = mysqli_query($con,$query);

		while($row = mysqli_fetch_array($result))
		{
    ?>
<tr class="tr1">
        <td align="center"><?php echo $row["name"];?></td>
        <td align="center"><?php echo $row["address"];?></td>
        <td align="center"><?php echo $row["email"];?></td>
        <td align="center"><?php echo $row["phone_no"];?></td>
        <td align="center">
            <a href="<?php echo  'player_info.php?id='.$row["id"];?>">View Profile</a>|
            <a href="<?php echo  'player_detail_edit.php?id='.$row["id"];?>">Edit</a> |
            <a href="<?php echo 'player_detail.php?action=delete&id='.$row["id"];?>">Delete</a>
        </td>
    </tr>
<?php }?>

</table>

<br />
<a href="<?php echo  'player_detail_add.php';?>"><h3>New Player</h3></a>
</div>



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