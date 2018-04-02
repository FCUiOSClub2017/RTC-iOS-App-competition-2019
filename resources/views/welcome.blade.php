<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{asset('/fonts/font.css')}}" rel="stylesheet">
  <link href="{{asset('/css/app.css')}}" rel="stylesheet">
  <title>{{config('app.name', 'Laravel')}}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">
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
            <a class="hero-brand" title="Home">
              <h1><b>2018<br/>APP移動應用創新賽</b></h1>
            </a>
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
      <h1 slot="logo">
        <a href="#">{{config('app.name', 'Laravel')}}</a>
      </h1>
      <ul slot="nav-content">
        <li>
          <a href="#about">About Us</a>
        </li>
        <li>
          <a href="#features">Features</a>
        </li>
        <li>
          <a href="#portfolio">Portfolio</a>
        </li>
        <li>
          <a href="#team">Team</a>
        </li>
        <li class="menu-has-children">
          <i class="fas fa-chevron-down"></i>
          <a href="#">Drop Down</a>
          <ul>
            <li>
              <a href="#">Drop Down 1</a>
            </li>
            <li class="menu-has-children">
              <i class="fas fa-chevron-right"></i>
              <a href="#">Drop Down 2</a>
              <ul>
                <li>
                  <a href="#">Deep Drop Down 1</a>
                </li>
                <li>
                  <a href="#">Deep Drop Down 2</a>
                </li>
                <li>
                  <a href="#">Deep Drop Down 3</a>
                </li>
                <li>
                  <a href="#">Deep Drop Down 4</a>
                </li>
                <li>
                  <a href="#">Deep Drop Down 5</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#">Drop Down 3</a>
            </li>
            <li>
              <a href="#">Drop Down 4</a>
            </li>
            <li>
              <a href="#">Drop Down 5</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#contact">Contact Us</a>
        </li>
      </ul>
    </navbar>
    <!-- #header -->
    <!-- About -->
    <section class="about" id="about">
      <div class="container-fulid text-center px-3 px-md-4 px-lg-5">
        <h2 class="display-4 mb-3">大賽簡介</h2>
        <p>我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容我是內容</p>
      </div>
    </section>
    <section class="timeline" id="timeline">
      <div class="container-fulid text-center px-xl-5">
        <h2 class="display-4 mb-5">競賽日程</h2>
        <div class="no-gutters row stats-row justify-content-around justify-content-xl-around">
          <div class="stats-col text-center col-8 col-sm-5 col-md-3 col-xl-2">
            <div class="ratio-1-1">
              <div class="circle">
                <span class="stats-no"><a>33/33</a></span>
                <div class="circle-overflow">
                  <div class="circle-content">
                    <a>hello~~~</a>
                  </div>
                  <div class="circle-overlay">
                    <a>hello~~~</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="stats-col text-center col-8 col-sm-5 col-md-3 col-xl-2">
            <div class="ratio-1-1">
              <div class="circle">
                <span class="stats-no"><a>33/33</a></span>
                <div class="circle-overflow">
                  <div class="circle-content">
                    <a>hello~~~</a>
                  </div>
                  <div class="circle-overlay">
                    <a>hello~~~</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="w-100 d-none d-sm-block d-md-none"></div>
          <div class="stats-col text-center col-8 col-sm-5 col-md-3 col-xl-2">
            <div class="ratio-1-1">
              <div class="circle">
                <span class="stats-no"><a>33/33</a></span>
                <div class="circle-overflow">
                  <div class="circle-content">
                    <a>hello~~~</a>
                  </div>
                  <div class="circle-overlay">
                    <a>hello~~~hello~~~hello~~~hello~~~hello~~~hello~~~hello~~~</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="w-100 d-none d-sm-block d-xl-none"></div>
          <div class="col-1 d-none d-md-block d-xl-none"></div>
          <div class="stats-col text-center col-8 col-sm-5 col-md-3 col-xl-2">
            <div class="ratio-1-1">
              <div class="circle">
                <span class="stats-no"><a>33/33</a></span>
                <div class="circle-overflow">
                  <div class="circle-content">
                    <a>hello~~~</a>
                  </div>
                  <div class="circle-overlay">
                    <a>hello~~~</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="stats-col text-center col-8 col-sm-5 col-md-3 col-xl-2">
            <div class="ratio-1-1">
              <div class="circle">
                <span class="stats-no"><a>33/33</a></span>
                <div class="circle-overflow">
                  <div class="circle-content">
                    <a>hello~~~</a>
                  </div>
                  <div class="circle-overlay">
                    <a>hello~~~</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-1 d-none d-md-block d-xl-none"></div>
        </div>
      </div>
    </section>
    <!-- /About -->
    <!-- Features -->
    <section class="features" id="features">
      <div class="container">
        <h2 class="text-center display-4">大賽報名</h2>
        <div class="row justify-content-around">
          <div class="feature-col col-12 col-md-5">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <span class="fas fa-rocket"></span>
                </div>
              </div>
              <div>
                <h3>報名</h3>
                <p>
                  報名註意事項
                </p>
              </div>
            </div>
          </div>
          <div class="feature-col col-12 col-md-5">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
              <div>
                <h3>檔案上傳</h3>
                <p>
                  初審後開放
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Features -->
    <!-- Call to Action -->
    {{--
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
    </section> --}}
    <!-- /Call to Action -->
    <!-- Portfolio -->
    <section class="portfolio" id="portfolio">
      <div class="container text-center">
        <h2 class="display-4">
          贊助廠商
        </h2>
      </div>
      <div class="portfolio-grid">
        <div class="container">
          <div class="row justify-content-around">
            <div class="col-12 col-lg-4 col-md-6 col-xl-3">
              <div class="card card-block">
                <a href="#" class="sponsors sigmu"></a>
              </div>
            </div>
            <div class="col-12 col-lg-4 col-md-6 col-xl-3">
              <div class="card card-block">
                <a href="#" class="sponsors litenet"></a>
              </div>
            </div>
            <div class="col-12 col-lg-4 col-sm-6 col-xl-3">
              <div class="card card-block">
                <a href="#" class="sponsors studioa"></a>
              </div>
            </div>
            <div class="w-100 d-none d-xl-block"></div>
            <div class="col-12 col-lg-4 col-md-6 col-xl-3 push-3">
              <div class="card card-block">
                <a href="#" class="sponsors atomax"></a>
              </div>
            </div>
            <div class="col-12 col-lg-4 col-md-6 col-xl-3">
              <div class="card card-block">
                <a href="#" class="sponsors fora"></a>
              </div>
            </div>
            <div class="w-100 d-none d-lg-block d-xl-none"></div>
            <div class="col-12 col-lg-4 col-md-6 col-xl-3">
              <div class="card card-block">
                <a href="#" class="sponsors opro9"></a>
              </div>
            </div>
            <div class="col-12 col-lg-4 col-md-6 col-xl-3">
              <div class="card card-block">
                <a href="#" class="sponsors qblinks"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Portfolio -->
    <!-- Team -->
    {{--
    <section class="team" id="team">
      <div class="container">
        <h2 class="text-center">
          Meet our team
        </h2>
        <div class="row">
          <div class="col-sm-3 col-xs-6 p-0">
            <div class="card card-block">
              <a href="#">
                <img alt="" class="team-img" src="img/team-1.jpg">
                <div class="card-title-wrap">
                  <span class="card-title">Sergio Fez</span> <span class="card-text">Art Director</span>
                </div>
                <div class="team-over">
                  <h4 class="hidden-md-down">
                    Connect with me
                  </h4>
                  <nav class="social-nav">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fas fa-envelope"></i></a>
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
              <a href="#">
                <img alt="" class="team-img" src="img/team-2.jpg">
                <div class="card-title-wrap">
                  <span class="card-title">Sergio Fez</span> <span class="card-text">Art Director</span>
                </div>
                <div class="team-over">
                  <h4 class="hidden-md-down">
                    Connect with me
                  </h4>
                  <nav class="social-nav">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fas fa-envelope"></i></a>
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
              <a href="#">
                <img alt="" class="team-img" src="img/team-3.jpg">
                <div class="card-title-wrap">
                  <span class="card-title">Sergio Fez</span> <span class="card-text">Art Director</span>
                </div>
                <div class="team-over">
                  <h4 class="hidden-md-down">
                    Connect with me
                  </h4>
                  <nav class="social-nav">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fas fa-envelope"></i></a>
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
              <a href="#">
                <img alt="" class="team-img" src="img/team-4.jpg">
                <div class="card-title-wrap">
                  <span class="card-title">Sergio Fez</span> <span class="card-text">Art Director</span>
                </div>
                <div class="team-over">
                  <h4 class="hidden-md-down">
                    Connect with me
                  </h4>
                  <nav class="social-nav">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fas fa-envelope"></i></a>
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
    </section> --}}
    <!-- /Team -->
    <!-- {{-- @com --}}ponent: footer -->
    {{--
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
    </section> --}}
    <footer class="site-footer">
      <div class="bottom">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-xs-12 text-lg-left text-center">
              <p class="copyright-text">
                © AhKui
              </p>
              <div class="credits">
                <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Bell
              -->
                <a href="http://www.fcu.edu.tw/">FCU</a> by Ahkui
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