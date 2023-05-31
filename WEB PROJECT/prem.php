<?php

require"connect.php";
session_start();
    if(isset($_POST['signup'])){

    
    if(isset($_POST['user']) && isset($_POST['pass'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }
        
          
        $fname = validate($_POST['fname']);
        $lname =validate($_POST['lname']);
       // $gender = $_POST['gender'];
       if (isset($_POST['gender'])) {
        $genderSelected = $_POST['gender'];
      }
        $phone = validate($_POST['phone']);
        $email = validate($_POST['email']);
        $country = validate($_POST['country']);
        $city = validate($_POST['city']);
        $region = validate($_POST['region']);
        $nid = validate($_POST['nid']);
        $user = validate($_POST['user']);
        $pass = validate($_POST['pass']);

       if (empty($fname)){
            header("Location: loginpage.php?error=first name is required");
        exit();
        }
        else if (empty($lname)){
            header("Location: loginpage.php?error=last name is required");
        exit();
        }
        else if (empty($genderSelected)){
            header("Location: loginpage.php?error=gender is required");
        exit();
        }
        else if (empty($phone)){
            header("Location: loginpage.php?error=phone is required");
        exit();
        }
        else if (empty($email)){
            header("Location: loginpage.php?error=email is required");
        exit();
        }
        else if (empty($country)){
            header("Location: loginpage.php?error=country is required");
        exit();
        }
        else if (empty($city)){
            header("Location: loginpage.php?error=city is required");
        exit();
        }
        else if (empty($region)){
            header("Location: loginpage.php?error=region is required");
        exit();
        } 
        elseif (empty($user)){
            header("Location: loginpage.php?error=User Name is required");
            exit();
        }
        else if (empty($pass)){
            header("Location: loginpage.php?error=Password is required");
        exit();
        }
        else {
        $sql = "SELECT * FROM useraccount WHERE USER_NAME = '$user'";
        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) > 0){
            header("Location:premiumpage.php?error=User already registered!");
            exit();
         }
         else{

            // Define the SQL query
            // $sql2 = "INSERT INTO `useraccount` (`FIRST_NAME`, `LAST_NAME`, `GENDER`, `PHONE`, `EMAIL`, `NATIONAL_ID`, `COUNTRY`, `CITY`, `REGION`, `USER_NAME`, `PASS_WORD`)
            //         VALUES ('$fname', '$lname', '$gender', '$phone', '$email', '$nid', '$country', '$city', '$region', '$user', '$pass')";
            $sql2 = "CALL insertUser('$fname', '$lname', '$genderSelected', '$phone', '$email', '$nid', '$country', '$city', '$region', '$user', '$pass')";
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
}
    else{
        header("Location: premiumpage.php");
        exit();
    }
    }

?>