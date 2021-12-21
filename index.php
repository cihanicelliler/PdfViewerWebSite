<?php require_once('sql.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MakeBetter - Landing Page</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body id="page-top" class="landing-page no-skin-config">
<div class="navbar-wrapper">
    <nav class="navbar navbar-default navbar-fixed-top navbar-expand-md" role="navigation">
        <div class="container">
            <?php if(isset($_COOKIE["Loged"])) { $status=explode("=", $_COOKIE["Loged"]); if ($status[3]=="Admin"){?>
            <a class="navbar-brand" href="admindashboard.php">ADMIN DASHBOARD</a>
            <?php }} ?>
            <div class="navbar-header page-scroll">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="nav-link page-scroll" href="#page-top">Home</a></li>
                    <li><a class="nav-link page-scroll" href="#features">Features</a></li>
                    <li><a class="nav-link page-scroll" href="#team">Team</a></li>
                    <?php if(!isset($_COOKIE["Loged"])) { ?>
                    <li><a class="nav-link page-scroll" href="login.php">LOG IN</a></li>
                    <li><a class="nav-link page-scroll" href="register.php">REGISTER</a></li>
                    <?php }else{ ?>
                    <li><a class="nav-link page-scroll" href="pdfsAdmin.php">PDFs</a></li>
                    <li><a class="nav-link page-scroll" href="logout.php">LOG OUT</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div id="inSlider" class="carousel slide" data-ride="carousel" >
    <ol class="carousel-indicators">
        <li data-target="#inSlider" data-slide-to="0" class="active"></li>
        <li data-target="#inSlider" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <div class="container">
                <div class="carousel-caption">
                    <h1>We offer<br/>
                        the opportunity<br/>
                        to read and analyze <br/>
                        your PDF files.</h1>
                    <p>Let's start analysis now!</p>
                    <?php if(isset($_COOKIE["Loged"])) { ?>
                    <p>
                        <a class="btn btn-lg btn-primary" href="pdfsAdmin.php" role="button">PDF Uploader</a>
                    </p>
                    <?php } ?>
                </div>
                <div class="carousel-image wow zoomIn">
                    <img src="assets/img/landing/laptop.png" alt="laptop"/>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back one"></div>

        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="carousel-caption blank">
                    <h1>We offer you  <br/> meaningful analysis.</h1>
                    <p>Let's start analysis now!</p>
                    <?php if(isset($_COOKIE["Loged"])) { ?>
                    <a class="btn btn-lg btn-primary" href="pdfsAdmin.php" role="button">PDF Uploader</a>
                    <?php } ?>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back two"></div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#inSlider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#inSlider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<section id="features" class="container services">
    <div class="row">
        <div class="col-sm-3">
            <h2>Full responsive</h2>
            <p>We offer you meaningful analysis. We offer the opportunity to read and analyze your PDF files. Let's start analysis now!</p>
            <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>PDF UPLOADER</h2>
            <p>We offer you meaningful analysis. We offer the opportunity to read and analyze your PDF files. Let's start analysis now!</p>
            <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>6 Charts Library</h2>
            <p>We offer you meaningful analysis. We offer the opportunity to read and analyze your PDF files. Let's start analysis now!</p>
            <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>Advanced Analysis</h2>
            <p>We offer you meaningful analysis. We offer the opportunity to read and analyze your PDF files. Let's start analysis now!</p>
            <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>
        </div>
    </div>
</section>

<section  class="container features">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1>Over 40+ unique PDF<br/> <span class="navy"> with many custom analysis</span> </h1>
            <p>We offer the opportunity to read and analyze your PDF files. </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 text-center wow fadeInLeft">
            <div>
                <i class="fa fa-mobile features-icon"></i>
                <h2>Full responsive</h2>
                <p>We offer you meaningful analysis. We offer the opportunity to read and analyze your PDF files. Let's start analysis now!</p>
            </div>
            <div class="m-t-lg">
                <i class="fa fa-bar-chart features-icon"></i>
                <h2>6 Charts Library</h2>
                <p>We offer you meaningful analysis. We offer the opportunity to read and analyze your PDF files. Let's start analysis now!</p>
            </div>
        </div>
        <div class="col-md-6 text-center  wow zoomIn">
            <img src="assets/img/landing/perspective.png" alt="dashboard" class="img-fluid">
        </div>
        <div class="col-md-3 text-center wow fadeInRight">
            <div>
                <i class="fa fa-envelope features-icon"></i>
                <h2>Mail pages</h2>
                <p>We offer you meaningful analysis. We offer the opportunity to read and analyze your PDF files. Let's start analysis now!</p>
            </div>
            <div class="m-t-lg">
                <i class="fa fa-google features-icon"></i>
                <h2>Advanced Analysis</h2>
                <p>We offer you meaningful analysis. We offer the opportunity to read and analyze your PDF files. Let's start analysis now!</p>
            </div>
        </div>
    </div>
</section>

<section id="team" class="gray-section team">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Our Team</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 wow fadeInLeft">
                <div class="team-member">
                    <img src="assets/img/landing/avatar3.jpg" class="img-fluid rounded-circle img-small" alt="">
                    <h4><span class="navy">Gulay</span> Genc</h4>
                    <p>Kocaeli University 3rd year computer engineering 1st academic student</p>
                    <ul class="list-inline social-icon">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member wow zoomIn">
                    <img src="assets/img/landing/avatar1.jpg" class="img-fluid rounded-circle" alt="">
                    <h4><span class="navy">We are</span> Hiring!</h4>
                    <p>Don't forget to contact us to be a part of our team!</p>
                    <ul class="list-inline social-icon">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4 wow fadeInRight">
                <div class="team-member">
                    <img src="assets/img/landing/avatar2.jpg" class="img-fluid rounded-circle img-small" alt="">
                    <h4><span class="navy">Cihan</span> Icelliler</h4>
                    <p>Kocaeli University 3rd year computer engineering 1st academic student.</p>
                    <ul class="list-inline social-icon">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center m-t-lg m-b-lg">
                <p>Don't forget to contact us to be a part of our team!</p>
            </div>
        </div>
    </div>
</section>

<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>More and more extra great feautres</h1>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-5 col-lg-offset-1 features-text">
                <small>MAKEBETTER</small>
                <h2>Perfectly designed </h2>
                <i class="fa fa-bar-chart big-icon float-right"></i>
                <p>We offer you meaningful analysis. We offer the opportunity to read and analyze your PDF files. Let's start analysis now!We offer you meaningful analysis. We offer the opportunity to read and analyze your PDF files. Let's start analysis now!We offer you meaningful analysis. We offer the opportunity to read and analyze your PDF files. Let's start analysis now!</p>
            </div>
            <div class="col-lg-5 features-text">
                <small>MAKEBETTER</small>
                <h2>Perfectly designed </h2>
                <i class="fa fa-bolt big-icon float-right"></i>
                <p>We offer you meaningful analysis. We offer the opportunity to read and analyze your PDF files. Let's start analysis now!We offer you meaningful analysis. We offer the opportunity to read and analyze your PDF files. Let's start analysis now!We offer you meaningful analysis. We offer the opportunity to read and analyze your PDF files. Let's start analysis now!</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-5 col-lg-offset-1 features-text">
                <small>MAKEBETTER</small>
                <h2>Perfectly designed </h2>
                <i class="fa fa-clock-o big-icon float-right"></i>
                <p>We offer you meaningful analysis. We offer the opportunity to read and analyze your PDF files. Let's start analysis now!We offer you meaningful analysis. We offer the opportunity to read and analyze your PDF files. Let's start analysis now!We offer you meaningful analysis. We offer the opportunity to read and analyze your PDF files. Let's start analysis now!</p>
            </div>
            <div class="col-lg-5 features-text">
                <small>MAKEBETTER</small>
                <h2>Perfectly designed </h2>
                <i class="fa fa-users big-icon float-right"></i>
                <p>We offer you meaningful analysis. We offer the opportunity to read and analyze your PDF files. Let's start analysis now!We offer you meaningful analysis. We offer the opportunity to read and analyze your PDF files. Let's start analysis now!We offer you meaningful analysis. We offer the opportunity to read and analyze your PDF files. Let's start analysis now!</p>
            </div>
        </div>
    </div>

</section>


<!-- Mainly scripts -->
<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="assets/js/inspinia.js"></script>
<script src="assets/js/plugins/pace/pace.min.js"></script>
<script src="assets/js/plugins/wow/wow.min.js"></script>


<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '#navbar',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
            header = document.querySelector( '.navbar-default' ),
            didScroll = false,
            changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>

</body>
</html>
