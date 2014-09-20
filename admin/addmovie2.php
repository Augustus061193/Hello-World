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
            exit;
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

    