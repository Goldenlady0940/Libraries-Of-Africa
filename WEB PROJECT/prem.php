<?php

require"connect.php";
    
    if(isset($_POST['user']) && isset($_POST['pass'])){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $region = $_POST['region'];
        $nid = $_POST['nid'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
       
        $sql = "SELECT * FROM useraccount WHERE USER_NAME = '$user'";
        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) > 0){
            header("Location:premiumpage.php?error=User already registered!");
            exit();
         }
         else{

            // Define the SQL query
            $sql2 = "INSERT INTO `useraccount` (`FIRST_NAME`, `LAST_NAME`, `GENDER`, `PHONE`, `EMAIL`, `NATIONAL_ID`, `COUNTRY`, `CITY`, `REGION`, `USER_NAME`, `PASS_WORD`)
                    VALUES ('$fname', '$lname', '$gender', '$phone', '$email', '$nid', '$country', '$city', '$region', '$user', '$pass')";

            // Execute the SQL query
            $result2 = mysqli_query($con, $sql2);

            // Check if the query was executed successfully
            if ($result2) {
                header("Location: loginpage.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($con);
            }

            // Close the database connection
            mysqli_close($con);

         }
    }
    else{
        header("Location: premiumpage.php");
        exit();
    }
?>