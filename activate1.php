
<?php

    include 'includes/autoloader.inc.php';
    include 'functions.php';

    $users = new Users;

    $errormsg = "";
    $infomesg = "";

     

if(isset($_GET['idi'])) {


        $token = cleaninput($_GET['idi']);
        $response = $users->activate($token);

        if($response == true){

            $_SESSION['messeage_d'] = "Account Successfully Verified";
            header('location:'.baseurl());
            exit();
     }
     else
     {
            $_SESSION['messeage_d'] = "Invalid Activation Link.";
            header('location:'.baseurl());
            exit();

     }

   }

   header('location:'.baseurl());
   exit();

?>