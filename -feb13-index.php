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
        <meta name="viewport" content="width=device-width">

        <link rel="shortcut icon" href="favicon.ico">

        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="js/vendor/jquery-1.8.3.min.js"></script>
        <script src="js/jquery.history.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.mobile.customized.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
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
        <section id="home">
            <div id="homeslider" class="clearfix">
                <div class="mask"></div>
                <a id="prevslide"></a>
                <a id="nextslide"></a>
                <div class="container">
                
                    <div class="row">
                        <div class="span11">
                            <a href="index.php" id="home-logo"><img src="img/home-logo.png" alt=" "></a>
                        </div>
                    </div>
                    
                    
                    <div class="span10 caption">
                        <div id="slidecaption">
                            
                        </div>    
                    </div> <!-- .caption -->
                
                </div> <!-- .container -->

            </section> <!-- #homeslider -->


            <script>

                jQuery(function($){
                    $.supersized({
                    slide_interval          :   7000,
                    transition              :   6,
                    transition_speed        :   600,
                    slide_links             :   'false',
                    keyboard_nav            :   0,
                    slides                  :   [    // Slideshow Images
                   
                  <?php    
                   $th3= new Theatre();
                  $mov3=new Movie();
                  for($k=0;$k<count($nowrun);$k++) { ?> <?php 

                           $movieid=$nowrun[$k]['movie_id'];
                           $movieshows=$mov3->getshowsmain($movieid);
                           ?>
                         
                                        {image : "uploads/<?php echo $nowrun[$k]['poster'];  ?>",title :" <?php     
for($j=0;$j<count($movieshows);$j++) { 

$theatreid=$movieshows[$j]['theatre_id'];
$theatres=$th3->gettheatre($theatreid);   ?><p class="+'time'+"> <strong><?php echo $theatres[0]['theatre_name'];  ?>   : </strong><?php
if($movieshows[$j]['ms_status']==1){

    echo $theatres[0]['ms_time'];
    echo ",";
}
if($movieshows[$j]['mat_status']==1){

    echo $theatres[0]['matinee_time'];
      echo ",";
}
if($movieshows[$j]['evg_status']==1){

    echo $theatres[0]['evg_time'];
      echo ",";
}
if($movieshows[$j]['sec_status']==1){

    echo $theatres[0]['second_time'];
      echo ",";
}
if($movieshows[$j]['extrashow1_status']==1){

    echo $theatres[0]['extrashow1_time'];
      echo ",";
}
if($movieshows[$j]['extrashow2_status']==1){

    echo $theatres[0]['extrashow2_time'];
      echo ",";
}


?></p><?php } ?><h2 class="+'slide1'+"><a href="+'#'+"><?php echo $nowrun[$k]['movie_name'];  ?></a></h2><p><?php echo $nowrun[$k]['actors'];  ?></p><p> <?php if($nowrun[$k]['proj_status']==1){ echo '3D'; } ?> </p><p><strong>Storyline:</strong> <?php echo substr(strip_tags($nowrun[$k]['description']),0,400);  ?>.....</p>"},
                                                  <?php } ?>
                                                   
                                                ]
                    });
                });
            </script>

            <div class="sticky-container">
                <div id="sticky-bar">
                    <span class="running"></span>
                    <div class="container">
                        <nav>
                            <div class="logo"><a href="#home"><img src="img/sticky-bar-logo.png" alt=" "></a></div>
                            <ul class="nav">
                                <li><a href="#booknow">Booknow</a></li>
                                <li><a href="#movies">Movies</a></li>
                                <li><a href="#theatres">Theatres</a></li>
                                <li><a href="#aboutus">About Us</a></li>
                                <li><a href="#contactus">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div> <!-- .sticky-container -->

        </div> <!-- #homesection -->

        <section id="movies" class="main">
            <div class="container clearfix">

                <div class="mod-header">
                    <div class="inner">
                        <h2>Movies</h2>
                        <span class="simg"><img src="img/movies-modheader-simg.png" alt=" "></span>
                    </div>
                </div>

                <div class="movies-list">
                    <div class="mod-content">
                        <div class="row-fluid">
<?php

$movies=$mov->getall();

?>
<?php for($i=0;$i<count($movies);$i++){  ?>

<?php if($movies[$i]['spl']==1){  ?>
                            <div class="span6 list">
                                <div class="inner">
                                    <img src="uploads/<?php echo $movies[$i]['poster'];  ?>" alt="<?php echo $movies[$i]['movie_name'];  ?>" class="p">
                                    <div class="status"><?php if($movies[$i]['movie_status']==0){    ?>Upcoming <?php }else { ?> Now Running <?php } ?></div>
                                    <div class="cover">
                                        <h2><?php echo $movies[$i]['movie_name'];  ?></h2>
                                        <?php
                           $movieid=$movies[$i]['movie_id'];
                           $movieshows=$mov->getshowsmain($movieid);
                           ?>
                           <?php     
for($j=0;$j<count($movieshows);$j++) { 

$theatreid=$movieshows[$j]['theatre_id'];
$theatres=$th->gettheatre($theatreid);
?>
<div class="time"><p><strong><?php echo $theatres[0]['theatre_name'];  ?>:</strong>
<?php
if($movieshows[$j]['ms_status']==1){

    echo $theatres[0]['ms_time'];
    echo ",";
}
if($movieshows[$j]['mat_status']==1){

    echo $theatres[0]['matinee_time'];
      echo ",";
}
if($movieshows[$j]['evg_status']==1){

    echo $theatres[0]['evg_time'];
      echo ",";
}
if($movieshows[$j]['sec_status']==1){

    echo $theatres[0]['second_time'];
      echo ",";
}
if($movieshows[$j]['extrashow1_status']==1){

    echo $theatres[0]['extrashow1_time'];
      echo ",";
}
if($movieshows[$j]['extrashow2_status']==1){

    echo $theatres[0]['extrashow2_time'];
      echo ",";
}



?>


</p></div>

<?php 

}

                                             ?>

                                        
                                        <p><?php echo $movies[$i]['actors'];  ?></p>
                                        <div class="clearfix"><a href="movie_details.php?movieid=<?php echo $movies[$i]['movie_id'];  ?>" class="btn">View Details</a></div>
                                    </div>
                                </div>
                            </div> <!-- .list -->
<?php } else {  ?>
                            <div class="span3 list">
                                 <div class="inner">
                                    <img src="uploads/<?php echo $movies[$i]['poster'];  ?>" alt="<?php echo $movies[$i]['movie_name'];  ?>" class="p">
                                    <div class="status"><?php if($movies[$i]['movie_status']==0){    ?>Upcoming <?php }else { ?> Now Running <?php } ?>

<?php if($movies[$i]['proj_status']==1){    ?>3D <?php } ?>

                                    </div>
                                    <div class="cover">
                                        <h2><?php echo $movies[$i]['movie_name'];  ?></h2>
                                                     <?php
                           $movieid=$movies[$i]['movie_id'];
                           $movieshows=$mov->getshowsmain($movieid);
                           ?>
                           <?php     
for($j=0;$j<count($movieshows);$j++) { 

$theatreid=$movieshows[$j]['theatre_id'];
$theatres=$th->gettheatre($theatreid);
?>
<div class="time"><p><strong><?php echo $theatres[0]['theatre_name'];  ?>:</strong>
<?php
if($movieshows[$j]['ms_status']==1){

    echo $theatres[0]['ms_time'];
    echo ",";
}
if($movieshows[$j]['mat_status']==1){

    echo $theatres[0]['matinee_time'];
      echo ",";
}
if($movieshows[$j]['evg_status']==1){

    echo $theatres[0]['evg_time'];
      echo ",";
}
if($movieshows[$j]['sec_status']==1){

    echo $theatres[0]['second_time'];
      echo ",";
}
if($movieshows[$j]['extrashow1_status']==1){

    echo $theatres[0]['extrashow1_time'];
      echo ",";
}
if($movieshows[$j]['extrashow2_status']==1){

    echo $theatres[0]['extrashow2_time'];
      echo ",";
}



?>


</p></div>

<?php 

}

                                             ?>
                                        <p><?php echo $movies[$i]['actors'];  ?></p>
                                        <div class="clearfix"><a href="movie_details.php?movieid=<?php echo $movies[$i]['movie_id'];  ?>" class="btn">View Details</a></div>
                                    </div>
                                </div>
                            </div> <!-- .list -->
<?php } ?>

<?php } ?>
                        



                        </div>
                    </div> <!-- .mod-content -->
                </div> <!-- .movies-list -->


                <div id="movie-details" class="clearfix">
                    <?php if ( $movie_details_onload == "true") {
                        include 'movie_details_load.php';
                    } ?>
                </div> <!-- #movie-details -->








            </div>
        </section> <!-- #movies -->

        <section id="theatres" class="main clearfix">
            <div class="container clearfix">

                <div class="mod-header">
                    <div class="inner">
                        <h2>Theatres</h2>
                        <span class="simg"><img src="img/theatre-modheader-simg.png" alt=" "></span>
                    </div>
                </div>
<?php

$theat=$th->getalltheatres();

?>
                <div class="mod-content">
                    <div class="row-fluid">
                        <div class="span12">
                            
                            <div class="accordion" id="theatres-accordion">
<?php for($i=0;$i<count($theat);$i++){   ?>
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#theatres-accordion" href="#collapse<?php echo $i; ?>">
                                            <?php echo $theat[$i]['theatre_name']; ?>
                                        </a>


                                    </div>


                                    <div id="collapse<?php echo $i; ?>" class="accordion-body collapse<?php if ($i==0) {?> in<?php } ?>">
                                        <div class="accordion-inner">

                                            <div class="map-canvas">
                                                <script>
                                                    $(document).ready(function(){
                                                        if ($('#collapse<?php echo $i; ?>').hasClass('in')) {
                                                            if (!$('#collapse<?php echo $i; ?>').find('iframe').length) {
                                                                $('#collapse<?php echo $i; ?> .map-canvas').html('<?php echo $theat[$i]['routemap']; ?>');
                                                            }
                                                        } else {
                                                            $('#theatres-accordion').on('show', function () {
                                                                if (!$('#collapse<?php echo $i; ?>').find('iframe').length) {
                                                                    $('#collapse<?php echo $i; ?> .map-canvas').html('<?php echo $theat[$i]['routemap']; ?>');
                                                                }
                                                            })
                                                        }
                                                    });
                                                </script>
                                            </div>

                                            <div class="desc">
                                                <div class="clearfix"><?php echo $theat[$i]['extra_details']; ?></div>
                                                <p><strong>No. of seats:</strong><?php echo $theat[$i]['no_seats']; ?></p>
                                                        <p><strong>Main image path:</strong>uploads/<?php echo $theat[$i]['image_loc']; ?></p>
                                                         <p><a href="#" class="btn">View Gallery</a></p>
                                                        <?php   
$cbn=new Theatreimage();
$imgs=$cbn->getallimgs();
for($j=0;$j<count($imgs);$j++){
                                                         ?>

<a href="#uploads/<?php echo $imgs[$j]['image_loc'];  ?>"><img src="uploads/<?php echo $imgs[$j]['image_loc'];  ?>" width="100px" height="100px"/><span><?php echo $imgs[$j]['image_name'];  ?> </span> </a>
                                                         <?php } ?>

                                               
                                            </div>

                                        </div>
                                    </div>
                                </div> <!-- .accordion-group -->

                               <?php  } ?>

                            </div> <!-- .accordion -->


                        </div>
                    </div>
                </div> <!-- .mod-content -->

            </div>
        </section> <!-- #theatres -->
<?php
$ath=new Auth();
$aboutus=$ath->getaboutus();

?>
       
       <section id="aboutus" class="clearfix">
            <div class="para">
                <div class="container clearfix">

                    <div class="row-fluid">
                        <div class="span12">
                            <div class="mod-content">
                                <h2>About Us</h2>

                                <p><?php echo $aboutus[0]['description']; ?></p>

                         <!--  <img src="uploads/<?php echo $aboutus[0]['image']; ?> ">     -->

                            </div> <!-- .mod-content -->
                        </div>
                    </div>

                </div>
            </div>

        </section> <!-- #aboutus -->
        <section id="contactus" class="main clearfix">
            <div class="container clearfix">
<?php

$contactus=$ath->getcontactus();
?>
                <div class="mod-header">
                    <div class="inner">
                        <h2>Contact Us</h2>
                        <span class="simg"><img src="img/theatre-modheader-simg.png" alt=" "></span>
                    </div>
                </div>

                <div class="mod-content">
                    <div class="row-fluid">
                        <div class="span12">
                         <p> <strong> Email:</strong> <?php echo $contactus[0]['email'];  ?>  </p>   
                          <p> <strong> Landline:</strong><?php echo $contactus[0]['landline'];  ?>   </p>  
                          <p> <strong> Mobile:</strong>  <?php echo $contactus[0]['mobile'];  ?> </p> 
                           <p> <strong>Address:</strong>   <?php echo $contactus[0]['address'];  ?></p>   
                        </div>
                    </div>
                </div> <!-- .mod-content -->

            </div>
        </section> <!-- #contactus -->


        <!-- <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script> -->
    </body>
</html>
