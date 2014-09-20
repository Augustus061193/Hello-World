<?php include_once 'header.php'; ?>
<style>
  .thumb {
    height: 75px;
    border: 1px solid #000;
    margin: 10px 5px 0 0;
  }
</style>
<?php
$main="theatre";
$sub="alltheatre";
$id=$_GET['id'];
if(isset($_POST['save'])){
  $id=$_POST['id'];
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
  $extradetails=trim(strip_tags($_POST['extradetails']));
   $extrashow1time=trim($_POST['extrashow1time']);
 $extrashow1twodrate=trim($_POST['extrashow1twodrate']);
  $extrashow1threedrate=trim($_POST['extrashow1threedrate']);

 $extrashow2time=trim($_POST['extrashow2time']);
 $extrashow2twodrate=trim($_POST['extrashow2twodrate']);
  $extrashow2threedrate=trim($_POST['extrashow2threedrate']);

  if($theatrename=='' || $seats=='' || $mstime=='' || $matineetime=='' || $evngtime=='' || $secondtime==''){

         $message    =   new Message('Enter mandatory fields','error');
         $message->setMessage();

  }else{
    $obj= new Theatre();
              $absDirName =   dirname(dirname(__FILE__)).'/uploads';
              $relDirName =   '../uploads';

              $uploader   =   new Uploader($absDirName.'/');
              $uploader->setExtensions(array('jpg','jpeg','png','gif','swf'));
             $uploader->setSequence('banner');
             $uploader->setMaxSize(5);
            if($uploader->uploadFile("txtFile")){       
     
                $image      =   $uploader->getUploadName(); 
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
                     'id'=>$id,
                       'extrashow1time'=>$extrashow1time,
                     'extrashow1twodrate'=>$extrashow1twodrate,
                     'extrashow1threedrate'=>$extrashow1threedrate,
                      'extrashow2time'=>$extrashow1time,
                     'extrashow2twodrate'=>$extrashow1twodrate,
                     'extrashow2threedrate'=>$extrashow1threedrate
                     );

$s=$obj->edittheatreimagesave($inputs);

               }
else{
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
                     'id'=>$id,
                       'extrashow1time'=>$extrashow1time,
                     'extrashow1twodrate'=>$extrashow1twodrate,
                     'extrashow1threedrate'=>$extrashow1threedrate,
                      'extrashow2time'=>$extrashow1time,
                     'extrashow2twodrate'=>$extrashow1twodrate,
                     'extrashow2threedrate'=>$extrashow1threedrate
                     );

$s=$obj->edittheatresave($inputs);
 }



        if($s){
            $message    =   new Message('Theatre details updated','message');
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
  $id=$_POST['id'];
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
  $extradetails=trim(strip_tags($_POST['extradetails']));
   $extrashow1time=trim($_POST['extrashow1time']);
 $extrashow1twodrate=trim($_POST['extrashow1twodrate']);
  $extrashow1threedrate=trim($_POST['extrashow1threedrate']);

 $extrashow2time=trim($_POST['extrashow2time']);
 $extrashow2twodrate=trim($_POST['extrashow2twodrate']);
  $extrashow2threedrate=trim($_POST['extrashow2threedrate']);

  if($theatrename=='' || $seats=='' || $mstime=='' || $matineetime=='' || $evngtime=='' || $secondtime==''){

         $message    =   new Message('Enter mandatory fields','error');
         $message->setMessage();

  }else{
    $obj= new Theatre();
              $absDirName =   dirname(dirname(__FILE__)).'/uploads';
              $relDirName =   '../uploads';

              $uploader   =   new Uploader($absDirName.'/');
              $uploader->setExtensions(array('jpg','jpeg','png','gif','swf'));
             $uploader->setSequence('banner');
             $uploader->setMaxSize(5);
            if($uploader->uploadFile("txtFile")){       
     
                $image      =   $uploader->getUploadName(); 
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
                     'id'=>$id,
                       'extrashow1time'=>$extrashow1time,
                     'extrashow1twodrate'=>$extrashow1twodrate,
                     'extrashow1threedrate'=>$extrashow1threedrate,
                      'extrashow2time'=>$extrashow1time,
                     'extrashow2twodrate'=>$extrashow1twodrate,
                     'extrashow2threedrate'=>$extrashow1threedrate
                     );

$s=$obj->edittheatreimagepublish($inputs);

               }
else{
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
                     'id'=>$id,
                       'extrashow1time'=>$extrashow1time,
                     'extrashow1twodrate'=>$extrashow1twodrate,
                     'extrashow1threedrate'=>$extrashow1threedrate,
                      'extrashow2time'=>$extrashow1time,
                     'extrashow2twodrate'=>$extrashow1twodrate,
                     'extrashow2threedrate'=>$extrashow1threedrate
                     );

$s=$obj->edittheatrepublish($inputs);
 }



        if($s){
            $message    =   new Message('Theatre details updated','message');
            $message->setMessage();
            header('Location:alltheatre.php');
            exit;
         }else{
 $message    =   new Message('Unknown error','error');
            $message->setMessage();
             }



}
}
?>
<?php
$id=$_GET['id'];
if(isset($_POST['save'])){

$id=$_POST['id'];
$dc=new Theatreimage();

              $absDirName =   dirname(dirname(__FILE__)).'/uploads';
              $relDirName =   '../uploads';
              $uploader   =   new Uploader($absDirName.'/');
              $uploader->setExtensions(array('jpg','jpeg','png','gif','swf'));
             $uploader->setSequence('theatre');
             $uploader->setMaxSize(5);

 for($i=0;$i<count($_FILES['files']);$i++){
 $name=$_FILES['files']['name'][$i];
 $size=$_FILES['files']['size'][$i];
$tmpname=$_FILES['files']['tmp_name'][$i];
if($uploader->uploadmultiFile($name,$size,$tmpname)){
$image      =   $uploader->getUploadName(); 
$nm="Imagename";
$dc->addimage($id,$nm,$image);
 }


}


    header("Location:edittheatre.php?id=".$id);          
exit;
}

