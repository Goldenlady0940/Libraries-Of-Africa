<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forget</title>
    
    <script src="include.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
     integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="forget.css">
</head>
<body>
    <div class="wrapper">
        <include src="header.php"></include>
        <section class="forget">
            <form action="" method="post">
                <h1>Enter Your Email to reset password</h1>
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email">
              <br> <br>

                    <button class="finish">Submit</button>
            </form>
        </section>
    </div>
    <footer class="foot">
        <include src="footer.php"></include>
    </footer>
</body>
</html>