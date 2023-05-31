<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shelf</title>
    <link rel="stylesheet" href="myshelf.css">
    <link rel="stylesheet" href="adminpage.css">

</head>
<body>
    <!-- session_start(); -->
        <div class="wrapper">
        <aside>
       
        <?php session_start();  echo $_SESSION['username']; echo $_SESSION['CUSTID']; ?>
            <h2 align="center">My Shelf</h2>
            <footer>
                <button id="actbtn" class="footer">Account</button>
            </footer>
        </aside>
        <div class="bookList">
   
        <section class="header">
           
        <h1>Your Order</h1>
        </section>
        <section class="body">
        <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Customer Id</th>
                    <th>Book Id</th>
                    <!-- <th>Quantity</th> -->
                    <th>Date</th>
                    <th>Status</th>
                    
                </tr>
                </thead>
                <tbody>
                    <?php
                // session_start();
                require"connect.php";
                $sql="SELECT * FROM request WHERE USER_FKID={$_SESSION['CUSTID']}";
                $result=$con->query($sql);
                if(!$result){
                    die("Invalid query: " .mysqli::$error);
                }
                while($row=$result->fetch_assoc()){
                    echo "<tr>
                    <td>" .$row["id"]."</td>
                    <td>".$row["USER_FKID"]."</td>
                    <td>".$row["BOOK_FKID"]."</td>
                    <td>".$row["REQUEST_DATE"]."</td>
                    <td><p>".$row["PAYMENT_STATUS"]."</p></td>
               
                    
                  
                </tr>";
            
                }
                    ?>
                </tbody>
               
        </table>
           
            </section>
            </div>
       
       <!-- <section class="right">
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
       </section> -->
    </div>
</body>
</html>
<script src="myshelf.js"></script>