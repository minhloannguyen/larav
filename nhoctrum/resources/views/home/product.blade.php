@extends('home.layout.default')
@section('content')
<div class="product">
	<div class="container">
		<h2>Danh sách tranh</h2><h4>({{$product->count()}} kết quả)</h4>
	<div class="col-md-9">
		<div class="mid-popular">
			@foreach($product as $value)
			<div class="col-md-4">
				<div class=" mid-pop">
					<div class="pro-img">
						<img style="height: 200px" src="{{$value->image}}" class="img-responsive" alt="">
						<div class="zoom-icon ">
							<a class="picture" href="{{$value->image}}" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
							<a href="{{ asset('sanpham/'.$value->id)}}"><i class="glyphicon glyphicon-menu-right icon"></i></a>
						</div>
					</div>
					<div class="mid-1">
						<div class="women">
							<div class="women-top">
								<span> 
									{{$value->category->name}}	
								</span> 
								<h6>{{$value->name}}</h6>
							</div>
							<div class="img item_add">
								<a href="#"><img src="{ asset('resources/views/images/ca.png') }}" alt=""></a>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="mid-2">
							<?php $priceCollect = collect(); ?>
							@foreach ($value->sizes as $size) 
					            <?php $priceCollect->push($size->pivot->price);?>
					        @endforeach
							<p><label>500,000</label><em class="item_price">{{number_format($priceCollect->min())}} - {{number_format($priceCollect->max())}} đ</em></p>
							  <!-- <div class="block">
								<div class="starbox small ghosting"> </div>
							</div> -->
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="col-md-3 product-bottom">
	<!--categories-->
		<div class=" rsidebar span_1_of_left">
			<h4 class="cate">Tìm kiếm theo</h4>
		</div>
		<!--initiate accordion-->
<!--//menu-->
<form method="get" action="{{asset('/search/filter')}}" name="searchForm">
	{{ csrf_field() }}
 	<section  class="sky-form">
		<h4 class="cate">Chủ đề</h4>
		<div class="row row1 scroll-pane">
			<div class="col col-4">
				<?php $i=0; ?>
				@foreach($categories as $cat)
					<label class="checkbox">
						<input type="radio" id="category{{$i}}" name="category" 
						@if(isset($category))
							@if($category==$cat->id) 
								<?php echo "checked"; ?>
							@endif
						@endif	
						value="{{$cat->id}}" ><i></i>{{$cat->name}}
					</label>
					<?php $i++; ?>
				@endforeach	
			</div>
		</div>
   	</section>

	<section  class="sky-form">
		<h4 class="cate">Kích thước</h4>
		<div class="row row1 scroll-pane">
			<div class="col col-4">
				<?php $i=0; ?>
				@foreach($sizes as $size)
					<label class="checkbox">
						<input type="radio" id="size{{$i}}" name="size" 
						@if(isset($sz))
							@if($sz==$size->id) 
								<?php echo "checked"; ?>
							@endif
						@endif	
						value="{{$size->id}}" ><i></i>{{$size->name}}
					</label>
					<?php $i++; ?>
				@endforeach	
			</div>
		</div>
   	</section>
	<section  class="sky-form">
		<h4 class="cate">Giá</h4>
	 	<div class="row row1 scroll-pane">
			<div class="form-group">
	          <select id="select" class="form-control" name="price">
	          	<option value="">-------</option>
	            <option @if(isset($price))
							@if($price==1) 
								<?php echo "selected"; ?>
							@endif
						@endif	 value="1">Dưới {{number_format(100000)}}</option>
	            <option @if(isset($price))
							@if($price==2) 
								<?php echo "selected"; ?>
							@endif
						@endif	value="2">{{number_format(100000)}} -   {{number_format(300000)}}</option>
	            <option @if(isset($price))
							@if($price==3) 
								<?php echo "selected"; ?>
							@endif
						@endif value="3">Trên {{number_format(300000)}}</option>
	          </select>
	        </div>		
			<center><br><input type="submit" class="btn btn-1 btn-default" value="OK">
				<input type="button" class="btn btn-1 btn-default" id="uncheck" onclick="customReset()" value="Reset">
			</center>	
			<script>
				function customReset()
				{
				    // var cat = document.getElementById("category");
				    // for (var i = cat.length - 1; i >= 0; i--) {
				    // 	document.write(cat[i]);
				    // }
					// document.getElementById("size").checked = false;
				    document.getElementById("select").selectedIndex = "0";
				 	// allChk = document.getElementByType("radio");
				  //   for (i = 0; i < allChk.length; i++) 
				  //       {
				  //       	document.allChk[i].checked = false;

				  //       }
				  	var sz = new Array(20);
				  	var cat = new Array(20);
				 	var i = 0;
				 	do
				 	{
				 		sz[i] = document.getElementById("size"+i);
				 		sz[i].checked = false;

				 		cat[i] = document.getElementById("category"+i);
				 		cat[i].checked = false;

				 		i++;
				 	}while(sz[i] !== 'undefined' && cat[i] !== 'undefined');
				}
				
				
			</script>

	 	</div>
	</section> 		 				 
</form>

   	<section  class="sky-form">
		<h4 class="cate">TAGS</h4>
		<div class="row row1 scroll-pane">
			<div class="col col-4">
			 	<ul class="tag-in">
					@foreach($tags as $tag)
						<li><a href="{{ asset('search/tag/'.$tag->id)}}">{{$tag->name}}</a></li>
					@endforeach	
				</ul>
			</div>
		</div>
	</section>			
	</div>
	<div class="clearfix"></div>
</div>
		<!--products-->
	
	<!--//products-->
<!--brand-->
<!--//brand-->	
</div>
@endsection