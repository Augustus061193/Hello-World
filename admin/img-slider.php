<?php include_once 'header.php'; ?>
<?php
$main="settings";
$sub="imgslider";
if(isset($_POST["save"])){
    
    /*
     * Process Form Values
    */
    $txtFileName      =   trim($_FILES['txtFile']['name']);
	$radActive        =   trim($_POST['radActive']);
	$radCookie        =   trim($_POST['radCookie']);
    
    /*
     * Validate form entries
    */  
    /*if(trim($txtFileName) == '' ){
        $message    =   new Message('Enter mandatory fields','error');
        $message->setMessage();
        
    }else{*/
       
if($_FILES['txtFile']['name']!=''){

    $absDirName =   dirname(dirname(__FILE__)).'/uploads';
            $relDirName =   '../uploads';
        
            $uploader   =   new Uploader($absDirName.'/');
            $uploader->setExtensions(array('jpg','jpeg','png','gif'));
            $uploader->setSequence('logo');
            $uploader->setMaxSize(10);
            if($uploader->uploadFile("txtFile"))
			{
                 $image     = $uploader->getUploadName(); 
                 $s			= new Auth;
                 $s->addSliderImg($image);
				 
				 /*$message    =   new Message('Slider imagae updated','message');
           		 $message->setMessage();  */
                
            }//end if 
}//end if
		
		$obj    =   new Auth();
		$options    =   array('name' => $radCookie, 'pass_key' => $radActive);
		$obj->updateEventSetting($options);
    //}
    
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
$obj    =   new Auth();
$base   =   $obj->getSliderImage();
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

                <div class="main">

                    <div class="add-edit">

                        <form action="img-slider.php" method="post" enctype="multipart/form-data">

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
                                    <h4 class="orange">Event Banner Settings</h4>
                                </div>
                            </div>

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
                                    <label>Active</label>
                                </div>
                                <div class="span8">
                                	<input type="radio" name="radActive" value="1" <?php if($base[0]['pass_key'] == 1){echo 'checked';}?>>&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="radActive" value="0" <?php if($base[0]['pass_key'] == 0){echo 'checked';}?>>&nbsp;No
                                </div>
                            </div>
                            <br>
                            <div class="row-fluid">
                                <div class="span4">
                                    <label>Cookie Enable</label>
                                </div>
                                <div class="span8">
                                   <input type="radio" name="radCookie" value="1" <?php if($base[0]['name'] == 1){echo 'checked';}?>>&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="radCookie" value="0" <?php if($base[0]['name'] == 0){echo 'checked';}?>>&nbsp;No
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
    