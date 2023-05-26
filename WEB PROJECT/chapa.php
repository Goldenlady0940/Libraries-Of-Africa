<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chapa</title>
</head>
<body>
    <?php
     session_start();
    
        const $fname=$_SESSION['firstname'];
        const $lname=$_SESSION['lastname'];
        const $email=$_SESSION['email'];
        
        $string="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ9876543210!!!@#$%^&*()";
        $_SESSION['TRANS_PASSWORD']=substr(str_shuffle($string),0,9);
        const $tx_ref=$_SESSION['TRANS_PASSWORD'];
        // const pubic_key='';
        
    
   
echo"<form method='POST' action='https://api.chapa.co/v1/hosted/pay' >";
echo"  <input type='hidden' name='public_key' value='CHAPUBK_TEST-FUORwOi5OaOKc6ShMDKjUCtxe2WfuliF' />";
echo"<input type='hidden' name='tx_ref' value='$tx_ref' />";
echo "   <input type='hidden' name='amount' value='100' />";
echo   " <input type='hidden' name='currency' value='ETB' />";
echo   " <input type='hidden' name='email' value='$email' />";
echo   " <input type='hidden' name='first_name' value='$fname' />";
echo    "<input type='hidden' name='last_name' value='$lname' />";
echo    "<input type='hidden' name='title' value='Let us do this' />";
echo "    <input type='hidden' name='description' value='Paying with Confidence with cha' />";
 echo  " <input type='hidden' name='logo' value='https://yourcompany.com/logo.png' />";
 echo   "<input type='hidden' name='callback_url' value='https://example.com/callbackurl' />";
echo  "<input type='hidden' name='return_url' value='https://example.com/returnurl' />";
echo   " <input type='hidden' name='meta[title]' value='test' />";
echo  "<button type='submit'>Pay Now</button>";

echo"</form>";
?>
</body>
</html>