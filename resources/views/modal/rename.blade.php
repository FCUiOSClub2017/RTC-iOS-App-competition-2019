@auth @can('edit teammate') @if (Carbon::create(2018, 5, 16, 0, 0, 0)->gt(Carbon::now()))
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
        <div class="form-group">
          <label for="name" class="col-form-label">隊名:</label>
          <input type="text" class="form-control" id="name" name="name" value="{{auth()->user()->name}}" required>
        </div>
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