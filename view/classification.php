<!doctype html>
<html lang="en">
    <head>
        <title><?php echo $classificationName; ?> vehicles | PHP Motors, Inc.</title>
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/styles.min.css" media="screen" />
    </head>
    <body>

        <main>
                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
            <section class="paddingleftright">
                <h1><?php echo $classificationName; ?> vehicles</h1>
                <?php if(isset($message)){
                    echo $message; }
                ?>
                <?php if(isset($vehicleDisplay)){
                    echo $vehicleDisplay;} 
                ?>
            </section>
                    <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
        </footer>
        </main>

    </body>
</html>