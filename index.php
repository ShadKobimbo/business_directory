<?php
//starting a session
session_start();

include 'header.php';

//connecting to database
include 'dbconnect.php';

//result variable
$output=NULL;
if(isset($_POST['service'], $_POST['location'])){
    $service=$_POST['service'];
    $location=$_POST['location'];
}

if(isset($service, $location)){
//quering the database
$messages=$conn->query("SELECT * FROM providers WHERE service='$service' AND location='$location'");
}
?>
    <!-- ***** Welcome Area Start ***** -->
    <section class="dorne-welcome-area bg-img bg-overlay" style="background-image: url(img/bg-img/hero-1.jpg);">
        <div clss="container h-100" syle="margin-top:-240px;">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-10">
                    <!-- Hero Search Form -->
                    <div class="hero-search-form" style="margin-top:120px;">
                        <!-- Tabs Content -->
                        <div class="hero-content" align="center" >
                        <h2>Welcome</h2>
                    </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-places" role="tabpanel" aria-labelledby="nav-places-tab">
                                <h6>What are you looking for?</h6>
                                <form action="index.php" method="POST" align="center">                                 
                                    <select class="custom-select" name="service">
                                        <option selected>Services</option>
                                        <option value="plumber">Plumbing</option>
                                        <option value="electrical">Electrical</option>
                                        <option value="laundry">Laundry</option>
                                    </select>
                                    <select class="custom-select" name="location">
                                        <option selected>Your Location</option>
                                        <option value="langata">Langata</option>
                                        <option value="kinoo">Kinoo</option>
                                        <option value="ruiru">Ruiru</option>
                                    </select>
                                    <select class="custom-select">
                                        <option selected>Price Range</option>
                                        <option value="1">$100 - $499</option>
                                        <option value="2">$500 - $999</option>
                                        <option value="3">$1000 - $4999</option>
                                    </select>
                                    <button type="submit" class="btn dorne-btn"><i class="fa fa-search pr-2" aria-hidden="true"></i> Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Social Btn 
        <div class="hero-social-btn">
            <div class="social-title d-flex align-items-center">
                <h6>Follow us on Social Media</h6>
                <span></span>
            </div>
            <div class="social-btns">
                <a href="#"><i class="fa fa-linkedin" aria-haspopup="true"></i></a>
                <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-haspopup="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-haspopup="true"></i></a>
            </div>
        </div>
    </section>-->
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Listing Area Start ***** -->
    <section class="dorne-single-listing-area section-padding-1000">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Listing Content -->
                <div class="col-12 col-lg-8">
                    <div class="single-listing-content">
<?php
     //fetching data from the database
     if($messages->num_rows != 0){
        while($rows=$messages->fetch_assoc())
            {
                $firstname= $rows['firstname'];
                $secondname= $rows['secondname'];
                $email = $rows['email'];
                          
        echo '<div class="listing-menu-area mt-100" id="menu">';
        echo '<a href="login.php"><h4 style="color:white;margin-top:-45px;">Search Results</h4></h6></a>';
        echo  '<!-- Single Listing Menu -->';
        echo  '<div style="margin-top:-45px;"class="single-listing-menu d-flex justify-content-between">';
        echo  '<!-- Listing Menu Title -->' ;
        echo '<div class="listing-menu-title">';             
                echo '<p>';
                    echo "Name : " . $rows['firstname'] . "&nbsp" . $rows['secondname'];
                echo '</p>';
                echo '<p>';
                    //echo "Email Address : " . $rows['email'];
                echo '</p>';
                echo '<p>';
                    //echo "Phone Number : " . $rows['number'];
                echo '</p>';
                echo '<p>';
                    echo "Occupation : " . $rows['service'];
                echo '</p>';
                echo '<p>';
                    echo "Area : " . $rows['location'];
                echo '</p>';
            echo   '</div>';
        echo   '</div>';
                        
            }
    }else
    {
        $output =  "No Result";
        echo '<p style="color:white;">NO data CAn be found in the Database</p>';
    }
?>
                            </div>
                            
                            </div>
                            <a href="#" class="btn dorne-btn mt-50">+ See The Menu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Listing Area End ***** -->

<?php include 'footer.php';?>