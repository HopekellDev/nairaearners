<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo "Welcome &mdash; ".  $app->site_name;?></title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="./assets/css?family=Nunito:300,400,700" rel="stylesheet" />
        <link
            rel="stylesheet"
            href="./assets/A.fonts%2C%2C_icomoon%2C%2C_style.css%20css%2C%2C_bootstrap.min.css%20css%2C%2C_jquery-ui.css%20css%2C%2C_owl.carousel.min.css%20css%2C%2C_owl.theme.default.min.css%20css%2C%2C_owl.theme.default.min.css%20css%2C%2C_jquery.fancybox.min.css.css"
        />
        <script src="https://kit.fontawesome.com/a9233b233c.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        <div id="overlayer"></div>
        <div class="loader">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="site-wrap" id="home-section">
            <div class="site-mobile-menu site-navbar-target">
                <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close mt-3">
                        <span class="icon-close2 js-menu-toggle"></span>
                    </div>
                </div>
                <div class="site-mobile-menu-body"></div>
            </div>
            <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6 col-md-3 col-xl-4 d-block">
                            <h1 class="mb-0 site-logo">
                                <?php
                                if($front->logo=='default'){echo'<a href="./" class="text-black h2 mb-0">'.$app->site_name.'<span class="text-primary">.</span> </a>';}else{
                                    ?>
                                <img src ="./assets/images/<?php echo $front->logo;?>" height="80px"/>
                                    <?php
                                }
                                ?>
                            </h1>
                        </div>
                        <div class="col-12 col-md-9 col-xl-8 main-menu">
                            <nav class="site-navigation position-relative text-right" role="navigation">
                                <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block ml-0 pl-0">
                                    <li><a href="#home-section" class="nav-link">Home</a></li>
                                    <li><a href="#features-section" class="nav-link">How it works</a></li>
                                    <li><a href="#testimonials-section" class="nav-link">Testimonials</a></li>
                                    <li><a href="#faq-section" class="nav-link">FAQs</a></li>
                                    <li><a href="#contact-section" class="nav-link">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-6 col-md-9 d-inline-block d-lg-none ml-md-0">
                            <a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
                        </div>
                    </div>
                </div>
            </header>
            <?php
            include "./views/frontend/home.php";
            ?>
            <div class="footer py-5 text-center">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-12">
                            <p class="mb-0">
                                <a href="#" class="p-3"><span class="icon-facebook"></span></a>
                                <a href="#" class="p-3"><span class="icon-twitter"></span></a>
                                <a href="#" class="p-3"><span class="icon-instagram"></span></a>
                                <a href="#" class="p-3"><span class="icon-linkedin"></span></a>
                                <a href="#" class="p-3"><span class="icon-pinterest"></span></a>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="mb-0">
                                Copyright &copy; <?php echo $app->site_name;?>
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                All rights reserved 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/jquery-3.3.1.min.js"></script>
        <script src="assets/js/jquery-ui.js%20popper.min.js.pagespeed.jc.qhsYIYRW-f.js"></script>
        <script>
            eval(mod_pagespeed_8SJSMq5XGq);
        </script>
        <script>
            eval(mod_pagespeed_aAm83vNE6j);
        </script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/owl.carousel.min.js%20jquery.countdown.min.js%20bootstrap-datepicker.min.js%20jquery.easing.1.3.js.pagespeed.jc.uCg48oIInl.js"></script>
        <script>
            eval(mod_pagespeed_9f_kNVZFkm);
        </script>
        <script>
            eval(mod_pagespeed_$SBmxL4wZ0);
        </script>
        <script>
            eval(mod_pagespeed_OUcm5P6sj8);
        </script>
        <script>
            eval(mod_pagespeed_gTV$Gp7rVj);
        </script>
        <script src="assets/js/aos.js%20jquery.fancybox.min.js.pagespeed.jc.IDh0wWQcZ9.js"></script>
        <script>
            eval(mod_pagespeed_HCTuD9eTsS);
        </script>
        <script>
            eval(mod_pagespeed_UFRFUF7IT3);
        </script>
        <script src="assets/js/jquery.sticky.js%20main.js.pagespeed.jc.VMyPkAdtj_.js"></script>
        <script>
            eval(mod_pagespeed_nmupuPc_lP);
        </script>
        <script>
            eval(mod_pagespeed_FXWgl$spdB);
        </script>

        <script async="" src="./assets/gtag/js?id=UA-23581568-13"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag("js", new Date());

            gtag("config", "UA-23581568-13");
        </script>
        <script
            defer=""
            src="./assets/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194"
            integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw=="
            data-cf-beacon='{"rayId":"7433915fed9c415a","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.8.0","si":100}'
            crossorigin="anonymous"
        ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>
