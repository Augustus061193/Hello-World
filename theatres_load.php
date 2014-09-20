        <section id="theatres" class="main clearfix">
            <div class="container clearfix">

                <div class="mod-header">
                    <div class="inner">
                        <h2>Theatres</h2>
                        <span class="simg"><img src="/img/theatre-modheader-simg.png" alt=" "></span>
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
                                        <h1>
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#theatres-accordion" href="#collapse<?php echo $i; ?>"><?php echo $theat[$i]['theatre_name']; ?></a>
                                        </h1>
                                    </div>


                                    <div id="collapse<?php echo $i; ?>" class="accordion-body collapse<?php if ($i==0) {?> in<?php } ?>">
                                        <div class="accordion-inner">

                                            <div class="map-canvas">
                                                <img data-src="/uploads/<?php echo $theat[$i]['image_loc']; ?>" src="" alt=" ">
                                            </div>

                                            <div class="desc">
                                                <div class="clearfix"><?php echo $theat[$i]['extra_details']; ?></div>
                                                <p><strong>No. of seats:</strong><?php echo $theat[$i]['no_seats']; ?></p>
                                                         <p>
                                                            <a href="#map<?php echo $i; ?>" class="btn various-map mapbtn<?php echo $i; ?>">View Map</a>
                                                            <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#th-gal<?php echo $i; ?>">View Gallery</button>
                                                         </p>

                                                         <div id="map<?php echo $i; ?>" class="map-inline" style="display:none;">
                                                             <script>
                                                                var map<?php echo $i; ?> = '<?php echo $theat[$i]['routemap']; ?>';
                                                                $('.mapbtn<?php echo $i; ?>').click(function(event){
                                                                    event.preventDefault();
                                                                    $('#map<?php echo $i; ?>').html(map<?php echo $i; ?>);
                                                                })
                                                             </script>
                                                             

                                                         </div>


<div id="th-gal<?php echo $i; ?>" class="collapse">

    <div class="view-gallery">
        <ul>
            <?php   
                $cbn=new Theatreimage();
                $id=$theat[$i]['theatre_id'];
                $imgs=$cbn->getthtimgs($id);
                for($j=0;$j<count($imgs);$j++){
            ?>
            <li>
                <div class="thumb">
                    <a class="various-gal" title="<?php echo $imgs[$j]['image_name']; ?>" rel="fancybox-mov<?php echo $i; ?>" href="/uploads/<?php echo $imgs[$j]['image_loc']; ?>">
                        <img src="/thumb.php?file=uploads/<?php echo $imgs[$j]['image_loc'];  ?>&size=150px" alt="<?php echo $imgs[$j]['image_name']; ?>">
                    </a>
                </div>
                <span class="title"><?php echo $imgs[$j]['image_name']; ?></span>
            </li>

            <?php } ?>
        </ul>
    </div> <!-- .view-gallery -->



</div>
                                                        





                                               
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