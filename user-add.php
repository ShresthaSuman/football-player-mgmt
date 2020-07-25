<?php

session_start();

	if ($_SESSION['username'] == "")
		header('Location: index.php');

include 'include/config.php';


?>
<?php

//Adding new user
if(isset($_POST['register']) && $_POST['register'] == "Add User"){
    
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        /*if (empty($username)){
		echo "Username you have tried is empty.";
		}
		elseif($username == " "){
			echo "Space can not be used as username.";
		
		}else{
*/		
        $query = "INSERT INTO users (username, email, password) VALUES('".$username."','".$email."','".$password."')";
        $result = mysqli_query($con,$query);
		
			
		header("location: user_list.php");
	/*}*/
        }
    


?>
<?php
if ($_SESSION['username'] == "admin")
include("include/header_admin.php");
else 
include("include/header.php");

?>
<div id="pagename">Add User</div>


<br /><br />

<form action="<?php echo 'user-add.php';?>" method="post">
    <table class="formshade" border="0" width="50%" cellspacing="0" cellpadding="5">
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" value="" ></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="" required/></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td>Password</td>
            <td><input type="text" name="password" value="" required/></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td colspan="2"><input type="submit" name="register" value="Add User" /></td>
        </tr>

    </table>
</form>

<?php
include 'include/footer.php'
?>
