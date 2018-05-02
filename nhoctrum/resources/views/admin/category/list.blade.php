@extends('admin.layout.default')

@section('current', 'Danh mục')

@section('content')
  <a href="{{ route('category.create') }}" class="btn btn-info" role="button">Thêm danh mục</a>
<div class="row-fluid">
  <div class="span12">
    <div class="widget-box">
      <div class="widget-content nopadding">
        <table class="table table-bordered table-striped with-check">
          <thead>
            <tr>
              <th style="width: 70px">Mã danh mục</th>
              <th>Tên danh mục</th>
              <th>Ngày tạo</th>
              <th>Ngày cập nhật</th>
              <th style="width: 50px"></th>
              <th style="width: 50px"></th>
            </tr>
          </thead>
          <tbody>
          	@foreach ($category as $value)
            <tr>
              <td>{{$value->id}}</td>
              <td>{{$value->name}}</td>
              <td>{{$value->created_at}}</td>
              <td>{{$value->updated_at}}</td>
              <td><a href="{{ route('category.edit', $value->id) }}" class="btn btn-default" role="button">Sửa</a></td> 
              <td><form action="{{ route('category.destroy', $value->id) }}" method="POST">
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
{{ $category->links()}} 
@endsection