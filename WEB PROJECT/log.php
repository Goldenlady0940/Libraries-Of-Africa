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
                       $sql = "SELECT USER_NAME, PASS_WORD FROM useraccount WHERE USER_NAME='$user' AND PASS_WORD='$pass'";
                        $result = mysqli_query($con,$sql);
                        $sql2 ="SELECT LIB_PASS_WORD FROM new_library WHERE LIB_PASS_WORD='$pass'";
                        
                       if(mysqli_num_rows($result) === 1){
                            $row = mysqli_fetch_array($result);
                            if($row['USER_NAME' === $user && $row['PASS_WORD'] === $pass]){
                                $_SESSION['username'] = $_POST['user'];
                                
                                header('Location: Mainpage.php');
                                
                                
                            //     if (isset($_SESSION['username'])) {
                            //         //header("Location:personalpage.php");
                            //         $sql ="SELECT * FROM useraccount WHERE USER_NAME =";
                            //         $res = mysqli_connect($con, $sql);
                              } 
                            else {
                                 // Redirect to the login page if the user is not logged in
                                 header('Location: loginpage.php');
                                 exit();
                             }
                              
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
                    header('Location:newBook.php');
                }
                else{
                    header('Location:homepage.php');
                }
            ?>