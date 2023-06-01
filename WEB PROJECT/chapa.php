<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* If you like this, please check my blog at codedgar.com.ve */
@import url('https://fonts.googleapis.com/css?family=Work+Sans');
body{
font-family: 'Work Sans', sans-serif;
background: #00d2ff; 
background: -webkit-linear-gradient(to right, #3a7bd5, #00d2ff); 
background: linear-gradient(to right, #3a7bd5, #00d2ff); 
  /* Thanks to uigradients :) */
}

.card{
  background:#16181a;  border-radius:14px; max-width: 300px; display:block; margin:auto;
  padding:60px; padding-left:20px; padding-right:20px;box-shadow: 2px 10px 40px black; z-index:99;
}

.logo-card{max-width:50px; margin-bottom:15px; margin-top: -19px;}

label{display:flex; font-size:10px; color:white; opacity:.4;}

input{font-family: 'Work Sans', sans-serif;background:transparent; border:none; border-bottom:1px solid transparent; color:#dbdce0; transition: border-bottom .4s;}
input:focus{border-bottom:1px solid #1abc9c; outline:none;}

.cardnumber{display:block; font-size:20px; margin-bottom:8px; }

.name{display:block; font-size:15px; max-width: 200px; float:left; margin-bottom:15px;}

.toleft{float:left;}
.ccv{width:50px; margin-top:-5px; font-size:15px;}

.receipt{background: #dbdce0; border-radius:4px; padding:5%; padding-top:200px; max-width:600px; display:block; margin:auto; margin-top:-180px; z-index:-999; position:relative;}

.col{width:50%; float:left;}
.bought-item{background:#f5f5f5; padding:2px;}
.bought-items{margin-top:-3px;}

.cost{color:#3a7bd5;}
.seller{color: #3a7bd5;}
.description{font-size: 13px;}
.price{font-size:12px;}
.comprobe{text-align:center;}
.proceed{position:absolute; transform:translate(300px, 10px); width:50px; height:50px; border-radius:50%; background:#1abc9c; border:none;color:white; transition: box-shadow .2s, transform .4s; cursor:pointer;}
.proceed:active{outline:none; }
.proceed:focus{outline:none;box-shadow: inset 0px 0px 5px white;}
.sendicon{filter:invert(100%); padding-top:2px;}

@media (max-width: 600px){
  .proceed{transform:translate(250px, 10px);}
  .col{display:block; margin:auto; width:100%; text-align:center;}
}
    </style>
   
</head>
<body>

<div class="container">
    <div class="card">
      <button class="proceed"  name="done"><svg class="sendicon" width="24" height="24" viewBox="0 0 24 24" >
    <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
  </svg></button>
     <img src="https://seeklogo.com/images/V/VISA-logo-62D5B26FE1-seeklogo.com.png" class="logo-card">
   <!-- <label>Card number:</label>
   <input id="user" type="text" class="input cardnumber"  placeholder="+251-999-999-9999"> -->
   <?php
    session_start();
    require "connect.php";
    if(isset($_GET['id'])){
      $bid= $_GET['id'];
      
  }
      // $uid= $_SESSION['uid'];
    $users=$_SESSION['username'];
    $sql = "SELECT *FROM useraccount WHERE USER_NAME='$users'";
    $sql2 = "SELECT * FROM new_book WHERE BOOK_ID = '$bid'";
   
    $result = mysqli_query($con, $sql);
    $result2 = mysqli_query($con, $sql2);
    while ($row = mysqli_fetch_assoc($result)) {?>
   <label>Name:</label>
   <input class="input name"  placeholder="your name" value="<?php echo $row['FIRST_NAME'] . " " .$row['LAST_NAME']?>">
    </div>
    <?php
  }?>
    <div class="receipt">
   <?php
    if (!$result || !$result2 ) {
      printf("Error: %s\n", mysqli_error($con));
      exit();
  } 
  else{
    while ($row = mysqli_fetch_assoc($result2)) {?>
      <div class="col"><p>Cost:</p>
      <h2 class="cost"><?php echo "$".$row['PRICE']?></h2><br>
      <p>Seller:</p>
      <h2 class="seller">Employee</h2>
      </div>
      <div class="col">
        <p>Bought Items:</p>
        <h3 class="bought-items">Book Name: <?php echo $row['BOOK_NAME']?></h3>
        <p class="bought-items description"> Book Author: <?php echo $row['AUTHOR']?></p>
        <!-- <p class="bought-items price">$200 (50% discount)</p><br> -->
        <!-- <h3 class="bought-items">Gaming keyboard</h3>
        <p class="bought-items description">Look mommmy, it has colors!</p>
        <p class="bought-items price">$200 (50% discount)</p><br> -->
      </div>
      <p class="comprobe">This information will be sended to your email</p>
    </div>
  </div>
  <?php
         }
    }
    if(isset($_POST['[done]'])){
          $req_date = $_POST['req_date'];
       $sql3 =  " UPDATE `request`  SET USER_FKID = '{$_SESSION['USERID']}', BOOK_FKID = '$bid', REQUEST_DATE = '$req_date', PAYMENT_STATUS = 'paid' WHERE BOOK_FKID = '$bid'";
      $result4=mysqli_query($con,$sql3);
          //  "INSERT INTO `request` (`USER_FKID`, `BOOK_FKID`, `REQUEST_DATE`, `PAYMENT_STATUS`) 
          // VALUES ({$_SESSION['USERID']}, '$bid', '$req_date', 'payed'); ";
          // 
          if($result4){
              header("Location:chapa.php?id= " .$row["BOOK_ID"]."");
          }else{
              echo"invalid";
          }
        }
      ?>
</body>
</html>