<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="include.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
     integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="premium.css">
     <style>
        
     </style>
</head>
<body>
<div class="wrapper">
        <include src="header.php"></include>
    <section class="account">
        <?php
           
            session_start();
                $string ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ9876543210!!@#$%^&*()";
                $_SESSION['RAND_PASSWORD']= substr(str_shuffle($string), 0, 12);
            require"connect.php";
            $sql = "SELECT * FROM country";
           // $country_name = $_POST['COUNTRY_NAME']
            $result = mysqli_query($con, $sql);

            echo "<form method='POST' action='' >";
                echo "<h1>Register Library</h1>";

                echo " <label for='name'>Name</label>";
                echo " <input type='text' name='name' id='name'><br><br>";
                
                
            echo"<label for='location'>Location </label>";
            echo "<select name='country_dropdown'>";
            echo "<option value=''>Search By Country</option>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['COUNTRY_NAME'] . "'>" . $row['COUNTRY_NAME'] . "</option>";
            }
           
            echo "</select><br><br>";
                echo"<label for='link'>Wiki link</label>";
                echo"<input class='link' type='text' name='link' id='link'><br><br>";
                
                echo" <label for='pass'>Password</label>";
                echo"<input class='usp' type='password' name='pass' id='psw' value='{$_SESSION['RAND_PASSWORD']}' disabled><br><br>";
                echo "<i class='far fa-eye' id='togglePassword' style='margin-left: -30px; cursor: pointer; color: black;'></i>";
                echo "<p>Please dont forget this password!<p>";

            // echo " <button id='search'type='submit' name='submit'><img id='img1' src='images/search.jpg'alt=''></button>";
            echo"<button type='submit' name='login' class='finish'>Login</button>";
            echo"<button type='submit' name='submit' class='finish'>Submit</button>";
        
            echo "</form>";
            if(isset($_POST['login'])){
                header('Location:liblog.php');
            }
            if(isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['link'])){
                
                $libname = $_POST['name'];
                $link = $_POST['link'];
                $pass = $_SESSION['RAND_PASSWORD'];
                $country = $_POST['country_dropdown'];
                
                // $selectedOption = $_POST['country_dropdown'];
                //checks if country is selected
                if(!empty($country)) {
                    $_SESSION['COUNTRY_NAME_NEW'] = $_POST['country_dropdown'];
                    
                    $sql1 = "SELECT * FROM country ;";
                   
                    $result1 = mysqli_query($con, $sql1);
                    if(mysqli_num_rows($result1) > 0){
                        while($row = mysqli_fetch_assoc($result1)){
                            //if the selected country matches with the one in the database take the id of that country and use for reference
                            if($row['COUNTRY_NAME'] == $_SESSION['COUNTRY_NAME_NEW']){
                                $id = $row['COUNTRY_ID'];
                                $sql2="INSERT INTO `new_library` (`NAME`, `LOCATION`, `WIKI_LINK`, `LIB_PASS_WORD`,`colib_ID`) 
                                VALUES ('$libname', '$country', '$link', '$pass','$id');";
                                $result2= mysqli_query($con,$sql2);
            
                                 // Check if the query was executed successfully
                                if ($result2) {
                                    $_SESSION['LIBRARY_NAME'] =$_POST['name'];
                                    //if(isset($_SESSION['LIBRARY_NAME'] )){ ya it works
                                    header("Location: location.php");
                                    exit();
                                   // }
                                    
                                    // else{ 
                                    //     header("Location: homepage.php");
                                    // }
                                }
                                else {
                                    echo "Error: " . mysqli_error($con);
                                }
                            }
                            else{
                                echo "country doesnt exist!";
                            }
                        }
                    }
                  
                    mysqli_close($con);

                } else {
                    header("Location:newBook.php");
                }
            }
            ?>
        </section>
    </div>
    <footer class="foot">
        <include src="footer.php"></include>
    </footer>
</body>
</html>
<script src="lib.js"></script>
