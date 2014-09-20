<?php
ob_start();
include("autoload.php");
$db   = new MySql();
$db->connect();
$ath=new Auth();
$basicdet=$ath->getsettingsbasic();
$evntImg = $ath->getSliderImage();
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
        <script>
            var ismobile = (/iphone|ipod|android|blackberry|opera mini|opera mobi|skyfire|maemo|windows phone|palm|iemobile|symbian|symbianos|fennec/i.test(navigator.userAgent.toLowerCase())),
                istablet = (/ipad|android 3|sch-i800|playbook|tablet|kindle|gt-p1000|sgh-t849|shw-m180s|a510|a511|a100|dell streak|silk/i.test(navigator.userAgent.toLowerCase()));
        </script>
        <script src="/js/main.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
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
                <div class="container clearfix">

                    <div class="row">

                        <div class="span12">
                            <a href="/" id="home-logo"><img src="/img/home-logo.png" alt=" "></a>
                            <div class="pull-right hidden-phone">
                                <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FAiswaryaCinemaScreens&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:75px; height:21px; margin-top: 46px;" allowTransparency="true"></iframe>
                            </div>
                        </div>

                        <div class="span12">
                            <div class="homeslider-outer clearfix">
                                    
                                <div class="camera_wrap" id="camera_wrap">

                                        <?php
                                            $th3= new Theatre();
                                            $mov3=new Movie();
                                            for($k=0;$k<count($nowrun);$k++) { ?> <?php 
                                                $movieid=$nowrun[$k]['movie_id'];
                                                $movieshows=$mov3->getshowsmain($movieid);
                                        ?>
                                        <div class="slide" data-src="" data-rel="/uploads/<?php echo $nowrun[$k]['poster']; ?>">
                                            <div class="camera_caption">

                                                <div class="name"><strong><?php echo $nowrun[$k]['movie_name'];  ?></strong></div>
                                                <?php
                                                    for($j=0;$j<count($movieshows);$j++) { 
                                                    $theatreid=$movieshows[$j]['theatre_id'];
                                                    $theatres=$th3->gettheatre($theatreid);
                                                ?>
                                                <div class="time"> <strong><?php echo $theatres[0]['theatre_name'];  ?>   : </strong>

                                                <?php

                                                    if($movieshows[$j]['ms_status']==1){
                                                        echo $theatres[0]['ms_time'];
                                                      
                                                    }

                                                    if($movieshows[$j]['mat_status']==1){
                                                          echo ",";
                                                        echo $theatres[0]['matinee_time'];
                                                        
                                                    }

                                                    if($movieshows[$j]['evg_status']==1){
                                                        echo ",";
                                                        echo $theatres[0]['evg_time'];
                                                     
                                                    }
                                                    if($movieshows[$j]['sec_status']==1){
                                                           echo ",";
                                                        echo $theatres[0]['second_time'];
                                                       
                                                    }
                                                    if($movieshows[$j]['extrashow1_status']==1){
                                                         echo ",";
                                                        echo $theatres[0]['extrashow1_time'];
                                                       
                                                    }
                                                    if($movieshows[$j]['extrashow2_status']==1){
                                                         echo ",";
                                                        echo $theatres[0]['extrashow2_time'];
                                                       
                                                    }
                                                ?>
                                                </div>
                                                <?php } ?>

                                            </div>

                                        </div>


                                        <?php } ?>

                                </div> <!-- #camera_wrap -->
                            </div>

                        </div>

                    </div>
                    


                
                </div> <!-- .container -->
<?php
 $nw=new News();
    $news=$nw->getall();

