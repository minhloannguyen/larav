@extends('admin.layout.default')

@section('current', 'Kích thước')

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
        <h5>Sửa kích thước</h5>
      </div>
      <div class="widget-content nopadding">
        <form class="form-horizontal" method="POST" action="{{ route('size.update', $size->id) }}">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
          <div class="control-group">
            <label class="control-label">Kích thước<span style="color: red"> *</span></label>
            <div class="controls">
              <input type="text" name="name" id="required" placeholder="{{$size->name}}" required>
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