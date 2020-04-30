<?php
include('db.php');
//print_r($_REQUEST);exit;
if(isset($_REQUEST['submit'])){
	//echo $_REQUEST['Id'];exit;
	if(!empty($_REQUEST['Id'])){
	  $sql='UPDATE `test` SET `First_Name`="'.$_REQUEST['First_Name'].'",`Last_Name`="'.$_REQUEST['Last_Name'].'",`Reg_No`="'.$_REQUEST['Reg_No'].'",`Date`="'.$_REQUEST['Date'].'" WHERE `Id`="'.$_REQUEST['Id'].'"';
	   $msg="Updated Successfully";
	}else{
		
		$sql="INSERT INTO `test`(`First_Name`, `Last_Name`, `Reg_No`, `Date`) VALUES ('".$_REQUEST['First_Name']."','".$_REQUEST['Last_Name']."','".$_REQUEST['Reg_No']."','".$_REQUEST['Date']."') ";
		
	$msg="Inserted Successfully";
	}
	$results=mysqli_query($conn,$sql);
	//$row=mysql_affected_rows($conn);
	if($results==TRUE){
		//echo $msg;
		header('Location:form.php');
	}else{
		echo "No Row Affected";
	}

}

?>