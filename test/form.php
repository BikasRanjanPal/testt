<?php
include_once 'db.php';
$result = mysqli_query($conn,"SELECT * FROM test");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
<div class="container">
	<form class="form-horizontal">
	<input type="text" name="Id" class="form-control" id="search_button" placeholder="Search The Id.."><br><br>
    <button type="button" name="search"  class="btn btn-primary search" >Search</button><br><br>
	</form>
</div>
</div>

<div class="container">
  <form class="form-horizontal" method="post" action="insert.php">
    <input type="hidden" name="Id" class="form-control" id="Id" placeholder="Enter The Id.."/><br><br>
	<input type="text" name="First_Name" class="form-control" id="First_Name" placeholder="Enter First Name.." readonly /><br><br>
	<input type="text" name="Last_Name" class="form-control" id="Last_Name" placeholder="Enter Last Name.." readonly /><br><br>
	<input type="text" name="Reg_No" class="form-control" id="Reg_No" placeholder="Enter Reg no.." readonly /><br><br>
	<input type="date" name="Date" class="form-control" id="Date" readonly /><br><br>
     <! ––<button type="submit" name="submit" class="btn btn-primary"></button><br><br>
  </form>
</div>
<div class="container">
<table class="table">
  
  <tr>
	<td>Id</td>	
    <td>First Name</td>
    <td>Last Name</td>
    <td>Reg No</td>
    <td>Date</td>
  </tr>
<?php
if (mysqli_num_rows($result) > 0) {
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["Id"]; ?></td>
	<td><?php echo $row["First_Name"]; ?></td>
    <td><?php echo $row["Last_Name"]; ?></td>
    <td><?php echo $row["Reg_No"]; ?></td>
    <td><?php echo $row["Date"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
</div>
 <?php
}
else{
    echo "No result found";
}
?>
</body>
<script>
$(document).ready(function(){
  $(".search").click(function(){
   //alert($('#search_button').val());
    $.post("test.php",
    {
      id: $('#search_button').val()
    },
    function(result){
      //alert("Data: " + data + "\nStatus: " + status);
	  //console.log(result);
	  var data=JSON.parse(result);
	  if(data.msg=='Data Not Found'){
		 alert('Data Not Found'); 
	  }else{
		$('#Id').val(data.data[0].Id);
	  $('#First_Name').val(data.data[0].First_Name);
	  $('#Last_Name').val(data.data[0].Last_Name);
	  $('#Reg_No').val(data.data[0].Reg_No);
	  $('#Date').val(data.data[0].Date);
	  console.log(data.msg);
	  }
	 
	  //console.log(data.data[0].Id);
    }); 
  });
});
</script>
</html>