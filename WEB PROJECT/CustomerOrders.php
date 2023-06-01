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
    <?php
    require"connect.php";
$sql2 ="SELECT COUNT(*) as profit FROM approved";
$result2= mysqli_query($con,$sql2);
if($result2->num_rows > 0){
    $row = $result2->fetch_assoc();
    $profit = $row['profit'];
}else{
    $profit = 0;
}
?>
<div class="income"><img src="images/income1.PNG" alt=""> <?php echo $profit; ?>
        <h2>Sales Income</h2></div>
        <?php
        
$sql2 ="SELECT COUNT(*) as total_users FROM useraccount";
$result2= mysqli_query($con,$sql2);
if($result2->num_rows > 0){
    $row = $result2->fetch_assoc();
    $total_users = $row['total_users'];
}else{
    $total_users = 0;
}
?>   
 <div class="user"> <img src="images/clients.PNG" alt=""> <?php echo $total_users; ?>
        <h2>Total Users</h2></div>
     
        <?php
$sql2 ="SELECT COUNT(*) as total_orders FROM request";
$result2= mysqli_query($con,$sql2);
if($result2->num_rows > 0){
    $row = $result2->fetch_assoc();
    $total_orders = $row['total_orders'];
}else{
    $total_orders = 0;
}
?>  
<div class="order"><img src="images/order1.PNG" alt=""><?php echo $total_orders; ?>
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
           
           $sql="SELECT * FROM request";
           
           
           $result=mysqli_query($con, $sql);
          
           if(!$result || !$result2){
               die("Invalid query: " .mysqli::$error);
           }
        //    $row = mysqli_fetch_array($result2);

           // Get the count value
        //    $count = $row[0];
           
           // Store the count value in a session variable
        
        //    $_SESSION['Count'] = $count;
        //    $row = mysqli_fetch_array($result2, MYSQLI_ASSOC);

        //    // Get the count value
        //    $_SESSION['Count'] = $row["COUNT(*)"];
           while($row=$result->fetch_assoc()){
           // $_SESSION['BOOKD']=$row["BOOK_FKID"];
               echo "<tr>
               <td>" .$row["id"]."</td>
               <td>".$row["USER_FKID"]."</td>
               <td>".$row["BOOK_FKID"]."</td>
               <td>".$row["REQUEST_DATE"]."</td>
               <td><p>".$row["PAYMENT_STATUS"]."</p></td>
               <td> <a href='delete.php?USER_FKID= " .$row["USER_FKID"]."'>Approve</td>
              
               
             
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
<script src="cust.js"></script>