<?php include_once 'header.php'; ?>
<?php
$main="pages";
$sub="contact";
if(isset($_POST["save"])){
    
    /*
     * Process Form Values
    */
    $email      =   trim($_POST['email']);
    $landline              =   trim($_POST['landline']);
   $mobile             =   trim($_POST['mobile']);
     $address           =   trim($_POST['address']);
    
    /*
     * Validate form entries
    */  
    if(trim($email)==''  || trim($address)==''){
        $message    =   new Message('Enter mandatory fields','error');
        $message->setMessage();
        
    }else{
       
        /*
         * Update User Account Details
         * Change Password
        */
        $obj    =   new Auth();
      
        $options    =   array('email'=>$email,'landline'=>$landline,'mobile'=>$mobile,'address'=>$address);
                
        if($obj->updatecontact($options)){  //successfully updated , set messge queue]
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
$set=$df->getcontactus();



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
                        <li><a href="#">Contact us</a></li>
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

                        <form action="contactus.php" method="post" enctype="multipart/form-data">

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
                                    <h4 class="orange">Contact us settings</h4>
                                </div>
                            </div>


                            <div class="row-fluid">
                                <div class="span4">
                                    <label>Email</label>
                                </div>
                                <div class="span8">
                                    <input type="text" name="email" value="<?php echo $set[0]["email"];?>">
                                </div>
                            </div>

                          
  <br>
              <div class="row-fluid">
                                <div class="span4">
                                    <label>Landline</label>
                                </div>
                                <div class="span8">
                                    <input type="text" name="landline" value="<?php echo $set[0]["landline"];?>">
                                </div>
                            </div>

                          
  <br>
              <div class="row-fluid">
                                <div class="span4">
                                    <label>Mobile</label>
                                </div>
                                <div class="span8">
                                    <input type="text" name="mobile" value="<?php echo $set[0]["mobile"];?>">
                                </div>
                            </div>

                          
  <br>
                            <div class="row-fluid">
                                <div class="span4">
                                    <label>Address</label>
                                </div>
                                <div class="span8">
                                    <textarea class="input-xlarge" rows="6" name="address"><?php echo $set[0]['address'];?></textarea>
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
    