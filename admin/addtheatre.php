<?php include_once 'header.php'; ?>
<?php
$main="theatre";
$sub="addtheatre";
if(isset($_POST['save'])){


    $theatrename=trim(strip_tags($_POST['theatrename']));
    $routemap=trim($_POST['route']);
    $seats=trim($_POST['seats']);
    $mstime=trim($_POST['mstime']);
    $mstwodrate=trim($_POST['mstwodrate']);
  $msthreedrate=trim($_POST['msthreedrate']);

    $matineetime=trim($_POST['matineetime']);
      $mattwodrate=trim($_POST['mattwodrate']);
  $matthreedrate=trim($_POST['matthreedrate']);


    $evngtime=trim($_POST['evngtime']);
 $evgtwodrate=trim($_POST['evgtwodrate']);
  $evgthreedrate=trim($_POST['evgthreedrate']);


    $secondtime=trim($_POST['secondtime']);
    $sectwodrate=trim($_POST['sectwodrate']);
    $secthreedrate=trim($_POST['secthreedrate']);

 $extrashow1time=trim($_POST['extrashow1time']);
 $extrashow1twodrate=trim($_POST['extrashow1twodrate']);
  $extrashow1threedrate=trim($_POST['extrashow1threedrate']);

 $extrashow2time=trim($_POST['extrashow2time']);
 $extrashow2twodrate=trim($_POST['extrashow2twodrate']);
  $extrashow2threedrate=trim($_POST['extrashow2threedrate']);


    $extradetails=trim(strip_tags($_POST['extradetails']));

    if($theatrename=='' || $seats=='' || $mstime=='' || $matineetime=='' || $evngtime=='' || $secondtime==''){

         $message    =   new Message('Enter mandatory fields','error');
         $message->setMessage();

    }else{

              $absDirName =   dirname(dirname(__FILE__)).'/uploads';
              $relDirName =   '../uploads';

              $uploader   =   new Uploader($absDirName.'/');
              $uploader->setExtensions(array('jpg','jpeg','png','gif','swf'));
             $uploader->setSequence('banner');
             $uploader->setMaxSize(5);
            if($uploader->uploadFile("txtFile")){       
     
               echo $image      =   $uploader->getUploadName(); 
               }

   $inputs=array('theatrename'=>$theatrename,
                 'routemap'=>$routemap,
                 'seats'=>$seats,
                  'mstime'=>$mstime,
                  'matineetime'=>$matineetime,
                  'evngtime'=>$evngtime,
                  'secondtime'=>$secondtime,
                   'mstwodrate'=>$mstwodrate,
                   'msthreedrate'=>$msthreedrate,
                   'mattwodrate'=>$mattwodrate,
                   'matthreedrate'=>$matthreedrate,
                   'evgtwodrate'=>$evgtwodrate,
                   'evgthreedrate'=>$evgthreedrate,
                   'sectwodrate'=>$sectwodrate,
                   'secthreedrate'=>$secthreedrate,
                   'extradetails'=>$extradetails,
                     'image'=>$image,
                     'extrashow1time'=>$extrashow1time,
                     'extrashow1twodrate'=>$extrashow1twodrate,
                     'extrashow1threedrate'=>$extrashow1threedrate,
                      'extrashow2time'=>$extrashow1time,
                     'extrashow2twodrate'=>$extrashow1twodrate,
                     'extrashow2threedrate'=>$extrashow1threedrate
                     );
   
$obj= new Theatre();
$s=$obj->addtheatresave($inputs);

        if($s){
            $message    =   new Message('New Theatre added ','message');
            $message->setMessage();
            header('Location:alltheatre.php');
            exit;
         }else{
 $message    =   new Message('Unknown error','error');
            $message->setMessage();
             }



}
}


