<?php 
require"connect.php";
           
           
$bookId=$_GET['bookIdfk'];
$sql="DELETE FROM `bookManage` WHERE bookIdfk=$bookId";
$result=mysqli_query($con,$sql);
header('Location:adminpage.php');
?>