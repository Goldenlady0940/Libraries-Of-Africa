<?php
            session_start();
           require"connect.php";
           if(isset($_POST['submit'])){
                if(isset($_POST['admin']) && isset($_POST['adPass'])){
                    function validate($data){
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);

                        return $data;
                    }
                    $admin = validate($_POST['admin']);
                    $adPass = validate($_POST['adPass']);
                    if (empty($admin)){
                        header("Location: admin.php?error=User Name is required");
                        exit();
                    }
                    else if (empty($adPass)){
                        header("Location: admin.php?error=Password is required");
                    exit();
                    }
    
                    else{
                       $sql = "SELECT adminName, adminPass FROM admin WHERE adminName='$admin' AND adminPass='$adPass'";
                        $result = mysqli_query($con,$sql);
                        
                        
                       if(mysqli_num_rows($result) === 1){
                            $row = mysqli_fetch_array($result);
                            if($row['adminName' === $admin && $row['adminPass'] === $adPass]){
                                $_SESSION['adminName'] = $_POST['admin'];
                                
                                header('Location: adminpage.php');
                                
                                
                            //     if (isset($_SESSION['username'])) {
                            //         //header("Location:personalpage.php");
                            //         $sql ="SELECT * FROM useraccount WHERE USER_NAME =";
                            //         $res = mysqli_connect($con, $sql);
                              } 
                            else {
                                 // Redirect to the login page if the user is not logged in
                                 header('Location: admin.php');
                                 exit();
                             }
                              
                        }}}}                        
            //             else 
            //             {
            //                 header("Location: admin.php?error=Authentication error");
            //                 exit();
            //             }
            //         }
                
            //     }
               
            // }
            // else{
            //     header('Location:homepage.php');
            // }
        ?>