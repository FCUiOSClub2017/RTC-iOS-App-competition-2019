<navbar>
  <h1 slot="logo"><a href="{{route('home')}}" class="goto-target">{{config('app.name', 'Laravel')}}</a></h1>
  <ul slot="nav-content">
    @if (URL::current()!=route('home') && URL::current()!=route('home'))
    <li>
      <a href="{{route('home')}}">首頁</a>
    </li>
    @endif
    <li>
      <a href="{{route('home')}}#about">簡介</a>
    </li>
    <li>
      <a href="{{route('home')}}#timeline">競賽</a>
    </li>
    <li>
      <a href="{{route('home')}}#award">獎項</a>
    </li>
    <li>
      <a href="{{route('home')}}#portal">報名</a>
    </li>
    <li class="menu-has-children">
      <i class="fas fa-chevron-down"></i>
      <a href="#">更多</a>
      <ul>
        <li>
          <a href="{{route('home')}}#entry_requirement">參賽要求</a>
        </li>
        <li>
          <a href="{{route('home')}}#work_requirement">作品要求</a>
        </li>
        <li>
          <a href="{{route('home')}}#competition_review">競賽評審</a>
        </li>
        <li>
          <a href="{{route('home')}}#review_and_awards">評審及評獎</a>
        </li>
        <li>
          <a href="{{route('home')}}#related_statement">相關聲明</a>
        </li>
        <li>
          <a href="{{route('home')}}#organizer">主辦/協辦 單位</a>
        </li>
        <li>
          <a href="{{route('home')}}#sponsors">贊助商</a>
        </li>
      </ul>
    </li>
    @auth
    <li class="menu-has-children">
      <i class="fas fa-chevron-down"></i>
      <a href="#">你好，{{auth()->user()->name}}！</a>
      <ul>
        @can('edit teammate')
        <li>
          <a href="{{ route('team.info') }}">我的隊伍資料</a>
        </li>
        @endcan
        @can('review all file')
        <li>
          <a href="{{ route('admin.team.list') }}">队伍列表</a>
        </li>
        @endcan
        @can('edit website')
        <li>
          <a href="{{ route('page.index') }}">編輯頁面</a>
        </li>
        @endcan
        <li style="cursor:pointer;" onclick="document.getElementById('logout-form').submit();">
          <a href="{{ route('logout') }}" onclick="event.preventDefault();">登出</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li>
      </ul>
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