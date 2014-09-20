<?php include_once 'header.php'; ?>

        <div id="fixedbar">
            <div id="topbar">
                <div class="wrapper clearfix">

                     <?php include_once 'logo.php'; ?>

<?php include_once 'topmovie-buttons.php'; ?>

<?php include_once 'user-settings-topbar.php'; ?>

                </div>
            </div> <!-- #topbar -->

            <div id="nav-toolbar">
                <div class="wrapper clearfix">

                    <ul class="breadcrumb pull-left">
                        <li><a href="#">Movies</a></li>
                        <li><span class="divider"></span></li>
                        <li><a href="#">Add</a></li>
                    </ul>

                    <div class="pull-left">

                        <div class="form-horizontal pull-left row">
                            <label class="title control-label" for="inputTitle">Movie</label>
                            <div class="controls"><input type="text" id="inputTitle" placeholder="Movie title"></div>
                        </div>

                        <div class="span4">
                            <input class="btn btn-success" type="submit" value="Publish">
                            <input class="btn btn-info" type="button" value="Save">
                            <input class="btn btn-danger" type="button" value="Close">
                        </div>
                        
                    </div>

<?php include 'dev-settings-nav-toolbar.php'; ?>

                </div>
            </div> <!-- #nav-toolbar -->
        </div> <!-- #fixedbar -->

<?php include_once 'dev-settings.php'; ?>


        <div id="content" class="clearfix">
            <div class="wrapper clearfix">

                <div class="aside">

<?php include 'sidenav.php'; ?>

                </div> <!-- .aside -->

                <div class="main">

                    <div class="add-edit">

                        <form action="#">

                        <div class="mod-content">

                            <div class="row-fluid">
                                
                                <div class="row-fluid">

                                    <div class="span9 col-left">
                                        
                                        <div class="row-fluid">
                                          <div class="span12">
                                            <h5 class="orange">Description</h5>





                                            <textarea class="input-block-level" class="ckeditor" name="editor1" id="editor1"></textarea>

<script type="text/javascript">
    CKEDITOR.replace( 'editor1' );
