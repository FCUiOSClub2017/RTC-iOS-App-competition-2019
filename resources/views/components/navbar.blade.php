<navbar>
    <h1 slot="logo"><a href="{{route('home')}}" class="goto-target">{{config('app.name', 'Laravel')}}</a></h1>
    <ul slot="nav-content">
        @if (Setting::get('active_news', false))
        <li>
            <a href="{{route('home')}}#news">最新消息</a>
        </li>
        @endif @if (URL::current()!=route('home') && URL::current()!=route('home'))
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
            <a href="{{route('home')}}#portal">傳送門</a>
        </li>
        <li class="menu-has-children">
            <i class="fas fa-chevron-down"></i>
            <a>更多</a>
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
                <li class="menu-has-children">
                    <i class="fas fa-chevron-right"></i>
                    <a>文件下載</a>
                    <ul>
                        <li>
                            <a href="/doc/2019年APP移動應用創新賽v1.3.pdf" onclick="event.preventDefault();window.open('/doc/2019年APP移動應用創新賽v1.3.pdf', '_blank');">章程</a>
                        </li>
                        <li>
                            <a href="/doc/2019年APP移動應用創新賽附件1~3.pdf" onclick="event.preventDefault();window.open('/doc/2019年APP移動應用創新賽附件1~3.pdf', '_blank');">附件</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        @auth
        <li class="menu-has-children">
            <i class="fas fa-chevron-down"></i>
            <a>你好，{{auth()->user()->name}}！</a>
            <ul>
                @hasanyrole ('admin|developer')
                <li>
                    <a href="{{route('admin.dashboard')}}">Admin Dashboard</a>
                </li>
                @endhasanyrole @can('edit teammate') @if (auth()->user()->verify === true && Carbon::parse(Setting::get('register_deadline', '2019-5-15'), 'Asia/Taipei')->gt(Carbon::now()) && Carbon::parse(Setting::get('register_deadline', '2019-5-15'), 'Asia/Taipei')->gt(Carbon::now()))
                <li>
                    <a href="#" data-toggle="modal" data-target="#teamRenameModal" onclick="$($(this).data('target')).modal('show')">隊名修改</a>
                </li>
                @endif
                <li>
                    <a href="{{ route('team.info') }}">隊伍資料</a>
                </li>
                <li>
                    <a href="{{ route('team.proposal.uplaod') }}">企劃書管理</a>
                </li>
                <li>
                    <a href="{{ route('team.register.form.uplaod') }}">報名表格補件管理</a>
                </li>
                <li>
                    <a href="{{ route('team.app.uplaod') }}">App 上傳管理</a>
                </li>
                @endcan @if (auth()->user()->verify === true)
                <li>
                    <a href="{{route('change.password.form')}}">密碼修改</a>
                </li>
                @endif
                <li style="cursor:pointer;" onclick="document.getElementById('logout-form').submit();">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();">登出</a>
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
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
@include('modal.rename')