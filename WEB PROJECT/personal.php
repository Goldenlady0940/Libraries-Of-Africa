<?php
      //session_start();
    //   require"connect.php";
      
    //   $id = $_REQUEST['id'];
    
    //   $sql = "SELECT * FROM useraccount WHERE ID ='$id'";
    //   $result = mysqli_query($con, $sql);
      
    //   if(mysqli_num_rows($result) > 0){
    //     while($row = mysqli_fetch_array($result)){
    //         echo 'fname' . $row['FIRST_NAME'];

    //     }
    //   }
    //   if(isset($_POST['edit'])){
   ?>   
        <script type="text/javascript">
            const btnedit=document.body.querySelector('#edit');
            const fname=document.querySelector('#fname');
            btnedit.addEventListener("click", function(){
                fname.disabled = true;
            });
    </script>
    