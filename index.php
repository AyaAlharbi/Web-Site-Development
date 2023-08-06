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
  <title>WSD learning</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css" />

  <!-- Font-->
  <link rel="stylesheet" href="css/font-awesome.min.css" />


  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo"><img src="img/logo.jpg" alt="" class="img-fluid" /></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#cources">Courses</a></li>
          <li><a class="nav-link scrollto" href="aboutus.php">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
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
  <section id="hero" class="d-flex align-items-center">
    <div class="container">

      <div class="row">
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Web Site For Learn Languages</h1>
          <h2>
            Web Site For Learn Languages , a free, fully HTML,CSS,PHP,JQuery
            by WSD Now you know how to use HTML, CSS, JQuery and PHP to
            create, style, and make interactive web pages. The next step is to
            publish your website,so that the rest of the world can see your
            work. There are tons of hosting services to choose from.We have
            made one for you
          </h2>
          <?php

          if (!isset($_SESSION['Id']) || ($_SESSION['Id'] == '')) {
            echo "<div style=\"display:block;\">";
          } else {
            echo "<div style=\"display:none;\">";
          }
          ?>
          <a href="login.php" class="btn-get-started scrollto">Get Started</a>
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img">
        <img src="img/hero-img.png" class="img-fluid" alt="" />
      </div>
    </div>
    </div>
  </section>

  <main id="main">
    <section id="cources" class="cource-box">
      <div class="container">
        <div class="section-title">
          <h2>Courses</h2>
        </div>
        <div class="row">

          <?php
          $query = "select * from cources where state=1";
          $result = $db->getData($query);

          while ($rows = mysqli_fetch_array($result)) {
            $corsId = $rows['id'];
          ?>
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
              <div class="icon-box">
                <div class="icon">
                  <i class="<?php echo $rows['icon'] ?>"></i>
                </div>
                <h4 class="title"><a href="lessons.php?cources=<?php echo $corsId; ?>&courcesName=<?php echo $rows['name']; ?>&lesson=0"><?php echo $rows['name'] ?></a></h4>
                <p class="description">
                  <?php echo $rows['description'] ?>
                </p>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="section-title">
          <h2>Services</h2>
          <p>
            The site is easy and accessible for all groups. When you visit the
            site, you will find the options clear in front of you,You will
            find educational stages from learning to professionalism.
          </p>
        </div>

        <div class="row">
          <div class="col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <i class="icon-camera"></i>
              <h4><a href="chatApp.php">Meeting</a></h4>
              <p>
              Meeting the expert by communicating with him in the chat room in a quick and easy way, to discuss the lessons they find difficult or to ask about anything they want to learn in programming.
              </p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <i class="icon-inbox"></i>
              <h4><a href="editor.php">Editor</a></h4>
              <p>
              The site provides servise to try the code in easy and fast way and  that can help you to test your self.
              </p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <i class="icon-check"></i>
              <h4><a href="quizs.php?cources=1&courcesName=HTML&quiz=0">Exam</a></h4>
              <p>
                The site provides a testing service after each course or lesson to check the student's ability to learn.
              </p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
            <div class="icon-box">
              <i class="icon-comments"></i>
              <h4><a href="workshop.php">Workshop</a></h4>
              <p>
                Add lecture by experts to explain some topics and enhance students skills.
              </p>
            </div>
          </div>

        </div>
      </div>
    </section>
  </main>

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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="icon-arrow-up"></i></a>

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