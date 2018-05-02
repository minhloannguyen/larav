@extends('admin.layout.default')

@section('current', 'Tag')

@section('content')
<div class="flash-message">
  @foreach (['danger', 'success'] as $msg)
    @if(Session::has($msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get($msg) }}</p>
    @endif
  @endforeach
</div>  
  <a href="{{ route('tag.create') }}" class="btn btn-info" role="button">Thêm tag</a>
<div class="row-fluid">
  <div class="span12">
    <div class="widget-box">
      <div class="widget-content nopadding">
        <table class="table table-bordered table-striped with-check">
          <thead>
            <tr>
              <th style="width: 70px">Mã tag</th>
              <th>Tên tag</th>
              <th>Ngày tạo</th>
              <th>Ngày cập nhật</th>
              <th style="width: 50px"></th>
              <th style="width: 50px"></th>
            </tr>
          </thead>
          <tbody>
          	@foreach ($tag as $value)
            <tr>
              <td>{{$value->id}}</td>
              <td>{{$value->name}}</td>
              <td>{{$value->created_at}}</td>
              <td>{{$value->updated_at}}</td>
              <td><a href="{{ route('tag.edit', $value->id) }}" class="btn btn-default" role="button">Sửa</a></td> 
              <td><form action="{{ route('tag.destroy', $value->id) }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button onclick="return checkDelete()" class="btn btn-danger">Xoá</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div> 
  </div>
</div>
{{ $tag->links()}} 
@endsection