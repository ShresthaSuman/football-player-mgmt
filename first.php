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


<div style="font-size:20px;">Our Players</div>
<div id="table">
<table border="1" width="90%" cellspacing="0" cellpadding="0">
    <tr class="tbheader" >
        <th>ID</th>
        <th>Name</th>
</tr>
<?php

        $query = "SELECT * FROM player_detail";
        $result = mysqli_query($con,$query);
        $i=1;
		while($row = mysqli_fetch_array($result))
		{
    ?>
<tr class="tr1">
            <td><?php echo $i++; ?></td>
        <td align="center"><a href="<?php  echo 'player_info.php?id='.$row["id"]; ?>"><?php echo $row["name"];?></a></td>
    </tr>
<?php }?>

</table>
</div>
<?php include("include/footer.php");?>            

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