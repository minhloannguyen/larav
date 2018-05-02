@extends('admin.layout.default')

@section('current', 'Banner')

@section('content')
  <a href="{{ route('banner.create') }}" class="btn btn-info" role="button">Thêm banner</a>
<div class="row-fluid">
  <div class="span12">
    <div class="widget-box">
      <div class="widget-content nopadding">
        <table class="table table-bordered table-striped with-check">
          <thead>
            <tr>
              <th style="width: 50px">Mã banner</th>
              <th>Banner</th>
              <th>Tình trạng</th>
              <th>Ngày tạo</th>
              <th>Ngày cập nhật</th>
              <th style="width: 50px"></th>
              <th style="width: 50px"></th>
            </tr>
          </thead>
          <tbody>
          	@foreach ($banner as $value)
            <tr>
              <td>{{$value->id}}</td>
              <td><img style="height: 100px" src="{{$value->name}}"></td>
              <th>
                @if($value->status == 1)
                  Ảnh banner
                @endif  
              </th>
              <td>{{$value->created_at}}</td>
              <td>{{$value->updated_at}}</td>
              <td><a href="{{ route('banner.edit', $value->id) }}" class="btn btn-default" role="button">Sửa</a></td> 
              <td><form action="{{ route('banner.destroy', $value->id) }}" method="POST">
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
{{ $banner->links()}} 
@endsection