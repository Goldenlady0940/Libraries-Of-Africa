<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Book</title>
    <script src="include.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
     integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
     
</head>
<body>
    <div class="wrapper">
        <include src="header.php"></include>
    </div>
    <section class="add-book">
       
        <form action="" method="POST" enctype="multipart/form-data">
        <?php
      session_start();
      require"connect.php";
        // if(isset( $_SESSION['COUNTRY_NAME_NEW'] )){
        //     echo "<h1>". $_SESSION['COUNTRY_NAME_NEW'] . "</h1>";
        //   }  
          if(isset( $_SESSION['LIB_NAME'])){
            echo "<h1>". $_SESSION['LIB_NAME']. "</h1>";
            echo "<h1>". $_SESSION['LIBID']. "</h1>";
            
          } 
            echo"<label for='name'>Name</label>";
           echo" <input type='text' name=name><br><br>";

           echo " <label for='author'>Author</label>";
           echo" <input type='text' name='author'><br><br>";

           echo" <label for='price'>Price</label>";
           echo" <input type='text' name='price'><br><br>";
           echo" <label for='gener'>Book Genre</label>";
            
            $sql = "SELECT * FROM book_genres";
            $result = mysqli_query($con, $sql);
            echo "<select name='bookgenres'>";
            echo "<option value=''>Book Genre</option>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['GENRE_NAME'] . "'>" . $row['GENRE_NAME'] . "</option>";
            }
            echo "</select>";
            
            
            echo"<label for='pdf'>Upload pdf</label>";
           echo" <input type='file' name='files[]'' multiple>";
           echo" <input type='submit' value='Upload Files' name='submit'>";
      echo"</form>";
      
     if(isset($_FILES['files'])){
       $errors = array();
       $uploadedFiles = array();
       $extension = array("jpeg","jpg","png","pdf");
       $bytes = 1024;
       $KB = 2048;
       $totalBytes = $bytes * $KB;
       $UploadFolder = "uploads";
       
       foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
         $file_name = $_FILES['files']['name'][$key];
         $file_tmp = $_FILES['files']['tmp_name'][$key];
         $ext = pathinfo($file_name,PATHINFO_EXTENSION);
     
         if(in_array($ext,$extension)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
         }
     
         if($_FILES['files']['size'][$key] > $totalBytes){
           $errors[]="File size must be less than 2MB";
         }
     
         if(empty($errors)==true){
           $target_path = $UploadFolder.'/'.$file_name;
           if(move_uploaded_file($file_tmp,$target_path)){
             $uploadedFiles[] = $target_path;
             //insert
             if(isset($_POST['submit'])){
              $selectedOptions = $_POST['bookgenres'];
              if(!empty($selectedOptions)) {
                $_SESSION ['GENRE_NAME'] = $_POST['bookgenres'];
                if(isset($_SESSION ['GENRE_NAME'])){
                  $sql2="SELECT * FROM book_genres WHERE GENRE_NAME = '{$_SESSION ['GENRE_NAME']}'";
                  $result2 = mysqli_query($con, $sql2);
                  if($result2){
                      while($row = mysqli_fetch_array($result2)){
                          $_SESSION['GENREID']=$row['GENRE_ID'];
                      }
                  }
                  else{
                    print_r($errors);
                  }
                 $name = $_POST['name'];
                 $author = $_POST['author'];
                 $price = $_POST['price'];
                 $genre =  $_SESSION['GENREID'] ;
                 $libid = $_SESSION['LIBID'];
                 $sql= "INSERT INTO `new_book` (`BOOK_FKID`, `BOOK_NAME`, `AUTHOR`, `PRICE`, `PDF`, `COVER`, `BOOK_GENRE_FKID`) 
                 VALUES ( '$libid', ' $name', '$author', ' $price', '$file_name', '$file_name', '$genre'); ";
                 $result=mysqli_query($con,$sql);
                 if($result){
                     echo"done";
                 }
                 else{
                     print_r($errors);
                 }
             }
           }
           else{
             $errors[] = "Error uploading ".$file_name;
           }
         }
       }
     
       if(empty($errors)){
         echo "Files uploaded successfully:";
         // echo "<br>";
         // foreach($uploadedFiles as $fileName){
         //   echo $fileName;
         //   echo "<br>";
        // }
       }
       else{
         print_r($errors);
       }
     }
// if(isset($_POST['submit'])){
// $selectedOptions = $_POST['bookgenres'];
// if(!empty($selectedOptions)) {
//   $_SESSION ['GENRE_NAME'] = $_POST['bookgenres'];
//   if(isset($_SESSION ['GENRE_NAME'])){
//     $sql2="SELECT * FROM book_genres WHERE GENRE_NAME = '{$_SESSION ['GENRE_NAME']}'";
//     $result2 = mysqli_query($con, $sql2);
//     if($result2){
//         while($row = mysqli_fetch_array($result2)){
//             $_SESSION['GENREID']=$row['GENRE_ID'];
//         }
//     }
// }

   // $_SESSION['BOOK_GENRE'] = $_POST['book_genre'];
// } else {
//    echo"invalid";
// }
// if(isset($_POST['submit'])){
//   $selectedOption = $_POST['country_dropdown'];
//   if(!empty($selectedOption)) {
//       $_SESSION['COUNTRY_NAME'] = $_POST['country_dropdown'];
//       header("Location:loginPage.php");                       
//   } else {
//       header("Location:newBook.php");
//   }
       }
}?>
    </section>

    <footer class="foot">
        <include src="footer.php"></include>
    </footer>
</body>
</html>