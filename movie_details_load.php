<?php
$movieid=$_GET['movieid'];
$cx=new Movie();
$thl=new Theatre();
$movdet=$cx->getmovie($movieid);
?>
      <div class="mod-header">
                        <div class="top row-fluid">
                            <div class="span9">
                                   <?php
                           $movieid=$movdet[0]['movie_id'];
                           $movieshows=$cx->getshowsmain($movieid);
                           ?>
                           <?php     
for($j=0;$j<count($movieshows);$j++) { 

$theatreid=$movieshows[$j]['theatre_id'];
$theatres=$thl->gettheatre($theatreid);
?>
                                <p class="meta"><strong><?php echo $theatres[0]['theatre_name'];  ?>: </strong>

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
     
}
if($movieshows[$j]['extrashow1_status']==1){
echo ",";
    echo $theatres[0]['extrashow1_time'];
      echo ",";
}
if($movieshows[$j]['extrashow2_status']==1){

    echo $theatres[0]['extrashow2_time'];
     
}



?>
<?php 

}

                                             ?>

</p>
                                <h1><?php echo $movdet[0]['movie_name'];  ?></h1>
                            </div>
                            <div class="span2 offset1 status"><span><?php if($movdet[0]['movie_status']==0){    ?>Upcoming <?php }else { ?> Now Running <?php } ?></span></div>
                        </div>
                    </div>

                    <div class="mod-content">
                        <figure class="main-fig"><img src="/uploads/<?php echo $movdet[0]['poster'];  ?>" alt=" "></figure>

                        <h5>Cast &amp; Crew</h5>

                        <p><?php echo $movdet[0]['actors'];  ?></p>

                        <h5>Storyline</h5>

                        <p><?php echo $movdet[0]['description'];  ?></p>

                        <hr>

                    </div>

                    <div class="row-fluid">

                        <div class="span8">
                            <div class="tabs">
                                
                                <ul class="nav-tabs clearfix" id="gallery-tab">
                                    <li class="active"><a href="#mov-teaser" data-toggle="tab">Teaser</a></li>
                                    <li><a href="#mov-videos" data-toggle="tab">Videos</a></li>
                                    <li><a href="#mov-photos" data-toggle="tab">Photos</a></li>
                                </ul>
                                 
                                <div class="tab-content">

                                    <div class="tab-pane active fade in" id="mov-teaser">

                                        <div class="mov-teaser">
                                           
                                      <?php
$code= $movdet[0]['trailer'];
$org        =         $code;
$pattern        =        '/width="([0-9]+)"/';
$rep                =        'width="100%"';

$code        =        preg_replace($pattern,$rep,$code);




$pattern        =        '/height="([0-9]+)"/';
$rep                =        'height="100"';


$code        =        preg_replace($pattern,$rep,$code);


echo $code;
?> 


                                        </div>

                                    </div>

                                    <div class="tab-pane" id="mov-videos">
                                        <div class="view-gallery">
                                            <ul>
                                                  <?php
