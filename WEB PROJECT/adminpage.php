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
    <link rel="stylesheet" href="adminpage.css">
</head>
<body><div class="analytics"><h2>Analytics</h2></div>
    <section class="data">
<div class="income"><img src="images/income1.PNG" alt="">
        <h2>Sales Income</h2></div>
 <div class="user"> <img src="images/clients.PNG" alt="">
        <h2>Total Users</h2></div>
<div class="order"><img src="images/order1.PNG" alt="">
        <h2>Orders</h2></div>
        </section>
        <button class="add" onclick="location.href='add.php'">Add New +</button>
    <div class="bookList">
   
        <section class="header">
           
        <h1>Customer Order</h1>
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
                    <th>Approval</th>
                    
                </tr>
                </thead>
                <tbody>
                    <?php
                session_start();
                require"connect.php";
                $sql="SELECT * FROM request";
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
                    <td> <a href='delete.php?BOOK_FKID= " .$row["BOOK_FKID"]."'>Approve</td>
               
                    
                  
                </tr>";
            
                }
                    ?>
                </tbody>
               
        </table>
           
            </section>
            </div>

            <div class="customerOrder">
            <section class="header">
            <h1>List Of Books</h1>
        </section>
        <section class="body">
        <table>
                <thead>
                <tr>
                    <th>Book Id</th>
                    <th>Book Name</th>
                    <th>Author's Name</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                // session_start();
                require"connect.php";
                $sql="SELECT * FROM bookManage";
                $result=$con->query($sql);
                if(!$result){
                    die("Invalid query: " .mysqli::$error);
                }
                while($row=$result->fetch_assoc()){
                    // $_SESSION['bookId']=$_POST['bookIdfk'];
                    echo "<tr>
                    <td>" .$row["bookIdfk"]."</td>
                    <td>".$row["bookname"]."</td>
                    <td>".$row["authorName"]."</td>
                    <td>".$row["quantity"]."</td>
                    <td><p>".$row["status"]."</p></td>
                    <td><strong>".$row["price"]."$</strong></td>
                    <td><a href='edit.php?bookIdfk= " .$row["bookIdfk"]."'><img src='edit.PNG' class='editpic' alt=''></a>
                     <a href='delete.php?bookIdfk= " .$row["bookIdfk"]."'><img src='delete.PNG' class='deletepic' alt=''></a></td>
                </tr>";
            
                }
               
                // if(isset($_POST['edit'])){
                //     header("Location:homepage.php");
                // }
                    ?>
                  <script>
                    functiom redirect()
                  </script>
                   
                </tbody>
            </table>
           
            </section>
        </div>
    
        <div class="custInfo">
        <section class="header">
            <h1>Customer Info</h1>
        </section>
        <section class="body">
            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Region</th>
                    
                </tr>
                </thead>
                <tbody>
                    <?php
                // session_start();
                require"connect.php";
                $sql="SELECT * FROM useraccount";
                $result=$con->query($sql);
                if(!$result){
                    die("Invalid query: " .mysqli::$error);
                }
                while($row=$result->fetch_assoc()){
                    echo "<tr>
                    <td>" .$row["ID"]."</td>
                    <td>".$row["FIRST_NAME"].$row["LAST_NAME"]."</td>
                    <td>".$row["GENDER"]."</td>
                    <td>".$row["PHONE"]."</td>
                    <td><p>".$row["EMAIL"]."</p></td>
                    <td>".$row["COUNTRY"]."</td>
                    <td>".$row["CITY"]."</td>
                    <td>".$row["REGION"]."</td>
                </tr>";
            
                }
                    ?>
                </tbody>
            </table>
            </section>
            </div>
        
            <div class="libInfo">
        <section class="header">
            <h1>List Of Libraries</h1>
        </section>
        <section class="body">
            <table>
                <thead>
                <tr>
                    <th>Library Id</th>
                    <th>Libraray Name</th>
                    <th>Location</th>
                    <th>Wiki Link</th>
                    <th>Password</th>
                    
                </tr>
                </thead>
                <tbody>
                    <?php
                // session_start();
                require"connect.php";
                $sql="SELECT * FROM new_library";
                $result=$con->query($sql);
                if(!$result){
                    die("Invalid query: " .mysqli::$error);
                }
                while($row=$result->fetch_assoc()){
                    echo "<tr>
                    <td>" .$row["LIB_ID"]."</td>
                    <td>".$row["NAME"]."</td>
                    <td>".$row["LOCATION"]."</td>
                    <td>".$row["WIKI_LINK"]."</td>
                    <td><p>".$row["LIB_PASS_WORD"]."</p></td>
                   
                </tr>";
            
                }
                    ?>
                </tbody>
            </table>
            </section>
            </div>

   
        
     
</body>
</html>