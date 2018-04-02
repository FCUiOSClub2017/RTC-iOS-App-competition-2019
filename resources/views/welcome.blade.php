<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{asset('/css/app.css')}}" rel="stylesheet">
  <title>{{config('app.name', 'Laravel')}}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">
  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">
  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">
  <script src="{{asset('/js/app.js')}}"></script>
  <script src="{{asset('/js/plugin.js')}}"></script>
</head>

<body>
  <div id="app" data-bg-img="img/bg.png" data-stellar-background-ratio="0.6" data-toggle="parallax-bg">
    <!-- Page Content
    ================================================== -->
    <!-- Hero -->
    <section class="hero" data-stellar-background-ratio="0.4">
      <div class="container text-center">
        <div class="row">
          <div class="col-md-12">
            <a class="hero-brand" title="Home"><h1><b>2018<br/>APP移動應用創新賽</b></h1></a>
          </div>
        </div>
        <div class="col-md-12">
          <h1>
            {{-- A theme with personality --}}
          </h1>
          <p class="tagline">
            {{-- This is a powerful theme with some great features that you can use in your future projects. --}}
          </p>
          <a class="btn btn-full" href="#about"> 進入 </a>
        </div>
      </div>
    </section>
    <!-- /Hero -->
    <!-- Header -->
    <navbar mobile>
      <h1 slot="logo"><a href="#">{{config('app.name', 'Laravel')}}</a></h1>
      <ul slot="nav-content">
        <li><a href="#about">About Us</a></li>
        <li><a href="#features">Features</a></li>
        <li><a href="#portfolio">Portfolio</a></li>
        <li><a href="#team">Team</a></li>
        <li class="menu-has-children">
          <i class="fas fa-chevron-down"></i>
          <a href="#">Drop Down</a>
          <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="menu-has-children">
              <i class="fas fa-chevron-right"></i>
              <a href="#">Drop Down 2</a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
            <li><a href="#">Drop Down 5</a></li>
          </ul>
        </li>
        <li><a href="#contact">Contact Us</a></li>
      </ul>
    </navbar>
    <!-- #header -->
    <!-- About -->
    <section class="about" id="about">
      <div class="container text-center">
        <h2>
          About Bell Theme
        </h2>
        <p>
          Voluptua scripserit per ad, laudem viderer sit ex. Ex alia corrumpit voluptatibus usu, sed unum convenire id. Ut cum nisl moderatius, per nihil dicant commodo an. Eum tacimates erroribus ad. Atqui feugiat euripidis ea pri, sed veniam tacimates ex. Menandri temporibus an duo.
        </p>
        <div class="row stats-row">
          <div class="stats-col text-center col-md-3 col-sm-6">
            <div class="circle">
              <span class="stats-no counterup">232</span> Satisfied Customers
            </div>
          </div>
          <div class="stats-col text-center col-md-3 col-sm-6">
            <div class="circle">
              <span class="stats-no counterup">79</span> Released Projects
            </div>
          </div>
          <div class="stats-col text-center col-md-3 col-sm-6">
            <div class="circle">
              <span class="stats-no counterup">1,463</span> Hours Of Support
            </div>
          </div>
          <div class="stats-col text-center col-md-3 col-sm-6">
            <div class="circle">
              <span class="stats-no counterup">15</span> Hard Workers
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /About -->
    <!-- Features -->
    <section class="features" id="features">
      <div class="container">
        <h2 class="text-center display-2">
          大賽報名
        </h2>
        <div class="row">
          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <span class="fas fa-rocket"></span>
                </div>
              </div>
              <div>
                <h3>
                  Custom Design
                </h3>
                <p>
                  Eque feugiat contentiones ei has. Id summo mundi explicari his, nec in maiorum scriptorem.
                </p>
              </div>
            </div>
          </div>
          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
              <div>
                <h3>
                  Responsive Layout
                </h3>
                <p>
                  Eque feugiat contentiones ei has. Id summo mundi explicari his, nec in maiorum scriptorem.
                </p>
              </div>
            </div>
          </div>
          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <span class="fas fa-bell"></span>
                </div>
              </div>
              <div>
                <h3>
                  Innovative Ideas
                </h3>
                <p>
                  Eque feugiat contentiones ei has. Id summo mundi explicari his, nec in maiorum scriptorem.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <span class="fas fa-database"></span>
                </div>
              </div>
              <div>
                <h3>
                  Good Documentation
                </h3>
                <p>
                  Eque feugiat contentiones ei has. Id summo mundi explicari his, nec in maiorum scriptorem.
                </p>
              </div>
            </div>
          </div>
          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <span class="fas fa-utensils"></span>
                </div>
              </div>
              <div>
                <h3>
                  Excellent Features
                </h3>
                <p>
                  Eque feugiat contentiones ei has. Id summo mundi explicari his, nec in maiorum scriptorem.
                </p>
              </div>
            </div>
          </div>
          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <span class="fas fa-tachometer-alt"></span>
                </div>
              </div>
              <div>
                <h3>
                  Retina Ready
                </h3>
                <p>
                  Eque feugiat contentiones ei has. Id summo mundi explicari his, nec in maiorum scriptorem.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Features -->
    <!-- Call to Action -->
    <section class="cta">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 col-sm-12 text-lg-left text-center">
            <h2>
              Call to Action Section
            </h2>
            <p>
              Lorem ipsum dolor sit amet, nec ad nisl mandamus imperdiet, ut corpora cotidieque cum. Et brute iracundia his, est eu idque dictas gubergren
            </p>
          </div>
          <div class="col-lg-3 col-sm-12 text-lg-right text-center">
            <a class="btn btn-ghost" href="#">Buy This Theme</a>
          </div>
        </div>
      </div>
    </section>
    <!-- /Call to Action -->
    <!-- Portfolio -->
    <section class="portfolio" id="portfolio">
      <div class="container text-center">
        <h2>
          Portfolio
        </h2>
        <p>
          Voluptua scripserit per ad, laudem viderer sit ex. Ex alia corrumpit voluptatibus usu, sed unum convenire id. Ut cum nisl moderatius, Per nihil dicant commodo an.
        </p>
      </div>
      <div class="portfolio-grid">
        <div class="row">
          <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="card card-block">
              <a href="#"><img alt="" src="img/porf-1.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                    The Dude Rockin'
                  </h3>

                  <p class="card-text">
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
                </div>
              </div></a>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="card card-block">
              <a href="#"><img alt="" src="img/porf-2.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                    The Dude Rockin'
                  </h3>

                  <p class="card-text">
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
                </div>
              </div></a>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="card card-block">
              <a href="#"><img alt="" src="img/porf-3.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                    The Dude Rockin'
                  </h3>

                  <p class="card-text">
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
                </div>
              </div></a>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="card card-block">
              <a href="#"><img alt="" src="img/porf-4.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                    The Dude Rockin'
                  </h3>

                  <p class="card-text">
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
                </div>
              </div></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="card card-block">
              <a href="#"><img alt="" src="img/porf-5.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                    The Dude Rockin'
                  </h3>

                  <p class="card-text">
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
                </div>
              </div></a>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="card card-block">
              <a href="#"><img alt="" src="img/porf-6.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                    The Dude Rockin'
                  </h3>

                  <p class="card-text">
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
                </div>
              </div></a>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="card card-block">
              <a href="#"><img alt="" src="img/porf-7.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                    The Dude Rockin'
                  </h3>

                  <p class="card-text">
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
                </div>
              </div></a>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="card card-block">
              <a href="#"><img alt="" src="img/porf-8.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                    The Dude Rockin'
                  </h3>

                  <p class="card-text">
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
                </div>
              </div></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Portfolio -->
    <!-- Team -->
    <section class="team" id="team">
      <div class="container">
        <h2 class="text-center">
          Meet our team
        </h2>
        <div class="row">
          <div class="col-sm-3 col-xs-6 p-0">
            <div class="card card-block">
              <a href="#"><img alt="" class="team-img" src="img/team-1.jpg">
              <div class="card-title-wrap">
                <span class="card-title">Sergio Fez</span> <span class="card-text">Art Director</span>
              </div>

              <div class="team-over">
                <h4 class="hidden-md-down">
                  Connect with me
                </h4>

                <nav class="social-nav">
                  <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-facebook"></i></a> <a href="#"><i class="fab fa-linkedin"></i></a> <a href="#"><i class="fas fa-envelope"></i></a>
              </nav>
              <p>
                Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
              </p>
            </div>
            </a>
          </div>
        </div>
        <div class="col-sm-3 col-xs-6 p-0">
          <div class="card card-block">
            <a href="#"><img alt="" class="team-img" src="img/team-2.jpg">
              <div class="card-title-wrap">
                <span class="card-title">Sergio Fez</span> <span class="card-text">Art Director</span>
              </div>

              <div class="team-over">
                <h4 class="hidden-md-down">
                  Connect with me
                </h4>

                <nav class="social-nav">
                  <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-facebook"></i></a> <a href="#"><i class="fab fa-linkedin"></i></a> <a href="#"><i class="fas fa-envelope"></i></a>
            </nav>
            <p>
              Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
            </p>
          </div>
          </a>
        </div>
      </div>
      <div class="col-sm-3 col-xs-6 p-0">
        <div class="card card-block">
          <a href="#"><img alt="" class="team-img" src="img/team-3.jpg">
              <div class="card-title-wrap">
                <span class="card-title">Sergio Fez</span> <span class="card-text">Art Director</span>
              </div>

              <div class="team-over">
                <h4 class="hidden-md-down">
                  Connect with me
                </h4>

                <nav class="social-nav">
                  <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-facebook"></i></a> <a href="#"><i class="fab fa-linkedin"></i></a> <a href="#"><i class="fas fa-envelope"></i></a>
          </nav>
          <p>
            Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
          </p>
        </div>
        </a>
      </div>
  </div>
  <div class="col-sm-3 col-xs-6 p-0">
    <div class="card card-block">
      <a href="#"><img alt="" class="team-img" src="img/team-4.jpg">
              <div class="card-title-wrap">
                <span class="card-title">Sergio Fez</span> <span class="card-text">Art Director</span>
              </div>

              <div class="team-over">
                <h4 class="hidden-md-down">
                  Connect with me
                </h4>

                <nav class="social-nav">
                  <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-facebook"></i></a> <a href="#"><i class="fab fa-linkedin"></i></a> <a href="#"><i class="fas fa-envelope"></i></a>
      </nav>
      <p>
        Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
      </p>
    </div>
    </a>
  </div>
  </div>
  </div>
  </div>
  </section>
  <!-- /Team -->
  <!-- {{-- @com --}}ponent: footer -->
  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="section-title">Contact Us</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-3 col-md-4">
          <div class="info">
            <div>
              <i class="fas fa-map-marker"></i>
              <p>A108 Adam Street
                <br>New York, NY 535022</p>
            </div>
            <div>
              <i class="fas fa-envelope"></i>
              <p>info@example.com</p>
            </div>
            <div>
              <i class="fas fa-phone"></i>
              <p>+1 5589 55488 55s</p>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-md-8">
          <div class="form">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form action="" method="post" role="form" class="contactForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validation"></div>
              </div>
              <div class="text-center">
                <button type="submit">Send Message</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="site-footer">
    <div class="bottom">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-xs-12 text-lg-left text-center">
            <p class="copyright-text">
              © BELL Theme
            </p>
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Bell
              -->
              <a href="https://bootstrapmade.com/">Bootstrap Templates</a> by BootstrapMade
            </div>
          </div>
          <div class="col-lg-6 col-xs-12 text-lg-right text-center">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="{{route('app-competition-home')}}">Home</a>
              </li>
              <li class="list-inline-item">
                <a href="#about">About Us</a>
              </li>
              <li class="list-inline-item">
                <a href="#features">Features</a>
              </li>
              <li class="list-inline-item">
                <a href="#portfolio">Portfolio</a>
              </li>
              <li class="list-inline-item">
                <a href="#team">Team</a>
              </li>
              <li class="list-inline-item">
                <a href="#contact">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <a class="scrolltop" href="#"><span class="fas fa-angle-up"></span></a>
  </div>
</body>

</html>