$dv=new Trailer();
$trailers=$dv->gettrailers($movieid);

                                            ?>
                                            <?php for($i=0;$i<count($trailers);$i++){   ?>
                                                <li>
                                                    <div class="thumb">
                                                     
                                                  
<?php
$code=$trailers[$i]['url'];
$org        =         $code;
$pattern        =        '/width="([0-9]+)"/';
$rep                =        'width="100%"';

$code        =        preg_replace($pattern,$rep,$code);




$pattern        =        '/height="([0-9]+)"/';
$rep                =        'height="100"';


$code        =        preg_replace($pattern,$rep,$code);


echo $code;
?>

                                                    </div>
                                                    <span class="title"><?php echo $trailers[$i]['name']; ?>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="mov-photos">
                                        <div class="view-gallery">
                                            <ul>
   <?php
$sx=new Movieimage();
$imgs=$sx->getimages($movieid);

                                            ?>
                                             <?php for($i=0;$i<count($imgs);$i++){   ?>
                                                <li>
                                                    <div class="thumb">
                                                        <a href="/uploads/<?php echo $imgs[$i]['image_loc']; ?>" class="various-gal" rel="fancybox-g" title="<?php echo $imgs[$i]['image_name']; ?>"><img src="uploads/<?php echo $imgs[$i]['image_loc']; ?>" alt="<?php echo $imgs[$i]['image_name']; ?>"></a>
                                                    </div>
                                                    <span class="title"><?php echo $imgs[$i]['image_name']; ?></span>
                                                </li>
                                              <?php } ?>
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="span4 clearfix">
                        
                            <div class="showtime">
                                <!-- <h5>Showtime and Rate</h5> -->

                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>Theatre Name</th>
                                      <th>Showtime</th>
                                    </tr>
                                  </thead>
                                  <tbody>

       <?php
                           $movieid=$movdet[0]['movie_id'];
                           $movieshows=$cx->getshowsmain($movieid);
                           ?>
                           <?php     
for($j=0;$j<count($movieshows);$j++) { 

$theatreid=$movieshows[$j]['theatre_id'];
$theatres=$thl->gettheatre($theatreid);
?>
                                    
 <?php if($movieshows[$j]['ms_status']==1) {   ?>

<tr>
  <td><?php echo $theatres[0]['theatre_name']; ?> </td> 
  <td><?php echo $theatres[0]['ms_time'];  ?> </td>

    <?php  if($movdet[0]['proj_status']==0){ ?>

    <!-- <td>2D - <?php echo $theatres[0]['ms_2d_rate']; ?> RS</td> -->
    <?php }
    else { 
    ?>
<!-- <td>3D - <?php echo $theatres[0]['ms_3d_rate']; ?> RS</td> -->
</tr>
<?php } ?>

  <?php  } ?>  


 <?php
if($movieshows[$j]['mat_status']==1){   ?>
  <tr>
<td><?php echo $theatres[0]['theatre_name']; ?> </td> 

  <td><?php echo $theatres[0]['matinee_time'];  ?> </td> 
<?php  if($movdet[0]['proj_status']==0){              ?>
    <!-- <td>2D - <?php echo $theatres[0]['mat_2d_rate']; ?> RS</td> -->
    <?php } else{  ?>

<!-- <td>3D - <?php echo $theatres[0]['mat_3d_rate']; ?> RS</td> -->
</tr>
<?php   }    ?>

  <?php 
} ?>  


 <?php
if($movieshows[$j]['evg_status']==1){   ?><tr>
<td><?php echo $theatres[0]['theatre_name']; ?> </td> 
<td> <?php echo $theatres[0]['evg_time'];  ?>  </td> 
<?php  if($movdet[0]['proj_status']==0){              ?>
    <!-- <td>2D - <?php echo $theatres[0]['evg_2d_rate']; ?> RS</td> -->
    <?php } else{  ?>

<!-- <td>3D - <?php echo $theatres[0]['evg_3d_rate']; ?> RS</td> --></tr>
<?php   }    ?>

  <?php 
} ?>  

 <?php
if($movieshows[$j]['sec_status']==1){   ?><tr>
<td><?php echo $theatres[0]['theatre_name']; ?> </td> 
  <td> <?php echo $theatres[0]['second_time'];  ?> </td> 
<?php  if($movdet[0]['proj_status']==0){              ?>
    <!-- <td>2D - <?php echo $theatres[0]['sec_2d_rate']; ?> RS</td> -->
    <?php } else{  ?>

<!-- <td>3D - <?php echo $theatres[0]['sec_3d_rate']; ?> RS</td> --></tr>
<?php   }    ?>

  <?php 
} ?>  


 <?php
if($movieshows[$j]['extrashow1_status']==1){   ?><tr>
<td><?php echo $theatres[0]['theatre_name']; ?></td>
<td><?php echo $theatres[0]['extrashow1_time'];  ?> </td> 

<?php  if($movdet[0]['proj_status']==0){              ?>
    <!-- <td>2D - <?php echo $theatres[0]['extrashow1_2d_rate']; ?> RS</td> -->
    <?php } else{  ?>

<!-- <td>3D - <?php echo $theatres[0]['extrashow1_3d_rate']; ?> RS</td> --></tr>
<?php   }    ?>

  <?php 
} ?>  

 <?php
if($movieshows[$j]['extrashow2_status']==1){   ?><tr>
<td><?php echo $theatres[0]['theatre_name']; ?> &nbsp;&nbsp;&nbsp; <?php  
    echo $theatres[0]['extrashow2_time'];  ?> </td> 
<?php  if($movdet[0]['proj_status']==0){              ?>
    <!-- <td>2D - <?php echo $theatres[0]['extrashow2_2d_rate']; ?> RS</td> -->
    <?php } else{  ?>

<!-- <td>3D - <?php echo $theatres[0]['extrashow2_3d_rate']; ?> RS</td> --></tr>
<?php   }    ?>

  <?php 
} ?>  
                             



                                   
<?php 

}
 ?>
</tbody>
                                 

                                </table>
                            </div>

                        </div>


                    </div>