?>

<?php
$sec=new Theatre();
$tht=$sec->gettheatre($id);

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

<form name="theatre" action="edittheatre.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data"/>
  <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <div class="pull-left">

                        <div class="form-horizontal pull-left row">
                            <label class="title control-label" for="inputTitle">Theatre</label>
   <div class="controls"><input type="text" value="<?php echo $tht[0]['theatre_name']; ?>"  name="theatrename" id="inputTitle" placeholder="Movie title"></div>
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
                                    <input type="text" name="seats" required="required" value="<?php echo $tht[0]['no_seats']; ?>">
                                </div>

                                <div class="span6">
                                    <label>Rootmap:</label>
                                    <textarea name="route"><?php echo $tht[0]['routemap']; ?></textarea>
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
                                    <input type="text" class="input-small" placeholder="11.30" value="<?php echo $tht[0]['ms_time']; ?>" name="mstime">
                                    <!-- <select class="input-mini">
                                        <option value="">AM</option>
                                        <option value="">PM</option>
                                    </select>-->
                                    <?php
$shw="ms_status";

if($tht[0]['ms_status']==1){
                                    ?>
                                     <a class="btn btn-danger" href="unpublishmovieshow.php?show=<?php echo $shw; ?>&theatreid=<?php echo $id; ?>"><i class="icon-ban-circle icon-white"></i> Disable</a>

                                     <?php  } else { ?>

<a class="btn btn-success" href="publishmovieshow.php?show=<?php echo $shw; ?>&theatreid=<?php echo $id; ?>"><i class="icon-ban-circle icon-white"></i> Enable</a>

                                     <?php  } ?>
                                </div>

                                <br>

                                <label>Default Rate: </label>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <label>2D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="mstwodrate" value="<?php echo $tht[0]['ms_2d_rate']; ?>">
                                    </div>
                                    <div class="span4">
                                        <label>3D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="msthreedrate" value="<?php echo $tht[0]['ms_2d_rate']; ?>">
                                    </div>
                                </div>
                              </div>

                              <div class="span6 alert">
                                <label><strong class="orange lead">2 </strong>Showtime:</label>
                                <div class="form-inline">
                                    <input type="text" class="input-small"  name="matineetime" value="<?php echo $tht[0]['matinee_time']; ?>">
                                     <!-- <select class="input-mini">
                                        <option value="">AM</option>
                                        <option value="">PM</option>
                                    </select>-->
                                                                          <?php
