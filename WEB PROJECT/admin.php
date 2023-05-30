<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adminLogin</title>
    <link rel="stylesheet" href="loginspage.css">
    <script src="include.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
     integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
   
        
       
        <section class="adminLogin">
            <form action="adminLog.php" method="POST"  class="form">
                <?php
                if(isset($_GET['error'])){?>
                    <p class="error"><?php echo $_GET ['error']; ?></p>
                    <?php
                }?>        
                <!--username-->
                <label for="user">UserName</label>
                <input type="text" name="admin" placeholder="Enter your user name">
                <!--password-->
                <label for="pass">Password</label>
                <input type="password" name="adPass" placeholder="Enter your password">
                
                
                <button type="submit" name="submit"> LOGIN</button>
                
            </form>
            
        </section>

     
</body>
</html>