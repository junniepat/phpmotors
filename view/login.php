<!doctype html>
<html lang="en">
    <head>
        <title>Account: Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/styles.min.css" media="screen" />
    </head>
    <body>
          
 
        <main>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
            <section>
                <?php
                    if (isset($message)) {
                        echo $message;
                    }
                ?>
                <form action="/phpmotors/accounts/" method="post">
                        <h1>Sign In</h1>
                        <input type="hidden" name="action" value="login">
                        <div class="form-group">
                            <label for="clientEmail">Email</label>
                            <input type="email" name="clientEmail" id="clientEmail" placeholder="Your Email" autofocus autocomplete="off" <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?> required>
                        </div>

                        <div class="form-group">
                            <label for="clientPassword">Password</label>
                            <input type="password" name="clientPassword" id="clientPassword" placeholder="Your Password" autocomplete="off" required>
                            <!-- <span>*Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>  -->
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn-primary" name="Submit" value="Login">
                        </div>
                </form>  
                <a id='notamember' href="/phpmotors/accounts/?action=newmember">Not a member yet?</a>          
            </section>

            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
        </main>

    </body>
</html>