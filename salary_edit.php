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
        $sal_id = $_POST['sal_id'];
        $basic_sal = $_POST['basic_sal'];
        $bonus = $_POST['bonus'];
        $allowance = $_POST['allowance'];
        $tax_rate = $_POST['tax_rate'];

        $query = "UPDATE salary SET basic_sal='".$basic_sal."', bonus='".$bonus."', allowance='".$allowance."', tax_rate='".$tax_rate."' WHERE sal_id=".$sal_id;
        $result = mysqli_query($con,$query);
		if ($result>0){
			

        header("Location: salary.php?message=update successful");
		 }else{
			 header("Location: salary.php?message=not successful");
		 }}

// Retrieving user data
if(isset($_GET['sal_id'])){
    $sal_id = $_GET['sal_id'];
}
    $query = "SELECT p.id,s.basic_sal,s.bonus,s.allowance,s.tax_rate FROM salary as s INNER JOIN player_detail as p on s.player_id=p.id where s.sal_id=".$sal_id;

    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_object($result);

?>
   <div id="pagename"> Edit Salary Detail</div>

<br /><br />
<form action="<?php echo 'salary_edit.php';?>" method="post">
    <input type="hidden" name="sal_id" value="<?php echo $sal_id;?>" />
  
    <table class="formshade" border="0" width="50%" cellspacing="0" cellpadding="5">
      <?php
$query = "SELECT * FROM salary WHERE sal_id=".$sal_id;
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_object($result);
                            ?>

        

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td>Salary</td>
            <td><input type="text" name="basic_sal" value="<?php echo $row->basic_sal;?>" required /></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td>Bonus</td>
            <td><input type="text" name="bonus" value="<?php echo $row->bonus;?>" /></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td>Allowance</td>
            <td><input type="text" name="allowance" value="<?php echo $row->allowance;?>" /></td>
        </tr>

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
            <td>Tax Rate(%)</td>
            <td><input type="text" name="tax_rate" value="<?php echo $row->tax_rate;?>" required/></td>
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


