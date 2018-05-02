@extends('admin.layout.default')

@section('current', 'Danh mục')

@section('content')
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
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$category->id}}</td>
              <td>{{$category->name}}</td>
              <td>{{$category->created_at}}</td>
              <td>{{$category->updated_at}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div> 
  </div>
</div>
@endsection