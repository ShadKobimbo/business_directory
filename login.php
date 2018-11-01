<?php 

session_start();


//connecting to database
include 'dbconnect.php';

//insert the header
include 'header.php'; 

//declaring variables
if(isset($_POST['email'], $_POST['passwrd'])){
    $email=$_POST['email'];
    $passwrd=$_POST['passwrd'];
   
}
if(isset($email, $passwrd)){ 
    //querying database
    $sql="SELECT * FROM users WHERE email='$email' AND passwrd='$passwrd'";
    $result=$conn->query($sql);

    //actions to be conducted based on results
if (!$row=mysqli_fetch_assoc($result)){
    echo "Wrong Username or Password";
}else{
   
	$_SESSION['id']=$row['id'];
	$_SESSION['classification']=$row['classification'];
	
	if($row['classification']=="admin"){
		//redirecting to the index page
		header('Location: admin.php');
	}else{
		//redirecting to the index page
		header('Location: index.php');
	}
	

	
    //echo "it works!!!!";
    }
}
	
?>

    <!-- ***** Welcome Area Start ***** -->
    <section class="dorne-welcome-area bg-img bg-overlay" style="background-image: url(img/bg-img/hero-1.jpg);">
        <div class="container h-100" >
            <div class="row h-100 align-items-center justify-content-center"  >
                <div class="col-12 col-md-10" >
                     <!-- Hero Search Form -->
                    <div class="hero-search-form" style="margin-top:-150px;">
                        <!-- Tabs Content -->
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-places" role="tabpanel" aria-labelledby="nav-places-tab">
                                <h3 style="color:white;" align="center">Login Here</h3>
                                <form action="login.php" method="POST" style="margin-bottom:10px;">
                                    <input type="search" class="custom-select" placeholder="Email Address" name="email" required="required"><br>
                                    <input type="password" class="custom-select" placeholder="Password" name="passwrd" required="required"><br>
                                    <button type="submit" class="btn dorne-btn" name="submit"></i> Login</button>
                                </form>
                                <a href="register.php"><h6>Register Here</h6></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
    <!-- ****** Footer Area Start ****** -->
    <footer class="dorne-footer-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-md-flex align-items-center justify-content-between">
                    <div class="footer-text">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="footer-social-btns">
                        <a href="#"><i class="fa fa-linkedin" aria-haspopup="true"></i></a>
                        <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-haspopup="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-haspopup="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ****** Footer Area End ****** -->

    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap-4 js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/others/plugins.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>
</body>

</html>

<?php 

// Set session variables
if(isset($_SESSION['id'])) {
	echo $_SESSION['id'];
}

?>