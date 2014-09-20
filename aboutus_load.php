<?php
    $ath=new Auth();
    $aboutus=$ath->getaboutus();
?>
       
       <section id="aboutus" class="clearfix">
            <div class="para" style="background-image: url('/uploads/<?php echo $aboutus[0]['image']; ?>');">
                <div class="container clearfix">

                    <div class="row-fluid">
                        <div class="span12">
                            <div class="mod-content">
                                <h2>About Us</h2>

                                <?php echo $aboutus[0]['description']; ?>
                                <div style="margin-top: 10px;">
                                    <a href="https://www.facebook.com/AiswaryaCinemaScreens" target="_blank" style="display: inline-block; margin: 0 10px 0;"><img style="vertical-align: initial;" src="/img/ui-icon-fb.png" alt=" "></a>
                                </div>
                            </div> <!-- .mod-content -->
                        </div>
                    </div>

                </div>
            </div>
        </section> <!-- #aboutus -->