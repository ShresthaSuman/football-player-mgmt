
<?php

session_start();

	if ($_SESSION['username'] == "")
		header('Location: index.php');

include 'include/config.php';
?>

<?php

//Updating user
if(isset($_POST['update']) && $_POST['update'] == "Submit"){

       	$admin_id = $_POST['admin_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "UPDATE admin SET  email='".$email."', password='".$password."' WHERE admin_id=".$admin_id;
        $result = mysqli_query($con,$query);

        header("Location: first.php");
        }
    
// Retrieving user data
if(isset($_GET['id'])){
    $admin_id = $_GET['id'];
}



if ($_SESSION['username'] == "admin")
include("include/header_admin.php");
else 
include("include/header.php");

$query = "SELECT * FROM admin WHERE admin_id=".$admin_id;
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
?>

<div id="pagename">Change Password and Email</div>

<br /><br />
<form action="change_pswd.php" method="post">
    <input type="hidden" name="admin_id" value="<?php echo $admin_id;?>" />

    <table class="formshade" border="0" width="50%" cellspacing="0" cellpadding="5">
        <tr>
            <td>Username</td>
            <td><?php echo $row['username'];?></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $row['email'];?>" required/></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td>Password</td>
            <td><input type="text" name="password" value="<?php echo $row['password'];?>" required/></td>
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
