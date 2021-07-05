<?php

if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /phpmotors/');
    exit;
   }

?><?php
// Build the classifications option list
$dropdown = '<select name="classificationId" id="classificationId">';
$dropdown .= "<option>Choose a Car Classification</option>";
foreach ($classifications as $classification) {
 $dropdown .= "<option value='$classification[classificationId]'";
 if(isset($classificationId)){
  if($classification['classificationId'] === $classificationId){
   $dropdown .= ' selected ';
  }
 } elseif(isset($invInfo['classificationId'])){
 if($classification['classificationId'] === $invInfo['classificationId']){
  $dropdown .= ' selected ';
 }
}
$dropdown .= ">$classification[classificationName]</option>";
}
$dropdown .= '</select>';

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/styles.min.css" media="screen" />
    <title><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
	        echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
	    elseif (isset($invMake) && isset($invModel)) { 
		    echo "Modify $invMake $invModel"; }?> | PHP Motors</title>
</head>
<body>
    <div id="wrapper">
    <main>
            <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/header.php'?>
        <h1><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
            echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
        elseif (isset($invMake) && isset($invModel)) { 
            echo "Modify$invMake $invModel"; }?></h1>
            
        <?php
        if (isset($message)){
            echo $message;
        }
        ?>
        <form action="/phpmotors/vehicles/" method="post">
                <?php
                    if (isset($dropdown)) {
                    echo $dropdown;
                    }
                ?>
                    <label for="invMake">Make</label>
                    <input type="text" name="invMake" id="invMake" required <?php if(isset($invMake)){ echo "value='$invMake'"; } elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>>
                    <label for="invModel">Model</label>
                    <input type="text" name="invModel" id="invModel" required <?php if(isset($invModel)){ echo "value='$invModel'"; } elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>>
                    <label for="invDescription">Description</label>
                    <textarea type="text" name="invDescription" id="invDescription" required><?php if(isset($invDescription)){ echo $invDescription; } elseif(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }?></textarea>
                    <label for="invImage">Image path</label>
                    <input type="text" name="invImage" id="invImage" required <?php if(isset($invImage)){ echo "value='$invImage'"; } elseif(isset($invInfo['invImage'])) {echo "value='$invInfo[invImage]'"; }?>>
                    <label for="invThumbnail">Thumbnail path</label>
                    <input type="text" name="invThumbnail" id="invThumbnail" required <?php if(isset($invThumbnail)){ echo "value='$invThumbnail'"; } elseif(isset($invInfo['invThumbnail'])) {echo "value='$invInfo[invThumbnail]'"; }?>>
                    <label for="invPrice">Price</label>
                    <input type="number" step="0.01" name="invPrice" id="invPrice" required <?php if(isset($invPrice)){ echo "value='$invPrice'"; } elseif(isset($invInfo['invPrice'])) {echo "value='$invInfo[invPrice]'"; }?>>
                    <label for="invStock"># in stock</label>
                    <input type="number" name="invStock" id="invStock" required <?php if(isset($invStock)){ echo "value='$invStock'"; } elseif(isset($invInfo['invStock'])) {echo "value='$invInfo[invStock]'"; }?>>
                    <label for="invColor">Color</label>
                    <input type="text" name="invColor" id="invColor" required <?php if(isset($invColor)){ echo "value='$invColor'"; } elseif(isset($invInfo['invColor'])) {echo "value='$invInfo[invColor]'"; }?>>
                    <input type="submit" name="Submit" value="Update Vehicle">
                    <input type="hidden" name="action" value="updateVehicle">
                    <input type="hidden" name="invId" value='<?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];}elseif(isset($invId)){ echo $invId; } ?>'>
                </form>

    
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/footer.php'?>

    </main>

    </div> <!-- Wrapper ends -->
</body>
</html>