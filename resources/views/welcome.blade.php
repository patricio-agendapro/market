<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
  <meta name="keywords" content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
  <meta name="author" content="elemis">
  <title>Sandbox - Modern & Multipurpose Bootstrap 5 Template</title>
  <link rel="shortcut icon" href="./assets/img/favicon.png">

  <!---<link rel="preload" href="./assets/fonts/roboto/roboto-400.woff2" as="font" crossorigin="anonymous" />
  <link rel="preload" href="./assets/fonts/roboto/roboto-500.woff2" as="font" crossorigin="anonymous" />
  <link rel="preload" href="./assets/fonts/roboto/roboto-700.woff2" as="font" crossorigin="anonymous" />--->

  <link rel="preload" href="https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu4mxKKTU1Kg.woff2" as="font" crossorigin="anonymous" />
  <link rel="preload" href="https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmEU9fBBc4AMP6lQ.woff2" as="font" crossorigin="anonymous" />
  <link rel="preload" href="https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmWUlfChc4AMP6lbBP.woff2" as="font" crossorigin="anonymous" />
  <link rel="preload" href="./assets/fonts/unicons/Unicons.woff2" as="font" crossorigin="anonymous" />

  <style>

  @font-face {
    font-family: 'Roboto';
    font-style: normal;
    font-weight: 400;
    font-display: swap;
    src: url(https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu4mxKKTU1Kg.woff2) format('woff2');
    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
  }
  @font-face {
    font-family: 'Roboto';
    font-style: normal;
    font-weight: 500;
    font-display: swap;
    src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmEU9fBBc4AMP6lQ.woff2) format('woff2');
    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
  }
  @font-face {
    font-family: 'Roboto';
    font-style: normal;
    font-weight: 700;
    font-display: swap;
    src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmWUlfChc4AMP6lbBP.woff2) format('woff2');
    unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
  }
  @font-face {
    font-family: 'Unicons';
    src: url('assets/fonts/unicons/Unicons.woff2') format('woff2');
    font-weight: normal;
    font-style: normal;
    font-display: swap;
  }
  </style>
  
  <link rel="stylesheet" href="./assets/css/style.css" rel="preload" as="style">

</head>


