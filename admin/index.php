<?php
ob_start();
session_start();
include("autoload.php");

$db     =   new MySql();
$db->connect();
/*
 * Date:8-16-2012
 * Login Form , entry to the application
 * Auhthor : Litto chacko
 * Email:littochackomp@gmail.com
*/


//Already logged user, go to home page
if(isset($_SESSION["loggedUser"])){
    header("Location:home.php");
    exit;
}


/*
 * Get cookie values and fillout username/password fields
*/
$msg                =   null;
$saveLogin  =   $_COOKIE["saveLogin"];
$loginKey       =   $_COOKIE["loginKey"];
$cookieUser =   $_COOKIE["username"];
$cookiePass =   $_COOKIE["password"];

if($saveLogin==1 && !empty($loginKey)){
    $crypt = new Crypt; 
    $crypt->crypt_key($loginKey);                       // Get encryption key
    $username = $crypt->decrypt($cookieUser);   // Get username
    $password = $crypt->decrypt($cookiePass);   // Get Password 
}else{
    $username = ""; // Get username
    $password = ""; // Get Password 
}

/*
 * Get Error messages on login failure
*/
$error  =   $_GET["error"];
if($error==1){
    $msg    =   "Enter all mandatory fields !";
}else if($error==2){
    $msg    =   "Invalid username / password ";
}else if($error==3){
    $msg="Action cancelled";
}

$df=new User;
$logodet=$df->getauth();

?>
<?php include_once 'indexheader.php'; ?>

        <div id="fixedbar">
            <div id="topbar">
                <div class="wrapper clearfix">

                    <?php include_once 'logo.php'; ?>

                    <div class="pull-left">
                        <a href="http://aiswaryacinemascreens.com/" class="btn"><i class="icon-arrow-left"></i> Back to Site</a>
                    </div> <!-- .fl -->


                    <div class="pull-right">
                        <a href="index.php" class="btn btn-primary"><i class="icon-user icon-white"></i> Login</a>
                    </div> <!-- .user-settings -->

                </div>
            </div> <!-- #topbar -->

            <div id="nav-toolbar">
                <div class="wrapper clearfix">

                    <ul class="breadcrumb pull-left">
                        <li>Admin Home</li>
                        <li><span class="divider"></span></li>
                        <li>Login</li>
                    </ul>

                    <div class="pull-right">
                        <div class="btn-group">
                            <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-wrench"></i></span></button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="#about-developers" role="button" data-toggle="modal">About admin panel</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div> <!-- #nav-toolbar -->

        </div> <!-- #fixedbar -->


<?php include_once 'dev-settings.php'; ?>




        <div id="content" class="clearfix">
            <div class="wrapper clearfix">

                <div class="row-fluid">

                    <div class="span5">

                        <form class="form-horizontal" name="frms" method="post" action="login.php">
                            
    <div class="control-group">
                            <label class="control-label" for="inputEmail"></label>
                            <div class="controls">
                                <?php
                                    if(isset($_GET['error'])){ 
                                        ?>
                                <div class="alert alert-error">
                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                  <?php
                                    echo $msg;
                                    ?>
                                </div>
                                <?php } ?>

                            </div>
                          </div>
                       
                          <div class="control-group">
                            <label class="control-label" for="inputEmail">Username</label>
                            <div class="controls">
                              <input type="text" id="inputEmail" placeholder="Email" name="txtUsername" value="<?php echo $username;?>">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="inputPassword">Password</label>
                            <div class="controls">
                              <input type="password" id="inputPassword" placeholder="Password" name="txtPassword" value="<?php echo $password;?>">
                            </div>
                          </div>
                          <div class="control-group">
                            <div class="controls">
                              <label class="checkbox">
                                <input type="checkbox" name="chkRemember" value="1"  <?php if($saveLogin==1){?> checked="checked"<?php }?>> Remember me
                              </label>
                              <input type="submit" class="btn" name="submitLogin" value="Sign in">
                            </div>
                          </div>
                        </form>

                    </div>

<!--                     <div class="offset1 span5">
                        
                        <ul class="thumbnails">
                          <li>
                            <div class="thumbnail">
                              <img src="img/pic/cinema_company.png" alt=" ">
                            </div>
                          </li>
                        </ul>

                    </div> -->


                </div>


            </div>

<?php include_once 'footer.php'; ?>

        </div> <!-- #content -->

    </body>
</html>
