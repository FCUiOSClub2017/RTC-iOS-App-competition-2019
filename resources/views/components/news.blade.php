@if (Setting::get('active_news', false))
<section class="news" id="news">
    <div class="container-fluid px-3 px-md-4 px-lg-5">
        <h2 class="display-4 text-center">最新消息</h2>
        <div class="row "App>
            <div class="col bootstrap-original">
                <div id="news" class="shadow rounded">
                    @php $firstShow = true; @endphp @foreach ($news as $new) @php $randomStr1 = str_random(10); $randomStr2 = str_random(10); @endphp @component('components.admin.news.card',['id'=>$new->id]) @slot('title') {{$new->date->month}}/{{$new->date->day}} {{$new->title}} @endslot @slot('content', $new->content) @slot('route',route('admin.news.edit',$new->id)) @slot('parent','news') @slot('firstShow',$firstShow) @endcomponent @if ($firstShow) @php $firstShow = !$firstShow; @endphp @endif @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif