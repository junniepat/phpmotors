<?php
if(!$_SESSION['loggedin']){
    header('Location: /phpmotors/');
  } 
  
  if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    } 

?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Phpmotors</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
            <link rel="stylesheet" href="/phpmotors/css/styles.min.css" media="screen" />
        </head>
        <body>
        
            <main>
              <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
 <h1><?php echo $_SESSION['clientData']['clientFirstname'] .' '. $_SESSION['clientData']['clientLastname'] ?></h1>
        <ul>
            <li>First name: <?php echo $_SESSION['clientData']['clientFirstname']?></li>
            <li>Last name: <?php echo $_SESSION['clientData']['clientLastname']?></li>
            <li>Email Address: <?php echo $_SESSION['clientData']['clientEmail']?></li>
            <li>Client Level: <?php echo $_SESSION['clientData']['clientLevel']?></li>
        </ul>
        <?php

         if($_SESSION['loggedin']){
                        echo '<h2>Account Management</h2>';
                        echo '<p>Use this link to update account information</p>';
                        echo '<p><a href="/phpmotors/accounts/?action=updateaccount" title="Update your account information">Update Account Information</a></p>';

        }

            if ($_SESSION['clientData']['clientLevel'] > 1) {
                echo '<p>Go to <a href="/phpmotors/vehicles/">Vehicle Management</a></p>';
            }
        ?>
     
              <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
</main>

 
        </body>
    </html>