<?php

if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /phpmotors/');
    exit;
   }

?>



<!doctype html>
<html lang="en">
<head>
        <title>Add Classification</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/styles.min.css" media="screen" />
    </head>
    <body>
        
        <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>  


            <section class="padding-auto">
                <h1>Add Car Classification</h1>
                <?php
                    if (isset($message)) {
                    echo $message;
                    }
                ?>
                <form action="/phpmotors/vehicles/" method="post">
                    <label for="classificationName">Classification Name</label>
                    <input type="text" name="classificationName" id="classificationName" placeholder="Enter Name Here" autofocus autocomplete="off" required>
                    <input type="submit" name="Submit" value="Add Classification">
                    <input type="hidden" name="action" value="addClassification">
                </form>
            </section>

            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  
        </main>

    </body>
</html>