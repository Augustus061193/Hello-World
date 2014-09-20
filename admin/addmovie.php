<?php include_once 'header.php'; ?>
<script type="text/javascript">
function callvalms(str,str1){


var date=document.getElementById("release-datepicker").value;

$('#taluk').load("get_available.php?theatreid="+str+"&time="+str1+"&date="+date,function (response, status, xhr) {
  if (status == "error") {
    var msg = "Sorry but there was an error: ";
    $("#error").html(msg + xhr.status + " " + xhr.statusText);
  }
});
}

function callvalmat(str,str1){


var date=document.getElementById("release-datepicker").value;

$('#taluk').load("get_available_mat.php?theatreid="+str+"&time="+str1+"&date="+date,function (response, status, xhr) {
  if (status == "error") {
    var msg = "Sorry but there was an error: ";
    $("#error").html(msg + xhr.status + " " + xhr.statusText);
  }
});
}

function callvalevg(str,str1){


var date=document.getElementById("release-datepicker").value;

$('#taluk').load("get_available_evg.php?theatreid="+str+"&time="+str1+"&date="+date,function (response, status, xhr) {
  if (status == "error") {
    var msg = "Sorry but there was an error: ";
    $("#error").html(msg + xhr.status + " " + xhr.statusText);
  }
});
}




function callvalsec(str,str1){


var date=document.getElementById("release-datepicker").value;

$('#taluk').load("get_available_sec.php?theatreid="+str+"&time="+str1+"&date="+date,function (response, status, xhr) {
  if (status == "error") {
    var msg = "Sorry but there was an error: ";
    $("#error").html(msg + xhr.status + " " + xhr.statusText);
  }
});
}

function callvalextra1(str,str1){


var date=document.getElementById("release-datepicker").value;

$('#taluk').load("get_available_extra1.php?theatreid="+str+"&time="+str1+"&date="+date,function (response, status, xhr) {
  if (status == "error") {
    var msg = "Sorry but there was an error: ";
    $("#error").html(msg + xhr.status + " " + xhr.statusText);
  }
});
}

function callvalextra2(str,str1){


var date=document.getElementById("release-datepicker").value;

$('#taluk').load("get_available.php_extra2?theatreid="+str+"&time="+str1+"&date="+date,function (response, status, xhr) {
  if (status == "error") {
    var msg = "Sorry but there was an error: ";
    $("#error").html(msg + xhr.status + " " + xhr.statusText);
  }
});
}


