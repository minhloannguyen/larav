@extends('admin.layout.default')

@section('current', 'Tag')

@section('content')
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        {{ $error }}
      @endforeach
    </ul>
  </div>
@endif
<div class="row-fluid">
  <div class="span12">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
        <h5>Thêm Tag</h5>
      </div>
      <div class="widget-content nopadding">
        <form class="form-horizontal" method="POST" action="{{ route('tag.store') }}">
          <div class="control-group">
            <label class="control-label">Tên Tag</label>
            <div class="controls">
              <input type="text" name="name" id="required" required>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>
          <div class="form-actions">
            <input type="submit" value="OK" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection