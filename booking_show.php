<?php
include_once 'session.php';

if (!isset($_SESSION['Id']) || ($_SESSION['Id'] == '')) { 
} else {
  $Id = $_SESSION['Id'];
  $query = "select UserName from users where UserId=$Id";
  $rows = $db->SelectQuery($query);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Appointment Show</title>
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
    .contact .col_n {
      color: #49b5e7;
      font-size: large;
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
          <li><a class="nav-link scrollto" href="Appointment.php">Appointment</a></li>

          <?php

          if (!isset($_SESSION['Id']) || ($_SESSION['Id'] == '')) {
            echo "<li><a class=\"nav-link scrollto\" href=\"login.php\">Login</a><li>";
          } else {
            echo "<a class=\"nav-link scrollto\" href=\"logout.php\">Logout  " . $rows['UserName'] . " </a><li>";
          }
          ?>
        </ul>
        <i class="icon icon-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <main id="main" style="margin-top: 100px">
    <?php

    if (isset($_GET['bookId'])) {
      $bookid = $_GET['bookId'];
      $query = "select * from booktransactions where transId=$bookid";
      $row = $db->SelectQuery($query);
    ?>
      <section id="contact" class="contact">
        <div class="container">
          <div class="section-title">
            <h2>Registered Details</h2>
            <h4>Show Data Register For User <span style="color:#c28b1d"> <?php echo $row['studname']; ?></span></h4>
          </div>
          <div class="row mt-2">
            <div class="col-lg-12 mt-2 mt-lg-0">
              <form role="form" class="pl-5 php-email-form" id="mydata">

                <div class="form-group mt-3">
                  <label class="col_n">Registered Code :</label>
                  <label><?php echo $row['code']; ?></label>
                </div>
                <div class="form-group">
                  <label class="col_n">Course :</label>
                  <label><?php echo $row['course']; ?></label>

                </div>
                <div class="form-group">
                  <label class="col_n">subject Name :</label>
                  <label><?php echo $row['subject']; ?></label>
                </div>
                <div class="form-group">
                  <label class="col_n">Date and Time :</label>
                  <label class="col_n">Date : </label>
                  <label><?php echo $row['date']; ?></label>
                  <label class="col_n">Time : </label>
                  <label><?php echo $row['time']; ?></label>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    <?php } ?>
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