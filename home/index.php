
<?php

include 'sessions.php';
include '../includes/autoloader.inc.php';
include '../functions.php';



 $users = new Users;

$errormsg = "";
$infomesg = "";


?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard | HuzzTech OOP Software</title>
    
    <?php
    
    include '../includes/header.inc.php';
    
    ?>  
    
</head>
<body>


    <?php

    include '../includes/top.inc.php';

    ?>

    
    
     <!-------------------PAGE Content---------------------->



     <div class="container" style="margin-top:50px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>
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


                            Welcome, <?php echo $_SESSION['idis']; ?>


                </div>
            </div>
        </div>
    </div>
</div>


     <!----------------------------------------->



     
    <?php

    include '../includes/footer.inc.php';

    ?>


</body>
</html>