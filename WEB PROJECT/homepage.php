<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="loginpage.css">
    <link rel="stylesheet" href="homepages.css">
    <script src="include.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
     integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="wrapper">
        <include src="header.php"></include>
        <section class="main">
            <h1>Which Library are you looking for</h1>
            <p>Explore the world's Knowledge</p>               
            <button id="premium"   onclick="location.href='premiumpage.php'">Go Premium</button>
          
            <!-- populates  drop down from the data coz we dont accept additional country-->
                <?php
                session_start();
                require"connect.php";
                $sql = "SELECT * FROM country";
               // $country_name = $_POST['COUNTRY_NAME']
                $result = mysqli_query($con, $sql);

                echo "<form method='post' action=''>";
                echo "<select name='country_dropdown'>";
                echo "<option value=''>Search By Country</option>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['COUNTRY_NAME'] . "'>" . $row['COUNTRY_NAME'] . "</option>";
                }
                echo "</select>";
                echo " <button id='search'type='submit' name='submit'><img id='img1' src='images/search.jpg'alt=''></button>";
                echo "</form>";

                if(isset($_POST['submit'])){
                    $selectedOption = $_POST['country_dropdown'];
                    if(!empty($selectedOption)) {
                        $_SESSION['COUNTRY_NAME'] = $_POST['country_dropdown'];
                        header("Location:loginPage.php");                       
                    } else {
                        header("Location:newBook.php");
                    }
                }
                
                // $sql = "SELECT COUNTRY_NAME FROM country";
                // $result = mysqli_query($con, $sql);

                // echo "<select name='country_dropdown'>";
                // echo  "<option value=''>Search By Country</option>";
                // while ($row = mysqli_fetch_assoc($result)) {
                //     echo "<option value='" . $row['COUNTRY_NAME'] . "'>" . $row['COUNTRY_NAME'] . "</option>";
                // }
                //   echo "</select>";
                // // mysqli_close($con);
                // if(isset($_POST['country_dropdown'])){
                //     header("Location:MainPage.php");
                //     // $selectedOption = $_POST['country_dropdown'];
                //     // echo "the selected opyion is:" .$selectedOption;
                // }

                // else{
                //     header("Location:newBook.php");
                // }
                ?>
            <img id="img2" src="pic.png" alt="">
        </section>
        <section class="description" id="blog">
            <h2>An Outstanding website for all people around Africa</h2>
            <p>  This website is dependent on a specific locale which is Africa. Information about current libraries in Africa will be provided. It's useful for everyone who wants to level up their knowledge, enjoys reading, increase their creativity, change their perspectives, and more. The website intends to solve accessibility of information about libraries specifically for self-taught people who want to discover more and could get the relevant information on where to get different resources. 
                In many of the communities we serve, young people have little to no access to reading materials beyond textbooks (when provided). So our main goal is to provide accurate, fast access to information to our people. At this moment our library website won't be providing worldwide its Africa Limited Edition.
            </p>
        </section>
        <section class="offers">
            <h3 style="margin-left: 50px; margin-top: 70px;">What We Offer:</h3>
            <div class="books">
                <img src="offerbooks.png" style="border-radius:50px" alt="">
                <h3>Plenty of Books</h3>
                <p>Over half a million in shelf books </p>
            </div>
            <div class="ship">
                <img src="offershipping.png" style="border-radius:50px" alt="">
                <h3>Quick Shipping</h3>
                <p>We offer fast shipping all over<br> Africa with affordable price.</p>
            </div>
            <div class="map">
                <img src="offermap.png" style="border-radius:50px" alt="">
                <h3>Accurate Mapping</h3>
                <p>An overview of all libraries<br> available in Africa with an <br>accurate history, location and area,<br> is available.</p>
            </div>
            <div class="pdf">
                <img src="offerpdfs.png" style="border-radius:50px"alt="">
                <h3>Pdf books</h3>
                <p>Books in different electronic <br>formats that you can read <br>everywhere and anytime.</p>
            </div>
            <div class="library">
                <h3>Library Register</h3>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
        </section>  
        <section class="clients">
            <h3 style="margin-left: 50px; margin-top: 70px;">What our Clients say:</h3>
            <div class="one">
                <p>"Works like a charm. I love the ease of the site and would highly recommend purchasing their monthly program to get latest book updates."</p>
                <p>Deena Levies,<br>Mission Bay</p>
            </div>
            <div class="two">
                <p>“What I love about ALA is their commitment to speed of delivery and also affordability of their e-books .”</p>
                <p>Tom Smithenson,<br>Parkmerced</p>
            </div>
            <div class="three">
                <p>"I would highly recommend Libraries of Africa as they are really trying to unite the world especially Africans by dedicating their time to help people explore different libraries."  </p>
                <p>Tilly Green,<br>Hayes Valley</p>
            </div>
        </section>
        <section class="price">
                <p style="font-size: 80px;">Explore Our <br>Pricing Options</p>
            
                <div class="basic">
                    <h1>Basic</h1>
                    <ul>
                        <li>Checking out library locations</li>
                    </ul>
                    <h3>FREE</h3>
                </div>
                <div class="premium">
                    <h1>Premium</h1>
                    <ul>
                        <li>Checking out library locations</li>
                        <li>Borrow</li>
                        <li>Get pdfs</li>
                        <li>shipping</li>
                    </ul>
                    <h3>Subscribe To $11/month<h3>
                </div>
            
        </section>
    </div>
        <footer class="foot" id="contact">
            <include src="footer.php"></include>
        </footer>
</body>
</html>
<script>
    $(document).ready(function(){
        $('#premium').on('click', function(){
            premiumpage.php;
        })
    })
</script>