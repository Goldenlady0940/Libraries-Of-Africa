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
        if(isset( $_SESSION['COUNTRY_NAME_NEW'] )){
            echo "<h1>". $_SESSION['COUNTRY_NAME_NEW'] . "</h1>";
          }  
          if(isset( $_SESSION['LIBRARY_NAME'])){
            echo "<h1>". $_SESSION['LIBRARY_NAME']. "</h1>";
          } ?>
            <label for="name">Name</label>
            <input type="text" name=name><br><br>

            <label for="author">Author</label>
            <input type="text" name=author><br><br>

            <label for="price">Price</label>
            <input type="text" name="price"><br><br>

            <label for="pdf">Upload pdf</label>
            <input type="file" name="files[]" multiple>
            <input type="submit" value="Upload Files">
</form>

<?php
 
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

?>

    </section>

    <footer class="foot">
        <include src="footer.php"></include>
    </footer>
</body>
</html>