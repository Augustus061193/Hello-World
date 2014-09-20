<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Vismas Admin Panel</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="jquery-ui-1.9.2.custom/css/flick/jquery-ui-1.9.2.custom.min.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="js/main.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div id="fixedbar">
            <div id="topbar">
                <div class="wrapper clearfix">

                    <h1 id="title"><a href="index.html"><img src="img/logo.png" alt="Logo"></a></h1>

                    <div class="pull-left">
                        <a href="addmovie.html" class="btn"><i class="icon-pencil"></i> Add New Movie</a>
                        <a href="allmovies.html" class="btn">All Movies</a>
                        <a href="#" class="btn btn-info">View Site</a>
                    </div> <!-- .fl -->

                    <div class="user-settings pull-right">
                        <span class="name">Admin</span>
                        <span class="btn-group">
                            <a href="#" class="btn btn-primary"><i class="icon-user icon-white"></i> Settings</a>
                            <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="#">User Managemant</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="i"></i> Logout</a></li>
                            </ul>
                        </span>
                    </div> <!-- .user-settings -->

                </div>
            </div> <!-- #topbar -->

            <div id="nav-toolbar">
                <div class="wrapper clearfix">

                    <ul class="breadcrumb pull-left">
                        <li><a href="#">Movies</a></li>
                        <li><span class="divider"></span></li>
                        <li><a href="#">All</a></li>
                    </ul>

                    <div class="pull-right">
                        <div class="btn-group">
                            <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-wrench"></i></span></button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="#">Send Feedback</a></li>
                                <li><a href="#">Help</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="i"></i> About admin panel</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div> <!-- #nav-toolbar -->
        </div> <!-- #fixedbar -->




        <div id="content" class="clearfix">
            <div class="wrapper clearfix">

                <div class="aside">

                    <ul class="sidenav">
                        <li><a href="#"><i class="icon-home"></i><span>Overview</span></a></li>
                        <li class="current"><a href="#"><i class="icon-facetime-video"></i><span>Movies</span></a>
                            <ul>
                                <li class="current"><a href="#"><span>All</span></a></li>
                                <li><a href="#"><span>Published</span></a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="icon-th-large"></i><span>Theatre</span></a></li>
                        <li><a href="#"><i class="icon-book"></i><span>Pages</span></a></li>
                        <li><a href="#"><i class="icon-cog"></i><span>Settings</span></a></li>
                    </ul> <!-- .nav -->

                </div> <!-- .aside -->

                <div class="main">

                    <div class="add-edit">

                        <form action="#">

                        <div class="mod-header clearfix">
                            <div class="pull-left">

                                <div class="row">

                                    <div class="span6">
                                        <input class="btn btn-success" type="submit" value="Update">
                                        <input class="btn btn-danger" type="button" value="Close">
                                    </div>

                                </div>

                            </div>

                        </div> <!-- .mod-header -->

                        <div class="mod-content">

                            <div class="row-fluid">
                                <div class="span12">
                                    <label>Description</label>
                                    <textarea class="input-block-level"></textarea>
                                </div>
                            </div>
                            <hr>

                            <div class="row-fluid">

                                <div class="span6">
                                    <label>Release date</label>
                                    <input type="text">
                                </div>

                                <div class="span6">
                                    <label>Main actors</label>
                                    <textarea></textarea>
                                </div>

                            </div>
                    



                        </div> <!-- .mod-content -->

                        </form>



                    </div> <!-- .viewlist-all -->

                </div> <!-- .main -->

            </div>

        <div id="footer" class="clearfix">
            &copy; Vismas 2013, Developed by <a href="#">63 media</a>, <a href="#">devbond.com</a>
        </div> <!-- #footer -->

        </div> <!-- #content -->

    </body>
</html>
