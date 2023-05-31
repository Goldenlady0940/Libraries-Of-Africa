<?php 
require"connect.php";
           
           
$bookId=$_GET['BOOK_FKID'];
$sql="DELETE FROM `request` WHERE BOOK_FKID=$bookId";
// $result=mysqli_query($con,$sql);
// sql2="INSERT INTO bookManage VALUES ($_POST['bookname'],
// authorName='" .$_POST['authorName'] ."',quantity='" .$_POST['quantity'] ."',
// status='" .$_POST['status'] ."', price='" .$_POST['price'] ."' WHERE bookIdfk= '$bookId' );";
// $result2=mysqli_query($con,$sql2);
if($result && $result2){
header('Location:adminpage.php');
}
else{
    header('Location:homePage.php');
}
?>