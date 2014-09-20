<?php
    $contactus=$ath->getcontactus();
?>
<?php
if(isset($_POST['enquirysubmit']))

{
    session_start();
    $text=$_SESSION["vercode"] ;
unset($_SESSION["vercode"]);
 $captcha        =  $_POST['txtCode'];

  if($captcha==$text)
{
 $email_to="info@aiswaryacinemascreens.com";   
$email_from = $_POST['user_mail'];

$email_subject = "Enquiry Form: Aiswarya Cinema Screens";

$name=$_POST['user_name'];



$phone=$_POST['user_cell'];

$message=$_POST['user_message'];

$msg="Name:" .$name."\r\n"."E-mail:" .$email_from."\r\n"."Message:" .$message."\r\n"."Phone:" .$phone;

$headers = 'From: '.$email_from."\r\n".'Reply-To: '.$email_from."\r\n" .'X-Mailer: PHP/' . phpversion();

mail($email_to,$email_subject,$msg,$headers);
?>
   <script type="text/javascript">
        $(document).avgrund({
            height: 200,
            showClose: true,
            showCloseText: 'Close',
            enableStackAnimation: true,
            openOnEvent: false,
            template:
            '<div class="feedbacksuccess-avgrund">' +
                '<p>Thanks for your feedback.</p>'
                +
            '</div>'
        });
</script>
<?php
}
else {
    ?>
   <script type="text/javascript">
        $(document).avgrund({
            height: 200,
            showClose: true,
            showCloseText: 'Close',
            enableStackAnimation: true,
            openOnEvent: false,
            template:
            '<div class="feedbackfailed-avgrund">' +
                '<p>Enter valid code...Please stop spamming.</p>'
                +
            '</div>'
        });
</script>
    <?php 
}
}

?>

        <section id="contactus" class="main clearfix">
            <div class="container clearfix">

                <div class="mod-header">
                    <div class="inner">
                        <h2>Contact Us</h2>
                        <span class="simg"><img src="/img/contact-modheader-simg.png" alt=" "></span>
                    </div>
                </div>

                <div class="mod-content">
                    <div class="row-fluid sep">
                        <div class="span5">

                            <div class="desc">
                                <h3 class="title">Address</h3>
                                <div class="grey-box clearfix">
                                    <p> <strong>Address: </strong><?php echo $contactus[0]['address']; ?></p> 
                                    <!-- <p> <strong>Mobile: </strong><?php //echo $contactus[0]['mobile']; ?> </p>  -->
                                    <p> <strong>Landline: </strong><?php echo $contactus[0]['landline']; ?></p>  
                                    <p> <strong>Email: </strong><?php echo $contactus[0]['email'];  ?></p> 

                                    <!-- <p>For Internet Booking Support and Enquiry <br>
                                    Mail to: support@ticketnew.com </p> -->

                                </div>
                            </div><!--  .desc -->

                            <div class="booknow">
                                <a href="http://ticketnew.com/scheduleiframe/theatre/partnersites/Vismaya/default.aspx?MultiplexID=OA%3d%3d-HcNO4%2bhfLZk%3d" target="_blank"><img src="/img/contact-page-book.png" alt=" "></a>

                            </div>

                        </div>

                        <div class="offset1 span6">

                            <div class="form">

                                <h3 class="title">Feedback</h3>

                                <div class="grey-box">

                                    <form action="" method="post" enctype="multipart/form-data">
                                        
                                        <fieldset class="row-fluid">
                                            <label for="cname">Name: </label>
                                            <input type="text" id="cname" class="span10" name="user_name" required="required">
                                        </fieldset>

                                        <fieldset class="row-fluid">
                                            <label for="cemail">Email: </label>
                                            <input type="text" id="cemail" class="span10" name="user_mail" required="required">
                                        </fieldset>

                                        <fieldset class="row-fluid">
                                            <label for="cphone">Phone: </label>
                                            <input type="text" id="cphone" class="span10" name="user_cell">
                                        </fieldset>

                                        <fieldset class="row-fluid">
                                            <label for="cmsg">Message</label>
                                            <textarea id="cmsg" class="span10" rows="4" name="user_message" required="required"></textarea>
                                        </fieldset>

                                        <fieldset class="row-fluid">
                                            <label for="capcha">Enter Captcha</label>
                                            <div class="clearfix"><img src="/captcha.php" alt="captcha" title="captcha" class="captcha"></div>
                                            <input type="text" id="capcha" class="span10" name="txtCode" required="required">
                                        </fieldset>

                                        <p>
                                            <input type="submit" value="Submit" class="btn" name="enquirysubmit">
                                        </p>

                                    </form>

                                </div>
                            </div>


                        </div>

                    </div>

<?php include 'footer.php'; ?>

                </div> <!-- .mod-content -->

            </div>
        </section> <!-- #contactus -->