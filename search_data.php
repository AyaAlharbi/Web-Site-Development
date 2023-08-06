<?php
include_once 'session.php';
$search = '';
if (!isset($_SESSION['Id']) || ($_SESSION['Id'] == '')) { 
} else {
    $Id = $_SESSION['Id'];
    $query = "select UserName from users where UserId=$Id";
    $row = $db->SelectQuery($query);
}
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>WSD learning</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />

    <!-- Font-->
    <link rel="stylesheet" href="css/font-awesome.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo"><img src="img/logo3.jpg" alt="" class="img-fluid" /></a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="index.php#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="index.php#cources">Cources</a></li>
                    <li><a class="nav-link scrollto" href="aboutus.php">About</a></li>
                    <li><a class="nav-link scrollto" href="index.php#services">Services</a></li>
                    <li><a class="nav-link scrollto" href="#">Contact</a></li>
                    <li><a class="nav-link scrollto" href="Appointment.php">Appointment</a></li>
                    <?php

                    if (!isset($_SESSION['Id']) || ($_SESSION['Id'] == '')) {
                        echo "<li><a class=\"nav-link scrollto\" href=\"login.php\">Login</a><li>";
                    } else {
                        echo "<a class=\"nav-link scrollto\" href=\"logout.php\">Logout  " . $row['UserName'] . " </a><li>";
                    }
                    ?>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="search_data.php" method="get">
                    <div class="input-group">
                        <input class="form-control mr-sm-0" type="search" placeholder="Search" id="search-input" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="search-button">Search</button>
                        </div>
                    </div>
                </form>
                <i class="icon icon-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>

    <main id="main" style="margin-top: 100px">
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="search">
            <div class="container">
                <div class="section-title">
                    <h2>Search Results <span> <?php echo $search; ?> </span></h2>

                </div>
                <div class="container">
                    <div class="row">
                        <?php
                        $query = "SELECT courcesId,id,title,description,Titlevedio,(select name from cources where id=les.courcesId)cursName FROM lessons les WHERE (description LIKE '%$search%' or title LIKE '%$search%' or Titlevedio LIKE '%$search%')";
                        $result = $db->getData($query);
                        while ($rows = mysqli_fetch_array($result)) {
                            $title = $rows['title'];
                            $description = $rows['description'];
                            $Titlevedio = $rows['Titlevedio'];

                            $lesid = (int) $rows['id'];
                            $lesname = $rows['title'];
                            $cursName = $rows['cursName'];
                            $curid = (int) $rows['courcesId'];
                        ?>
                            <div class="col-md-12">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="display-0 mb-2"><a href="lessons.php?cources=<?php echo $curid; ?>&courcesName=<?php echo $cursName; ?>&lesson=<?php echo $lesid; ?>" target="_blank"><span class="text-primary"><?php echo $cursName; ?></span><i class="icon-arrow-right"></i><span class="text-secondary"> <?php echo $lesname; ?></span></a></h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <?php
                                        if (strpos(strtoupper($title), strtoupper($search)) !== false) {
                                            echo "<li class=\"list-group-item\"><a href=\"lessons.php?cources=$curid&courcesName=$cursName&lesson=$lesid\" target=\"_blank\">Title: $title</a></li>";
                                        }
                                        if (strpos(strtoupper($description), strtoupper($search)) !== false) {
                                            echo "<li class=\"list-group-item\"><a href=\"lessons.php?cources=$curid&courcesName=$cursName&lesson=$lesid\" target=\"_blank\">Description: $description</a></li>";
                                        }
                                        if (strpos(strtoupper($Titlevedio), strtoupper($search)) !== false) {
                                            echo "<li class=\"list-group-item\"><a href=\"lessons.php?cources=$curid&courcesName=$cursName&lesson=$lesid\" target=\"_blank\">Titlevedio: $Titlevedio</a></li>";
                                        }
                                        ?>

                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Contact Section -->
    </main>
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
            $('#search-input').keypress(function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    $('#search-button').click();
                }
            });
            $("#search-button").click(function(event) {
                event.preventDefault();

                var searchInput = $("#search-input").val();
                if (searchInput.trim() == "")
                    return false;
                else
                    window.location.href = 'search_data.php?search=' + encodeURIComponent(searchInput);
            });
        });
    </script>
</body>

</html>