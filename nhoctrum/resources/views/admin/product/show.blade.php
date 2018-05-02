@extends('admin.layout.default')

@section('current', 'Sản phẩm')

@section('content')
<div class="row-fluid">
  <div class="span12">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-briefcase"></i> </span>
        <h5>Chi tiết sản phẩm</h5>
      </div>
      <div class="widget-content">
        <div class="row-fluid">
          <div class="span6">
            <img width="450px" src="{{$product->image}}"><hr>
          </div>
          <div class="span6">
            <table class="table table-bordered table-invoice">
              <tbody>
                <tr>
                  <tr>
                    <td class="width30">Mã sản phẩm:</td>
                    <td class="width70"><strong>{{$product->id}}</strong></td>
                  </tr>
                  <tr>
                    <td class="width30">Tên sản phẩm:</td>
                    <td class="width70"><strong>{{$product->name}}</strong></td>
                  </tr>
                  <tr>
                    <td class="width30">Loại sản phẩm:</td>
                    <td class="width70"><strong>{{$product->category->name}}</strong></td>
                  </tr>
                  @foreach($product->sizes as $size)
                    <tr>
                      <td class="width30">Kích thước:</td>
                      <td class="width70"><strong>{{$size->name}}</strong>
                       ({{number_format($size->pivot->price)}})</td>
                    </tr>
                  @endforeach
                  <tr>
                    <td>Ngày tạo:</td>
                    <td><strong>{{$product->created_at}}</strong></td>
                  </tr>
                  <tr>
                    <td>Ngày cập nhật:</td>
                    <td><strong>{{$product->updated_at}}</strong></td>
                  </tr>
              </tr>
                </tbody> 
            </table>
          </div>
        </div>
        <div class="row-fluid">
          <div class="span12">
            <table class="table table-bordered table-invoice-full">
              <thead>
                <tr>
                  <th class="head0">Mô tả</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{$product->description}}</td>
                </tr>
              </tbody>
            </table>
            <table class="table table-bordered table-invoice-full">
              <tbody>
                <tr>
                  <td class="msg-invoice"><h4>Tags: </h4>
                    @foreach ($product->tags as $tag)
                      <span class="label label-inverse">{{$tag->name}}</span>
                    @endforeach
                  </td>
                </tr>
              </tbody>
            </table>
          <div class="pull-right">
            <a class="btn btn-primary btn-large pull-right" href="{{ route('product.index') }}">Back</a> </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection