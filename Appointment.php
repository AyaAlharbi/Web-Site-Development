<?php
include_once 'session.php';

if (!isset($_SESSION['Id']) || ($_SESSION['Id'] == '')) { 
} else {
    $Id = $_SESSION['Id'];
    $query = "select UserName from users where UserId=$Id";
    $row = $db->SelectQuery($query);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>WORKSHOP</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />

    <!-- Font-->
    <link rel="stylesheet" href="css/font-awesome.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <style>
        .worshop {

            height: 300px;
        }
    </style>
</head>

<body>
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo"><img src="img/logo3.jpg" alt="" class="img-fluid" /></a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li>
                        <a class="nav-link scrollto" href="index.php#hero">Home</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="index.php#cources">Cources</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="aboutus.php">About</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="index.php#services">Services</a>
                    </li>
                    <li><a class="nav-link scrollto" href="contactus.php">Contact</a></li>
                    <li><a class="nav-link scrollto active" href="#">Appointment</a></li>

                    <?php

                    if (!isset($_SESSION['Id']) || ($_SESSION['Id'] == '')) {
                        echo "<li><a class=\"nav-link scrollto\" href=\"login.php\">Login</a><li>";
                    } else {
                        echo "<a class=\"nav-link scrollto\" href=\"logout.php\">Logout  " . $row['UserName'] . " </a><li>";
                    }
                    ?>
                </ul>
                <i class="icon icon-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>



    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-5">Workshop</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4 shadow">
                        <img src="img/appointment.jpg" class="card-img-top worshop" alt="Workshop 1">
                        <div class="card-body">
                            <h5 class="card-title">Chatting</h5>
                            <p class="card-text">Users can communicate with experts in the specified courses on our website, inquire and get their opinions.</p>
                            <?php if (!isset($_SESSION['Id']) || ($_SESSION['Id'] == ''))
                                echo '<a href="login.php" class="btn btn-primary">submit</a>';
                            else
                                echo '<a href="chatApp.php" class="btn btn-primary">submit</a>';
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4 shadow">
                        <img src="img/chat.webp" class="card-img-top worshop" alt="Workshop 2">
                        <div class="card-body">
                            <h5 class="card-title">WorkShop</h5>
                            <p class="card-text">Sending a message to the experts to teach the student one of the subjects in programming languages.</p>
                            <?php if (!isset($_SESSION['Id']) || ($_SESSION['Id'] == ''))
                                echo '<a href="login.php" class="btn btn-primary">submit</a>';
                            else
                                echo '<a href="workshop.php" class="btn btn-primary">submit</a>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>WSD</h3>
                        <p>
                            A108 KSA Street <br />
                            KSA, NY 535022<br />
                            Yanbu<br /><br />
                            <strong>Phone:</strong> +966 555-999-667<br />
                            <strong>Email:</strong> info@example.com<br />
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#hero">Home</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#cources">Courses</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#services">About</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Services</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Contact</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#"> Appointment</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#"> Meeting</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Learn programming</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Exam</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Workshop</a>
                            </li>

                        </ul>
                    </div>


                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>
                        <p>Contact us per suggesta media socialia</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="icon-twitter"></i></a>
                            <a href="#" class="facebook"><i class="icon-facebook"></i></a>
                            <a href="#" class="instagram"><i class="icon-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="icon-skype"></i></a>
                            <a href="#" class="linkedin"><i class="icon-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>WSD</span></strong>. All Rights Reserved
            </div>
            <div class="credits">Designed by <a href="">WSD Team </a></div>
        </div>
    </footer>
    <!-- End Footer -->
    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="icon-arrow-up"></i></a>
    <!-- JavaScript Libraries -->

    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- Template Main JS File -->
    <script src="js/main.js"></script>
</body>

</html>