<?php include_once 'header.php'; ?>
<?php
$main="settings";
$sub="basic";
if(isset($_POST["save"])){
    
    /*
     * Process Form Values
    */
    $txtUsername        =   trim($_POST['txtUsername']);
    $txtPassword        =   trim($_POST['txtPassword']);
    $txtName                =   trim($_POST['txtName']);
    $txtEmail               =   trim($_POST['txtEmail']);
     $privacy               =   trim($_POST['privacypolicy']);
    
    /*
     * Validate form entries
    */  
    if(trim($txtUsername)=='' || trim($txtPassword)=='' || trim($txtName)=='' || trim($txtEmail)==''){
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
        $key    =   rand(0,9999).rand(111,999);
        $crypt  = new Crypt; 
        $crypt->crypt_key($key);                                        // Get encryption key
        $password = $crypt->encrypt($txtPassword);  // encrypt username

        $options    =   array('username'=>$txtUsername,'password'=>$password,'key'=>$key,
                                            'email'=>$txtEmail,'name'=>$txtName,'privacy'=>$privacy);
                
        if($obj->updateAccount($options)){  //successfully updated , set messge queue]
            $message    =   new Message('Account details updated','message');
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
$obj    =   new Auth();
$base   =   $obj->getLoggedInfo();
$key    =   $base[0]['pass_key'];
$crypt  = new Crypt; 
$crypt->crypt_key($key);                                        // Get encryption key
$password = $crypt->decrypt($base[0]['password']);  // encrypt username


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

                        <form action="settings-basic.php" method="post" enctype="multipart/form-data">

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
                                    <h4 class="orange">Account Settings</h4>
                                </div>
                            </div>


                            <div class="row-fluid">
                                <div class="span4">
                                    <label>Username</label>
                                </div>
                                <div class="span8">
                                    <input type="text" name="txtUsername" value="<?php echo $base[0]["username"];?>">
                                </div>
                            </div>

                            <br>

                            <div class="row-fluid">
                                <div class="span4">
                                    <label>Password</label>
                                </div>
                                <div class="span8">
                                    <input type="password" name="txtPassword" value="<?php echo $password;?>">
                                </div>
                            </div>

                            <br>


                            <div class="row-fluid">
                                <div class="span4">
                                    <label>Email</label>
                                </div>
                                <div class="span8">
                                    <input type="text" name="txtEmail" value="<?php echo $base[0]["email"];?>">
                                </div>
                            </div>

                            <br>


                            <div class="row-fluid">
                                <div class="span4">
                                    <label>Fullname</label>
                                </div>
                                <div class="span8">
                                    <input type="text" name="txtName" value="<?php echo $base[0]["name"];?>">
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
                                    <label>Privacy policy</label>
                                </div>
                                <div class="span8">
                                    <textarea class="input-xlarge" rows="6" name="privacypolicy"><?php echo $base[0]['privacypolicy'];?></textarea>
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
    