$shw="mat_status";

if($tht[0]['mat_status']==1){
                                    ?>
                                     <a class="btn btn-danger" href="unpublishmovieshow.php?show=<?php echo $shw; ?>&theatreid=<?php echo $id; ?>"><i class="icon-ban-circle icon-white"></i> Disable</a>

                                     <?php  } else { ?>

<a class="btn btn-success" href="publishmovieshow.php?show=<?php echo $shw; ?>&theatreid=<?php echo $id; ?>"><i class="icon-ban-circle icon-white"></i> Enable</a>

                                     <?php  } ?>
                                </div>

                                <br>

                                <label>Default Rate: </label>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <label>2D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="mattwodrate" value="<?php echo $tht[0]['mat_2d_rate']; ?>">
                                    </div>
                                    <div class="span4">
                                        <label>3D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="matthreedrate" value="<?php echo $tht[0]['mat_3d_rate']; ?>">
                                    </div>
                                </div>
                              </div>

                            </div>

                            <div class="row-fluid">

                              <div class="span6 alert">
                                <label><strong class="orange lead">3 </strong>Showtime:</label>
                                <div class="form-inline">
                                    <input type="text" class="input-small" placeholder="5.30" name="evngtime" value="<?php echo $tht[0]['evg_time']; ?>">
                                    <!-- <select class="input-mini">
                                        <option value="">AM</option>
                                        <option value="">PM</option>
                                    </select>-->
                                                                        <?php
$shw="evg_status";

if($tht[0]['evg_status']==1){
                                    ?>
                                     <a class="btn btn-danger" href="unpublishmovieshow.php?show=<?php echo $shw; ?>&theatreid=<?php echo $id; ?>"><i class="icon-ban-circle icon-white"></i> Disable</a>

                                     <?php  } else { ?>

<a class="btn btn-success" href="publishmovieshow.php?show=<?php echo $shw; ?>&theatreid=<?php echo $id; ?>"><i class="icon-ban-circle icon-white"></i> Enable</a>

                                     <?php  } ?>
                                </div>

                                <br>

                                <label>Default Rate: </label>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <label>2D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="evgtwodrate" value="<?php echo $tht[0]['evg_2d_rate']; ?>">
                                    </div>
                                    <div class="span4">
                                        <label>3D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="evgthreedrate" value="<?php echo $tht[0]['evg_3d_rate']; ?>">
                                    </div>
                                </div>
                              </div>

                              <div class="span6 alert">
                                <label><strong class="orange lead">4 </strong>Showtime:</label>
                                <div class="form-inline">
                                    <input type="text" class="input-small" placeholder="8.30" name="secondtime" value="<?php echo $tht[0]['second_time']; ?>">
                                     <!-- <select class="input-mini">
                                        <option value="">AM</option>
                                        <option value="">PM</option>
                                    </select>-->
                                                                         <?php
$shw="sec_status";

