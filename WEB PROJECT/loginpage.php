
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="loginspage.css">
    <script src="include.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
     integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    
</head>
<body>
   
           <include src="header.php"></include> 
       
        <section class="login">
            <form action="log.php" method="POST"  class="form">
                <?php
                if(isset($_GET['error'])){?>
                    <p class="error"><?php echo $_GET ['error']; ?></p>
                    <?php
                }?>        
                <!--username-->
                <label for="user">UserName</label>
                <input type="text" name="user" placeholder="Enter your user name">
                <!--password-->
                <label for="pass">Password</label>
                <input type="password" name="pass" placeholder="Enter your password">
                
                <a href="forgetPage.php">Forget Password?</a><br>
                
                <button type="submit" name="submit"> LOGIN</button>
                
            </form>
            
        </section>
        <footer class="foot">
            <include src="footer.php"></include> 
        </footer>
        <script>
      function toggleMenu(){
        const menuToggle=document.querySelector('.toggle');
        const navigation=document.querySelector('#menuList');
        menuToggle.classList.toggle('active');
       navigation.classList.toggle('active');
    //    e.preventDefault();

       }
    </script>
</body>
</html>