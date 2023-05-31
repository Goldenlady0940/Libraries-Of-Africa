<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>mainPage</title>
    <style>
        .wrapper{
            display: flex;
        }
    
        .finish
        {
            background-color: rgb(253, 212, 135);
            height:40px;
            width:100px;
            border-radius: 20px;

        }
        .pdf{
            background-color: #d24041;
            color: white;
            font-size: 30px;
        }
        table{
            width: 200px;
            height: 100px;
        }
        /* button{
            background-color: bisque;
           margin-left: 150px;
        } */
        #shelf{
            background-color: bisque;
           margin-left: 7rem;
           width: 10rem;
           height: 2rem;
           
        }
    </style>
    <link rel="stylesheet" href="index.cs">
</head>
<body>
<div>
   
     <button type= 'submit' name='shelf' id="shelf" onclick="location.href='MyshelfPage.php'">Myshelf</button>
    <?php
     session_start();
     require"connect.php";
     
    //  $sql = "SELECT * FROM new_book JOIN new_library ON new_book.BOOK_FKID= new_library.LIB_ID 
    //  JOIN book_genres ON new_book.BOOK_GENRE_FKID=book_genres.GENRE_ID 
    //   GROUP BY book_genres.GENRE_NAME;";
   
       // header('Location: homepage.php');
     
     if(isset( $_SESSION['COUNTRY_NAME'])){
        echo "<h1>". $_SESSION['COUNTRY_NAME']. "</h1>";
      }  
      $sql2="SELECT * FROM new_library JOIN country on new_library.colib_ID=country.COUNTRY_ID 
                WHERE country.COUNTRY_NAME = '{$_SESSION['COUNTRY_NAME']}'";
            $result2 = mysqli_query($con, $sql2);
                if(mysqli_num_rows($result2) > 0){
                    while($row = mysqli_fetch_assoc($result2)){
                        echo "<ul>";
                        echo "<li><a href='#one'>" . $row["NAME"] . "</a></li>";
                        $_SESSION['LIBRARY_NAME']= $row["NAME"];//gives the last lib name but i wanted the one thats clicked
                        echo "</ul>";
                    }
                }
        $sql = "SELECT * FROM new_book
                JOIN new_library ON new_book.BOOK_FKID = new_library.LIB_ID
                JOIN book_genres ON new_book.BOOK_GENRE_FKID = book_genres.GENRE_ID
                WHERE book_genres.GENRE_NAME IN ('SCIENTIFIC BOOKS');";
                
                      
        $result = mysqli_query($con, $sql);
        $sql3 = "SELECT * FROM new_book
                JOIN new_library ON new_book.BOOK_FKID = new_library.LIB_ID
                JOIN book_genres ON new_book.BOOK_GENRE_FKID = book_genres.GENRE_ID
                WHERE book_genres.GENRE_NAME IN ('BIOGRAPHY BOOKS')";
                      
        $result3 = mysqli_query($con, $sql3);
        $sql4 = "SELECT * FROM new_book
                JOIN new_library ON new_book.BOOK_FKID = new_library.LIB_ID
                JOIN book_genres ON new_book.BOOK_GENRE_FKID = book_genres.GENRE_ID
                WHERE book_genres.GENRE_NAME IN ('KIDS BOOKS')";
                      
        $result4 = mysqli_query($con, $sql4);

      if (!$result || !$result2 || !$result3|| !$result4) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    } 
    else{
        
        
            echo "<h2> SCIENTIFIC BOOKS</h2>";
        echo "<div class='wrapper'>";    
            echo" <a name='one'></a>";
           
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['BOOKID']= $row['BOOK_ID'];
                echo "<form method='post'>";
            echo "<table border='1px'>";

            echo "<tr height='250px' width='300px'>";
            echo "<td>". $row["COVER"] . "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td><button name='dwn_pdf'>pdf</button></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>". $row["PRICE"] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>". $row["BOOK_NAME"] . "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td><a type='submit' href ='RequestPage.php?uid=".$row['BOOK_ID']."'name='book_req1'>Request</a></td>";
            echo "</tr>";

            echo "</table>"; 
            
        echo "</form>";
           }
        echo "</div>";
                
        if(isset($_POST['dwn_pdf'])){
       


          
        $sql5 = "SELECT * FROM new_book WHERE BOOK_ID = {$_SESSION['BOOKID']}";
        $result5 = mysqli_query($con, $sql5);
        $row = mysqli_fetch_assoc($result5);
        $pdf_contents = $row['PDF'];

        // Set the appropriate headers for a PDF file
        header('Content-type: application/pdf');//describe nature and formate of the file 
        header("Content-Disposition: attachment; filename=\"$pdf_contents\"");// is it displayed inline or downloaded as attachment?


        // Output the PDF contents to the browser
        echo $pdf_contents;


        }
    else{

      echo"hello";
        
    }

          echo "<h2> BIOGRAPHY BOOKS</h2>";
        echo "<div class='wrapper'>";  
            while ($row = mysqli_fetch_assoc($result3)) {
                echo "<table border='1px'>";

                echo "<tr height='250px' width='300px'>";
                echo "<td>". $row["COVER"] . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td><button name='dwn_pdf'>pdf</button></td>";
                echo "</tr>";
    
                echo "<tr>";
                echo "<td>". $row["PRICE"] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>". $row["BOOK_NAME"] . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td><a type='submit' href ='RequestPage.php?uid=".$row['BOOK_ID']."'name='book_req1'>Request</a></td>";
                echo "</tr>";

                echo "</table>"; 
            }
        echo "</div>";
            echo "<h2> KIDS BOOKS</h2>";

        echo "<div class='wrapper'>";  

            while ($row = mysqli_fetch_assoc($result4)) {
                echo "<table border='1px'>";

                echo "<tr height='250px' width='300px'>";
                echo "<td>". $row["COVER"] . "</td>";
                echo "</tr>";

                echo "<tr>";
            echo "<td><button name='dwn_pdf'>pdf</button></td>";
            echo "</tr>";


                echo "<tr>";
                echo "<td>". $row["PRICE"] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>". $row["BOOK_NAME"] . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td><a type='submit' href ='RequestPage.php?uid=".$row['BOOK_ID']."'name='book_req1'>Request</a></td>";
                echo "</tr>";

                echo "</table>"; 
            }
        echo "</div>";
   
        }
             
    ?>
</div>
</body>
</html>