<navbar>
  <h1 slot="logo"><a href="{{URL::route('home')}}" class="goto-target">{{config('app.name', 'Laravel')}}</a></h1>
  <ul slot="nav-content">
    @auth
    <li>
      <a href="{{URL::route('user')}}">你好，{{auth()->user()->name}}！</a>
    </li>
    @endauth @if (URL::current()!=URL::route('home') && URL::current()!=URL::secure('home'))
    <li>
      <a href="{{URL::route('home')}}">首頁</a>
    </li>
    @endif
    <li>
      <a href="{{URL::route('home')}}#about">簡介</a>
    </li>
    <li>
      <a href="{{URL::route('home')}}#timeline">競賽</a>
    </li>
    <li>
      <a href="{{URL::route('home')}}#award">獎項</a>
    </li>
    <li>
      <a href="{{URL::route('home')}}#portal">報名</a>
    </li>
    <li>
      <a href="{{URL::route('home')}}#sponsors">贊助商</a>
    </li>
    @auth
    <li>
      <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
    </li>
    @else
    <li>
      <a href="{{ route('login') }}">登入</a>
    </li>
    @endauth {{$slot}} {{--
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
    </li> --}}
  </ul>
</navbar>