if(isset($_POST['publish'])){


    $theatrename=trim(strip_tags($_POST['theatrename']));
    $routemap=trim($_POST['route']);
    $seats=trim($_POST['seats']);
    $mstime=trim($_POST['mstime']);
    $mstwodrate=trim($_POST['mstwodrate']);
  $msthreedrate=trim($_POST['msthreedrate']);

    $matineetime=trim($_POST['matineetime']);
      $mattwodrate=trim($_POST['mattwodrate']);
  $matthreedrate=trim($_POST['matthreedrate']);


    $evngtime=trim($_POST['evngtime']);
 $evgtwodrate=trim($_POST['evgtwodrate']);
  $evgthreedrate=trim($_POST['evgthreedrate']);


    $secondtime=trim($_POST['secondtime']);
    $sectwodrate=trim($_POST['sectwodrate']);
    $secthreedrate=trim($_POST['secthreedrate']);

 $extrashow1time=trim($_POST['extrashow1time']);
 $extrashow1twodrate=trim($_POST['extrashow1twodrate']);
  $extrashow1threedrate=trim($_POST['extrashow1threedrate']);

 $extrashow2time=trim($_POST['extrashow2time']);
 $extrashow2twodrate=trim($_POST['extrashow2twodrate']);
  $extrashow2threedrate=trim($_POST['extrashow2threedrate']);


    $extradetails=trim(strip_tags($_POST['extradetails']));

    if($theatrename=='' || $seats=='' || $mstime=='' || $matineetime=='' || $evngtime=='' || $secondtime==''){

         $message    =   new Message('Enter mandatory fields','error');
         $message->setMessage();

    }else{

              $absDirName =   dirname(dirname(__FILE__)).'/uploads';
              $relDirName =   '../uploads';

              $uploader   =   new Uploader($absDirName.'/');
              $uploader->setExtensions(array('jpg','jpeg','png','gif','swf'));
             $uploader->setSequence('banner');
             $uploader->setMaxSize(5);
            if($uploader->uploadFile("txtFile")){       
     
               echo $image      =   $uploader->getUploadName(); 
               }

   $inputs=array('theatrename'=>$theatrename,
                 'routemap'=>$routemap,
                 'seats'=>$seats,
                  'mstime'=>$mstime,
                  'matineetime'=>$matineetime,
                  'evngtime'=>$evngtime,
                  'secondtime'=>$secondtime,
                   'mstwodrate'=>$mstwodrate,
                   'msthreedrate'=>$msthreedrate,
                   'mattwodrate'=>$mattwodrate,
                   'matthreedrate'=>$matthreedrate,
                   'evgtwodrate'=>$evgtwodrate,
                   'evgthreedrate'=>$evgthreedrate,
                   'sectwodrate'=>$sectwodrate,
                   'secthreedrate'=>$secthreedrate,
                   'extradetails'=>$extradetails,
                     'image'=>$image,
                     'extrashow1time'=>$extrashow1time,
                     'extrashow1twodrate'=>$extrashow1twodrate,
                     'extrashow1threedrate'=>$extrashow1threedrate,
                      'extrashow2time'=>$extrashow1time,
                     'extrashow2twodrate'=>$extrashow1twodrate,
                     'extrashow2threedrate'=>$extrashow1threedrate
                     );
   
$obj= new Theatre();
$s=$obj->addtheatrepublish($inputs);

        if($s){
            $message    =   new Message('New Theatre added ','message');
            $message->setMessage();
            header('Location:alltheatre.php');
            exit;
         }else{
 $message    =   new Message('Unknown error','error');
            $message->setMessage();
             }



}
}