<body class="home">
  <div class="content-wrapper">
    <header class="wrapper">
      <!---<div class="bg-navy text-white fw-bold fs-15 mb-2">
        <div class="container py-2 d-md-flex flex-md-row">
          <div class="d-flex flex-row align-items-center">

          </div>
          <div class="d-flex flex-row align-items-center me-6 ms-auto">
            <div class="icon text-white fs-22 mt-1 me-2"> <i class="uil uil-phone-volume"></i></div>
            <p class="mb-0">+562 2938 1145</p>
          </div>
          <div class="d-flex flex-row align-items-center">
            <div class="icon text-white fs-22 mt-1 me-2 d-none d-md-block"> <i class="uil uil-message"></i></div>
            <p class="mb-0 d-none d-md-block"><a href="mailto:contacto@agendapro.com" class="link-white hover">contacto@agendapro.com</a></p>
          </div>
        </div>-->
        <!-- /.container -->
      </div>
      <nav class="navbar navbar-expand-lg center-nav transparent navbar-light">
        <div class="container flex-lg-row flex-nowrap align-items-center">
          <div class="navbar-brand w-100">
            <a href="./index.html">
              <img src="./assets/img/logo.png" srcset="./assets/img/logo@2x.png 2x" alt="" />
            </a>
          </div>
          <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
            <div class="offcanvas-header d-lg-none">
              <h3 class="text-white fs-30 mb-0">Sandbox</h3>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
              <ul class="navbar-nav">
                <li class="nav-item dropdown dropdown-mega">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Rubros</a>
                  <ul class="dropdown-menu mega-menu mega-menu-dark mega-menu-img">
                    <li class="mega-menu-content mega-menu-scroll">
                      <ul class="row row-cols-1 row-cols-lg-6 gx-0 gx-lg-4 gy-lg-2 list-unstyled">
                        
                      </ul>
                      <!--/.row -->
                      <span class="d-none d-lg-flex"><i class="uil uil-direction"></i><strong>Scroll to view more</strong></span>
                    </li>
                    <!--/.mega-menu-content-->
                  </ul>
                  <!--/.dropdown-menu -->
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Funcionalidades</a>
                  <div class="dropdown-menu dropdown-lg">
                    <div class="dropdown-lg-content">
                      <div>
                        <h6 class="dropdown-header">Project Pages</h6>
                        <ul class="list-unstyled">
                          <li><a class="dropdown-item" href="./projects.html">Projects I</a></li>
                          <li><a class="dropdown-item" href="./projects2.html">Projects II</a></li>
                          <li><a class="dropdown-item" href="./projects3.html">Projects III</a></li>
                          <li><a class="dropdown-item" href="./projects4.html">Projects IV</a></li>
                        </ul>
                      </div>
                      <!-- /.column -->
                      <div>
                        <h6 class="dropdown-header">Single Projects</h6>
                        <ul class="list-unstyled">
                          <li><a class="dropdown-item" href="./single-project.html">Single Project I</a></li>
                          <li><a class="dropdown-item" href="./single-project2.html">Single Project II</a></li>
                          <li><a class="dropdown-item" href="./single-project3.html">Single Project III</a></li>
                          <li><a class="dropdown-item" href="./single-project4.html">Single Project IV</a></li>
                        </ul>
                      </div>
                      <!-- /.column -->
                    </div>
                    <!-- /auto-column -->
                  </div>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#" data-bs-toggle="dropdown">Recursos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" data-bs-toggle="dropdown">Precios</a>
                </li>
                
              </ul>
              <!-- /.navbar-nav -->
              <div class="offcanvas-footer d-lg-none">
                <div>
                  <a href="mailto:first.last@email.com" class="link-inverse">info@email.com</a>
                  <br /> 00 (123) 456 78 90 <br />
                  <!-- /.social -->
                </div>
              </div>
              <!-- /.offcanvas-footer -->
            </div>
            <!-- /.offcanvas-body -->
          </div>
          <!-- /.navbar-collapse -->
          <div class="navbar-other w-100 d-flex ms-auto">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <li class="nav-item dropdown language-select text-uppercase">
                <a class="nav-link dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">En</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="dropdown-item" href="#">En</a></li>
                  <li class="nav-item"><a class="dropdown-item" href="#">De</a></li>
                  <li class="nav-item"><a class="dropdown-item" href="#">Es</a></li>
                </ul>
              </li>
              <li class="nav-item d-none d-md-block">
                <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#modal-signin">Login</a>
              </li>
              <li class="nav-item d-none d-md-block">
                <a href="#" class="btn btn-sm btn-primary rounded" data-bs-toggle="modal" data-bs-target="#modal-signup">Prueba Gratis</a>
              </li>
              <li class="nav-item d-lg-none">
                <button class="hamburger offcanvas-nav-btn"><span></span></button>
              </li>
            </ul>
            <!-- /.navbar-nav -->
          </div>
          <!-- /.navbar-other -->
        </div>
        <!-- /.container -->
      </nav>
      <!-- /.navbar -->
      
    </header>
    <!-- /header -->
    <section class="wrapper">
      <div class="container pt-10 pb-15 pt-md-18 pb-md-20 text-center">
        <div class="row gx-lg-0 gx-xl-8 gy-10 gy-md-13 gy-lg-0 mb-7 mb-md-10 mb-lg-16 align-items-center">
          <div class="col-md-9 offset-md-1 col-lg-7 offset-lg-1 position-relative order-lg-2">
            <figure class="rounded"><img src="https://agendapro.com/wp-content/uploads/2021/03/Home_-Crea-tu-agenda-online@2x-8.png" srcset="https://agendapro.com/wp-content/uploads/2021/03/Home_-Crea-tu-agenda-online@2x-8.png 2x" alt="" /></figure>
          </div>
          <!--/column -->
          <div class="col-lg-4 mt-lg-n10 text-center text-lg-start">
            <h1 class="display-1 mb-5">Crea tu agenda online y haz <span class="underline-3 style-3 primary">crecer</span> tu negocio.</h1>
            <p class="lead fs-25 lh-sm mb-7 px-md-10 px-lg-0">Gestiona tus citas, clientes y ventas en un mismo lugar.</p>
            <div class="d-flex justify-content-center justify-content-lg-start">
              <span><a class="btn btn-green rounded mx-1">Empezar</a></span>
              <span><a class="btn btn-outline-primary rounded mx-1">Agenda una Demo</a></span>
            </div>
          </div>
          <!--/column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
    
    
  </div>
  <!-- /.content-wrapper -->
  <footer class="bg-light">
    <div class="container py-13 py-md-15">
      <div class="row gy-6 gy-lg-0">
        <div class="col-md-4 col-lg-3">
          <div class="widget">
            <img class="mb-4" src="./assets/img/logo@2x.png" srcset="./assets/img/logo@2x.png 2x" alt="" />
            <p class="mb-4">© 2022 Sandbox. <br class="d-none d-lg-block" />All rights reserved.</p>
            <nav class="nav social ">
              <a href="#"><i class="uil uil-twitter"></i></a>
              <a href="#"><i class="uil uil-facebook-f"></i></a>
              <a href="#"><i class="uil uil-dribbble"></i></a>
              <a href="#"><i class="uil uil-instagram"></i></a>
              <a href="#"><i class="uil uil-youtube"></i></a>
            </nav>
            <!-- /.social -->
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
        <div class="col-md-4 col-lg-3">
          <div class="widget">
            <h4 class="widget-title  mb-3">Get in Touch</h4>
            <address class="pe-xl-15 pe-xxl-17">Moonshine St. 14/05 Light City, London, United Kingdom</address>
            <a href="mailto:#" class="link-body">info@email.com</a><br /> 00 (123) 456 78 90
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
        <div class="col-md-4 col-lg-3">
          <div class="widget">
            <h4 class="widget-title  mb-3">Learn More</h4>
            <ul class="list-unstyled text-reset mb-0">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Our Story</a></li>
              <li><a href="#">Projects</a></li>
              <li><a href="#">Terms of Use</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
        <div class="col-md-12 col-lg-3">
          <div class="widget">
            <h4 class="widget-title  mb-3">Our Newsletter</h4>
            <p class="mb-5">Subscribe to our newsletter to get our news & deals delivered to you.</p>
            <div class="newsletter-wrapper">
              <!-- Begin Mailchimp Signup Form -->
              <div id="mc_embed_signup2">
                <form action="https://elemisfreebies.us20.list-manage.com/subscribe/post?u=aa4947f70a475ce162057838d&amp;id=b49ef47a9a" method="post" id="mc-embedded-subscribe-form2" name="mc-embedded-subscribe-form" class="validate " target="_blank" novalidate>
                  <div id="mc_embed_signup_scroll2">
                    <div class="mc-field-group input-group form-floating">
                      <input type="email" value="" name="EMAIL" class="required email form-control" placeholder="Email Address" id="mce-EMAIL2">
                      <label for="mce-EMAIL2">Email Address</label>
                      <input type="submit" value="Join" name="subscribe" id="mc-embedded-subscribe2" class="btn btn-primary ">
                    </div>
                    <div id="mce-responses2" class="clear">
                      <div class="response" id="mce-error-response2" style="display:none"></div>
                      <div class="response" id="mce-success-response2" style="display:none"></div>
                    </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ddc180777a163e0f9f66ee014_4b1bcfa0bc" tabindex="-1" value=""></div>
                    <div class="clear"></div>
                  </div>
                </form>
              </div>
              <!--End mc_embed_signup-->
            </div>
            <!-- /.newsletter-wrapper -->
          </div>
          <!-- /.widget -->
        </div>
        <!-- /column -->
      </div>
      <!--/.row -->
    </div>
    <!-- /.container -->
  </footer>

  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
  </div>
  <script src="./assets/js/app.js"></script>
</body>

</html>