</script>
                                          </div>
                                        </div>

                                        <hr>

                                        <script>
                                            $(function() {

                                                $( "#release-datepicker").datepicker();

                                            });
                                        </script>

                                        <div class="row-fluid">

                                            <div class="span6">
                                                <label>Release date</label>
                                                <input type="text" id="release-datepicker">
                                            </div>

                                            <div class="span6">
                                                <label>Main actors</label>
                                                <textarea></textarea>
                                            </div>

                                        </div>

                                        <hr>

                                        <div class="row-fluid">

                                            <div class="span12">
                                                <h5 class="orange">Add Poster</h5>
                                            </div>

                                            <div class="row-fluid">
                                                
                                                <div class="span4">
                                                    <label>Title</label>
                                                    <input type="text" class="input-block-level">
                                                    <label>Select File</label>
                                                    <input class="input-block-level" type="file">
                                                    <label class="radio">Poster <input type="radio"></label>
                                                    <div class="btn-group">
                                                        <button class="btn btn-primary" type="button">Add</button>
                                                        <button class="btn btn-danger" type="button">Remove</button>
                                                    </div>
                                                    

                                                </div>

                                                <div class="span8">


                                                    <ul class="thumbnails">

                                                    <?php 
                                                        for ($i=0; $i < 5; $i++) { 
                                                    ?>
                                                      <li class="span4">
                                                        <div class="thumbnail" title="Consectetur purus sit">
                                                            <input type="text" class="input-block-level" value="Consectetur purus sit">
                                                            <p><img src="img/pic/260.png" alt=" "></p>
                                                            <div class="btn-group">
                                                                <a href="#" class="btn btn-success"><i class="icon-ok"></i></a>
                                                                <a href="#" class="btn"><i class="icon-trash"></i></a>
                                                                <a href="#" class="btn" rel="tooltip" title="Set Movie Poster"><i class="icon-star"></i></a>
                                                            </div>
                                                        </div>
                                                      </li>
                                                  <?php } ?>

                                                    </ul>

                                                </div>
                                            </div>

                                        </div>

                                        <hr>

                                        <div class="row-fluid">

                                            <div class="span12">
                                                <h5 class="orange">Add Trailer</h5>
                                            </div>

                                            <div class="row-fluid">
                                                
                                                <div class="span4">
                                                    <label>Title</label>
                                                    <input type="text" class="input-block-level">
                                                    <label>Url</label>
                                                    <input class="input-block-level" type="text">
                                                    <label class="radio">Teaser <input type="radio"></label>
                                                    <div class="btn-group">
                                                        <button class="btn btn-primary" type="button">Add</button>
                                                        <button class="btn btn-danger" type="button">Remove</button>
                                                    </div>
                                                    

                                                </div>

                                                <div class="span8">


                                                    <ul class="thumbnails">


                                                    <?php 
                                                        for ($i=0; $i < 5; $i++) { 
                                                    ?>
                                                      <li class="span4">
                                                        <div class="thumbnail" title="Consectetur purus sit">
                                                            <input type="text" class="input-block-level" value="Consectetur purus sit">
                                                            <p><iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe></p>
                                                            <div class="btn-group">
                                                                <a href="#" class="btn btn-success"><i class="icon-ok"></i></a>
                                                                <a href="#" class="btn"><i class="icon-trash"></i></a>
                                                                <a href="#" class="btn" rel="tooltip" title="Set Movie Poster"><i class="icon-star"></i></a>
                                                            </div>
                                                        </div>
                                                      </li>
                                                  <?php } ?>


                                                    </ul>

                                                </div>
                                            </div>

                                        </div>

                                        <hr>

                                        
                                        <hr>


                                    </div> <!-- .col-left -->

                                    <div class="span3 sidebar">

                                    <script>
                                        $(function() {

                                             $('.theatre-select .collapse input.cus-rate-checkbox').each(function(){
                                                if ($(this).is(':checked')) {
                                                    $(this).parent().parent().parent().find('.cus-rate').slideToggle('show');
                                                };
                                             });

                                            $('.theatre-select .collapse input.cus-rate-checkbox').click(function(){
                                                if ($('.theatre-select .collapse input.cus-rate-checkbox').is(':checked')) {
                                                    $(this).parent().parent().parent().find('.cus-rate').slideToggle('show');
                                                } else {
                                                    $(this).parent().parent().parent().find('.cus-rate').slideToggle('hide');
                                                }
                                            });

                                        });
                                    </script>


                                        <div class="alert alert-block userselect-none">
                                            <label class="checkbox">3D Technoligy<input type="checkbox"></label>
                                        </div>
                                      

                                        <div class="theatre-select alert alert-info userselect-none">
                                            <div>
                                                <label data-toggle="collapse" data-target="#vismaya" class="theatre-name"><strong>Vismaya </strong><span class="label label-success"> Active</span></label>
                                            </div>
                                            <div id="vismaya" class="collapse in">
                                                
                                                <label class="checkbox"><input class="cus-rate-checkbox" type="checkbox" checked> Set Custom rate</label>
                                                <h6 class="label label-info">Show details:</h6>

                                                <div class="list">
                                                    <label class="checkbox"><input type="checkbox"> 11.30 AM</label>
                                                    <div class="cus-rate">
                                                        <label>Rate <input class="input-block-level" type="text"></label>
                                                        <label class="cus-3drate">3D <input class="input-block-level" type="text"></label>
                                                    </div>
                                                </div>

                                                <div class="list">
                                                    <label class="checkbox"><input type="checkbox"> 11.30 AM</label>
                                                    <div class="cus-rate">
                                                        <label>Rate <input class="input-block-level" type="text"></label>
                                                        <label class="cus-3drate">3D <input class="input-block-level" type="text"></label>
                                                    </div>
                                                </div>

                                                <div class="list">
                                                    <label class="checkbox"><input type="checkbox"> 11.30 AM</label>
                                                    <div class="cus-rate">
                                                        <label>Rate <input class="input-block-level" type="text"></label>
                                                        <label class="cus-3drate">3D <input class="input-block-level" type="text"></label>
                                                    </div>
                                                </div>

                                                <div class="list">
                                                    <label class="checkbox"><input type="checkbox"> 11.30 AM</label>
                                                    <div class="cus-rate">
                                                        <label>Rate <input class="input-block-level" type="text"></label>
                                                        <label class="cus-3drate">3D <input class="input-block-level" type="text"></label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="theatre-select alert alert-info userselect-none">
                                            <div>
                                                <label data-toggle="collapse" data-target="#laya" class="theatre-name"><strong>Laya </strong></label>
                                            </div>
                                            <div id="laya" class="collapse">
                                                
                                                <label class="checkbox"><input class="cus-rate-checkbox" type="checkbox"> Set Custom rate</label>
                                                <h6 class="label label-info">Show details:</h6>

                                                <div class="list">
                                                    <label class="checkbox"><input type="checkbox"> 11.30 AM</label>
                                                    <div class="cus-rate">
                                                        <label>Rate <input class="input-block-level" type="text"></label>
                                                        <label class="cus-3drate">3D <input class="input-block-level" type="text"></label>
                                                    </div>
                                                </div>

                                                <div class="list">
                                                    <label class="checkbox"><input type="checkbox"> 11.30 AM</label>
                                                    <div class="cus-rate">
                                                        <label>Rate <input class="input-block-level" type="text"></label>
                                                        <label class="cus-3drate">3D <input class="input-block-level" type="text"></label>
                                                    </div>
                                                </div>

                                                <div class="list">
                                                    <label class="checkbox"><input type="checkbox"> 11.30 AM</label>
                                                    <div class="cus-rate">
                                                        <label>Rate <input class="input-block-level" type="text"></label>
                                                        <label class="cus-3drate">3D <input class="input-block-level" type="text"></label>
                                                    </div>
                                                </div>

                                                <div class="list">
                                                    <label class="checkbox"><input type="checkbox"> 11.30 AM</label>
                                                    <div class="cus-rate">
                                                        <label>Rate <input class="input-block-level" type="text"></label>
                                                        <label class="cus-3drate">3D <input class="input-block-level" type="text"></label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                         



                                    </div> <!-- .sidebar -->

                                  </div>

                            </div> <!-- .container-fluid -->



                        </div> <!-- .mod-content -->

                        </form>



                    </div> <!-- .add-edit -->

                </div> <!-- .main -->

            </div>

<?php include_once 'footer.php'; ?>

        </div> <!-- #content -->

    </body>
</html>
    