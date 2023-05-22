<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>premium</title>
    <script src="include.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
     integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="premium.css">
</head>
<body>
    <div class="wrapper">
        <include src="header.php"></include>
        <section class="account">
            <form action="prem.php" method="POST">
                <h1>Create New Account</h1>
                
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname">

                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname"><br><br>

                    <label for="gender">Gender:</label>
                    <input type="radio" name="gender" id ="gender" value="male">
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id ="gender" value="female">
                    <label for="female">Female</label><br><br>

                    <label for="phone">Phone</label>
                    <input class="phone" type="tel" name="phone" id="phone">

                    <label for="email">Email</label>
                    <input  class="email" type="email" name="email" id="email"><br><br>

                    <label for="country">Country</label>
                    <input class="country" type="text" name="country" id="country">
                    <label for="city">City</label>
                    <input class="city" type="text" name="city" id="city" ><br><br>
                    <label for="region">Region</label>
                    <input class="region" type="text" name="region" id="region">

                    <label for="id">National Id</label>
                    <input type="text" class="id" name="nid" id="id"><br><br>

                    <label for="user">UserName</label>
                    <input class="usp" type="text" name="user" id="us">
                    
                    <label for="pass">Password</label>
                    <input class="usp" type="password" name="pass" id="psw">

                    <h3>Mode Of payment</h3>
                    <p>chapa payment system</p>

                    <button type="submit" class="finish">Submit</button>
            
                </form>
                
        </section>
    </div>
    <footer class="foot">
        <include src="footer.php"></include>
    </footer>
</body>
</html>