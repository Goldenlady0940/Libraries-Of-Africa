<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>request</title>
    <style>
        .fname {
            padding: 0;
            width:70%;
            height: 30px;
            left: 0;
            border: 1px solid #cdcdcd;
            border-color: rgba(0,0,0,.15);
            background-color: white;
            font-size: 16px;
        }
            .finish
            {
                background-color: rgb(253, 212, 135);
                height:40px;
                width:100px;
                border-radius: 20px;
                
            }
        
    </style>
</head>
<body bgcolor="mintcream">
    <?php
    session_start();
    require"connect.php";
            $user=$_SESSION['username'];
    $sql = "SELECT *FROM useraccount WHERE USER_NAME='$user'";
    $sql2 = "SELECT * FROM new_book WHERE BOOK_ID = {$_SESSION['BOOKID']};";

    $result = mysqli_query($con, $sql);
    $result2 = mysqli_query($con, $sql2);
    if (!$result || !$result2 ) {
      printf("Error: %s\n", mysqli_error($conn));
      exit();
  } 
  else{
        while ($row = mysqli_fetch_assoc($result)) {?>
           
       
    
    <form action="" method="POST">
    <table align="center" width="600px" height="500px">
            <div class="name">
                <tr>
                    <td></td>
                    <td align="left"><img src="Images/logo1.jpg" alt=""></td>
                </tr>
                <tr >
                    <td align="center"><label for="fname">Name</label></td>
                    <td><input type="text" name="fname" id="fname" value="<?php echo $row['FIRST_NAME'] . " " .$row['LAST_NAME']?>"></td>
                </tr>
                <tr>
                    <td align="center"><label for="id">National ID</label></td>
                    <td><input type="text"  name="id" id="id" value="<?php echo $row['NATIONAL_ID']?>"></td>
                </tr>
                <tr>
                    <td align="center"><label for="email">Email</label></td>
                    <td><input type="email"  name="email" id="email" value="<?php echo $row['EMAIL']?>"></td>
                </tr>
                <tr>
                    <td align="center"><label for="ci">City</label></td>
                    <td><input type="text"  name="city" id="ci" value="<?php echo $row['CITY']?>"></td>
                </tr>
                <tr>
                    <td align="center"><label for="co">Country</label></td>
                    <td><input type="text" name="country" id="co" value="<?php echo $row['COUNTRY']?>"></td>
                </tr>
                <?php
        }
        ?>
        <?php
         while ($row = mysqli_fetch_assoc($result2)) {?>
                <tr>
                    <td align="center"><label for="bn">Book Name</label></td>
                    <td><input type="text"name="book_name" id="bn" value="<?php echo $row['BOOK_NAME']?>"></td>
                </tr>
                <tr>
                    <td align="center"><label for="ba">Book Author</label></td>
                    <td><input type="text" name="book_author" id="ba" value="<?php echo $row['AUTHOR']?>"></td>
                </tr>
                <tr>
                    <td align="center"><label for="bn">Price</label></td>
                    <td><input type="text"name="book_name" id="bn" value="<?php echo $row['PRICE']?>"></td>
                </tr>
                <tr>
                    <td align="center"><label for="da">Request Date</label></td>
                    <td><input type="date" name="req_date" id="da" ></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="right"><button type="submit" name="pass_req" class="finish">Pass Request</button></td>
                </tr>
            </div>
        </table>
    </form>
    <?php
         }
    }?>
</body>
</html>