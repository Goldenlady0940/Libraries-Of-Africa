<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <style>
        .finish
        {
            background-color: rgb(253, 212, 135);
            height:40px;
            width:100px;
            border-radius: 20px;

        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
</head>
<body>
    <fieldset>
    <form action="" method="POST">
<?php
      session_start();
      require"connect.php";
    
    
      $sql = "SELECT * FROM useraccount WHERE USER_NAME= '{$_SESSION['username']}'";
    $result = mysqli_query($con, $sql);
    
    if(mysqli_num_rows($result) > 0){
     while($row = mysqli_fetch_assoc($result)){
        //$row = mysqli_fetch_assoc($result);?>

   
            <table align="center" width="600px" height="500px">
                <h1><center>Profile Info</center></h1>
                <div class="name">
                    <tr>
                        
                        <td><label for="fname">First Name</label></td>
                        <td><input type="text" class="fname" name="fname" id="fname" value="<?php echo $row['FIRST_NAME']; ?>" disabled></td>
                        
                    </tr>
                    <tr>
                        <td><label for="lname">Last Name</label></td>
                        <td> <input type="text" class="lname" name="lname" id="lname" value="<?php echo $row['LAST_NAME']; ?>"disabled></td>
                   
                    </tr>
                </div>
                <!--gender-->
                <div class="gender">
                    <tr>
                        <td><label for="gender">Gender:</label><br></td>
                        <td>
                            <input type="radio" name="gender" id="gender" value="male" value="<?php echo $row['GENDER']; ?>"disabled>
                            <label for="male">Male</label>
                            <input type="radio" name="gender" id="gender" value="female" value="<?php echo $row['GENDER']; ?>" disabled>
                            <label for="female">Female</label>
                        </td>
                    </tr>
                </div>
                <!--phone-->
                <div class="phone">
                    <tr>
                        <td><label for="phone">Phone</label></td>
                        <td><input class="phone" type="tel" name="phone" id="phone" value="<?php echo $row['PHONE']; ?>"disabled></td>
                        
                        
                    </tr>
                </div>
                <!--email-->
                <div class="email">
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input  class="email" type="email" name="email" id="email" value="<?php echo $row['EMAIL']; ?>" disabled></td>
                    </tr>
    
                </div>
                <!--id-->
                <div class="id">
                    <tr>
                        
                        <td><label for="id">National Id Number</label>
                        <td><input type="text" class="nid" name="nid" id="nid" value="<?php echo $row['NATIONAL_ID']; ?>" disabled></td>
                    </td>
                    </tr>
                </div>
                <!--country-->
                <div class="country">
                    <tr>
                        
                        <td><label for="country">Country</label></td>
                        <td><input class="country" type="text" name="country" id="country" value="<?php echo $row['COUNTRY']; ?>" disabled></td>
                    </tr>
                    <tr>
                        
                        <td><label for="city">City</label></td>
                        <td><input class="city" type="text" name="city" id="city" value="<?php echo $row['CITY']; ?>" disabled></td>
                       
                    </tr>
                    <tr>
                        
                        <td><label for="city">Region</label></td>
                        <td><input class="region" type="text" name="region" id="region" value="<?php echo $row['REGION']; ?>" disabled></td>
                       
                    </tr>
                </div>
                <div class="username">
                    <tr>
                        <td><label for="us">UserName</label></td>
                        <td><input class="user" type="text" name="user" id="user" value="<?php echo $row['USER_NAME']; ?>" disabled></td>
                    </tr>
                </div>
                <!--password-->
                <div class="username">
                    <tr>
                        <td><label for="psw">Password</label></td>
                        <td><input class="pass" type="password" name="pass" id="pass" value="<?php echo $row['PASS_WORD']; ?>" disabled></td>
                    </tr>
                </div>
               <div class="finishes">
                <tr>
                    <td></td>
                    <td><button type = "submit" id="edit" class="finish" >Edit</button>
                        <button type="submit" name= "save" class="finish">Save</button>
                        <button type="submit" name= "delete" id = "del" class="finish" value="<?=$row['USER_NAME'];?>">Delete</button></td>
                </tr>
               </div>
            </table>
        </form>
        
<?php
        
      }
   }?>
<?php 
if(isset($_POST['delete'])){
    $user = $_POST['delete'];
    $sql = "DELETE FROM useraccount WHERE USER_NAME = '$user'";
    $result = mysqli_query($con,$sql);
    if ($result) {
        //this code work but doesnt return to header coz its header already displayed values above
        exit();
    }
    else{
        header("Location: homepage.php");
        exit();
    }
}
if(isset($_POST['save'])){
    $new_fname = $_POST['fname'];
    $new_lname = $_POST['lname'];
    $new_phone = $_POST['phone'];
    $new_email = $_POST['email'];
    // $new_country = $_POST['country'];
    //those fields arent gonna be eddited
    // $new_city = $_POST['city'];
    // $new_region = $_POST['region'];
    $new_user = $_POST['user'];
    $new_pass = $_POST['pass'];

    $sql2 = "UPDATE useraccount SET FIRST_NAME = '$new_fname', LAST_NAME = '$new_lname', PHONE = '$new_phone', EMAIL = '$new_email', 
    USER_NAME = '$new_user', PASS_WORD = '$new_pass' WHERE USER_NAME = '{$_SESSION['username']}';";

    $result2 = mysqli_query($con,$sql2);
    if ($result2) {
        echo "update successfull";
        //this code work but doesnt return to header coz its header already displayed values above
        //exit();
    }
    else{
        echo "update unsuccessfull";
        // header("Location: homepage.php");
        // exit();
    }
}
?>

</body>
</html>
<script src="person.js"></script>
