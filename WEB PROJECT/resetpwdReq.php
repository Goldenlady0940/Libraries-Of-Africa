<?php
if(isset($_POST["resetbtn"])){
    $select=$_POST["select"];
    $validator=$_POST["validator"];
    $password=$_POST["pwd"];
    $repwd=$_POST["cfmpwd"];

    if(empty($password)|| empty($repwd)){
        header("Location:reset.php?newpwd=empty");
        exit();
    }
    else if($password!=$repwd){
        header("Location:reset.php?newpwd=password mismatch");
        exit();
    }

    $curDate=date("U");

    require "connect.php";
    $sql="SELECT * FROM pwdReset WHERE pwdResetSelect=? AND pwdResetExp>=?";
    $stmt= mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "There is an error!!!";
        exit();
    }
    else{
        mysqli_stmt_bind_param(stmt,"s",$select);  
        mysqli_stmt_execute($stmt);

        $result=mysqli_stmt_get_result($stmt);
        if(!$row=mysqli_fetch_assoc()){
            echo "You need to re-submit your reset request.";
            exit();
        }
        else{
            $tokenBin=hex2bin($validator);
            $tokenCheck=password_verify($tokenBin,$row["pwdResetToken"]);

            if($tokenCheck===false){
                echo "You need to re-submit your reset request.";
                exit();
            }
            else if($tokenCheck===true){
                $tokenEmail=$row['pwdResetEmail'];
                $sql="SELECT * FROM useraccount WHERE EMAIL=?;";
                $stmt= mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "There is an error!!!";
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        if(!$row=mysqli_fetch_assoc()){
            echo "There is an error.";
            exit();
        }
        else{
            $sql="UPDATE useraccount SET PASS_WORD=? WHERE EMAIL=?";
            $stmt= mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "There is an error!!!";
        exit();
    }
    else{
        $newpwdHash=password_hash($password,PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt,"ss",$newpwdHash,$tokenEmail);
        mysqli_stmt_execute($stmt);

        $sql="DELETE FROM pwdReset WHERE pwdResetEmail=?";
        $stmt= mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "There is an error!!!";
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
        mysqli_stmt_execute($stmt);
        header("Location:loginpage.php?newpwd=passwordupdated");
    }


    }
        }
    }

            }
        }
    }







}
else{
    header("Location:loginpage.php");
}