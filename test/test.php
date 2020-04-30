<?php
include('db.php');
$id=$_REQUEST['id'];
$sql="select * from test where id='".$id."'";
$results=mysqli_query($conn,$sql);
$row=mysqli_num_rows($results);
if ($row > 0) {

$i=0;
while($rows = mysqli_fetch_assoc($results)) {
	$data[]=$rows;
}
$msg="Success";
}else
{
	$msg="Data Not Found";
	$data='';
}
echo json_encode(['msg'=>$msg,'data'=>$data]);
?>