if($tht[0]['sec_status']==1){
                                    ?>
                                     <a class="btn btn-danger" href="unpublishmovieshow.php?show=<?php echo $shw; ?>&theatreid=<?php echo $id; ?>"><i class="icon-ban-circle icon-white"></i> Disable</a>

                                     <?php  } else { ?>

<a class="btn btn-success" href="publishmovieshow.php?show=<?php echo $shw; ?>&theatreid=<?php echo $id; ?>"><i class="icon-ban-circle icon-white"></i> Enable</a>

                                     <?php  } ?>
                                </div>

                                <br>

                                <label>Default Rate: </label>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <label>2D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="sectwodrate" value="<?php echo $tht[0]['sec_2d_rate']; ?>">
                                    </div>
                                    <div class="span4">
                                        <label>3D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="secthreedrate" value="<?php echo $tht[0]['sec_3d_rate']; ?>">
                                    </div>
                                </div>

                             

                              </div>
</div>


  <div class="row-fluid">

                              <div class="span6 alert">
                                <label><strong class="orange lead">5 </strong>Showtime:</label>
                                <div class="form-inline">
                                    <input type="text" class="input-small"  name="extrashow1time" value="<?php echo $tht[0]['extrashow1_time']; ?>">
                                     <!-- <select class="input-mini">
                                        <option value="">AM</option>
                                        <option value="">PM</option>
                                    </select>-->
                                                                        <?php
$shw="extrashow1_status";

if($tht[0]['extrashow1_status']==1){
                                    ?>
                                     <a class="btn btn-danger" href="unpublishmovieshow.php?show=<?php echo $shw; ?>&theatreid=<?php echo $id; ?>"><i class="icon-ban-circle icon-white"></i> Disable</a>

                                     <?php  } else { ?>

<a class="btn btn-success" href="publishmovieshow.php?show=<?php echo $shw; ?>&theatreid=<?php echo $id; ?>"><i class="icon-ban-circle icon-white"></i> Enable</a>

                                     <?php  } ?>
                                </div>

                                <br>

                                <label>Default Rate: </label>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <label>2D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="extrashow1twodrate" value="<?php echo $tht[0]['extrashow1_2d_rate']; ?>">
                                    </div>
                                    <div class="span4">
                                        <label>3D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="extrashow1threedrate" value="<?php echo $tht[0]['extrashow1_2d_rate']; ?>">
                                    </div>
                                </div>
                              </div>

                              <div class="span6 alert">
                                <label><strong class="orange lead">6 </strong>Showtime:</label>
                                <div class="form-inline">
                                    <input type="text" class="input-small" placeholder="0.00" name="extrashow2time" value="<?php echo $tht[0]['extrashow2_time']; ?>">
                                   <!-- <select class="input-mini">
                                        <option value="">AM</option>
                                        <option value="">PM</option>
                                    </select>-->
                                       <?php
$shw="extrashow2_status";

if($tht[0]['extrashow2_status']==1){
                                    ?>
                                     <a class="btn btn-danger" href="unpublishmovieshow.php?show=<?php echo $shw; ?>&theatreid=<?php echo $id; ?>"><i class="icon-ban-circle icon-white"></i> Disable</a>

                                     <?php  } else { ?>

<a class="btn btn-success" href="publishmovieshow.php?show=<?php echo $shw; ?>&theatreid=<?php echo $id; ?>"><i class="icon-ban-circle icon-white"></i> Enable</a>

                                     <?php  } ?>
                                </div>

                                <br>

                                <label>Default Rate: </label>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <label>2D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="extrashow2twodrate" value="<?php echo $tht[0]['extrashow2_2d_rate']; ?>">
                                    </div>
                                    <div class="span4">
                                        <label>3D: </label>
                                        <input type="text" placeholder="Rate" class="input-small" name="extrashow2threedrate" value="<?php echo $tht[0]['extrashow2_3d_rate']; ?>">
                                    </div>
                                </div>
                              </div>

                            </div>

                          


                            <hr>
                     
                     


                            <div class="row-fluid">
                              <div class="span9">
                                  <h5 class="orange">Details:</h5>
                                  <textarea class="input-block-level" name="extradetails" id="theatre-desc"><?php echo $tht[0]['extra_details']; ?></textarea>
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

                              <div class="span3">
                                <h5 class="orange">Change theatre image:</h5>
                                <img src="thumb.php?file=../uploads/<?php echo $tht[0]['image_loc'];?>&size=100">        
                              </div>

                              <div class="span5">
                                  <label>Image:</label>
                                 <input type="file"  name="txtFile"  />
                              </div>

                            </div>

                      </form>

                            <hr>



