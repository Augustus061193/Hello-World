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
<style>
  .thumb {
    height: 75px;
    border: 1px solid #000;
    margin: 10px 5px 0 0;
  }
</style>

<?php
$main="movie";
$sub="allmovie";
$id=$_GET['id'];

if(isset($_POST['saveimage'])){

$id=$_POST['id'];
$dc=new Movieimage();

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


    header("Location:editmovie.php?id=".$id);          
exit;
}









$xc=new Movie();
$moviedet=$xc->getmovie($id);
$movshows=$xc->getshows($id);


if(isset($_POST['save'])){


$vbs=new Theatre();
$theatres=$vbs->getalltheatres();
$id=$_POST['id'];
    $moviename=trim(strip_tags($_POST['moviename']));
    $actors=trim($_POST['actors']);
    $releasedate=trim($_POST['releasedate']);
       // $enddate=trim($_POST['enddate']);
    $trailer=trim($_POST['trailer']);
    $status=trim($_POST['status']);

if($status==0){
  
}

 if($_POST['protype']==1){
    $protype=1;
}else{
    $protype=0;
}
$spl=$_POST['spl'];
    $description=trim($_POST['description']);
$dt=date('Y-m-d',strtotime($releasedate));
   //$close=date('Y-m-d',strtotime($enddate));   

    if($moviename=='' || $actors=='' || $trailer=='' || $releasedate=='' || $status==''){

         $message    =   new Message('Enter mandatory fields','error');
         $message->setMessage();

    }else{

$obj= new Movie();
              $absDirName =   dirname(dirname(__FILE__)).'/uploads';
              $relDirName =   '../uploads';

              $uploader   =   new Uploader($absDirName.'/');
              $uploader->setExtensions(array('jpg','jpeg','png','gif','swf'));
             $uploader->setSequence('banner');
             $uploader->setMaxSize(5);
            if($uploader->uploadFile("txtFile")){       
      $image      =   $uploader->getUploadName(); 
$obj->updateimagesave($image,$id);
               }

   $inputs=array('moviename'=>$moviename,
                 'actors'=>$actors,
                 'releasedate'=>$dt,
                  'trailer'=>$trailer,
                  'status'=>$status,
                  'protype'=>$protype,
                   'spl'=>$spl,
                  'description'=>$description,
                  'id'=>$id
                     );

$s=$obj->editmoviesave($inputs);

        if($s){

    

for($i=0;$i<count($theatres);$i++){

if(isset($_POST['theatre'.$i])){

if(isset($_POST['chk'.$i])){
$showid=$_POST['chk'.$i];
}
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
if(isset($_POST['sec_2d_rate'.$i])){

  $sec_2d_rate=$_POST['sec_2d_rate'.$i];
} else{

   $sec_2d_rate=0;
}
if(isset($_POST['sec_3d_rate'.$i])){

  $sec_3d_rate=$_POST['sec_3d_rate'.$i];
} else{

   $sec_3d_rate=0;
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
if(isset($_POST['chk'.$i])){
  $st=1;
$obj->editshows($theatreid,$ms_status,$mat_status,$evg_status,$sec_status,$extra1_status,$extra2_status,$ms_2d_rate,$ms_3d_rate,$mat_2d_rate,$mat_3d_rate,$evg_2d_rate,$evg_3d_rate,$sec_2d_rate,$sec_3d_rate,$extrashow1_2d_rate,$extrashow1_3d_rate,$extrashow2_2d_rate,$extrashow2_3d_rate,$showid,$st);
}


} else{
if(isset($_POST['chk'.$i])){
$showid=$_POST['chk'.$i];
}

$s=$obj->editmainstatus($showid);

}



}
            $message    =   new Message('Movie details edited successfully ','message');
            $message->setMessage();
            header('Location:allmovies.php');
            exit;
         }else{
 $message    =   new Message('Unknown error','error');
            $message->setMessage();
             }



}
}


if(isset($_POST['publish'])){

$vbs=new Theatre();
$theatres=$vbs->getalltheatres();
$id=$_POST['id'];
    $moviename=trim(strip_tags($_POST['moviename']));
    $actors=trim($_POST['actors']);
    $releasedate=trim($_POST['releasedate']);
       // $enddate=trim($_POST['enddate']);
    $trailer=trim($_POST['trailer']);
    $status=trim($_POST['status']);

if($status==0){
  
}

 if($_POST['protype']==1){
    $protype=1;
}else{
    $protype=0;
}
$spl=$_POST['spl'];
    $description=trim($_POST['description']);
$dt=date('Y-m-d',strtotime($releasedate));
   //$close=date('Y-m-d',strtotime($enddate));   

    if($moviename=='' || $actors=='' || $trailer=='' || $releasedate=='' || $status==''){

         $message    =   new Message('Enter mandatory fields','error');
         $message->setMessage();

    }else{

$obj= new Movie();
              $absDirName =   dirname(dirname(__FILE__)).'/uploads';
              $relDirName =   '../uploads';

              $uploader   =   new Uploader($absDirName.'/');
              $uploader->setExtensions(array('jpg','jpeg','png','gif','swf'));
             $uploader->setSequence('banner');
             $uploader->setMaxSize(5);
            if($uploader->uploadFile("txtFile")){       
      $image      =   $uploader->getUploadName(); 
$obj->updateimagepublish($image,$id);
               }

   $inputs=array('moviename'=>$moviename,
                 'actors'=>$actors,
                 'releasedate'=>$dt,
                  'trailer'=>$trailer,
                  'status'=>$status,
                  'protype'=>$protype,
                   'spl'=>$spl,
                  'description'=>$description,
                  'id'=>$id
                     );

$s=$obj->editmoviepublish($inputs);

        if($s){

    

for($i=0;$i<count($theatres);$i++){

if(isset($_POST['theatre'.$i])){

if(isset($_POST['chk'.$i])){
$showid=$_POST['chk'.$i];
}
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
if(isset($_POST['sec_2d_rate'.$i])){

  $sec_2d_rate=$_POST['sec_2d_rate'.$i];
} else{

   $sec_2d_rate=0;
}
if(isset($_POST['sec_3d_rate'.$i])){

  $sec_3d_rate=$_POST['sec_3d_rate'.$i];
} else{

   $sec_3d_rate=0;
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
if(isset($_POST['chk'.$i])){
  $st=1;
$obj->editshows($theatreid,$ms_status,$mat_status,$evg_status,$sec_status,$extra1_status,$extra2_status,$ms_2d_rate,$ms_3d_rate,$mat_2d_rate,$mat_3d_rate,$evg_2d_rate,$evg_3d_rate,$sec_2d_rate,$sec_3d_rate,$extrashow1_2d_rate,$extrashow1_3d_rate,$extrashow2_2d_rate,$extrashow2_3d_rate,$showid,$st);
}


}else{
  if(isset($_POST['chk'.$i])){
$showid=$_POST['chk'.$i];
}

$s=$obj->editmainstatus($showid);

}



}
            $message    =   new Message('Movie details edited successfully ','message');
            $message->setMessage();
            header('Location:allmovies.php');
            exit;
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
                        <li><a href="#">Movies</a></li>
                        <li><span class="divider"></span></li>
                        <li><a href="#">Add</a></li>
                    </ul>
<form name="theatre" action="editmovie.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data"/>
      <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <div class="pull-left">

                        <div class="form-horizontal pull-left row">
                            <label class="title control-label" for="inputTitle">Movie</label>
                            <div class="controls"><input type="text" id="inputTitle" placeholder="Movie title" name="moviename" value="<?php echo $moviedet[0]['movie_name']; ?>"></div>
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

                        <form action="#">

                        <div class="mod-content">

                            <div class="row-fluid">
                                
                                <div class="row-fluid">

                                    <div class="span9 col-left">
                                        
                                        <div class="row-fluid">
                                          <div class="span12">
                                            <h5 class="orange">Description</h5>
                                            <textarea class="input-block-level" class="ckeditor" name="description" id="editor1"><?php echo $moviedet[0]['description']; ?></textarea>

                                            <script type="text/javascript">
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
                                                <input type="text" id="release-datepicker" name="releasedate" value="<?php echo $moviedet[0]['release_date']; ?>">
                                                <script>
                                                $(function() {
                                                $( "#release-datepicker1").datepicker();
                                                });
                                                </script>
                                                <hr>
                                                <div class="row-fluid">
                                                  <div class="span12">
                                                    <h5 class="orange">Status</h5>

                                                    <label class="radio">
                                                      <input type="radio" name="status" <?php if($moviedet[0]['movie_status']==0) { ?>   checked="checked" <?php } ?> value="0" >Upcoming
                                                    </label>
                                                    <label class="radio">
                                                      <input type="radio" name="status" <?php if($moviedet[0]['movie_status']==1) { ?>   checked="checked" <?php } ?> value="1" >Nowrunning
                                                    </label>
                                                    <label class="radio">
                                                      <input type="radio" name="status" <?php if($moviedet[0]['movie_status']==2) { ?>   checked="checked" <?php } ?> value="2" readonly="true">Closed  
                                                    </label> 
                                                  </div>
                                                </div>

                                                <hr>

                                                <div class="row-fluid">
                                                  <div class="span12">
                                                    <h5 class="orange">Special movie<h5>
                                                    <label class="radio">
                                                      <input type="radio" name="spl"  <?php if($moviedet[0]['spl']==0) { ?>   checked="checked" <?php } ?>  value="0"/>No
                                                    </label>
                                                    <label class="radio">
                                                      <input type="radio" name="spl" <?php if($moviedet[0]['spl']==1) { ?>   checked="checked" <?php } ?> value="1"/>Yes
                                                    </label>
                                                  </div>
                                                </div>
                                            </div>

                                            <div class="span6">
                                               <h5 class="orange">Cast &amp; crew</h5>
                                                <textarea name="actors" id="actors-editor"> <?php echo $moviedet[0]['actors']; ?></textarea>
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
                                                <h5 class="orange">Change Poster</h5>
                                            </div>

                                            <div class="row-fluid">
                                                 <div class="span4"> <img src="thumb.php?file=../uploads/<?php echo $moviedet[0]['poster']; ?>"></div>
                                                <div class="span6">
                                                    <input class="input-block-level" type="file" name="txtFile">
                                        </div>

                                             
                                            </div>

                                        </div>

                                        <hr>

                                        <div class="row-fluid">

                                            <div class="span12">
                                                <h5 class="orange">Change Teaser</h5>
                                            </div>

                                            <div class="row-fluid">
                                                
                                                <div class="span4">
                                                  <?php
                                                  $code=$moviedet[0]['trailer']; 
                                                  $org        =         $moviedet[0]['trailer'];
                                                  $pattern        =        '/width="([0-9]+)"/';
                                                  $rep                =        'width="100%"';

                                                  $code        =        preg_replace($pattern,$rep,$code);




                                                  $pattern        =        '/height="([0-9]+)"/';
                                                  $rep                =        'height="100"';


                                                  $code        =        preg_replace($pattern,$rep,$code);


                                                  echo $code;
                                                  ?>
                                                </div>

                                                <div class="span8">
                                                    <label>iframe</label>
                                                    <textarea name="trailer" ><?php 
                                                    $code=$moviedet[0]['trailer'];
                                                    $org        =         $code;
                                                    $pattern        =        '/width="([0-9]%+)"/';
                                                    $rep                =        'width="100%"';
                                                    $code        =        preg_replace($pattern,$rep,$code);
                                                    $pattern        =        '/height="([0-9]+)"/';
                                                    $rep                =        'height="100"';
                                                    $code        =        preg_replace($pattern,$rep,$code);
                                                    echo $code;
                                                    ?></textarea>
                                                </div>
                                                
                                            </div>
                                        </div>


   <hr>
<div class="alert"> <!-- movie images alert box start -->
<div class="row-fluid">
  <div class="span12">
    <h5 class="orange">Add Movie images:</h5> 
    <input type="hidden" value="<?php echo $id; ?>" name="id" />
    <input type="submit" name="saveimage" value="Upload" class="btn btn-info"/>
    <input type="file" id="files" name="files[]" multiple />
    <output id="list"></output>

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
  $dj=new Movieimage();
  $list = array();
$no=$dj->getmax();

 $num=$no[0]['MAX(`image_id`)'];

for($i=0;$i<=$num;$i++){

  if(isset($_POST[$i])){
 $dj->updateimagetitle($i,$_POST[$i]);
  }
}
header("Location:editmovie.php?id=$id");
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
    $obj  = new Movieimage();
    $obj->deleteList($list);
    $message  = new Message('Selected items deleted ','message');
    $message->setMessage(); 
  }else{
      $message  = new Message('No items selected','error');
      $message->setMessage();   
  }
  header("Location:editmovie.php?id=$id");
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
    $obj  = new Movieimage();
    $obj->unpublishList($list);
    $message  = new Message('Selected items were unpublished ','message');
    $message->setMessage(); 
  }else{
      $message  = new Message('No items selected','error');
      $message->setMessage();   
  }
  header("Location:editmovie.php?id=$id");
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
    $obj  = new Movieimage();
    $obj->publishList($list);
    $message  = new Message('Selected items were published ','message');
    $message->setMessage(); 
  }else{
      $message  = new Message('No items selected','error');
      $message->setMessage();   
  }
  header("Location:editmovie.php?id=$id");
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
$bn = new Movieimage();
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
if($totalRecords > 0){  ?>
<br>
<div class="row-fluid">
  <div class="span6">
    <h5 class="orange">Manage images:</h5> 
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
        <a href="publish_movieimage.php?id=<?php echo $records[$i]["image_id"];?>&theatreid=<?php echo $id; ?>"  class="btn btn-success"><i class="icon-ok"></i></a>

        <?php } else{   ?>
        <a href="unpublish_movieimage.php?id=<?php echo $records[$i]["image_id"];?>&theatreid=<?php echo $id; ?>" class="btn btn-warning"><i class="icon-folder-close"></i></a>

        <?php } ?>
        <a href="delete_movieimage.php?id=<?php echo $records[$i]["image_id"];?>&theatreid=<?php echo $id; ?>" class="btn"><i class="icon-trash"></i></a>
        </div>
      </div>
    </li>
    <?php } ?>
    </ul>

  </div>

</div>

  <?php } ?>


