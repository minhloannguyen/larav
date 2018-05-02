@extends('home.layout.default')
@section('content')
<div class="single">

<div class="container">
<div class="col-md-11">
	<div class="col-md-5 grid">		
		<div class="flexslider">
			  <ul class="slides">
			    <li data-thumb="{{ $product->image }}">
			        <div class="thumb-image"> <img src="{{$product->image}}" data-imagezoom="true" class="img-responsive"></div>
			    </li>
			    <!-- <li data-thumb="{{ asset('public/images/'.$product[0]['image1']) }}">
			         <div class="thumb-image"> <img src="{{ asset('public/images/'.$product[0]['image1']) }}" data-imagezoom="true" class="img-responsive"> </div>
			    </li>
			    <li data-thumb="{{ asset('public/images/'.$product[0]['image2']) }}">
			       <div class="thumb-image"> <img src="{{ asset('public/images/'.$product[0]['image2']) }}" data-imagezoom="true" class="img-responsive"> </div>
			    </li> --> 
			  </ul>
		</div>
	</div>	
	<div class="col-md-7 single-top-in">
		<div class="span_2_of_a1 simpleCart_shelfItem">
			<h3>{{$product->name}}</h3> 

			<div id="myBtnContainer">
				<p class="in-para">Size: 
					@foreach($product->sizes as $size)
						<button type="button" onclick="filterSelection('{{$size->name}}')" class="btn btn-1 btn-default">{{$size->name}}</button>
					@endforeach
				</p>
			</div>

			<div class="price_single">
				<div class="myContainer">
			 	@foreach($product->sizes as $size)
			 		<div class="filterDiv {{$size->name}}"><span class="reducedfrom item_price">{{number_format($size->pivot->price)}} đ &nbsp &nbsp</span></div>
			 	@endforeach	
			 	</div>
			 	<a href="{{asset('shop')}}">Tiếp tục mua hàng</a>
				<div class="clearfix"></div>	
			</div> 
				<style type="text/css">
					.filterDiv {
					  float: left;
					  display: none;
					}
					.show {
					  display: block;
					}
					.myContainer {
					  margin-top: 20px;
					  overflow: hidden;
					}
				</style>
				<script>
					filterSelection("all")
					function filterSelection(c) {
					  var x, i;
					  x = document.getElementsByClassName("filterDiv");
					  if (c == "all") c = "";
					  for (i = 0; i < x.length; i++) {
					    w3RemoveClass(x[i], "show");
					    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
					  }
					}

					function w3AddClass(element, name) {
					  var i, arr1, arr2;
					  arr1 = element.className.split(" ");
					  arr2 = name.split(" ");
					  for (i = 0; i < arr2.length; i++) {
					    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
					  }
					}

					function w3RemoveClass(element, name) {
					  var i, arr1, arr2;
					  arr1 = element.className.split(" ");
					  arr2 = name.split(" ");
					  for (i = 0; i < arr2.length; i++) {
					    while (arr1.indexOf(arr2[i]) > -1) {
					      arr1.splice(arr1.indexOf(arr2[i]), 1);     
					    }
					  }
					  element.className = arr1.join(" ");
					}
					// Add active class to the current button (highlight it)
					var btnContainer = document.getElementById("myBtnContainer");
					var btns = btnContainer.getElementsByClassName("btn");
					for (var i = 0; i < btns.length; i++) {
					  btns[i].addEventListener("click", function(){
					    var current = document.getElementsByClassName("active");
					    current[0].className = current[0].className.replace(" active", "");
					    this.className += " active";
					  });
					}
				</script>
			<h4 class="quick">TAGS:</h4>
			<p class="quick_desc"> 
				<ul class="tag-in">
					@foreach($product->tags as $tag)
						<li><a href="{{url('search/tag', ['tag' => $tag->id])}}">{{$tag->name}}</a></li>
					@endforeach	
				</ul>
			</p>
		    <div class="wish-list">
			 	<ul>
			 		<li class="wish"><a href="#"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>Add to Wishlist</a></li>
			 	    <!-- <li class="compare"><a href=""><span class="glyphicon glyphicon-resize-horizontal" aria-hidden="true"></span>Add to compare</a></li> -->
			 	</ul>
		 	</div>
			<div class="quantity"> 
				<div class="quantity-select">                           
					<div class="entry value-minus">&nbsp;</div>
					<div class="entry value"><span>1</span></div>
					<div class="entry value-plus active">&nbsp;</div>
				</div>
			</div>
				<!--quantity-->
			<script>
		    $('.value-plus').on('click', function(){
		    	var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
		    	divUpd.text(newVal);
		    });

		    $('.value-minus').on('click', function(){
		    	var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
		    	if(newVal>=1) divUpd.text(newVal);
		    });
			</script>
				<!--quantity-->
				 
			<a href="#" class="add-to item_add hvr-skew-backward">Add to cart</a>
			<div class="clearfix"> </div>
		</div>
		
	</div>
	<div class="clearfix"> </div>
			<!---->
	<div class="tab-head">
	 	<nav class="nav-sidebar">
			<ul class="nav tabs">
	          <li class="active"><a href="#tab1" data-toggle="tab">Mô tả sản phẩm</a></li>
	          <li class=""><a href="#tab2" data-toggle="tab">Hướng dẫn tô màu</a></li> 
			</ul>
		</nav>
		<div class="tab-content one">
			<div class="tab-pane active text-style" id="tab1">
 				<div class="facts">
				  <p>{{$product->description}}</p>       
		        </div>
			</div>

			<div class="tab-pane text-style" id="tab2">
				<div class="facts">									
					<p > Hướng dẫn chung, cách tô màu </p>
					<ul >
						<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							Bước 1: Làm sạch khu vực vẽ tranh để tránh bẩn vải, chuẩn bị một cốc nước và giấy ăn mềm. Vì bút vẽ sử dụng lần đầu nên bạn có thể ngâm rửa nhẹ để đầu lông mềm mại. rửa bút mỗi khi chuyển màu hoặc kết thúc công việc để tránh dây màu vẽ.<br><br>
							Màu vẽ sơn Acrylic rất mịn, mượt bay hơi và khô khá nhanh là ưu điểm nhưng vì vậy khi vẽ xong cần đóng nắp để tránh khô, chất liệu màu rất tốt nếu được bảo quản đúng cách có thể dung tới 10 năm. Với các màu cần dung nhiều hãng sẽ cung cấp nhiều lọ màu hơn vì thế khi vẽ thường màu sẽ dư màu các bạn không cần tiết kiệm hơn nữa khi tô đậm thì mới đảm bảo che hết số và viền đen trên tranh nha.
						</li>
						<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							Bước 2: Vẽ các màu cùng số trong 1 sẽ giúp bạn tiết kiệm thời gian rửa bút. Nếu cần đẩy nhanh tốc độ 2 đến 3 người có thể vẽ 1 bức tranh cùng lúc tùy độ to nhỏ của bức tranh. Người vẽ nên vẽ từ trái sang phải, sẽ tránh bị tì tay vào mầu còn ướt.<br><br>
							Khi tì tay quá mạnh và làm nhòe mực in của các số chưa vẽ bạn có thể dung tờ A4 đánh số đính kèm để dò lại. Nếu lỡ tô sai thì các bạn chờ khô cạo nhẹ cho bay bớt lớp màu và tô đè màu đúng lên nhé.
							Đối với những bạn mới vẽ, những phần cần có sự thể hiện tinh tế như khuôn mặt hay những đường viền cần độ nét cao, bạn nên để phần đó lại vẽ sau một chút, khi bạn đã quen tay rồi bạn vẽ những phần đó sẽ đẹp hơn, chiếc bút nhỏ nhất được khuyên dung cho phần đường viền này. Các phần còn lại các bạn nên dung các bút ngòi to hơn và tránh tì tay quá mạnh khi dung bút nhé.
						</li>
					</ul>
		        </div>	
			</div>
  		</div>
  		<div class="clearfix"></div>
  	</div>		
</div>
<!----->
<div class="col-md-3 product-bottom">
	<!--categories-->
<!--//menu-->				 				 	
	</div>
	

	<div class="clearfix"> </div>
</div>
			<!--brand-->
	<div class="container">
		<div class="brand">
			<h2>Related items</h2><hr>
			@foreach($related as $value)
			<div class="col-md-4 item-grid1 simpleCart_shelfItem">
				<div class=" mid-pop">
					<div class="pro-img">
						<center><img style="height: 180px" src="{{$value->image}}" class="img-responsive" alt=""></center>
						<div class="zoom-icon ">
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
			<!--//brand-->
</div>	
@endsection