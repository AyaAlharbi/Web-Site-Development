<?php
include_once 'session.php';
$cources = 0;
$lesson = 0;
$idcurr = (int)0;
$courcesName = '';
$UserName = '';
if (!isset($_SESSION['Id']) || ($_SESSION['Id'] == '')) { 
} else {
    $Id = $_SESSION['Id'];
    $query = "select UserName from users where UserId=$Id";
    $row = $db->SelectQuery($query);
    $UserName = $row['UserName'];
}
if (isset($_GET['cources'])) {
    $cources = (int)$_GET['cources'];
    $courcesName = $_GET['courcesName'];
}
if (isset($_GET['lesson'])) {
    $lesson = (int)$_GET['lesson'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lessons <?php echo $courcesName; ?></title>
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
        .media {
            display: flex;
            align-items: flex-start;
        }

        form .btn-get-started {
            font-family: "Dosis", sans-serif;
            font-weight: 500;
            font-size: 16px;
            letter-spacing: 1px;
            display: inline-block;
            padding: 8px 28px;
            border-radius: 3px;
            transition: 0.5s;
            margin-top: 25px;
            color: #fff;
            background: #49b5e7;
            text-transform: uppercase;
        }

        form .btn-get-started:hover {
            background: #76c7ed;
        }

        form .error-message {
            display: none;
            color: #fff;
            background: #ed3c0d;
            text-align: left;
            padding: 15px;
            font-weight: 600;
        }

        form .error-message br+br {
            margin-top: 25px;
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
                        <a class="nav-link scrollto" href="#">About</a>
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
                        echo "<a class=\"nav-link scrollto\" href=\"logout.php\">Logout  " . $UserName . " </a><li>";
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
                            $query = "select * from lessons where courcesId=$cources and state=1";
                            $result = $db->getData($query);
                            $i = (int)0;
                            $idcurr = (int)0;
                            $namecurr = '';

                            while ($rows = mysqli_fetch_array($result)) {
                                $id = (int) $rows['id'];
                                $name = $rows['name'];
                                if ($lesson == 0) {
                                    if ($i == 0) {
                                        echo "<li class=\"active\"><a href=\"lessons.php?cources=$cources&courcesName=$courcesName&lesson=$id\"> $name</a></li>";
                                        $idcurr = $id;
                                        $namecurr = $name;
                                    } else
                                        echo "<li><a href=\"lessons.php?cources=$cources&courcesName=$courcesName&lesson=$id\"> $name</a></li>";
                                } else {
                                    if ($id == $lesson) {
                                        echo "<li class=\"active\"><a href=\"lessons.php?cources=$cources&courcesName=$courcesName&lesson=$id\"> $name</a></li>";
                                        $idcurr = $id;
                                        $namecurr = $name;
                                    } else
                                        echo "<li><a href=\"lessons.php?cources=$cources&courcesName=$courcesName&lesson=$id\"> $name</a></li>";
                                }
                                $i = $i + 1;
                            }
                            if ($i <= 0) {
                                echo "<li class=\"active\">Not Found lessons</li>";
                            }
                            ?>

                        </ul>
                    </div>
                    <!-- Right section -->
                    <div class="col-md-8 right-section">
                        <?php
                        $flag = 0;
                        $Namelession = $courcesName;
                        if ($idcurr > 0)
                            $Namelession = $Namelession . ' -' . $namecurr;
                        echo "<h2> $Namelession </h2>";

                        $query = "select * from lessons where courcesId=$cources and id=$idcurr and state=1";
                        $result = $db->getData($query);
                        while ($rows = mysqli_fetch_array($result)) {
                        ?>

                            <p><?php echo $rows['description']; ?></p>

                            <iframe src="<?php echo $rows['urlvideo']; ?>" title="<?php echo $rows['Titlevedio']; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media;
  gyroscope; picture-in-picture" allowfullscreen></iframe>

                            <div class="video-controls">
                                <?php if ($idcurr <= 1)
                                    echo '<li><a class="cardbutton" href="javascript:void(0)"><span class="icon-arrow-left"></span> Previous</a></li>';
                                else {

                                    $flag = $idcurr - 1;
                                    echo "<li><a class=\"cardbutton\" href=\"lessons.php?cources=$cources&courcesName=$courcesName&lesson=$flag\"><span class=\"icon-arrow-left\"></span> Previous</a></li>";
                                }
                                ?>
                                <?php if ($idcurr >= 5)
                                    echo '<li><a class="cardbutton" href="javascript:void(0)">Next<span class="icon-arrow-right"></span></a></li>';
                                else {
                                    $flag = $idcurr + 1;
                                    echo "<li><a class=\"cardbutton\" href=\"lessons.php?cources=$cources&courcesName=$courcesName&lesson=$flag\" >Next<span class=\"icon-arrow-right\"></span></a></li>";
                                }
                                ?>

                                <li><a class="cardbutton" href="<?php echo "quizs.php?cources=$cources&courcesName=$courcesName&quiz=0" ?>" target="_blank" rel="nofollow"><span class="icon-check"></span> Take Quize</a></li>
                                <li><a class="cardbutton" href="editor.php" target="_blank" rel="nofollow"><span class="icon-check"></span>Editor</a></li>


                            </div>


                            <div class="mb-5 content_comment" style="padding: 30px; background: #f6f6f6;">

                                <?php
                                $contcomment = $comm->getCountComments($db, $cources, $idcurr);
                                ?>
                                <h3 class="mb-4"><span id="ccomnt"><?php echo $contcomment; ?></span> Comments</h3>
                                <?php
                                $result = $comm->getAllComments($db, $cources, $idcurr);
                                while ($rowscomm = mysqli_fetch_array($result)) {
                                    $json_data = $comm->getInfoComment($rowscomm);
                                    $array = json_decode($json_data, true);
                                ?>

                                    <div class="media mb-4">
                                        <img src="img/user.webp" alt="Image" class="img-fluid mr-3 mt-0 pe-2" style="width: 45px;">
                                        <div class="media-body">
                                            <h6><?php echo $array['UserName']; ?> <small><i><?php echo $array['Date']; ?> at <?php echo $array['Time']; ?></i></small></h6>
                                            <p><?php echo $array['Comment']; ?></p>

                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                            <div style="padding: 30px; background: #f6f6f6;">
                                <h3 class="mb-4">Leave a comment</h3>
                                <form action="commentdb.php" method="post" id="mydata" onsubmit="return SendComment();">
                                    <div class="form-group">
                                        <label for="message">comment *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="error-message" id="error_message">
                                        Error
                                    </div>
                                    <div class="form-group mb-0">
                                        <?php
                                        if (!isset($_SESSION['Id']) || ($_SESSION['Id'] == ''))
                                            echo '<input type="submit" value="Leave Comment" class="btn-get-started scrollto" disabled="disabled">';
                                        else
                                            echo '<input type="submit" value="Leave Comment" class="btn-get-started scrollto">';
                                        ?>
                                    </div>
                                </form>
                            </div>
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
        function SendComment() {

            var ccomnt = parseInt($('#ccomnt').text()) + 1;

            var Commnt = document.getElementById("message").value;
            var error_message = document.getElementById("error_message");
            var corsId = <?php echo $cources; ?>;
            var lesson = <?php echo $idcurr; ?>;
            <?php
            $datenow = date("Y-m-d H:i:s");
            $tdate = date("Y-m-d");
            $ttime = date("H:i:s");
            ?>
            var datenow = "<?php echo $datenow; ?>";
            var tdate = "<?php echo $tdate; ?>";
            var ttime = "<?php echo $ttime; ?>";
            $('.error-message').hide();
            if (Commnt == "") {
                error_message.innerHTML = "enter your Comment";
                $('.error-message').show();
                return false;
            }
            $.ajax({
                type: 'post',
                url: 'commentdb.php',
                data: {
                    checkcomm: "checkcomm",
                    Commnt: Commnt,
                    corsId: corsId,
                    lesson: lesson,
                    datenow: datenow
                },
                success: function(response) {
                    if (response == "success") {
                        $('#ccomnt').html(ccomnt + "");
                        var comnt = '<div class="media mb-4">' +
                            '<img src="img/user.webp" alt="Image" class="img-fluid mr-3 mt-0 pe-2" style="width: 45px;">' +
                            '<div class="media-body">' +
                            '<h6>' + "<?php echo $UserName; ?>" + ' <small><i>' + tdate + ' at ' + ttime + '</i></small></h6>' +
                            '<p>' + Commnt + '</p>' +
                            '</div>' +
                            '</div>'
                        $(".content_comment").append(comnt);
                        $("#mydata").get(0).reset();
                    } else {
                        error_message.textContent = response;
                        $('.error-message').show();
                    }
                }
            });
            return false;
        }
    </script>
</body>

</html>