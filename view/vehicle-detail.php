<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styles.min.css" type="text/css" rel="stylesheet" media="screen">
    <title><?php echo "$vehicle[invMake] $vehicle[invModel]"; ?> | PHP Motors, Inc.</title>
</head>
<body>
    <div id="wrapper">
    <main>
            <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/header.php'?>

            <section class="paddingleftright">
                <h1><?php echo $cars['invMake'] ." ". $cars['invModel']?></h1>
                <?php if(isset($message)){
                    echo $message; }
                ?>
                <?php if(isset($carDisplay)){
                    echo $carDisplay;} 
                ?>
            </section>
             
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/footer.php'?>

        </main>

    </div> <!-- Wrapper ends -->
</body>
</html>