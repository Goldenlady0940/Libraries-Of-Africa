<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD</title>
</head>
<body bgcolor="mintcream">
<?php
require"connect.php";
if (isset($_POST['add'])){
   $bookId=$_POST['bookId'];
   $bookName=$_POST['bookname'];
   $authorName=$_POST['authorName'];
   $quantity=$_POST['quantity'];
   $status=$_POST['status'];
   $price=$_POST['price'];
   $sql="INSERT INTO `bookManage`(`bookIdfk`, `bookname`, `authorName`, `quantity`,
    `status`, `price`) VALUES ('$bookId','$bookName','$authorName','$quantity','$status',
    '$price')";
     $result=mysqli_query($con,$sql);
     header("Location:adminpage.php");
    }
   
    // if($result){
    //     header("Location:adminpage.php");
    // }
    // else{
    //     echo "failed " . mysqli_error($con);
    // }


?>


<form action="" method="POST" >
    <table align="center" width="600px" height="500px">
            <div class="addTable">
                <tr >
                    <td align="center"><label for="bookId">Book Id</label></td>
                    <td><input type="text" name="bookId" id="bookId"></td>
                </tr>
                <tr>
                    <td align="center"><label for="bookname">Book Name</label></td>
                    <td><input type="text"  name="bookname" id="bn"></td>
                </tr>
                <tr>
                    <td align="center"><label for="authorName">Author's Name</label></td>
                    <td><input type="text"  name="authorName" id="an"></td>
                </tr>
                <tr>
                    <td align="center"><label for="quantity">Quantity</label></td>
                    <td><input type="text"  name="quantity" id="qn"></td>
                </tr>
                <tr>
                    <td align="center"><label for="status">Status</label></td>
                    <td><input type="text" name="status" id="st"></td>
                </tr>
                <tr>
                    <td align="center"><label for="price">Price</label></td>
                    <td><input type="text" name="price" id="pr"></td>
                </tr>
                <tr>
                    
              <td><input type="submit" name="add" value="Add" class="add" ></td>
                </tr>
                </div>
        </table>
    </form>
   
    </body>
</html>