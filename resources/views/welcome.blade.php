@extends('layouts.app')
<!-- yield -->
@section('hero')
<!-- Hero -->
@include('components.hero')
<!-- /Hero -->
@endsection
<!-- Content -->
@section('content')
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
            <span class="stats-no"><a>4/30</a></span>
            <div class="circle-overflow">
              <div class="circle-content">
                <a>報名截止</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="stats-col text-center col-8 col-sm-5 col-md-3 col-xl-2">
        <div class="ratio-1-1">
          <div class="circle">
            <span class="stats-no"><a>5/15</a></span>
            <div class="circle-overflow">
              <div class="circle-content">
                <a>書面
                  <br/>企劃案
                  <br/>提交截止</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-100 d-none d-sm-block d-md-none"></div>
      <div class="stats-col text-center col-8 col-sm-5 col-md-3 col-xl-2">
        <div class="ratio-1-1">
          <div class="circle">
            <span class="stats-no"><a>6/8</a></span>
            <div class="circle-overflow">
              <div class="circle-content">
                <a>初選結果公布</a>
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
            <span class="stats-no"><a>6/24</a></span>
            <div class="circle-overflow">
              <div class="circle-content">
                <a>交流討論會</a>
              </div>
              <div class="circle-overlay">
                <a>於逢甲大學進行Workshop交流討論會,凡進入決賽的參賽隊伍皆可自由參加。</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="stats-col text-center col-8 col-sm-5 col-md-3 col-xl-2">
        <div class="ratio-1-1">
          <div class="circle">
            <span class="stats-no"><a>7/18</a></span>
            <div class="circle-overflow">
              <div class="circle-content">
                <a>決賽</a>
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
<section class="features" id="register">
  <div class="container">
    <h2 class="text-center display-4">大賽報名</h2>
    <div class="row justify-content-around">
      <div class="feature-col col-12 col-md-5">
        <div class="card card-block text-center" style="cursor: pointer;" onclick="window.location='{{route('register')}}'">
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
        <div class="card card-block text-center" style="cursor: pointer;" onclick="window.location='{{route('register')}}'">
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
@include('components.sponsors')
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
<!-- Footer -->
@include('components.footer') @endsection