if(isset($_POST["close"])){
    $message    =   new Message('Action Cancelled','warning');
    $message->setMessage();
    header("Location:alltheatre.php");
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
                        <li><a href="#">Theatre</a></li>
                        <li><span class="divider"></span></li>
                        <li><a href="#">Add</a></li>
                    </ul>
<form name="theatre" action="addtheatre.php" method="post" enctype="multipart/form-data"/>
                    <div class="pull-left">

                        <div class="form-horizontal pull-left row">
                            <label class="title control-label" for="inputTitle">Theatre</label>
                            <div class="controls"><input type="text"  name="theatrename" id="inputTitle" placeholder="Theatre Name"></div>
                        </div>

                        <div class="span4">
                            <input type="submit" name="publish" value="Publish" class="btn btn-success">
                         
                            <input class="btn btn-info" type="submit" value="Save" name="save">
                            <input class="btn btn-danger" type="submit" value="Close" name="close">
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
<div class="span4">                     
                  <?php 

            $view           =   $_SESSION["messageView"];
            $mess   =   $_SESSION["message"];
            $type           =   $_SESSION["messageType"];
            if($view=="0" && !empty($message) && !empty($type)){
                switch($type){
                    case 'error':
                        echo '<script type="text/javascript">alert("'.$mess.'");</script>';
                        break;
                    case 'message':
                        echo '<script type="text/javascript">alert("'.$mess.'");</script>';
                        break;
                    case 'warning':
                        echo '<script type="text/javascript">alert("'.$mess.'");</script>';
                        break;
                    
                    default:
                        echo '<script type="text/javascript">alert("'.$mess.'");</script>';
                        break;
                }
            }           
            unset($_SESSION["messageView"]);
            unset($_SESSION["message"]);
            unset($_SESSION["messageType"]);
        ?>
</div>
                <div class="main">

                    <div class="add-edit">

                      


                        <div class="mod-content">

                            <div class="row-fluid">

                                <div class="span6">
                                    <label>No. of seats:</label>
                                    <input type="text" name="seats">
                                </div>

                                <div class="span6">
                                    <label>Rootmap:</label>
                                    <textarea name="route"></textarea>
                                </div>

                            </div>

                            <hr>


                            <div class="row-fluid">
                              <div class="span12">
                                <h5 class="orange">Show Details:</h5>
                              </div>
                            </div>

                            <div class="row-fluid">

                              <div class="span6 alert">
                                <label><strong class="orange lead">1 </strong>Showtime:</label>
                                <div class="form-inline">
                                    <input type="text" class="input-small" placeholder="11.30" value="11.30" name="mstime">
                                   <!-- <select class="input-mini">
                                        <option value="">AM</option>
                                        <option value="">PM</option>
                                    </select>-->
                                     <button class="btn btn-danger"><i class="icon-ban-circle icon-white"></i> Disable</button>
                                </div>

                                <br>

                                <label>Default Rate: </label>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <label>2D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="mstwodrate">
                                    </div>
                                    <div class="span4">
                                        <label>3D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="msthreedrate">
                                    </div>
                                </div>
                              </div>

                              <div class="span6 alert">
                                <label><strong class="orange lead">2 </strong>Showtime:</label>
                                <div class="form-inline">
                                    <input type="text" class="input-small" placeholder="2.00" name="matineetime" value="2.00">
                                     <!-- <select class="input-mini">
                                        <option value="">AM</option>
                                        <option value="">PM</option>
                                    </select>-->
                                     <button class="btn btn-danger"><i class="icon-ban-circle icon-white"></i> Disable</button>
                                </div>

                                <br>

                                <label>Default Rate: </label>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <label>2D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="mattwodrate">
                                    </div>
                                    <div class="span4">
                                        <label>3D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="matthreedrate">
                                    </div>
                                </div>
                              </div>

                            </div>

                            <div class="row-fluid">

                              <div class="span6 alert">
                                <label><strong class="orange lead">3 </strong>Showtime:</label>
                                <div class="form-inline">
                                    <input type="text" class="input-small" placeholder="5.30" name="evngtime" value="5.30">
                                    <!-- <select class="input-mini">
                                        <option value="">AM</option>
                                        <option value="">PM</option>
                                    </select>-->
                                     <button class="btn btn-danger"><i class="icon-ban-circle icon-white"></i> Disable</button>
                                </div>

                                <br>

                                <label>Default Rate: </label>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <label>2D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="evgtwodrate">
                                    </div>
                                    <div class="span4">
                                        <label>3D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="evgthreedrate">
                                    </div>
                                </div>
                              </div>

                              <div class="span6 alert">
                                <label><strong class="orange lead">4 </strong>Showtime:</label>
                                <div class="form-inline">
                                    <input type="text" class="input-small" placeholder="8.30" name="secondtime" value="8.30">
                                     <!-- <select class="input-mini">
                                        <option value="">AM</option>
                                        <option value="">PM</option>
                                    </select>-->
                                     <button class="btn btn-danger"><i class="icon-ban-circle icon-white"></i> Disable</button>
                                </div>

                                <br>

                                <label>Default Rate: </label>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <label>2D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="sectwodrate">
                                    </div>
                                    <div class="span4">
                                        <label>3D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="secthreedrate">
                                    </div>
                                </div>
                              </div>

                            </div>
                      
   <div class="row-fluid">

                              <div class="span6 alert">
                                <label><strong class="orange lead">5 </strong>Showtime:</label>
                                <div class="form-inline">
                                    <input type="text" class="input-small" placeholder="0.00" name="extrashow1time" value="0.00">
                                     <!-- <select class="input-mini">
                                        <option value="">AM</option>
                                        <option value="">PM</option>
                                    </select>-->
                                     <button class="btn btn-success"><i class="icon-ban-circle icon-white"></i> Enable</button>
                                </div>

                                <br>

                                <label>Default Rate: </label>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <label>2D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="extrashow1twodrate">
                                    </div>
                                    <div class="span4">
                                        <label>3D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="extrashow1threedrate">
                                    </div>
                                </div>
                              </div>

                              <div class="span6 alert">
                                <label><strong class="orange lead">6 </strong>Showtime:</label>
                                <div class="form-inline">
                                    <input type="text" class="input-small" placeholder="0.00" name="extrashow2time" value="0.00">
                                    <!-- <select class="input-mini">
                                        <option value="">AM</option>
                                        <option value="">PM</option>
                                    </select>-->
                                     <button class="btn btn-success"><i class="icon-ban-circle icon-white"></i> Enable</button>
                                </div>

                                <br>

                                <label>Default Rate: </label>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <label>2D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="extrashow2twodrate">
                                    </div>
                                    <div class="span4">
                                        <label>3D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="extrashow2threedrate">
                                    </div>
                                </div>
                              </div>

                            </div>


                            <hr>

                            <div class="row-fluid">
                              <div class="span9">
                                <h5 class="orange">Details:</h5>
                                <textarea class="input-block-level" name="extradetails" id="theatre-desc"></textarea>

                                <script type="text/javascript">
                                  CKEDITOR.replace( 'theatre-desc',
                                    {
                                      toolbar :
                                      [
                                        { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
                                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                                        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote' ] },
                                        { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
                                        { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
                                        { name: 'colors', items : [ 'TextColor','BGColor' ] },
                                        { name: 'document', items : [ 'Source'] }
                                      ]
                                    });
                                </script>

                              </div>
                            </div>

                            <hr>

                            <div class="row-fluid">
                              
                              <div class="span6">
                                <h5 class="orange">Theatre image:</h5>
                                <input type="file"  name="txtFile"  />
                              </div>

                            </div>
                    
                            <hr>


                        </div> <!-- .mod-content -->

                        </form>



                    </div> <!-- .viewlist-all -->

                </div> <!-- .main -->

            </div>

<?php include_once 'footer.php'; ?>

        </div> <!-- #content -->

    </body>
</html>
