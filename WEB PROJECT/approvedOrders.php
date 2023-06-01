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
                    <!-- <th>Book Id</th>
                    <th>Book Name</th>
                    <th>Author's Name</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Action</th> -->
                    <th>Customer Id</th>
                    <th>Book Name</th>
                    <th>Book Price</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                   require"connect.php";
                   $customerid=$_GET['USER_FKID'];
                   $sql = "INSERT INTO approved (CUSTOMER_ID, BOOK_NAME, BOOK_PRICE) 
                           SELECT USER_FKID,BOOK_NAME, PRICE  FROM new_book, request
                           WHERE request.BOOK_FKID=new_book.BOOK_ID
                           AND request.USER_FKID = $customerid";
                           $result=mysqli_query($con,$sql);
                           if($result){
                               $sql2="SELECT * FROM approved WHERE CUSTOMER_ID ='$customerid'";
                                   $result2=mysqli_query($con,$sql2);
                                   if($result2){
                                    $sql3="DELETE FROM `request` WHERE USER_FKID=$customerid";
                                    $result3=mysqli_query($con,$sql3);
                                       while($row=$result2->fetch_assoc()){
                                           // $_SESSION['BOOKD']=$row["BOOK_FKID"];
                                               echo "<tr>
                                               <td>".$row["CUSTOMER_ID"]."</td>
                                               <td>".$row["BOOK_NAME"]."</td>
                                               <td>".$row["BOOK_PRICE"]."</td>
                                               
                                           </tr>";
                                       
                                           }
                                   }
                              // header('Location: approvedOrders.php');
                           }
                           else{
                               header('Location: LibraryList.php');
                           }
                // session_start();
                // require"connect.php";
                // if (isset($_GET['USER_FKID'])){
                //     $cid= $_GET['USER_FKID'];
                // }
                // $sql="SELECT * FROM approved WHERE CUSTOMER_ID ='$cid'";
                // $result=mysqli_query($con,$sql);
                // if($result){
                //     while($row=$result->fetch_assoc()){
                //         // $_SESSION['BOOKD']=$row["BOOK_FKID"];
                //             echo "<tr>
                //             <td>".$row["CUSTOMER_ID"]."</td>
                //             <td>".$row["BOOK_NAME"]."</td>
                //             <td>".$row["BOOK_PRICE"]."</td>
                            
                //         </tr>";
                    
                //         }
                // }
                // if(isset($_GET['BOOK_FKID'])){
                //     $id= $_GET['BOOK_FKID'];
                // }
                // $sql="SELECT * FROM new_book WHERE BOOK_ID='$id' ";
                //$sql="SELECT * FROM bookManage";
                // if(isset($_GET['BOOK_FKID'])){
                //     $id = $_GET['BOOK_FKID'];
                //     // $mysqli = new mysqli("localhost", "username", "password", "database_name");
                //     if ($stmt = $mysqli->prepare("SELECT * FROM new_book WHERE BOOK_ID = ?")) {
                //     //   $stmt->bind_param("i", $id);
                //       $stmt->execute();
                //       $result = $stmt->get_result();
                //       while ($row = $result->fetch_assoc()) {
                //         echo "<tr>
                     
                //         <td>".$row["BOOK_NAME"]."</td>
                //         <td>".$row["AUTHOR"]."</td>
                       
                //    </tr>";
               
                //       }
                //       $stmt->close();
                //     }
                //     $mysqli->close();
                //   }
                  
                // $result=$con->query($sql);
                // if(!$result){
                //     die("Invalid query: " .mysqli::$error);
                // }
                // while($row=$result->fetch_assoc()){

                //     // $_SESSION['bookId']=$_POST['bookIdfk'];
                   
                // }
               
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