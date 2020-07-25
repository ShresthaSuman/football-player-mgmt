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
$query = "select s.sal_id,p.name,s.basic_sal,s.bonus,s.allowance,s.tax_rate FROM salary as s INNER JOIN player_detail as p on s.player_id=p.id";
if(isset($_GET["search"])) {
	$s=$_GET["search"];
	$query.= " where p.name like '%".$s."%' OR s.basic_sal like '%".$s."%' OR s.bonus like '%".$s."%' OR s.allowance like '%".$s."%' OR s.tax_rate like '%".$s."%'";	
}
?>

<?php
// Deleting salary detail
/*if(isset($_GET['action']) && $_GET['action'] == "delete"){
    $sal_id = $_GET['sal_id'];

    mysql_query("DELETE FROM salary WHERE sal_id=".$sal_id);

    header("Location: salary.php");
	}
*/
?>
<div id="pagename">Salary Detail</div>
<div id="search">
<form action="salary.php">
<input name="search" type="text" placeholder="Field Data"/>
<input type="submit" value="Search" />
</form>
</div>

<div id="table">
<table border="1" width="90%" cellspacing="0" cellpadding="0">
    <tr class="tbheader" >
        <th>Player</th>
        <th>Salary</th>
        <th>Bonus</th>
        <th>Allowance</th>
        <th>Tax Rate(%)</th>
        <th>Action</th>
    </tr>
<?php
        $result = mysqli_query($con,$query);

        	while($row = mysqli_fetch_array($result))
		{
    ?>
    <tr class="tr1">
        <td align="center"><?php echo $row["name"];?></td>
        <td align="center"><?php echo $row["basic_sal"];?></td>
        <td align="center"><?php echo $row["bonus"];?></td>
        <td align="center"><?php echo $row["allowance"];?></td>
        <td align="center"><?php echo $row["tax_rate"];?></td>
        <td align="center">
            <a href="<?php echo  'salary_edit.php?sal_id='.$row["sal_id"];?>">Edit</a> 
           <!---- <a href="<?php //echo 'salary.php?action=delete&sal_id='.$row["sal_id"];?>">Delete</a> -->
        </td>
    </tr>
    <?php }?>

</table>

<br />
<!--<a href="<?php //echo  'salary_add.php';?>"><h3>Add Salary Detail</h3></a>
--></div>

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


