@extends('admin.layout.default')

@section('current', 'Banner')

@section('content')
@if (count($errors) > 0)
  <div class="alert alert-danger">
    @foreach ($errors->all() as $error)
      {{ $error }}
    @endforeach
  </div>
@endif
<div class="row-fluid">
  <div class="span12">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
        <h5>Thêm banner</h5>
      </div>
      <div class="widget-content nopadding">
        <form class="form-horizontal" method="POST" action="{{ route('banner.store') }}">
          <div class="control-group">
            <label class="control-label">Link banner</label>
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