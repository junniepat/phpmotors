<?php 
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
   }
?><!doctype html>
<html lang="en">
    <head>
        <title>Image Management</title>
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/styles.min.css" media="screen" />
    </head>
    <body>

        <main>
          <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
            <section class="paddingleftright">
                <h1>Image Management</h1>
                <p>Choose one of the options below:</p>
                <h2>Add New Vehicle Image</h2>
                <?php
                if (isset($message)) {
                    echo $message;
                } ?>
                <form action="/phpmotors/uploads/" method="post" enctype="multipart/form-data">
                <label for="invItem">Vehicle</label>
                    <?php echo $prodSelect; ?>
                    <fieldset>
                        <label>Is this the main image for the vehicle?</label>
                        <div class="flex">
                            <label for="priYes" class="pImage">Yes</label>
                            <input type="radio" name="imgPrimary" id="priYes" class="pImage" value="1">
                            <label for="priNo" class="pImage">No</label>
                            <input type="radio" name="imgPrimary" id="priNo" class="pImage" checked value="0">
                        </div>
                    </fieldset><br>
                <label>Upload Image:</label>
                <input type="file" name="file1">
                <input type="submit" class="regbtn" value="Upload">
                <input type="hidden" name="action" value="upload">
                </form>
                <hr>
                <h2>Existing Images</h2>
                <p class="notice">If deleting an image, delete the thumbnail too and vice versa.</p>
                <?php
                if (isset($imageDisplay)) {
                    echo $imageDisplay;
                } ?>
            </section>
                    <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
        </footer>
        </main>

    </body>
</html><?php unset($_SESSION['message']); ?>
