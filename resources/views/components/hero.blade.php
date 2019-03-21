<section class="hero" data-stellar-background-ratio="0.4">
  <div class="container text-center">
    <div class="row">
      <div class="col-md-12">
        <a class="hero-brand" title="Home">
          <img class="d-none d-md-block" src="/images/banner-desktop.png" width="100%" alt="">
          <img class="d-md-none" src="/images/banner-mobile.png" width="100%" alt="">
        </a>
      </div>
    </div>
    <div class="col-md-12">
        @if (Setting::get('active_news', false))
      <a class="btn" style="background-color: hsl(314, 66%, 59%);" href="#news"> 最新消息 </a>
      @else
      <a class="btn" style="background-color: hsl(314, 66%, 59%);" href="#about"> 進入 </a>
      @endif
    </div>
  </div>
</section>