</div> <!-- movie images alert box end -->


<?php

if(isset($_POST['addtrailer'])){

$trailertitle=$_POST['trailertitle'];
$trailer=$_POST['trailerloop'];
$theatreid=$_POST['id'];
$fus=new Trailer();
$cc=$fus->add($theatreid,$trailertitle,$trailer);
if($cc){
  header("Location:editmovie.php?id=".$theatreid);
  exit;
}
}

?>

<?php
$start  = $_GET['start'];
$limit  = 25;
if(empty($start)){
  $start  = 0;
}
 $id=$_GET['id'];
if(isset($_POST['savetrailerForm'])){
 $cnt  = $_POST['counttrailer'];
  $id = $_POST['id'];
  $dj=new Trailer();
  $list = array();
$no=$dj->getmax();

 $num=$no[0]['MAX(`id`)'];

for($i=0;$i<=$num;$i++){

  if(isset($_POST[$i])){
 $dj->updateimagetitle($i,$_POST[$i]);
  }
}
header("Location:editmovie.php?id=$id");
  exit;


}


if(isset($_POST['deletetrailer'])){
  $cnt  = $_POST['counttrailer'];
  $id = $_POST['id'];
  $list = array();
  for($i=0;$i<$cnt;$i++){
    if(isset($_POST['chkIdt'.$i])){
      $list[] = $_POST['chkIdt'.$i];
    }
  }
  if(count($list)>0){
    $obj  = new Trailer();
    $obj->deleteList($list);
    $message  = new Message('Selected items deleted ','message');
    $message->setMessage(); 
  }else{
      $message  = new Message('No items selected','error');
      $message->setMessage();   
  }
  header("Location:editmovie.php?id=$id");
  exit;
  
}


