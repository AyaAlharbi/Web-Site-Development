<?php
include_once 'session.php';
$cources = 0;
$quiz = 0;
$courcesName = '';
if (!isset($_SESSION['Id']) || ($_SESSION['Id'] == '')) { 
} else {
    $Id = $_SESSION['Id'];
    $query = "select UserName from users where UserId=$Id";
    $row = $db->SelectQuery($query);
}
if (isset($_GET['cources'])) {
    $cources = (int)$_GET['cources'];
    $courcesName = $_GET['courcesName'];
}
if (isset($_GET['quiz'])) {
    $quiz = (int)$_GET['quiz'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quiz <?php echo $courcesName; ?></title>
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
                        <a class="nav-link scrollto active" href="#">About</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="index.php#services">Services</a>
                    </li>
                    <li><a class="nav-link scrollto" href="contactus.php">Contact</a></li>
                    <li><a class="nav-link scrollto" href="Appointment.php">Appointment</a></li>

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

    <section>
        <?php
        if ($cources > 0) { ?>
            <div class="container py-5">
                <div class="row py-5">
                    <!-- Left section -->
                    <div class="col-md-4 left-section">
                        <ul>
                            <?php
                            $query = "select * from quizs where courcesId=$cources and state=1";
                            $result = $db->getData($query);
                            $i = (int)0;
                            $idcurr = (int)0;
                            $namecurr = '';

                            while ($rows = mysqli_fetch_array($result)) {
                                $id = (int) $rows['id'];
                                $name = $rows['name'];
                                if ($quiz == 0) {
                                    if ($i == 0) {
                                        echo "<li class=\"active\"><a href=\"quizs.php?cources=$cources&courcesName=$courcesName&quiz=$id\"> $name</a></li>";
                                        $idcurr = $id;
                                        $namecurr = $name;
                                    } else
                                        echo "<li><a href=\"quizs.php?cources=$cources&courcesName=$courcesName&quiz=$id\"> $name</a></li>";
                                } else {
                                    if ($id == $quiz) {
                                        echo "<li class=\"active\"><a href=\"quizs.php?cources=$cources&courcesName=$courcesName&quiz=$id\"> $name</a></li>";
                                        $idcurr = $id;
                                        $namecurr = $name;
                                    } else
                                        echo "<li><a href=\"quizs.php?cources=$cources&courcesName=$courcesName&quiz=$id\"> $name</a></li>";
                                }
                                $i = $i + 1;
                            }
                            if ($i <= 0) {
                                echo "<li class=\"active\">Not Found Quizs</li>";
                            }
                            ?>

                        </ul>
                    </div>
                    <!-- Right section -->
                    <div class="col-md-8 right-section">
                        <?php
                        $Namequizs = $courcesName;
                        if ($idcurr > 0)
                            $Namequizs = $Namequizs . ' -' . $namecurr;
                        echo "<h2> $Namequizs </h2>";

                        $query = "select * from quizs where courcesId=$cources and id=$idcurr and state=1";
                        $result = $db->getData($query);
                        while ($rows = mysqli_fetch_array($result)) {
                        ?>
                            <h4><?php echo $rows['question']; ?></h4>
                            <div class="cardquiz">
                                <div class="content">
                                    <?php
                                    $query = "select * from quizs_details where courcesId=$cources and qid=$idcurr";
                                    $resultdtl = $db->getData($query);
                                    while ($rowsdtl = mysqli_fetch_array($resultdtl)) {
                                    ?>

                                        <?php if ((int)$rowsdtl['id'] == 1) { ?>
                                            <input type="radio" name="rd" id="one" value="<?php echo $rowsdtl['value']; ?>">
                                            <label for="one" class="box first">
                                                <div class="plan">
                                                    <span class="circle"></span>
                                                    <span class="yearly"><?php echo $rowsdtl['answer']; ?></span>
                                                </div>
                                            </label>
                                        <?php } ?>
                                        <?php if ((int)$rowsdtl['id'] == 2) { ?>
                                            <input type="radio" name="rd" id="two" value="<?php echo $rowsdtl['value']; ?>">
                                            <label for="two" class="box second">
                                                <div class="plan">
                                                    <span class="circle"></span>
                                                    <span class="yearly"> <?php echo $rowsdtl['answer']; ?> </span>
                                                </div>
                                            </label>
                                        <?php } ?>
                                        <?php if ((int)$rowsdtl['id'] == 3) { ?>
                                            <input type="radio" name="rd" id="three" value="<?php echo $rowsdtl['value']; ?>">
                                            <label for="three" class="box third">
                                                <div class="plan">
                                                    <span class="circle"></span>
                                                    <span class="yearly"><?php echo $rowsdtl['answer']; ?></span>
                                                </div>

                                            </label>
                                        <?php } ?>
                                    <?php  } ?>
                                </div>
                            </div>



                            <div class="video-controls">
                                <li><a class="cardbutton" href="javascript:void(0)"><span class="icon-check"></span>Submit</a></li>

                            </div>
                            <p class="output" style="display:none;color:red;">answer error</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
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
                                <a href="#cources">Cources</a>
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
    <script>
        $(document).ready(function() {
            $(".cardbutton").click(function() {
                $(".output").css("display", "none");
                $(".output").text("");
                var radioValue = $("input[name='rd']:checked").val();
                if (radioValue) {
                    $(".output").css("display", "block");
                    if (radioValue == "Correct answer") {
                        $(".output").css("color", "green");

                    } else {
                        $(".output").css("color", "red");
                    }

                    $(".output").text(radioValue);

                }
            });
        });
    </script>
</body>

</html>