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
//Adding new player
ob_start();
if(isset($_POST['register']) && $_POST['register'] == "Add Player"){
	date_default_timezone_set('UTC');
		$name = $_POST['name'];
		$address = $_POST['address'];
        $email = $_POST['email'];
        $birthday=$_POST['birthday'];
      
        $phone_no = $_POST['phone_no'];

        $file = $_FILES['file'];
        print_r($file);
        $fileName=$_FILES['file']['name'];
        $fileTmpName=$_FILES['file']['tmp_name'];
        $fileSize=$_FILES['file']['size'];
        $fileError=$_FILES['file']['error'];
        $fileType=$_FILES['file']['type'];
        $fileExt = explode('.',$fileName);
        print_r($fileExt);
        $fileActualExt = strtolower(end($fileExt));
        // print_r($fileActualExt);
        $allowed = array('jpg','jpeg','png','pdf');
        // print_r($allowed);
    
    
            
        // checking empty fields
        if(empty($name) || empty($address) || empty($email)|| empty($birthday)||empty($phone_no)) {
                    
            if(empty($name)) {
                echo "<font color='red'>Name field is empty.</font><br/>";
            }
            
            if(empty($address)) {
                echo "<font color='red'>address field is empty.</font><br/>";
            }
            
            if(empty($email)) {
                echo "<font color='red'>email field is empty.</font><br/>";
            }
            if(empty($birthday)) {
                echo "<font color='red'>birthday field is empty.</font><br/>";
            }
            if(empty($phone_no)) {
                echo "<font color='red'>phone number field is empty.</font><br/>";
            }
            
            //link to the previous page
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        } else { 
            // if all the fields are filled (not empty) 
            if(in_array($fileActualExt,$allowed)){
                if($fileError === 0){
                    if($fileSize < 1000000){
                        $fileNameNew = uniqid('',true).".".$fileActualExt;
                        $fileDestination = 'player_pic/'.$fileName;
                        move_uploaded_file($fileTmpName,$fileDestination);
    

	
	$query = "insert into player_detail (name, address,DOB, email, phone_no,image) ".
				"values('".$name."', '".$address."','".$birthday."', '".$email."', '".$phone_no."','".$fileName."'); ";
	$result = mysqli_query($con,$query);
	if ($result>0){
		header("location: player_detail.php?message=successfully added");
	}else{
		header("location: player_detail.php?message=adding faliure");
	}
	
	$query = "set @last_id = last_insert_id(); ";
	$result = mysqli_query($con,$query);
	
	$query = "insert into attribute (player_id) values (@last_id); ";
	$result = mysqli_query($con,$query);
	
	$query = "insert into salary (player_id) values(@last_id);";
    $result = mysqli_query($con,$query);
    
    $query = "insert into player_game_info (player_id) values(@last_id);";
	$result = mysqli_query($con,$query);
            
        }else {
            echo"your file is too big";
        }
        }else {
        echo "There was error uploading file";
        }
        }
        else {
            echo "you cannot upload the files of this type";
        }
        }
        ob_end_flush();

	
	}
?>

<div id="pagename">Add Player</div>
<br /><br />

<form action="<?php echo 'player_detail_add.php';?>" method="post" enctype="multipart/form-data">
    <table class="formshade" border="0" width="50%" cellspacing="0" cellpadding="5">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="" required/></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td>Address</td>
            <td><input type="text" name="address" value="" required/></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Date of Birth</td>
          <td>  <input type="date" name="birthday"></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>
       
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required/></td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td>Phone No.</td>
            <td><input type="text" name="phone_no" value="" required/></td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
            <td>Upload Image</td>
            <td><input type="file" name="file" required/></td>
        </tr>

    
        <tr>
            <td colspan="2"><input type="submit" name="register" value="Add Player" /></td>
        </tr>

    </table>
</form>

<?php
include 'include/footer.php'
?>



