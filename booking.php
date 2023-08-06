<?php
include_once 'session.php';
$wid = (int)0;
$coursName = '';
$description = '';
if (!isset($_SESSION['Id']) || ($_SESSION['Id'] == '')) { 
  header("location: login.php");
  exit();
} else {
  $Id = $_SESSION['Id'];
  $query = "select UserName from users where UserId=$Id";
  $row = $db->SelectQuery($query);
  if (isset($_GET['wid'])) {
    $wid = (int)$_GET['wid'];
    $coursName = $_GET['coursName'];
    $description = $_GET['description'];
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Booking</title>
  <meta charset="utf-8">
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
            echo "<a class=\"nav-link scrollto\" href=\"logout.php\">Logout  " . $row['UserName'] . " </a><li>";
          }
          ?>
        </ul>
        <i class="icon icon-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <main id="main" style="margin-top: 100px">
    <!-- ======= Contact Section ======= -->

    <section id="contact" class="contact">
      <div class="container">
        <div class="section-title">
          <h2>Booking</h2>
          <h4>Request to join the current course :<?php echo  $coursName; ?></h4>
        </div>
        <div class="row mt-5">
          <div class="col-lg-12 mt-5 mt-lg-0">
            <form action="bookingdb.php" method="post" role="form" class="php-email-form" id="mydata" onsubmit="return SendData();">

              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" class="form-control" id="studname" name="studname" placeholder="Your Name" />
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" />
                </div>
              </div>

              <div class="row">

                <div class="col-md-4 form-group">
                  <label for="date" class="form-control"> Date and Time </label>
                </div>
                <div class="col-md-4 form-group">
                  <input type="date" class="form-control" name="date" id="date" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31">
                </div>
                <div class="col-md-4 form-group">
                  <input type="time" class="form-control" name="time" id="time" placeholder="dd-mm-yyyy" value="">
                </div>

              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message" id="error_message">
                  Error
                </div>
                <div class="sent-message" id="sent_message">
                  Your message has been sent. Thank you!
                </div>
              </div>
              <div class="text-center">

                <?php

                if (!isset($_SESSION['Id']) || ($_SESSION['Id'] == '')) {
                  echo "<input type=\"submit\" value=\"Must be Login.\" disabled>";
                } else {
                  echo "<input type=\"submit\" value=\"Send..\">";
                }
                ?>
              </div>
            </form>
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
    function SendData() {
      var error_message = document.getElementById("error_message");
      var sent_message = document.getElementById("sent_message");



      var studname = $('#studname').val();
      var email = $('#email').val();
      var date = $('#date').val();

      var time = $('#time').val();

      var subject = "<?php echo  $description; ?>";
      var course = "<?php echo  $coursName; ?>";

      $('.loading').show();

      $('.error-message').hide();
      $('.sent-message').hide();
      error_message.textContent = "";

      if (studname == "") {
        error_message.innerHTML = "enter Name";
        $('.error-message').show();
        $('.loading').hide();
        return false;
      }
      if (email == "") {
        error_message.innerHTML = "enter email";
        $('.error-message').show();
        $('.loading').hide();
        return false;
      }
      if (date == "") {
        error_message.innerHTML = "enter date";
        $('.error-message').show();
        $('.loading').hide();
        return false;
      }
      if (time == "") {
        error_message.innerHTML = "enter time";
        $('.error-message').show();
        $('.loading').hide();
        return false;
      }

      $.ajax({
        type: 'post',
        url: 'bookingdb.php',
        data: {
          studname: studname,
          email: email,
          date: date,
          time: time,
          subject: subject,
          course: course
        },
        success: function(response) {
          if (response.startsWith("success")) {
            var id = response.substring(7);
            window.location = 'booking_show.php?bookId=' + id;

          } else {
            alert("error in send data " + response);
          }
        }
      });
      return false;
    }
  </script>
</body>

</html>