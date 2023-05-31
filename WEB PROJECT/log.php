<?php
            session_start();
           require"connect.php";
           if(isset($_POST['submit'])){
                if(isset($_POST['user']) && isset($_POST['pass'])){
                    function validate($data){
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);

                        return $data;
                    }
                    $user = validate($_POST['user']);
                    $pass = validate($_POST['pass']);
                    if (empty($user)){
                        header("Location: loginpage.php?error=User Name is required");
                        exit();
                    }
                    else if (empty($pass)){
                        header("Location: loginpage.php?error=Password is required");
                    exit();
                    }
                    else{
                       $sql = "SELECT * FROM useraccount WHERE USER_NAME='$user' AND PASS_WORD='$pass'";
                       $sql3 = "SELECT Username, Pass_word FROM staff WHERE Username= '$user' AND Pass_word='$pass'";
                        $result = mysqli_query($con,$sql);
                        $result3 = mysqli_query($con, $sql3);
                        
                       if(mysqli_num_rows($result) === 1){
                            $row = mysqli_fetch_array($result);
                            if($row['USER_NAME' === $user && $row['PASS_WORD'] === $pass]){
                                $_SESSION['username'] = $_POST['user'];
                                $_SESSION['fname'] =$row['FIRST_NAME'];
                                $_SESSION['lname'] =$row['LAST_NAME'];
                                $_SESSION['CUSTID']=$row['ID'];
                                header('Location: Mainpage.php');
                              } 
                            else {
                                 // Redirect to the login page if the user is not logged in
                                 header('Location: loginpage.php');
                                 exit();
                             }
                              
                        }  
                        elseif(mysqli_num_rows($result3) === 1){ 
                            header("Location: CustomerOrders.php");
                        }              
                        else 
                        {
                            header("Location: loginpage.php?error=Authentication error");
                            exit();
                        }
                    }
                
                }
                else{
                    header("Location: loginpage.php");
                    exit();
                }
            }
                elseif(isset($_POST['login'])){
                    if(isset($_POST['libpass'])){
                        $libpass=$_POST['libpass'];
                        $sql2 ="SELECT * FROM new_library WHERE LIB_PASS_WORD='$libpass'";
                        $result2 = mysqli_query($con,$sql2);
                        
                            if($result2){
                             $row = mysqli_fetch_array($result2);
                             if($row['LIB_PASS_WORD'] === $libpass){
                                $_SESSION['LIB_NAME'] =$row['NAME'];
                                $_SESSION['LIBID'] =$row['LIB_ID'];
                            header('Location:newBook.php');
                             }
                        }
                     }
                }
                else{
                    header('Location:homepage.php');
                }
            ?>