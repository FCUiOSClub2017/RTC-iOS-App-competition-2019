<footer class="site-footer" id="footer">
  <div class="bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-xs-12 text-lg-left text-center">
          <p class="copyright-text">
            © FCU
          </p>
          <div class="credits">
            <a href="http://www.fcu.edu.tw/">FCU</a> by Ahkui
          </div>
        </div>
        <div class="col-lg-6 col-xs-12 text-lg-right text-center">
          <ul class="list-inline">
            @auth
            <li class="list-inline-item">
              <a href="{{URL::route('user')}}">你好，{{auth()->user()->name}}！</a>
            </li>
            @endauth @if (URL::current()!=URL::route('home') && URL::current()!=URL::secure('home'))
            <li class="list-inline-item">
              <a href="{{URL::route('home')}}">首頁</a>
            </li>
            @endif
            <li class="list-inline-item">
              <a href="{{URL::route('home')}}#about">簡介</a>
            </li>
            <li class="list-inline-item">
              <a href="{{URL::route('home')}}#timeline">競賽</a>
            </li>
            <li class="list-inline-item">
              <a href="{{URL::route('home')}}#award">獎項</a>
            </li>
            <li class="list-inline-item">
              <a href="{{URL::route('home')}}#portal">報名</a>
            </li>
            <li class="list-inline-item">
              <a href="{{URL::route('home')}}#sponsors">贊助商</a>
            </li>
            @auth
            <li class="list-inline-item">
              <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
            @else
            <li class="list-inline-item">
              <a href="{{ route('login') }}">登入</a>
            </li>
            @endauth
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>