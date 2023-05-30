<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body bgcolor="mintcream">

<?php
    session_start();
    require"connect.php";
           
           
            $bookId=$_GET['bookIdfk'];
            if(isset($_POST['update'])){
               
                mysqli_query($con,"UPDATE bookManage SET bookname='" .$_POST['bookname'] ."',
                authorName='" .$_POST['authorName'] ."',quantity='" .$_POST['quantity'] ."',
                status='" .$_POST['status'] ."', price='" .$_POST['price'] ."' WHERE bookIdfk= '$bookId' ");
                header('Location:adminpage.php');
            }
           
    $sql = "SELECT * FROM bookManage WHERE bookIdfk= '$bookId'";
  
    $result = mysqli_query($con, $sql);
    if (!$result ) {
      printf("Error: %s\n", mysqli_error($conn));
      exit();
  } 
  else{
        while ($row = mysqli_fetch_assoc($result)) {?>

    <form action="" method="POST" >
    <table align="center" width="600px" height="500px">
            <div class="editTable">
                <tr >
                    <td align="center"><label for="bookId">Book Id</label></td>
                    <td><input type="text" name="bookId" id="bookId" value="<?php echo $bookId ?>"></td>
                </tr>
                <tr>
                    <td align="center"><label for="bookname">Book Name</label></td>
                    <td><input type="text"  name="bookname" id="bn" value="<?php echo $row['bookname']?>"></td>
                </tr>
                <tr>
                    <td align="center"><label for="authorName">Author's Name</label></td>
                    <td><input type="text"  name="authorName" id="an" value="<?php echo $row['authorName']?>"></td>
                </tr>
                <tr>
                    <td align="center"><label for="quantity">Quantity</label></td>
                    <td><input type="text"  name="quantity" id="qn" value="<?php echo $row['quantity']?>"></td>
                </tr>
                <tr>
                    <td align="center"><label for="status">Status</label></td>
                    <td><input type="text" name="status" id="st" value="<?php echo $row['status']?>"></td>
                </tr>
                <tr>
                    <td align="center"><label for="price">Price</label></td>
                    <td><input type="text" name="price" id="pr" value="<?php echo $row['price']?>"></td>
                </tr>
                <tr>
                    
              <td align="right"><input type="submit" name="update" value="Update" class="upbut" ></td>
              
                </tr>
                </div>
        </table>
    </form>
                <?php
        }
    }?>
      
</body>
</html>