?>
<?php  if(count($news)>0) { ?>
            <div class="news-slider">
                <div class="container clearfix">
                <ul id="newsticker" class="marquee">
                <?php for($i=0;$i<count($news);$i++){ ?>
                    <li>
                        <span class="title"><?php echo $news[$i]['title']; ?>&nbsp;-&nbsp;</span>
                        <?php 
                        $findArray    = array("<p>","</p>");
                        $replaceArray = array("","");
                        $desVal       = str_replace($findArray, $replaceArray, $news[$i]['content']); echo $desVal; ?>
                    </li>
                <?php } ?>
                </ul>
                </div>
            </div> <!-- .news-slider -->

<?php  } ?>
            <div class="sticky-container">
                <div id="sticky-bar">
                    <div class="sb-in">
                        
                        <span class="running"></span>
                        <div class="container">
                            <nav>
                                <div class="logo"><a data-id="#home" href="#home"><img src="/img/sticky-bar-logo.png" alt=" "></a></div>
                                <ul class="nav">
                                    <li class="booknow"><a href="http://ticketnew.com/scheduleiframe/theatre/partnersites/Vismaya/default.aspx?MultiplexID=OA%3d%3d-HcNO4%2bhfLZk%3d">Tickets</a></li>
                                    <li><a data-id="#movies" href="#movies">Movies</a></li>
                                    <li><a data-id="#theatres" href="/theatres/">Theatres</a></li>
                                    <li><a data-id="#aboutus" href="/aboutus/">About Us</a></li>
                                    <li><a data-id="#contactus" href="/contactus/">Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div> <!-- .sticky-container -->



        </div> <!-- #homesection -->

        </section> <!-- #home -->


        <div class="clearfix"></div>


        <section id="movies" class="main">
            <div class="container clearfix">

                <div class="mod-header">
                    <div class="inner">
                        <h2>Movies</h2>
                        <span class="simg"><img src="/img/movies-modheader-simg.png" alt=" "></span>
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
                            <div class="span6 list <?php if($movies[$i]['movie_status']==1){  echo "now";  } ?>">
                                <div class="inner">
                                    <img data-src="/uploads/<?php echo $movies[$i]['poster'];  ?>" src="" alt="<?php echo $movies[$i]['movie_name'];  ?>" class="p">
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
   
}
if($movieshows[$j]['mat_status']==1){
 echo ",";
    echo $theatres[0]['matinee_time'];
     
}
if($movieshows[$j]['evg_status']==1){
 echo ",";
    echo $theatres[0]['evg_time'];
    
}
if($movieshows[$j]['sec_status']==1){
  echo ",";
    echo $theatres[0]['second_time'];
      
}
if($movieshows[$j]['extrashow1_status']==1){
echo ",";
    echo $theatres[0]['extrashow1_time'];
     
}
if($movieshows[$j]['extrashow2_status']==1){
 echo ",";
    echo $theatres[0]['extrashow2_time'];
     
}



?>

</p></div>

<?php 

}

                                             ?>

                                        
                                        <p><?php echo $movies[$i]['actors'];  ?></p>
                                        <div class="clearfix"><a href="/movie/<?php echo $movies[$i]['movie_id'];  ?>" class="btn">View Details</a></div>
                                    </div>
                                </div>
                            </div> <!-- .list -->
<?php } else {  ?>
                            <div class="span3 list <?php if($movies[$i]['movie_status']==1){  echo "now";  } ?>">
                                 <div class="inner">
                                    <img data-src="/uploads/<?php echo $movies[$i]['poster'];  ?>" src="" alt="<?php echo $movies[$i]['movie_name'];  ?>" class="p">
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
   
}
if($movieshows[$j]['mat_status']==1){
 echo ",";
    echo $theatres[0]['matinee_time'];
     
}
if($movieshows[$j]['evg_status']==1){
 echo ",";
    echo $theatres[0]['evg_time'];
      
}
if($movieshows[$j]['sec_status']==1){
echo ",";
    echo $theatres[0]['second_time'];
    
}
if($movieshows[$j]['extrashow1_status']==1){
  echo ",";
    echo $theatres[0]['extrashow1_time'];
      
}
if($movieshows[$j]['extrashow2_status']==1){
echo ",";
    echo $theatres[0]['extrashow2_time'];
     
}

?>

</p></div>

<?php 

}

                                             ?>
                                        <p><?php echo $movies[$i]['actors'];  ?></p>
                                        <div class="clearfix"><a href="/movie/<?php echo $movies[$i]['movie_id'];  ?>" class="btn">View Details</a></div>
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


<?php
    include 'theatres_load.php';
    include 'aboutus_load.php';
    include 'contactus_load.php';
	if($evntImg[0]['pass_key'] == 1):
?>

 <script>
    $(window).bind("load", function() {
        if (!(ismobile))  {
        <?php if($evntImg[0]['name'] == 1):?>
            if( !$.cookie('showOnlyOne') ){
                $.cookie('showOnlyOne', 'showOnlyOne', { expires: 1 });
                <?php endif;?>
                $(document).avgrund({
                    width: 550,
                    holderClass: 'welcome-box',
                    showClose: true,
                    showCloseText: 'Close',
                    enableStackAnimation: true,
                    openOnEvent: false,
                    template:
                    '<div class="inner">'
                        +
                            '<img src="./uploads/<?php echo $evntImg[0]['logo'];?>" alt=" ">'
                        +
                    '</div>'
                });
                <?php if($evntImg[0]['name'] == 1):?>
            }
            <?php endif;?>
        }
    });
</script>  
<?php endif;?>


        <!-- <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script> -->
    </body>
</html>