<div class="alert alert-info"> <!-- theatre images alert box start -->
<div class="row-fluid">
  <div class="span12">
    <h5 class="orange">Add theatre gallery:</h5>
<form name="imageform" action="edittheatre.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data"/>
<input type="hidden" value="<?php echo $id; ?>" name="id" />
<input type="submit" name="save" value="Upload" class="btn btn-info"/>
<input type="file" id="files" name="files[]" multiple />
<output id="list"></output>
</form>
<script>
  function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>'].join('');
          document.getElementById('list').insertBefore(span, null);
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>
  </div>
</div>
<?php
$start  = $_GET['start'];
$limit  = 25;
if(empty($start)){
  $start  = 0;
}
 $id=$_GET['id'];
if(isset($_POST['saveForm'])){
 $cnt  = $_POST['count'];
  $id = $_POST['id'];
  $dj=new Theatreimage();
  $list = array();
$no=$dj->getmax();

 $num=$no[0]['MAX(`image_id`)'];

for($i=0;$i<=$num;$i++){

  if(isset($_POST[$i])){
 $dj->updateimagetitle($i,$_POST[$i]);
  }
}
header("Location:edittheatre.php?id=$id");
  exit;


}


if(isset($_POST['delete'])){
  $cnt  = $_POST['count'];
  $id = $_POST['id'];
  $list = array();
  for($i=0;$i<$cnt;$i++){
    if(isset($_POST['chkId'.$i])){
      $list[] = $_POST['chkId'.$i];
    }
  }
  if(count($list)>0){
    $obj  = new Theatreimage();
    $obj->deleteList($list);
    $message  = new Message('Selected items deleted ','message');
    $message->setMessage(); 
  }else{
      $message  = new Message('No items selected','error');
      $message->setMessage();   
  }
  header("Location:edittheatre.php?id=$id");
  exit;
  
}


if(isset($_POST['unpublish'])){
  $cnt  = $_POST['count'];
  $id = $_POST['id'];
  $list = array();
  for($i=0;$i<$cnt;$i++){
    if(isset($_POST['chkId'.$i])){
      $list[] = $_POST['chkId'.$i];
    }
  }
  if(count($list)>0){
    $obj  = new Theatreimage();
    $obj->unpublishList($list);
    $message  = new Message('Selected items were unpublished ','message');
    $message->setMessage(); 
  }else{
      $message  = new Message('No items selected','error');
      $message->setMessage();   
  }
  header("Location:edittheatre.php?id=$id");
  exit;
}

/*
 * Publish Seleted list of items
*/
if(isset($_POST['publish'])){
  $cnt  = $_POST['count'];
  $id = $_POST['id'];
  $list = array();
  for($i=0;$i<$cnt;$i++){
    if(isset($_POST['chkId'.$i])){
      $list[] = $_POST['chkId'.$i];
    }
  }
  if(count($list)>0){
    $obj  = new Theatreimage();
    $obj->publishList($list);
    $message  = new Message('Selected items were published ','message');
    $message->setMessage(); 
  }else{
      $message  = new Message('No items selected','error');
      $message->setMessage();   
  }
  header("Location:edittheatre.php?id=$id");
  exit;
}



    



/*
 * Read an initialize search paramerts
*/
$msg  = '';
$keyword= '';
$parent = '';
$ord  = '';
$mode = '';
$filter = '';

