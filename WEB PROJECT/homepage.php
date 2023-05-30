<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
        <h1>Which Library<br> Are You <br>Looking For?</h1>
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
           <div class="desc">
            <h2>An Outstanding website for all people around Africa</h2>
            <p>  This website is dependent on a specific locale which is Africa. Information about current libraries in Africa will be provided. It's useful for everyone who wants to level up their knowledge, enjoys reading, increase their creativity, change their perspectives, and more. The website intends to solve accessibility of information about libraries specifically for self-taught people who want to discover more and could get the relevant information on where to get different resources. 
                In many of the communities we serve, young people have little to no access to reading materials beyond textbooks (when provided). So our main goal is to provide accurate, fast access to information to our people. At this moment our library website won't be providing worldwide its Africa Limited Edition.
            </p>
            </div>
        </section>
        <!----------------------------------- offers--- -->
        <section class="offers">
       
    <div class="wrapper">
    <h1>What We Do?</h1>
        <div class="row">
            <div class="col1">
                <div class="offer">
                    <div class="service">
                        <div class="serviceLogo"><img src="bookic.png" alt=""></div>
                        <h4>Plenty of Books</h4>
                        <p>Over half a million in shelf books.
                        </p>
                    </div></div></div>
            <div class="col2">
            <div class="offer">
                    <div class="service">
                        <div class="serviceLogo"><img src="shipic.png" alt=""></div>
                        <h4>Quick Shipping</h4>
                        <p>We offer fast shipping all over Africa with affordable price.</p>
                    </div></div></div>
            <div class="col3">
            <div class="offer">
                    <div class="service">
                        <div class="serviceLogo"><img src="mapic.png" alt=""></div>
                        <h4>Accurate Mapping</h4>
                        <p>An overview of all libraries 
                        available in Africa with an accurate history, location and area, is available.</p>
                    </div></div> </div>

            <div class="col4">
            <div class="offer">
                    <div class="service">
                        <div class="serviceLogo"><img src="pdfic.png" alt=""></div>
                        <h4>Pdf Books</h4>
                        <p>Books in different electronic formats that you can read everywhere and anytime.</p>
                    </div></div> </div>
            <div class="col5">  
                 <div class="offer">
                    <div class="service">
                        <div class="serviceLogo"><img src="pdf2ic.png" alt=""></div>
                        <h4>Library Register</h4>
                        <p>Over half a million in shelf.<br> books
                           </p>
                    </div> </div></div> </div>
    </div>
           
<!----------------------------------- offers------------>
        </section>  
        <section class="clients">
            <h2 style="margin-left: 50px; margin-top: 70px;">What our Clients say:</h2>
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

<!---------------------------------- pricing-------------------->

        <section class="price">
        <div class="pricing">
        <div class="detail">
            <h2>Price to suit your plan</h2>
        </div>
        <div class="grid">
            <div class="box free">
                <div class="title" style="font-size:large; color: #7b6a39;">Free</div>
                <div class="price">
                    <b>$0</b><br>
            </div>
            <div class="features">
                <div>Checking out library locations</div>
                <div>lorem2</div>
                <div>lorem3</div>
                <div>lorem4</div>
            </div>
            <div class="button">
                <button>Free</button>
            </div>
            </div>
       
        <div class="box ind">
                <div class="title">Individual</div>
            <div class="price">
                    <b>$12</b><span>per month</span>
            </div>
            <div class="features">
                <div>Shipping</div>
                <div>Get PDFs</div>
                <div>Borrow</div>
                <div>lorem4</div>
            </div>
            <div class="button">
                <button onclick="location.href='premiumpage.php'">Get Plan</button>
            </div>
            
        </div>
        <div class="box bus">
                <div class="title" style="font-size:large; color: #7b6a39;">Business</div>
                <div class="price">
                    <b>$20</b><span>per month</span>
                </div>
            <div class="features">
                <div>Register Your Library</div>
                <div>Add your Books</div>
                <div>lorem3</div>
                <div>lorem4</div>
            </div>
            <div class="button">
                <button onclick="location.href='newLibrary.php'">Get Plan</button>
            </div>
         
        </div>
        </div>
         </div>
        </section>
        <!----------------------------------- pricing-------------------->

    </div>
        <footer class="foot" id="contact">
            <include src="footer.php"></include>
        </footer>
</body>
</html>
<script>
     function toggleMenu(){
        const menuToggle=document.querySelector('.toggle');
        const navigation=document.querySelector('#menuList');
        menuToggle.classList.toggle('active');
       navigation.classList.toggle('active');
    //    e.preventDefault();

       }
    $(document).ready(function(){
        $('#premium').on('click', function(){
            premiumpage.php;
        })
    })
</script>