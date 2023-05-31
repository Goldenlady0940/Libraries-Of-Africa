<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approved</title>
    <style>
        
    </style>
    <link rel="stylesheet" href="adminpage.css">
</head>
<body>
    <div class="wrapper">
    <div class="analytics"><h2>Analytics</h2></div>
<aside>
            <button onclick="location.href='CustomerOrders.php'">Customer Order</button><br>
            <button onclick="location.href='approvedOrders.php'">Approved Orders</button><br>
            <button onclick="location.href='LibraryList.php'">Library List</button><br>
            <button>Store</button>
            
</aside>
    <section class="data">
<div class="income"><img src="images/income1.PNG" alt="">
        <h2>Sales Income</h2></div>
 <div class="user"> <img src="images/clients.PNG" alt="">
        <h2>Total Users</h2></div>
<div class="order"><img src="images/order1.PNG" alt="">
        <h2>Orders</h2></div>
       
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
                        function redirect()
                </script>
                   
                </tbody>
            </table>
           
            </section>
        </div>
       </section>
        </div>

</body>
</html>