/*
 * Get results based on search conditions
*/
$values = array('start'=>$start,'limit'=>$limit,"parent"=>$parent,"keyword"=>$keyword,"ord"=>$ord,"mode"=>$mode);
$obj  = new Content();
$bn = new Theatreimage();
$records  = $bn->listimage($values,$id);
$totalRecords = $bn->totalRecords;
$pageRecords  = $bn->pageRecords;
$cnt  = $totalRecords/$limit;
$cnt  = ceil($cnt);
$current  = ($start/$limit)+1;  

$pg = new Pages();
$pages  = $pg->getPages($current,$cnt,$limit);          
$first  = $pg->getFirst($cnt,$limit);
$last = $pg->getLast($cnt,$limit);
$prev = $pg->getPrev($current,$cnt,$limit);
$next = $pg->getNext($current,$cnt,$limit);


?>
  
  <?php
  if($totalRecords > 0){
    ?>

  <form method="post" action="edittheatre.php?id=<?php echo $id;  ?>" enctype="multipart/form-data">

<div class="row-fluid">
  <div class="span6">
    <h5 class="orange">Manage theatre gallery:</h5>

    <input type="hidden" name="count" id="count" value="<?php echo $pageRecords;?>" />
    <input type="hidden" name="id" id="count" value="<?php echo $id;?>" />
    <div class="btn-group">
      <label class="btn"><input id="select_all_from_list" type="checkbox" onclick="checkAll(this);" class="incheckbox"></label>
      <input type="submit" name="publish" value="Publish" class="btn btn-success">
      <input class="btn btn-primary" type="submit" value="Revert to Draft" name="unpublish">
      <input class="btn btn-danger" type="submit" value="Delete" name="delete">
      <input class="btn btn-info" type="submit" value="Save" name="saveForm">
    </div>

                            
  </div>
</div>

<br>

<div class="row-fluid">

  <div class="span8">
     <ul class="thumbnails">

        <?php 
          for($i=0;$i<$pageRecords;$i++){
        ?>
        <li class="span4">
          <div class="thumbnail" title="<?php echo $records[$i]["image_name"];?>">
              <input type="text" class="input-block-level" name="<?php echo $records[$i]["image_id"];?>" value="<?php echo $records[$i]["image_name"];?>">
              <p><img src="../uploads/<?php echo $records[$i]['image_loc'];?>" alt=" " height="150px" width="150px"></p>
              <div class="btn-group">
                <label class="btn"><input type="checkbox" class="r_bu incheckbox" name="chkId<?php echo $i;?>" id="chkId<?php echo $i;?>" value="<?php echo $records[$i]['image_id'];?>"></label>
                <?php  if($records[$i]["status"]==0){  ?>
                  <a href="publish_theatreimage.php?id=<?php echo $records[$i]["image_id"];?>&theatreid=<?php echo $id; ?>"  class="btn btn-success"><i class="icon-ok"></i></a>

                  <?php } else{   ?>
           <a href="unpublish_theatreimage.php?id=<?php echo $records[$i]["image_id"];?>&theatreid=<?php echo $id; ?>" class="btn btn-warning"><i class="icon-folder-close"></i></a>

                  <?php } ?>
                  <a href="delete_theatreimage.php?id=<?php echo $records[$i]["image_id"];?>&theatreid=<?php echo $id; ?>" class="btn"><i class="icon-trash"></i></a>
              </div>
          </div>
        </li>

        <?php
          }
        ?>

      </ul>

        </div>
  </form>
</div>
<?php } ?>

</div> <!-- theatre images alert box end -->

<hr>


                        </div> <!-- .mod-content -->

                        



                    </div> <!-- .viewlist-all -->

                </div> <!-- .main -->

            </div>
 <script type="text/javascript" src="js/util.js"></script>
<?php include_once 'footer.php'; ?>

        </div> <!-- #content -->

    </body>
</html>
