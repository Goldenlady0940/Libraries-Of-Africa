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
     <link rel="stylesheet" href="header.css">
    
</head>
<body>
<header class="header">
        <div class="logo">
            <img src="logo1.jpg" alt="">
            <p>Libraries Of Africa</p> 
            </div>
        <div class="menu">
            <div class="toggle" onclick="toggleMenu()"></div>
        
            <ul id="menuList">
                <li><a href="homepage.php">Home</a> </li>
                <li><a href="loginpage.php">Login</a></li>
                <li><a href="newLibrary.php">Library</a></li>
                <li><a href="location.php">Location</a></li>
                <li><a href="homepage.php#contact">Contact Us</a></li>
                <li><button onclick="location.href='premiumpage.php'">Go Premium</button></li>
            </ul>
            
        </div>
        
        
    </header>
    <script>
      public function toggleMenu(){
        const menuToggle=document.querySelector('.toggle');
        const navigation=document.querySelector('#menuList');
        menuToggle.classList.toggle('active');
       navigation.classList.toggle('active');
    //    e.preventDefault();

       }
    </script>
    
</body>
</html>



