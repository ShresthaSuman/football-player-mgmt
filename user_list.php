
<?php

session_start();

	if ($_SESSION['username'] == "")
		header('Location: index.php');

include 'include/config.php';

?>
<?php
// Deleting user
if(isset($_GET['action']) && $_GET['action'] == "delete"){
    $admin_id = $_GET['id'];

    mysqli_query($con, "DELETE FROM users WHERE admin_id=".$admin_id);

    header('Location: user_list.php');
    }
     

?>
<?php
if ($_SESSION['username'] == "admin")
include("include/header_admin.php");
else 
include("include/header.php");
?>
<?php
$query = "select * from users where 1=1";
if(isset($_GET["search"])) {
	$s=$_GET["search"];
	$query.= " AND username like '%".$s."%' OR email like '%".$s."%'";	
}
?>

<div id="pagename">User Section</div>
<div id="search">
<form action="user_list.php">
<input name="search" type="text" placeholder="Username/Email"/>
<input type="submit" value="Search" />
</form>
</div>

<div id="table">

<table border="1" width="90%" cellspacing="0" cellpadding="0">
    <tr class="tbheader" >
        <th>Username</th>
        <th>Email</th>
        <th>Action</th>
    </tr>

    <?php
        $result = mysqli_query($con,$query);

		while($row = mysqli_fetch_array($result))
		{
    ?>

    <tr class="tr1">
        <td align="center"><?php echo $row["username"];?></td>
        <td align="center"><?php echo $row["email"];?></td>
        <td align="center">
            <a href="<?php echo  'user-edit.php?id='.$row["admin_id"];?>">Edit</a> |
            <a href="<?php echo 'user_list.php?action=delete&id='.$row["admin_id"];?>">Delete</a>
        </td>
    </tr>

    <?php }?>

</table>

<br />
<a href="<?php echo  'user-add.php';?>"><h3>New user</h3></a>



</div>
<?php
include 'include/footer.php'
?>