
<?php

    include 'includes/autoloader.inc.php';
    include 'functions.php';

    $users = new Users;

    $name               = "";
    $email              = "";
    $password           = "";
    $confirm_password   = "";
    $dob                = "";

    $errormsg = "";
    $infomesg = "";

if(isset($_POST['signup'])){


        $name               =   cleaninput($_POST['name']);
        $email              =   cleaninput($_POST['email']);
        $password           =   cleaninput($_POST['password']);
        $confirm_password   =   cleaninput($_POST['password_confirmation']);
        $dob                =   cleaninput($_POST['dob']);
   

   /*
       * Email validation
   */

   if($users->Query("SELECT * FROM users WHERE email = ?", [$email])){
      if($users->CountRows() > 0 ){
        $errormsg .= "Sorry email is already exist<br>";
      }
    }


   /*
        * Password validations
   */


   if(strlen($password) < 5){
      $errormsg .= "Password is too short<br>";
   }

   /*
       * Confirm password validations
   */ 

   if($password != $confirm_password){
    $errormsg .= "Confirm password is not matched<br>";
   }

   /*
        * Submit the form
   */ 

   if($errormsg == ""){

            $users->setvalues($name, $email, $password, $dob);
            
            $isinsert = $users->insert();

            if($isinsert)
            {

                 /*$subject = "Verify Your Email";
                 $message = '<div>
                            Hi <b>'.$name.'</b>,<br /><br />                            
                            Click on the below link below to verify your Email Address.<br /><br /></div>
                            <div style="margin-top: 10px;">
                            <a style=" background: #394864;
                                padding: 5px;
                                font-size: 18px;
                                border: none;
                                color: #FFFFFF;
                                width: 70px;
                                margin-top: 5px;
                                text-decoration: none;
                                border-radius: 3px;" href="#?codes='.$randomcode.'">Click</a>

                            </div>';
                 
                 $verifymail = new Mailer($email, $subject, $message);
                
                $verifymail->send();*/

                $infomesg = "Please Verify email to login.";
                
                $name               = "";
                $email              = "";
                $password           = "";
                $confirm_password   = "";
                $dob                = "";

            }
            
     }

   }



?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Account  |  HuzzTech OOP Software</title>
	
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
                <div class="card-header">Register</div>

                 <?php if($infomesg != ""){ ?>
                <div class="alert alert-success">               
                  <?php echo $infomesg; ?>        
                </div>
                <?php } ?>

                <?php if($errormsg != ""){ ?>
                <div class="alert alert-danger">               
                  <?php echo $errormsg; ?>        
                </div>
                <?php } ?>

                <div class="card-body">
                    <form method="POST" action="">
                        <input type="hidden" name="_token" value="1f4OpwIwES2fjOmBHlq9vwrO9CL4oIAnfSsut4o3">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name" value="<?php echo $name; ?>" required="" autocomplete="name" autofocus="">                              

                                                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="<?php echo $email; ?>" required="" autocomplete="email">
                              

                                                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " value="<?php echo $password; ?>" name="password" required="" autocomplete="new-password">
                              

                                                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" value="<?php echo $confirm_password; ?>" class="form-control" name="password_confirmation" required="" autocomplete="new-password">
                              

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>

                            <div class="col-md-6">
                                <input id="dob" type="Date" class="form-control" name="dob" value="<?php echo $dob; ?>" required="">
                                
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="signup" class="btn btn-primary">
                                    Register
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