</script>
<?php
$main="movie";
$sub="addmovie";
if(isset($_POST['publish'])){

   

$vbs=new Theatre();
$theatres=$vbs->getalltheatres();
$obj= new Movie();
    $moviename=trim(strip_tags($_POST['moviename']));
    $actors=trim($_POST['actors']);
    $releasedate=trim($_POST['releasedate']);
    $trailer=trim($_POST['trailer']);
    $status=trim($_POST['status']);
    $order=$obj->getNextOrder();
    if($_POST['protype']==1){
    $protype=1;
}else{
    $protype=0;
}
$spl=$_POST['spl'];

    $description=trim($_POST['description']);
echo $dt=date('Y-m-d',strtotime($releasedate));


$expires = strtotime($dt." + 7 day");
 $close= date("Y-m-d", $expires);

    if($moviename=='' || $actors=='' || $trailer=='' || $releasedate=='' || $status=='' ){

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

   $inputs=array('moviename'=>$moviename,
                 'actors'=>$actors,
                 'releasedate'=>$dt,
                 'close'=>$close,
                  'trailer'=>$trailer,
                  'status'=>$status,
                  'protype'=>$protype,
                   'spl'=>$spl,
                  'description'=>$description,
                   'poster'=>$image,
                   'order'=>$order
                     );

$s=$obj->addmoviepublish($inputs);

        if($s){

          $lastid=$obj->lastInsertId();

for($i=0;$i<count($theatres);$i++){

if(isset($_POST['theatre'.$i])){

  $theatreid=$_POST['theatre'.$i];

if(isset($_POST['msstatus'.$i])){

  $ms_status=1;
} else{

   $ms_status=0;
}

if(isset($_POST['matineestatus'.$i])){

  $mat_status=1;
} else{

   $mat_status=0;
}

if(isset($_POST['evgstatus'.$i])){

  $evg_status=1;
} else{

   $evg_status=0;
}

if(isset($_POST['secondstatus'.$i])){

  $sec_status=1;
} else{

   $sec_status=0;
}

if(isset($_POST['extra1status'.$i])){

  $extra1_status=1;
} else{

   $extra1_status=0;
}
if(isset($_POST['extra2status'.$i])){

  $extra2_status=1;
} else{

   $extra2_status=0;
}

if(isset($_POST['ms_2d_rate'.$i])){

  $ms_2d_rate=$_POST['ms_2d_rate'.$i];
} else{

   $ms_2d_rate=0;
}

if(isset($_POST['ms_3d_rate'.$i])){

  $ms_3d_rate=$_POST['ms_3d_rate'.$i];
} else{

   $ms_3d_rate=0;
}

if(isset($_POST['mat_2d_rate'.$i])){

  $mat_2d_rate=$_POST['mat_2d_rate'.$i];
} else{

   $mat_2d_rate=0;
}

if(isset($_POST['mat_3d_rate'.$i])){

  $mat_3d_rate=$_POST['mat_3d_rate'.$i];
} else{

   $mat_3d_rate=0;
}

if(isset($_POST['evg_2d_rate'.$i])){

  $evg_2d_rate=$_POST['evg_2d_rate'.$i];
} else{

   $evg_2d_rate=0;
}
if(isset($_POST['evg_3d_rate'.$i])){

  $evg_3d_rate=$_POST['evg_3d_rate'.$i];
} else{

   $evg_3d_rate=0;
}
if(isset($_POST['extrashow1_2d_rate'.$i])){

  $extrashow1_2d_rate=$_POST['extrashow1_2d_rate'.$i];
} else{

   $extrashow1_2d_rate=0;
}

if(isset($_POST['extrashow1_3d_rate'.$i])){

  $extrashow1_3d_rate=$_POST['extrashow1_3d_rate'.$i];
} else{

   $extrashow1_3d_rate=0;
}
if(isset($_POST['extrashow2_2d_rate'.$i])){

  $extrashow2_2d_rate=$_POST['extrashow2_2d_rate'.$i];
} else{

   $extrashow2_2d_rate=0;
}
if(isset($_POST['extrashow2_3d_rate'.$i])){

  $extrashow2_3d_rate=$_POST['extrashow2_3d_rate'.$i];
} else{

   $extrashow2_3d_rate=0;
}
$mainstatus=1;
$obj->addshows($lastid,$theatreid,$ms_status,$mat_status,$evg_status,$sec_status,$mainstatus,$extra1_status,$extra2_status,$ms_2d_rate,$ms_3d_rate,$mat_2d_rate,$mat_3d_rate,$evg_2d_rate,$evg_3d_rate,$sec_2d_rate,$sec_3d_rate,$extrashow1_2d_rate,$extrashow1_3d_rate,$extrashow2_2d_rate,$extrashow2_3d_rate);


}
else{
$theatreid1=$_POST['tht'.$i];
$msstatus=0;
$matstatus=0;
$evgstatus=0;
$secstatus=0;
$mainstatus=0;
$extra1_status=0;
$extra2_status=0;
$ms_2d_rate=0;
$ms_3d_rate=0;
$mat_2d_rate=0;
$mat_3d_rate=0;
$evg_2d_rate=0;
$evg_3d_rate=0;
$sec_2d_rate=0;
$sec_3d_rate=0;
$extrashow1_2d_rate=0;
$extrashow1_3d_rate=0;
$extrashow2_2d_rate=0;
$extrashow2_3d_rate=0;

$obj->addshows($lastid,$theatreid1,$msstatus,$matstatus,$evgstatus,$secstatus,$mainstatus,$extra1_status,$extra2_status,$ms_2d_rate,$ms_3d_rate,$mat_2d_rate,$mat_3d_rate,$evg_2d_rate,$evg_3d_rate,$sec_2d_rate,$sec_3d_rate,$extrashow1_2d_rate,$extrashow1_3d_rate,$extrashow2_2d_rate,$extrashow2_3d_rate);
}


}
            $message    =   new Message('New movie added ','message');
            $message->setMessage();
            header('Location:allmovies.php');
         }else{
 $message    =   new Message('Unknown error','error');
            $message->setMessage();
             }



}
}





