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
        <h5>Sửa banner</h5>
      </div>
      <div class="widget-content nopadding">
        <form class="form-horizontal" method="POST" action="{{ route('banner.update', $banner->id) }}">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
          <div class="control-group">
            <label class="control-label">Link banner</label>
            <div class="controls">
              <input type="text" style="width: 70%" name="name" id="required" value="{{$banner->name}}" required>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Status</label>
            <div class="controls">
              <label><input type="radio" name="status" value="1" />Chọn làm banner</label>  
              <label><input type="radio" checked name="status" value="0" />Hoặc không</label>                
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