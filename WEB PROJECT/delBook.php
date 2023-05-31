<?php
include('connect.php');
$id = $_REQUEST['id'];
$name = $_GET['name'];
$sql = "delete from student where id='$id'";
$result = $connect->query($sql);
if ($result) {
    header('location:index.php');
}
?>