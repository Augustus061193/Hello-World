<?php include_once 'header.php'; ?>
<?php
$main="settings";
$sub="basic";
if(isset($_POST["save"])){
    
    /*
     * Process Form Values
    */
    $websitename       =   trim($_POST['websitename']);
    $keywords       =   trim($_POST['keywords']);
    $description               =   trim($_POST['description']);
  
    
    /*
     * Validate form entries
    */  
    if(trim($websitename)=='' || trim($keywords)=='' || trim($description)==''){
        $message    =   new Message('Enter mandatory fields','error');
        $message->setMessage();
        
    }else{
       
if($_FILES['txtFile']['name']!=''){

    $absDirName =   dirname(dirname(__FILE__)).'/uploads';
            $relDirName =   '../uploads';
        
            $uploader   =   new Uploader($absDirName.'/');
            $uploader->setExtensions(array('jpg','jpeg','png','gif'));
            $uploader->setSequence('logo');
            $uploader->setMaxSize(10);
            if($uploader->uploadFile("txtFile")){
        
             
                 $image     =   $uploader->getUploadName(); 
                 $s=new Auth;
                 $s->addlogo($image);
                
            } 
}



        /*
         * Update User Account Details
         * Change Password
        */
        $obj    =   new Auth();
      
        $options    =   array('websitename'=>$websitename,'keywords'=>$keywords,'description'=>$description);
                
        if($obj->updatesite($options)){  //successfully updated , set messge queue]
            $message    =   new Message('Site details updated','message');
            $message->setMessage();         
            header('Location:home.php');
            exit;   
            
        }else{  //failed insertion due to db error, set message queue
            $message    =   new Message('Unknown Error','error');
            $message->setMessage();
        }
    }
    
}

/*
* Cancel Button Clicked 
*/
if(isset($_POST["close"])){
    $message    =   new Message('Action Cancelled','warning');
    $message->setMessage();
    header("Location:home.php");
    exit;
}
$df=new Auth();
$set=$df->getsettingsbasic();

$base   =   $df->getLoggedInfo();

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
                        <li><a href="#">Basic</a></li>
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

                        <form action="settings-site.php" method="post" enctype="multipart/form-data">

                        <div class="mod-header clearfix">
                            <div class="pull-left">

                                <div class="row">

                                    <div class="span6">
                                        <input class="btn btn-success" type="submit" value="Update" name="save">
                                        <input class="btn btn-danger" type="submit" value="Close" name="close">
                                    </div>

                                </div>

                            </div>

                        </div> <!-- .mod-header -->

                        <div class="mod-content">

                            <div class="row-fluid">
                                <div class="span12">
                                    <h4 class="orange">Website Settings</h4>
                                </div>
                            </div>


                            <div class="row-fluid">
                                <div class="span4">
                                    <label>Website name</label>
                                </div>
                                <div class="span8">
                                    <input type="text" name="websitename" value="<?php echo $set[0]["sitename"];?>">
                                </div>
                            </div>

                          
  <br>
                            <div class="row-fluid">
                                <div class="span4">
                                    <label>Description</label>
                                </div>
                                <div class="span8">
                                    <textarea class="input-xlarge" rows="6" name="description"><?php echo $set[0]['description'];?></textarea>
                                </div>
                            </div>

                         

                            <br>
<div class="row-fluid">
                                <div class="span6">
       <img src="thumb.php?file=../uploads/<?php echo $base[0]['logo'];?>&size=100">                   
</div>
                            </div>

                            <br>

<div class="row-fluid">
                                <div class="span4">
                                    <label>(upload 260X65px)</label>
                                </div>
                                <div class="span8">
                                 <input type="file" name="txtFile"  size="40" maxlength="90" tabindex="3" />
                                </div>
                            </div>

                            <br>
                            <div class="row-fluid">
                                <div class="span4">
                                    <label>Keywords</label>
                                </div>
                                <div class="span8">
                                    <textarea class="input-xlarge" rows="6" name="keywords"><?php echo $set[0]['keywords'];?></textarea>
                                </div>
                            </div>

                            
                    
                        </div> <!-- .mod-content -->

                        </form>



                    </div> <!-- .add-edit -->

                </div> <!-- .main -->

            </div>

<?php include_once 'footer.php'; ?>

        </div> <!-- #content -->

    </body>
</html>
    