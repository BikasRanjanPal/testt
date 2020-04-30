<?php
$url='localhost';
$username='root';
$password='';
$database='mysql';
$conn=mysqli_connect($url,$username,$password,"mysql");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
?>