if(isset($_POST['save'])){

   

$vbs=new Theatre();
$theatres=$vbs->getalltheatres();
$obj= new Movie();
    $moviename=trim(strip_tags($_POST['moviename']));
    $actors=trim($_POST['actors']);
    $releasedate=trim($_POST['releasedate']);
    $trailer=trim($_POST['trailer']);
    $status=trim($_POST['status']);
    $order=$obj->getNextOrder();
    if($_POST['protype']==1){
    $protype=1;
}else{
    $protype=0;
}
$spl=$_POST['spl'];

    $description=trim($_POST['description']);
echo $dt=date('Y-m-d',strtotime($releasedate));


$expires = strtotime($dt." + 7 day");
 $close= date("Y-m-d", $expires);

    if($moviename=='' || $actors=='' || $trailer=='' || $releasedate=='' || $status=='' ){

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

   $inputs=array('moviename'=>$moviename,
                 'actors'=>$actors,
                 'releasedate'=>$dt,
                 'close'=>$close,
                  'trailer'=>$trailer,
                  'status'=>$status,
                  'protype'=>$protype,
                   'spl'=>$spl,
                  'description'=>$description,
                   'poster'=>$image,
                   'order'=>$order
                     );

$s=$obj->addmoviesave($inputs);

        if($s){

          $lastid=$obj->lastInsertId();

for($i=0;$i<count($theatres);$i++){

if(isset($_POST['theatre'.$i])){

  $theatreid=$_POST['theatre'.$i];

if(isset($_POST['msstatus'.$i])){

  $ms_status=1;
} else{

   $ms_status=0;
}

if(isset($_POST['matineestatus'.$i])){

  $mat_status=1;
} else{

   $mat_status=0;
}

if(isset($_POST['evgstatus'.$i])){

  $evg_status=1;
} else{

   $evg_status=0;
}

if(isset($_POST['secondstatus'.$i])){

  $sec_status=1;
} else{

   $sec_status=0;
}

if(isset($_POST['extra1status'.$i])){

  $extra1_status=1;
} else{

   $extra1_status=0;
}
if(isset($_POST['extra2status'.$i])){

  $extra2_status=1;
} else{

   $extra2_status=0;
}

if(isset($_POST['ms_2d_rate'.$i])){

  $ms_2d_rate=$_POST['ms_2d_rate'.$i];
} else{

   $ms_2d_rate=0;
}

if(isset($_POST['ms_3d_rate'.$i])){

  $ms_3d_rate=$_POST['ms_3d_rate'.$i];
} else{

   $ms_3d_rate=0;
}

if(isset($_POST['mat_2d_rate'.$i])){

  $mat_2d_rate=$_POST['mat_2d_rate'.$i];
} else{

   $mat_2d_rate=0;
}

if(isset($_POST['mat_3d_rate'.$i])){

  $mat_3d_rate=$_POST['mat_3d_rate'.$i];
} else{

   $mat_3d_rate=0;
}

if(isset($_POST['evg_2d_rate'.$i])){

  $evg_2d_rate=$_POST['evg_2d_rate'.$i];
} else{

   $evg_2d_rate=0;
}
if(isset($_POST['evg_3d_rate'.$i])){

  $evg_3d_rate=$_POST['evg_3d_rate'.$i];
} else{

   $evg_3d_rate=0;
}
if(isset($_POST['extrashow1_2d_rate'.$i])){

  $extrashow1_2d_rate=$_POST['extrashow1_2d_rate'.$i];
} else{

   $extrashow1_2d_rate=0;
}

if(isset($_POST['extrashow1_3d_rate'.$i])){

  $extrashow1_3d_rate=$_POST['extrashow1_3d_rate'.$i];
} else{

   $extrashow1_3d_rate=0;
}
if(isset($_POST['extrashow2_2d_rate'.$i])){

  $extrashow2_2d_rate=$_POST['extrashow2_2d_rate'.$i];
} else{

   $extrashow2_2d_rate=0;
}
if(isset($_POST['extrashow2_3d_rate'.$i])){

  $extrashow2_3d_rate=$_POST['extrashow2_3d_rate'.$i];
} else{

   $extrashow2_3d_rate=0;
}
$mainstatus=1;
$obj->addshows($lastid,$theatreid,$ms_status,$mat_status,$evg_status,$sec_status,$mainstatus,$extra1_status,$extra2_status,$ms_2d_rate,$ms_3d_rate,$mat_2d_rate,$mat_3d_rate,$evg_2d_rate,$evg_3d_rate,$sec_2d_rate,$sec_3d_rate,$extrashow1_2d_rate,$extrashow1_3d_rate,$extrashow2_2d_rate,$extrashow2_3d_rate);


}
else{
$theatreid1=$_POST['tht'.$i];
$msstatus=0;
$matstatus=0;
$evgstatus=0;
$secstatus=0;
$mainstatus=0;
$extra1_status=0;
$extra2_status=0;
$ms_2d_rate=0;
$ms_3d_rate=0;
$mat_2d_rate=0;
$mat_3d_rate=0;
$evg_2d_rate=0;
$evg_3d_rate=0;
$sec_2d_rate=0;
$sec_3d_rate=0;
$extrashow1_2d_rate=0;
$extrashow1_3d_rate=0;
$extrashow2_2d_rate=0;
$extrashow2_3d_rate=0;

$obj->addshows($lastid,$theatreid1,$msstatus,$matstatus,$evgstatus,$secstatus,$mainstatus,$extra1_status,$extra2_status,$ms_2d_rate,$ms_3d_rate,$mat_2d_rate,$mat_3d_rate,$evg_2d_rate,$evg_3d_rate,$sec_2d_rate,$sec_3d_rate,$extrashow1_2d_rate,$extrashow1_3d_rate,$extrashow2_2d_rate,$extrashow2_3d_rate);
}


}
            $message    =   new Message('New movie added ','message');
            $message->setMessage();
            header('Location:allmovies.php');
         }else{
 $message    =   new Message('Unknown error','error');
            $message->setMessage();
             }



}
}
?>
<?php
$vb=new Theatre();
$theatres=$vb->getalltheatres();
if(isset($_POST["cancel"])){
    $message    =   new Message('Action Cancelled','warning');
    $message->setMessage();
    header("Location:allmovies.php");
}
?>

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
<form name="theatre" action="addmovie.php" method="post" enctype="multipart/form-data"/>
                    <div class="pull-left">

                        <div class="form-horizontal pull-left row">
                            <label class="title control-label" for="inputTitle">Movie</label>
                            <div class="controls"><input type="text" id="inputTitle" placeholder="Movie title" name="moviename"></div>
                        </div>

                        <div class="span4">
                            <input class="btn btn-success" type="submit" value="Publish" name="publish">
                            <input class="btn btn-info" type="submit" value="Save" name="save">
                            <input class="btn btn-danger" type="submit" value="Close" name="cancel">
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
                                            <h5 class="orange">Story Line</h5>





                                            <textarea class="input-block-level" class="ckeditor" name="description" id="editor1"></textarea>

