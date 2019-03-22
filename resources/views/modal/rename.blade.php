@auth @can('edit teammate') @if (Carbon::parse(Setting::get('register_deadline', '2019-5-15'), 'Asia/Taipei')->gt(Carbon::now()) && !Carbon::parse(Setting::get('register_begin_date', '2019-4-01'), 'Asia/Taipei')->gt(Carbon::now()))
<div class="modal fade" id="teamRenameModal" tabindex="-1" role="dialog" aria-labelledby="teamRenameModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {!! Form::open(['route' => 'team.rename']) !!}
      <div class="modal-header">
        <h5 class="modal-title" id="teamRenameModalLabel">隊名修改</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <vue-input title="隊名" valid="沒有重複" invalid="不可以使用" default-value="{{auth()->user()->name}}" required name="name" check-valid validator-url="/team/check/name"></vue-input>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary bg-secondary" data-dismiss="modal">取消</button>
        <button type="submit" class="btn bg-primary">保存</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endif @endcan @endauth