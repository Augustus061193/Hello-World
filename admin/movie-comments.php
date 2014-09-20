<?php include_once 'header.php'; ?>
<?php
$main="settings";
$df=new Auth();
$set=$df->getsettingsbasic();
$sub="movset";

if(isset($_POST["close"])){
    $message    =   new Message('Action Cancelled','warning');
    $message->setMessage();
    header("Location:home.php");
    exit;
}

if(isset($_POST["save"])){
   $moviecount        =   trim($_POST['movie_count']);
    $comment       =   trim($_POST['comment']);
$cn= new Auth();
$vb=$cn->updatebasic($moviecount,$comment);
if($vb)
{
    header("Location:home.php");
exit;
}
exit;
}
?>

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
                        <li><a href="#">Settings</a></li>
                        <li><span class="divider"></span></li>
                        <li><a href="#">Movies and comments</a></li>
                    </ul>

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

                        <form action="movie-comments.php" method="post">

                        <div class="mod-header clearfix">
                            <div class="pull-left">

                                <div class="row">

                                    <div class="span6">
                                        <input class="btn btn-success" type="submit" value="Update" name="save">
                                        <input class="btn btn-danger" type="button" value="Close" name="close">
                                    </div>

                                </div>

                            </div>

                        </div> <!-- .mod-header -->

                        <div class="mod-content">

                            <div class="row-fluid">
                                <div class="span12">
                                    <h4 class="orange">Movie</h4>
                                </div>
                            </div>


                            <div class="row-fluid">
                                <div class="span4">
                                    <label>Show at most in home page</label>
                                </div>
                                <div class="span8">
                                    <input type="text" class="input-small" value="<?php echo $set[0]['movie_count'];  ?>" name="movie_count">
                                </div>
                            </div>


                            <hr>

                            <div class="row-fluid">
                                <div class="span12">
                                    <h4 class="orange">Comments</h4>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="span4">
                                    <label>Show Comments</label>
                                </div>
                                <div class="span8">
                                    <select class="input-small" name="comment">
                                        <option value="1" <?php if($set[0]['comment_show']==1) {  ?> selected="selected" <?php     } ?> >Show</option>
                                        <option value="0" <?php if($set[0]['comment_show']==0) {  ?> selected="selected" <?php     } ?>>Hide</option>
                                    </select>
                                </div>
                            </div>

                    
                        </div> <!-- .mod-content -->

                        </form>



                    </div> <!-- .viewlist-all -->

                </div> <!-- .main -->

            </div>
<?php include_once 'footer.php'; ?>


        </div> <!-- #content -->

    </body>
</html>
