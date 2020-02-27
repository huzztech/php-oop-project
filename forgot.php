
<?php

include 'includes/autoloader.inc.php';
include 'functions.php';

 $users = new Users;

$errormsg = "";
$infomesg = "";


if(isset($_POST['forgotpass'])){


        $email              =   cleaninput($_POST['email']);

   /*
       * 
   */


   if($users->Query("SELECT * FROM users WHERE email = ?", [$email])){

    if($users->CountRows() > 0){

        $row             = $users->Single();
        $password_real   = decryptdata($row->password);
         $infomesg .= "Email Sent";        

    }
    else
    {
            $errormsg .= "Wrong Email<br>";
    }

    }
   

   /*
        * Submit the form
   */ 

   if($errormsg == ""){


            /*$subject = "Forgot Password";
                 $message = '<div>
                            Hi <b>'.$name.'</b>,<br /><br />                            
                           Below is your password<br /><br /></div>
                            
                            Password: '.$password_real.'

                            </div>';
                 
                 $verifymail = new Mailer($email, $subject, $message);
                
                $verifymail->send();*/

            //$infomesg .= "Email Sent";
            
     }

   }



?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password  | HuzzTech OOP Software</title>
	
	<?php
	
	include 'includes/header.inc.php';
	
	?>	
	
</head>
<body>


	<?php

	include 'includes/top.inc.php';

	?>

	
	
	 <!-------------------PAGE Content---------------------->



	 <div class="container" style="margin-top:50px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Forgot Password</div>
                <?php if(isset($_SESSION['messeage_d'])){ ?>
                <div class="alert alert-success" style="text-align: center;">               
                  <?php 

                  		echo $_SESSION['messeage_d'];

                  		unset($_SESSION['messeage_d']);

                   ?>
                </div>
                <?php } ?>

                <?php if($infomesg != ""){ ?>
                <div class="alert alert-success" style="text-align: center;">               
                  <?php echo $infomesg; ?>        
                </div>
                <?php } ?>

                <?php if($errormsg != ""){ ?>
                <div class="alert alert-danger" style="text-align: center;">               
                  <?php echo $errormsg; ?>        
                </div>
                <?php } ?>
				                <div class="card-body">
                    <form method="POST" action="">
                        <input type="hidden" name="_token" value="1f4OpwIwES2fjOmBHlq9vwrO9CL4oIAnfSsut4o3">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="" required="" autocomplete="email" autofocus="">

                                                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" name="forgotpass" class="btn btn-primary">
                                    Send Password
                                </button>

                                                                   
                                                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


	 <!----------------------------------------->



	 
	<?php

	include 'includes/footer.inc.php';

	?>


</body>
</html>