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
/*$query = "SELECT player_detail.name,attribute.att_id, attribute.player_no, attribute.position, attribute.footed, attribute.ranking, attribute.division
FROM player_detail
INNER JOIN attribute ON attribute.player_id = player_detail.id
";*/



?>

<?php
// Deleting salary detail
/*if(isset($_GET['action']) && $_GET['action'] == "delete"){
    $att_id = $_GET['att_id'];

    mysql_query("DELETE FROM attribute WHERE att_id=".$att_id);

    header("Location: attribute.php");
	}
*/?>
<div id="pagename">Player Attribute</div>
<div id="search">
<form action="attribute.php">
<input name="search" type="text" placeholder="Field Data"/>
<input type="submit" value="Search" />
</form>
</div>

<div id="table">
<table border="1" width="90%" cellspacing="0" cellpadding="0">
    <tr class="tbheader" >
        <th>Player</th>
        <th>Player No.</th>
        <th>Player Position</th>
        <th>Footed</th>
        <th>Ranking</th>
        <th>Division</th>
    </tr>

<?php
$query = "SELECT player_detail.name,attribute.att_id, attribute.player_no, attribute.position, attribute.footed, attribute.ranking, attribute.division
FROM player_detail
INNER JOIN attribute ON player_detail.id = attribute.player_id
 ";

if(isset($_GET["search"])) {
	$s=$_GET["search"];
	$query.= " where player_detail.name like '%".$s."%' OR attribute.player_no like '%".$s."%' OR attribute.position like '%".$s."%' OR attribute.footed like '%".$s."%' OR attribute.ranking like '%".$s."%' OR attribute.division like '%".$s."%'";	
}
        $result = mysqli_query($con,$query);

        	while($row = mysqli_fetch_array($result))
		{

 ?>
    <tr class="tr1">
        <td align="center"><?php echo $row['name'];?></td>
        <td align="center"><?php echo $row['player_no'];?></td>
        <td align="center"><?php echo $row['position'];?></td>
        <td align="center"><?php echo $row['footed'];?></td>
        <td align="center"><?php echo $row['ranking'];?></td>
        <td align="center"><?php echo $row['division'];?></td>
        
    </tr>
     <?php }?>

</table>

<br />

 <a href='edit_attribute.php'>Edit player attribute</a> </div>

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



