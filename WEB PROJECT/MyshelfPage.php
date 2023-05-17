<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shelf</title>
    <link rel="stylesheet" href="myshelf.css">

</head>
<body>
    <!-- session_start(); -->
        <div class="wrapper">
        <aside>
       
        <?php session_start();  echo $_SESSION['username']; ?>
            <h2 align="center">My Shelf</h2>
            <footer>
                <button id="actbtn" class="footer">Account</button>
            </footer>
        </aside>
       
       <section class="right">
            <table border="1" class="right" cellpadding="10" 
            cellspacing="30" bgcolor="white">
                <tr>
                    <td>book1</td>
                    <td>book2</td>
                    <td>book3</td>
                </tr>
                <tr>
                    <td>book4</td>
                    <td>book5</td>
                    <td>book6</td>
                </tr>
                <tr>
                    <td>book7</td>
                    <td>book8</td>
                    <td>book9</td>
                </tr>
            </table>
       </section>
    </div>
</body>
</html>
<script src="myshelf.js"></script>