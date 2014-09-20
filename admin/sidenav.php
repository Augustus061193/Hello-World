                    <ul class="sidenav">
                        <li <?php if($main=='home'){  ?> class="current" <?php } ?> ><a href="home.php"><i class="icon-home"></i><span>Overview</span></a></li>
                        <li <?php if($main=='movie'){  ?> class="current" <?php } ?>  ><a href="allmovies.php"><i class="icon-facetime-video"></i><span>Movies</span></a>
                            <?php if($main=='movie'){  ?>
                            <ul>
                                <li <?php if($sub=='allmovie'){  ?> class="current"  <?php } ?>><a href="allmovies.php"><span>All</span></a></li>
                                <li <?php if($sub=='addmovie'){  ?> class="current"  <?php } ?>><a href="addmovie.php"><span>Add</span></a></li>
                            </ul>
                            <?php } ?>
                        </li>
                        <li   <?php if($main=='theatre'){  ?> class="current"  <?php } ?>><a href="alltheatre.php"><i class="icon-th-large"></i><span>Theatre</span></a>
                                 <?php if($main=='theatre'){  ?>
                            <ul>
                                <li <?php if($sub=='alltheatre'){  ?> class="current"  <?php } ?>><a href="alltheatre.php"><span>All</span></a></li>
                                <li <?php if($sub=='addtheatre'){  ?> class="current"  <?php } ?>><a href="addtheatre.php"><span>Add</span></a></li>
                            </ul>
                              <?php } ?>
                        </li>
                        <li <?php if($main=='pages'){  ?> class="current"  <?php } ?>><a href="aboutus.php"><i class="icon-book"></i><span>Pages</span></a>
<?php if($main=='pages'){  ?>
                            <ul>
                                <li <?php if($sub=='about'){  ?> class="current"  <?php } ?> ><a href="aboutus.php"><span>About us</span></a></li>
                                <li <?php if($sub=='contact'){  ?> class="current"  <?php } ?>><a href="contactus.php"><span>Contact us</span></a></li>
                            </ul>
                            <?php } ?>
</li>
   <li <?php if($main=='news'){  ?> class="current"  <?php } ?>><a href="news-listing.php"><i class="icon-calendar"></i><span>News</span></a>
                             <?php if($main=='news'){  ?>
                            <ul>
                                <li <?php if($sub=='allnews'){  ?> class="current"  <?php } ?> ><a href="news-listing.php"><span>All</span></a></li>
                                <li <?php if($sub=='addnews'){  ?> class="current"  <?php } ?>><a href="addnews.php"><span>Add</span></a></li>
                            </ul>
                            <?php } ?>
                        </li>


                        <li <?php if($main=='settings'){  ?> class="current"  <?php } ?>><a href="settings-site.php"><i class="icon-cog"></i><span>Settings</span></a>
                             <?php if($main=='settings'){  ?>
                            <ul>
                                <li <?php if($sub=='basic'){  ?> class="current"  <?php } ?> ><a href="settings-site.php"><span>Basic</span></a></li>
                                <li <?php if($sub=='movset'){  ?> class="current"  <?php } ?>><a href="movie-comments.php"><span>Movies and comments</span></a></li>
                                <li <?php if($sub=='imgslider'){  ?> class="current"  <?php } ?>><a href="img-slider.php"><span>Event Banner</span></a></li>
                            </ul>
                            <?php } ?>
                        </li>
                    </ul> <!-- .sidenav -->