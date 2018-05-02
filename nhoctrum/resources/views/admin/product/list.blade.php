@extends('admin.layout.default')

@section('current', 'Sản phẩm')

@section('content')
<div class="flash-message">
  @foreach (['danger', 'success'] as $msg)
    @if(Session::has($msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get($msg) }}</p>
    @endif
  @endforeach
</div>
  <a href="{{ route('product.create') }}" class="btn btn-info" role="button">Thêm sản phẩm</a>
<div class="row-fluid">
  <div class="span12">
    <div class="widget-box"> 
      <div class="widget-content nopadding">
        <table class="table table-bordered table-striped with-check">
          <thead>
            <tr>
              <th style="width: 50px">Mã sản phẩm</th>
              <th>Tên sản phẩm</th>
              <th>Loại sản phẩm</th>
              <th>Hình ảnh</th>
              <th style="width: 50px"></th>
              <th style="width: 50px"></th>
              <th style="width: 50px"></th>
            </tr>
          </thead>
          <tbody>
          @foreach ($product as $value)
            <tr>
              <td>{{$value->id}}</td>
              <td>{{$value->name}}</td>
              <td>{{$value->category->name}}</td>
              <td><img style="height: 100px" src="{{$value->image}}"></td>
              <td><a href="{{ route('product.show', $value->id) }}" class="btn btn-success" role="button">Xem</a></td>
              <td><a href="{{ route('product.edit', $value->id) }}" class="btn btn-default" role="button">Sửa</a></td>
              <td><form action="{{ route('product.destroy', $value->id) }}" method="POST">
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
{{ $product->links()}} 
@endsection