<?php
include_once 'session.php';
$UsrId = (int)0;
$drIdActive = (int)0;
$AccountType = (int)0;
if (!isset($_SESSION['Id']) || ($_SESSION['Id'] == '')) { 
    header("location: index.php");
    exit();
} else {
    $UsrId = $_SESSION['Id'];
    $AccountType = (int)$_SESSION['AccountType'];
    $query = "select UserName from users where UserId=$UsrId";
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
        .chat {
            position: fixed;
            visibility: visible;
            opacity: 1;
            right: 15px;
            bottom: 60px;
            border-radius: 4px;
            transition: all 0.4s;
        }

        .chat-bubble-content img,
        .card-header img,
        .list-group img {
            width: 50px;
            height: 50px;
            text-align: center;
            border-radius: 50%;
        }

        .card-body {
            overflow-y: scroll;
            scroll-behavior: smooth;
            overflow-x: hidden;
            scrollbar-width: thin;

        }

        .card-body::-webkit-scrollbar {
            width: 1.4rem;
            background-color: rgba(0, 0, 0, 0.2);
        }

        .card-body::-webkit-scrollbar-thumb {
            background-color: #c28b1d;
            border-radius: 10px;
        }

        .list-group-item.active {
            background-color: #49b5e7;
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

        <div class="container py-3">

            <div class="row">
                <div class="col-md-4">
                    <?php if($AccountType==2){
                        echo '<h2 class="text-center mb-2">Experts</h2>';
                        } 
                        else
                        {
                            echo '<h2 class="text-center mb-2">Users</h2>';
                        }
                        ?>
                    

                    <div class="list-group">
                        <?php
                        $query = "select *,(select count(*) from chating where senderId=usr.UserId and resiveId=$UsrId and issee=0)unread from users usr where UserId>0";

                        if ($UsrId > 0) {
                            if ($AccountType == 1)
                                $query .= " and AccountType=2";
                            else
                                $query .= " and AccountType=1";
                            $query .= " and UserId<>$UsrId";
                        }
                        $result = $db->getData($query);

                        while ($roww = mysqli_fetch_array($result)) {
                            $drName = $roww['UserName'];
                            $Countunread = (int)$roww['unread'];
                            $drId = $roww['UserId']; 
                            $imgUsr = $roww['img'];
                            if ($imgUsr == "")
                                $imgUsr = 'img/logo.jpg';
                        ?>


                            <div class="d-flex">
                                <a href="javascript:void(0)" data-id="<?php echo $drId; ?>" data-drimg="<?php echo $roww['img'];  ?>" data-drname="<?php echo $drName;  ?>" class="list-group-item list-group-item-action export"> <!-- active -->
                                    <img src="<?php echo $imgUsr;  ?>" class="img-fluid rounded-circle" alt="Profile Image">
                                    <?php echo $drName;  ?>
                                    <?php if ($Countunread > 0) { ?>
                                        <i class="icon-comment"></i><span id="unread<?php echo $drId; ?>"><?php echo $Countunread; ?></span>
                                    <?php } else { ?>
                                        <span id="unread<?php echo $drId; ?>"></span>
                                    <?php } ?>
                                </a>
                            </div>

                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <h2 class="text-center mb-2">Chatting</h2>
                    <div class="card" style="height: 70vh;">
                        <div class="card-header d-none">
                            <img src="profile-img.jpg" class="img-fluid rounded-circle" id="headerimg" alt="Profile Image">
                            <span id="headername"> </span>
                            <input type="input" hidden="hidden" id="headerid" name="headerid">
                        </div>
                        <div class="card-body">


                        </div>


                        <div class="card-footer">
                            <form action="chat/insert-chat.php" method="post" id="mydata" onsubmit="return checkMessage();">
                                <input type="input" hidden="hidden" id="resiveId" name="resiveId" value="0">
                                <div class="input-group" style="width: auto;margin: 0 auto;padding-left: 0px;">
                                    <input type="text" id="message" class="form-control" placeholder="Type a message">
                                    <div class="input-group-append">
                                        <button class="btn btn-info text-white" type="submit">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>

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
    <script src="chat/js/chat.js"></script>
    <script type="text/javascript">
        $(document).ready(function($) {
            $('.list-group').on('click', '.export', function() {
                var id = $(this).data('id');
                $('.list-group a').removeClass('active');
                $(this).addClass('active');
                $('#headerid').val(id);
                $('#resiveId').val(id);
                $('#unread' + id).html("");
                var drname = $(this).data('drname');
                var drimg = $(this).data('drimg');
                $('.card-header').removeClass('d-none').addClass('d-block');

                $('.card-header #headername').html(drname);
                $('.card-header #headerimg').attr("src", drimg);

                var cardBody = $('.card-body');

                $.ajax({
                    type: 'post',
                    url: 'chat/get-chat.php',
                    data: {
                        resiveId: id,
                        IsAuto: 0
                    },
                    success: function(response) {
                        cardBody.html(response);
                        $('.card-body').scrollTop($('.card-body')[0].scrollHeight);
                    }
                });

            });

        });

        function checkMessage() {

            var message = $('#message').val();
            var resiveId = $('#headerid').val();
            var cardBody = $('.card-body');
            if (message == "") {
                return false;
            }

            var form = new FormData();
            form.append('message', message);
            form.append('resiveId', resiveId);
            $.ajax({
                type: 'post',
                url: 'chat/insert-chat.php',
                cache: false,
                contentType: false,
                processData: false,
                data: form,
                success: function(response) {
                    if (response.startsWith("error")) {
                        alert(response);
                    } else {
                        cardBody.append(response);
                        $('.card-body').scrollTop($('.card-body')[0].scrollHeight);
                        $("#mydata").get(0).reset();
                        $('#resiveId').val(resiveId);
                    }
                }
            });

            return false;
        }
    </script>
</body>

</html>