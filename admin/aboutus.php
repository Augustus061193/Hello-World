<?php include_once 'header.php'; ?>
<?php
$main="pages";
$sub="about";
if(isset($_POST["save"])){
    
    /*
     * Process Form Values
    */
    $title      =   trim($_POST['websitename']);
  
    $description               =   trim($_POST['description']);
  
    
    /*
     * Validate form entries
    */  
    if(trim($title)==''  || trim($description)==''){
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
                 $s->addlogoabout($image);
                
            } 
}



        /*
         * Update User Account Details
         * Change Password
        */
        $obj    =   new Auth();
      
        $options    =   array('title'=>$title,'description'=>$description);
                
        if($obj->updateabout($options)){  //successfully updated , set messge queue]
            $message    =   new Message('About us details updated','message');
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
$set=$df->getaboutus();



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
                        <li><a href="#">Pages</a></li>
                        <li><span class="divider"></span></li>
                        <li><a href="#">About us</a></li>
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

                        <form action="aboutus.php" method="post" enctype="multipart/form-data">

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
                                    <h4 class="orange">About us settings</h4>
                                </div>
                            </div>


                            <div class="row-fluid">
                                <div class="span4">
                                    <label>Title</label>
                                </div>
                                <div class="span8">
                                    <input type="text" name="websitename" value="<?php echo $set[0]["title"];?>">
                                </div>
                            </div>

                          
  <br>
                            <div class="row-fluid">
                                <div class="span4">
                                    <label>Description</label>
                                </div>
                                <div class="span8">
                                    <textarea class="input-xlarge" rows="6" name="description" id="abt-desc"><?php echo $set[0]['description'];?></textarea>

                                    <script type="text/javascript">
                                      CKEDITOR.replace( 'abt-desc',
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

                         

                            <br>
<div class="row-fluid">
                                <div class="span6">
       <img src="thumb.php?file=../uploads/<?php echo $set[0]['image'];?>&size=100">                   
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

                        

                            
                    
                        </div> <!-- .mod-content -->

                        </form>



                    </div> <!-- .add-edit -->

                </div> <!-- .main -->

            </div>

<?php include_once 'footer.php'; ?>

        </div> <!-- #content -->

    </body>
</html>
    