<?php
ob_start();
include("autoload.php");
$db   = new MySql();
$db->connect();
$ath=new Auth();
$basicdet=$ath->getsettingsbasic();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $basicdet[0]['sitename']; ?></title>
        <meta name="description" content="<?php echo $basicdet[0]['description']; ?>">
        <meta name="keywords" content="<?php echo $basicdet[0]['keywords']; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="google-site-verification" content="7zKa69VcyPflCPVnsXtZlzqXWrjZMr33GqC7gdnXU-o" />

        <link rel="shortcut icon" href="/favicon.ico">

        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="/css/bootstrap.css">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/fancybox/jquery.fancybox.css">
        <script src="/js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="/js/vendor/jquery-1.8.3.min.js"></script>
        <script src="/js/jquery.history.js"></script>
        <script src="/js/bootstrap.js"></script>
        <script src="/js/jquery.mobile.customized.min.js"></script>
        <script src="/js/plugins.js"></script>
        <script src="/fancybox/jquery.fancybox.pack.js"></script>
        <script src="/js/main.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
<?php
$mov=new Movie();
$th=new Theatre();
$nowrun=$mov->getnowrunning();
$sd=count($nowrun);
?>
        <section id="home" style="height: auto;">


                <div id="sticky-bar" class="sticky">
                    <div class="sb-in">
                        
                        <span class="running"></span>
                        <div class="container">
                            <nav>
                                <div class="logo"><a href="/"><img src="/img/sticky-bar-logo.png" alt=" "></a></div>
                                <ul class="nav">
                                    <li class="booknow"><a href="http://ticketnew.com/scheduleiframe/theatre/partnersites/Vismaya/default.aspx?MultiplexID=OA%3d%3d-HcNO4%2bhfLZk%3d">Tickets</a></li>
                                    <li><a href="/">Back</a></li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>





        </section> <!-- #home -->


        <div class="clearfix"></div>


        <?php if ( $movie_details_onload == "true") { ?>
        <section id="movies" class="main">
            <div class="container clearfix">

                <div class="mod-header">
                    <div class="inner">
                        <h2>Movie</h2>
                        <span class="simg"><img src="/img/movies-modheader-simg.png" alt=" "></span>
                    </div>
                </div>

                <div id="movie-details" class="clearfix" style="display:block;">
                    <?php include 'movie_details_load.php'; ?>
                </div> <!-- #movie-details -->
                
            </div>
        </section> <!-- #movies -->

        <div class="container">
            <?php include_once 'footer.php'; ?>
        </div>

        <?php } ?>


        <?php
            if ( $theatres_onload == "true") {
            include 'theatres_load.php';
        ?>
        <div class="container">
            <?php include_once 'footer.php'; ?>
        </div>

        <?php } ?>


        <?php
            if ( $aboutus_onload == "true") {
            include 'aboutus_load.php';
        ?>
        <div class="container">
            <?php include_once 'footer.php'; ?>
        </div>

        <?php } ?>

        <?php
            if ( $contactus_onload == "true") {
            include 'contactus_load.php';
        ?>
        <?php } ?>


        <!-- <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script> -->
    </body>
</html>
