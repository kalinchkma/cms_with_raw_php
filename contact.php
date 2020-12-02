<?php  include "includes/config.php"; ?>
 <?php  include "includes/header.inc.php"; ?>

    
<?php

$message ="";
if (isset($_POST['submit'])) {
    
    $to        = "chakma.kalin10211@gmail.com";
    $subject   = wordwrap($_POST['subject'], 70);
    $body      = $_POST['message'];
    $header    = "From: ".$_POST['email'];
    
    if (!empty($to) && !empty($subject) && !empty($body)) {
        mail($to, $subject, $body, $header);
        
    
        
        
    } else {
        $message = "Feild cannot be empty";
    }

}

?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.inc.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                        <h1><?php echo $message;?></h1>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email">
                        </div>
                         <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="key" class="form-control" placeholder="Enter Subject">
                        </div>
                         <div class="form-group">
                           <textarea class="form-control" name="message" id="" rows="10"></textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Send">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.inc.php";?>
