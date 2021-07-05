

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/styles.min.css" media="screen" />
    <title><?php if(isset($invInfo['invMake'])){ 
        echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?> | PHP Motors</title>
</head>
<body>
    <div id="wrapper">
 <main>

 <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/header.php'?>
      <section class="paddingleftright">
            <h1><?php if(isset($invInfo['invMake'])){ 
	            echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?> | PHP Motors</h1>
                <?php
                    if (isset($message)) {
                    echo $message;
                    }
                ?>

                <form action="/phpmotors/vehicles/" method="post">
                    <label for="invMake">Make</label>
                    <input type="text" name="invMake" id="invMake" readonly <?php if(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>>
                    <label for="invModel">Model</label>
                    <input type="text" name="invModel" id="invModel" readonly <?php if(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>>
                    <label for="invDescription">Description</label>
                    <textarea type="text" name="invDescription" id="invDescription" readonly><?php if(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }?></textarea>
                    <input type="submit" name="Submit" value="Delete Vehicle">
                    <input type="hidden" name="action" value="deleteVehicle">
                    <input type="hidden" name="invId" value='<?php if(isset($invInfo['invId'])){echo $invInfo['invId'];} ?>'>
                </form>
            </section>


    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/footer.php'?>
    </footer>
    </main>
    </div> <!-- Wrapper ends -->
</body>
</html>
<?php unset($_SESSION['message']); ?>





