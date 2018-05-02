@extends('admin.layout.default')

@section('current', 'Sản phẩm')

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
        <h5>Sửa sản phẩm</h5>
      </div>
      <div class="widget-content nopadding">
        <form class="form-horizontal" method="post" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
          <div class="control-group">
            <label class="control-label">Loại sản phẩm<span style="color: red"> *</span></label>
            <div class="controls" style="width: 30%">
              <select class="selectpicker" data-live-search="true" name="category_id">
                @foreach ($category as $value)
                  <option value="{{$value->id}}">{{$value->name}}</option>    
                @endforeach   
              </select>                   
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Tên sản phẩm<span style="color: red"> *</span></label>
            <div class="controls">
              <div class="input-append">
                <input type="text" name="name" value="{{$product->name}}" class="span11" required>
              </div>  
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Ảnh sản phẩm<span style="color: red"> *</span></label>
            <div class="controls">
              <label class="custom-file">
                <input type="file" name="featured_image" value="{{$product->image}}" class="custom-file-input" disabled="">
                <span class="custom-file-control"></span>
              </label>
            </div>

            <!-- <div class="collapsible">
              <div class="control-label"><a href="#collapseTwo" data-toggle="collapse">Thêm ảnh</a></span></div>
              <div class="collapse" id="collapseTwo">
                <div class="widget-content"> 
                  @for($i=1; $i<=2; $i++)
                  <label class="custom-file">
                    <input type="file" name="featured_image{{$i}}" placeholder="{{$product[0]['image'.$i]}}" class="custom-file-input" >
                    <span class="custom-file-control"></span>
                  </label>
                  @endfor
                </div>
              </div>
            </div> -->
          </div>

          <div class="control-group">
            <label class="control-label">Hoặc nhập link ảnh</label>
            <div class="controls">
              <div class="input-append">
                <input type="text" name="featured_image" value="{{$product->image}}" class="span11">
              </div>  
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Tags</label>
            <div class="controls" style="width: 50%">
              <select multiple="multiple" name="tags[]"> 
                {{-- @foreach ($product->tags as $tag)
                  <option selected value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach --}}

                @foreach($tag as $value)
                  <option value="{{$value->id}}">{{$value->name}}</option>     
                @endforeach
              </select>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Kích thước<span style="color: red"> *</span></label>
            <div class="controls">
              <div class="collapsible">
                <?php $i=0; ?>
                @foreach($size as $value)  
                  <label>
                    <input type="checkbox" name="sizes[]" value="{{$value->id}}"/>{{$value->name}}<a href="#collapse{{$i}}" data-toggle="collapse"><span> (Click để nhập giá)</span></a>
                  </label> 
                  <div class="collapse" id="collapse{{$i}}">
                    <div class="controls">
                      <input type="text" name="prices[]" placeholder="Giá (VND)" class="span3">
                    </div>  
                  </div>
                  <?php $i++; ?>
                @endforeach  
                </div>                   
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Mô tả</label>
            <div class="controls">
              <div class="input-append">
                <textarea class="form-control" rows="5" value="{{$product->description}}" name="description"></textarea>
              </div>  
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