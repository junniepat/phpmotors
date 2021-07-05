

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
<h2>Welcome to PHP Motors </h2>
            <div class="mast_head">
                <h1>DMC Delorean</h1>
                3 cup holders <br/>
                Superman doors <br/>
                Fuzzy dice! <br/>
                <span class="btn_bg"></span>

                <div class="car-img">
                    <img src="/phpmotors/images/vehicles/delorean.jpg" alt="Delorean car" id="delorean">
                </div>
            </div>

            <div class="dmc_section">
                <div class="dmc_section-left">
                    <ul class="dmc_section_1_ul">
                        <li> 
                            <a href="#">
                            <div class="dmc_section_1_img">
                                <img src="./images/upgrades/flux-cap.png" alt="flux_cap"/>
                            </div>
                            flux capacitor 
</a>
                        </li>
                        <li> 
                        <a href="#">
                        <div class="dmc_section_1_img">
                                <img src="./images/upgrades/flame.jpg" alt="flame"/>
                            </div>
                            Flame Decals 
</a>
                        </li>
                        <li> 
                        <a href="#">
                        <div class="dmc_section_1_img">
                                <img src="./images/upgrades/bumper_sticker.jpg" alt="bumper_sticker"/>
                            </div>
                            Bumper Stickers 
</a>
                        </li>
                        <li> 
                        <a href="#">
                        <div class="dmc_section_1_img">
                                <img src="./images/upgrades/hub-cap.jpg" alt="hub_cap"/>
                            </div>
                            Hub Caps 
</a>
                        </li>
                    </ul>
                </div>

                <div class="dmc_section-right">
                    <h1>DMC Delorean Reviews</h1>
                    <ul class="dmc_section_2_ul">
                        <li>"So fast its almost like traveling in time" [4/5]</li>
                        <li>"Coolest ride on the road" [4/5]</li>
                        <li>"I'm feeling Marty MCFly!" [5/5]</li>
                        <li>"The most futuristic ride of our day" [4/5]</li>
                        <li>"80's livin and I love it!" [5/5]</li>
                    </ul>
                </div>
            </div>

              <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
</main>

 
        </body>
    </html>