if(isset($_POST['unpublishtrailer'])){
  $cnt  = $_POST['counttrailer'];
  $id = $_POST['id'];
  $list = array();
  for($i=0;$i<$cnt;$i++){
    if(isset($_POST['chkIdt'.$i])){
      $list[] = $_POST['chkIdt'.$i];
    }
  }
 
  if(count($list)>0){
    $obj  = new Trailer();
    $obj->unpublishList($list);
    $message  = new Message('Selected items were unpublished ','message');
    $message->setMessage(); 
  }else{
      $message  = new Message('No items selected','error');
      $message->setMessage();   
  }
  header("Location:editmovie.php?id=$id");
  exit;
}

/*
 * Publish Seleted list of items
*/
if(isset($_POST['publishtrailer'])){
  $cnt  = $_POST['counttrailer'];
  $id = $_POST['id'];
  $list = array();
  for($i=0;$i<$cnt;$i++){
    if(isset($_POST['chkIdt'.$i])){
      $list[] = $_POST['chkIdt'.$i];
    }
  }
  if(count($list)>0){
    $obj  = new Trailer();
    $obj->publishList($list);
    $message  = new Message('Selected items were published ','message');
    $message->setMessage(); 
  }else{
      $message  = new Message('No items selected','error');
      $message->setMessage();   
  }
  header("Location:editmovie.php?id=$id");
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
$bns = new Trailer();
$records  = $bns->listimage($values,$_GET['id']);
$totalRecordstrail = $bns->totalRecords;
$pageRecordstrail  = $bns->pageRecords;
$cnt  = $totalRecords/$limit;
$cnt  = ceil($cnt);
$current  = ($start/$limit)+1;  

$pg1 = new Pages();
$pages  = $pg1->getPages($current,$cnt,$limit);          
$first  = $pg1->getFirst($cnt,$limit);
$last = $pg1->getLast($cnt,$limit);
$prev = $pg1->getPrev($current,$cnt,$limit);
$next = $pg1->getNext($current,$cnt,$limit);
?>




<div class="alert alert-info"> <!-- movie trailers alert box start -->
  <div class="row-fluid">
    <div class="span6">
      <h5 class="orange">Add Trailer:</h5> 
      <label>Title</label>
      <input type="text" class="input-block-level" name="trailertitle" value="" placeholder="Trailer name">
      <label>Iframe</label>
      <textarea name="trailerloop" ></textarea>

      <button class="btn btn-primary" type="submit" name="addtrailer">Add</button>

    </div>
  </div>


<?php if($totalRecordstrail > 0) { ?>

<div class="row-fluid">
  <div class="span12">

    <h5 class="orange">Manage Trailers:</h5>

    <div class="btn-group">
      <label class="btn"><input  type="checkbox" onclick="checkAlltrailer(this);" class="incheckbox"></label>
      <input type="submit" name="publishtrailer" value="Publish" class="btn btn-success">
      <input class="btn btn-primary" type="submit" value="Revert to Draft" name="unpublishtrailer">
      <input class="btn btn-danger" type="submit" value="Delete" name="deletetrailer">
      <input class="btn btn-info" type="submit" value="Save" name="savetrailerForm">
    </div>
    <input type="hidden" name="counttrailer" id="counttrailer" value="<?php echo $pageRecordstrail;?>" />
    <input type="hidden" name="id" id="id" value="<?php echo $id;?>" />

  <br> <br>

  <ul class="thumbnails">
    <?php
    for($i=0;$i<$pageRecordstrail;$i++){
    ?>
    <li class="span4">
      <div class="thumbnail" title="<?php echo $records[$i]["name"];?>">
        <input type="text" class="input-block-level" name="<?php echo $records[$i]["id"];?>" value="<?php echo $records[$i]["name"];?>">
      <p>
        <?php
        $codes=$records[$i]["url"]; 
        $orgs       =         $codes;
        $patterns      =        '/width="([0-9]+)"/';
        $reps                =        'width="100%"';
        $codes        =        preg_replace($patterns,$reps,$codes);
        $patterns        =        '/height="([0-9]+)"/';
        $reps                =        'height="100"';
        $codes        =        preg_replace($patterns,$reps,$codes);
        echo $codes;
        ?>
      </p>
      <div class="btn-group">
        <label class="btn"><input type="checkbox" class="r_bu incheckbox" name="chkIdt<?php echo $i;?>" id="chkIdt<?php echo $i;?>" value="<?php echo $records[$i]['id'];?>"></label>
        <?php  if($records[$i]["status"]==0){  ?>
        <a href="publish_trailer.php?id=<?php echo $records[$i]["id"];?>&theatreid=<?php echo $id; ?>"  class="btn btn-success"><i class="icon-ok"></i></a>

        <?php } else{   ?>
        <a href="unpublish_trailer.php?id=<?php echo $records[$i]["id"];?>&theatreid=<?php echo $id; ?>" class="btn btn-warning"><i class="icon-folder-close"></i></a>

        <?php } ?>
        <a href="delete_trailer.php?id=<?php echo $records[$i]["id"];?>&theatreid=<?php echo $id; ?>" class="btn"><i class="icon-trash"></i></a>

      </div>
      </div>
    </li>

    <?php
    }
    
    ?>
  </ul>
  </div>
</div>
<?php } ?>

</div> <!-- movie trailers alert box start -->


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
                                            <label class="checkbox">3D Technology<input type="checkbox" class="moviein-3d" name="protype" value="1" <?php if($moviedet[0]['proj_status']==1) { ?>   checked="checked" <?php } ?>></label>
                                            <!-- <label class="checkbox">2D Technology<input type="checkbox" name="protype" value="1"></label> -->
                                        </div>
                                      <div id="taluk"> </div>
                                        <div id="error"> </div>
<?php

$cx=new Theatre();
 for($i=0;$i<count($theatres);$i++){  ?>
 <?php for($j=0;$j<count($movshows);$j++){  ?>
 <?php if($movshows[$j]['theatre_id']==$theatres[$i]['theatre_id']){   ?>
 <input type="hidden"  name="chk<?php echo $i;  ?>"   value="<?php echo $movshows[$j]['show_id']; ?>" />
 <input type="hidden" name="tht<?php echo $i ?>" value="<?php echo $theatres[$i]['theatre_id']; ?>"/>
                                        <div class="theatre-select alert alert-info userselect-none">
                                            <div>
                                                <label data-toggle="collapse" data-target="#<?php echo $theatres[$i]['theatre_name']; ?>" class="theatre-name"><input  type="checkbox" <?php if($movshows[$j]['mainstatus']==1){   ?> <?php if($movshows[$j]['theatre_id']==$theatres[$i]['theatre_id']){   ?> checked="checked" <?php } } ?>   name="theatre<?php echo $i; ?>" value="<?php echo $theatres[$i]['theatre_id']; ?>" >&nbsp;&nbsp;<strong><?php echo $theatres[$i]['theatre_name']; ?> </strong><?php if($movshows[$j]['mainstatus']==1){   ?><span class="label label-success"> Active</span> <?php } ?> </label>
                                            </div>
                                            <?php
$tgt=$theatres[$i]['theatre_id'];
$zz=$cx->gettheatre($tgt);

                                            ?>
                                            <div id="<?php echo $theatres[$i]['theatre_name']; ?>"  <?php if($movshows[$j]['mainstatus']==1){   ?> <?php if($movshows[$j]['theatre_id']==$theatres[$i]['theatre_id']){   ?> class="collapse in" <?php } }else{  ?> class="collapse" <?php } ?> >
                                                
                                                <label class="checkbox"><input class="cus-rate-checkbox" type="checkbox" > Set Custom rate</label>
                                                <h6 class="label label-info">Show details:</h6>

                                                <?php if($zz[0]['ms_status']==1){   ?>

                                                <div class="list">
                                                    <label class="checkbox"><input type="checkbox" onclick="callvalms(<?php echo $theatres[$i]['theatre_id']; ?>,<?php echo $theatres[$i]['ms_time']; ?>);"  <?php if($movshows[$j]['mainstatus']==1){   ?>    <?php if($movshows[$j]['ms_status']==1){   ?> checked="checked" <?php  } } ?> name="msstatus<?php echo $i; ?>" value="<?php echo $theatres[$i]['theatre_id']; ?>"> <?php echo $theatres[$i]['ms_time']; ?></label>
                                                    <div class="cus-rate">
                                                        <label>Rate <input class="input-block-level" type="text" name="ms_2d_rate<?php echo $i; ?>"<?php if($movshows[$j]['mainstatus']==1){   ?>    <?php if($movshows[$j]['ms_status']==1){   ?>  value="<?php echo $movshows[$j]['ms_2d_rate']; ?>" <?php } } else{ ?> value="<?php echo $theatres[$i]['ms_2d_rate']; ?>"  <?php } ?> ></label>
                                                        <label class="cus3d-rate">3D <input class="input-block-level" type="text" name="ms_3d_rate<?php echo $i; ?>" <?php if($movshows[$j]['mainstatus']==1){   ?>    <?php if($movshows[$j]['ms_status']==1){   ?>  value="<?php echo $movshows[$j]['ms_3d_rate']; ?>" <?php } } else{ ?> value="<?php echo $theatres[$i]['ms_3d_rate']; ?>"  <?php } ?>></label>
                                                    </div>
                                                </div>
<?php } ?>

<?php if($zz[0]['mat_status']==1){   ?>

                                                <div class="list">
                                                    <label class="checkbox"><input type="checkbox" onclick="callvalmat(<?php echo $theatres[$i]['theatre_id']; ?>,<?php echo $theatres[$i]['matinee_time']; ?>);" name="matineestatus<?php echo $i; ?>" <?php if($movshows[$j]['mainstatus']==1){   ?>  <?php if($movshows[$j]['mat_status']==1){   ?> checked="checked" <?php } } ?> value="<?php echo $theatres[$i]['theatre_id']; ?>"> <?php echo $theatres[$i]['matinee_time']; ?></label>
                                                    <div class="cus-rate">
                                                        <label>Rate <input class="input-block-level" type="text" name="mat_2d_rate<?php echo $i; ?>" <?php if($movshows[$j]['mainstatus']==1){   ?>    <?php if($movshows[$j]['mat_status']==1){   ?>  value="<?php echo $movshows[$j]['mat_2d_rate']; ?>" <?php } } else{ ?> value="<?php echo $theatres[$i]['mat_2d_rate']; ?>"  <?php } ?>></label>
                                                        <label class="cus3d-rate">3D <input class="input-block-level" type="text" name="mat_3d_rate<?php echo $i; ?>" <?php if($movshows[$j]['mainstatus']==1){   ?>    <?php if($movshows[$j]['mat_status']==1){   ?>  value="<?php echo $movshows[$j]['mat_3d_rate']; ?>" <?php } } else{ ?> value="<?php echo $theatres[$i]['mat_3d_rate']; ?>"  <?php } ?>></label>
                                                    </div>
                                                </div>
<?php } ?>
<?php if($zz[0]['evg_status']==1){   ?>


                                                <div class="list">
                                                    <label class="checkbox"><input type="checkbox" name="evgstatus<?php echo $i; ?>" value="<?php echo $theatres[$i]['theatre_id']; ?>" onclick="callvalevg(<?php echo $theatres[$i]['theatre_id']; ?>,<?php echo $theatres[$i]['evg_time']; ?>);"  <?php if($movshows[$j]['mainstatus']==1){   ?>  <?php if($movshows[$j]['evg_status']==1){   ?> checked="checked" <?php  } } ?> > <?php echo $theatres[$i]['evg_time']; ?></label>
                                                    <div class="cus-rate">
                                                        <label>Rate <input class="input-block-level" type="text" name="evg_2d_rate<?php echo $i; ?>"  <?php if($movshows[$j]['mainstatus']==1){   ?>    <?php if($movshows[$j]['evg_status']==1){   ?>  value="<?php echo $movshows[$j]['evg_2d_rate']; ?>" <?php } } else{ ?> value="<?php echo $theatres[$i]['evg_2d_rate']; ?>"  <?php } ?>></label>
                                                        <label class="cus3d-rate">3D <input class="input-block-level" type="text" name="evg_3d_rate<?php echo $i; ?>"  <?php if($movshows[$j]['mainstatus']==1){   ?>    <?php if($movshows[$j]['evg_status']==1){   ?>  value="<?php echo $movshows[$j]['evg_3d_rate']; ?>" <?php } } else{ ?> value="<?php echo $theatres[$i]['evg_3d_rate']; ?>"  <?php } ?>></label>
                                                    </div>
                                                </div>
<?php } ?>
<?php if($zz[0]['sec_status']==1){   ?>



                                                <div class="list">
                                                    <label class="checkbox"><input type="checkbox" onclick="callvalsec(<?php echo $theatres[$i]['theatre_id']; ?>,<?php echo $theatres[$i]['second_time']; ?>);" name="secondstatus<?php echo $i; ?>" value="<?php echo $theatres[$i]['theatre_id']; ?>"  <?php if($movshows[$j]['mainstatus']==1){   ?>  <?php if($movshows[$j]['sec_status']==1){   ?> checked="checked" <?php  } } ?>> <?php echo $theatres[$i]['second_time']; ?></label>
                                                    <div class="cus-rate">
                                                        <label>Rate <input class="input-block-level" type="text" name="sec_2d_rate<?php echo $i; ?>" <?php if($movshows[$j]['mainstatus']==1){   ?>    <?php if($movshows[$j]['sec_status']==1){   ?>  value="<?php echo $movshows[$j]['sec_2d_rate']; ?>" <?php } } else{ ?> value="<?php echo $theatres[$i]['sec_2d_rate']; ?>"  <?php } ?>></label>
                                                        <label class="cus3d-rate">3D <input class="input-block-level" type="text" name="sec_3d_rate<?php echo $i; ?>" <?php if($movshows[$j]['mainstatus']==1){   ?>    <?php if($movshows[$j]['sec_status']==1){   ?>  value="<?php echo $movshows[$j]['sec_3d_rate']; ?>" <?php } } else{ ?> value="<?php echo $theatres[$i]['sec_3d_rate']; ?>"  <?php } ?>></label>
                                                    </div>
                                                </div>
                                                <?php } ?>
<?php if($zz[0]['extrashow1_status']==1){   ?>
                                      <div class="list">
                                                    <label class="checkbox"><input type="checkbox" onclick="callvalextra1(<?php echo $theatres[$i]['theatre_id']; ?>,<?php echo $theatres[$i]['extrashow1_time']; ?>);" name="extra1status<?php echo $i; ?>" value="<?php echo $theatres[$i]['theatre_id']; ?>"<?php if($movshows[$j]['mainstatus']==1){   ?>  <?php if($movshows[$j]['extrashow1_status']==1){   ?> checked="checked" <?php  } } ?>> <?php echo $theatres[$i]['extrashow1_time']; ?></label>
                                                    <div class="cus-rate">
                                                        <label>Rate <input class="input-block-level" type="text" name="extrashow1_2d_rate<?php echo $i; ?>" <?php if($movshows[$j]['mainstatus']==1){   ?>    <?php if($movshows[$j]['extrashow1_status']==1){   ?>  value="<?php echo $movshows[$j]['extrashow1_2d_rate']; ?>" <?php } } else{ ?> value="<?php echo $theatres[$i]['extrashow1_2d_rate']; ?>"  <?php } ?>></label>
                                                        <label class="cus3d-rate">3D <input class="input-block-level" type="text" name="extrashow1_3d_rate<?php echo $i; ?>"  <?php if($movshows[$j]['mainstatus']==1){   ?>    <?php if($movshows[$j]['extrashow1_status']==1){   ?>  value="<?php echo $movshows[$j]['extrashow1_3d_rate']; ?>" <?php } } else{ ?> value="<?php echo $theatres[$i]['extrashow1_3d_rate']; ?>"  <?php } ?>></label>
                                                    </div>
                                                </div>
<?php } ?>
<?php if($zz[0]['extrashow1_status']==1){   ?>
                                                 <div class="list">
                                                    <label class="checkbox"><input type="checkbox" onclick="callvalextra2(<?php echo $theatres[$i]['theatre_id']; ?>,<?php echo $theatres[$i]['extrashow2_time']; ?>);"  name="extra2status<?php echo $i; ?>" value="<?php echo $theatres[$i]['theatre_id']; ?>" <?php if($movshows[$j]['mainstatus']==1){   ?>  <?php if($movshows[$j]['extrashow2_status']==1){   ?> checked="checked" <?php  } } ?>> <?php echo $theatres[$i]['extrashow2_time']; ?></label>
                                                    <div class="cus-rate">
                                                        <label>Rate <input class="input-block-level" type="text" name="extrashow2_2d_rate<?php echo $i; ?>" <?php if($movshows[$j]['mainstatus']==1){   ?>    <?php if($movshows[$j]['extrashow2_status']==1){   ?>  value="<?php echo $movshows[$j]['extrashow2_2d_rate']; ?>" <?php } } else{ ?> value="<?php echo $theatres[$i]['extrashow2_2d_rate']; ?>"  <?php } ?>></label>
                                                        <label class="cus3d-rate">3D <input class="input-block-level" type="text" name="extrashow2_3d_rate<?php echo $i; ?>" <?php if($movshows[$j]['mainstatus']==1){   ?>    <?php if($movshows[$j]['extrashow2_status']==1){   ?>  value="<?php echo $movshows[$j]['extrashow2_3d_rate']; ?>" <?php } } else{ ?> value="<?php echo $theatres[$i]['extrashow2_3d_rate']; ?>"  <?php } ?>></label>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div> 
<?php }  }  } ?>

                                    </div> <!-- .sidebar -->

                                  </div>

                            </div> <!-- .container-fluid -->



                        </div> <!-- .mod-content -->

                        </form>



                    </div> <!-- .add-edit -->

                </div> <!-- .main -->

            </div>
 <script type="text/javascript" src="js/util.js"></script>
<?php include_once 'footer.php'; ?>

        </div> <!-- #content -->

    </body>
</html>
    