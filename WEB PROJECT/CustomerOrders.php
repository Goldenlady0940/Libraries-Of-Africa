<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
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
       </section>
        </div>

</body>
</html>