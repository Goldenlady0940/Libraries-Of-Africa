<?php 
// require"connect.php";
// $customerid=$_GET['USER_FKID'];
// $sql = "INSERT INTO approved (CUSTOMER_ID, BOOK_NAME, BOOK_PRICE) 
//         SELECT USER_FKID,BOOK_NAME, PRICE  FROM new_book, request
//         WHERE request.BOOK_FKID=new_book.BOOK_ID
//         AND request.USER_FKID = $customerid";
//         if($con->query($sql) ===TRUE){
//             $sql2="SELECT * FROM approved WHERE CUSTOMER_ID ='$customerid'";
//                 $result2=mysqli_query($con,$sql2);
//                 if($result2){
//                     while($row=$result2->fetch_assoc()){
//                         // $_SESSION['BOOKD']=$row["BOOK_FKID"];
//                             echo "<tr>
//                             <td>".$row["CUSTOMER_ID"]."</td>
//                             <td>".$row["BOOK_NAME"]."</td>
//                             <td>".$row["BOOK_PRICE"]."</td>
                            
//                         </tr>";
                    
//                         }
//                 }
//             header('Location: approvedOrders.php');
//         }
//         else{
//             header('Location: LibraryList.php');
//         }
// $sql="DELETE FROM `request` WHERE BOOK_FKID=$bookId";
// $result=mysqli_query($con,$sql);
// sql2="INSERT INTO bookManage VALUES ($_POST['bookname'],
// authorName='" .$_POST['authorName'] ."',quantity='" .$_POST['quantity'] ."',
// status='" .$_POST['status'] ."', price='" .$_POST['price'] ."' WHERE bookIdfk= '$bookId' );";
// // $result2=mysqli_query($con,$sql2);
// if($result && $result2){
// header('Location:adminpage.php');
// }
// else{
//     header('Location:homePage.php');
// }
?>