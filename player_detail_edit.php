
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
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone_no = $_POST['phone'];
        $birthday =$_POST["birthday"];
		
		
        $query = "UPDATE player_detail SET name='".$name."', address='".$address."', DOB='".$birthday."',email='".$email."', phone_no=".$phone_no." WHERE id=".$id;
		
		$result = mysqli_query($con,$query);
		echo $phone_no;
        header("Location: player_detail.php");
		 }

// Retrieving user data
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM player_detail WHERE id=".$id;
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_object($result);
}
    

?>

<div id="pagename">Edit Player Detail</div>

<br /><br />
<form action="<?php echo 'player_detail_edit.php';?>" method="post">
    <input type="hidden" name="id" value="<?php echo $id;?>" />

    <table class="formshade" border="0" width="50%" cellspacing="0" cellpadding="5">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo $row->name;?>" required/></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td>Address</td>
            <td><input type="text" name="address" value="<?php echo $row->address;?>" required/></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Date of Birth</td>
          <td>  <input type="date" name="birthday" value="<?php echo $row->DOB;?>" required></td>
        </tr>

      
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $row->email;?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required/></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td>Phone No.</td>
            <td><input type="tel" name="phone" value="<?php echo $row->phone_no;?>" required/></td>
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


