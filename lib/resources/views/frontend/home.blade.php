@extends('frontend.master')
@section('title','Trang chủ')
@section('main')
    <!--/slider -->
<div class="main">
	<div class="wrap">
		<div class="section group">
		  <div class="cont span_2_of_3">
		  	<h2 class="head">Featured Products</h2>
			<div class="top-box">
			 @foreach($featured as $product)
			 <div class="col_1_of_3 span_1_of_3" style="margin:0 0 0 0;"> 			
			   <a href="{{ asset('details/'.$product->prod_id.'/'.$product->prod_slug.'.html') }}">
				<div class="inner_content clearfix">
					<div class="product_image">
						<img src="{{asset('lib/storage/app/avatar/'.$product->prod_img)}}" alt=""/>
					</div>
                    <div class="sale-box"><span class="on_sale title_shop">New</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title">{{$product->prod_name}}</p>
							<div class="price1">
							  <span class="actual">{{number_format($product->prod_price)}} VNĐ</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                 </a>              
				</div>			   
				@endforeach
				<div class="clear"></div>
			</div>	
		  <h2 class="head">Staff Pick</h2>
		  <div class="top-box1">
			  @foreach($new as $new)
			 <div class="col_1_of_3 span_1_of_3" style="margin:0 0 0 0;"> 			
			   <a href="{{ asset('details/'.$product->prod_id.'/'.$new->prod_slug.'.html') }}">
				<div class="inner_content clearfix">
					<div class="product_image">
						<img src="{{asset('lib/storage/app/avatar/'.$new->prod_img)}}" alt=""/>
					</div>
                    <div class="sale-box"><span class="on_sale title_shop">New</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title">{{$new->prod_name}}</p>
							<div class="price1">
							  <span class="actual">{{number_format($new->prod_price)}} VNĐ</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                 </a>              
				</div>			   
				@endforeach	
				<div class="clear"></div>
			</div>							 			    
		  </div>
			<div class="rsidebar span_1_of_left">
				<div class="top-border"> </div>
				 <div class="border">
	             <link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
	             <link href="css/nivo-slider.css" rel="stylesheet" type="text/css" media="all" />
				  <script src="js/jquery.nivo.slider.js"></script>
				    <script type="text/javascript">
				    $(window).load(function() {
				        $('#slider').nivoSlider();
				    });
				    </script>
		    <div class="slider-wrapper theme-default">
              <div id="slider" class="nivoSlider">
                <img src="images/t-img1.jpg"  alt="" />
               	<img src="images/t-img2.jpg"  alt="" />
                <img src="images/t-img3.jpg"  alt="" />
              </div>
             </div>
              <div class="btn"><a href="single.html">Check it Out</a></div>
             </div>
           <div class="top-border"> </div>
			<div class="sidebar-bottom">
			    <h2 class="m_1">Newsletters<br> Signup</h2>
			    <p class="m_text">Lorem ipsum dolor sit amet, consectetuer</p>
			    <div class="subscribe">
					 <form>
					    <input name="userName" type="text" class="textbox">
					    <input type="submit" value="Subscribe">
					 </form>
	  			</div>
			</div>
	    </div>
	   <div class="clear"></div>
	</div>
	</div>
	</div>
  @stop