<script type="text/javascript">
   //CKEDITOR.replace( 'editor1' );
CKEDITOR.replace( 'editor1',
  {
    toolbar :
    [
      { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
      { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
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

                                        <script>
                                            $(function() {

                                                $( "#release-datepicker").datepicker();

                                            });
                                        </script>

                                        <div class="row-fluid">

                                            <div class="span6">
                                                <h5 class="orange">Release date</h5>
                                                <input type="text" id="release-datepicker" name="releasedate">

                                                <hr>

                                                <div class="row-fluid">
                                                  <div class="span12">
                                                    <h5 class="orange">Status</h5>
                                                    <label class="radio">
                                                      <input type="radio" name="status" value="0" checked="checked"> Upcoming
                                                    </label>
                                                    <label class="radio">
                                                      <input type="radio" name="status" value="1"> Nowrunning
                                                    </label>  
                                                    <label class="radio">
                                                      <input type="radio" name="status" value="2"> Closed
                                                    </label> 
                                                  </div>
                                                </div>

                                                <hr>

                                                <div class="row-fluid">
                                                  <div class="span12">
                                                    <h5 class="orange">Special movie<h5>
                                                    <label class="radio"> <input type="radio" name="spl" value="0" checked="checked"> No</label>
                                                    <label class="radio"> <input type="radio" name="spl" value="1"> Yes</label> 
                                                  </div>
                                                </div>

                                            </div>

                                            <div class="span6">
                                                <h5 class="orange">Cast &amp; crew</h5>
                                                <textarea name="actors" id="actors-editor"><p><strong>Director</strong>:&nbsp;</p><p><strong>Stars</strong>:&nbsp;</p></textarea>
                                                  <script type="text/javascript">
                                                    CKEDITOR.replace( 'actors-editor',
                                                      {
                                                        toolbar :
                                                        [
                                                          { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
                                                          { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                                                          { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
                                                          { name: 'document', items : [ 'Source'] }
                                                        ]
                                                      });
                                                  </script>

                                            </div>

                                        </div>

                                        <hr>

                                        <div class="row-fluid">

                                            <div class="span12">
                                                <h5 class="orange">Add Poster</h5>
                                            </div>

                                            <div class="row-fluid">
                                                
                                                <div class="span4">
                                                  
                                                  
                                                   
                                                    <input class="input-block-level" type="file" name="txtFile">
                                                   
                                                  
                                                    

                                                </div>

                                             
                                            </div>

                                        </div>

                                        <hr>

                                        <div class="row-fluid">

                                            <div class="span12">
                                                <h5 class="orange">Add Teaser</h5>
                                            </div>

                                            <div class="row-fluid">
                                                
                                                <div class="span4">
                                                   
                                                    <label>iframe</label>
                                                    <textarea name="trailer" ></textarea>
                                                   
                                                 

                                                </div>

                                                
                                            </div>

                                        </div>

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

                                                if ($('.moviein-3d').is(':checked')) {
                                                    $('.theatre-select').find('.cus-rate').find('label').hide();
                                                    $('.theatre-select').find('.cus-rate').find('label.cus3d-rate').show().addClass('show3d');
                                                } else {
                                                    $('.theatre-select').find('.cus-rate').find('label').show();
                                                    $('.theatre-select').find('.cus-rate').find('label.cus3d-rate').removeClass('show3d');
                                                  }

                                            $('.moviein-3d').click(function(){
                                                if ($('.moviein-3d').is(':checked')) {
                                                    $('.theatre-select').find('.cus-rate').find('label').hide();
                                                    $('.theatre-select').find('.cus-rate').find('label.cus3d-rate').show().addClass('show3d');
                                                } else {
                                                    $('.theatre-select').find('.cus-rate').find('label').show();
                                                    $('.theatre-select').find('.cus-rate').find('label.cus3d-rate').removeClass('show3d');
                                                  }
                                            });

                                        });
                                    </script>


                                        <div class="alert alert-block userselect-none">
                                            <label class="checkbox">3D Technology<input class="moviein-3d" type="checkbox" name="protype" value="1"></label>
                                            <!-- <label class="checkbox">2D Technology<input type="checkbox" name="protype" value="1"></label> -->
                                        </div>
                                        <div id="taluk"> </div>
                                        <div id="error"> </div>
                                      
<?php

$cx=new Theatre();
 for($i=0;$i<count($theatres);$i++){  ?>
 <input type="hidden" name="tht<?php echo $i ?>" value="<?php echo $theatres[$i]['theatre_id']; ?>"/>
                                        <div class="theatre-select alert alert-info userselect-none">
                                            <div>
                                                <label data-toggle="collapse" data-target="#<?php echo $theatres[$i]['theatre_name']; ?>" class="theatre-name checkbox">
                                                  <input  type="checkbox" name="theatre<?php echo $i; ?>" value="<?php echo $theatres[$i]['theatre_id']; ?>" ><strong><?php echo $theatres[$i]['theatre_name']; ?> </strong><!-- <span class="label label-success"> Active</span> --></label>
                                            </div>
                                            <?php
                                              $tgt=$theatres[$i]['theatre_id'];
                                              $zz=$cx->gettheatre($tgt);
                                            ?>
                                            <div id="<?php echo $theatres[$i]['theatre_name']; ?>" class="collapse">
                                                
                                                <label class="checkbox"><input class="cus-rate-checkbox" type="checkbox" > Set Custom rate</label>
                                                <h6 class="label label-info">Show details:</h6>

                                                <?php if($zz[0]['ms_status']==1){   ?>

                                                <div class="list">
                                                    <label class="checkbox"><input type="checkbox" onclick="callvalms(<?php echo $theatres[$i]['theatre_id']; ?>,<?php echo $theatres[$i]['ms_time']; ?>);" name="msstatus<?php echo $i; ?>" value="<?php echo $theatres[$i]['theatre_id']; ?>"> <?php echo $theatres[$i]['ms_time']; ?></label>
                                                    <div class="cus-rate">
                                                        <label>Rate <input class="input-block-level" type="text" name="ms_2d_rate<?php echo $i; ?>" value="<?php echo $theatres[$i]['ms_2d_rate']; ?>"></label>
                                                        <label class="cus3d-rate">3D Rate<input class="input-block-level" type="text" name="ms_3d_rate<?php echo $i; ?>" value="<?php echo $theatres[$i]['ms_3d_rate']; ?>"></label>
                                                    </div>
                                                </div>
<?php } ?>

<?php if($zz[0]['mat_status']==1){   ?>

                                                <div class="list">
                                                    <label class="checkbox"><input type="checkbox" onclick="callvalmat(<?php echo $theatres[$i]['theatre_id']; ?>,<?php echo $theatres[$i]['matinee_time']; ?>);" name="matineestatus<?php echo $i; ?>" value="<?php echo $theatres[$i]['theatre_id']; ?>"> <?php echo $theatres[$i]['matinee_time']; ?></label>
                                                    <div class="cus-rate">
                                                        <label>Rate <input class="input-block-level" type="text" name="mat_2d_rate<?php echo $i; ?>" value="<?php echo $theatres[$i]['mat_2d_rate']; ?>"></label>
                                                        <label class="cus3d-rate">3D Rate<input class="input-block-level" type="text" name="mat_3d_rate<?php echo $i; ?>" value="<?php echo $theatres[$i]['mat_3d_rate']; ?>"></label>
                                                    </div>
                                                </div>
<?php } ?>
<?php if($zz[0]['evg_status']==1){   ?>


                                                <div class="list">
                                                    <label class="checkbox"><input type="checkbox" onclick="callvalevg(<?php echo $theatres[$i]['theatre_id']; ?>,<?php echo $theatres[$i]['evg_time']; ?>);" name="evgstatus<?php echo $i; ?>" value="<?php echo $theatres[$i]['theatre_id']; ?>"> <?php echo $theatres[$i]['evg_time']; ?></label>
                                                    <div class="cus-rate">
                                                        <label>Rate <input class="input-block-level" type="text" name="evg_2d_rate<?php echo $i; ?>" value="<?php echo $theatres[$i]['evg_2d_rate']; ?>"></label>
                                                        <label class="cus3d-rate">3D Rate<input class="input-block-level" type="text" name="evg_3d_rate<?php echo $i; ?>" value="<?php echo $theatres[$i]['evg_3d_rate']; ?>"></label>
                                                    </div>
                                                </div>
<?php } ?>
<?php if($zz[0]['sec_status']==1){   ?>



                                                <div class="list">
                                                    <label class="checkbox"><input type="checkbox" onclick="callvalsec(<?php echo $theatres[$i]['theatre_id']; ?>,<?php echo $theatres[$i]['second_time']; ?>);"  name="secondstatus<?php echo $i; ?>" value="<?php echo $theatres[$i]['theatre_id']; ?>"> <?php echo $theatres[$i]['second_time']; ?></label>
                                                    <div class="cus-rate">
                                                        <label>Rate <input class="input-block-level" type="text" name="sec_2d_rate<?php echo $i; ?>" value="<?php echo $theatres[$i]['sec_2d_rate']; ?>"></label>
                                                        <label class="cus3d-rate">3D Rate<input class="input-block-level" type="text" name="sec_3d_rate<?php echo $i; ?>" value="<?php echo $theatres[$i]['sec_3d_rate']; ?>"></label>
                                                    </div>
                                                </div>
                                                <?php } ?>
<?php if($zz[0]['extrashow1_status']==1){   ?>
                                      <div class="list">
                                                    <label class="checkbox"><input type="checkbox" onclick="callvalextra1(<?php echo $theatres[$i]['theatre_id']; ?>,<?php echo $theatres[$i]['extrashow1_time']; ?>);" name="extra1status<?php echo $i; ?>" value="<?php echo $theatres[$i]['theatre_id']; ?>"> <?php echo $theatres[$i]['extrashow1_time']; ?></label>
                                                    <div class="cus-rate">
                                                        <label>Rate <input class="input-block-level" type="text" name="extrashow1_2d_rate<?php echo $i; ?>" value="<?php echo $theatres[$i]['extrashow1_2d_rate']; ?>"></label>
                                                        <label class="cus3d-rate">3D Rate<input class="input-block-level" type="text" name="extrashow1_3d_rate<?php echo $i; ?>"  value="<?php echo $theatres[$i]['extrashow1_3d_rate']; ?>"></label>
                                                    </div>
                                                </div>
<?php } ?>
<?php if($zz[0]['extrashow1_status']==1){   ?>
                                                 <div class="list">
                                                    <label class="checkbox"><input type="checkbox" onclick="callvalextra2(<?php echo $theatres[$i]['theatre_id']; ?>,<?php echo $theatres[$i]['extrashow2_time']; ?>);"  name="extra2status<?php echo $i; ?>" value="<?php echo $theatres[$i]['theatre_id']; ?>"> <?php echo $theatres[$i]['extrashow2_time']; ?></label>
                                                    <div class="cus-rate">
                                                        <label>Rate <input class="input-block-level" type="text" name="extrashow2_2d_rate<?php echo $i; ?>" value="<?php echo $theatres[$i]['extrashow2_2d_rate']; ?>"></label>
                                                        <label class="cus-rate">3D <input class="input-block-level" type="text" name="extrashow2_3d_rate<?php echo $i; ?>" value="<?php echo $theatres[$i]['extrashow2_3d_rate']; ?>"></label>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div> 
<?php  }  ?>

                                         



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
    